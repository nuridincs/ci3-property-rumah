<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('frontend/partials/head-admin.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('frontend/partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('petugas') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('frontend/partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<?php if ($this->session->login['role'] == 'admin'): ?>
							<a href="<?= base_url('petugas/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
							<a href="<?= base_url('petugas/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
						<?php endif ?>
					</div>
				</div>
				<hr>
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php elseif($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('error') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>
				<div class="card shadow">
					<div class="card-header">
						<form method="post" action="<?= base_url('admin/filterLaporan') ?>">
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>Tanggal Awal:</label>
										<input data-date-format="dd-mm-yyyy" class="form-control" name="date_from" id="date_from" required>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Tanggal Akhir:</label>
										<input data-date-format="dd-mm-yyyy" class="form-control" name="date_to" id="date_to" required>
									</div>
								</div>
								<div class="col d-flex align-items-center">
									<button class="btn btn-danger btn-sm">Filter</button>&nbsp;
									<a href="<?= base_url('admin/laporan') ?>" class="btn btn-primary btn-sm">Refresh</a>
								</div>
							</div>
						</form>
						<a href="<?= base_url('admin/cetakLaporan') ?>" class="btn btn-info btn-sm">Cetak Laporan</a>
						<!-- <strong>Laporan</strong> -->
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<td>No</td>
										<td>Tipe Rumah</td>
										<td>Blok Rumah</td>
										<td>Nama Pembeli</td>
										<td>No. Telepon</td>
										<td>No. KTP</td>
										<td>No. NPWP</td>
										<td>Booking Fee</td>
										<td>Tanggal Booking</td>
										<td>Harga</td>
                    <td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 1;
										$totalBooking = 0;
										$totalOmset = 0;
										foreach ($pembelian as $data){
											$totalBooking += $data->booking_fee;
											$totalOmset += $data->harga_jual;
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $data->property_name ?></td>
											<td><?= $data->blok ?></td>
											<td><?= $data->name ?></td>
											<td><?= $data->phone_number ?></td>
											<td><?= $data->no_ktp ?></td>
											<td><?= $data->no_npwp ?></td>
											<td><?= number_format($data->booking_fee, 0); ?></td>
											<td><?= date('d-m-Y', strtotime($data->created_at)) ?></td>
											<td><?= number_format($data->harga_jual); ?></td>
                      <td>
                        <a href="<?= base_url('petugas/ubah/' . $data->id) ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                        <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('data/hapus/' . $data->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td>
										</tr>
									<?php } ?>
									<tr>
										<td colspan="7" align="center">Total</td>
										<td colspan="2"><?= number_format($totalBooking) ?></td>
										<td><?= number_format($totalOmset) ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('frontend/partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('frontend/partials/js.php') ?>
</body>
</html>

<script>
$(function() {
	$('#date_from').datepicker();
	$('#date_to').datepicker();

	$('#date_from').on('changeDate', function(ev){
		$(this).datepicker('hide');
	});

	$('#date_to').on('changeDate', function(ev){
		$(this).datepicker('hide');
	});
});
</script>