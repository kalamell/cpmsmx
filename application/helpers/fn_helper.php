
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