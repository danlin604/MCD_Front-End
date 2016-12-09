<?php

class Recipes extends MY_Model {

	// constructor
	function __construct()
	{
		parent::__construct();
	}
          
        function rules() {
            $config = [
                ['field'=>'id', 'label'=>'Stock code', 'rules'=> 'required|integer'],
                ['field'=>'name', 'label'=>'Item name', 'rules'=> 'required'],
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