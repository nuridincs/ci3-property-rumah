<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('frontend/partials/head.php') ?>
</head>
<body>
  <!-- Page Content -->
<div class="container">
  <hr class="mt-2 mb-5">
  <!-- <div>Detail</div> -->
  <div id="demo" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <?php
          $type = 'paris';
          if ($item[0]->id_property == 1) {
            $type = 'jasmine';
          }

          for ($i=1; $i <= 5 ; $i++) {
      ?>
          <div class="carousel-item <?= $i == 1 ? 'active' : '' ?>">
            <img src="<?= base_url(); ?>/assets/img/<?= $type.'/'.$i ?>.jpeg" alt="Los Angeles" width="100%" height="400">
          </div>
      <?php
          }
        ?>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
  <hr>
  <div class="mt-5">
    <div class="row">
      <div class="col-8">
        <h2> <strong>Harga Mulai dari <?= number_format($item[0]->harga, 2); ?></strong></h2>
        <h3><?= $item[0]->property_name; ?></h3>
        <div>Bekasi</div>
        <?php //echo "<pre>";print_r($item); ?>
        <div>Developer: PT Duta Putra Land</div>
        <hr>
        <p class="property-description ListingDetailstyle__FormattedContentWrapper-hneQUV ckFCCe">
          <?= $item[0]->deskripsi ?>
        </p>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">PT Duta Putra Land</h5>
            <p class="card-text">021-123456</p>
            <?php if ($this->session->userdata('status') == 'login') { ?>
              <a href="<?= base_url() ?>property/booking/<?= $item[0]->id_property ?>" class="btn btn-danger btn-block">Booking Sekarang</a>
            <?php } else { ?>
              <a href="<?= base_url() ?>property/booking/<?= $item[0]->id_property ?>" class="btn btn-danger btn-block disabled">Booking Sekarang</a>
              <small>Anda belum login. Silahkan <a href="/auth">login</a> terlebih dahulu agar bisa melakukan booking</small>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('frontend/partials/js.php') ?>
</body>
</html>