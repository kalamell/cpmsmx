<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends Base_Member {
	private $member_id;
	private $school_id;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model', 'mm');
		$this->load->model('school_model', 'sm');
		$this->member_id = $this->session->userdata('id');
		$this->school_id = $this->mm->getSchool();
	}
	public function index()
	{
		$r = $this->db->where('id', $this->member_id)->get('member')->row();

		$this->r = $r;

		$this->area = $this->db->select('f1, f2')->group_by('f1')->get('school')->result();
		$this->school = $this->db->where(array('f1' => $r->area, 'f6' => $r->school))->get('school')->result();		

		$this->render('member/index', $this);
	}


	public function school()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$upload = array(
				'upload_path' => './upload/',
				'allowed_types' => 'jpg|png|gif|JPEG|PNG',
				'file_name' => $this->school_id,
			);
			$this->load->library('upload', $upload);
			if ($this->upload->do_upload('sign_school')) {
				$data = $this->upload->data();
				$this->db->where('f6', $this->school_id)->update('school', array(
					'sign_school' => $data['file_name']
				));
			}
			redirect('member/school');
		}
		$this->rs = $this->sm->getSchool($this->school_id);
		
		$this->render('member/school', $this);
	}


	public function data_school($step)
	{
		if ($step==1) {
			$this->load->view('member/school/data1');
		}

	}

	public function update()
	{
		if ($this->input->post('password') != NULL) {
			$this->db->set('password', do_hash($this->input->post('password')));
		}
		$this->db->set('updated_date', 'NOW()', false)->where('id', $this->member_id)->update('mebmer', array(
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'mobile' => $this->input->post('mobile'),
			'telephone' => $this->input->post('telephone'),
		));


		redirect('member');
	}
}
