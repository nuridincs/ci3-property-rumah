<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('frontend/partials/head.php') ?>
</head>
<body>
  <div class="container my-5">
    <hr class="mt-2 mb-5">
    <h3>Data Pembelian</h3>
    <table class="table">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Type</th>
          <th>Blok</th>
          <th>Status Dokumen</th>
          <th>Status Pembayaran</th>
          <th>Konfirmasi Pembayaran</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $no = 0;
        foreach ($data as $value) {
          $no++;

          $document = ' <span class="badge badge-success">Lengkap</span>';
          $statusPembayaran = '<span class="badge badge-success">Sudah di bayar</span>';
          $konfirmasi = '<a href="'.base_url('admin/detailDokumen/pembayaran/'.$value->id_trx).'" class="btn btn-info btn-icon btn-sm"><i class="fas fa-eye"></i> Lihat Bukti Pembayaran</a>';

          if($value->status_document == 1) {
            $document = ' <span class="badge badge-danger">Sedang di cek oleh admin</span>';
          }

          if($value->status_pembayaran == 1) {
            $statusPembayaran = ' <span class="badge badge-warning">Belum dibayar</span>';
            $konfirmasi = '<a href="'.base_url('property/konfirmasi').'" class="btn btn-primary btn-icon btn-sm"><i class="fas fa-check"></i> Konfirmasi</a>';
          }
      ?>
        <tr>
          <td><?= $no; ?></td>
          <td><?= $value->property_name ?></td>
          <td><?= $value->blok ?></td>
          <td><?= $document ?></td>
          <td>
            <?= $statusPembayaran ?>
            <!-- <button class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Konfirmasi Pembayaran"><i class="fas fa-check"></i></button> -->
          </td>
          <td>
            <?= $konfirmasi ?>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
<?php $this->load->view('frontend/partials/js.php') ?>

</body>
</html>