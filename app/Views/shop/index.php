<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<main class="main">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('shop') ?>">Shop</a></li>
                <?php if (!empty($currentCategory)): ?>
                    <li class="breadcrumb-item active" aria-current="page"><?= esc($currentCategory['name']) ?></li>
                <?php elseif (!empty($searchQuery)): ?>
                    <li class="breadcrumb-item active" aria-current="page">Search: "<?= esc($searchQuery) ?>"</li>
                <?php endif; ?>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-9 mb-1">
                <!-- Catalog Toolbox (Sort & Search) -->
                <nav class="toolbox sticky-header mb-3" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        <a href="#" class="sidebar-toggler"><i class="icon-sliders"></i>Filters</a>

                        <form action="<?= current_url() ?>" method="get" class="d-flex align-items-center">
                            <?php if ($catParam): ?>
                                <input type="hidden" name="category" value="<?= esc($catParam) ?>">
                            <?php endif; ?>
                            <?php if ($searchQuery): ?>
                                <input type="hidden" name="q" value="<?= esc($searchQuery) ?>">
                            <?php endif; ?>

                            <div class="toolbox-item toolbox-sort">
                                <label>Sort By:</label>
                                <div class="select-custom">
                                    <select name="sort" class="form-control" onchange="this.form.submit()">
                                        <option value="default" <?= $sort == 'default' ? 'selected' : '' ?>>Default sorting</option>
                                        <option value="newest" <?= $sort == 'newest' ? 'selected' : '' ?>>Sort by newness</option>
                                        <option value="price_low" <?= $sort == 'price_low' ? 'selected' : '' ?>>Sort by price: low to high</option>
                                        <option value="price_high" <?= $sort == 'price_high' ? 'selected' : '' ?>>Sort by price: high to low</option>
                                        <option value="name" <?= $sort == 'name' ? 'selected' : '' ?>>Sort by name</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="toolbox-right">
                        <div class="toolbox-item toolbox-show">
                            <label>Showing <?= count($products) ?> products</label>
                        </div>
                    </div>
                </nav>

                <!-- Products Grid -->
                <div class="row row-sm">
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $prod): ?>
                            <div class="col-6 col-sm-4 col-md-3 mb-4">
                                <div class="product-default inner-quickview inner-icon bg-white p-2 border rounded">
                                    <figure>
                                        <a href="<?= base_url('product/' . $prod['slug']) ?>">
                                            <img src="<?= base_url($prod['main_image']) ?>" alt="<?= esc($prod['name']) ?>" style="height: 200px; object-fit: contain; width: 100%;">
                                        </a>
                                        <?php if (!empty($prod['sale_price'])): ?>
                                            <div class="label-group">
                                                <div class="product-label label-sale">SALE</div>
                                            </div>
                                        <?php endif; ?>
                                        <a href="<?= base_url('product/' . $prod['slug']) ?>" class="btn-quickview" title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details text-center">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="<?= base_url('shop?category=' . ($prod['category_slug'] ?? 'all')) ?>" class="product-category">
                                                    <?= esc($prod['category_name'] ?? 'General') ?>
                                                </a>
                                            </div>
                                        </div>

                                        <h3 class="product-title">
                                            <a href="<?= base_url('product/' . $prod['slug']) ?>"><?= esc($prod['name']) ?></a>
                                        </h3>

                                        <div class="ratings-container justify-content-center">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                            </div>
                                        </div>

                                        <div class="price-box my-2">
                                            <?php if (!empty($prod['sale_price'])): ?>
                                                <span class="old-price mr-2" style="text-decoration: line-through;">₹<?= number_format($prod['price'], 2) ?></span>
                                                <span class="product-price text-primary font-weight-bold">₹<?= number_format($prod['sale_price'], 2) ?></span>
                                            <?php else: ?>
                                                <span class="product-price text-dark font-weight-bold">₹<?= number_format($prod['price'], 2) ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mt-2">
                                            <a href="https://wa.me/919753875213?text=<?= rawurlencode('Hi Kagzi Ventures, I would like to enquire about: ' . $prod['name']) ?>" target="_blank" class="btn btn-sm btn-success w-100 font-weight-bold d-flex align-items-center justify-content-center" style="background-color: #25D366; border-color: #25D366; padding: 6px 10px; font-size: 0.85rem;">
                                                <i class="fab fa-whatsapp mr-1" style="font-size: 1.1rem;"></i> WhatsApp Enquiry
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <i class="icon-bag fa-3x text-muted mb-3 d-block"></i>
                            <h4>No products found</h4>
                            <p class="text-muted">Try choosing a different category or search term.</p>
                            <a href="<?= base_url('shop') ?>" class="btn btn-primary mt-2">Clear Filters</a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php if ($pager): ?>
                    <nav class="toolbox toolbox-pagination justify-content-center mt-3">
                        <?= $pager->links('default', 'default_full') ?>
                    </nav>
                <?php endif; ?>
            </div>

            <!-- Left Sidebar -->
            <div class="sidebar-overlay"></div>
            <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                <div class="sidebar-wrapper">
                    <!-- Categories Widget -->
                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Categories</a>
                        </h3>

                        <div class="collapse show" id="widget-body-2">
                            <div class="widget-body">
                                <ul class="cat-list">
                                    <li class="<?= empty($catParam) ? 'active' : '' ?>">
                                        <a href="<?= base_url('shop') ?>">All Categories</a>
                                    </li>
                                    <?php if (!empty($allCategories)): ?>
                                        <?php foreach ($allCategories as $cat): ?>
                                            <li class="<?= ($catParam === $cat['slug']) ? 'active font-weight-bold text-primary' : '' ?>">
                                                <a href="<?= base_url('shop?category=' . $cat['slug']) ?>"><?= esc($cat['name']) ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Price Filter Widget -->
                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Price Filter</a>
                        </h3>

                        <div class="collapse show" id="widget-body-3">
                            <div class="widget-body pb-0">
                                <form action="<?= current_url() ?>" method="get">
                                    <?php if ($catParam): ?>
                                        <input type="hidden" name="category" value="<?= esc($catParam) ?>">
                                    <?php endif; ?>
                                    <div class="price-slider-wrapper">
                                        <p class="mb-2">Filter by price range:</p>
                                        <div class="d-flex align-items-center">
                                            <button type="submit" name="sort" value="price_low" class="btn btn-sm btn-primary mr-2">Low to High</button>
                                            <button type="submit" name="sort" value="price_high" class="btn btn-sm btn-outline-dark">High to Low</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Products Sidebar Widget -->
                    <?php if (!empty($featuredProducts)): ?>
                        <div class="widget widget-featured">
                            <h3 class="widget-title">Featured Products</h3>

                            <div class="widget-body">
                                <div class="featured-col">
                                    <?php foreach ($featuredProducts as $fp): ?>
                                        <div class="product-default left-details product-widget">
                                            <figure>
                                                <a href="<?= base_url('product/' . $fp['slug']) ?>">
                                                    <img src="<?= base_url($fp['main_image']) ?>" width="75" height="75" alt="<?= esc($fp['name']) ?>">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-title">
                                                    <a href="<?= base_url('product/' . $fp['slug']) ?>"><?= esc($fp['name']) ?></a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="product-price">₹<?= number_format($fp['sale_price'] ?? $fp['price'], 2) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </aside>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
