
<?php 

function prefix($type)
{
	if ($type == 'ช' || $type == 'เด็กชาย' || $type == 'ด.ช.') {
		return 'เด็กชาย';
	}

	if ($type == 'ญ' || $type == 'เด็กหญิง' || $type == 'ด.ญ.') {
		return 'เด็กหญิง';
	}

}


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

	$config_id = getProvinceWebsite()->id;


	$rs = $ci->db->limit(1)->where('config_id', $config_id)->get('config');
	if ($rs->num_rows()>0) {
		return $rs->row()->footer;
	}

	return '&2018';
}



function getTitle()
{
	$ci =& get_instance();

	$rs = $ci->db->limit(1)->get('config');
	if ($rs->num_rows()>0) {
		return $rs->row()->title;
	}

	return 'School Mapping สำนักงานศึกษาธิการจังหวัด...';
}


function getLogo()
{
	/*
	<img src="<?php echo base_url();?>assets/img/logo.png" style="    width: 40px;
    margin-left: -9px;
    margin-top: -11px; float: left; margin-right: 4px;">
    */
	$ci =& get_instance();

	$rs = $ci->db->limit(1)->get('config');
	if ($rs->num_rows()>0) {
		if ($rs->row()->logo !='') {
			return '<img src="'.base_url('upload/'.$rs->row()->logo).'" style="width: 40px;margin-left: -9px; margin-top: -11px; float: left; margin-right: 4px;">';
		}
	}

	return '';
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
		'area_type_id' => $code_id,
		'amphur_id' => $amphur_id
	))->count_all_results('school');

}


function countSchoolSptAmphurOnly($amphur_id, $type)
{
	$ci =& get_instance();
	$count = $ci->db->where(array(
		'amphur_id' => $amphur_id,
		'type_school' => $type,
	))->count_all_results('school');



	return $count;

}

function countSchoolAmphurOnly($amphur_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'amphur_id' => $amphur_id
	))->count_all_results('school');

}

function countSchoolSptDistrictOnly($district_id, $type)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'district_id' => $district_id,
		'type_school' => $type
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
		'area_type_id' => $code_id,
		'district_id' => $district_id
	))->count_all_results('school');

}

function getMenuWebsite()
{
	$ci =& get_instance();
	$province_code = getProvinceWebsite()->PROVINCE_CODE;

	$rs = $ci->db->where('PROVINCE_CODE', $province_code)->get('province');
	$province_id = $rs->row()->PROVINCE_ID;

	$menu_config = $ci->db->order_by('sort', 'asc')->get('menu_config')->result();
	$menu_sub = $ci->db->order_by('sub_sort', 'asc')->get('menu_sub')->result();
	$config = $ci->db->select('*')->where('province_id', $province_id)->get('config');

	if ($config->num_rows() > 0) {
		if (count($menu_config) > 0) {
			foreach($menu_config as $mc) {
				$m = $ci->db->where('config_id', $config->row()->id)
					->where('link_id', $mc->id)
					->join('menu_sub', 'menu_website.sub_id = menu_sub.sub_id')
					->order_by('sub_sort', 'asc')
					->get('menu_website');
				
				if ($m->num_rows() > 0) {

				
					echo '<li>'.$mc->name;
					echo '<ul>';
					foreach($m->result() as $_m) {
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
}

function url($var)
{
	if(strpos($var, 'http://') !== 0) {
	  return 'http://' . $var;
	} else {
	  return $var;
	}
}

function getProvinceWebsite()
{
	$ci =& get_instance();
	$dat = array_shift((explode('.', $_SERVER['HTTP_HOST'])));
	$rs = $ci->db->select('config.province_id, type_website, PROVINCE_CODE')
			->where('province.PROVINCE_CODE', $dat)
			->join('province', 'config.province_id = province.PROVINCE_ID')->get('config');

	return $rs->row();
}

function isWebsiteNation()
{
	$type_website = getProvinceWebsite()->type_website;

	if ($type_website == 'nation') {
		return true;
	}
	return false;

}

function getSchoolFromDistrict($district_id)
{
	$ci =& get_instance();
	return $ci->db->where('district_id', $district_id)->get('school')->result();
}