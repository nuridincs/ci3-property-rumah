<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('frontend/partials/head.php') ?>
</head>
<body>
  <!-- Page Content -->
<div class="container">
  <hr class="mt-2 mb-5 mt-5">
  <h1 class="mb-5">Selamat Datang di PT. Duta Putra Land</h1>
  <div class="row text-center text-lg-left">
    <?php foreach($property as $data){ ?>
      <div class="col-6">
        <div class="card">
          <img img class="card-img-top" src="assets/img/cover/<?= $data->image ?>" alt="Card image cap" height="400">
          <div class="card-body">
            <h5 class="card-title"><?= $data->property_name; ?></h5>
            <p class="card-text">Harga Mulai <?= number_format($data->harga, 2); ?></p>
            <a href="property/detail/<?= $data->id; ?>" class="btn btn-danger stretched-link">Lihat Detail</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
</body>
</html>