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
          <th>Status Pembayarn</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>CLuster Jasmine</td>
          <td>AD1</td>
          <td><span class="badge badge-success">Lengkap</span></td>
          <td>
            <span class="badge badge-warning">Belum di bayar</span>
            <button class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Konfirmasi Pembayaran"><i class="fas fa-check"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
<?php $this->load->view('partials/js.php') ?>

</body>
</html>