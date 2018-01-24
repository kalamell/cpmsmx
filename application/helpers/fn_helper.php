
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

function save()
{
	$ci =& get_instance();

	if ($ci->session->flashdata('save')) {
		return '<div class="alert alert-success">บันทึกข้อมูลเรียบร้อย</div>';
	}
	return '';
}