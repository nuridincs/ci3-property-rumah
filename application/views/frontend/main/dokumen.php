<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('frontend/partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('petugas') ?>">
				<!-- load Topbar -->

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
				</div>
				<hr>
				<div class="card shadow container">
          <div class="m-3">
            <h3>Bukti Pembayaran</h3>
            <div class="row text-center text-lg-left">
            <div class="col">
              <div class="card">
                <img class="card-img-top w-50 m-auto" src="<?= base_url() ?>assets/uploads/konfirmasi/<?= $dokumen->bukti_pembayaran ?>" alt="Card image cap" height="400">
              </div>
            </div>
            <a href="javascript:history.go(-1)" class="btn btn-primary btn-block mt-5">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>