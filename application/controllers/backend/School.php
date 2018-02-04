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

	

}