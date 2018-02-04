<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Base {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->news = $this->db->limit(3)->order_by('created_date', 'DESC')->get('news')->result();
		
		$this->render('home', $this);
	}
}
