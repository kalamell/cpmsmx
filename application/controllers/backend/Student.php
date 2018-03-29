<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends Backend {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('school_model', 'sm');
	} 

	public function index()
	{
		$this->rs = $this->db->order_by('age', 'asc')->get('school_student_age')->result();
		$this->render('student/index', $this);
	}


	public function update_age_data()
	{
		$this->sm->update_age_data($this->input->post('term'), $this->input->post('years'));
		redirect('backend/student');
	}
}