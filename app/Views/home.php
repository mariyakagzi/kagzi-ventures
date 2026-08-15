<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<main class="main home">
    <div class="container mb-2">
        <div class="info-boxes-container row row-joined mb-2 font2">
            <div class="info-box info-box-icon-left col-lg-4">
                <i class="icon-shipping"></i>
                <div class="info-box-content">
                    <h4>FREE SHIPPING &amp; RETURN</h4>
                    <p class="text-body">Free shipping on all orders over $99</p>
                </div>
            </div>

            <div class="info-box info-box-icon-left col-lg-4">
                <i class="icon-money"></i>
                <div class="info-box-content">
                    <h4>MONEY BACK GUARANTEE</h4>
                    <p class="text-body">100% money back guarantee</p>
                </div>
            </div>

            <div class="info-box info-box-icon-left col-lg-4">
                <i class="icon-support"></i>
                <div class="info-box-content">
                    <h4>ONLINE SUPPORT 24/7</h4>
                    <p class="text-body">Lorem ipsum dolor sit amet.</p>
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
                                Starting At <b class="coupon-sale-text bg-secondary text-white d-inline-block">$<em class="align-text-top">199</em>99</b>
                            </h5>
                            <a href="<?= base_url('shop') ?>" class="btn btn-dark btn-md ls-10">Shop Now!</a>
                        </div>
                    </div>

                    <div class="home-slide home-slide2 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                        <img class="slide-bg" style="background-color: #dadada;" src="<?= base_url('assets/images/demoes/demo1/slider/slide-2.jpg') ?>" width="880" height="428" alt="home-slider">
                        <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                            <h4 class="m-b-2">Over 200 products with discounts</h4>
                            <h2 class="m-b-3">Great Deals</h2>
                            <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Starting At <b>$<em>299</em>99</b></h5>
                            <a href="<?= base_url('shop') ?>" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                        </div>
                    </div>

                    <div class="home-slide home-slide3 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                        <img class="slide-bg" style="background-color: #e5e4e2;" src="<?= base_url('assets/images/demoes/demo1/slider/slide-3.jpg') ?>" width="880" height="428" alt="home-slider">
                        <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                            <h4 class="m-b-2">Up to 70% off</h4>
                            <h2 class="m-b-3">New Arrivals</h2>
                            <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Starting At <b>$<em>299</em>99</b></h5>
                            <a href="<?= base_url('shop') ?>" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                        </div>
                    </div>
                </div>

                <div class="banners-container m-b-2 owl-carousel owl-theme" data-owl-options="{
                    'dots': false,
                    'margin': 20,
                    'loop': false,
                    'responsive': {
                        '480': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        }
                    }
                }">
                    <div class="banner banner1 banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                        <figure class="w-100">
                            <img src="<?= base_url('assets/images/demoes/demo1/banners/banner-1.jpg') ?>" style="background-color: #dadada;" alt="banner">
                        </figure>
                        <div class="banner-layer">
                            <h3 class="m-b-2">Porto Watches</h3>
                            <h4 class="m-b-4 text-primary"><sup class="text-dark"><del>20%</del></sup>30%<sup>OFF</sup></h4>
                            <a href="<?= base_url('shop') ?>" class="text-dark text-uppercase ls-10">Shop Now</a>
                        </div>
                    </div>

                    <div class="banner banner2 text-uppercase banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                        <figure class="w-100">
                            <img src="<?= base_url('assets/images/demoes/demo1/banners/banner-2.jpg') ?>" style="background-color: #dadada;" alt="banner">
                        </figure>
                        <div class="banner-layer text-center">
                            <h3 class="m-b-1 ls-n-20">Deal Promos</h3>
                            <h4 class="text-body">Starting at $99</h4>
                            <a href="<?= base_url('shop') ?>" class="text-dark text-uppercase ls-10">Shop Now</a>
                        </div>
                    </div>

                    <div class="banner banner3 banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="500">
                        <figure class="w-100">
                            <img src="<?= base_url('assets/images/demoes/demo1/banners/banner-3.jpg') ?>" style="background-color: #dadada;" alt="banner">
                        </figure>
                        <div class="banner-layer text-right">
                            <h3 class="m-b-2">Handbags</h3>
                            <h4 class="mb-3 text-secondary text-uppercase">Starting at $99</h4>
                            <a href="<?= base_url('shop') ?>" class="text-dark text-uppercase ls-10">Shop Now</a>
                        </div>
                    </div>
                </div>

                <h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">Featured Products</h2>

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
                                    <div class="btn-icon-group">
                                        <a href="<?= base_url('product/' . $prod['slug']) ?>" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i></a>
                                    </div>
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
                                            <span class="old-price mr-2" style="text-decoration: line-through;">$<?= number_format($prod['price'], 2) ?></span>
                                            <span class="product-price">$<?= number_format($prod['sale_price'], 2) ?></span>
                                        <?php else: ?>
                                            <span class="product-price">$<?= number_format($prod['price'], 2) ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="<?= base_url('shop') ?>">
                                    <img src="<?= base_url('assets/images/demoes/demo1/products/product-1.jpg') ?>" width="205" height="205" alt="product">
                                    <img src="<?= base_url('assets/images/demoes/demo1/products/product-1-2.jpg') ?>" width="205" height="205" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i></a>
                                </div>
                                <a href="#" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="<?= base_url('shop') ?>" class="product-category">category</a>
                                    </div>
                                    <a href="<?= base_url('wishlist') ?>" title="Add to Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="<?= base_url('shop') ?>">Black Grey Headset</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="<?= base_url('shop') ?>">
                                    <img src="<?= base_url('assets/images/demoes/demo1/products/product-2.jpg') ?>" width="205" height="205" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="#" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="<?= base_url('shop') ?>" class="product-category">category</a>
                                    </div>
                                    <a href="<?= base_url('wishlist') ?>" title="Add to Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="<?= base_url('shop') ?>">Battery Charger</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="<?= base_url('shop') ?>">
                                    <img src="<?= base_url('assets/images/demoes/demo1/products/product-3.jpg') ?>" width="205" height="205" alt="product">
                                    <img src="<?= base_url('assets/images/demoes/demo1/products/product-3-2.jpg') ?>" width="205" height="205" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-30%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="#" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="<?= base_url('shop') ?>" class="product-category">category</a>
                                    </div>
                                    <a href="<?= base_url('wishlist') ?>" title="Add to Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="<?= base_url('shop') ?>">Brown Bag</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                    </div>
                                </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="<?= base_url('shop') ?>">
                                    <img src="<?= base_url('assets/images/demoes/demo1/products/product-4.jpg') ?>" width="205" height="205" alt="product">
                                    <img src="<?= base_url('assets/images/demoes/demo1/products/product-4-2.jpg') ?>" width="205" height="205" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="#" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="<?= base_url('shop') ?>" class="product-category">category</a>
                                    </div>
                                    <a href="<?= base_url('wishlist') ?>" title="Add to Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="<?= base_url('shop') ?>">Casual Note Bag</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="<?= base_url('shop') ?>">
                                    <img src="<?= base_url('assets/images/demoes/demo1/products/product-5.jpg') ?>" width="205" height="205" alt="product">
                                    <img src="<?= base_url('assets/images/demoes/demo1/products/product-5-2.jpg') ?>" width="205" height="205" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="#" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="<?= base_url('shop') ?>" class="product-category">category</a>
                                    </div>
                                    <a href="<?= base_url('wishlist') ?>" title="Add to Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="<?= base_url('shop') ?>">Porto Extended Camera</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="brands-slider owl-carousel owl-theme images-center appear-animate" data-animation-name="fadeIn" data-animation-duration="700" data-owl-options="{
                    'margin': 0,
                    'responsive': {
                        '768': {
                            'items': 4
                        },
                        '991': {
                            'items': 4
                        },
                        '1200': {
                            'items': 5
                        }
                    }
                }">
                    <img src="<?= base_url('assets/images/brands/small/brand1.png') ?>" width="140" height="60" alt="brand">
                    <img src="<?= base_url('assets/images/brands/small/brand2.png') ?>" width="140" height="60" alt="brand">
                    <img src="<?= base_url('assets/images/brands/small/brand3.png') ?>" width="140" height="60" alt="brand">
                    <img src="<?= base_url('assets/images/brands/small/brand4.png') ?>" width="140" height="60" alt="brand">
                    <img src="<?= base_url('assets/images/brands/small/brand5.png') ?>" width="140" height="60" alt="brand">
                    <img src="<?= base_url('assets/images/brands/small/brand6.png') ?>" width="140" height="60" alt="brand">
                </div>

                <div class="row products-widgets">
                    <div class="col-sm-6 col-md-4 pb-4 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                        <div class="product-column">
                            <h3 class="section-sub-title ls-n-20"><i class="fa fa-fire text-danger mr-2"></i>Trending Products</h3>

                            <?php if (!empty($trendingProducts)): ?>
                                <?php foreach (array_slice($trendingProducts, 0, 3) as $tp): ?>
                                    <div class="product-default left-details product-widget mb-2">
                                        <figure>
                                            <a href="<?= base_url('product/' . $tp['slug']) ?>">
                                                <img src="<?= base_url($tp['main_image']) ?>" width="84" height="84" alt="<?= esc($tp['name']) ?>">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="<?= base_url('product/' . $tp['slug']) ?>"><?= esc($tp['name']) ?></a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <?php if (!empty($tp['sale_price'])): ?>
                                                    <span class="old-price mr-2" style="text-decoration: line-through;">$<?= number_format($tp['price'], 2) ?></span>
                                                    <span class="product-price">$<?= number_format($tp['sale_price'], 2) ?></span>
                                                <?php else: ?>
                                                    <span class="product-price">$<?= number_format($tp['price'], 2) ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-muted">No trending products found.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4 pb-4 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                        <div class="product-column">
                            <h3 class="section-sub-title ls-n-20">Best Selling Products</h3>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="<?= base_url('shop') ?>">
                                        <img src="<?= base_url('assets/images/demoes/demo1/products/small/product-2.jpg') ?>" width="84" height="84" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="<?= base_url('shop') ?>">Battery Charger</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="<?= base_url('shop') ?>">
                                        <img src="<?= base_url('assets/images/demoes/demo1/products/small/product-7.jpg') ?>" width="84" height="84" alt="product">
                                        <img src="<?= base_url('assets/images/demoes/demo1/products/small/product-7-2.jpg') ?>" width="84" height="84" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="<?= base_url('shop') ?>">Computer Mouse</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="<?= base_url('shop') ?>">
                                        <img src="<?= base_url('assets/images/demoes/demo1/products/small/product-8.jpg') ?>" width="84" height="84" alt="product">
                                        <img src="<?= base_url('assets/images/demoes/demo1/products/small/product-8-2.jpg') ?>" width="84" height="84" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="<?= base_url('shop') ?>">Casual Note Bag</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4 pb-4 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="800">
                        <div class="product-column">
                            <h3 class="section-sub-title ls-n-20">Latest Products</h3>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="<?= base_url('shop') ?>">
                                        <img src="<?= base_url('assets/images/demoes/demo1/products/small/product-9.jpg') ?>" width="84" height="84" alt="product">
                                        <img src="<?= base_url('assets/images/demoes/demo1/products/small/product-9-2.jpg') ?>" width="84" height="84" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="<?= base_url('shop') ?>">Ultimate 3D Bluetooth Speaker</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="<?= base_url('shop') ?>">
                                        <img src="<?= base_url('assets/images/demoes/demo1/products/small/product-10.jpg') ?>" width="84" height="84" alt="product">
                                        <img src="<?= base_url('assets/images/demoes/demo1/products/small/product-10-2.jpg') ?>" width="84" height="84" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="<?= base_url('shop') ?>">Brown-Black Men Casual Glasses</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="<?= base_url('shop') ?>">
                                        <img src="<?= base_url('assets/images/demoes/demo1/products/small/product-11.jpg') ?>" width="84" height="84" alt="product">
                                        <img src="<?= base_url('assets/images/demoes/demo1/products/small/product-11-2.jpg') ?>" width="84" height="84" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="<?= base_url('shop') ?>">Brown-Black Men Casual Glasses</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="mt-1 mb-3 pb-2">

                <div class="feature-boxes-container">
                    <div class="row">
                        <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-earphones-alt"></i>
                                <div class="feature-box-content p-0">
                                    <h3 class="mb-0 pb-1">Customer Support</h3>
                                    <h5 class="mb-1 pb-1">Need Assistance?</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="400">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-credit-card"></i>
                                <div class="feature-box-content p-0">
                                    <h3 class="mb-0 pb-1">Secured Payment</h3>
                                    <h5 class="mb-1 pb-1">Safe &amp; Fast</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-action-undo"></i>
                                <div class="feature-box-content p-0">
                                    <h3 class="mb-0 pb-1">Returns</h3>
                                    <h5 class="mb-1 pb-1">Easy &amp; Free</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
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
