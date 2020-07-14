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

      <?php if (count($item) > 0){ ?>

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
              <label for="">Tipe Pembayaran</label>
              <select class="form-control" name="tipe_pembayaran" id="tipe_pembayaran" required>
                <option value="">--Silahkan Pilih--</option>
                <option value="1">KPR</option>
                <option value="2">Cash Keras</option>
                <option value="3">Cash Bertahap</option>
              </select>
            </div>

            <div class="form-group" style="display:none" id="flag_tenor_by_tipe">
              <label for="">Tenor</label>
              <select class="form-control" name="tenor" id="tenor" required>
                <option value="5">--Silahkan Pilih--</option>
                <?php foreach($tenor as $data) { ?>
                  <option value="<?= $data->id ?>"><?= $data->jumlah_tenor ?></option>
                <?php } ?>
              </select>
            </div>

            <button class="btn btn-danger btn-block flag_by_tipe" style="display:none" id="actionDetailRincian">Lihat Rincian Angsuran</button>

            <div class="flag_by_tipe" style="display:none" id="detail-rincian"></div>
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

      <?php } else { echo "<h1>Data Kavling tidak tersedia</h1>";  } ?>
    </div>
  </div>

<?php $this->load->view('frontend/partials/js.php') ?>
</body>
</html>

<script>
  $("#actionDetailRincian").click(function() {
    const id_blok = $('#blok').val();
    const id_tenor = $('#tenor').val();
    const tipe = $('#tipe_pembayaran').val();

    if (id_blok == '') {
      alert('Blok belum di pilih');
      return false;
    }

    if (tipe == 1) {
      if (id_tenor == 5) {
        alert('Tenor belum di pilih');
        return false;
      }
    }

    const formData = {
      id_blok: id_blok,
      id_tenor: id_tenor,
    }

    $.post('<?= base_url('property/actionDetailRincian'); ?>', formData, function( data ) {
      $('#detail-rincian').html(data);
    });
  });

  $('#tipe_pembayaran').change(function() {
    $('#tenor').val(5);
    $('#detail-rincian').html('');

    const tipe = $('#tipe_pembayaran').val();

    $('.flag_by_tipe').attr('style', 'display:none;');
    $('#flag_tenor_by_tipe').attr('style', 'display:none;');

    if (tipe == 1) {
      $('.flag_by_tipe').attr('style', 'display:block;');
      $('#flag_tenor_by_tipe').attr('style', 'display:block;');
    }

    if (tipe == 3) {
      $('.flag_by_tipe').attr('style', 'display:block;');
    }
  });
</script>