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
		redirect('');
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
									'level_id' => '04', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '05', 
									'level_name' => 'ป.2'
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
									'level_id' => '04', 
									'level_name' => 'ป.1'
								),
								array(
									'level_id' => '05', 
									'level_name' => 'ป.2'
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
}