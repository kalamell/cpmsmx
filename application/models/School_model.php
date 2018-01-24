<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}

	public function getSchool($f6)
	{
		$rs = $this->db->where('f6', $f6)->get('school');
		if ($rs->num_rows() > 0) {
			return $rs->row();
		}
		return false;
	}
}