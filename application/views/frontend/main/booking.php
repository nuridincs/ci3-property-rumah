<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $this->load->view('frontend/partials/head.php');
  ?>
</head>
<body>
    <hr class="mt-2 mb-5">
    <div class="container">
      <h3>Silahkan Lengkapi Data</h3>
      <hr>

      <h4><?= $item[0]->property_name; ?></h4>
      <div>Harga Jual <span class="badge badge-danger"><?= number_format($item[0]->harga); ?></span></div>
      <div>Total DP <span class="badge badge-info"><?= number_format($item[0]->dp); ?></span></div>
      <div>Booking fee <span class="badge badge-success"><?= number_format($item[0]->booking_fee); ?></span></div>
      <br>

      <form class="my-5" method="post" action="<?= base_url('property/submitBooking') ?>" enctype="multipart/form-data">
        <div class="row">
          <div class="col">
            <h4>Pilih Unit</h4><br>

            <div class="form-group">
              <label for="">Nomor Blok</label>
              <select class="form-control" name="blok" id="blok" required>
                <option value="">--Silahkan Pilih--</option>
                <?php foreach($item as $data) { ?>
                  <option value="<?= $data->id ?>"><?= $data->blok.' - '.$data->no_kavling ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Tenor</label>
              <select class="form-control" name="tenor" id="tenor" required>
                <option value="">--Silahkan Pilih--</option>
                <?php foreach($tenor as $data) { ?>
                  <option value="<?= $data->id ?>"><?= $data->jumlah_tenor ?></option>
                <?php } ?>
              </select>
            </div>

            <button class="btn btn-danger btn-block" id="actionDetailRincian">Lihat Rincian Angsuran</button>

            <div id="detail-rincian"></div>
          </div>

          <div class="col">
            <h4>Upload Dokumen</h4><br>

            <div class="form-group">
              <label for=""ktp>KTP</label>
              <input type="text" name="no_ktp" class="form-control" placeholder="Masukan No. KTP" required><br>
              <input type="file" name="document[]" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="kk">KK</label>
              <input type="file" name="document[]" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="npwp">NPWP</label>
              <input type="text" name="no_npwp" class="form-control" placeholder="Masukan No. NPWP" required><br>
              <input type="file" name="document[]" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="mutasi_rekening">Mutasi Rekening</label>
              <input type="file" name="document[]" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="skk">Surat Keterangan Kerja</label>
              <input type="file" name="document[]" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="slip_gaji">Slip Gaji</label>
              <input type="file" name="document[]" class="form-control" required>
            </div>
          </div>
        </div>
        <button class="btn btn-danger btn-block">Submit</button>
      </form>
    </div>
  </div>

<?php $this->load->view('frontend/partials/js.php') ?>
</body>
</html>

<script>
  $("#actionDetailRincian").click(function() {
    const id_blok = $('#blok').val();
    const id_tenor = $('#tenor').val();

    if (id_blok == '') {
      alert('Blok belum di pilih');
      return false;
    }

    if (id_tenor == '') {
      alert('Tenor belum di pilih');
      return false;
    }

    const formData = {
      id_blok: id_blok,
      id_tenor: id_tenor,
    }

    $.post('<?= base_url('property/actionDetailRincian'); ?>', formData, function( data ) {
      // window.location.reload();
      $('#detail-rincian').html(data);
    });
  });
</script>