<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('frontend/partials/head.php') ?>
</head>
<body>
    <hr class="mt-2 mb-5">
    <div class="container">
      <h3>Silahkan Lengkapi Data</h3>
      <hr>
      <h4>Cluster Jasmine</h4>
      <div>Harga Jual <span class="badge badge-danger">1.000.000.000</span></div>
      <div>Total DP <span class="badge badge-info">20.000.000</span></div>
      <div>Booking fee <span class="badge badge-success">2.500.000</span></div>
      <br>
      <form class="my-5">
        <div class="row">
          <div class="col">
            <h4>Pilih Unit</h4><br>
            <div class="form-group">
              <label for="">Nomor Blok</label>
              <select class="form-control" name="blok" id="">
                <?php foreach($item as $data) { ?>
                  <option value="<?= $data->id ?>"><?= $data->blok ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Tenor</label>
              <select class="form-control" name="tenor" id="">
                <?php foreach($tenor as $data) { ?>
                  <option value="<?= $data->id ?>"><?= $data->jumlah_tenor ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col">
            <h4>Upload Dokumen</h4><br>
            <div class="form-group">
              <label for=""ktp>KTP</label>
              <input type="file" name="ktp" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="kk">KK</label>
              <input type="file" name="kk" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="npwp">NPWP</label>
              <input type="file" name="npwp" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="mutasi_rekening">Mutasi Rekening</label>
              <input type="file" name="mutasi_rekening" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="skk">Surat Keterangan Kerja</label>
              <input type="file" name="skk" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="slip_gaji">Slip Gaji</label>
              <input type="file" name="slip_gaji" class="form-control" required>
            </div>
          </div>
        </div>
        <button class="btn btn-danger btn-block">Submit</button>
      </form>
    </div>
  </div>

<?php $this->load->view('partials/js.php') ?>
</body>
</html>