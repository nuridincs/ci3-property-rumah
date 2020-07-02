<?php

class Property extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_property', 'property');
  }

  public function index()
  {
    $data = [
      'title' => 'List Rumah',
      'aktif' => '/',
      'property' => $this->property->getData('app_list_property')
    ];
    $this->load->view('frontend/main/index', $data);
  }

  public function detail($id)
  {
    $data = [
      'title' => 'Detail Rumah',
      'item' => $this->property->getDetail($id),
      'gallery' => $this->property->getGallery($id),
    ];
    // print_r($data['item']);die;
    $this->load->view('frontend/main/detail', $data);
  }

  public function booking($id)
  {
    $data = [
      'title' => 'Booking Rumah',
      'item' => $this->property->getDetail($id),
      'tenor' => $this->property->getData('app_tenor'),
    ];
    $this->load->view('frontend/main/booking', $data);
  }

  public function transaksi()
  {
    $data = [
      'title' => 'Data Booking Rumah',
      'aktif' => 'trx',
    ];
    $this->load->view('frontend/main/transaksi', $data);
  }

  public function konfirmasi()
  {
    $data = [
      'title' => 'Konfirmasi Pembayaran',
      'aktif' => 'konfirmasi',
    ];
    $this->load->view('frontend/main/konfirmasi', $data);
  }
}
