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

            <?php $url =  $action == 'edit' ? 'admin/actionUpdate/app_customer/'.$data->id : 'admin/actionAdd/app_user' ?>

            <form method="post" action="<?= base_url($url); ?>">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="name" value="<?= $action == 'edit' ? $data->name : '' ?>" required>
              </div>

              <!-- <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $action == 'edit' ? $data->email : '' ?>" required>
              </div> -->

              <div class="form-group">
                <label for="no_telpon">Nomor Telepon</label>
                <input type="text" class="form-control" name="phone_number" value="<?= $action == 'edit' ? $data->phone_number : '' ?>" required>
              </div>

              <!-- <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
              </div> -->
              <button class="btn btn-danger btn-block">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>