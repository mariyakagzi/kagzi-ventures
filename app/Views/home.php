<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<main class="main home">
    <div class="container mb-2">
        <div class="info-boxes-container row row-joined mb-2 font2">
            <div class="info-box info-box-icon-left col-lg-4">
                <i class="fab fa-whatsapp text-success" style="font-size: 2.2rem;"></i>
                <div class="info-box-content">
                    <h4>WHATSAPP ENQUIRY</h4>
                    <p class="text-body">Instant quotes & inquiries on +91 9753875213</p>
                </div>
            </div>

            <div class="info-box info-box-icon-left col-lg-4">
                <i class="fa fa-envelope text-primary" style="font-size: 2rem;"></i>
                <div class="info-box-content">
                    <h4>EMAIL ENQUIRY</h4>
                    <p class="text-body">Send requests to info@kagziventures.in</p>
                </div>
            </div>

            <div class="info-box info-box-icon-left col-lg-4">
                <i class="icon-support"></i>
                <div class="info-box-content">
                    <h4>THOUGHTFUL UTILITY</h4>
                    <p class="text-body">Storage solutions & hampers crafted with care</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="home-slider slide-animate owl-carousel owl-theme mb-2" data-owl-options="{
                    'loop': false,
                    'dots': true,
                    'nav': false
                }">
                    <div class="home-slide home-slide1 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                        <img class="slide-bg" style="background-color: #2699D0;" src="<?= base_url('assets/images/demoes/demo1/slider/slide-1.png') ?>" width="880" height="428" alt="home-slider">
                        <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                            <h4 class="text-white mb-0">Find the Boundaries. Push Through!</h4>
                            <h2 class="text-white mb-0">Summer Sale</h2>
                            <h3 class="text-white text-uppercase m-b-3">70% Off</h3>
                            <h5 class="text-white text-uppercase d-inline-block mb-0 ls-n-20 align-text-bottom">
                                Starting At <b class="coupon-sale-text bg-secondary text-white d-inline-block">₹<em class="align-text-top">199</em>99</b>
                            </h5>
                            <a href="<?= base_url('shop') ?>" class="btn btn-dark btn-md ls-10">Shop Now!</a>
                        </div>
                    </div>

                    <div class="home-slide home-slide2 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                        <img class="slide-bg" style="background-color: #dadada;" src="<?= base_url('assets/images/demoes/demo1/slider/slide-2.jpg') ?>" width="880" height="428" alt="home-slider">
                        <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                            <h4 class="m-b-2">Over 200 products with discounts</h4>
                            <h2 class="m-b-3">Great Deals</h2>
                            <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Starting At <b>₹<em>299</em>99</b></h5>
                            <a href="<?= base_url('shop') ?>" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                        </div>
                    </div>

                    <div class="home-slide home-slide3 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                        <img class="slide-bg" style="background-color: #e5e4e2;" src="<?= base_url('assets/images/demoes/demo1/slider/slide-3.jpg') ?>" width="880" height="428" alt="home-slider">
                        <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                            <h4 class="m-b-2">Up to 70% off</h4>
                            <h2 class="m-b-3">New Arrivals</h2>
                            <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Starting At <b>₹<em>299</em>99</b></h5>
                            <a href="<?= base_url('shop') ?>" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                        </div>
                    </div>
                </div>

                <!-- Stylish USP Feature Highlights Bar below Summer Sale Slider -->
                <style>
                    .usp-features-bar {
                        background: linear-gradient(135deg, #fff5f8 0%, #ffffff 50%, #fdf2f8 100%);
                        border: 1.5px solid #fbcfe8;
                        border-radius: 16px;
                        box-shadow: 0 8px 25px rgba(194, 30, 86, 0.07);
                        padding: 22px 18px;
                        margin-top: 1.5rem;
                        margin-bottom: 2rem;
                    }
                    .usp-feature-item {
                        display: flex;
                        align-items: center;
                        padding: 10px 12px;
                        transition: all 0.3s ease;
                        border-radius: 12px;
                    }
                    .usp-feature-item:hover {
                        background: #ffffff;
                        box-shadow: 0 6px 18px rgba(194, 30, 86, 0.12);
                        transform: translateY(-3px);
                    }
                    .usp-icon-wrapper {
                        width: 50px;
                        height: 50px;
                        min-width: 50px;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-right: 12px;
                        font-size: 20px;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                    }
                    .usp-icon-whatsapp {
                        background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
                        color: #ffffff;
                    }
                    .usp-icon-magenta {
                        background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%);
                        color: #ffffff;
                    }
                    .usp-icon-gold {
                        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
                        color: #ffffff;
                    }
                    .usp-icon-blue {
                        background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
                        color: #ffffff;
                    }
                    .usp-feature-title {
                        font-size: 13.5px;
                        font-weight: 700;
                        color: #0f172a;
                        margin-bottom: 2px;
                        text-transform: uppercase;
                        letter-spacing: 0.3px;
                    }
                    .usp-feature-desc {
                        font-size: 12px;
                        color: #64748b;
                        margin-bottom: 0;
                        line-height: 1.35;
                    }
                </style>

                <div class="usp-features-bar appear-animate" data-animation-name="fadeInUpShorter">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0">
                            <div class="usp-feature-item">
                                <div class="usp-icon-wrapper usp-icon-whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                                <div>
                                    <h5 class="usp-feature-title">Instant Inquiries</h5>
                                    <p class="usp-feature-desc">Quick quotes on +91 9753875213</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0">
                            <div class="usp-feature-item">
                                <div class="usp-icon-wrapper usp-icon-magenta">
                                    <i class="fa fa-gem"></i>
                                </div>
                                <div>
                                    <h5 class="usp-feature-title">100% Quality Assurance</h5>
                                    <p class="usp-feature-desc">Premium materials & durability</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 mb-3 mb-sm-0">
                            <div class="usp-feature-item">
                                <div class="usp-icon-wrapper usp-icon-gold">
                                    <i class="fa fa-boxes"></i>
                                </div>
                                <div>
                                    <h5 class="usp-feature-title">Thoughtful Utility</h5>
                                    <p class="usp-feature-desc">Smart storage & organizers</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="usp-feature-item">
                                <div class="usp-icon-wrapper usp-icon-blue">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <div>
                                    <h5 class="usp-feature-title">Nationwide Delivery</h5>
                                    <p class="usp-feature-desc">Fast & safe delivery across India</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shop By Category Showcase Section (Above Featured Products) -->
                <style>
                    .category-card-item {
                        background: #ffffff;
                        border: 1.5px solid #f1f5f9;
                        border-radius: 14px;
                        padding: 22px 16px;
                        text-align: center;
                        transition: all 0.3s ease;
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
                        height: 100%;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                    }
                    .category-card-item:hover {
                        transform: translateY(-5px);
                        border-color: #BFDBFE;
                        box-shadow: 0 12px 25px rgba(29, 94, 184, 0.15);
                    }
                    .category-card-icon {
                        width: 56px;
                        height: 56px;
                        border-radius: 50%;
                        background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);
                        color: #1D5EB8;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 22px;
                        margin-bottom: 12px;
                        border: 1px solid #BFDBFE;
                    }
                    .category-card-name {
                        font-size: 15px;
                        font-weight: 700;
                        color: #0f172a;
                        margin-bottom: 6px;
                    }
                    .category-card-link {
                        font-size: 12px;
                        font-weight: 700;
                        color: #1D5EB8;
                        text-transform: uppercase;
                        letter-spacing: 0.5px;
                    }
                </style>

                <div class="featured-products-header appear-animate" data-animation-name="fadeInUpShorter">
                    <h2 class="featured-products-heading">Shop By Category</h2>
                    <p class="featured-products-subheading">Explore our diverse range of quality storage and utility collections</p>
                </div>

                <div class="row justify-content-center mb-3 appear-animate" data-animation-name="fadeInUpShorter">
                    <?php if (!empty($allCategories)): ?>
                        <?php foreach (array_slice($allCategories, 0, 8) as $cat): ?>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-3 mb-4">
                                <a href="<?= base_url('shop?category=' . esc($cat['slug'])) ?>" class="d-block h-100 text-decoration-none">
                                    <div class="category-card-item">
                                        <div class="category-card-icon">
                                            <i class="fa fa-tag"></i>
                                        </div>
                                        <h4 class="category-card-name"><?= esc($cat['name']) ?></h4>
                                        <span class="category-card-link">Explore Collection <i class="fa fa-arrow-right ml-1"></i></span>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- View All Categories Button -->
                <div class="text-center mt-1 mb-5 appear-animate" data-animation-name="fadeInUpShorter">
                    <a href="<?= base_url('shop') ?>" class="btn font-weight-bold text-white px-5" style="background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%); border: none; border-radius: 50px; padding: 13px 36px; box-shadow: 0 4px 15px rgba(29, 94, 184, 0.35); font-size: 14px; letter-spacing: 0.5px;">
                        <i class="fa fa-th-large mr-2"></i> View All Categories <i class="fa fa-arrow-right ml-2"></i>
                    </a>
                </div>

<style>
    /* Featured Products Section Styling & Equal Heights */
    .featured-products-header {
        text-align: center;
        margin-top: 2rem;
        margin-bottom: 2rem;
        position: relative;
    }
    .featured-products-heading {
        font-size: 26px !important;
        font-weight: 800 !important;
        text-transform: uppercase !important;
        color: #0f172a !important;
        letter-spacing: 0.5px !important;
        margin-bottom: 6px !important;
        display: inline-block !important;
        position: relative !important;
    }
    .featured-products-heading::after {
        content: '';
        display: block;
        width: 70px;
        height: 3.5px;
        background: linear-gradient(90deg, #1D5EB8, #C5A059);
        margin: 8px auto 0;
        border-radius: 10px;
    }
    .featured-products-subheading {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 0;
        font-weight: 500;
    }

    /* Equal Height Carousel Items */
    .products-slider.owl-carousel .owl-stage {
        display: flex !important;
        align-items: stretch !important;
    }
    .products-slider.owl-carousel .owl-item {
        display: flex !important;
        height: auto !important;
    }
    .products-slider .product-default {
        display: flex !important;
        flex-direction: column !important;
        justify-content: space-between !important;
        width: 100% !important;
        height: 100% !important;
        background: #ffffff !important;
        border: 1px solid #f1f5f9 !important;
        border-radius: 14px !important;
        padding: 16px !important;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04) !important;
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
        margin-bottom: 10px !important;
    }
    .products-slider .product-default:hover {
        transform: translateY(-6px) !important;
        box-shadow: 0 12px 32px rgba(29, 94, 184, 0.15) !important;
        border-color: #BFDBFE !important;
    }
    .products-slider .product-default figure {
        position: relative !important;
        height: 210px !important;
        margin-bottom: 14px !important;
        border-radius: 10px !important;
        overflow: hidden !important;
        background-color: #f8fafc !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
    .products-slider .product-default figure img {
        max-height: 100% !important;
        width: auto !important;
        max-width: 100% !important;
        object-fit: contain !important;
        transition: transform 0.4s ease !important;
    }
    .products-slider .product-default:hover figure img {
        transform: scale(1.06) !important;
    }
    .products-slider .product-details {
        flex-grow: 1 !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: space-between !important;
        padding: 4px 2px 0 !important;
    }
    .products-slider .product-title {
        font-size: 14.5px !important;
        font-weight: 700 !important;
        line-height: 1.4 !important;
        height: 42px !important;
        overflow: hidden !important;
        display: -webkit-box !important;
        -webkit-line-clamp: 2 !important;
        -webkit-box-orient: vertical !important;
        margin-bottom: 8px !important;
    }
    .products-slider .product-title a {
        color: #1e293b !important;
        transition: color 0.2s ease !important;
    }
    .products-slider .product-title a:hover {
        color: #1D5EB8 !important;
    }
    .products-slider .price-box {
        margin-top: auto !important;
        font-size: 16px !important;
        font-weight: 800 !important;
        color: #1D5EB8 !important;
    }
</style>

                <!-- FEATURED PRODUCTS SECTION -->
                <div class="featured-products-header appear-animate" data-animation-name="fadeInUpShorter">
                    <h2 class="featured-products-heading">Featured Products</h2>
                    <p class="featured-products-subheading">Discover our handpicked selection of top quality storage solutions & utility products</p>
                </div>

                <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
                    <?php if (!empty($featuredProducts)): ?>
                        <?php foreach ($featuredProducts as $prod): ?>
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="<?= base_url('product/' . $prod['slug']) ?>">
                                        <img src="<?= base_url($prod['main_image']) ?>" width="205" height="205" alt="<?= esc($prod['name']) ?>">
                                    </a>
                                    <?php if (!empty($prod['sale_price'])): ?>
                                        <div class="label-group">
                                            <div class="product-label label-hot">HOT</div>
                                            <div class="product-label label-sale">SALE</div>
                                        </div>
                                    <?php endif; ?>
                                    <a href="<?= base_url('product/' . $prod['slug']) ?>" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="<?= base_url('shop?category=' . ($prod['category_slug'] ?? 'all')) ?>" class="product-category"><?= esc($prod['category_name'] ?? 'Category') ?></a>
                                        </div>
                                        <a href="<?= base_url('wishlist') ?>" title="Add to Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="<?= base_url('product/' . $prod['slug']) ?>"><?= esc($prod['name']) ?></a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <?php if (!empty($prod['sale_price'])): ?>
                                            <span class="old-price mr-2" style="text-decoration: line-through;">₹<?= number_format($prod['price'], 2) ?></span>
                                            <span class="product-price">₹<?= number_format($prod['sale_price'], 2) ?></span>
                                        <?php else: ?>
                                            <span class="product-price">₹<?= number_format($prod['price'], 2) ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- TRENDING PRODUCTS SECTION -->
                <div class="featured-products-header appear-animate" data-animation-name="fadeInUpShorter">
                    <h2 class="featured-products-heading">Trending Products</h2>
                    <p class="featured-products-subheading">Check out what's popular and trending right now across our catalog</p>
                </div>

                <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-3 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
                    <?php if (!empty($trendingProducts)): ?>
                        <?php foreach ($trendingProducts as $prod): ?>
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="<?= base_url('product/' . $prod['slug']) ?>">
                                        <img src="<?= base_url($prod['main_image']) ?>" width="205" height="205" alt="<?= esc($prod['name']) ?>">
                                    </a>
                                    <?php if (!empty($prod['sale_price'])): ?>
                                        <div class="label-group">
                                            <div class="product-label label-hot">HOT</div>
                                            <div class="product-label label-sale">SALE</div>
                                        </div>
                                    <?php endif; ?>
                                    <a href="<?= base_url('product/' . $prod['slug']) ?>" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="<?= base_url('shop?category=' . ($prod['category_slug'] ?? 'all')) ?>" class="product-category"><?= esc($prod['category_name'] ?? 'Category') ?></a>
                                        </div>
                                        <a href="<?= base_url('wishlist') ?>" title="Add to Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="<?= base_url('product/' . $prod['slug']) ?>"><?= esc($prod['name']) ?></a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <?php if (!empty($prod['sale_price'])): ?>
                                            <span class="old-price mr-2" style="text-decoration: line-through;">₹<?= number_format($prod['price'], 2) ?></span>
                                            <span class="product-price">₹<?= number_format($prod['sale_price'], 2) ?></span>
                                        <?php else: ?>
                                            <span class="product-price">₹<?= number_format($prod['price'], 2) ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- BEST SELLER PRODUCTS SECTION -->
                <div class="featured-products-header appear-animate" data-animation-name="fadeInUpShorter">
                    <h2 class="featured-products-heading">Best Seller Products</h2>
                    <p class="featured-products-subheading">Explore our most-loved products ordered again and again by customers</p>
                </div>

                <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-3 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
                    <?php if (!empty($bestSellerProducts)): ?>
                        <?php foreach ($bestSellerProducts as $prod): ?>
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="<?= base_url('product/' . $prod['slug']) ?>">
                                        <img src="<?= base_url($prod['main_image']) ?>" width="205" height="205" alt="<?= esc($prod['name']) ?>">
                                    </a>
                                    <?php if (!empty($prod['sale_price'])): ?>
                                        <div class="label-group">
                                            <div class="product-label label-hot">BESTSELLER</div>
                                            <div class="product-label label-sale">SALE</div>
                                        </div>
                                    <?php else: ?>
                                        <div class="label-group">
                                            <div class="product-label label-hot">BESTSELLER</div>
                                        </div>
                                    <?php endif; ?>
                                    <a href="<?= base_url('product/' . $prod['slug']) ?>" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="<?= base_url('shop?category=' . ($prod['category_slug'] ?? 'all')) ?>" class="product-category"><?= esc($prod['category_name'] ?? 'Category') ?></a>
                                        </div>
                                        <a href="<?= base_url('wishlist') ?>" title="Add to Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="<?= base_url('product/' . $prod['slug']) ?>"><?= esc($prod['name']) ?></a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <?php if (!empty($prod['sale_price'])): ?>
                                            <span class="old-price mr-2" style="text-decoration: line-through;">₹<?= number_format($prod['price'], 2) ?></span>
                                            <span class="product-price">₹<?= number_format($prod['sale_price'], 2) ?></span>
                                        <?php else: ?>
                                            <span class="product-price">₹<?= number_format($prod['price'], 2) ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <hr class="mt-1 mb-3 pb-2">

                <!-- Home Category Showcase Sections (Displaying below Featured & Trending Products) -->
                <?php if (!empty($homeCategorySections)): ?>
                    <?php foreach ($homeCategorySections as $section): ?>
                        <?php $cat = $section['category']; $catProds = $section['products']; ?>
                        <div class="home-category-section my-5 p-4 bg-white rounded border shadow-sm">
                            <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap pb-3 border-bottom" style="border-bottom: 2px solid #1D5EB8 !important;">
                                <div>
                                    <h3 class="font-weight-bold text-dark mb-1 d-flex align-items-center" style="font-size: 1.6rem;">
                                        <i class="fa fa-folder-open text-primary mr-2"></i> <?= esc($cat['name']) ?>
                                        <span class="badge badge-primary ml-3 font-weight-bold" style="font-size: 0.75rem; border-radius: 12px;">Featured Category</span>
                                    </h3>
                                    <?php if (!empty($cat['description'])): ?>
                                        <p class="text-muted mb-0 small"><?= esc($cat['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                                <a href="<?= base_url('shop?category=' . esc($cat['slug'])) ?>" class="btn btn-outline-primary btn-sm font-weight-bold mt-2 mt-sm-0" style="border-radius: 20px; padding: 6px 16px;">
                                    View All <?= esc($cat['name']) ?> <i class="fa fa-arrow-right ml-1"></i>
                                </a>
                            </div>

                            <div class="row row-sm">
                                <?php foreach ($catProds as $p): ?>
                                    <div class="col-6 col-sm-4 col-md-3 mb-4">
                                        <div class="product-default inner-quickview inner-icon bg-white p-2 border rounded h-100 d-flex flex-column justify-content-between">
                                            <figure class="mb-2">
                                                <a href="<?= base_url('product/' . $p['slug']) ?>">
                                                    <img src="<?= base_url($p['main_image']) ?>" alt="<?= esc($p['name']) ?>" style="height: 190px; object-fit: contain; width: 100%;">
                                                </a>
                                                <?php if (!empty($p['sale_price'])): ?>
                                                    <div class="label-group">
                                                        <div class="product-label label-sale">SALE</div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="btn-icon-group">
                                                    <a href="<?= base_url('product/' . $p['slug']) ?>" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i></a>
                                                </div>
                                            </figure>
                                            <div class="product-details text-center">
                                                <h3 class="product-title font-weight-bold" style="font-size: 0.95rem;">
                                                    <a href="<?= base_url('product/' . $p['slug']) ?>"><?= esc($p['name']) ?></a>
                                                </h3>

                                                <div class="price-box my-2">
                                                    <?php if (!empty($p['sale_price'])): ?>
                                                        <span class="old-price mr-2 text-muted" style="text-decoration: line-through;">₹<?= number_format($p['price'], 2) ?></span>
                                                        <span class="product-price text-primary font-weight-bold">₹<?= number_format($p['sale_price'], 2) ?></span>
                                                    <?php else: ?>
                                                        <span class="product-price text-dark font-weight-bold">₹<?= number_format($p['price'], 2) ?></span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="mt-2">
                                                    <a href="https://wa.me/919753875213?text=<?= rawurlencode('Hi Kagzi Ventures, I would like to enquire about: ' . $p['name']) ?>" target="_blank" class="btn btn-sm btn-success w-100 font-weight-bold d-flex align-items-center justify-content-center" style="background-color: #25D366; border-color: #25D366; padding: 6px 10px; font-size: 0.85rem; border-radius: 4px;">
                                                        <i class="fab fa-whatsapp mr-1" style="font-size: 1.1rem;"></i> WhatsApp Enquiry
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="feature-boxes-container">
                    <div class="row">
                        <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="fab fa-whatsapp text-success" style="font-size: 2.2rem;"></i>
                                <div class="feature-box-content p-0 mt-2">
                                    <h3 class="mb-0 pb-1">WhatsApp Enquiries</h3>
                                    <h5 class="mb-1 pb-1">Fast &amp; Direct Response</h5>
                                    <p>Connect with our team directly on WhatsApp for quotes, product queries, and details.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="400">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="fa fa-envelope text-primary" style="font-size: 2rem;"></i>
                                <div class="feature-box-content p-0 mt-2">
                                    <h3 class="mb-0 pb-1">Mail Enquiries</h3>
                                    <h5 class="mb-1 pb-1">Official Quotes</h5>
                                    <p>Send your requirements and bulk requests to info@kagziventures.in anytime.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-support text-info" style="font-size: 2rem;"></i>
                                <div class="feature-box-content p-0 mt-2">
                                    <h3 class="mb-0 pb-1">Quality Products</h3>
                                    <h5 class="mb-1 pb-1">Thoughtful Design</h5>
                                    <p>Storage solutions, pouches, hampers, and organizers crafted to meet your everyday needs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
