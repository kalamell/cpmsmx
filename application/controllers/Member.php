<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends Base_Member {
	private $member_id;
	public function __construct()
	{
		parent::__construct();
		$this->member_id = $this->session->userdata('id');

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
