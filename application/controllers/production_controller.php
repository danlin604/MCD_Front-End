<?php

/*
The sales page should show a menu of purchaseable items, with description & price for each. The goal of this page is to build an order with multiple items, and to log the transaction that would result if the sale proceeded for real.
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class production_controller extends Application
{

	public function index()
	{
                $userrole = $this->session->userdata('userrole');
                if ($userrole != 'admin' && $userrole != 'user') {
                    $message = 'You are not authorized to access this page. Go away';
                    $this->data['content'] = $message;
                }            

		$this->data['pagebody'] = 'production_view';

		$result_recipes = ' ';
		foreach ($this->recipes->all() as $record)
		{
			$result_recipes .= $this->parser->parse('production_items', $record, true);
		}
		$this->data['items'] = $result_recipes;
		$this->render(); 
	}

	public function get($which)
	{
		//view we want to show
		$this->data['pagebody'] = 'production_detail_view';

		$result_recipes = ' ';
		$record = $this->recipes->get($which);
		$result_recipes .= $this->parser->parse('production_detail_view_items', $record, true);
		$this->data['items'] = $result_recipes;
		$this->render();
	}
}
