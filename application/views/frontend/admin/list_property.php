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
				</div>
				<div class="card shadow">
					<div class="card-header">
						<a href="<?= base_url('admin/form/form_rumah/tambah') ?>" class="btn btn-primary btn-sm">Tambah</a>
						<strong>Daftar Cluster</strong>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<td>No</td>
										<td>Nama</td>
										<td>Harga</td>
										<td>Booking Fee</td>
										<td>Deskripsi</td>
                    <td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($property as $data): ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $data->property_name ?></td>
											<td>Rp. <?= number_format($data->harga, 2); ?></td>
											<td>Rp. <?= number_format($data->booking_fee, 2); ?></td>
											<td><?= $data->deskripsi ?></td>
                      <td>
                        <a href="<?= base_url('admin/form/form_rumah/edit/app_list_property/').$data->id ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                        <a onclick="return confirm('apakah Anda yakin ingin menghapus data ini?')" href="<?= base_url('admin/actionDelete/app_list_property/' . $data->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td>
										</tr>
									<?php endforeach ?>
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
	<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>
</html>