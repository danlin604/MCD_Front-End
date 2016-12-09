<?php
/*
The homepage should be a dashboard of sorts, showing some summary information: $ spent purchasing inventory, $ received from sales, cost of sales ingredients consumed. These are derived from the transaction logs.
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class homepage_controller extends Application
{
	public function index()
	{
            $this->summarize();
	}
        
        public function summarize()
	{
            $this->load->helper('directory');
            $candidates = directory_map('../data/');
            $parms = array();
            $profit = 0.00;
            $orders = 0;
            $customers = 0;
            foreach ($candidates as $filename) {
               if (substr($filename,0,5) == 'order') 
               {
                    // restore that order object
                    $order = new Order('../data/' . $filename);
                    $orders += 1;
                    $customers += 1;
                    $profit += $order->total(); 
                }
            }
            $parms[] = array(
                'orders' => $orders,
                'profit' => $profit,
                'traffic' => $customers * 6
            );

            $this->data['orders'] = $parms;
            $this->data['pagebody'] = 'homepage_view';
            $this->render(); 
	}

}
