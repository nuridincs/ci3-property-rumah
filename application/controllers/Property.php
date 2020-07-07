<?php

class Property extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_property', 'property');

    $cekUserLogin = $this->session->userdata('status');

    if ($cekUserLogin != 'login') {
      redirect('auth');
    }
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
      'aktif' => 'detail'
    ];
    // print_r($data['item']);die;
    $this->load->view('frontend/main/detail', $data);
  }

  public function booking($id)
  {
    $data = [
      'title' => 'Booking Rumah',
      'item' => $this->property->getDetail($id),
      'aktif' => 'booking',
      'tenor' => $this->property->getData('app_tenor'),
    ];
    $this->load->view('frontend/main/booking', $data);
  }

  public function transaksi()
  {
    $data = [
      'title' => 'Data Booking Rumah',
      'aktif' => 'trx',
      'data' => $this->property->getDataTrx()
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

  public function submitBooking()
  {
    $request = $this->input->post();
    $id_user = $this->session->userdata('id');

    $dataTrx = [
      'id_user' => $id_user,
      'id_blok' => $request['blok'],
      'id_tenor' => $request['tenor'],
      'created_at' => date('Y-m-d'),
    ];

    $this->db->insert('app_trx', $dataTrx);
    $id_trx = $this->db->insert_id();

    $dataDoc = [
      'ktp' => time().'-'.$_FILES['document']['name'][0],
      'kk' => time().'-'.$_FILES['document']['name'][1],
      'npwp' => time().'-'.$_FILES['document']['name'][2],
      'mutasi_rekening' => time().'-'.$_FILES['document']['name'][3],
      'surat_keterangan_karyawan' => time().'-'.$_FILES['document']['name'][4],
      'slip_gaji' => time().'-'.$_FILES['document']['name'][5],
      'id_trx' => $id_trx,
    ];

    $this->db->insert('app_document', $dataDoc);

    $strInputFileName = "document";
    $arrFiles = $_FILES;
    if (is_array($_FILES[$strInputFileName]['name']))
    {
      $countFiles = count($_FILES[$strInputFileName]['name']);
      for($i=0; $i<$countFiles; $i++)
      {
        //overwrite _FILES array
        $_FILES[$strInputFileName]['name'] = $arrFiles[$strInputFileName]['name'][$i];
        $_FILES[$strInputFileName]['type'] = $arrFiles[$strInputFileName]['type'][$i];
        $_FILES[$strInputFileName]['tmp_name'] = $arrFiles[$strInputFileName]['tmp_name'][$i];
        $_FILES[$strInputFileName]['error'] = $arrFiles[$strInputFileName]['error'][$i];
        $_FILES[$strInputFileName]['size'] = $arrFiles[$strInputFileName]['size'][$i];

        $config['upload_path'] = "./assets/uploads/";
        $config['allowed_types'] = "gif|jpg|png|jpeg|pdf|doc|xml|docx|GIF|JPG|PNG|JPEG|PDF|DOC|XML|DOCX|xls|xlsx|txt|ppt|csv";
        $config['max_size'] = '3072';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['file_name'] = time().'-'.$arrFiles[$strInputFileName]['name'][$i];
        $this->load->library('upload');
        $this->upload->initialize($config);

        if(!$this->upload->do_upload($strInputFileName))
        {
          print_r($this->upload->display_errors());
        } else {
          // echo "success";
        }
      }
    }

    redirect('property/transaksi');
  }

  public function konfirmasiPembayaran()
  {
    // print_r($_FILES);die;
    // $strInputFileName = "konfirmasi";
    $arrFiles = $_FILES;

    $_FILES['konfirmasi']['name'] = $arrFiles['konfirmasi']['name'];
    $_FILES['konfirmasi']['type'] = $arrFiles['konfirmasi']['type'];
    $_FILES['konfirmasi']['tmp_name'] = $arrFiles['konfirmasi']['tmp_name'];
    $_FILES['konfirmasi']['error'] = $arrFiles['konfirmasi']['error'];
    $_FILES['konfirmasi']['size'] = $arrFiles['konfirmasi']['size'];

    $config['upload_path'] = "./assets/uploads/konfirmasi";
    $config['allowed_types'] = "gif|jpg|png|jpeg|pdf|doc|xml|docx|GIF|JPG|PNG|JPEG|PDF|DOC|XML|DOCX|xls|xlsx|txt|ppt|csv";
    $config['max_size'] = '3072';
    $config['max_width'] = '3000';
    $config['max_height'] = '3000';
    $config['file_name'] = time().'-'.$arrFiles['konfirmasi']['name'];
    $this->load->library('upload');
    $this->upload->initialize($config);

    if(!$this->upload->do_upload('konfirmasi'))
    {
      print_r($this->upload->display_errors());
    } else {
      // echo "success";
      $dataKonfirmasi = [
        'status_pembayaran' => 2,
        'bukti_pembayaran' => $arrFiles['konfirmasi']['name'],
      ];

      $this->db->where('id_user', $this->session->userdata('id'));
      $this->db->update('app_trx', $dataKonfirmasi);

      redirect('property/transaksi');
    }
  }
}
