<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->status) {
			redirect('home');
		}
		$this->load->model('Login_model', 'login');
	}

	public function index()
	{
		$data['response'] = '';
		$post = $this->input->post();
		if (isset($post['btnLogin'])) {
			$result = $this->login->login();
			if (empty($post['email']) || empty($post['password'])) {
				$data['response'] = msg_error("Invalid Email/Password!");
			}
			if ($result->num_rows() > 0 && password_verify($post['password'], $result->row()->password_salt)) {
				$user_info = array('current' => $result->row(), 'status' => true);
				$this->session->set_userdata($user_info);
				redirect('home');
			} else {
				$data['response'] = msg_error("Invalid Email/Password!");
			}
		}
		$this->load->view('pages/login', $data);
	}

	public function register()
	{
		$post = $this->input->post();
		$data['response'] = '';
		if (isset($post['btnRegister'])) {
			if (empty($post['email'])) {
				$data['response'] = msg_error("Empty Email!");
			} else if (empty($post['password'])) {
				$data['response'] = msg_error("Empty Password!");
			} else if (empty($post['confirm_password'])) {
				$data['response'] = msg_error("Empty Re-type Password!");
			} else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
				$data['response'] = msg_error("Invalid Email!");
			} else if ($post['password'] != $post['confirm_password']) {
				$data['response'] = msg_error("Password Does Not Match!");
			} else if ($this->login->email_exists($post['email']) > 0) {
				$data['response'] = msg_error("Email `" . $post['email'] . "` Already In Use!");
			} else if (!$this->login->register()) {
				$data['response'] = msg_error("Oops Something Went Wrong!");
			} else {
				$data['response'] = msg_success("Email `" . $post['email'] . "` Registered ");
			}
		}
		$this->load->view('pages/register', $data);
	}
}
