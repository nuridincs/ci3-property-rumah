<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>PT. Duta Putra Land - Login</title>
	<link href="<?= base_url('sb-admin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="justify-content-center">
			<div class="w-50 m-auto">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">
									<strong>Form Daftar Customer</strong>
								</h1>
							</div>
							<form method="post" action="<?= base_url('auth/prosesRegister') ?>">
								<div class="form-group">
									<label for="nama">Nama Lengkap</label>
									<input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" autocomplete="off" required name="name">
								</div>

								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Masukkan Email" required name="email">
								</div>

								<div class="form-group">
									<label for="phone_number">Nomor Telepon</label>
									<input type="text" class="form-control" id="phone_number" placeholder="Masukkan Nomor Telepon" required name="phone_number">
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" placeholder="Masukkan Password" required name="password">
								</div>

								<button type="submit" class="btn btn-primary btn-block">
									Register
								</button>
							</form>
							<small>Sudah punya akun? silahkan <a href="/auth">login</a></small>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<script src="<?= base_url('sb-admin') ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/js/sb-admin-2.min.js"></script>
</body>

</html>
