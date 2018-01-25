<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('school_model', 'sm');
	}
	public function index()
	{
		$this->area = $this->db->select('f1, f2')->group_by('f1')->get('school')->result();
		$this->type = $this->db->select('f24')->group_by('f24')->where('f24 !=', '')->order_by('f24', 'asc')->get('school')->result();
		$this->ar = '';
		$this->p_type = '';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->input->post('f1') == NULL && $this->input->post('f24') == NULL) {
				redirect('data');
			}
			
			if ($this->input->post('f1') != '') {
				$this->db->where('f1', $this->input->post('f1'));
			}

			if ($this->input->post('f24') != '') {
				$this->db->where('f24', $this->input->post('f24'));
			}
			$this->ar = $this->input->post('f1');
			$this->p_type = $this->input->post('f24');

		}

		$this->rs = $this->db->get('school')->result();
		
		$this->render('data/school', $this);
	}

	public function id($id)
	{
		$this->rs = $this->sm->getSchool($id);
		$this->render('data/id', $this);

	}

	public function listschool()
	{
		$this->rs = $this->db->group_by('f13')->get('school')->result();
		$this->render('data/listschool', $this);
	}

	public function listgender()
	{
		$this->rs = $this->db->group_by('f13')->get('school')->result();
		$this->render('data/listgender', $this);
	}

	public function listgender_level()
	{
		$this->rs = $this->db->get('level')->result();
		$this->render('data/listgender_level', $this);
	}

	public function listroom()
	{
		$this->rs = $this->db->get('level')->result();
		$this->render('data/listroom', $this);
	}

	public function listteacher()
	{
		$this->rs = $this->db->get('edu')->result();
		$this->render('data/listteacher', $this);
	}

	public function academic_standing()
	{
		$this->rs = $this->db->get('academic_standing')->result();
		$this->render('data/academic_standing', $this);
	}
}
