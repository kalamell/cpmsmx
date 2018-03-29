<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends Backend {
	public function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{
		$this->rs = $this->db->get('member')->result();
		$this->render('member/index', $this);
	}

	public function add()
	{
		$this->province = $this->db->get('province')->result();
		$this->render('member/add', $this);
	}

	public function edit($id)
	{
		$this->r = $this->db->where('id', $id)->get('member')->row();
		$this->render('member/edit', $this);
	}


	public function dosave()
	{
		$config = array(
			
			array(
				'field' => 'name',
				'rules' => 'required'
			),
			array(
				'field' => 'surname',
				'rules' => 'required'
			),

			array(
				'field' => 'username',
				'rules' => 'required|is_unique[member.username]'
			),

			array(
				'field' => 'password',
				'rules' => 'required'
			),

		);
		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('save', '');
			redirect('backend/member/add');
		}

		$this->db->insert('member', array(
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'username' => $this->input->post('username'),
			'password' => do_hash($this->input->post('password')),
			'active' => $this->input->post('active'),
			'status' => $this->input->post('status'),
		));

		redirect('backend/member');

	}


	public function update()
	{
		$w = '';

		$rs = $this->db->where('username', $this->input->post('username'))->where('id !=', $this->input->post('id'))->get('member');
		if ($rs->num_rows() > 0) {
			$w = '|is_unique[member.username]';
		}

		$config = array(
			array(
				'field' => 'id',
				'rules' => 'required'
			),
			array(
				'field' => 'name',
				'rules' => 'required'
			),
			array(
				'field' => 'surname',
				'rules' => 'required'
			),

			array(
				'field' => 'username',
				'rules' => 'required'.$w
			),

		);
		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('save', '');
			redirect('backend/member/add');
		}

		if ($this->input->post('password')!=NULL) {
			$this->db->set('password', do_hash($this->input->post('password')));
		}

		$this->db->where('id', $this->input->post('id'))->update('member', array(
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'username' => $this->input->post('username'),
			'active' => $this->input->post('active'),
			'status' => $this->input->post('status'),
		));

		redirect('backend/member');

	}


	public function delete($id)
	{
		$this->db->where('id', $id)->delete('member');
		redirect('backend/member');

	}

}