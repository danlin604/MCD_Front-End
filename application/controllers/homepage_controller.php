<?php
/*
The homepage should be a dashboard of sorts, showing some summary information: $ spent purchasing inventory, $ received from sales, cost of sales ingredients consumed. These are derived from the transaction logs.
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class homepage_controller extends Application
{

	public function index()
	{
		//view we want to show
		$this->data['pagebody'] = 'homepage_view';

		// build the list of authors, to pass on to our view
		$source = $this->transaction_model->all();
		$items = array();
		foreach ($source as $record)
		{
			$items[] = array ('id' => $record['id'], 'name' => $record['name'], 'cost' => $record['cost']);
		}
		$this->data['items'] = $items;
				
		$this->render(); 
	}

}
