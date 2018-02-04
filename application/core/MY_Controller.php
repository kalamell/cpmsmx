<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function __construct()
	{
		parent::__construct();


	}

	protected function render($view, $data = array()) 
	{
		$this->load->view('header', $data);
		$this->load->view($view, $data);
		$this->load->view('footer', $data);
	}
}

/**
* 
*/
class Backend extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id')==NULL) redirect('login');

		if (!isStaff()) redirect('login');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->session->set_flashdata('save', 1);
		}
		
	}

	protected function render($view, $data = array()) 
	{
		$this->load->view('header', $data);
		$this->load->view('backend/'.$view, $data);
		$this->load->view('footer', $data);
	}
}

class Base_Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id')==NULL) redirect('login');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->session->set_flashdata('save', 1);
		}
		
	}

	protected function render($view, $data = array()) 
	{
		$this->load->view('header', $data);
		$this->load->view($view, $data);
		$this->load->view('footer', $data);
	}
}


