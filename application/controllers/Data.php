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
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

		$this->_search();
		$this->rs = $this->db->where('province_id', $this->province_id)->get('school')->result();		
		$this->render('data/school', $this);
	}

	public function search()
	{
		$this->session->set_userdata(array(
			'area_id' => $this->input->post('area_id'),
			'school_size_id' => $this->input->post('school_size_id'),
		));
		redirect('data');
	}

	private function _search()
	{
		$area_id = $this->session->userdata('area_id');
		$school_size_id = $this->session->userdata('school_size_id');

		if ($area_id) {
			$this->db->where('area_id', $area_id);
		}

		if ($school_size_id) {
			$this->db->where('school_size_id', $school_size_id);
		}
	}

	public function id($id)
	{
		$this->rs = $this->sm->getSchool($id);
		$this->render('data/id', $this);

	}

	public function listschool()
	{
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
		$this->school_type = $this->db->where('school_type_name !=', '')->get('school_type')->result();
		$this->render('data/listschool', $this);
	}

	public function listschool2()
	{
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
		$this->school_type = $this->db->select('area_code, area_code_name')->join('school', 'area.area_code = school.area_id')->group_by('area.area_code')->where('province_id', $this->province_id)->get('area')->result();
		$this->render('data/listschool2', $this);
	}

	public function listschoolarea()
	{
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
		$this->school_type = $this->db->where('school_type_name !=', '')->get('school_type')->result();
		$this->province_id = $this->province_id;
		$this->render('data/listschoolarea', $this);
	}

	public function listgender()
	{
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
		$this->school_type = $this->db->where('school_type_name !=', '')->get('school_type')->result();
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
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
		$this->school_type = $this->db->where('school_type_name !=', '')->get('school_type')->result();
		$this->render('data/listteacher', $this);
	}

	public function academic_standing()
	{
		$this->rs = $this->db->get('academic_standing')->result();
		$this->render('data/academic_standing', $this);
	}

	public function school($type)
	{
		if ($type == 'amphur') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->render('data/school/amphur', $this);
		} else if ($type == 'district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->render('data/school/district', $this);
		} else if ($type == 'level-amphur') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();

			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1 - อ.2'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.1 - ป.6'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.1 - ม.3'
								),
								array(
									'level_id' => '04', 
									'level_name' => 'ม.1 - ม.6'
								),
							);
			$this->render('data/school/level-amphur', $this);

		} else if ($type == 'level-district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1 - อ.2'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.1 - ป.6'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.1 - ม.3'
								),
								array(
									'level_id' => '04', 
									'level_name' => 'ม.1 - ม.6'
								),
							);
			$this->render('data/school/level-district', $this);
		} else if ($type == 'spt-amphur') {
			
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();

			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'สพฐ.'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อื่นๆ'
								),
								
							);
			$this->render('data/school/spt-amphur', $this);

		} else if ($type == 'spt-district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'สพฐ.'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อื่นๆ'
								),
								
							);
			$this->render('data/school/spt-district', $this);
		} else if ($type == 'room-amphur') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();

			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.2'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.3'
								),
								
								array(
									'level_id' => '06', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '07', 
									'level_name' => 'ป.2'
								),
								array(
									'level_id' => '08', 
									'level_name' => 'ป.3'
								),
								array(
									'level_id' => '09', 
									'level_name' => 'ป.4'
								),
								array(
									'level_id' => '10', 
									'level_name' => 'ป.5'
								),
								array(
									'level_id' => '11', 
									'level_name' => 'ป.6'
								),
								array(
									'level_id' => '12', 
									'level_name' => 'ม.1'
								),
								array(
									'level_id' => '13', 
									'level_name' => 'ม.2'
								),
								array(
									'level_id' => '14', 
									'level_name' => 'ม.3'
								),
								array(
									'level_id' => '15', 
									'level_name' => 'ม.4'
								),
								array(
									'level_id' => '16', 
									'level_name' => 'ม.5'
								),
								array(
									'level_id' => '17', 
									'level_name' => 'ม.6'
								),
								array(
									'level_id' => '18', 
									'level_name' => 'ปวช.1'
								),
								array(
									'level_id' => '19', 
									'level_name' => 'ปวช.2'
								),
								array(
									'level_id' => '20', 
									'level_name' => 'ปวช.3'
								),
							);
			$this->render('data/school/room-amphur', $this);

		} else if ($type == 'room-district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.2'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.3'
								),
								
								array(
									'level_id' => '06', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '07', 
									'level_name' => 'ป.2'
								),
								array(
									'level_id' => '08', 
									'level_name' => 'ป.3'
								),
								array(
									'level_id' => '09', 
									'level_name' => 'ป.4'
								),
								array(
									'level_id' => '10', 
									'level_name' => 'ป.5'
								),
								array(
									'level_id' => '11', 
									'level_name' => 'ป.6'
								),
								array(
									'level_id' => '12', 
									'level_name' => 'ม.1'
								),
								array(
									'level_id' => '13', 
									'level_name' => 'ม.2'
								),
								array(
									'level_id' => '14', 
									'level_name' => 'ม.3'
								),
								array(
									'level_id' => '15', 
									'level_name' => 'ม.4'
								),
								array(
									'level_id' => '16', 
									'level_name' => 'ม.5'
								),
								array(
									'level_id' => '17', 
									'level_name' => 'ม.6'
								),
								array(
									'level_id' => '18', 
									'level_name' => 'ปวช.1'
								),
								array(
									'level_id' => '19', 
									'level_name' => 'ปวช.2'
								),
								array(
									'level_id' => '20', 
									'level_name' => 'ปวช.3'
								),
							);
			$this->render('data/school/level-district', $this);
		}
	}

	public function student($type)
	{
		if ($type == 'amphur') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->render('data/student/amphur', $this);
		} else if ($type == 'district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->render('data/student/district', $this);
		}  else if ($type == 'level-amphur') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();

			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1 - อ.2'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.1 - ป.6'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.1 - ม.3'
								),
								array(
									'level_id' => '04', 
									'level_name' => 'ม.1 - ม.6'
								),
							);
			$this->render('data/student/level-amphur', $this);

		} else if ($type == 'level-district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1 - อ.2'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.1 - ป.6'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.1 - ม.3'
								),
								array(
									'level_id' => '04', 
									'level_name' => 'ม.1 - ม.6'
								),
							);
			$this->render('data/student/level-district', $this);
		} else if ($type == 'spt-amphur') {
			
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();

			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'สพฐ.'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อื่นๆ'
								),
								
							);
			$this->render('data/student/spt-amphur', $this);

		} else if ($type == 'spt-district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'สพฐ.'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อื่นๆ'
								),
								
							);
			$this->render('data/student/spt-district', $this);
		}  else if ($type == 'room-amphur') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();

			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.2'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.3'
								),
								
								array(
									'level_id' => '06', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '07', 
									'level_name' => 'ป.2'
								),
								array(
									'level_id' => '08', 
									'level_name' => 'ป.3'
								),
								array(
									'level_id' => '09', 
									'level_name' => 'ป.4'
								),
								array(
									'level_id' => '10', 
									'level_name' => 'ป.5'
								),
								array(
									'level_id' => '11', 
									'level_name' => 'ป.6'
								),
								array(
									'level_id' => '12', 
									'level_name' => 'ม.1'
								),
								array(
									'level_id' => '13', 
									'level_name' => 'ม.2'
								),
								array(
									'level_id' => '14', 
									'level_name' => 'ม.3'
								),
								array(
									'level_id' => '15', 
									'level_name' => 'ม.4'
								),
								array(
									'level_id' => '16', 
									'level_name' => 'ม.5'
								),
								array(
									'level_id' => '17', 
									'level_name' => 'ม.6'
								),
								array(
									'level_id' => '18', 
									'level_name' => 'ปวช.1'
								),
								array(
									'level_id' => '19', 
									'level_name' => 'ปวช.2'
								),
								array(
									'level_id' => '20', 
									'level_name' => 'ปวช.3'
								),
							);
			$this->render('data/student/room-amphur', $this);

		} else if ($type == 'room-district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.2'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.3'
								),
								
								array(
									'level_id' => '06', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '07', 
									'level_name' => 'ป.2'
								),
								array(
									'level_id' => '08', 
									'level_name' => 'ป.3'
								),
								array(
									'level_id' => '09', 
									'level_name' => 'ป.4'
								),
								array(
									'level_id' => '10', 
									'level_name' => 'ป.5'
								),
								array(
									'level_id' => '11', 
									'level_name' => 'ป.6'
								),
								array(
									'level_id' => '12', 
									'level_name' => 'ม.1'
								),
								array(
									'level_id' => '13', 
									'level_name' => 'ม.2'
								),
								array(
									'level_id' => '14', 
									'level_name' => 'ม.3'
								),
								array(
									'level_id' => '15', 
									'level_name' => 'ม.4'
								),
								array(
									'level_id' => '16', 
									'level_name' => 'ม.5'
								),
								array(
									'level_id' => '17', 
									'level_name' => 'ม.6'
								),
								array(
									'level_id' => '18', 
									'level_name' => 'ปวช.1'
								),
								array(
									'level_id' => '19', 
									'level_name' => 'ปวช.2'
								),
								array(
									'level_id' => '20', 
									'level_name' => 'ปวช.3'
								),
							);
			$this->render('data/student/room-district', $this);
		} else if ($type == 'room-spt-amphur') {
			
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();

			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.2'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.3'
								),
								
								array(
									'level_id' => '06', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '07', 
									'level_name' => 'ป.2'
								),
								array(
									'level_id' => '08', 
									'level_name' => 'ป.3'
								),
								array(
									'level_id' => '09', 
									'level_name' => 'ป.4'
								),
								array(
									'level_id' => '10', 
									'level_name' => 'ป.5'
								),
								array(
									'level_id' => '11', 
									'level_name' => 'ป.6'
								),
								array(
									'level_id' => '12', 
									'level_name' => 'ม.1'
								),
								array(
									'level_id' => '13', 
									'level_name' => 'ม.2'
								),
								array(
									'level_id' => '14', 
									'level_name' => 'ม.3'
								),
								array(
									'level_id' => '15', 
									'level_name' => 'ม.4'
								),
								array(
									'level_id' => '16', 
									'level_name' => 'ม.5'
								),
								array(
									'level_id' => '17', 
									'level_name' => 'ม.6'
								),
								array(
									'level_id' => '18', 
									'level_name' => 'ปวช.1'
								),
								array(
									'level_id' => '19', 
									'level_name' => 'ปวช.2'
								),
								array(
									'level_id' => '20', 
									'level_name' => 'ปวช.3'
								),
							);

			$this->level2 = array(
								array(
									'level_id' => '01', 
									'level_name' => 'สพฐ.'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อื่นๆ'
								),
								
							);
			$this->render('data/student/room-spt-amphur', $this);

		} else if ($type == 'room-spt-district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.2'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.3'
								),
								
								array(
									'level_id' => '06', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '07', 
									'level_name' => 'ป.2'
								),
								array(
									'level_id' => '08', 
									'level_name' => 'ป.3'
								),
								array(
									'level_id' => '09', 
									'level_name' => 'ป.4'
								),
								array(
									'level_id' => '10', 
									'level_name' => 'ป.5'
								),
								array(
									'level_id' => '11', 
									'level_name' => 'ป.6'
								),
								array(
									'level_id' => '12', 
									'level_name' => 'ม.1'
								),
								array(
									'level_id' => '13', 
									'level_name' => 'ม.2'
								),
								array(
									'level_id' => '14', 
									'level_name' => 'ม.3'
								),
								array(
									'level_id' => '15', 
									'level_name' => 'ม.4'
								),
								array(
									'level_id' => '16', 
									'level_name' => 'ม.5'
								),
								array(
									'level_id' => '17', 
									'level_name' => 'ม.6'
								),
								array(
									'level_id' => '18', 
									'level_name' => 'ปวช.1'
								),
								array(
									'level_id' => '19', 
									'level_name' => 'ปวช.2'
								),
								array(
									'level_id' => '20', 
									'level_name' => 'ปวช.3'
								),
							);
			$this->level2 = array(
								array(
									'level_id' => '01', 
									'level_name' => 'สพฐ.'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อื่นๆ'
								),
								
							);

			$this->render('data/student/room-spt-district', $this);
		} if ($type == 'percentage-amphur') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->render('data/student/percentage-amphur', $this);
		} else if ($type == 'percentage-district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->render('data/student/percentage-district', $this);
		} else if ($type == 'total-room') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			
			$this->render('data/student/total-room', $this);
		} 
	}

	public function teacher($type)
	{
		if ($type == 'amphur') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->render('data/teacher/amphur', $this);
		} else if ($type == 'district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->render('data/teacher/district', $this);
		} else if ($type == 'spt-amphur') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

				$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'สพฐ.'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อื่นๆ'
								),
								
							);

			$this->render('data/teacher/spt-amphur', $this);
		} else if ($type == 'spt-district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'สพฐ.'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อื่นๆ'
								),
								
							);
			$this->render('data/teacher/spt-district', $this);
		} else if ($type == 'teacher-per-student-amphur') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

				$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'สพฐ.'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อื่นๆ'
								),
								
							);

			$this->render('data/teacher/teacher-per-amphur', $this);
		} else if ($type == 'teacher-per-student-district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'สพฐ.'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อื่นๆ'
								),
								
							);
			$this->render('data/teacher/teacher-per-district', $this);
		} else if ($type == 'teacher-per-dep-amphur') {

			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'สพฐ.'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'หน่วยงานอื่น'
								),
							);

			$this->render('data/teacher/teacher-per-dep-amphur', $this);

		} else if ($type == 'teacher-per-dep-district') {

			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'สพฐ.'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'หน่วยงานอื่น'
								),
							);

			$this->render('data/teacher/teacher-per-dep-district', $this);
		} else if ($type == 'education') {

			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.2'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.3'
								),
								
								array(
									'level_id' => '06', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '07', 
									'level_name' => 'ป.2'
								),
								array(
									'level_id' => '08', 
									'level_name' => 'ป.3'
								),
								array(
									'level_id' => '09', 
									'level_name' => 'ป.4'
								),
								array(
									'level_id' => '10', 
									'level_name' => 'ป.5'
								),
								array(
									'level_id' => '11', 
									'level_name' => 'ป.6'
								),
								array(
									'level_id' => '12', 
									'level_name' => 'ม.1'
								),
								array(
									'level_id' => '13', 
									'level_name' => 'ม.2'
								),
								array(
									'level_id' => '14', 
									'level_name' => 'ม.3'
								),
								array(
									'level_id' => '15', 
									'level_name' => 'ม.4'
								),
								array(
									'level_id' => '16', 
									'level_name' => 'ม.5'
								),
								array(
									'level_id' => '17', 
									'level_name' => 'ม.6'
								),
								array(
									'level_id' => '18', 
									'level_name' => 'ปวช.1'
								),
								array(
									'level_id' => '19', 
									'level_name' => 'ปวช.2'
								),
								array(
									'level_id' => '20', 
									'level_name' => 'ปวช.3'
								),
							);
			$this->educations = $this->db->get('edu')->result();

			$this->render('data/teacher/education', $this);
		} else if ($type == 'academic-standing') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.2'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.3'
								),
								
								array(
									'level_id' => '06', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '07', 
									'level_name' => 'ป.2'
								),
								array(
									'level_id' => '08', 
									'level_name' => 'ป.3'
								),
								array(
									'level_id' => '09', 
									'level_name' => 'ป.4'
								),
								array(
									'level_id' => '10', 
									'level_name' => 'ป.5'
								),
								array(
									'level_id' => '11', 
									'level_name' => 'ป.6'
								),
								array(
									'level_id' => '12', 
									'level_name' => 'ม.1'
								),
								array(
									'level_id' => '13', 
									'level_name' => 'ม.2'
								),
								array(
									'level_id' => '14', 
									'level_name' => 'ม.3'
								),
								array(
									'level_id' => '15', 
									'level_name' => 'ม.4'
								),
								array(
									'level_id' => '16', 
									'level_name' => 'ม.5'
								),
								array(
									'level_id' => '17', 
									'level_name' => 'ม.6'
								),
								array(
									'level_id' => '18', 
									'level_name' => 'ปวช.1'
								),
								array(
									'level_id' => '19', 
									'level_name' => 'ปวช.2'
								),
								array(
									'level_id' => '20', 
									'level_name' => 'ปวช.3'
								),
							);
			$this->academic = $this->db->get('academic_standing')->result();

			$this->render('data/teacher/academic', $this);
		}  else if ($type == 'age') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.2'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.3'
								),
								
								array(
									'level_id' => '06', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '07', 
									'level_name' => 'ป.2'
								),
								array(
									'level_id' => '08', 
									'level_name' => 'ป.3'
								),
								array(
									'level_id' => '09', 
									'level_name' => 'ป.4'
								),
								array(
									'level_id' => '10', 
									'level_name' => 'ป.5'
								),
								array(
									'level_id' => '11', 
									'level_name' => 'ป.6'
								),
								array(
									'level_id' => '12', 
									'level_name' => 'ม.1'
								),
								array(
									'level_id' => '13', 
									'level_name' => 'ม.2'
								),
								array(
									'level_id' => '14', 
									'level_name' => 'ม.3'
								),
								array(
									'level_id' => '15', 
									'level_name' => 'ม.4'
								),
								array(
									'level_id' => '16', 
									'level_name' => 'ม.5'
								),
								array(
									'level_id' => '17', 
									'level_name' => 'ม.6'
								),
								array(
									'level_id' => '18', 
									'level_name' => 'ปวช.1'
								),
								array(
									'level_id' => '19', 
									'level_name' => 'ปวช.2'
								),
								array(
									'level_id' => '20', 
									'level_name' => 'ปวช.3'
								),
							);
			$this->age = array(
				array(
					'age_id' => '01',
					'age_name' => 'ต่ำกว่า 25 ปี',
				), 
				array(
					'age_id' => '02',
					'age_name' => '25 - 35 ปี',
				), 
				array(
					'age_id' => '03',
					'age_name' => '36 - 45 ปี',
				), 
				array(
					'age_id' => '04',
					'age_name' => '46 - 55 ปี',
				), 

				array(
					'age_id' => '05',
					'age_name' => '55 ปี ขึ้นไป',
				), 
			);

			$this->render('data/teacher/age', $this);
		} else if ($type == 'total-teach') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.2'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.3'
								),
								
								array(
									'level_id' => '06', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '07', 
									'level_name' => 'ป.2'
								),
								array(
									'level_id' => '08', 
									'level_name' => 'ป.3'
								),
								array(
									'level_id' => '09', 
									'level_name' => 'ป.4'
								),
								array(
									'level_id' => '10', 
									'level_name' => 'ป.5'
								),
								array(
									'level_id' => '11', 
									'level_name' => 'ป.6'
								),
								array(
									'level_id' => '12', 
									'level_name' => 'ม.1'
								),
								array(
									'level_id' => '13', 
									'level_name' => 'ม.2'
								),
								array(
									'level_id' => '14', 
									'level_name' => 'ม.3'
								),
								array(
									'level_id' => '15', 
									'level_name' => 'ม.4'
								),
								array(
									'level_id' => '16', 
									'level_name' => 'ม.5'
								),
								array(
									'level_id' => '17', 
									'level_name' => 'ม.6'
								),
								array(
									'level_id' => '18', 
									'level_name' => 'ปวช.1'
								),
								array(
									'level_id' => '19', 
									'level_name' => 'ปวช.2'
								),
								array(
									'level_id' => '20', 
									'level_name' => 'ปวช.3'
								),
							);
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->render('data/teacher/total-teach', $this);
		} else if ($type == 'cert') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->level = array(
								array(
									'level_id' => '01', 
									'level_name' => 'อ.1'
								),
								array(
									'level_id' => '02', 
									'level_name' => 'อ.2'
								),
								array(
									'level_id' => '03', 
									'level_name' => 'อ.3'
								),
								
								array(
									'level_id' => '06', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '07', 
									'level_name' => 'ป.2'
								),
								array(
									'level_id' => '08', 
									'level_name' => 'ป.3'
								),
								array(
									'level_id' => '09', 
									'level_name' => 'ป.4'
								),
								array(
									'level_id' => '10', 
									'level_name' => 'ป.5'
								),
								array(
									'level_id' => '11', 
									'level_name' => 'ป.6'
								),
								array(
									'level_id' => '12', 
									'level_name' => 'ม.1'
								),
								array(
									'level_id' => '13', 
									'level_name' => 'ม.2'
								),
								array(
									'level_id' => '14', 
									'level_name' => 'ม.3'
								),
								array(
									'level_id' => '15', 
									'level_name' => 'ม.4'
								),
								array(
									'level_id' => '16', 
									'level_name' => 'ม.5'
								),
								array(
									'level_id' => '17', 
									'level_name' => 'ม.6'
								),
								array(
									'level_id' => '18', 
									'level_name' => 'ปวช.1'
								),
								array(
									'level_id' => '19', 
									'level_name' => 'ปวช.2'
								),
								array(
									'level_id' => '20', 
									'level_name' => 'ปวช.3'
								),
							);

			$this->cert = array(
				array(
					'cert_id' => '01',
					'name' => 'ครู'
				),
				array(
					'cert_id' => '01',
					'name' => 'ครูพี่เลี้ยง'
				),
			);
			$this->render('data/teacher/cert', $this);
		} else if ($type == 'lack-amphur') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();
			$this->render('data/teacher/lack-amphur', $this);
		} else if ($type == 'lack-district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->render('data/teacher/lack-district', $this);
		} else if ($type == 'lack-school') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();
			$this->render('data/teacher/lack-school', $this);
		}
	}


	public function forecast($type) {
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();

		$ar = array();
		for($i=1; $i<=7; $i++) {
			$ar[] = array(
				'id' => sprintf('%02d', $i),
				'name' => $i.' ขวบ'
			);
		}
		$this->age = $ar;
			
		if ($type == 'age-7-amphur') {

			$this->render('data/forecast/age-7-amphur', $this);
		} else if ($type == 'age-7-district') {

			$this->render('data/forecast/age-7-district', $this);
		} else if ($type == 'a1-amphur') {
			$this->render('data/forecast/a1-amphur', $this);
		} else if ($type == 'a1-district') {
			$this->render('data/forecast/a1-district', $this);
		} else if ($type == 'a1-school') {
			$this->render('data/forecast/a1-school', $this);
		} else if ($type == 'a23-amphur') {
			$this->render('data/forecast/a2-amphur', $this);
		} else if ($type == 'a23-district') {
			$this->render('data/forecast/a2-district', $this);
		} else if ($type == 'a23-school') {
			$this->render('data/forecast/a2-school', $this);
		} else if ($type == 'p1-amphur') {
			$this->render('data/forecast/p1-amphur', $this);
		} else if ($type == 'p1-district') {
			$this->render('data/forecast/p1-district', $this);
		} else if ($type == 'p1-school') {
			$this->render('data/forecast/p1-school', $this);
		}
	}

	public function study($type) {
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();

		
			
		if ($type == 'p6-amphur') {
			$this->render('data/study/p6-amphur', $this);

		} else if ($type == 'p6-district') {
			$this->render('data/study/p6-district', $this);

		} else if ($type == 'p6-school') {
			$this->render('data/study/p6-school', $this);

		} else if ($type == 'a1-amphur') {
			$this->render('data/study/a1-amphur', $this);
		} else if ($type == 'a1-district') {
			$this->render('data/study/a1-district', $this);
		} else if ($type == 'a1-school') {
			$this->render('data/study/a1-school', $this);
		} else if ($type == 'm3-amphur') {
			$this->render('data/study/m3-amphur', $this);
		} else if ($type == 'm3-district') {
			$this->render('data/study/m3-district', $this);
		} else if ($type == 'm3-school') {
			$this->render('data/study/m3-school', $this);
		}
	}


	public function enrolment($type) {
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();

		
			
		if ($type == 'p-amphur') {
			$this->render('data/enrolment/p-amphur', $this);

		} else if ($type == 'p-district') {
			$this->render('data/enrolment/p-district', $this);

		} else if ($type == 'p-school') {
			$this->render('data/enrolment/p-school', $this);

		} else if ($type == 'm1-amphur') {
			$this->render('data/enrolment/m1-amphur', $this);

		} else if ($type == 'm1-district') {
			$this->render('data/enrolment/m1-district', $this);

		} else if ($type == 'm1-school') {
			$this->render('data/enrolment/m1-school', $this);

		} else if ($type == 'm4-amphur') {
			$this->render('data/enrolment/m4-amphur', $this);
		} else if ($type == 'm4-district') {
			$this->render('data/enrolment/m4-district', $this);
		} else if ($type == 'm4-school') {
			$this->render('data/enrolment/m4-school', $this);
		}
	}


	public function area($type) {
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();

		
			
		if ($type == 'school') {
			$this->render('data/area/school', $this);

		} else if ($type == 'map') {
			$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

			$this->render('data/area/map', $this);

		} 
	}

	public function map($area_code)
	{
		$this->render('data/map');
	}
}