<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	protected $province_code;
	protected $province_id;
	protected $config_id;
	public function __construct()
	{
		parent::__construct();
		$this->updateField();

		$dat = array_shift((explode('.', $_SERVER['HTTP_HOST'])));
		$rs = $this->db->select('config.id, config.province_id')
				->where('province.PROVINCE_CODE', $dat)
				->join('province', 'config.province_id = province.PROVINCE_ID')->get('config');

		

		$this->province_id = $rs->row()->province_id;
		$this->province_code = $dat;
		$this->config_id = $rs->row()->id;
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

		
		$rs2 = $this->db->where('PROVINCE_CODE', $this->province_code)->get('province');
		$province_id = $this->province_id;

		$rs = $this->db->get('config')->row();
		if ($rs->province_id == null) {
			$this->db->update('config', array(
				'province_id' => $province_id
			));
		}


		if (!$this->db->field_exists('type_website', 'config')) {
			$fields = array(
				'type_website' => array('type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE, 'after' => 'footer')
			);
			$this->dbforge->add_column('config', $fields);
		}

		if (!$this->db->field_exists('config_id', 'news')) {
			$fields = array(
				'config_id' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE, 'after' => 'created_date')
			);
			$this->dbforge->add_column('news', $fields);

		}

	}
}

class Backend extends CI_Controller
{
	protected $province_code;
	protected $province_id;
	protected $config_id;
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id')==NULL) redirect('login');

		if (!isStaff()) redirect('login');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->session->set_flashdata('save', 1);
		}

		$dat = array_shift((explode('.', $_SERVER['HTTP_HOST'])));
		$rs = $this->db->select('config.id, config.province_id')
				->where('province.PROVINCE_CODE', $dat)
				->join('province', 'config.province_id = province.PROVINCE_ID')->get('config');

		

		$this->province_id = $rs->row()->province_id;
		$this->province_code = $dat;
		$this->config_id = $rs->row()->id;
		
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


