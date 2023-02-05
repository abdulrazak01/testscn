<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
	    date_default_timezone_set('Asia/Jakarta');
	    // $this->load->model('m_employee');
	}

	public function index()
	{
		// $this->m_employee->update_status_emp();
		$this->usertemp->view('master_data/dashboard');
	}
	
}
