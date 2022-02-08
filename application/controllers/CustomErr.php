<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomErr extends MY_Controller
{

	public function index()
	{
		$this->template('errors/error');
	}
}
