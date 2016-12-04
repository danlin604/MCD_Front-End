<?php

class Stock extends MY_Model {

	// constructor
	function __construct()
	{
		parent::__construct();                
	}
        
        /*
        `id` 			int(11) 	NOT NULL,
        `name` 			varchar(256) 	NOT NULL,
        `description` 		varchar(256) 	NOT NULL,
        `price` 		decimal(10,2) 	NOT NULL,
        `currAvail` 		int(11) 	NOT NULL        
        */        
        function rules() {
            $config = [
                ['field'=>'id', 'label'=>'Stock code', 'rules'=> 'required|integer'],
                ['field'=>'name', 'label'=>'Item name', 'rules'=> 'required'],
                ['field'=>'description', 'label'=>'Item description', 'rules'=> 'required|max_length[256]'],
                ['field'=>'price', 'label'=>'Item price', 'rules'=> 'required|decimal'],
                ['field'=>'currAvail', 'label'=>'Item availibility', 'rules'=> 'required']
            ];
            return $config;
        }
}