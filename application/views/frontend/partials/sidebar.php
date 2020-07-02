<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">PT. Property Utama</div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('admin/') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
			<hr class="sidebar-divider">

			<li class="nav-item <?= $aktif == 'pembelian' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('admin/pembelian') ?>">
					<i class="fas fa-fw fa-box"></i>
					<span>Kelola Pembelian</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'customer' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('admin/customer') ?>">
					<i class="fas fa-fw fa-user"></i>
					<span>Kelola Data Customer</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'property' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('admin/listProperty') ?>">
					<i class="fas fa-fw fa-user"></i>
					<span>Kelola Data Rumah</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'user' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('admin/listUser') ?>">
					<i class="fas fa-fw fa-users"></i>
					<span>Kelola User</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'laporan' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('admin/laporan') ?>">
					<i class="fas fa-fw fa-file-invoice"></i>
					<span>Laporan</span></a>
			</li>

			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>