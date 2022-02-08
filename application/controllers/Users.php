<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("Users_model", "users");
  }

  public function index()
  {
    $data['response'] = '';
    $post = $this->input->post();
    if (isset($post['btnDelete'])) {
      $data['response'] = ($this->users->deleteUser($post['btnDelete'])) ? msg_success("User `ID#" . id_format($post['btnDelete']) . "` Deleted") : msg_error("Oops Something Went Wrong!");
    }
    $data['list'] = $this->users->getAll();
    $this->template("pages/users/index", $data);
  }

  public function edit($id = null)
  {
    $data['response'] = '';
    $res = $this->users->get($id);
    if ($this->session->current->role_id != 1 && $res->row()->role_id == 1) {
      return $this->template("errors/error");
    }
    if (!empty($id) && ($res->num_rows() > 0)) {
      $data['user'] = $res->row();
      $data['dropdown'] = $this->users->roles();
      $post = $this->input->post();
      if (isset($post['btnUpdate'])) {
        if ($this->users->email_exists($post['btnUpdate']) > 0) {
          $data['response'] = msg_error("Email Already In-Used!");
        } else {
          $data['response'] = ($this->users->update()) ? msg_success("User `ID#" . id_format($post['btnUpdate']) . "` Updated ") : msg_error("No Changes Have Been Made!");
        }
      }
      if (isset($post['btnResetPassword'])) {
        $data['response'] = ($this->users->passwordReset()) ? msg_success("User `ID#" . id_format($post['btnResetPassword']) . "` Password Reset") : msg_error("Oops Something Went Wrong!");
      }
      $this->template("pages/users/edit", $data);
    } else {
      redirect("users");
    }
  }

  public function create()
  {
    $data['response'] = '';
    $data['dropdown'] = $this->users->roles();
    $post = $this->input->post();
    if (isset($post['btnCreate'])) {
      if (empty($post['email'])) {
        $data['response'] = msg_error("Email is Empty");
      } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $data['response'] = msg_error("Invalid Email Address");
      } else if ($this->users->email_exists() > 0) {
        $data['response'] = msg_error("Email Already In-Used!");
      } else {
        $data['response'] = ($this->users->register()) ? msg_success("User Created") : msg_error("Oops Something Went Wrong!");
      }
    }
    $this->template("pages/users/create", $data);
  }

  public function change_password()
  {
    $data['response'] = '';
    $data['dropdown'] = $this->users->roles();
    $post = $this->input->post();
    if (isset($post['btnChangePassword'])) {
      if (empty($post['old']) || empty($post['new']) || empty($post['re_new'])) {
        $data['response'] = msg_error("Please Fill All Required Fields!");
      } else if ($post['new'] != $post['re_new']) {
        $data['response'] = msg_error("New Password Does Not Match!");
      } else if (!$this->users->verifyPassword()) {
        $data['response'] = msg_error("Invalid Old Password!");
      } else {
        $data['response'] = ($this->users->changePassword()) ? msg_success("Password Changed ") : msg_error("Oops Something Went Wrong!");
      }
    }
    $this->template("pages/users/change_password", $data);
  }

  public function profile()
  {
    $data['response'] = '';
    $id = $this->session->current->id;
    $data['user'] = $this->users->get($id)->row();
    $post = $this->input->post();
    if (isset($post['btnUpdate'])) {
      if (empty('email')) {
        $data['response'] = msg_error("Email is Empty");
      } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $data['response'] = msg_error("Invalid Email Address");
      } else if ($this->users->email_exists($id) > 0) {
        $data['response'] = msg_error("Email Already In-Used!");
      } else {
        $data['response'] = ($this->users->updateProfile()) ? msg_success("Profile Updated ") : msg_error("No Changes Have Been Made!");
      }
    }
    $this->template("pages/users/profile", $data);
  }
}
