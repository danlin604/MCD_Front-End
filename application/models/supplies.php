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
        
        // Return all records as an array of objects
        function all()
        {
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->get('/maintenance');
        }

        // Retrieve an existing DB record as an object
        function get($key, $key2 = null)
        {
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->get('/maintenance/item/id/' . $key);
        }

        // Create a new data object.
        // Only use this method if intending to create an empty record and then
        // populate it.
        function create()
        {
            /*
            $names = ['id','name','description','receiving_unit','receiving_cost','stock_unit', 'quantities_on_hand'];
            $object = new StdClass;
            foreach ($names as $name)
                $object->$name = "";
            return $object;
            */
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->get('/maintenance/create');
        }

        // Delete a record from the DB
        function delete($key, $key2 = null)
        {        
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            $result = $this->rest->delete('/maintenance/item/' . $key);
            return $result;                
        }

        // Update a record in the DB
        function update($record)
        {
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->put('/maintenance/item/id/' . $record->id, json_encode($record));
        }
        
        // Add a record to the DB
        function add($record)
        {
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->post('/maintenance/item', json_encode($record));
        }

}