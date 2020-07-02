<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('frontend/partials/head.php') ?>
</head>
<body>
  <div class="container my-5 w-50">
    <hr class="mt-2 mb-5">
    <h3>Konfirmasi Pembayaran</h3>
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label for="">Upload Bukti Transfer</label>
          <input type="file" class="form-control">
        </div>
        <button class="btn btn-danger btn-block">Submit</button>
      </div>
    </div>
  </div>
<?php $this->load->view('partials/js.php') ?>

</body>
</html>