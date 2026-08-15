<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<main class="main">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('shop') ?>">Products</a></li>
                <?php if (!empty($product['category_name'])): ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('shop?category=' . $product['category_slug']) ?>"><?= esc($product['category_name']) ?></a></li>
                <?php endif; ?>
                <li class="breadcrumb-item active" aria-current="page"><?= esc($product['name']) ?></li>
            </ol>
        </nav>

        <!-- Product Single Container -->
        <div class="product-single-container product-single-default">
            <div class="row">
                <!-- Product Gallery -->
                <div class="col-lg-5 col-md-6 product-single-gallery">
                    <div class="product-slider-container">
                        <?php if (!empty($product['sale_price'])): ?>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <div class="product-label label-sale">SALE</div>
                            </div>
                        <?php endif; ?>

                        <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                            <div class="product-item">
                                <img class="product-single-image" src="<?= base_url($product['main_image']) ?>" data-zoom-image="<?= base_url($product['main_image']) ?>" width="468" height="468" alt="<?= esc($product['name']) ?>" style="object-fit: contain;" />
                            </div>
                            <?php if (!empty($extraImages)): ?>
                                <?php foreach ($extraImages as $img): ?>
                                    <div class="product-item">
                                        <img class="product-single-image" src="<?= base_url($img) ?>" data-zoom-image="<?= base_url($img) ?>" width="468" height="468" alt="<?= esc($product['name']) ?>" style="object-fit: contain;" />
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if (!empty($product['video'])): ?>
                        <div class="product-video-box mt-3 p-3 bg-dark text-white rounded shadow-sm text-center">
                            <h6 class="text-white font-weight-bold mb-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-play-circle text-danger mr-2" style="font-size: 1.3rem;"></i> Product Video
                            </h6>
                            <?php if (filter_var($product['video'], FILTER_VALIDATE_URL) && (strpos($product['video'], 'youtube.com') !== false || strpos($product['video'], 'youtu.be') !== false)): ?>
                                <?php 
                                    preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w-]{11})/', $product['video'], $matches);
                                    $ytId = $matches[1] ?? '';
                                ?>
                                <?php if ($ytId): ?>
                                    <div class="embed-responsive embed-responsive-16by9 rounded overflow-hidden">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $ytId ?>" allowfullscreen></iframe>
                                    </div>
                                <?php else: ?>
                                    <video controls class="w-100 rounded" style="max-height: 280px; object-fit: contain;">
                                        <source src="<?= esc($product['video']) ?>">
                                    </video>
                                <?php endif; ?>
                            <?php else: ?>
                                <video controls class="w-100 rounded" style="max-height: 280px; object-fit: contain;" poster="<?= base_url($product['main_image']) ?>">
                                    <source src="<?= base_url($product['video']) ?>">
                                    Your browser does not support HTML5 video.
                                </video>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Product Details -->
                <div class="col-lg-7 col-md-6 product-single-details">
                    <h1 class="product-title"><?= esc($product['name']) ?></h1>

                    <div class="ratings-container">
                        <div class="product-ratings">
                            <span class="ratings" style="width:100%"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="#product-tab-reviews" class="rating-link">( 5 Customer Reviews )</a>
                    </div>

                    <hr class="short-divider">

                    <div class="price-box d-flex align-items-center mb-3">
                        <?php if (!empty($product['sale_price']) && $product['sale_price'] < $product['price']): ?>
                            <?php $discountPercent = round((($product['price'] - $product['sale_price']) / $product['price']) * 100); ?>
                            <span class="old-price mr-3 text-muted" style="text-decoration: line-through; font-size: 1.25rem;">₹<?= number_format($product['price'], 2) ?></span>
                            <span class="new-price text-primary font-weight-bold mr-3" style="font-size: 2rem;">₹<?= number_format($product['sale_price'], 2) ?></span>
                            <span class="badge badge-danger font-weight-bold px-2 py-1" style="font-size: 0.9rem;">SAVE <?= $discountPercent ?>%</span>
                        <?php else: ?>
                            <span class="new-price text-dark font-weight-bold" style="font-size: 2rem;">₹<?= number_format($product['price'], 2) ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="product-desc my-3">
                        <p><?= esc($product['short_description'] ?? $product['description'] ?? 'High quality product available at Kagzi Ventures.') ?></p>
                    </div>

                    <!-- Key Features Section -->
                    <?php if (!empty($product['features'])): ?>
                        <div class="product-features-box bg-light p-3 rounded mb-3 border">
                            <h6 class="font-weight-bold text-uppercase text-dark mb-2"><i class="fa fa-list-ul text-primary mr-2"></i>Key Features & Highlights</h6>
                            <ul class="list-unstyled mb-0 pl-1">
                                <?php
                                $lines = explode("\n", $product['features']);
                                foreach ($lines as $line):
                                    $trimmed = trim($line);
                                    if (!empty($trimmed)):
                                ?>
                                    <li class="mb-1 text-dark" style="font-size: 0.95rem;">
                                        <i class="fa fa-check-circle text-success mr-2"></i><?= esc(ltrim($trimmed, '•- ')) ?>
                                    </li>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <ul class="single-info-list">
                        <li>
                            SKU: <strong><?= esc($product['sku'] ?? 'N/A') ?></strong>
                        </li>
                        <li>
                            Category: <strong><a href="<?= base_url('shop?category=' . ($product['category_slug'] ?? 'all')) ?>" class="product-category"><?= esc($product['category_name'] ?? 'General') ?></a></strong>
                        </li>
                        <li>
                            Availability:
                            <?php if (($product['stock_quantity'] ?? 0) > 0): ?>
                                <span class="badge badge-success px-2 py-1">In Stock (<?= esc($product['stock_quantity']) ?> available)</span>
                            <?php else: ?>
                                <span class="badge badge-danger px-2 py-1">Out of Stock</span>
                            <?php endif; ?>
                        </li>
                    </ul>

                    <div class="product-action my-4 flex-wrap">
                        <?php
                            $waMessage = rawurlencode("Hi Kagzi Ventures, I would like to enquire about: " . $product['name'] . " (SKU: " . ($product['sku'] ?? 'N/A') . ")");
                            $mailSubject = rawurlencode("Product Enquiry: " . $product['name']);
                        ?>
                        <a href="https://wa.me/919753875213?text=<?= $waMessage ?>" target="_blank" class="btn btn-success btn-lg font-weight-bold mr-2 my-1 d-inline-flex align-items-center" style="background-color: #25D366; border-color: #25D366; font-size: 1.05rem; padding: 12px 24px; border-radius: 6px;">
                            <i class="fab fa-whatsapp mr-2" style="font-size: 1.4rem;"></i> Enquire on WhatsApp
                        </a>

                        <a href="mailto:info@kagziventures.com?subject=<?= $mailSubject ?>" class="btn btn-primary btn-lg font-weight-bold my-1 d-inline-flex align-items-center" style="font-size: 1.05rem; padding: 12px 24px; border-radius: 6px;">
                            <i class="fa fa-envelope mr-2"></i> Mail Enquiry
                        </a>
                    </div>

                    <hr class="divider mb-1">

                    <div class="product-single-share mb-3">
                        <label class="sr-only">Share:</label>
                        <div class="social-icons mr-2">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                            <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details Tabs -->
        <div class="product-single-tabs mt-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-tab-more-info" data-toggle="tab" href="#product-more-info-content" role="tab" aria-controls="product-more-info-content" aria-selected="false">Technical Specifications</a>
                </li>
                <?php if (!empty($product['video'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-video" data-toggle="tab" href="#product-video-content" role="tab" aria-controls="product-video-content" aria-selected="false"><i class="fa fa-play-circle text-danger mr-1"></i> Product Video</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (5)</a>
                </li>
            </ul>

            <div class="tab-content p-4 border border-top-0 rounded-bottom bg-white">
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                    <div class="product-desc-content">
                        <p><?= nl2br(esc($product['description'] ?? 'No detailed description available.')) ?></p>
                    </div>
                </div>

                <div class="tab-pane fade" id="product-more-info-content" role="tabpanel" aria-labelledby="product-tab-more-info">
                    <div class="product-single-filter mb-2">
                        <?php if (!empty($product['specifications'])): ?>
                            <table class="table table-striped font2">
                                <tbody>
                                    <?php
                                    $specLines = explode("\n", $product['specifications']);
                                    foreach ($specLines as $sLine):
                                        $parts = explode(':', $sLine, 2);
                                        if (count($parts) === 2):
                                    ?>
                                        <tr>
                                            <th style="width: 250px;"><?= esc(trim($parts[0])) ?></th>
                                            <td><?= esc(trim($parts[1])) ?></td>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="2"><?= esc(trim($sLine)) ?></td>
                                        </tr>
                                    <?php
                                        endif;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p class="text-muted mb-0">Standard specifications apply.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (!empty($product['video'])): ?>
                    <div class="tab-pane fade" id="product-video-content" role="tabpanel" aria-labelledby="product-tab-video">
                        <div class="product-video-tab-content text-center py-3">
                            <h4 class="font-weight-bold text-dark mb-3"><i class="fa fa-play-circle text-danger mr-2"></i>Product Demonstration Video</h4>
                            <?php if (filter_var($product['video'], FILTER_VALIDATE_URL) && (strpos($product['video'], 'youtube.com') !== false || strpos($product['video'], 'youtu.be') !== false)): ?>
                                <?php 
                                    preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w-]{11})/', $product['video'], $matches);
                                    $ytId = $matches[1] ?? '';
                                ?>
                                <?php if ($ytId): ?>
                                    <div class="embed-responsive embed-responsive-16by9 rounded shadow-sm mx-auto" style="max-width: 720px;">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $ytId ?>" allowfullscreen></iframe>
                                    </div>
                                <?php else: ?>
                                    <video controls class="w-100 rounded shadow-sm mx-auto" style="max-width: 720px; max-height: 420px;">
                                        <source src="<?= esc($product['video']) ?>">
                                    </video>
                                <?php endif; ?>
                            <?php else: ?>
                                <video controls class="w-100 rounded shadow-sm mx-auto" style="max-width: 720px; max-height: 420px;" poster="<?= base_url($product['main_image']) ?>">
                                    <source src="<?= base_url($product['video']) ?>">
                                    Your browser does not support HTML5 video.
                                </video>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                    <div class="product-reviews-content">
                        <h3 class="reviews-title font2 mb-3">5 Reviews for <?= esc($product['name']) ?></h3>
                        <div class="comment-list">
                            <div class="comment-container mb-3 p-3 bg-light rounded">
                                <div class="comment-avatar font-weight-bold mb-1">
                                    <i class="icon-user-2 mr-1"></i> Alex Johnson
                                    <span class="text-warning ml-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                                </div>
                                <div class="comment-text">
                                    <p class="mb-0">Excellent quality product! Super fast delivery from Kagzi Ventures.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        <?php if (!empty($relatedProducts)): ?>
            <div class="products-section pt-5 pb-5">
                <h2 class="section-title text-uppercase font2 mb-4">Related Products</h2>

                <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                    <?php foreach ($relatedProducts as $rel): ?>
                        <div class="product-default inner-quickview inner-icon bg-white p-2 border rounded">
                            <figure>
                                <a href="<?= base_url('product/' . $rel['slug']) ?>">
                                    <img src="<?= base_url($rel['main_image']) ?>" alt="<?= esc($rel['name']) ?>" style="height: 180px; object-fit: contain; width: 100%;">
                                </a>
                            </figure>
                            <div class="product-details text-center">
                                <h3 class="product-title">
                                    <a href="<?= base_url('product/' . $rel['slug']) ?>"><?= esc($rel['name']) ?></a>
                                </h3>
                                <div class="price-box my-1">
                                    <span class="product-price font-weight-bold text-dark">₹<?= number_format($rel['sale_price'] ?? $rel['price'], 2) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>
<?= $this->endSection() ?>
