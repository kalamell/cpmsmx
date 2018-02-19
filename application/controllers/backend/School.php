<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends Backend {
	public function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{
		$this->rs = $this->db->get('school')->result();
		$this->render('school/index', $this);
	}

	public function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			

			$this->db->insert('school', array(
				'school_id'          => $this->input->post('school_id'),
				'f7'                 => $this->input->post('f7'),
				'f8'                 => $this->input->post('f8'),
				'province_school_id' => $this->input->post('province_school_id'),
				'school_name'        => $this->input->post('school_name'),
				'school_name_en'     => $this->input->post('school_name_en'),
				'area_id'            => $this->input->post('area_id'),
				'school_head'        => $this->input->post('school_head'),
				'f21'                => $this->input->post('f21'),
				'school_no'          => $this->input->post('school_no'),
				'f11'                => $this->input->post('f11'),
				'moo'                => $this->input->post('moo'),
				'road'               => $this->input->post('road'),
				'district_id'        => $this->input->post('district_id'),
				'amphur_id'          => $this->input->post('amphur_id'),
				'province_id'        => $this->input->post('province_id'),
				'zipcode'            => $this->input->post('zipcode'),
				'telephone'          => $this->input->post('telephone'),
				'telephone2'         => $this->input->post('telephone2'),
				'fax'                => $this->input->post('fax'),
				'fax2'               => $this->input->post('fax2'),
				'email'              => $this->input->post('email'),
				'website'            => $this->input->post('website'),
				'land'               => $this->input->post('land'),
				'wat'                => $this->input->post('wat'),
				'lat'                => $this->input->post('lat'),
				'lng'                => $this->input->post('lng'),
			));

			$upload = array(
				'upload_path' => './upload/',
				'allowed_types' => 'jpg|png|gif|JPEG|PNG',
				'file_name' => $this->input->post('school_id'),
			);
			$this->load->library('upload', $upload);
			if ($this->upload->do_upload('sign_school')) {
				$data = $this->upload->data();
				$this->db->where('school_id', $this->input->post('school_id'))->update('school', array(
					'sign_school' => $data['file_name']
				));
			}

			redirect('backend/school/add');
		}

		$this->area = $this->db->get('area_type')->result();
		$this->province = $this->db->get('province')->result();

		$this->render('school/add', $this);
	}

}