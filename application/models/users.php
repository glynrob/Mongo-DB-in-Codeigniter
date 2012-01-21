<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {
	
    
    function __construct() {
        parent::__construct();
     	$tableName = 'users';
     	$primaryKey = 'id';
		
    	// Connect to Mongo
    	$this->connection = new Mongo('localhost:27017');

    	// Select a database
    	$this->db = $this->connection->blog;
		
    	// Select a collection
    	$this->posts = $this->db->$tableName;
    }
	
	/** Insert new record */
	function save($member='') {
		if ($member != ''){
			if (!isset($member['id'])){ // new record
				$this->posts->insert($member);
				return $member['_id'];
			} else { // edit existing record
				$memberid = $member['id'];
				//unset($member['id']);
				$this->posts->update(array('_id' => new MongoId($memberid)), $member, array("multiple" => false));
				return $memberid;
			}
		}
    }
	
	/** Fetches all records with limit and orderby values's */
	function getAll($limit='', $orderby='') {
		$members = $this->posts->find();
		if ($limit != ''){ $members->limit($limit);}
		if ($orderby != ''){$members = $members->sort($orderby);}
		return $members;
    }
	

    /** Fetches a record by its' passed field and values's */
    function getByID($id='') {
		$member = $this->posts->findOne(array('_id' => new MongoId($id)));
        if ($member) {
        	return $member;
        }
        return false;
    }
	

    /** Fetches a record by its' passed field and values's */
    function getByColumn($field='id', $value='') {
		$member = $this->posts->findOne(array($field => $value));
        if ($member) {
        	return $member;
        }
        return false;
    }
	
    /** Deletes a record by it's primary key */
    function deleteById($id) {
		$this->posts->remove(array('_id' => new MongoId($id)), array("justOne" => true));
    }

}