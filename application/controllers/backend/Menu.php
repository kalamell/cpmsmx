<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Backend {
	public function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{
		$this->rs = $this->db->get('menu_config')->result();
		$this->render('menu/index', $this);
	}
}