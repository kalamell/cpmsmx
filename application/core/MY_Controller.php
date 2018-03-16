<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	protected $province_code;
	protected $province_id;
	public function __construct()
	{
		parent::__construct();
		$this->updateField();
		
		$rs = $this->db->select('province_id')->get('config');
		$this->province_id = $rs->row()->province_id;
	}

	protected function render($view, $data = array()) 
	{
		$this->load->view('header', $data);
		$this->load->view($view, $data);
		$this->load->view('footer', $data);
	}

	private function updateField()
	{
		$this->load->dbforge();
		if (!$this->db->field_exists('logo', 'config')) {
			$fields = array(
			        'logo' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE, 'after' => 'title')
			);
			$this->dbforge->add_column('config', $fields);
		}


		if (!$this->db->field_exists('province_id', 'config')) {
			$fields = array(
			        'province_id' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE, 'after' => 'logo')
			);
			$this->dbforge->add_column('config', $fields);
		}

		$province_code = $this->config->item('province_code');
		$rs2 = $this->db->where('PROVINCE_CODE', $province_code)->get('province');
		$province_id = $rs2->row()->PROVINCE_ID;

		$rs = $this->db->get('config')->row();
		if ($rs->province_id == null) {
			$this->db->update('config', array(
				'province_id' => $province_id
			));
		}

	}
}

class Backend extends CI_Controller
{
	protected $province_code;
	protected $province_id;
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id')==NULL) redirect('login');

		if (!isStaff()) redirect('login');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->session->set_flashdata('save', 1);
		}

		$rs = $this->db->select('province_id')->get('config');
		$this->province_id = $rs->row()->province_id;
		
	}

	protected function render($view, $data = array()) 
	{
		$this->load->view('header', $data);
		$this->load->view('backend/'.$view, $data);
		$this->load->view('footer', $data);
	}
}

class Base_Member extends CI_Controller {

	protected $province_code;
	protected $province_id;
	

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id')==NULL) redirect('login');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->session->set_flashdata('save', 1);
		}

		$rs = $this->db->select('province_id')->get('config');
		$this->province_id = $rs->row()->province_id;
		
		
	}

	protected function render($view, $data = array()) 
	{
		$this->load->view('header', $data);
		$this->load->view($view, $data);
		$this->load->view('footer', $data);
	}
}


