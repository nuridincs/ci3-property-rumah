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
											<td><?= $data->harga ?></td>
											<td><?= $data->booking_fee ?></td>
											<td><?= $data->deskripsi ?></td>
                      <td>
                        <a href="<?= base_url('admin/form/form_rumah/edit') ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                        <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('data/hapus/' . $data->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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