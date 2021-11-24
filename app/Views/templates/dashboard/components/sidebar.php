<?php
$uri = service('uri')->getSegments();
$uri1 = $uri[1] ?? 'index';
$uri2 = $uri[2] ?? '';
$uri3 = $uri[3] ?? '';
?>

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="/dashboard">HELMKU</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="/dashboard">HK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            <li class="<?= $uri1 == 'index' ? 'active' : '' ?>"><a class="nav-link" href="/dashboard"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Menu</li>

            <li class="nav-item dropdown <?= ($uri1 == 'data-transaksi') ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tasks"></i> <span>Data Transaksi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/dashboard/data-transaksi/belum-membayar">Belum membayar</a></li>
                    <li><a class="nav-link" href="/dashboard/data-transaksi/sudah-membayar">Sudah membayar</a></li>
                    <li><a class="nav-link" href="/dashboard/data-transaksi/terverifikasi">Terverifikasi</a></li>
                    <li><a class="nav-link" href="/dashboard/data-transaksi/dikirim">Sedang dikirim</a></li>
                    <li><a class="nav-link" href="/dashboard/data-transaksi/selesai">Selesai</a></li>
                </ul>
            </li>

            <li class="<?= $uri1 == 'laporan-penjualan' ? 'active' : '' ?>"><a class="nav-link" href="/dashboard/laporan-penjualan"><i class="fas fa-book"></i> <span>Laporan Penjualan</span></a></li>

            <li class="nav-item dropdown <?= ($uri1 == 'produk') ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-luggage-cart"></i> <span>Produk</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/dashboard/produk">Daftar Produk</a></li>
                    <li><a class="nav-link" href="/dashboard/produk/tambah-produk">Tambah Produk</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown <?= ($uri1 == 'kategori') ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i> <span>Kategori</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/dashboard/kategori">Daftar Kategori</a></li>
                    <li><a class="nav-link" href="/dashboard/kategori/tambah-kategori">Tambah Kategori</a></li>
                </ul>
            </li>

            <li class="<?= $uri1 == 'data-pelanggan' ? 'active' : '' ?>"><a class="nav-link" href="/dashboard/data-pelanggan"><i class="fas fa-users"></i> <span>Data Pelanggan</span></a></li>

        </ul>
    </aside>
</div>