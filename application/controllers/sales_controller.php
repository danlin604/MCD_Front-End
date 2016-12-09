<?php

/*
The sales page should show a menu of purchaseable items, with description & price for each. The goal of this page is to build an order with multiple items, and to log the transaction that would result if the sale proceeded for real.
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class sales_controller extends Application
{
    function __construct() 
    {
        parent::__construct();
    }

	public function index()
	{
            if($this->session->has_userdata('order'))
            {
                    $this->keep_shopping();
            } else {
                    $this->summarize();
            }
	}

	public function summarize()
	{
		foreach($this->stock->all() as $item)
		{
			$cells[] = $this->parser->parse('_sales_cell', (array) $item, true);
		}

		$this->load->library('table');

		$params = array
		(
			'table_open' => '<table class="menu_table">',
			'cell_start' => '<td class="menu_item">',
			'cell_alt_start' => '<td class="menu_item">',
		);
		$this->table->set_template($params);

		$rows = $this->table->make_columns($cells, 3);

		// identify all of the order files
        $this->load->helper('directory');
        $candidates = directory_map('../data/');
        $parms = array();
        foreach ($candidates as $filename) {
           if (substr($filename,0,5) == 'order') 
           {
               // restore that order object
               $order = new Order ('../data/' . $filename);
            	
            	// setup view parameters
               	$parms[] = array(
                   	'number' => $order->number,
                   	'datetime' => $order->datetime,
                   	'total' => $order->total()
                       );
            }
        }

        $this->data['orders'] = $parms;
        $this->data['sales_table'] = $this->table->generate($rows);
		$this->data['pagebody'] = 'sales_view';
		$this->render(); 
	}


	public function keep_shopping()
	{
		//view we want to show
		$this->data['pagebody'] = 'sales_detail_view';

		//build our list of item records for the view
		$result = ' ';
		foreach($this->stock->all() as $record)
		{
			$result .= $this->parser->parse('sales_items', $record, true);
		}

		$order = new Order($this->session->userdata('order'));
		$stuff = $order->receipt();

		$this->data['recipt'] = $this->parsedown->parse($stuff);
		$this->data['items'] = $result;
		$this->render();
	}

	public function neworder()
	{
		//create a new order if needed
		if(!$this->session->has_userdata('order'))
		{
			$order = new Order();
			$this->session->set_userdata('order',(array) $order);
		}
		$this->keep_shopping();
	}

	public function cancelOrder()
	{
		//drop order, unset session
		if($this->session->has_userdata('order'))
		{
			$this->session->unset_userdata('order');
		}

		$this->index();
	}

	public function add($what) 
	{
		$order = new Order($this->session->userdata('order'));
		$order->additem($what);
		$order->updateStock($what);
		$this->session->set_userdata('order', (array) $order);
		redirect('/sales_controller');
	}

	public function checkout()
	{
		$order = new Order($this->session->userdata('order'));
		$order->save();
		$this->session->unset_userdata('order');
		redirect('/sales_controller');
	}

	public function examine($which)
	{
		$order = new Order('../data/order' . $which . '.xml');
		$stuff = $order->receipt();
		$this->data['content'] = $this->parsedown->parse($stuff);
		$this->render();
	}
}
