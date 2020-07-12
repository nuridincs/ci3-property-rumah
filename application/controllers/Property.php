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
      'tenor' => $this->property->getTenor(),
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

    $this->db->where('id', $request['blok']);
    $this->db->update('app_blok', array('status_blok' => 2));
    $this->sendBookingEmail($request['blok']);

    $dataTrx = [
      'id_user' => $id_user,
      'id_blok' => $request['blok'],
      'id_tenor' => $request['tenor'],
      'no_ktp' => $request['no_ktp'],
      'no_npwp' => $request['no_npwp'],
      'tipe_pembayaran' => $request['tipe_pembayaran'],
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

    // $this->emailBooking($request['blok']);

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
      $dataKonfirmasi = [
        'status_pembayaran' => 2,
        'bukti_pembayaran' => $arrFiles['konfirmasi']['name'],
      ];

      $this->db->where('id_user', $this->session->userdata('id'));
      $this->db->update('app_trx', $dataKonfirmasi);

      redirect('property/transaksi');
    }
  }

  public function sendBookingEmail($id_blok)
	{
    $data['booking'] = $this->property->getBooking($id_blok);
    $data['user'] = $this->property->getUser();
    $email = $data['user']->email;
    $msg = $this->load->view('frontend/email/booking', $data, TRUE);

		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'projekdevelopment@gmail.com',
		  'smtp_pass' => 'd3veL0pm3nt',
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('noreply@ptdutaputraland.com', 'PT. Duta Putra Land');
		$this->email->to($email);
		$this->email->subject('Booking Berhasil');
		$this->email->message($msg);
		if (!$this->email->send()) {
		  show_error($this->email->print_debugger());
		}else{
      // echo 'Success to send email';
      // redirect('property/transaki');
		}
	}

  public function actionDetailRincian()
  {
    $request = $this->input->post();
    $_view = $this->tipeCashBertahap($request);

    if ($request['id_tenor'] != 5) {
      $_view = $this->tipeKPR($request);
    }

    echo $_view;
  }

  public function tipeKPR($request)
  {
    $getBlok =$this->property->getDetailByID('app_blok', 'id', $request['id_blok']);
    $getTenor =$this->property->getDetailByID('app_tenor', 'id', $request['id_tenor']);
    $maksimumKredit = $getBlok->harga_jual - $getBlok->dp;

    $tenor = $getTenor->jumlah_tenor;
    $angsuran = ($maksimumKredit * 0.263797) / 12;

    if ($getTenor->jumlah_tenor == 10) {
      $angsuran = ($maksimumKredit * 0.16275) / 12;
    }

    if ($getTenor->jumlah_tenor == 15) {
      $angsuran = ($maksimumKredit * 0.13147) / 12;
    }

    if ($getTenor->jumlah_tenor == 20) {
      $angsuran = ($maksimumKredit * 0.11746) / 12;
    }

    $_view = '<div class="card mt-4">';
      $_view .= '<div class="card-body">';
        $_view .= '<h3>Detail Rincian dengan tenor '.$tenor.' tahun</h3>';
        $_view .= '<div>Harga Jual : <span class="badge badge-danger">Rp. '.number_format($getBlok->harga_jual).'</span></div>';
        $_view .= '<div>Maksimum Kredit : <span class="badge badge-success">Rp. '.number_format($getBlok->dp).'</span></div>';
        $_view .= '<div>Total DP : <span class="badge badge-info">Rp. '.number_format($maksimumKredit).'</span></div>';
        $_view .= '<div>Angsuran per bulan : <span class="badge badge-danger">Rp. '.number_format(round($angsuran)).'</span></div>';
      $_view .= '</div>';
    $_view .= '</div>';

    return $_view;
  }

  public function tipeCashBertahap($request)
  {
    $getBlok =$this->property->getDetailByID('app_blok', 'id', $request['id_blok']);

    $_view = '<div class="card mt-4">';
      $_view .= '<div class="card-body">';
        $_view .= '<h3>Detail Rincian dengan cara cash bertahap 15 bulan</h3>';
        $_view .= '<div>Harga Jual : <span class="badge badge-danger">Rp. '.number_format($getBlok->harga_jual).'</span></div>';
        $_view .= '<div>Angsuran per bulan : <span class="badge badge-success">Rp. '.number_format(round($getBlok->harga_jual / 15)).'</span></div>';
      $_view .= '</div>';
    $_view .= '</div>';

    return $_view;
  }
}
