<?php

class M_auth extends CI_Model{
  public function cek_user($email, $password){
    $condition = [
      'email' => $email,
      'password' => md5($password)
    ];

    // print_r($condition);die;

    return $this->db->select('*')
          ->from('app_user')
          // ->join('app_role', 'app_role.id_users_role=app_users.id_users_role')
          ->where($condition)
          ->get();
  }
}
?>
