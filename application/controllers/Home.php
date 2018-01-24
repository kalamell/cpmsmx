<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Base {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		
		$this->render('home', $this);
	}
}
