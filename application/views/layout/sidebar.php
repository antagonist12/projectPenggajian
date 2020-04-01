<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(''); ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-map-marker"></i>
		</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<div class="sidebar-heading">
		Dashboard
	</div>

	<!-- Daftar Kategori Menu -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url(''); ?>">
			<i class="fas fa-tachometer-alt fa-fw"></i>
			<span>Home</span>
		</a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<div class="sidebar-heading">
		Menu Master
	</div>

	<!-- Daftar Produk Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-boxes fa-fw"></i>
			<span>Daftar Menu</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('Jabatan'); ?>">Daftar Jabatan</a>
				<a class="collapse-item" href="<?= base_url('Karyawan'); ?>">Daftar Karyawan</a>
				<a class="collapse-item" href="<?= base_url('Aturan_gaji'); ?>">Daftar Aturan Gaji</a>
			</div>
		</div>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<div class="sidebar-heading">
		Penggajian
	</div>

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('Penggajian'); ?>">
			<i class="fas fa-list fa-fw"></i>
			<span>Penggajian Karyawan</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
