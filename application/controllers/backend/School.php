<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends Backend {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	} 

	public function index()
	{
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';	
		$config["first_link"] = "&laquo;";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";
		$config["last_link"] = "&raquo;";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '<li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['base_url'] = site_url('backend/school/index');
		$config['total_rows'] = $this->db->count_all_results('school');
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;
		$this->rs = $this->db->join('area', 'school.area_id = area.area_code')->limit($config['per_page'], $this->uri->segment(4))->get('school')->result();

		$this->pagination->initialize($config);

		$this->render('school/index', $this);
	}

	private function getAreaId($area_code, $area_code_name)
	{
		$rs = $this->db->where('area_code', $area_code)->get('area');
		if ($rs->num_rows() == 0) {
			$this->db->insert('area', array(
				'area_code' => $area_code,
				'area_code_name' => $area_code_name
			));
		} else {
			$this->db->where('area_code', $area_code)->update('area', array(
				'area_code_name' => $area_code_name
			));
		}

		return $area_code;
	}

	private function getSchoolType($school_type_name) 
	{
		$rs = $this->db->where('school_type_name', $school_type_name)->get('school_type');
		if ($rs->num_rows() == 0) {
			$this->db->insert('school_type', array(
				'school_type_name' => $school_type_name
			));
			return $this->db->insert_id();
		} else {
			return $rs->row()->school_type_id;
		}
	}

	private function getSchoolSize($school_size_id) 
	{
		$rs = $this->db->where('school_size_id', $school_size_id)->get('school_size');
		if ($rs->num_rows() == 0) {
			$this->db->insert('school_size', array(
				'school_size_id' => $school_size_id
			));
			return $school_size_id;
		} else {
			return $rs->row()->school_size_id;
		}
	}


	private function getGroupId($area_code, $group_name) 
	{
		$rs = $this->db->where('area_code', $area_code)->where('group_name', $group_name)->get('groups');
		if ($rs->num_rows() == 0) {
			$this->db->insert('groups', array(
				'area_code' => $area_code,
				'group_name' => $group_name
			));
			return $this->db->insert_id();
		} else {
			return $rs->row()->group_id;
		}
	}

	public function import()
	{
		$config['upload_path']          = './upload/data/';
        $config['allowed_types']        = 'csv';
        $config['file_name']            = time();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$data = $this->upload->data();

        	

			$handle = fopen("./upload/data/".$data['file_name'], "r");
			$k = 0;
			while (($data = fgets($handle)) !== FALSE) {
			    if ($k > 0) {
			    	list($geo_id, $province_code, $no, $area_code, $area_code_name, $school_name, $school_name_en, $school_head, $obec_id, $school_id, $f8, $school_type_name, $group_name, $moo, $tumbon, $amphur, $province, $zipcode, $email, $website, $opt, $mobile, $fax, $startdate, $land1, $land2, $type, $pea, $date) = explode("\t", $data);
					
					//echo $pk.'-'.$stkey.' - '.$no.'-'.$area_code.'-'.$area_code_name.'-'.$school_name.'-'.$school_name_en.'-'.$code10.'-'.$code8.'-'.$school_type_name.'-'.$group_name.'<br>';

			    	$check = $this->db->where('school_id', $school_id)->get('school');
			    	$area_code = $this->getAreaId($area_code, $area_code_name);
			    	$school_type_id = $this->getSchoolType($school_type_name);
			    	$group_id = $this->getGroupId($area_code, $group_name);
			    	$school_size_id = $this->getSchoolSize($type);

			    	$province_id = $this->db->where('PROVINCE_CODE', $province_code)->get('province')->row()->PROVINCE_ID;

			    	$amphur_id = $this->getAmphur($province_id, $amphur);
			    	$district_id = $this->getDistrict($province_id, $amphur_id, $tumbon);


			    	if ($check->num_rows() == 0) {
			    		$this->db->insert('school', array(
			    			'geo_id' => $geo_id,
			    			'area_id' => $area_code,
			    			'province_code' => $province_code,
			    			'school_name' => $school_name,
			    			'school_name_en' => $school_name_en,
			    			'school_head' => $school_head,
			    			'obec_id' => $obec_id,
			    			'school_id' => $school_id,
			    			'f8' => $f8,
			    			'school_type_id' => $school_type_id,
			    			'f9' => $school_type_name,
			    			'group_id' => $group_id,
			    			'zipcode' => $zipcode,
			    			'email' => $email,
			    			'website' => $website,
			    			'telephone' => $mobile,
			    			'fax' => $fax,
			    			'school_size_id' => $school_size_id,
			    			'moo' => $moo,
			    			'province_id' => $province_id,
			    			'amphur_id' => $amphur_id,
			    			'district_id' => $district_id,
			    		));


			    		


			    	}

			    }
			    $k++;
			}
			fclose($handle);


        } 
        redirect('backend/school');
	}

	public function getAmphur($province_id, $amphur)
	{
		$rs = $this->db->where('PROVINCE_ID', $province_id)->like('AMPHUR_NAME', $amphur)->get('amphur');
		return $rs->row()->AMPHUR_ID;
	}

	public function getDistrict($province_id, $amphur_id, $name)
	{
		$rs = $this->db->where('PROVINCE_ID', $province_id)->where('AMPHUR_ID', $amphur_id)->like('DISTRICT_NAME', $name)->get('district');
		return $rs->row()->DISTRICT_ID;

	}

	public function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			

			$this->db->insert('school', array(
				'school_id'                 => $this->input->post('school_id'),
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
				'org_type_id'                => $this->input->post('org_type_id'),
				'm_id'                => $this->input->post('m_id'),
				'dep_id'                => $this->input->post('dep_id'),
				'mun_id'                => $this->input->post('mun_id'),
				'ins_id'                => $this->input->post('ins_id'),
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

		$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

		$this->province = $this->db->where('PROVINCE_ID', $this->province_id)->get('province')->result();
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('AMPHUR_ID', $this->rs->amphur_id)->get('district')->result();


		$this->org_type = $this->db->get('org_type')->result(); //สังกัด
		$this->ministry = $this->db->get('ministry')->result(); //กระทยวง
		$this->department = $this->db->get('department')->result(); //สำนัก
		$this->municipal = $this->db->get('municipal')->result(); //เขตเทศบาล
		$this->inspect = $this->db->get('inspect')->result(); // เขตตรวจราชการ

		

		$this->school_sub = $this->db->where('area_id', $this->rs->area_id)->get('school')->result();
		$this->school_room_sub = $this->db->where('school_id', $this->school_id)->get('school_room_sub')->result();

		$this->room_level = $this->db->order_by('rmid', 'ASC')->order_by('sort', 'ASC')->get('room_level')->result();

		$this->render('school/add', $this);
	}

}