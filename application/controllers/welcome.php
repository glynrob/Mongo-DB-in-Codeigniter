<?php

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model('Users','',TRUE);
	}


	function index()
	{
		$members = $this->Users->getAll(5,array('date' => -1)); // Find all members, limit by 5, order by date
		$data = array(
			'members' => array()
		);
		while($members->hasNext()){ // While we have results
			$member = $members->getNext();// Get the next result
			
			$data['members'][] = array(
				'id' => $member["_id"]->__toString(),
				'name' => $member['name'],
				'address' => $member['address'],
				'phone' => $member['phone'],
				'date' => $member['date']
			);
		}
		$this->load->view('welcome', $data);
	}
	
	function add()
	{
		$data = array();
		$data['inserted'] = FALSE;
		
		// If form submitted
		if($this->input->post('add'))
		{
			// add new member into array
			$member = array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'date' => time()
			);
			$this->Users->save($member); // Insert the member
			
			$data['inserted'] = TRUE;
		}
		
		$this->load->view('add', $data); // Load the form
	}
	
	function edit($memberid)
	{
		$members = $this->Users->getByID($memberid); // Find member details
		$data = array(
			'id' => $members["_id"]->__toString(),
			'name' => $members['name'],
			'address' => $members['address'],
			'phone' => $members['phone'],
			'date' => $members['date'],
			'inserted' => FALSE
		);
		
		// If form submitted
		if($this->input->post('edit'))
		{
			// add new member into array
			$member = array(
				'id' => $memberid,
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'date' => $members['date']
			);
			$this->Users->save($member); // Insert the member
			
			$data['inserted'] = TRUE;
			redirect('/', 'refresh');
		}
		
		$this->load->view('edit', $data); // Load the form
	}
	
	function view($memberid)
	{
		$members = $this->Users->getByID($memberid); // Find member details
		
		$data = array(
			'id' => $members['id'],
			'name' => $members['name'],
			'address' => $members['address'],
			'phone' => $members['phone'],
			'date' => $members['date']
		);
		
		$this->load->view('view', $data);
	}
	
	function delete($memberid)
	{
		$members = $this->Users->deleteById($memberid); // Find member details
		redirect('/', 'refresh');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */