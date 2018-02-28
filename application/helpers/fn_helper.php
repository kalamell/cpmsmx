
<?php 

function isMember()
{
	$ci =& get_instance();
	$id = $ci->session->userdata('id');

	$rs = $ci->db->where('id', $id)->get('member');
	if ($rs->num_rows()>0) {
		return $rs->row();
	}

	return false;
}

function isStaff()
{
	$ci =& get_instance();
	$id = $ci->session->userdata('id');

	$rs = $ci->db->where('id', $id)->get('member');
	if ($rs->num_rows()>0) {
		return $rs->row()->status == 'staff' ? true : false;
	}

	return false;

}

function save()
{
	$ci =& get_instance();

	if ($ci->session->flashdata('save')) {
		return '<div class="alert alert-success">บันทึกข้อมูลเรียบร้อย</div>';
	}

	if ($ci->session->userdata('save_data')) {
		$ci->session->set_userdata('save_data', '');
		return '<div class="alert alert-success">บันทึกข้อมูลเรียบร้อย</div>';
	}
	return '';
}


function footer()
{
	$ci =& get_instance();

	$rs = $ci->db->limit(1)->get('config');
	if ($rs->num_rows()>0) {
		return $rs->row()->footer;
	}

	return '&2018';
}



function banner()
{
	$ci =& get_instance();

	$rs = $ci->db->get('banner');
	return $rs->result();
}

function getRoomLevel($school_id, $term, $year, $rmid)
{
	$ci =& get_instance();

	$rs = $ci->db->where(array(
		'school_id' => $school_id,
		'term_id' => $term,
		'year_id' => $year,
		'rmid' => $rmid
	))->get('school_room_level');
	return $rs->result();
}

function countSchool($school_type_id, $province_id, $amphur_id, $district_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'school_type_id' => $school_type_id,
		'province_id' => $province_id,
		'amphur_id' => $amphur_id,
		'district_id' => $district_id
	))->count_all_results('school');
}


function countSchoolAmphur($school_type_id, $province_id, $amphur_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'school_type_id' => $school_type_id,
		'province_id' => $province_id,
		'amphur_id' => $amphur_id,
	))->count_all_results('school');
}


function countSchoolArea($school_type_id, $province_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'school_type_id' => $school_type_id,
		'province_id' => $province_id,
	))->count_all_results('school');
}

function countSchoolAreaCode($code_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'area_id' => $code_id,
	))->count_all_results('school');

}

function countSchoolAreaCodeAmphur($code_id, $amphur_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'area_id' => $code_id,
		'amphur_id' => $amphur_id
	))->count_all_results('school');

}


function countSchoolAmphurOnly($amphur_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'amphur_id' => $amphur_id
	))->count_all_results('school');

}

function countSchoolDistrictOnly($district_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'district_id' => $district_id
	))->count_all_results('school');

}

function countSchoolAreaCodeDistrcit($code_id, $district_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'area_id' => $code_id,
		'district_id' => $district_id
	))->count_all_results('school');

}

function getMenuWebsite()
{
	$ci =& get_instance();
	$province_code = $ci->config->item('province_code');
	$rs = $ci->db->where('PROVINCE_CODE', $province_code)->get('province');
	$province_id = $rs->row()->PROVINCE_ID;

	$menu_config = $ci->db->order_by('sort', 'asc')->get('menu_config')->result();
	$menu_sub = $ci->db->order_by('sub_sort', 'asc')->get('menu_sub')->result();
	

	if (count($menu_config) > 0) {
		foreach($menu_config as $mc) {
			$m = $ci->db->where('province_id', $province_id)
				->where('link_id', $mc->id)
				->join('menu_sub', 'menu_website.sub_id = menu_sub.sub_id')
				->order_by('sub_sort', 'asc')
				->get('menu_website')->result();
			if (count($m) > 0) {
				echo '<li>'.$mc->name;
				echo '<ul>';
				foreach($m as $_m) {
					if ($_m->type == 'IN') {
						$link = anchor($_m->link, $_m->sub_name);
					} else {
						$link = '<a href="'.$_m->link.'">'.$_m->sub_name."</a>";
					}
					echo '<li>';
					echo $link;
					echo '</li>';
				}
				echo '</ul>';
				echo '</li>';
			}
		}
	}
}