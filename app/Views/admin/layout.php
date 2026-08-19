<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Kagzi Ventures Admin') ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/icons/favicon.png') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&family=Urbanist:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
    <style>
        body, button, input, select, textarea, label, table, td, th, p, span, a {
            font-family: 'Albert Sans', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-weight: 300;
        }
        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .sidebar-brand {
            font-family: 'Urbanist', sans-serif !important;
            font-weight: 700;
        }
        i, i::before, i::after, .fa, .fas, .far, .fal, .fab, [class^="fa-"], [class*=" fa-"] {
            font-family: "Font Awesome 5 Free", "FontAwesome" !important;
        }
        .fab, .fab::before, .fab::after {
            font-family: "Font Awesome 5 Brands" !important;
        }
        body {
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
            background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%);
            color: #ffffff;
            border-left: 4px solid #C5A059;
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
    <script>
    $(document).ready(function() {
        // Product AI Generation Handler
        $(document).on('click', '.btn-ai-gen', function(e) {
            e.preventDefault();
            var $btn = $(this);
            var fieldType = $btn.data('field');
            var productName = $('#name').val() ? $('#name').val().trim() : '';
            var categoryId = $('#category_id').val() ? $('#category_id').val() : 0;

            if (!productName) {
                alert('Please enter a Product Name first before generating AI content.');
                $('#name').focus();
                return;
            }

            var origHtml = $btn.html();
            $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin mr-1"></i> Generating...');

            $.ajax({
                url: '<?= base_url('admin/ai/generate') ?>',
                type: 'POST',
                data: {
                    field_type: fieldType,
                    product_name: productName,
                    category_id: categoryId
                },
                dataType: 'json',
                timeout: 60000,
                success: function(res) {
                    $btn.prop('disabled', false).html(origHtml);
                    if (res.success) {
                        $('#' + fieldType).val(res.text);
                        $('#' + fieldType).addClass('is-valid');
                        setTimeout(function() { $('#' + fieldType).removeClass('is-valid'); }, 2500);
                    } else {
                        alert('AI Generation Notice:\n' + res.message);
                    }
                },
                error: function(xhr, status, err) {
                    $btn.prop('disabled', false).html(origHtml);
                    alert('Error connecting to AI Generation service: ' + (err || status));
                }
            });
        });

        // Category Description AI Generation Handler
        $(document).on('click', '.btn-ai-cat-gen', function(e) {
            e.preventDefault();
            var $btn = $(this);
            var catName = $('#name').val() ? $('#name').val().trim() : '';

            if (!catName) {
                alert('Please enter a Category Name first before generating AI description.');
                $('#name').focus();
                return;
            }

            var origHtml = $btn.html();
            $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin mr-1"></i> Generating...');

            $.ajax({
                url: '<?= base_url('admin/ai/generate') ?>',
                type: 'POST',
                data: {
                    field_type: 'category_description',
                    category_name: catName
                },
                dataType: 'json',
                timeout: 60000,
                success: function(res) {
                    $btn.prop('disabled', false).html(origHtml);
                    if (res.success) {
                        $('#description').val(res.text);
                        $('#description').addClass('is-valid');
                        setTimeout(function() { $('#description').removeClass('is-valid'); }, 2500);
                    } else {
                        alert('AI Generation Notice:\n' + res.message);
                    }
                },
                error: function(xhr, status, err) {
                    $btn.prop('disabled', false).html(origHtml);
                    alert('Error connecting to AI Generation service: ' + (err || status));
                }
            });
        });
    });
    </script>
</body>
</html>
