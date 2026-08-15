<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Kagzi Ventures</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>">
    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }
        .login-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 420px;
            padding: 35px;
        }
        .logo-box {
            text-align: center;
            margin-bottom: 25px;
        }
        .logo-box img {
            max-height: 55px;
            border-radius: 6px;
        }
        .btn-admin {
            background: #0088cc;
            border-color: #0088cc;
            color: #ffffff;
            font-weight: 600;
            padding: 10px;
            border-radius: 6px;
        }
        .btn-admin:hover {
            background: #0077b3;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo-box">
            <img src="<?= base_url('assets/images/logo-kagzi.jpeg') ?>" alt="Kagzi Ventures Logo">
            <h4 class="mt-3 font-weight-bold text-dark">Admin Portal</h4>
            <p class="text-muted small">Enter your credentials to access the management dashboard.</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('info')): ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('info') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/loginProcess') ?>" method="post">
            <div class="form-group">
                <label class="font-weight-semibold text-dark"><i class="fa fa-envelope text-primary mr-1"></i> Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="admin@kagziventures.com" value="admin@kagziventures.com" required autofocus>
            </div>

            <div class="form-group">
                <label class="font-weight-semibold text-dark"><i class="fa fa-lock text-primary mr-1"></i> Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" value="admin123" required>
            </div>

            <button type="submit" class="btn btn-admin btn-block mt-4">
                <i class="fa fa-sign-in-alt mr-2"></i> Log In to Dashboard
            </button>

            <div class="text-center mt-3">
                <a href="<?= base_url('/') ?>" class="small text-muted"><i class="fa fa-arrow-left mr-1"></i> Return to Main Website</a>
            </div>
        </form>
    </div>
</body>
</html>
