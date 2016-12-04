<?php
/**
 *	Dummy transaction log in place of actual data, no real logic
 *
 *
 * @author Daniel Lin
 */
class Transaction_Model extends CI_Model
{

	var $data = array(
		array
		(
			'id' => '1',
			'name' => 'Spent Purchasing Inventory',
			'cost' => '50000'
		),
		array
		(
			'id' => '2',
			'name' => 'Received from Sales',
			'cost' => '67000'
		),
		array
		(
			'id' => '3',
			'name' => 'Cost of Sales Ingredients Consumed',
			'cost' => '1350'
		)
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// Get single data
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	// Get all data
	public function all()
	{
		return $this->data;
	}
	
}

?>