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
            <h3>Form <?= $action ?> Cluster</h3>
            <?php $url =  $action == 'edit' ? 'admin/actionUpdate/app_list_property/'.$data->id : 'admin/actionAdd/app_list_property' ?>
            <form method="post" action="<?= base_url($url); ?>">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="property_name" value="<?= $action == 'edit' ? $data->property_name : '' ?>" required>
              </div>

              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" name="harga" value="<?= $action == 'edit' ? $data->harga : '' ?>" required>
              </div>

              <div class="form-group">
                <label for="booking_fee">Booking Fee</label>
                <input type="text" class="form-control" name="booking_fee" value="<?= $action == 'edit' ? $data->booking_fee : '' ?>" required>
              </div>

              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi"><?= $action == 'edit' ? $data->deskripsi : '' ?></textarea>
              </div>

              <button class="btn btn-danger btn-block">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>