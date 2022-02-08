<?php

class Login_model extends CI_Model
{

  public function login()
  {
    $post = $this->input->post();
    return $this->db->get_where('tbl_users', array('username' => $post['email']), 1);
  }

  public function register()
  {
    $post = $this->input->post();
    $password = $this->password_salt($post['password']);

    if (empty($password)) {
      return false;
    }
    $data = array(
      'username' => $post['email'],
      'password_salt' => $password
    );
    $this->db->insert('tbl_users', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function email_exists($email = null)
  {
    return $this->db->get_where('tbl_users', array('username' => $email), 1)->num_rows();
  }

  public function password_salt($password = null)
  {
    if (!empty($password)) {
      return password_hash(
        $password,
        PASSWORD_DEFAULT
      );
    }
    return false;
  }
  // password_verify('Password', $hash_default_salt )
}
