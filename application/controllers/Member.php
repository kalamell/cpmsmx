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

		$this->area = $this->db->where('province_id', $this->province_id)->get('area_type')->result();
		$this->school = $this->db->where(array('area_type_id' => $r->area_type_id))->get('school')->result();		

		$this->render('member/index', $this);
	}


	public function school($term, $year)
	{
		if ($term == '' || $year == '') redirect('member/term');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->input->post('tab') == '1') {
				$upload = array(
					'upload_path' => './upload/',
					'allowed_types' => 'jpg|png|gif|JPEG|PNG',
					'file_name' => $this->school_id,
				);
				$this->load->library('upload', $upload);
				if ($this->upload->do_upload('sign_school')) {
					$data = $this->upload->data();
					$this->db->where('school_id', $this->school_id)->update('school', array(
						'sign_school' => $data['file_name']
					));
				}

				$this->db->where('school_id', $this->school_id)->update('school', array(
					//'f7'                 => $this->input->post('f7'),
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
					'area_type_id'       => $this->input->post('area_type_id'),
					'type_school'       => $this->input->post('type_school'),
				));

				redirect('member/school/'.$term.'/'.$year.'#tab1');
			}

			if ($this->input->post('tab') == '2') {
				

				$this->db->where('school_id', $this->school_id)->update('school', array(
					'school_sub_id'  => $this->input->post('school_sub_id'),
					'state_live'     => $this->input->post('state_live'),
					'state_focus'     => $this->input->post('state_focus'),
				));

				
				redirect('member/school/'.$term.'/'.$year.'#tab2');

			}

			if ($this->input->post('tab') == 'room') {
				$this->db->where(array(
					'school_id' => $this->school_id,
					'term_id' => $term,
					'year_id' => $year,
				))->update('school_room', array(
					'a1'     => $this->input->post('a1'),
					'a2'     => $this->input->post('a2'),
					'a3'     => $this->input->post('a3'),
					'p1'     => $this->input->post('p1'),
					'p2'     => $this->input->post('p2'),
					'p3'     => $this->input->post('p3'),
					'p4'     => $this->input->post('p4'),
					'p5'     => $this->input->post('p5'),
					'p6'     => $this->input->post('p6'),
					'm1'     => $this->input->post('m1'),
					'm2'     => $this->input->post('m2'),
					'm3'     => $this->input->post('m3'),
					'm4'     => $this->input->post('m4'),
					'm5'     => $this->input->post('m5'),
					'm6'     => $this->input->post('m6'),
					'pvc1'   => $this->input->post('pvc1'),
					'pvc2'   => $this->input->post('apvc2'),
					'pvc3'   => $this->input->post('pvc3'),
				));
				redirect('member/school/'.$term.'/'.$year.'#tab8');

			}

			if ($this->input->post('tab') == 'class') {
				$this->db->where('school_id', $this->school_id)->update('school', array(
					'rmid_start' => $this->input->post('rmid_start'),
					'rmid_end' => $this->input->post('rmid_end'),
				));
				redirect('member/school/'.$term.'/'.$year.'#tab7');

			}
			
		}
		$this->rs = $this->sm->getSchool($this->school_id);

		$chk = $this->db->where(array(
			'school_id' => $this->school_id,
			'term_id' => $term,
			'year_id' => $year,
		))->get('school_room');
		if ($chk->num_rows() == 0) {
			$this->db->insert('school_room', array(
				'school_id' => $this->school_id,
				'term_id' => $term,
				'year_id' => $year,
			));

			$this->school_room = $this->db->where(array(
				'school_id' => $this->school_id,
				'term_id' => $term,
				'year_id' => $year,
			))->get('school_room')->row();
		}  else {
			$this->school_room = $chk->row();
		}

		$this->term = $this->db->where('term_id', $term)->get('term')->row();
		$this->year = $this->db->where('year_id', $year)->get('years')->row();
		$this->area = $this->db->get('area_type')->result();
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

		$r = $this->rs;
		$this->area_type = $this->db->where('province_id', $this->province_id)->where("type", $r->type_school)->get('area_type')->result();

		$this->r = $r;

		$this->render('member/school', $this);
	}

	public function save_room_level()
	{
		$this->db->insert('school_room_sub', array(
			'school_id' => $this->school_id,
			'level' => $this->input->post('level'),
			'boy' => $this->input->post('boy'),
			'girl' => $this->input->post('girl'),
			'school_main_name' => $this->input->post('school_main_name')
		));
	}

	public function add_room_level($term, $year, $rmid)
	{
		$this->load->view('member/school/add_room_level');
	}

	public function save_room()
	{

		$this->db->insert('school_room_level', array(
			'school_id' => $this->school_id,
			'term_id' => $this->input->post('term_id'),
			'year_id' => $this->input->post('year_id'),
			'rmid' => $this->input->post('rmid'),
			'room_no' => $this->input->post('room_no'),
			'room_boy' => $this->input->post('room_boy'),
			'room_girl' => $this->input->post('room_girl'),
		));
	}

	public function delete_level()
	{
		$this->db->where("school_id", $this->school_id)->where('ssid', $this->input->post('ssid'))->delete('school_room_sub');
	}

	public function term()
	{
		$this->term = $this->db->get('term')->result();
		$this->years = $this->db->get('years')->result();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->input->post('term') !='' && $this->input->post('years')!='') {
				redirect('member/school/'.$this->input->post('term').'/'.$this->input->post('years'));
			} 
		}

		$this->render('member/term', $this);
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
			'area_type_id' => $this->input->post('area_type_id'),
			'school_id' => $this->input->post('school_id'),
		));


		redirect('member');
	}
}
