<?php

class Recipes extends MY_Model {

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
                ['field'=>'pickel', 'label'=>'pickel', 'rules'=> 'required|integer'],
                ['field'=>'ketchup', 'label'=>'ketchup', 'rules'=> 'required|integer'],
                ['field'=>'tomato', 'label'=>'tomato', 'rules'=> 'required|integer'],
                ['field'=>'mustard', 'label'=>'mustard', 'rules'=> 'required|integer'],
                ['field'=>'onions', 'label'=>'onions', 'rules'=> 'required|integer'],
                ['field'=>'buns', 'label'=>'buns', 'rules'=> 'required|integer'],
                ['field'=>'meat patty', 'label'=>'meat patty', 'rules'=> 'required|integer'],
                ['field'=>'mac sauce', 'label'=>'mac sauce', 'rules'=> 'required|integer'],
                ['field'=>'fish patty', 'label'=>'fish patty', 'rules'=> 'required|integer'],
                ['field'=>'fries', 'label'=>'fries', 'rules'=> 'required|integer'],
                ['field'=>'soft drink', 'label'=>'soft drink', 'rules'=> 'required|integer']

            ];
            return $config;
        }

}