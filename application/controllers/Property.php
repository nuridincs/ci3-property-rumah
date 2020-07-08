<?php

class Property extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_property', 'property');
    $this->load->library('email');

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

    $this->db->where('id', $request['blok']);
    $this->db->update('app_blok', array('status_blok' => 2));

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

  function sendMail()
  {
    $config = Array(
      'protocol' => 'sendmail',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'projekdevelopment@gmail.com', // change it to yours
      'smtp_pass' => 'd3veL0pm3nt', // change it to yours
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'wordwrap' => TRUE
    );

    $message = 'test booking email';
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from('nuridin.mu23@gmail.com'); // change it to yours
    $this->email->to('nuridin50@gmail.com');// change it to yours
    $this->email->subject('Booking Berhasil');
    $this->email->message($message);
    if($this->email->send()) {
      echo 'Email sent.';
    } else {
      show_error($this->email->print_debugger());
    }
  }

	public function emailBooking(){
    // die('ik');
    $id_blok = 1;
		$data['booking'] = $this->property->getBooking($id_blok);
    $data['user'] = $this->property->getUser();
    $email = 'nuridin.mu23@gmail.com';//$data['user']->email;

		// $this->load->view('frontend/email/booking', $data);

    // print_r($data['user']->email);die;
		$subject = "Booking Berhasil";
		$msg = 'Test Email Booking';//$this->load->view('frontend/email/booking', $data, TRUE);
		$ci = get_instance();
		// $config['protocol'] = "smtp";
		// $config['smtp_host'] = "ssl://smtp.googlemail.com";
		// $config['smtp_port'] = "465";
		// $config['smtp_user'] = "projekdevelopment@gmail.com";
		// $config['smtp_pass'] = "d3veL0pm3nt";
		// $config['charset'] = "utf-8";
		// $config['mailtype'] = "html";
    // $config['newline'] = "\r\n";
    $config['smtp_host'] = 'smtp.gmail.com';
    $config['smtp_port'] = '587';
    $config['smtp_user'] = 'projekdevelopment@gmail.com';
    $config['_smtp_auth'] = TRUE;
    $config['smtp_pass'] = 'd3veL0pm3nt';
    $config['smtp_crypto'] = 'tls';
    $config['protocol'] = 'smtp';
    $config['mailtype'] = 'html';
    $config['send_multipart'] = FALSE;
    $config['charset'] = 'utf-8';
    $config['wordwrap'] = TRUE;
    // $this->email->initialize($mail_config);

    // $this->email->set_newline("\r\n");
		$ci->email->initialize($config);
		$ci->email->from('noreply@ptdutaputraland.com', 'PT. Duta Putra Land');
		$ci->email->to($email);
		$ci->email->subject($subject);
		$ci->email->message($msg);
    // $this->email->send();
    if ($this->email->send()) {
			echo 'Email sent.';
		} else {
			show_error($this->email->print_debugger());
		}

		// redirect('propery/');
	}
}
