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
		$this->menu_config = $this->db->order_by('sort', 'asc')->get('menu_config')->result();
		$this->menu_sub = $this->db->order_by('sub_sort', 'asc')->get('menu_sub')->result();
		$this->menu_website = $this->db->where('province_id', $this->province_id)->get('menu_website')->result();
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
		if ($this->form_validation->run()) {
			$this->db->where('id', $this->input->post('id'))->update('config', array(
				'title' => $this->input->post('title'),
				'footer' => $this->input->post('footer')
			));
		}

		$menu = $this->input->post('menu_sub');

		if (count($menu) > 0) {
			$this->db->where('province_id', $this->province_id)->delete('menu_website');

			foreach($menu as $k => $sub_id)
			{
				$this->db->insert('menu_website', array(
					'province_id' => $this->province_id,
					'sub_id' => $sub_id
				));
			}
		}

		redirect('backend/config');
	}

}