<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Kagzi Ventures</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&family=Urbanist:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 300;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Urbanist', sans-serif !important;
            font-weight: 700;
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
            background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%);
            border-color: #1D5EB8;
            color: #ffffff;
            font-weight: 600;
            padding: 10px;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(29, 94, 184, 0.3);
            transition: all 0.25s ease;
        }
        .btn-admin:hover {
            background: #154890;
            border-color: #154890;
            color: #ffffff;
            box-shadow: 0 6px 18px rgba(29, 94, 184, 0.45);
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
                <input type="email" name="email" class="form-control" placeholder="admin@kagziventures.in" value="admin@kagziventures.in" required autofocus>
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
