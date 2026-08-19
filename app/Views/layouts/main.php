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

    <meta name="keywords" content="<?= esc($metaKeywords ?? 'Kagzi Ventures, Ecommerce, Shopping, Online Store') ?>" />
    <meta name="description" content="<?= esc($metaDescription ?? 'Kagzi Ventures - High quality products, best deals, fast shipping.') ?>">
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

    <!-- Google Fonts: Urbanist (Headings) & Albert Sans Light (Body Text) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&family=Urbanist:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?= base_url('assets/css/demo1.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/simple-line-icons/css/simple-line-icons.min.css') ?>">
    <!-- Kagzi Ventures Material UI 3 Custom Stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/css/material-custom.css') ?>">

    <style>
        /* Base Typography Rules: Urbanist for Headings & Titles; Albert Sans Light for Body & Text (14px base font) */
        html {
            font-size: 14px !important;
        }
        body {
            font-size: 14px !important;
            line-height: 1.6;
            color: #334155;
        }
        html, body, p, span, a, li, button, input, select, textarea, label, table, td, th, .btn, .form-control, .top-message, .product-price, .header, .footer, .nav-link {
            font-family: 'Albert Sans', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-weight: 300;
        }
        p, li, td, th, label, .form-control {
            font-size: 14px;
        }

        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6,
        .product-title, .product-title a,
        .subtitle, .title, .widget-title,
        .luxury-footer-heading,
        .featured-products-heading,
        .luxury-feature-title,
        .usp-feature-title,
        .category-card-name,
        .menu > li > a,
        .page-title {
            font-family: 'Urbanist', 'Albert Sans', sans-serif !important;
            font-weight: 700;
        }

        /* Preserve FontAwesome & Icon Fonts (Fix Broken Icons) */
        i, i::before, i::after,
        .fa, .fa::before, .fa::after,
        .fas, .fas::before, .fas::after,
        .far, .far::before, .far::after,
        .fal, .fal::before, .fal::after,
        .fab, .fab::before, .fab::after,
        [class^="icon-"], [class^="icon-"]::before,
        [class*=" icon-"], [class*=" icon-"]::before,
        [class^="fa-"], [class^="fa-"]::before,
        [class*=" fa-"], [class*=" fa-"]::before {
            font-family: "Font Awesome 5 Free", "FontAwesome", "simple-line-icons", "porto" !important;
        }
        .fab, .fab::before, .fab::after,
        .fa-whatsapp, .fa-whatsapp::before,
        .fa-facebook, .fa-facebook::before,
        .fa-twitter, .fa-twitter::before,
        .fa-instagram, .fa-instagram::before {
            font-family: "Font Awesome 5 Brands" !important;
        }

        .newsletter-popup, #newsletter-popup-form, .mfp-bg, .mfp-wrap {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }

        /* Kagzi Ventures Corporate Theme - Logo Brand Royal Blue #1D5EB8 & Champagne Gold #C5A059 Overrides */
        :root {
            --kv-primary: #1D5EB8;
            --kv-primary-dark: #154890;
            --kv-primary-deep: #0F346C;
            --kv-primary-light: #EFF6FF;
            --kv-secondary-gold: #C5A059;
            --kv-secondary-gold-dark: #A6823B;
            --kv-gold-accent: #D4AF37;
        }

        /* Material UI 3 Elevation & Card Surface Utilities */
        .mui-card-surface {
            background: #ffffff;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(29, 94, 184, 0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .mui-card-surface:hover {
            box-shadow: 0 10px 30px rgba(29, 94, 184, 0.12);
            transform: translateY(-3px);
        }
        .mui-chip {
            display: inline-flex;
            align-items: center;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: all 0.2s ease;
        }

        .header-top {
            background-color: #0f172a !important;
        }
        .header-middle {
            background: linear-gradient(180deg, #F0F4FA 0%, #E6EEF8 100%) !important;
            border-bottom: 1px solid #BFDBFE !important;
            padding: 12px 0 !important;
        }
        .btn-whatsapp-stylish {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%) !important;
            border: none !important;
            padding: 9px 20px !important;
            border-radius: 50px !important;
            box-shadow: 0 4px 14px rgba(37, 211, 102, 0.3) !important;
            transition: all 0.3s ease !important;
            font-size: 12.5px !important;
            letter-spacing: 0.4px !important;
            color: #ffffff !important;
        }
        .btn-whatsapp-stylish:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.45) !important;
            color: #ffffff !important;
        }
        .btn-mail-stylish {
            background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%) !important;
            border: none !important;
            padding: 9px 20px !important;
            border-radius: 50px !important;
            box-shadow: 0 4px 14px rgba(29, 94, 184, 0.3) !important;
            transition: all 0.3s ease !important;
            font-size: 12.5px !important;
            letter-spacing: 0.4px !important;
            color: #ffffff !important;
        }
        .btn-mail-stylish:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(29, 94, 184, 0.45) !important;
            color: #ffffff !important;
        }
        /* Header Middle Padding & Spacing */
        .header-middle {
            padding-top: 12px !important;
            padding-bottom: 8px !important;
            border-bottom: none !important;
        }

        /* Main Menu Bar (#1D5EB8 Royal Blue with Gold Accent Border) Flush Fit against Search Section */
        .header-bottom.custom-main-navbar {
            background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%) !important;
            border-bottom: 3px solid #C5A059 !important;
            box-shadow: 0 4px 15px rgba(29, 94, 184, 0.35) !important;
            min-height: 62px !important;
            padding: 3px 0 !important;
            margin-top: 0 !important;
            border-top: none !important;
        }

        /* Sticky Header Scroll Spacing Fix */
        .sticky-header.fixed {
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12) !important;
        }
        .custom-main-navbar .menu > li > a {
            padding: 16px 24px !important;
            font-size: 15px !important;
            letter-spacing: 0.5px;
            transition: all 0.25s ease;
            border-radius: 6px;
        }
        .custom-main-navbar .menu > li:hover > a,
        .custom-main-navbar .menu > li.active > a {
            background-color: rgba(255, 255, 255, 0.22) !important;
            color: #ffffff !important;
            text-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }
        .text-primary, .product-price.text-primary, .new-price.text-primary {
            color: #1D5EB8 !important;
        }
        .btn-primary, .btn-outline-primary:hover {
            background-color: #1D5EB8 !important;
            border-color: #1D5EB8 !important;
            color: #ffffff !important;
        }
        .btn-outline-primary {
            color: #1D5EB8 !important;
            border-color: #1D5EB8 !important;
        }
        .badge-primary, .bg-primary {
            background-color: #1D5EB8 !important;
        }

        /* Quick View Button Theme Override (#1D5EB8) */
        .btn-quickview,
        a.btn-quickview {
            background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%) !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            font-size: 11.5px !important;
            letter-spacing: 0.5px !important;
            border-radius: 6px !important;
            padding: 8px 16px !important;
            box-shadow: 0 4px 12px rgba(29, 94, 184, 0.3) !important;
            transition: all 0.25s ease !important;
            border: none !important;
            opacity: 0.95 !important;
        }
        .btn-quickview:hover,
        a.btn-quickview:hover {
            background: #154890 !important;
            color: #ffffff !important;
            box-shadow: 0 6px 18px rgba(29, 94, 184, 0.45) !important;
            opacity: 1 !important;
        }

        /* Hide Blue Arrow Button on Product Images */
        .btn-icon-group,
        .btn-icon-group .btn-icon,
        .btn-icon-group .btn-add-cart {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }

        /* Search Bar & Category Box Border & Pill Styling */
        .header-search-wrapper {
            border: 2px solid #93C5FD !important;
            border-radius: 50px !important;
            background-color: #ffffff !important;
            box-shadow: 0 4px 14px rgba(29, 94, 184, 0.12) !important;
            overflow: hidden !important;
            display: flex !important;
            align-items: center !important;
            padding: 4px 5px 4px 18px !important;
            height: 48px !important;
        }
        .header-search-wrapper:focus-within {
            border-color: #1D5EB8 !important;
            box-shadow: 0 4px 18px rgba(29, 94, 184, 0.25) !important;
        }
        .header-search-wrapper input.form-control {
            border: none !important;
            box-shadow: none !important;
            height: 100% !important;
            padding: 0 10px 0 0 !important;
            background: transparent !important;
            font-size: 14px !important;
        }
        .header-search-category .select-custom {
            border-left: 1.5px solid #BFDBFE !important;
            background-color: #EFF6FF !important;
            height: 100% !important;
            display: flex !important;
            align-items: center !important;
            padding: 0 12px !important;
            border-radius: 6px !important;
            margin: 0 4px !important;
        }
        .header-search-category select {
            border: none !important;
            color: #1e293b !important;
            font-weight: 600 !important;
            font-size: 13.5px !important;
            background: transparent !important;
            cursor: pointer !important;
        }
        .header-search-category .btn.icon-magnifier {
            background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%) !important;
            color: #ffffff !important;
            border: none !important;
            border-radius: 40px !important;
            padding: 0 24px !important;
            height: 38px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 15px !important;
            cursor: pointer !important;
            transition: all 0.25s ease !important;
        }
        .header-search-category .btn.icon-magnifier:hover {
            transform: scale(1.04);
            box-shadow: 0 4px 12px rgba(29, 94, 184, 0.35) !important;
            color: #ffffff !important;
        }

        /* Custom Luxury Dark Navy Footer */
        footer.luxury-footer,
        .luxury-footer {
            background: #09111E !important;
            background-color: #09111E !important;
            color: #94a3b8 !important;
            font-family: 'Albert Sans', sans-serif !important;
            font-weight: 300 !important;
            position: relative !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            font-size: 13.5px !important;
            border-top: none !important;
            margin-top: 0 !important;
        }

        .luxury-footer .footer-ribbon,
        .luxury-footer .footer-middle,
        .luxury-footer .footer-bottom {
            background: transparent !important;
            padding: 0 !important;
            margin: 0 !important;
            border: none !important;
        }

        .luxury-footer-ribbon {
            position: absolute !important;
            top: 0 !important;
            left: 5% !important;
            background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%) !important;
            border-bottom: 2px solid #C5A059 !important;
            color: #ffffff !important;
            font-weight: 800 !important;
            font-size: 13px !important;
            padding: 9px 28px 9px 20px !important;
            border-bottom-right-radius: 12px !important;
            clip-path: polygon(0 0, 100% 0, 88% 100%, 0% 100%) !important;
            box-shadow: 0 4px 15px rgba(29, 94, 184, 0.45) !important;
            z-index: 10 !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 8px !important;
        }

        .luxury-footer-main {
            padding-top: 4.5rem !important;
            padding-bottom: 3.5rem !important;
        }

        .luxury-footer-col {
            position: relative !important;
        }
        @media (min-width: 992px) {
            .luxury-footer-col:not(:last-child)::after {
                content: '';
                position: absolute;
                right: 0;
                top: 5%;
                height: 90%;
                width: 1px;
                background: rgba(255, 255, 255, 0.08);
            }
        }

        .luxury-footer-heading {
            color: #ffffff !important;
            font-size: 15px !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.8px !important;
            margin-bottom: 22px !important;
            position: relative !important;
            padding-bottom: 8px !important;
        }
        .luxury-footer-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 34px;
            height: 2.5px;
            background: #C5A059;
            border-radius: 4px;
        }

        /* About Us Column */
        .luxury-logo-card {
            background: #ffffff !important;
            border-radius: 10px !important;
            padding: 10px 18px !important;
            display: inline-block !important;
            margin-bottom: 18px !important;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.25) !important;
        }
        .luxury-logo-card img {
            height: 40px !important;
            width: auto !important;
            object-fit: contain !important;
        }
        .luxury-footer-text {
            color: #94a3b8 !important;
            line-height: 1.65 !important;
            font-size: 13px !important;
            margin-bottom: 14px !important;
        }
        .btn-footer-readmore {
            display: inline-flex !important;
            align-items: center !important;
            gap: 8px !important;
            border: 1.5px solid rgba(255, 255, 255, 0.35) !important;
            color: #ffffff !important;
            border-radius: 30px !important;
            padding: 7px 22px !important;
            font-size: 12.5px !important;
            font-weight: 700 !important;
            transition: all 0.25s ease !important;
            background: transparent !important;
            text-decoration: none !important;
        }
        .btn-footer-readmore:hover {
            background: #1D5EB8 !important;
            border-color: #1D5EB8 !important;
            color: #ffffff !important;
            transform: translateX(4px) !important;
        }

        /* Contact Info Column */
        .luxury-contact-item {
            display: flex !important;
            align-items: flex-start !important;
            gap: 14px !important;
            margin-bottom: 18px !important;
        }
        .luxury-contact-icon {
            width: 38px !important;
            height: 38px !important;
            min-width: 38px !important;
            border-radius: 50% !important;
            background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%) !important;
            color: #ffffff !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 15px !important;
            box-shadow: 0 4px 10px rgba(29, 94, 184, 0.35) !important;
        }
        .luxury-contact-label {
            font-size: 11px !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            color: #cbd5e1 !important;
            letter-spacing: 0.5px !important;
            display: block !important;
            margin-bottom: 2px !important;
        }
        .luxury-contact-val {
            color: #f1f5f9 !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            line-height: 1.35 !important;
        }
        .luxury-contact-val a {
            color: #f1f5f9 !important;
            transition: color 0.2s ease !important;
        }
        .luxury-contact-val a:hover {
            color: #60A5FA !important;
        }

        .luxury-social-row {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            margin-top: 22px !important;
            padding-top: 18px !important;
            border-top: 1px solid rgba(255, 255, 255, 0.08) !important;
        }
        .luxury-social-outline-btn {
            width: 38px !important;
            height: 38px !important;
            border-radius: 50% !important;
            border: 2px solid #1D5EB8 !important;
            background: transparent !important;
            color: #ffffff !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 15px !important;
            transition: all 0.25s ease !important;
            text-decoration: none !important;
        }
        .luxury-social-outline-btn:hover {
            background: #1D5EB8 !important;
            color: #ffffff !important;
            transform: translateY(-3px) !important;
            box-shadow: 0 4px 14px rgba(29, 94, 184, 0.45) !important;
        }

        /* Important Links List */
        .luxury-link-list {
            list-style: none !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        .luxury-link-item {
            margin-bottom: 10px !important;
            padding-bottom: 8px !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
        }
        .luxury-link-item a {
            color: #cbd5e1 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            font-size: 13.5px !important;
            font-weight: 500 !important;
            transition: all 0.2s ease !important;
            text-decoration: none !important;
        }
        .luxury-link-item a:hover {
            color: #60A5FA !important;
            padding-left: 4px !important;
        }
        .luxury-link-item i.link-icon {
            font-size: 15px !important;
            width: 24px !important;
        }

        /* Product Links 2-Column Grid */
        .luxury-pill-grid {
            display: grid !important;
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 10px !important;
        }
        .luxury-pill-btn {
            background: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            border-radius: 8px !important;
            padding: 9px 12px !important;
            color: #cbd5e1 !important;
            font-size: 12.5px !important;
            font-weight: 600 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            transition: all 0.25s ease !important;
            text-decoration: none !important;
        }
        .luxury-pill-btn:hover {
            background: rgba(29, 94, 184, 0.18) !important;
            border-color: #1D5EB8 !important;
            color: #60A5FA !important;
        }
        .luxury-pill-btn-full {
            grid-column: span 2 !important;
        }

        /* Features Bar (Bottom 4 Columns) */
        .luxury-features-strip {
            background: rgba(255, 255, 255, 0.02) !important;
            border-top: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
            padding: 24px 0 !important;
        }
        .luxury-feature-item {
            display: flex !important;
            align-items: center !important;
            gap: 14px !important;
        }
        .luxury-feature-icon {
            width: 44px !important;
            height: 44px !important;
            min-width: 44px !important;
            border-radius: 50% !important;
            background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%) !important;
            color: #ffffff !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 18px !important;
            box-shadow: 0 4px 12px rgba(29, 94, 184, 0.35) !important;
        }
        .luxury-feature-title {
            color: #ffffff !important;
            font-size: 14px !important;
            font-weight: 700 !important;
            margin-bottom: 2px !important;
        }
        .luxury-feature-desc {
            color: #94a3b8 !important;
            font-size: 12px !important;
            margin-bottom: 0 !important;
            line-height: 1.35 !important;
        }

        /* Bottom Bar Copyright */
        .luxury-bottom-bar {
            background: #040a14 !important;
            padding: 18px 0 !important;
            color: #64748b !important;
            font-size: 13px !important;
        }
        .luxury-bottom-bar a {
            color: #94a3b8 !important;
            transition: color 0.2s ease !important;
            text-decoration: none !important;
        }
        .luxury-bottom-bar a:hover {
            color: #60A5FA !important;
        }
        .scroll-top-btn {
            width: 36px !important;
            height: 36px !important;
            background: rgba(255, 255, 255, 0.06) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
            border-radius: 8px !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.25s ease !important;
            text-decoration: none !important;
        }
        .scroll-top-btn:hover {
            background: #1D5EB8 !important;
            border-color: #1D5EB8 !important;
            color: #ffffff !important;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <header class="header home">
            <!-- Top Bar: Sleek Black -->
            <div class="header-top text-uppercase" style="background: #0f172a !important;">
                <div class="container d-flex align-items-center justify-content-between">
                    <div class="header-left">
                        <p class="top-message mb-0 font-weight-semibold text-white">
                            <i class="fab fa-whatsapp mr-1" style="font-size: 1.1rem; color: #25D366;"></i> WhatsApp: <a href="https://wa.me/919753875213" class="text-white" target="_blank">+91 9753875213</a> 
                            <span class="mx-2">|</span> 
                            <i class="fa fa-envelope mr-1"></i> Email: <a href="mailto:info@kagziventures.in" class="text-white">info@kagziventures.in</a>
                        </p>
                    </div>

                    <div class="header-right">
                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook icon-facebook text-white ml-0" target="_blank" title="Facebook"></a>
                            <a href="https://www.instagram.com/kagziventures/" class="social-icon social-instagram icon-instagram text-white ml-0" target="_blank" title="Instagram"></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Header Middle: Soft Light Shade Background & Logo (Left), Search (Middle), WhatsApp & Mail Enquiries (Right) -->
            <div class="header-middle text-dark sticky-header" style="background: linear-gradient(180deg, #F0F4FA 0%, #E6EEF8 100%) !important; border-bottom: none !important;">
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

                    <!-- Right Side: Stylish Pill WhatsApp & Mail Enquiry Buttons -->
                    <div class="header-right d-flex align-items-center">
                        <a href="https://wa.me/919753875213?text=Hi%20Kagzi%20Ventures,%20I%20have%20an%20enquiry" target="_blank" class="btn btn-sm font-weight-bold mr-2 d-none d-sm-inline-flex align-items-center btn-whatsapp-stylish">
                            <i class="fab fa-whatsapp mr-2" style="font-size: 1.15rem;"></i> WhatsApp Enquiry
                        </a>
                        <a href="mailto:info@kagziventures.in?subject=Product%20Enquiry" class="btn btn-sm font-weight-bold d-none d-sm-inline-flex align-items-center btn-mail-stylish">
                            <i class="fa fa-envelope mr-2" style="font-size: 1rem;"></i> Mail Enquiry
                        </a>
                    </div>
                </div>
            </div>

            <!-- Enhanced Navigation Menu Below Header: Kagzi Brand Royal Blue #1D5EB8 Theme -->
            <style>
                .custom-main-navbar .sf-with-ul::after,
                .custom-main-navbar .menu a::after,
                .custom-main-navbar .menu li::after,
                .custom-main-navbar .menu .sf-with-ul::after {
                    display: none !important;
                    content: none !important;
                }
            </style>
            <div class="header-bottom sticky-header d-none d-lg-block custom-main-navbar" style="background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%) !important; border-bottom: 3px solid #C5A059 !important; box-shadow: 0 4px 15px rgba(29, 94, 184, 0.35);" data-sticky-options="{'mobile': false}">
                <div class="container">
                    <nav class="main-nav w-100">
                        <ul class="menu d-flex align-items-center" style="gap: 5px;">
                            <li class="<?= (url_is('/') || current_url() == base_url()) ? 'active' : '' ?>">
                                <a href="<?= base_url('/') ?>" class="text-white py-3 px-4 font-weight-semibold d-flex align-items-center" style="font-size: 15px; text-transform: uppercase;">
                                    <i class="fa fa-home mr-2" style="font-size: 17px; color: #fef08a;"></i> Home
                                </a>
                            </li>
                            <li class="<?= url_is('about*') ? 'active' : '' ?>">
                                <a href="<?= base_url('about') ?>" class="text-white py-3 px-4 font-weight-semibold d-flex align-items-center" style="font-size: 15px; text-transform: uppercase;">
                                    <i class="fa fa-info-circle mr-2" style="font-size: 17px; color: #fef08a;"></i> About Us
                                </a>
                            </li>
                            <li class="<?= (url_is('shop*') && request()->getGet('sort') == 'bestseller') ? 'active' : '' ?>">
                                <a href="<?= base_url('shop?sort=bestseller') ?>" class="text-white py-3 px-4 font-weight-semibold d-flex align-items-center" style="font-size: 15px; text-transform: uppercase;">
                                    <i class="fa fa-fire text-warning mr-2" style="font-size: 17px;"></i> Best Sellers
                                    <span class="badge badge-danger ml-2 px-2 py-1" style="font-size: 9px; border-radius: 10px; font-weight: 700;">HOT</span>
                                </a>
                            </li>
                            <li class="<?= (url_is('shop*') && !request()->getGet('sort')) ? 'active' : '' ?>">
                                <a href="<?= base_url('shop') ?>" class="text-white py-3 px-4 font-weight-semibold d-flex align-items-center" style="font-size: 15px; text-transform: uppercase;">
                                    <i class="fa fa-th-large mr-2" style="font-size: 17px; color: #fef08a;"></i> Categories
                                    <i class="fas fa-chevron-down ml-2" style="font-size: 10px; opacity: 0.8;"></i>
                                </a>
                                <ul style="min-width: 220px; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); border: none; padding: 8px 0;">
                                    <?php if (!empty($allCategories)): ?>
                                        <?php foreach ($allCategories as $cat): ?>
                                            <li>
                                                <a href="<?= base_url('shop?category=' . esc($cat['slug'])) ?>" class="d-flex align-items-center font-weight-medium py-2 px-4" style="color: #334155; font-size: 13px;">
                                                    <i class="fa fa-tag text-primary mr-2" style="font-size: 12px; color: #1D5EB8 !important;"></i>
                                                    <?= esc($cat['name']) ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <li class="<?= url_is('shitabi-gifts*') ? 'active' : '' ?>">
                                <a href="<?= base_url('shitabi-gifts') ?>" class="text-white py-3 px-4 font-weight-semibold d-flex align-items-center" style="font-size: 15px; text-transform: uppercase;">
                                    <i class="fa fa-gift mr-2" style="font-size: 17px; color: #fef08a;"></i> Shitabi Gifts
                                </a>
                            </li>
                            <li class="<?= url_is('contact*') ? 'active' : '' ?>">
                                <a href="<?= base_url('contact') ?>" class="text-white py-3 px-4 font-weight-semibold d-flex align-items-center" style="font-size: 15px; text-transform: uppercase;">
                                    <i class="fa fa-envelope mr-2" style="font-size: 17px; color: #fef08a;"></i> Contact Us
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <!-- Main Content Section -->
        <?= $this->renderSection('content') ?>

        <!-- CUSTOM LUXURY DARK NAVY FOOTER (EXACT MATCH TO USER SCREENSHOT) -->
        <footer class="luxury-footer">
            <div class="luxury-footer-ribbon">
                <i class="fa fa-paper-plane"></i> Let's Connect
            </div>

            <div class="container position-relative">
                <div class="luxury-footer-main">
                    <div class="row">
                        <!-- Column 1: ABOUT US -->
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 luxury-footer-col">
                            <h4 class="luxury-footer-heading">ABOUT US</h4>
                            <div class="luxury-logo-card">
                                <a href="<?= base_url('/') ?>">
                                    <img src="<?= base_url('assets/images/logo-kagzi.jpeg') ?>" alt="Kagzi Ventures Logo">
                                </a>
                            </div>
                            <p class="luxury-footer-text">
                                At Kagzi Ventures, we build practical, high-quality storage solutions, organizers, pouches, and utility products that help keep your home and lifestyle clutter-free.
                            </p>
                            <p class="luxury-footer-text mb-3">
                                Our mission is to deliver innovative, reliable, and thoughtful products that make everyday storage effortless.
                            </p>
                            <a href="<?= base_url('about') ?>" class="btn-footer-readmore">
                                Read More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>

                        <!-- Column 2: CONTACT INFO -->
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 luxury-footer-col">
                            <h4 class="luxury-footer-heading">CONTACT INFO</h4>
                            
                            <div class="luxury-contact-item">
                                <div class="luxury-contact-icon">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <span class="luxury-contact-label">ADDRESS</span>
                                    <span class="luxury-contact-val">822 Flat No.7 Khatiwala Tank, Indore, MP 452014, India</span>
                                </div>
                            </div>

                            <div class="luxury-contact-item">
                                <div class="luxury-contact-icon">
                                    <i class="fa fa-phone font-weight-bold"></i>
                                </div>
                                <div>
                                    <span class="luxury-contact-label">PHONE</span>
                                    <span class="luxury-contact-val"><a href="tel:+919753875213">+91 9753875213</a></span>
                                </div>
                            </div>

                            <div class="luxury-contact-item mb-0">
                                <div class="luxury-contact-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div>
                                    <span class="luxury-contact-label">EMAIL</span>
                                    <span class="luxury-contact-val"><a href="mailto:info@kagziventures.in">info@kagziventures.in</a></span>
                                </div>
                            </div>

                            <div class="luxury-social-row">
                                <a href="#" class="luxury-social-outline-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/kagziventures/" class="luxury-social-outline-btn" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                                <a href="https://wa.me/919753875213" target="_blank" class="luxury-social-outline-btn" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>

                        <!-- Column 3: IMPORTANT LINKS -->
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 luxury-footer-col">
                            <h4 class="luxury-footer-heading">IMPORTANT LINKS</h4>
                            <ul class="luxury-link-list">
                                <li class="luxury-link-item">
                                    <a href="<?= base_url('/') ?>">
                                        <span><i class="fa fa-home text-success link-icon"></i> Home</span>
                                        <i class="fa fa-chevron-right text-muted small"></i>
                                    </a>
                                </li>
                                <li class="luxury-link-item">
                                    <a href="<?= base_url('shop') ?>">
                                        <span><i class="fa fa-th-large text-danger link-icon"></i> Shop Categories</span>
                                        <i class="fa fa-chevron-right text-muted small"></i>
                                    </a>
                                </li>
                                <li class="luxury-link-item">
                                    <a href="<?= base_url('shop?sort=featured') ?>">
                                        <span><i class="fa fa-briefcase text-warning link-icon"></i> Featured Products</span>
                                        <i class="fa fa-chevron-right text-muted small"></i>
                                    </a>
                                </li>
                                <li class="luxury-link-item">
                                    <a href="<?= base_url('about') ?>">
                                        <span><i class="fa fa-info-circle text-info link-icon"></i> About Us</span>
                                        <i class="fa fa-chevron-right text-muted small"></i>
                                    </a>
                                </li>
                                <li class="luxury-link-item">
                                    <a href="<?= base_url('contact') ?>">
                                        <span><i class="fa fa-phone link-icon" style="color: #a855f7;"></i> Contact Us</span>
                                        <i class="fa fa-chevron-right text-muted small"></i>
                                    </a>
                                </li>
                                <li class="luxury-link-item mb-0 border-0">
                                    <a href="https://wa.me/919753875213?text=Hi%20Kagzi%20Ventures,%20I%20want%20to%20place%20a%20bulk%20order" target="_blank">
                                        <span><i class="fa fa-edit link-icon" style="color: #06b6d4;"></i> Bulk Enquiry</span>
                                        <i class="fa fa-chevron-right text-muted small"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Column 4: PRODUCT LINKS -->
                        <div class="col-lg-3 col-md-6 luxury-footer-col">
                            <h4 class="luxury-footer-heading">PRODUCT LINKS</h4>
                            <div class="luxury-pill-grid">
                                <a href="<?= base_url('shop?q=storage') ?>" class="luxury-pill-btn">
                                    <span>Storage Bags</span> <i class="fa fa-chevron-right text-muted small"></i>
                                </a>
                                <a href="<?= base_url('shop?q=organizer') ?>" class="luxury-pill-btn">
                                    <span>Organizers</span> <i class="fa fa-chevron-right text-muted small"></i>
                                </a>
                                <a href="<?= base_url('shop?q=pouches') ?>" class="luxury-pill-btn">
                                    <span>Pouches</span> <i class="fa fa-chevron-right text-muted small"></i>
                                </a>
                                <a href="<?= base_url('shop?q=hampers') ?>" class="luxury-pill-btn">
                                    <span>Hampers</span> <i class="fa fa-chevron-right text-muted small"></i>
                                </a>
                                <a href="<?= base_url('shop?q=utility') ?>" class="luxury-pill-btn">
                                    <span>Utility Bags</span> <i class="fa fa-chevron-right text-muted small"></i>
                                </a>
                                <a href="<?= base_url('shop?q=gifting') ?>" class="luxury-pill-btn">
                                    <span>Gifting</span> <i class="fa fa-chevron-right text-muted small"></i>
                                </a>
                                <a href="<?= base_url('shop') ?>" class="luxury-pill-btn luxury-pill-btn-full mt-1">
                                    <span>Popular Storage Solutions</span> <i class="fa fa-chevron-right text-muted small"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Middle Feature Highlights Strip (4 Columns) -->
            <div class="luxury-features-strip">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-6 mb-3 mb-md-0">
                            <div class="luxury-feature-item">
                                <div class="luxury-feature-icon">
                                    <i class="fa fa-shield-alt"></i>
                                </div>
                                <div>
                                    <h6 class="luxury-feature-title">Secure &amp; Reliable</h6>
                                    <p class="luxury-feature-desc">We build durable, trusted everyday products</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6 mb-3 mb-md-0">
                            <div class="luxury-feature-item">
                                <div class="luxury-feature-icon">
                                    <i class="fa fa-rocket"></i>
                                </div>
                                <div>
                                    <h6 class="luxury-feature-title">Innovative Solutions</h6>
                                    <p class="luxury-feature-desc">Delivering modern utility designs for your home</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="luxury-feature-item">
                                <div class="luxury-feature-icon">
                                    <i class="fa fa-headset"></i>
                                </div>
                                <div>
                                    <h6 class="luxury-feature-title">Quick Support</h6>
                                    <p class="luxury-feature-desc">We're here to assist you anytime</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="luxury-feature-item">
                                <div class="luxury-feature-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div>
                                    <h6 class="luxury-feature-title">Customer Focused</h6>
                                    <p class="luxury-feature-desc">Your satisfaction is our top priority</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright Bar -->
            <div class="luxury-bottom-bar">
                <div class="container d-flex align-items-center justify-content-between flex-wrap">
                    <div>
                        © <?= date('Y') ?> Kagzi Ventures. All Rights Reserved.
                    </div>
                    <div class="d-flex align-items-center gap-3 mt-2 mt-sm-0">
                        <a href="<?= base_url('privacy-policy') ?>" class="mr-3">Privacy Policy</a>
                        <span class="text-muted mr-3">|</span>
                        <a href="<?= base_url('terms-conditions') ?>" class="mr-3">Terms of Use</a>
                        <a href="#top" class="scroll-top-btn ml-2" title="Back to top">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
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
                    <li class="<?= url_is('shitabi-gifts*') ? 'active' : '' ?>"><a href="<?= base_url('shitabi-gifts') ?>"><i class="fa fa-gift"></i>Shitabi Gifts</a></li>
                    <li><a href="<?= base_url('contact') ?>"><i class="sicon-envelope"></i>Contact Us</a></li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="https://wa.me/919753875213?text=Hi%20Kagzi%20Ventures,%20I%20have%20an%20enquiry" target="_blank" class="text-success font-weight-bold"><i class="fab fa-whatsapp mr-2"></i>WhatsApp Enquiry</a></li>
                    <li><a href="mailto:info@kagziventures.in?subject=Product%20Enquiry" class="text-primary font-weight-bold"><i class="fa fa-envelope mr-2"></i>Email Enquiry</a></li>
                    <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
                </ul>
            </nav>

            <form class="search-wrapper mb-2" action="<?= base_url('shop') ?>">
                <input type="text" class="form-control mb-0" name="q" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>

            <div class="social-icons">
                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                <a href="https://www.instagram.com/kagziventures/" class="social-icon social-instagram icon-instagram" target="_blank"></a>
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
            <a href="https://wa.me/919753875213?text=Hi%20Kagzi%20Ventures,%20I%20have%20an%20enquiry" target="_blank">
                <i class="fab fa-whatsapp text-success"></i>WhatsApp
            </a>
        </div>
        <div class="sticky-info">
            <a href="<?= base_url('contact') ?>">
                <i class="icon-envelope"></i>Contact
            </a>
        </div>
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
    <script>
        if (typeof jQuery !== 'undefined') {
            jQuery(document).ready(function($) {
                if ($.magnificPopup) {
                    $.magnificPopup.close();
                }

                // Force Quick View button to navigate directly to the Product Detail page
                $(document).on('click', '.btn-quickview, a.btn-quickview', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    var href = $(this).attr('href');
                    if (href && href !== '#' && href !== 'javascript:void(0);') {
                        window.location.href = href;
                    } else {
                        var cardLink = $(this).closest('.product-default').find('a[href*="/product/"]').first().attr('href');
                        if (cardLink) {
                            window.location.href = cardLink;
                        } else {
                            window.location.href = '<?= base_url("shop") ?>';
                        }
                    }
                });
            });
        }
    </script>
</body>
</html>
