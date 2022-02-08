<?php

class Sales_model extends CI_Model
{

  public function getAll()
  {
    if ($this->session->current->role_id == 1) {
      return $this->db
        ->select('s.id,s.user_id,DATE_FORMAT(s.assigned_date ,"%Y-%m-%d") as `assigned_date`,s.date_created,s.contact_no,
     concat(s.last_name ,", ", s.first_name," ", s.middle_name, "") as `fullname`,p.name as `mode`,src.name as `source`')
        ->from('tbl_sales as s')
        ->join('tbl_payment_type as p', 'p.id=s.mode_id')
        ->join('tbl_source_type as src', 'src.id=s.source_id')
        ->where("s.deleted_flag", 0)->order_by('s.date_created', 'DESC')->get();
    }
    return $this->db
      ->select('s.id,s.user_id,DATE_FORMAT(s.assigned_date ,"%Y-%m-%d") as `assigned_date`,s.date_created,s.contact_no,
     concat(s.last_name ,", ", s.first_name," ", s.middle_name, "") as `fullname`,p.name as `mode`,src.name as `source`')
      ->from('tbl_sales as s')
      ->join('tbl_payment_type as p', 'p.id=s.mode_id')
      ->join('tbl_source_type as src', 'src.id=s.source_id')
      ->where("s.deleted_flag", 0)
      ->where("s.user_id", $this->session->current->id)
      ->order_by('s.date_created', 'DESC')
      ->get();
  }

  public function getLastId()
  {
    $result = $this->db->select("max(id) as id")->get_where('tbl_sales', array('deleted_flag' => 0), 1);
    return ($result->num_rows() > 0) ? $result->row()->id : 0;
  }

  public function get($id = null)
  {
    return $this->db
      ->select('s.id,s.user_id,DATE_FORMAT(s.assigned_date ,"%Y-%m-%d") as `assigned_date`,s.date_created,s.contact_no,
     concat(u.last_name ,", ", u.first_name," ", u.middle_name, "") as `fullname`,
s.middle_name,s.last_name,s.first_name,s.address,s.province,s.city,s.barangay,
p.name as `mode`,src.name as `source`, s.remarks')
      ->from('tbl_sales as s')
      ->join('tbl_payment_type as p', 'p.id=s.mode_id')
      ->join('tbl_source_type as src', 'src.id=s.source_id')
      ->join('tbl_users as u', 'u.id=s.user_id')
      ->where("s.deleted_flag", 0)
      ->where("s.id", $id)
      ->get();
  }

  public function get_items($id = null)
  {
    return $this->db
      ->select('*')
      ->from('tbl_sale_items as s')
      ->where("s.sale_id", $id)
      ->get();
  }


  public function paymentMethods()
  {
    return $this->db->get_where('tbl_payment_type', array('deleted_flag' => 0))->result_array();
  }
  public function sourceType()
  {
    return $this->db->get_where('tbl_source_type', array('deleted_flag' => 0))->result_array();
  }

  public function saveSale()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'user_id' => $this->session->current->id,
      'mode_id' => intval($post['mode']),
      'source_id' => intval($post['source']),
      'assigned_date' => date("Y-m-d H:i:s", strtotime($post['date'])),
      'first_name' => $post['first'],
      'middle_name' => $post['middle'],
      'last_name' => $post['last'],
      'address' => $post['address'],
      'contact_no' => $post['contact'],
      'province' => $post['province'],
      'city' => $post['city'],
      'barangay' => $post['barangay'],
      'Remarks' => $post['remarks']
    );
    $this->db->insert('tbl_sales', $data);
    $id = $this->db->insert_id();
    if (isset($post['item_name']) && count($post['item_name']) > 0) {
      foreach ($post['item_name'] as $key => $value) {
        $this->saveItems($id, $value, $post['item_qty'][$key], $post['item_price'][$key], $post['item_discount'][$key]);
      }
    }

    if ($this->db->trans_status() === FALSE) {
      return $this->db->trans_rollback();
    } else {
      return $this->db->trans_commit();
    }
  }

  public function saveItems($id, $name, $qty, $price, $discount)
  {
    $data = array(
      'sale_id' => $id,
      'particular' => $name,
      'qty' => $qty,
      'price' => $price,
      'discount' => $discount
    );
    $this->db->insert('tbl_sale_items', $data);
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

  public function deleteSale($id)
  {
    $data = array(
      'deleted_flag' => 1
    );
    $this->db->where('id', $id);
    $this->db->update('tbl_sales', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }
}
