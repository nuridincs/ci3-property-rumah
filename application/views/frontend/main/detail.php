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
      <!-- <div class="carousel-item active">
        <img src="<?//= base_url(); ?>/assets/img/jasmine/1.jpeg" alt="Los Angeles" width="100%" height="400">
      </div> -->
      <!-- <div class="carousel-item">
        <img src="<?//= base_url(); ?>/assets/img/jasmine/2.jpeg" alt="Chicago" width="100%" height="400">
      </div>
      <div class="carousel-item">
        <img src="<?//= base_url(); ?>/assets/img/jasmine/3.jpeg" alt="New York" width="100%" height="400">
      </div> -->
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
      <?php //print_r($item);die; ?>
        <h2> <strong>Harga Mulai dari <?= number_format($item[0]->harga, 2); ?></strong></h2>
        <h3><?= $item[0]->property_name; ?></h3>
        <div>Bekasi</div>
        <div>Developer: PT Qodau Sukses Propertindo</div>
        <hr>
        <p class="property-description ListingDetailstyle__FormattedContentWrapper-hneQUV ckFCCe">PT. Qodau Sukses Propertindo, perusahaan Joint Ventur besutan PT. Premier Qualitas Indonesia dan PT. Biwel Sukses Bersama mempersembahkan, sebuah hunian eksklusif dengan suasana alam tropis asri yang diberi nama Premier Estate 2.
          Lokasi perumahan ini cukup strategis, terletak di perbatasan Jakarta Timur tepatnya di Jalan Raya Kodau, Jatiwarna. Lokasi tersebut bisa diakses melalui 2 akses tol, yaitu Tol JORR dan Lingkar Dalam.
          Selain itu, terdapat berbagai fasilitas umum di sekitar area perumahan, seperti:
          <ul>
            <li>Sekliah bertaraf internasional</li>
            <li>Pusat perkantoran kawasan TB Simatupang</li>
            <li>Pusat rekreasi TMII</li>
            <li>Pusat perbelanjaan dan hotel-hotel</li>
            <li>Rumah sakit</li>
            <li>Bandara</li>
          </ul>
        </p>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">PT Qodau Sukses Propertindo</h5>
            <p class="card-text">089792342343</p>
            <a href="<?= base_url() ?>property/booking/<?= $item[0]->id_property ?>" class="btn btn-danger btn-block">Booking Sekarang</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('partials/js.php') ?>
</body>
</html>