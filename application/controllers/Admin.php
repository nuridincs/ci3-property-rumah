<?php

class Admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('Pdf');
		$this->load->library('email');

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
    $this->data['customer'] = $this->admin->getCustomer('app_user', 'user_role', 'customer');
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
    $this->data['user'] = $this->admin->getUser();
		$this->data['aktif'] = 'user';
		$this->load->view('frontend/admin/list_user', $this->data);
	}

	public function laporan(){
    $this->data['title'] = 'Halaman Laporan';
    $this->data['pembelian'] = $this->admin->getTrx();
		$this->data['aktif'] = 'laporan';
		$this->load->view('frontend/admin/laporan', $this->data);
	}

	public function form($form, $action, $table='', $id=''){
    $this->data['title'] = 'Halaman Form';
		$this->data['aktif'] = $form;
		$this->data['action'] = $action;
		$this->data['role'] = $this->admin->getData('app_role');
		if ($action == 'edit') {
			$this->data['data'] = $this->admin->getDataById($table, 'id', $id);
			// print_r($this->data);die;
		}
		$this->load->view('frontend/admin/form/'.$form, $this->data);
	}

	public function detailDokumen($type, $id)
	{
		$this->data['title'] = 'Detail Dokumen';
		$this->data['aktif'] = 'dokumen';
		$this->data['type'] = $type;
		$this->data['dokumen'] = $this->admin->getDataById('app_document', 'id', $id);

		if ($type == 'pembayaran') {
			$this->data['dokumen'] = $this->admin->getDataById('app_trx', 'id', $id);
		}

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


		// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    // $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margin
    // $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP + 10,PDF_MARGIN_RIGHT);
    // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);

    //SET Scaling ImagickPixel
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //FONT Subsetting
    $pdf->setFontSubsetting(true);

    $pdf->SetFont('helvetica','',14,'',true);

    $pdf->AddPage('L');

		$html =
			'<div>
				<h1 align="center">Laporan Penjualan</h1>

				<table border="1" width="100" align="center">
					<tr>
						<th style="width:40px" align="center">No</th>
						<th style="width:100px" align="center">Tipe Rumah</th>
						<th style="width:60px" align="center">Blok Rumah</th>
						<th style="width:100px" align="center">Nama Pembeli</th>
						<th style="width:100px" align="center">No. Telepon</th>
						<th style="width:100px" align="center">No. KTP</th>
						<th style="width:100px" align="center">No. NPWP</th>
						<th style="width:100px" align="center">Booking Fee</th>
						<th style="width:100px" align="center">Tanggal Booking</th>
						<th style="width:150px" align="center">Harga</th>
					</tr>';

					$no = 0;
					$totalBooking = 0;
					$totalOmset = 0;
					foreach($data as $item) {
						$no++;
						$totalBooking += $item->booking_fee;
						$totalOmset += $item->harga_jual;

						$html .= '<tr>
							<td>'.$no.'</td>
							<td>'.$item->property_name.'</td>
							<td>'.$item->blok.'</td>
							<td>'.$item->name.'</td>
							<td>'.$item->phone_number.'</td>
							<td>'.$item->no_ktp.'</td>
							<td>'.$item->no_npwp.'</td>
							<td>'.number_format($item->booking_fee).'</td>
							<td>'.date('d-m-Y', strtotime($item->created_at)).'</td>
							<td>'.number_format($item->harga_jual).'</td>
						</tr>';
					}

			$html .= '
				<tr>
					<td colspan="7" align="center">Total</td>
					<td colspan="2">'.number_format($totalBooking).'</td>
					<td>'.number_format($totalOmset).'</td>
				</tr>
			';

			$html .='
					</table>
				</div>';

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);

		$pdf->Output('report.pdf', 'I');
	}

	public function actionUpdateStatus()
	{
		$request = $this->input->post();

		$this->db->where($request['idName'], $request['id']);
		$this->db->update($request['table'], $request['data']);
	}

	public function actionAdd($table)
	{
		$redirect = '';
		$request = $this->input->post();

		if ($table == 'app_list_property') {
			$redirect = '/listProperty';
		}

		if ($table == 'app_user') {
			if ($request['password'] == '') {
				$request = [
					'name' => $request['name'],
					'email' => $request['email'],
					'phone_number' => $request['phone_number'],
					'user_role' => $request['user_role'],
				];
			} else {
				$request = [
					'name' => $request['name'],
					'email' => $request['email'],
					'phone_number' => $request['phone_number'],
					'password' => md5($request['password']),
					'user_role' => $request['user_role'],
				];
			}
			$redirect = '/listUser';
		}

		$this->db->insert($table, $request);

		redirect('admin'.$redirect);
	}

	public function actionUpdate($table, $id)
	{
		$redirect = '';
		$idName = 'id';
		$request = $this->input->post();

		if ($table == 'app_list_property') {
			$redirect = '/listProperty';
		}

		if ($table == 'app_user') {
			if ($request['password'] == '') {
				$request = [
					'name' => $request['name'],
					'email' => $request['email'],
					'phone_number' => $request['phone_number'],
					'user_role' => $request['user_role'],
				];
			} else {
				$request = [
					'name' => $request['name'],
					'email' => $request['email'],
					'phone_number' => $request['phone_number'],
					'password' => md5($request['password']),
					'user_role' => $request['user_role'],
				];
			}

			$redirect = '/listUser';
		}

		$this->db->where($idName, $id);
		$this->db->update($table, $request);

		redirect('admin'.$redirect);
	}

	public function actionDelete($table, $id)
	{
		$redirect = '';
		$idName = 'id';

		if ($table == 'app_list_property') {
			$redirect = '/listProperty';
		}

		if ($table == 'app_user') {
			$redirect = '/listUser';
		}

		$request = $this->input->post();
		$this->db->where($idName, $id);
		$this->db->delete($table);

		redirect('admin'.$redirect);
	}

	public function actionDeleteTrx($id)
	{
		$this->db->where('id_trx', $id);
		$this->db->delete('app_document');

		$this->db->where('id', $id);
		$this->db->delete('app_trx');

		redirect('admin/pembelian');
	}

	public function test()
	{
		$this->load->view('frontend/email/booking', true);
	}

	public function emailVerifikasi(){
		$emailUser = $data->email_pelanggan;
		$subject = "Konfirmasi Pembayaran Berhasil";
		$msg = $this->load->view('email/konfirmasi_pembayaran', $data, TRUE);
		$ci = get_instance();
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.googlemail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "projekdevelopment@gmail.com";
		$config['smtp_pass'] = "d3veL0pm3nt";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$ci->email->initialize($config);
		$ci->email->from('noreply@ptdutaputraland.com', 'PT. Duta Putra Land');
		$ci->email->to($emailUser);
		$ci->email->subject($subject);
		$ci->email->message($msg);
		$this->email->send();

		redirect('admin/pembelian');
	}
}