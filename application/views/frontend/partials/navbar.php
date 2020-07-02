<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="/">Property Rumah</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= $aktif == '/' ? 'active' : '' ?>">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?= $aktif == 'trx' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url() ?>property/transaksi">Lihat Pembelian</a>
      </li>
      <li class="nav-item <?= $aktif == 'konfirmasi' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url() ?>property/konfirmasi">Konfirmasi Pembayaran</a>
      </li>
    </ul>
    <!-- <form class="form-inline mt-2 mt-md-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>