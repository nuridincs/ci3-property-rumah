<?php

class Admin extends CI_Controller{
	public function __construct(){
    parent::__construct();

    $this->load->model('M_admin', 'admin');
	}

	public function index(){
		$this->data['title'] = 'Halaman Dashboard';
		$this->data['aktif'] = 'dashboard';
		$this->load->view('frontend/admin/dashboard', $this->data);
	}

	public function pembelian(){
    $this->data['title'] = 'Halaman Kelola Pembelian';
		$this->data['aktif'] = 'pembelian';
    $this->data['pembelian'] = $this->admin->getTrx();
    // print_r($this->data['pembelian']);die;
		$this->load->view('frontend/admin/list_pembelian', $this->data);
	}

	public function customer(){
    $this->data['title'] = 'Halaman Kelola Customer';
    $this->data['aktif'] = 'customer';
    $this->data['customer'] = $this->admin->getDataById('app_user', 'user_role', 'admin');
		$this->load->view('frontend/admin/list_customer', $this->data);
	}

	public function listProperty(){
    $this->data['title'] = 'Halaman Kelola Rumah';
    $this->data['property'] = $this->admin->getData('app_list_property');
		$this->data['aktif'] = 'property';
		$this->load->view('frontend/admin/list_property', $this->data);
	}

	public function listUser(){
    $this->data['title'] = 'Halaman Kelola User';
    $this->data['user'] = $this->admin->getData('app_user');
		$this->data['aktif'] = 'user';
		$this->load->view('frontend/admin/list_user', $this->data);
	}

	public function laporan(){
    $this->data['title'] = 'Halaman Laporan';
    $this->data['pembelian'] = $this->admin->getTrx();
		$this->data['aktif'] = 'laporan';
		$this->load->view('frontend/admin/laporan', $this->data);
	}
}