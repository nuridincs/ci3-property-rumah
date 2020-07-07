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
				<div class="card shadow container">
          <div class="m-3">
            <h3>Dokumen</h3>
            <div class="row text-center text-lg-left">
            <?php if ($type == 'dokumen') { ?>
              <div class="col-6">
                <div class="card">
                  <img class="card-img-top" src="<?= base_url() ?>assets/uploads/<?= $dokumen->ktp ?>" alt="Card image cap" height="400">
                </div>
              </div>
              <div class="col-6">
                <div class="card">
                  <img class="card-img-top" src="<?= base_url() ?>assets/uploads/<?= $dokumen->kk ?>" alt="Card image cap" height="400">
                </div>
              </div>
              <div class="col-6">
                <div class="card">
                  <img class="card-img-top" src="<?= base_url() ?>assets/uploads/<?= $dokumen->npwp ?>" alt="Card image cap" height="400">
                </div>
              </div>
              <div class="col-6">
                <div class="card">
                  <img class="card-img-top" src="<?= base_url() ?>assets/uploads/<?= $dokumen->mutasi_rekening ?>" alt="Card image cap" height="400">
                </div>
              </div>
              <div class="col-6">
                <div class="card">
                  <img class="card-img-top" src="<?= base_url() ?>assets/uploads/<?= $dokumen->surat_keterangan_karyawan ?>" alt="Card image cap" height="400">
                </div>
              </div>
              <div class="col-6">
                <div class="card">
                  <img class="card-img-top" src="<?= base_url() ?>assets/uploads/<?= $dokumen->slip_gaji ?>" alt="Card image cap" height="400">
                </div>
              </div>
            <?php } else { ?>
              <div class="col-6">
                <div class="card">
                  <img class="card-img-top" src="<?= base_url() ?>assets/uploads/konfirmasi/<?= $dokumen->bukti_pembayaran ?>" alt="Card image cap" height="400">
                </div>
              </div>
            <?php } ?>
            </div>

            <a href="javascript:history.go(-1)" class="btn btn-primary btn-block">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>