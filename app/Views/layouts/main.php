<?php
if (!isset($allCategories) || empty($allCategories)) {
    try {
        $categoryModel = new \App\Models\CategoryModel();
        $allCategories = $categoryModel->getActiveCategories();
    } catch (\Throwable $e) {
        $allCategories = [];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= esc($title ?? 'Porto - Bootstrap eCommerce Template') ?></title>

    <meta name="keywords" content="Kagzi Ventures, Ecommerce, Shopping, Online Store" />
    <meta name="description" content="Kagzi Ventures - High quality products, best deals, fast shipping.">
    <meta name="author" content="Kagzi Ventures">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/icons/favicon.png') ?>">

    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '<?= base_url('assets/js/webfont.js') ?>';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?= base_url('assets/css/demo1.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/simple-line-icons/css/simple-line-icons.min.css') ?>">
</head>

<body>
    <div class="page-wrapper">
        <header class="header home">
            <div class="header-top bg-primary text-uppercase">
                <div class="container d-flex align-items-center justify-content-between">
                    <div class="header-left">
                        <p class="top-message mb-0 font-weight-semibold text-white">Welcome To Kagzi Ventures!</p>
                    </div>

                    <div class="header-right">
                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook icon-facebook text-white ml-0" target="_blank" title="Facebook"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter text-white ml-0" target="_blank" title="Twitter"></a>
                            <a href="#" class="social-icon social-instagram icon-instagram text-white ml-0" target="_blank" title="Instagram"></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Header Middle: Logo (Left), Search (Middle), Account + Cart + USD (Right) -->
            <div class="header-middle text-dark sticky-header">
                <div class="container d-flex align-items-center justify-content-between">
                    <!-- Left Side: Mobile Toggle & Logo -->
                    <div class="header-left d-flex align-items-center">
                        <button class="mobile-menu-toggler mr-3" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="<?= base_url('/') ?>" class="logo">
                            <img src="<?= base_url('assets/images/logo-kagzi.jpeg') ?>" style="height: 44px; width: auto; max-width: 160px; border-radius: 4px; object-fit: contain;" alt="Kagzi Ventures Logo">
                        </a>
                    </div>

                    <!-- Middle: Search Bar -->
                    <div class="header-center flex-1 px-3">
                        <div class="header-search header-icon header-search-inline header-search-category w-100 style-2" style="max-width: 600px; margin: 0 auto;">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                            <form action="<?= base_url('shop') ?>" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                                    <div class="select-custom">
                                        <select id="cat" name="category">
                                            <option value="">All Categories</option>
                                            <?php if (!empty($allCategories)): ?>
                                                <?php foreach ($allCategories as $cat): ?>
                                                    <option value="<?= esc($cat['slug']) ?>"><?= esc($cat['name']) ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <button class="btn icon-magnifier" type="submit"></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Right Side: Account Icon, Cart Icon, and USD Dropdown -->
                    <div class="header-right d-flex align-items-center">
                        <!-- Account User Icon -->
                        <a href="<?= base_url('account') ?>" class="header-icon header-icon-user mr-3" title="My Account">
                            <i class="icon-user-2" style="font-size: 2rem;"></i>
                        </a>

                        <!-- Cart Icon & Dropdown -->
                        <div class="dropdown cart-dropdown mr-3">
                            <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="minicart-icon"></i>
                                <span class="cart-count badge-circle">3</span>
                            </a>
                            <div class="cart-overlay"></div>
                            <div class="dropdown-menu mobile-cart">
                                <a href="#" title="Close (Esc)" class="btn-close">×</a>
                                <div class="dropdownmenu-wrapper custom-scrollbar">
                                    <div class="dropdown-cart-header">Shopping Cart</div>
                                    <div class="dropdown-cart-products">
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="<?= base_url('shop') ?>">Ultimate 3D Bluetooth Speaker</a>
                                                </h4>
                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span> × $99.00
                                                </span>
                                            </div>
                                            <figure class="product-image-container">
                                                <a href="<?= base_url('shop') ?>" class="product-image">
                                                    <img src="<?= base_url('assets/images/products/product-1.jpg') ?>" alt="product" width="80" height="80">
                                                </a>
                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="dropdown-cart-total">
                                        <span>SUBTOTAL:</span>
                                        <span class="cart-total-price float-right">$99.00</span>
                                    </div>
                                    <div class="dropdown-cart-action">
                                        <a href="<?= base_url('cart') ?>" class="btn btn-gray btn-block view-cart">View Cart</a>
                                        <a href="<?= base_url('checkout') ?>" class="btn btn-dark btn-block">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- USD Dropdown -->
                        <div class="header-dropdown dropdown-currency">
                            <a href="#" class="dropdown-toggle d-flex align-items-center font-weight-semibold text-uppercase text-dark" style="font-size: 13px; text-decoration: none;">
                                USD <i class="fas fa-chevron-down ml-1" style="font-size: 10px;"></i>
                            </a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">GBP</a></li>
                                    <li><a href="#">INR</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Navigation Menu Below Header -->
            <style>
                .custom-main-navbar .sf-with-ul::after,
                .custom-main-navbar .menu a::after,
                .custom-main-navbar .menu li::after,
                .custom-main-navbar .menu .sf-with-ul::after {
                    display: none !important;
                    content: none !important;
                }
            </style>
            <div class="header-bottom sticky-header d-none d-lg-block custom-main-navbar" style="background: #1e293b; border-bottom: 3px solid #0088cc; box-shadow: 0 4px 12px rgba(0,0,0,0.15);" data-sticky-options="{'mobile': false}">
                <div class="container">
                    <nav class="main-nav w-100">
                        <ul class="menu d-flex align-items-center" style="gap: 5px;">
                            <li class="<?= (url_is('/') || current_url() == base_url()) ? 'active' : '' ?>">
                                <a href="<?= base_url('/') ?>" class="text-white py-3 px-4 font-weight-semibold d-flex align-items-center" style="font-size: 14px; text-transform: uppercase;">
                                    <i class="fa fa-home mr-2" style="font-size: 16px; color: #38bdf8;"></i> Home
                                </a>
                            </li>
                            <li class="<?= url_is('about*') ? 'active' : '' ?>">
                                <a href="<?= base_url('about') ?>" class="text-white py-3 px-4 font-weight-semibold d-flex align-items-center" style="font-size: 14px; text-transform: uppercase;">
                                    <i class="fa fa-info-circle mr-2" style="font-size: 16px; color: #38bdf8;"></i> About Us
                                </a>
                            </li>
                            <li class="<?= (url_is('shop*') && request()->getGet('sort') == 'bestseller') ? 'active' : '' ?>">
                                <a href="<?= base_url('shop?sort=bestseller') ?>" class="text-white py-3 px-4 font-weight-semibold d-flex align-items-center" style="font-size: 14px; text-transform: uppercase;">
                                    <i class="fa fa-fire text-warning mr-2" style="font-size: 16px;"></i> Best Sellers
                                    <span class="badge badge-danger ml-2 px-2 py-1" style="font-size: 9px; border-radius: 10px; font-weight: 700;">HOT</span>
                                </a>
                            </li>
                            <li class="<?= (url_is('shop*') && !request()->getGet('sort')) ? 'active' : '' ?>">
                                <a href="<?= base_url('shop') ?>" class="text-white py-3 px-4 font-weight-semibold d-flex align-items-center" style="font-size: 14px; text-transform: uppercase;">
                                    <i class="fa fa-th-large mr-2" style="font-size: 16px; color: #38bdf8;"></i> Categories
                                    <i class="fas fa-chevron-down ml-2" style="font-size: 10px; opacity: 0.8;"></i>
                                </a>
                                <ul style="min-width: 220px; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); border: none; padding: 8px 0;">
                                    <?php if (!empty($allCategories)): ?>
                                        <?php foreach ($allCategories as $cat): ?>
                                            <li>
                                                <a href="<?= base_url('shop?category=' . esc($cat['slug'])) ?>" class="d-flex align-items-center font-weight-medium py-2 px-4" style="color: #334155; font-size: 13px;">
                                                    <i class="fa fa-tag text-primary mr-2" style="font-size: 12px;"></i>
                                                    <?= esc($cat['name']) ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <li class="<?= url_is('contact*') ? 'active' : '' ?>">
                                <a href="<?= base_url('contact') ?>" class="text-white py-3 px-4 font-weight-semibold d-flex align-items-center" style="font-size: 14px; text-transform: uppercase;">
                                    <i class="fa fa-envelope mr-2" style="font-size: 16px; color: #38bdf8;"></i> Contact Us
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <!-- Main Content Section -->
        <?= $this->renderSection('content') ?>

        <footer class="footer bg-dark position-relative">
            <div class="footer-middle">
                <div class="container position-static">
                    <div class="footer-ribbon">Get in touch</div>

                    <div class="row">
                        <div class="col-lg-3 col-sm-6 pb-2 pb-sm-0">
                            <div class="widget">
                                <h4 class="widget-title">About Us</h4>
                                <a href="<?= base_url('/') ?>">
                                    <img src="<?= base_url('assets/images/logo-kagzi.jpeg') ?>" alt="Kagzi Ventures Logo" style="height: 44px; width: auto; border-radius: 4px;" class="logo-footer mb-3">
                                </a>
                                <p class="m-b-4">At Kagzi Ventures, we believe everyday products should be practical, reliable, thoughtfully designed, and easy to use. Storage solutions, pouches, hampers, and utility products for your everyday needs.</p>
                                <a href="<?= base_url('about') ?>" class="read-more text-white">read more...</a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 pb-4 pb-sm-0">
                            <div class="widget mb-2">
                                <h4 class="widget-title mb-1 pb-1">Contact Info</h4>
                                <ul class="contact-info m-b-4">
                                    <li>
                                        <span class="contact-info-label">Address:</span>822 Flat No.7 Khatiwala Tank Indore 452014
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Phone:</span><a href="tel:9753875213">9753875213</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Email:</span> <a href="mailto:info@kagziventures.com">info@kagziventures.com</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Working Days/Hours:</span> Mon - Sun / 9:00 AM - 8:00 PM
                                    </li>
                                </ul>
                                <div class="social-icons">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 pb-2 pb-sm-0">
                            <div class="widget">
                                <h4 class="widget-title pb-1">Customer Service</h4>
                                <ul class="links">
                                    <li><a href="#">Help & FAQs</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Shipping & Delivery</a></li>
                                    <li><a href="#">Orders History</a></li>
                                    <li><a href="#">Advanced Search</a></li>
                                    <li><a href="<?= base_url('account') ?>">My Account</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="<?= base_url('about') ?>">About Us</a></li>
                                    <li><a href="#">Corporate Sales</a></li>
                                    <li><a href="#">Privacy</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 pb-0">
                            <div class="widget mb-1 mb-sm-3">
                                <h4 class="widget-title">Product Tags</h4>
                                <div class="tagcloud">
                                    <a href="<?= base_url('shop?q=bags') ?>">Bags</a>
                                    <a href="<?= base_url('shop?q=storage') ?>">Storage</a>
                                    <a href="<?= base_url('shop?q=pouches') ?>">Pouches</a>
                                    <a href="<?= base_url('shop?q=organizers') ?>">Organizers</a>
                                    <a href="<?= base_url('shop?category=accessories') ?>">Accessories</a>
                                    <a href="<?= base_url('shop?q=travelling') ?>">Travelling</a>
                                    <a href="<?= base_url('shop?q=lifestyle') ?>">LifeStyle</a>
                                    <a href="<?= base_url('shop?q=storage') ?>">Storage Solution</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="footer-bottom d-sm-flex align-items-center">
                    <div class="footer-left">
                        <span class="footer-copyright">© Kagzi Ventures. 2026. All Rights Reserved</span>
                    </div>

                    <div class="footer-right ml-auto mt-1 mt-sm-0">
                        <div class="payment-icons">
                            <span class="payment-icon visa" style="background-image: url(<?= base_url('assets/images/payments/payment-visa.svg') ?>)"></span>
                            <span class="payment-icon paypal" style="background-image: url(<?= base_url('assets/images/payments/payment-paypal.svg') ?>)"></span>
                            <span class="payment-icon stripe" style="background-image: url(<?= base_url('assets/images/payments/payment-stripe.png') ?>)"></span>
                            <span class="payment-icon verisign" style="background-image: url(<?= base_url('assets/images/payments/payment-verisign.svg') ?>)"></span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu menu-with-icon">
                    <li><a href="<?= base_url('/') ?>"><i class="icon-home"></i>Home</a></li>
                    <li><a href="<?= base_url('about') ?>"><i class="sicon-users"></i>About Us</a></li>
                    <li><a href="<?= base_url('shop?sort=bestseller') ?>"><i class="sicon-fire"></i>Best Sellers</a></li>
                    <li>
                        <a href="<?= base_url('shop') ?>" class="sf-with-ul"><i class="sicon-badge"></i>Categories</a>
                        <ul>
                            <?php if (!empty($allCategories)): ?>
                                <?php foreach ($allCategories as $cat): ?>
                                    <li><a href="<?= base_url('shop?category=' . esc($cat['slug'])) ?>"><?= esc($cat['name']) ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('contact') ?>"><i class="sicon-envelope"></i>Contact Us</a></li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="<?= base_url('account') ?>">My Account</a></li>
                    <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
                    <li><a href="<?= base_url('wishlist') ?>">My Wishlist</a></li>
                    <li><a href="<?= base_url('cart') ?>">Cart</a></li>
                    <li><a href="<?= base_url('login') ?>" class="login-link">Log In</a></li>
                </ul>
            </nav>

            <form class="search-wrapper mb-2" action="<?= base_url('shop') ?>">
                <input type="text" class="form-control mb-0" name="q" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>

            <div class="social-icons">
                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
            </div>
        </div>
    </div>

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="<?= base_url('/') ?>">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="<?= base_url('shop') ?>">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
        <div class="sticky-info">
            <a href="<?= base_url('wishlist') ?>">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="<?= base_url('login') ?>">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
    </div>

    <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url(<?= base_url('assets/images/newsletter_popup_bg.jpg') ?>)">
        <div class="newsletter-popup-content">
            <img src="<?= base_url('assets/images/logo.png') ?>" width="111" height="44" alt="Logo" class="logo-newsletter">
            <h2>Subscribe to newsletter</h2>

            <p>
                Subscribe to the Porto mailing list to receive updates on new arrivals, special offers and our promotions.
            </p>

            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
            <div class="newsletter-subscribe">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                    <label for="show-again" class="custom-control-label">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div>

        <button title="Close (Esc)" type="button" class="mfp-close">
            ×
        </button>
    </div>

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.appear.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.plugin.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.countdown.min.js') ?>"></script>

    <!-- Main JS File -->
    <script src="<?= base_url('assets/js/main.min.js') ?>"></script>
</body>
</html>
