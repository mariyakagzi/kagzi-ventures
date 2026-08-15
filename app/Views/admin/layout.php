<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Kagzi Ventures Admin') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            overflow-x: hidden;
        }
        .admin-sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background: #1e293b;
            color: #94a3b8;
            z-index: 100;
            transition: all 0.3s;
        }
        .admin-sidebar .sidebar-brand {
            padding: 20px;
            background: #0f172a;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #334155;
        }
        .admin-sidebar .sidebar-brand img {
            max-height: 40px;
            border-radius: 4px;
        }
        .admin-sidebar .sidebar-menu {
            list-style: none;
            padding: 15px 0;
            margin: 0;
        }
        .admin-sidebar .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 0.95rem;
            transition: 0.2s;
        }
        .admin-sidebar .sidebar-menu li a:hover,
        .admin-sidebar .sidebar-menu li.active a {
            background: #0088cc;
            color: #ffffff;
        }
        .admin-sidebar .sidebar-menu li a i {
            width: 25px;
            font-size: 1.1rem;
        }
        .admin-main {
            margin-left: 250px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .admin-header {
            background: #ffffff;
            height: 65px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .admin-content {
            padding: 30px;
            flex: 1;
        }
        .card-dash {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            background: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Admin Sidebar -->
    <aside class="admin-sidebar">
        <div class="sidebar-brand">
            <img src="<?= base_url('assets/images/logo-kagzi.jpeg') ?>" alt="Logo" class="mr-2">
            <span class="font-weight-bold text-white">Admin Panel</span>
        </div>
        <ul class="sidebar-menu">
            <li class="<?= (url_is('admin/dashboard') || url_is('admin')) ? 'active' : '' ?>">
                <a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="<?= url_is('admin/products*') ? 'active' : '' ?>">
                <a href="<?= base_url('admin/products') ?>"><i class="fa fa-box-open"></i> Products</a>
            </li>
            <li class="<?= url_is('admin/categories*') ? 'active' : '' ?>">
                <a href="<?= base_url('admin/categories') ?>"><i class="fa fa-tags"></i> Categories</a>
            </li>
            <li class="mt-4 border-top border-secondary pt-3">
                <a href="<?= base_url('/') ?>" target="_blank"><i class="fa fa-external-link-alt"></i> View Main Site</a>
            </li>
            <li>
                <a href="<?= base_url('admin/logout') ?>" class="text-danger"><i class="fa fa-sign-out-alt"></i> Log Out</a>
            </li>
        </ul>
    </aside>

    <!-- Admin Main Container -->
    <div class="admin-main">
        <!-- Admin Header Navbar -->
        <header class="admin-header">
            <div>
                <h5 class="mb-0 font-weight-bold text-dark"><?= esc($title ?? 'Dashboard') ?></h5>
            </div>
            <div class="d-flex align-items-center">
                <span class="mr-3 text-muted">Signed in as: <strong class="text-dark"><?= esc(session()->get('admin_name') ?? 'Kagzi Admin') ?></strong></span>
                <a href="<?= base_url('admin/logout') ?>" class="btn btn-sm btn-outline-danger">
                    <i class="fa fa-power-off"></i> Logout
                </a>
            </div>
        </header>

        <!-- Admin Content Body -->
        <main class="admin-content">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fa fa-check-circle mr-2"></i> <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <i class="fa fa-exclamation-triangle mr-2"></i> <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('admin_content') ?>
        </main>
    </div>

    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
