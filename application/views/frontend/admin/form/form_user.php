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
            <h3>Form <?= $action ?> User</h3>
            <form method="post" action="/">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" value="<?= $action == 'edit' ? 'test' : '' ?>" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="<?= $action == 'edit' ? 'sinta@gmail.com' : '' ?>" required>
            </div>
            <div class="form-group">
              <label for="no_telpon">Nomor Telepon</label>
              <input type="text" class="form-control" name="no_telpon" value="<?= $action == 'edit' ? '08198234324324' : '' ?>" required>
            </div>
            <button class="btn btn-danger btn-block">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>