<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('frontend/partials/head.php') ?>
</head>
<body>
  <!-- Page Content -->
<div class="container">
  <hr class="mt-2 mb-5 mt-5">
  <div class="row text-center text-lg-left">
    <?php foreach($property as $data){ ?>
      <div class="col-6">
        <div class="card">
          <a href="property/detail/<?= $data->id; ?>">
            <img class="card-img-top" src="assets/img/cover/<?= $data->image ?>" alt="Card image cap" height="400">
            <div class="card-body">
              <p class="card-text"><?= $data->property_name; ?></p>
              <div>Harga Mulai <?= number_format($data->harga, 2); ?></div>
            </div>
          </a>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
</body>
</html>