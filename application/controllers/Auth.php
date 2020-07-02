<?php

class Auth extends CI_Controller
{
  public function login()
  {
    $this->load->view('frontend/login');
  }

  public function prosesLogin()
  {
    redirect('admin/');
  }
}
