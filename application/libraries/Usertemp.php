<?php
	/**
	 * 
	 */
	class Usertemp {

		protected $_CI;

		function __construct(){
			$this->_CI = &get_instance();
		}

		function view($usertemp,$data=null){
			$this->_CI->load->view('tempuser/front_header');
			$this->_CI->load->view($usertemp,$data);
			$this->_CI->load->view('tempuser/front_footer');
		}
	}
?>