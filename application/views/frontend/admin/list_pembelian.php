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
						<strong>Daftar Pembelian</strong>
					</div>
					<div class="card-body">
						<input type="hidden" id="idSelected">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<td>No</td>
										<td>Nama</td>
										<td>Blok</td>
										<td>Nama Pembeli</td>
										<td>Data Dokumen</td>
										<td>Status Pembayaran</td>
                    <td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 0;
										foreach ($pembelian as $data) {
											$no++;

											$document = ' <span class="badge badge-success">Lengkap</span>';
											$statusPembayaran = '<span class="badge badge-success">Pembayaran dikonfirmasi</span>';
											$konfirmasi = '';
											$konfirmasiDokumen = '';

											if($data->status_document == 1) {
												$document = ' <span class="badge badge-danger">Sudah diupload</span>';
												$konfirmasiDokumen = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalDocument" onClick="getID(\''.$data->id.'\')"><i class="fa fa-check"></i></button>';
											}

											if($data->status_pembayaran == 1) {
												$statusPembayaran = ' <span class="badge badge-warning">Belum dibayar</span>';
												$konfirmasi = '<button class="btn btn-primary btn-icon btn-sm" data-toggle="modal" data-target="#modalPembayaran" onClick="getID(\''.$data->id_trx.'\')"><i class="fas fa-check"></i></button>';
											}

											if($data->status_pembayaran == 2) {
												$statusPembayaran = '<span class="badge badge-success">Sudah di bayar</span>';
												$konfirmasi = '<button class="btn btn-primary btn-icon btn-sm" data-toggle="modal" data-target="#modalPembayaran" onClick="getID(\''.$data->id_trx.'\')"><i class="fas fa-check"></i></button>';
											}
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $data->property_name ?></td>
											<td><?= $data->blok ?></td>
											<td><?= $data->name ?></td>
											<td>
												<?= $document ?>
                        <a href="<?= base_url('admin/detailDokumen/dokumen/'.$data->id) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
												<?= $konfirmasiDokumen ?>
											</td>
											<td>
												<?= $statusPembayaran ?>
												<a href="<?= base_url('admin/detailDokumen/pembayaran/'.$data->id_trx) ?>" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
												<?= $konfirmasi ?>
											</td>
                      <td>
												<a onclick="return confirm('apakah Anda yakin ingin menghapus data ini?')" href="<?= base_url('admin/actionDelete/app_trx/' . $data->id_trx) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td>
										</tr>
										<?php } ?>
								</tbody>
							</table>

							<!-- The Modal -->
							<div class="modal" id="modalDocument">
								<div class="modal-dialog">
									<div class="modal-content">

										<!-- Modal Header -->
										<div class="modal-header">
											<h4 class="modal-title">Apakah anda yakin ingin verifikasi dokumen ini?</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>

										<!-- Modal footer -->
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary" id="verifikasiDokumen">Submit</button>
										</div>

									</div>
								</div>
							</div>

							<div class="modal" id="modalPembayaran">
								<div class="modal-dialog">
									<div class="modal-content">

										<!-- Modal Header -->
										<div class="modal-header">
											<h4 class="modal-title">Apakah anda yakin ingin verifikasi pembayaran ini?</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>

										<!-- Modal footer -->
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary" id="verifikasiPembayaran">Submit</button>
										</div>

									</div>
								</div>
							</div>
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

<script>
	$("#verifikasiDokumen").click(function() {
		const id = $('#idSelected').val();

		const formData = {
      id: id,
      idName: 'id',
			table: 'app_document',
			data: {
				status_document: 2
			}
    }

    $.post('<?= base_url('admin/actionUpdateStatus'); ?>', formData, function( data ) {
      window.location.reload();
    });
	});

	$("#verifikasiPembayaran").click(function() {
		const id = $('#idSelected').val();

		const formData = {
      id: id,
      idName: 'id',
			table: 'app_trx',
			data: {
				status_pembayaran: 3
			}
    }

    $.post('<?= base_url('admin/actionUpdateStatus'); ?>', formData, function( data ) {
      window.location.reload();
    });
	});

	function getID(id) {
		$('#idSelected').val(id);
	}
</script>