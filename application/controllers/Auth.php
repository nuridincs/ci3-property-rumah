<?php

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_auth');
  }

  public function index()
  {
    $this->load->view('frontend/login');
  }

  public function prosesLogin() {
    $email = $this->input->post('email',TRUE);
    $password = $this->input->post('password',TRUE);
    $cek = $this->M_auth->cek_user($email, $password);

    if ( $cek->num_rows() != 1){
      $this->session->set_flashdata('msg','Email Dan Password Salah');
      redirect(base_url('auth'));
    } else {
      $user = $cek->row();
      $data_session = array(
        'id' => $user->id,
        'nama' => $user->name,
        'email' => $user->email,
        'status' => 'login',
        'role' => $user->user_role,
      );

      $this->session->set_userdata($data_session);

      if ($data_session['role'] == 'customer') {
        redirect(base_url('/'));
      } else {
        redirect(base_url('admin'));
      }
    }
	}

  public function logout()
  {
    session_destroy();
    redirect('auth');
  }

  public function register()
  {
    $this->load->view('frontend/register');
  }

  public function prosesRegister()
  {
    $request = $this->input->post();

    $dataUser = [
      'name' => $request['name'],
      'email' => $request['email'],
      'phone_number' => $request['phone_number'],
      'password' => md5($request['password']),
      'user_role' => 'customer',
    ];

    $this->db->insert('app_user', $dataUser);
    $this->session->set_flashdata('success','Selamat akun Anda sudah terdaftar. Silahkan login.');

    redirect(base_url('auth'));
  }
}
