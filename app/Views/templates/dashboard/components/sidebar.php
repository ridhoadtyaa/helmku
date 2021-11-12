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
            <li class="<?= $uri1 == 'data-transaksi' ? 'active' : '' ?>"><a class="nav-link" href="/dashboard/data-transaksi"><i class="fas fa-tasks"></i> <span>Data Transaksi</span></a></li>
            <li class="nav-item dropdown <?= ($uri1 == 'produk') ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-luggage-cart"></i> <span>Produk</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/dashboard/produk">Daftar Produk</a></li>
                    <li><a class="nav-link" href="/dashboard/produk/tambah-produk">Tambah Produk</a></li>
                </ul>
            </li>
            <li class="menu-header">Admin</li>
            <li class="nav-item dropdown <?= ($uri1 == 'admin') ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users-cog"></i> <span>Admin</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/dashboard/admnin">Daftar Admin</a></li>
                    <li><a class="nav-link" href="/dashboard/admin/tambah-admin">Tambah Admin</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>