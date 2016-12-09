<?php

/*
 * The admin page will be able to edit all data tables.
 * this means we will have to send 3 groups of data from
 * all 3 models. No idea how to do that, they will be represented using HTML tables
 * and have edit and delete buttons beside each row to make changes. Not sure if these
 * changes are too be applied to the model but that makes sense. Also an add function
 * to add to the tables. 
 * @author Manveer Bhangu
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class administrator_controller extends Application 
{    
    function __construct() {
        parent::__construct();
        $this->load->helper('formfields');
        $this->error_messages = array();
    }

    public function index()
    {
        $userrole = $this->session->userdata('userrole');
        if ($userrole != 'admin') {
            $message = 'You are not authorized to access this page. Go away';
            $this->data['content'] = $message;
        }

        //view we want to show
        $this->data['pagebody'] = 'admin_view';

        // go through the sources and store the data in there respective arrays
        $result_supplies = ' ';
        foreach ($this->supplies->all() as $record)
        {
            $result_supplies .= $this->parser->parse('supplies_admin', $record, true);   
        }
        $this->data['supplies'] = $result_supplies;

        $result_recipes = ' ';
        foreach ($this->recipes->all() as $record)
        {
                $result_recipes .= $this->parser->parse('recipes_admin', $record, true);
        }
        $this->data['recipes'] = $result_recipes;

        $result_stock = ' ';
        foreach ($this->stock->all() as $record)
        {
                $result_stock .= $this->parser->parse('stock-admin', $record, true); 
        }
        $this->data['stock'] = $result_stock;
        $this->render();
    }
        
    function edit($table, $id=null) {        
        // try the session first
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');

        // if not there, get them from the database
        if (empty($record) && ($id !== null)) {            
            if ($table == 'stock') {
                $record = $this->stock->get($id);
            } elseif ($table == 'recipes') {
                $record = $this->recipes->get($id);
            } elseif ($table == 'supplies') {
                $record = $this->supplies->get($id);
            } else {
                echo 'Route accepts only stock, recipes, or supplies!'; 
            }
            
            $key = $id;
            $this->session->set_userdata('key',$id);
            $this->session->set_userdata('record',$record);
        }

        $this->data['action'] = (empty($key)) ? 'Adding' : 'Editing';

        // build the form fields        
        $this->data['fid'] = makeTextField('Code', 'id', $record->id);
        $this->data['fname'] = makeTextField('Name', 'name', $record->name);       
        
        if ($table == 'stock') {
            $this->data['fdescription'] = makeTextArea('Description', 'description', $record->description);
            $this->data['fprice'] = makeTextField('Price, each', 'price', $record->price);
            $this->data['fcurrAvail'] = makeTextField('Availiable Quantity', 'currAvail', $record->currAvail);            
        } elseif ($table == 'recipes') {
            $this->data['pickel'] = makeTextField('Pickle', 'pickel', $record->pickel);
            $this->data['ketchup'] = makeTextField('Ketchup', 'ketchup', $record->ketchup);
            $this->data['tomato'] = makeTextField('Tomato', 'tomato', $record->tomato);
            $this->data['mustard'] = makeTextField('Mustard', 'mustard', $record->mustard);
            $this->data['onions'] = makeTextField('Onions', 'onions', $record->onions);
            $this->data['buns'] = makeTextField('Buns', 'buns', $record->buns);
            $this->data['meat_patty'] = makeTextField('Meat patty', 'meat patty', $record->meat_patty);
            $this->data['mac_sauce'] = makeTextField('Mac sauce', 'mac_sauce', $record->mac_sauce);
            $this->data['fish_patty'] = makeTextField('Fish patty', 'fish_patty', $record->fish_patty);
            $this->data['fries'] = makeTextField('Fries', 'fries', $record->fries);
            $this->data['soft_drink'] = makeTextField('Soft drink', 'soft_drink', $record->soft_drink);            
        } elseif ($table == 'supplies') {
            $this->data['fdescription'] = makeTextArea('Description', 'description', $record->description);
            $this->data['receiving_unit'] = makeTextField('Receiving unit', 'receiving_unit', $record->receiving_unit);            
            $this->data['receiving_cost'] = makeTextField('Receiving cost', 'receiving_cost', $record->receiving_cost);
            $this->data['stock_unit'] = makeTextField('Stock unit', 'stock_unit', $record->stock_unit);
            $this->data['quantities_on_hand'] = makeTextField('Quantities on hand', 'quantities_on_hand', $record->quantities_on_hand);   
        } else {
            echo 'Route accepts only stock, recipes, or supplies!'; 
        }        
        $this->data['zsubmit'] = makeSubmitButton('Save', 'Submit changes');

        // show the editing form
        if ($table == 'stock') {
            $this->data['pagebody'] = "stock-edit";
        } elseif ($table == 'recipes') {
            $this->data['pagebody'] = "recipes-edit";
        } elseif ($table == 'supplies') {
            $this->data['pagebody'] = "supplies-edit";
        } else {
            echo 'Route accepts only stock, recipes, or supplies!'; 
        }        
        $this->show_any_errors();
        $this->render();
    }
    
    function cancel() {
        $this->session->unset_userdata('key');
        $this->session->unset_userdata('record');
        $this->index();
    }   
    
    function show_any_errors() {
        $result = '';
        if (empty($this->error_messages)) {
            $this->data['error_messages'] = '';
            return;
        }
        // add the error messages to a single string with breaks
        foreach($this->error_messages as $onemessage)
            $result .= $onemessage . '<br/>';
        // and wrap these per our view fragment
        $this->data['error_messages'] = $this->parser->parse('admin-errors', ['error_messages' => $result], true);
    }
    
    function delete($table, $key = null) {
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');
        // only delete if editing an existing record
        if (! empty($record)) {
            if ($table == 'stock') {
                $this->stock->delete($key);
            } elseif ($table == 'recipes') {
                $this->recipes->delete($key);
            } elseif ($table == 'supplies') {
                $this->supplies->delete($key);
            } else {
                echo 'Route accepts only stock, recipes, or supplies!'; 
            }                
        }
        $this->session->unset_userdata('key');
        $this->session->unset_userdata('record');
        $this->index();
    }
    
    function add($table) {
        $key = NULL;
        
        if ($table == 'stock') {
            $record = $this->stock->create();
        } elseif ($table == 'recipes') {
            $record = $this->recipes->create();
        } elseif ($table == 'supplies') {
            $record = $this->supplies->create();
        } else {
            echo 'Route accepts only stock, recipes, or supplies!'; 
        }
        $this->session->set_userdata('key', $key);
        $this->session->set_userdata('record', $record);    
        $this->edit($table);
    }
    
    function save($table) {
        // try the session first
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');

        // if not there, nothing is in progress
        if (empty($record)) {
            $this->index();
            return;
        }       
        
        // update our data transfer object
        $incoming = $this->input->post();
        foreach(get_object_vars($record) as $index => $value)
            if (isset($incoming[$index]))
                $record->$index = $incoming[$index];
        $this->session->set_userdata('record',$record);        
        // check menu code for additions
        if ($key == null)
            if ($table == 'stock') {
                if ($this->stock->exists($record->id))
                    $this->error_messages[] = 'Duplicate key adding new menu item';
            } elseif ($table == 'recipes') {
                if ($this->recipes->exists($record->id))
                    $this->error_messages[] = 'Duplicate key adding new menu item';
            } elseif ($table == 'supplies') {
                //if ($this->supplies->exists($record->id))
                //    $this->error_messages[] = 'Duplicate key adding new menu item';
            } else {
                echo 'Route accepts only stock, recipes, or supplies!'; 
            }     
        // save or not
        if (!empty($this->error_messages)) {
            $this->edit($table);
            return;
        }
        
        // update our table, finally!
        if ($key == null) {            
            if ($table == 'stock') {
                $response = $this->stock->add($record);
            } elseif ($table == 'recipes') {
                $response = $this->recipes->add($record);
            } elseif ($table == 'supplies') {
                $response = $this->supplies->add($record);
            } else {
                echo 'Route accepts only stock, recipes, or supplies!'; 
            }           
        } else {
            if ($table == 'stock') {
                $response = $this->stock->update($record);
            } elseif ($table == 'recipes') {
                $response = $this->recipes->update($record);
            } elseif ($table == 'supplies') {
                $response = $this->supplies->update($record);
            } else {
                echo 'Route accepts only stock, recipes, or supplies!'; 
            }
            if (isset($response->error))
                $this->error_messages[] = 'Error reported from server: ' . $response->error;
        }
        
        // remove any data transfer object
        $this->session->unset_userdata('key');
        $this->session->unset_userdata('record');
        
        // and redisplay the list
        $this->index();
    }
}
