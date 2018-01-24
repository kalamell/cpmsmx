<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends Base {

	public function __construct()
	{
		parent::__construct();
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
}
