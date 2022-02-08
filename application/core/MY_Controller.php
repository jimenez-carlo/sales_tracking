<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

  private static $header   = array();
  private static $top_nav  = array();
  private static $side_bar = array();
  private static $footer   = array();

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->status) {
      redirect('/');
    }
  }

  public function header_data($key, $data)
  {
    self::$header[$key] = $data;
  }

  public function top_data($key, $data)
  {
    self::$top_nav[$key] = $data;
  }

  public function side_data($key, $data)
  {
    self::$side_bar[$key] = $data;
  }

  public function footer_data($key, $data)
  {
    self::$footer[$key] = $data;
  }


  public function template($page, $data = array())
  {
    $this->load->view('layouts/header');
    $this->load->view('layouts/sidebar', $data);
    $this->load->view($page, $data);
    $this->load->view('layouts/footer',   self::$footer);
  }
}
