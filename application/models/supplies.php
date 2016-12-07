<?php

/**
 * Modified to use REST client to get port data from our server.
 */
define('REST_SERVER', 'http://a2backend.local');            // the REST server host
define('REST_PORT', $_SERVER['SERVER_PORT']);               // the port you are running the server on

class Supplies extends MY_Model {

	// constructor
	function __construct()
	{
		parent::__construct();

        //*** Explicitly load the REST libraries. 
        $this->load->library(['curl', 'format', 'rest']);
	}
        
        /*
        `id` 			int(11) 	NOT NULL,
        `name` 			varchar(256) 	NOT NULL,
        `description` 		varchar(256) 	NOT NULL,
        `price` 		decimal(10,2) 	NOT NULL,
        `currAvail` 		int(11) 	NOT NULL        
        */     
        /*   
        function rules() {
            $config = [
                ['field'=>'id', 'label'=>'Stock code', 'rules'=> 'required|integer'],
                ['field'=>'name', 'label'=>'Item name', 'rules'=> 'required'],
                ['field'=>'description', 'label'=>'Item description', 'rules'=> 'required|max_length[256]'],
                ['field'=>'receiving_unit', 'label'=>'Recieving unit', 'rules'=> 'required'],
                ['field'=>'receiving_cost', 'label'=>'Recieving cost', 'rules'=> 'required'],
                ['field'=>'stock_unit', 'label'=>'Stock unit', 'rules'=> 'required'],
                ['field'=>'receiving_unit', 'label'=>'Recieving unit', 'rules'=> 'required'],
                ['field'=>'quantities_on_hand', 'label'=>'Quantities on hand', 'rules'=> 'required']
            ];
            return $config;
        }
        */

        // Return all records as an array of objects
        function all()
        {
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->get('/supplies');
        }

        // Retrieve an existing DB record as an object
        function get($key, $key2 = null)
        {
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->get('/admin/edit/supplies' . $key);
        }

        // Create a new data object.
        // Only use this method if intending to create an empty record and then
        // populate it.
        function create()
        {
            $names = ['id','name','description','price','picture','category'];
            $object = new StdClass;
            foreach ($names as $name)
                $object->$name = "";
            return $object;
        }

        // Delete a record from the DB
        function delete($key, $key2 = null)
        {
                $this->rest->initialize(array('server' => REST_SERVER));
                $this->rest->option(CURLOPT_PORT, REST_PORT);
                return $this->rest->delete('/admin/delete/supplies' . $key); ////// dont know if we need the key here... lol route is different
        }

        // Update a record in the DB
        function update($record)
        {
                $this->rest->initialize(array('server' => REST_SERVER));
                $this->rest->option(CURLOPT_PORT, REST_PORT);
                $retrieved = $this->rest->put('/admin/edit/supplies/' . $record['id'], $record);
        }


        // Add a record to the DB
        function add($record)
        {
                $this->rest->initialize(array('server' => REST_SERVER));
                $this->rest->option(CURLOPT_PORT, REST_PORT);
                $retrieved = $this->rest->post('/admin/add/' . $record['id'], $record);
        }

}