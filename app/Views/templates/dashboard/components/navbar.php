<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, <?= session()->nama ?></div></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="/dashboard/admin/edit-profile" class="dropdown-item has-icon"> <!-- tambahin /id dari session  -->
            <i class="far fa-user"></i> Edit Profile
            </a>
            <a href="/dashboard/admin/ubah-password" class="dropdown-item has-icon"> <!-- tambahin /id dari session  -->
            <i class="fas fa-cog"></i> Ubah Password
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('momod/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
        </li>
    </ul>
</nav>