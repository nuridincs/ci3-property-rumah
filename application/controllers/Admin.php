<?php

class Admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('Pdf');

		$this->load->model('M_admin', 'admin');

    $cekUserLogin = $this->session->userdata('status');

    if ($cekUserLogin != 'login') {
      redirect('auth');
    }
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
    $this->data['title'] = 'Halaman Kelola Cluster';
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

	public function form($form, $action){
    $this->data['title'] = 'Halaman Form';
		$this->data['aktif'] = $form;
		$this->data['action'] = $action;
		$this->load->view('frontend/admin/form/'.$form, $this->data);
	}

	public function detailDokumen()
	{
		$this->data['title'] = 'Detail Dokumen';
		$this->data['aktif'] = 'dokumen';
		$this->load->view('frontend/admin/form/dokumen', $this->data);
	}

	public function cetakLaporan()
	{
		$data = $this->admin->getTrx();

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// document informasi
		$pdf->SetCreator('Property Rumah');
		$pdf->SetTitle('Laporan');
		$pdf->SetSubject('Laporan');

		//header Data
		// $pdf->SetHeaderData('rubberman-logo.jpg',30,'','',array(203, 58, 44),array(0, 0, 0));
		// $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));


		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));

		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		//set margin
		$pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP + 10,PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);

		//SET Scaling ImagickPixel
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		//FONT Subsetting
		$pdf->setFontSubsetting(true);

		$pdf->SetFont('helvetica','',14,'',true);

		$pdf->AddPage('L');

		$html=
			'<div>
				<h1 align="center">Laporan</h1>

				<table border="1" width="100" align="center">
					<tr>
						<th style="width:40px" align="center">No</th>
						<th style="width:150px" align="center">Tipe Rumah</th>
						<th style="width:150px" align="center">Blok Rumah</th>
						<th style="width:150px" align="center">Nama Pembeli</th>
						<th style="width:150px" align="center">Booking Fee</th>
						<th style="width:200px" align="center">Tanggal Booking</th>
					</tr>';

					$no = 0;
					foreach($data as $item) {
						$no++;
						$html .= '<tr>
							<td>'.$no.'</td>
							<td>'.$item->property_name.'</td>
							<td>'.$item->blok.'</td>
							<td>'.$item->name.'</td>
							<td>'.number_format($item->booking_fee, 0).'</td>
							<td>'.$item->created_at.'</td>
						</tr>';
				}

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);

		$pdf->Output('report.pdf', 'I');
	}
}