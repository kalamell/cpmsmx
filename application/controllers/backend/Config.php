<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends Backend {
	public function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{
		$this->r = $this->db->limit(1)->get('config')->row();
		$this->render('config', $this);
	}

	public function update()
	{
		$config = array(
			array(
				'field' => 'id',
				'rules' => 'required'
			),
			
			array(
				'field' => 'footer',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == false) redirect('backend/config');

		$this->db->where('id', $this->input->post('id'))->update('config', array(
			'title' => $this->input->post('title'),
			'footer' => $this->input->post('footer')
		));

		redirect('backend/config');
	}

}