<?php

class Users_model extends CI_Model
{

  public function getAll()
  {
    return $this->db
      ->select('u.id,u.username,u.date_created,u.contact_no,
     concat(u.last_name ,", ", u.first_name," ", u.middle_name, "") as `fullname`,r.name')
      ->from('tbl_users as u')
      ->join('tbl_roles as r', 'r.id=u.role_id')
      ->where("u.deleted_flag", 0)->order_by('u.date_created', 'DESC')->get();
  }

  public function get($id = null)
  {
    return $this->db->get_where('tbl_users', array('id' => $id, 'deleted_flag' => 0), 1);
  }

  public function roles()
  {
    return $this->db->get_where('tbl_roles', array('deleted_flag' => 0))->result_array();
  }

  public function register()
  {
    $post = $this->input->post();
    $password = $this->password_salt("123456");

    $data = array(
      'username' => $post['email'],
      'password_salt' => $password,
      'first_name' => $post['first'],
      'middle_name' => $post['middle'],
      'last_name' => $post['last'],
      'contact_no' => $post['contact'],
      'role_id' => $post['role']
    );
    $this->db->insert('tbl_users', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function email_exists($id = null)
  {
    $post = $this->input->post();
    if (!empty($id)) {
      return $this->db
        ->select('id')
        ->from('tbl_users')
        ->where("id !=", intval($id))
        ->where("deleted_flag", 0)
        ->where("username", $post['email'])
        ->get()->num_rows();
    }
    return $this->db
      ->select('id')
      ->from('tbl_users')
      ->where("deleted_flag", 0)
      ->where("username", $post['email'])
      ->get()->num_rows();
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

  public function update()
  {
    $post = $this->input->post();
    $data = array(
      'username' => $post['email'],
      'first_name' => $post['first'],
      'middle_name' => $post['middle'],
      'last_name' => $post['last'],
      'contact_no' => $post['contact'],
      'role_id' => $post['role']
    );

    $this->db->where('id', $post['btnUpdate']);
    $this->db->update('tbl_users', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function passwordReset()
  {
    $post = $this->input->post();
    $data = array(
      'password_salt' => $this->password_salt("123456")
    );
    $this->db->where('id', $post['btnResetPassword']);
    $this->db->update('tbl_users', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function deleteUser($id)
  {
    $data = array(
      'deleted_flag' => 1
    );
    $this->db->where('id', $id);
    $this->db->update('tbl_users', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function verifyPassword()
  {
    $post = $this->input->post();
    $oldPassword = $this->db->get_where('tbl_users', array('id' => $this->session->current->id), 1)->row()->password_salt;
    if (password_verify($post['old'], $oldPassword)) {
      return true;
    }
    return false;
  }

  public function changePassword()
  {
    $post = $this->input->post();
    $data = array(
      'password_salt' => $this->password_salt($post['new'])
    );
    $this->db->where('id', $this->session->current->id);
    $this->db->update('tbl_users', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function updateProfile()
  {
    $post = $this->input->post();
    $data = array(
      'username' => $post['email'],
      'first_name' => $post['first'],
      'middle_name' => $post['middle'],
      'last_name' => $post['last'],
      'contact_no' => $post['contact']
    );

    $this->db->where('id', $this->session->current->id);
    $this->db->update('tbl_users', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }
}
