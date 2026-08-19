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

                        <?php
                        $galleryImages = array_merge([$product['main_image']], $extraImages ?? []);
                        $galleryImages = array_values(array_unique(array_filter($galleryImages)));
                        $hasMultipleImages = count($galleryImages) > 1;
                        ?>

                        <div class="product-single-image-wrapper text-center p-2 bg-white rounded border" style="border-radius: 12px !important;">
                            <img id="productMainImage" class="product-single-image rounded img-fluid" src="<?= base_url($galleryImages[0]) ?>" data-zoom-image="<?= base_url($galleryImages[0]) ?>" width="468" height="468" alt="<?= esc($product['name']) ?>" style="object-fit: contain; max-height: 468px; width: 100%;" />
                        </div>

                        <?php if ($hasMultipleImages): ?>
                            <div class="product-thumb-strip d-flex flex-wrap mt-3" style="gap: 10px;">
                                <?php foreach ($galleryImages as $tIdx => $tImg): ?>
                                    <div class="product-thumb-item<?= $tIdx === 0 ? ' active' : '' ?>" data-full="<?= base_url($tImg) ?>" onclick="kvSwapProductImage(this)" role="button" tabindex="0" aria-label="View image <?= $tIdx + 1 ?>" style="width: 68px; height: 68px; border: 2px solid <?= $tIdx === 0 ? '#1D5EB8' : '#E2E8F0' ?>; border-radius: 8px; overflow: hidden; cursor: pointer; padding: 3px; background: #fff; transition: border-color 0.2s;">
                                        <img src="<?= base_url($tImg) ?>" alt="<?= esc($product['name']) ?> thumbnail <?= $tIdx + 1 ?>" style="width: 100%; height: 100%; object-fit: contain; pointer-events: none;">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <script>
                                function kvSwapProductImage(el) {
                                    var full = el.getAttribute('data-full');
                                    var mainImg = document.getElementById('productMainImage');
                                    if (mainImg) {
                                        mainImg.src = full;
                                        mainImg.setAttribute('data-zoom-image', full);
                                    }
                                    document.querySelectorAll('.product-thumb-item').forEach(function (t) {
                                        t.style.borderColor = '#E2E8F0';
                                        t.classList.remove('active');
                                    });
                                    el.style.borderColor = '#1D5EB8';
                                    el.classList.add('active');
                                }
                            </script>
                        <?php endif; ?>
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
                        <p style="font-size: 1.15rem; line-height: 1.7; color: #334155; font-family: 'Albert Sans', sans-serif; font-weight: 400;"><?= esc($product['short_description'] ?? $product['description'] ?? 'High quality product available at Kagzi Ventures.') ?></p>
                    </div>

                    <!-- Enhanced Key Features & Highlights Section -->
                    <?php if (!empty($product['features'])): ?>
                        <div class="product-features-box p-4 rounded-lg mb-4 border" style="background: linear-gradient(135deg, #F8FAFC 0%, #EFF6FF 100%); border-left: 5px solid #1D5EB8 !important; border-color: #DBEAFE !important; border-radius: 14px; box-shadow: 0 6px 24px rgba(29, 94, 184, 0.08); padding: 24px !important;">
                            <div class="d-flex align-items-center mb-4 pb-2 border-bottom" style="border-bottom-color: rgba(219, 234, 254, 0.8) !important;">
                                <div class="feature-header-icon mr-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; min-width: 44px; border-radius: 12px; background: linear-gradient(135deg, #1D5EB8 0%, #0F346C 100%); color: #ffffff; border: 2px solid #C5A059; box-shadow: 0 4px 14px rgba(29, 94, 184, 0.35);">
                                    <i class="fas fa-layer-group text-warning" style="font-size: 18px;"></i>
                                </div>
                                <h5 class="font-weight-bold text-uppercase mb-0" style="color: #0F172A; font-family: 'Urbanist', sans-serif; font-size: 1.35rem; letter-spacing: 0.8px; font-weight: 800;">
                                    Key Features &amp; Highlights
                                </h5>
                            </div>

                            <div class="feature-items-list" style="display: flex; flex-direction: column; gap: 14px;">
                                <?php
                                $lines = explode("\n", $product['features']);
                                foreach ($lines as $line):
                                    $trimmed = trim($line);
                                    if (empty($trimmed)) continue;

                                    $title = '';
                                    $desc = '';

                                    // Parse **Title** - Description or **Title**: Description
                                    if (preg_match('/^\*\*(.*?)\*\*\s*[\-\:]\s*(.*)$/', $trimmed, $matches)) {
                                        $title = trim($matches[1]);
                                        $desc = trim($matches[2]);
                                    } elseif (preg_match('/^([^\-\:]+)\s*[\-\:]\s*(.*)$/', $trimmed, $matches) && strlen($matches[1]) < 45 && !str_contains($matches[1], '.')) {
                                        $title = trim($matches[1]);
                                        $desc = trim($matches[2]);
                                    } else {
                                        $desc = str_replace('**', '', $trimmed);
                                        $desc = ltrim($desc, '•-* ');
                                    }
                                ?>
                                    <div class="feature-item rounded d-flex align-items-start" style="background: rgba(255, 255, 255, 0.88); border: 1px solid rgba(219, 234, 254, 0.95); border-radius: 10px; padding: 14px 18px; transition: all 0.25s ease; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);">
                                        <div class="check-icon-badge mr-3 mt-1 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; min-width: 28px; border-radius: 50%; background: linear-gradient(135deg, #10B981 0%, #059669 100%); color: #ffffff; font-size: 13px; box-shadow: 0 3px 10px rgba(16, 185, 129, 0.35);">
                                            <i class="fas fa-check" style="font-weight: 900;"></i>
                                        </div>
                                        <div class="feature-content" style="font-size: 1.05rem; line-height: 1.6;">
                                            <?php if (!empty($title)): ?>
                                                <strong style="color: #0F172A; font-family: 'Urbanist', sans-serif; font-weight: 800; font-size: 1.15rem; display: inline-block; margin-right: 6px;"><?= esc($title) ?></strong>
                                                <span style="color: #64748b; font-weight: 600;" class="mr-1">&ndash;</span>
                                                <span style="color: #334155; font-family: 'Albert Sans', sans-serif; font-weight: 400; font-size: 1.05rem;"><?= esc($desc) ?></span>
                                            <?php else: ?>
                                                <span style="color: #334155; font-family: 'Albert Sans', sans-serif; font-weight: 400; font-size: 1.05rem;"><?= esc($desc) ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
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

                        <a href="mailto:info@kagziventures.in?subject=<?= $mailSubject ?>" class="btn btn-primary btn-lg font-weight-bold my-1 d-inline-flex align-items-center" style="font-size: 1.05rem; padding: 12px 24px; border-radius: 6px;">
                            <i class="fa fa-envelope mr-2"></i> Mail Enquiry
                        </a>
                    </div>

                    <hr class="divider mb-1">

                    <div class="product-single-share mb-3">
                        <label class="sr-only">Share:</label>
                        <div class="social-icons mr-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= rawurlencode(current_url()) ?>" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                            <a href="https://api.whatsapp.com/send?text=<?= rawurlencode('Check this out: ' . $product['name'] . ' - ' . current_url()) ?>" class="social-icon social-whatsapp fab fa-whatsapp" style="background-color: #25D366; color: white;" target="_blank" title="WhatsApp"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Product Details Tabs -->
        <style>
            .product-single-tabs .nav-tabs {
                border-bottom: 3px solid #BFDBFE !important;
                gap: 6px;
            }
            .product-single-tabs .nav-tabs .nav-link {
                font-family: 'Urbanist', sans-serif !important;
                font-size: 1.12rem !important;
                font-weight: 800 !important;
                color: #475569 !important;
                padding: 14px 26px !important;
                border-radius: 12px 12px 0 0 !important;
                border: 1px solid #E2E8F0 !important;
                border-bottom: none !important;
                background: #F8FAFC !important;
                transition: all 0.25s ease !important;
                display: inline-flex !important;
                align-items: center !important;
            }
            .product-single-tabs .nav-tabs .nav-link.active {
                color: #ffffff !important;
                background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%) !important;
                border-color: #1D5EB8 !important;
                box-shadow: 0 -4px 18px rgba(29, 94, 184, 0.25) !important;
            }
            .product-single-tabs .nav-tabs .nav-link:hover:not(.active) {
                color: #1D5EB8 !important;
                background: #EFF6FF !important;
            }
            .product-single-tabs .tab-content {
                border: 1px solid #DBEAFE !important;
                border-top: none !important;
                border-radius: 0 0 14px 14px !important;
                box-shadow: 0 8px 30px rgba(29, 94, 184, 0.05) !important;
                padding: 32px !important;
                background: #ffffff !important;
            }
            .spec-table th {
                font-family: 'Urbanist', sans-serif !important;
                font-weight: 800 !important;
                font-size: 1.05rem !important;
                color: #0F172A !important;
                background-color: #F8FAFC !important;
                border-right: 1px solid #E2E8F0 !important;
            }
            .spec-table td {
                font-family: 'Albert Sans', sans-serif !important;
                font-weight: 400 !important;
                font-size: 1.05rem !important;
                color: #334155 !important;
            }
        </style>

        <div class="product-single-tabs mt-5">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">
                        <i class="fas fa-align-left mr-2" style="font-size: 15px;"></i> Description
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-tab-more-info" data-toggle="tab" href="#product-more-info-content" role="tab" aria-controls="product-more-info-content" aria-selected="false">
                        <i class="fas fa-sliders-h mr-2" style="font-size: 15px;"></i> Technical Specifications
                    </a>
                </li>
                <?php if (!empty($product['video'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-video" data-toggle="tab" href="#product-video-content" role="tab" aria-controls="product-video-content" aria-selected="false">
                            <i class="fas fa-play-circle text-warning mr-2" style="font-size: 16px;"></i> Product Video
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">
                        <i class="fas fa-star text-warning mr-2" style="font-size: 15px;"></i> Reviews (5)
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <!-- Description Tab -->
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                    <div class="product-desc-content">
                        <?php
                            $rawDesc = $product['description'] ?? $product['short_description'] ?? 'High quality storage & utility product available at Kagzi Ventures.';
                            $lines = explode("\n", trim($rawDesc));
                            $inList = false;
                            $lineIndex = 0;
                        ?>
                        <div class="desc-body mb-4" style="font-size: 1.15rem; line-height: 1.8; color: #1E293B; font-family: 'Albert Sans', sans-serif; font-weight: 400;">
                            <?php foreach ($lines as $line): ?>
                                <?php 
                                    $trimmed = trim($line);
                                    if (empty($trimmed)) {
                                        if ($inList) { echo '</ul>'; $inList = false; }
                                        continue;
                                    }
                                    $lineIndex++;

                                    // Clean raw markdown bold tags for title detection
                                    $cleanText = str_replace('**', '', $trimmed);
                                    $cleanAlpha = preg_replace('/[^A-Za-z0-9]/', '', $cleanText);

                                    // Check if line is ALL CAPS heading (e.g., PRODUCT OVERVIEW, EXCEPTIONAL DESIGN CRAFTSMANSHIP)
                                    $isAllCapsHeading = (!empty($cleanAlpha) && strlen($cleanAlpha) >= 3 && strlen($cleanAlpha) <= 60 && ctype_upper($cleanAlpha));
                                    
                                    // Check if line starts with ### or starts/ends with ** or ends with : or is first line title
                                    $isHeading = $isAllCapsHeading 
                                                 || str_starts_with($trimmed, '###') 
                                                 || (str_starts_with($trimmed, '**') && str_ends_with($trimmed, '**') && strlen($trimmed) < 70)
                                                 || (strlen($trimmed) < 55 && str_ends_with($trimmed, ':') && !str_contains($trimmed, '.'))
                                                 || ($lineIndex === 1 && strlen($trimmed) < 90);

                                    if ($isHeading) {
                                        if ($inList) { echo '</ul>'; $inList = false; }

                                        $headingText = trim(str_replace(['###', '**', ':'], '', $trimmed));
                                        
                                        if ($lineIndex === 1) {
                                            // Main Title Banner
                                            echo '<h4 class="font-weight-bold mb-4 pb-2" style="font-family: \'Urbanist\', sans-serif; font-size: 1.5rem; color: #0F172A; font-weight: 800; border-bottom: 2px solid #BFDBFE; letter-spacing: 0.3px; line-height: 1.4;">' . esc($headingText) . '</h4>';
                                        } else {
                                            // Section Subheading Card
                                            echo '<div class="desc-heading-box mt-4 mb-3 p-3 rounded" style="background: linear-gradient(135deg, #F8FAFC 0%, #EFF6FF 100%); border-left: 5px solid #1D5EB8; border-radius: 8px; box-shadow: 0 2px 8px rgba(29, 94, 184, 0.05);">';
                                            echo '<h5 class="mb-0 font-weight-bold" style="font-family: \'Urbanist\', sans-serif; font-size: 1.3rem; color: #0F172A; font-weight: 800; letter-spacing: 0.6px; text-transform: uppercase;">' . esc($headingText) . '</h5>';
                                            echo '</div>';
                                        }
                                    } else {
                                        // Check if line is a Bullet item (starts with •, -, *, 1., etc.)
                                        $isBullet = preg_match('/^[\•\-\*\d\.]+\s*(.*)$/u', $trimmed, $bMatches);
                                        
                                        if ($isBullet) {
                                            $bulletContent = trim($bMatches[1]);
                                            if (!$inList) {
                                                echo '<ul class="desc-bullet-list my-3" style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 12px;">';
                                                $inList = true;
                                            }

                                            // Check if bullet content has Title - Description or Title: Description
                                            if (preg_match('/^(\*\*.*?\*\*|[^\-\:]+)\s*[\-\:]\s*(.*)$/', $bulletContent, $mParts) && strlen(str_replace('**', '', $mParts[1])) < 45) {
                                                $bTitle = trim(str_replace('**', '', $mParts[1]));
                                                $bDesc = trim(str_replace('**', '', $mParts[2]));
                                                echo '<li class="d-flex align-items-start p-3 rounded" style="background: #FAFAFC; border: 1px solid #F1F5F9; border-radius: 10px; font-size: 1.15rem; line-height: 1.75; color: #1E293B;">
                                                    <div class="mr-3 mt-1 d-flex align-items-center justify-content-center" style="width: 26px; height: 26px; min-width: 26px; border-radius: 50%; background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%); color: #ffffff; font-size: 12px; box-shadow: 0 3px 8px rgba(29, 94, 184, 0.3);">
                                                        <i class="fas fa-check" style="font-weight: 900;"></i>
                                                    </div>
                                                    <div>
                                                        <strong style="font-family: \'Urbanist\', sans-serif; font-size: 1.18rem; font-weight: 800; color: #0F172A; display: inline-block; margin-right: 6px;">' . esc($bTitle) . '</strong>
                                                        <span style="color: #64748b; font-weight: 600;" class="mr-1">&ndash;</span>
                                                        <span style="font-family: \'Albert Sans\', sans-serif; font-size: 1.15rem; font-weight: 400; color: #334155;">' . esc($bDesc) . '</span>
                                                    </div>
                                                </li>';
                                            } else {
                                                $cleanBText = preg_replace('/\*\*(.*?)\*\*/', '<strong style="color: #0F172A; font-family: \'Urbanist\', sans-serif; font-weight: 800;">$1</strong>', esc($bulletContent));
                                                echo '<li class="d-flex align-items-start p-3 rounded" style="background: #FAFAFC; border: 1px solid #F1F5F9; border-radius: 10px; font-size: 1.15rem; line-height: 1.75; color: #1E293B;">
                                                    <div class="mr-3 mt-1 d-flex align-items-center justify-content-center" style="width: 26px; height: 26px; min-width: 26px; border-radius: 50%; background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%); color: #ffffff; font-size: 12px; box-shadow: 0 3px 8px rgba(29, 94, 184, 0.3);">
                                                        <i class="fas fa-check" style="font-weight: 900;"></i>
                                                    </div>
                                                    <div style="font-family: \'Albert Sans\', sans-serif; font-size: 1.15rem; font-weight: 400; color: #334155;">' . $cleanBText . '</div>
                                                </li>';
                                            }
                                        } else {
                                            if ($inList) { echo '</ul>'; $inList = false; }

                                            // Check if normal paragraph contains Title - Description
                                            if (preg_match('/^(\*\*.*?\*\*|[^\-\:]+)\s*[\-\:]\s*(.*)$/', $trimmed, $mParts) && strlen(str_replace('**', '', $mParts[1])) < 45 && !str_contains($mParts[1], '.')) {
                                                $pTitle = trim(str_replace('**', '', $mParts[1]));
                                                $pDesc = trim(str_replace('**', '', $mParts[2]));
                                                echo '<p class="mb-3" style="font-size: 1.15rem; line-height: 1.8; color: #1E293B;">
                                                    <strong style="font-family: \'Urbanist\', sans-serif; font-size: 1.2rem; font-weight: 800; color: #0F172A; background: #EFF6FF; padding: 4px 12px; border-radius: 6px; border-left: 4px solid #1D5EB8; display: inline-block; margin-right: 8px;">' . esc($pTitle) . '</strong>
                                                    <span style="font-family: \'Albert Sans\', sans-serif; font-size: 1.15rem; font-weight: 400; color: #334155;">' . esc($pDesc) . '</span>
                                                </p>';
                                            } else {
                                                $parsedP = preg_replace('/\*\*(.*?)\*\*/', '<strong style="color: #0F172A; font-family: \'Urbanist\', sans-serif; font-weight: 800;">$1</strong>', esc($trimmed));
                                                echo '<p class="mb-3" style="font-size: 1.15rem; line-height: 1.8; color: #1E293B; font-family: \'Albert Sans\', sans-serif; font-weight: 400;">' . $parsedP . '</p>';
                                            }
                                        }
                                    }
                                ?>
                            <?php endforeach; ?>
                            <?php if ($inList) { echo '</ul>'; $inList = false; } ?>
                        </div>

                        <!-- Brand Quality & Value Cards -->
                        <div class="row mt-4 pt-3 border-top" style="border-top-color: #E2E8F0 !important;">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="p-3 rounded d-flex align-items-center" style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 10px;">
                                    <div class="mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; border-radius: 50%; background: #EFF6FF; color: #1D5EB8; font-size: 18px;">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 font-weight-bold" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1rem;">100% Quality Inspected</h6>
                                        <small class="text-muted">Built for long-lasting durability</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="p-3 rounded d-flex align-items-center" style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 10px;">
                                    <div class="mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; border-radius: 50%; background: #FEF3C7; color: #D97706; font-size: 18px;">
                                        <i class="fas fa-boxes"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 font-weight-bold" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1rem;">Smart Storage Utility</h6>
                                        <small class="text-muted">Effortless home organization</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 rounded d-flex align-items-center" style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 10px;">
                                    <div class="mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; border-radius: 50%; background: #ECFDF5; color: #059669; font-size: 18px;">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 font-weight-bold" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1rem;">Fast Pan-India Delivery</h6>
                                        <small class="text-muted">Direct to your doorstep</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technical Specifications Tab -->
                <div class="tab-pane fade" id="product-more-info-content" role="tabpanel" aria-labelledby="product-tab-more-info">
                    <div class="product-specs-content">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-sliders-h text-primary mr-2" style="font-size: 1.2rem;"></i>
                            <h5 class="mb-0 font-weight-bold" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.2rem;">Detailed Specifications</h5>
                        </div>

                        <?php if (!empty($product['specifications'])): ?>
                            <div class="table-responsive rounded border" style="border-color: #E2E8F0 !important;">
                                <table class="table table-bordered spec-table mb-0">
                                    <tbody>
                                        <?php
                                        $specLines = explode("\n", $product['specifications']);
                                        foreach ($specLines as $sLine):
                                            $trimmedS = trim($sLine);
                                            if (empty($trimmedS)) continue;

                                            $parts = explode(':', $trimmedS, 2);
                                            if (count($parts) === 2):
                                                $specKey = trim($parts[0]);
                                                $specKey = str_replace('**', '', $specKey);
                                                $specVal = trim($parts[1]);
                                                $specVal = str_replace('**', '', $specVal);
                                        ?>
                                            <tr>
                                                <th style="width: 280px; padding: 14px 18px; background-color: #F8FAFC;">
                                                    <i class="fas fa-check-circle text-primary mr-2" style="font-size: 13px;"></i>
                                                    <?= esc($specKey) ?>
                                                </th>
                                                <td style="padding: 14px 18px; color: #334155; font-size: 1.05rem;">
                                                    <?= esc($specVal) ?>
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="2" style="padding: 14px 18px; color: #334155; font-size: 1.05rem;">
                                                    <?= esc(str_replace('**', '', $trimmedS)) ?>
                                                </td>
                                            </tr>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive rounded border" style="border-color: #E2E8F0 !important;">
                                <table class="table table-bordered spec-table mb-0">
                                    <tbody>
                                        <tr>
                                            <th style="width: 280px; padding: 14px 18px; background-color: #F8FAFC;"><i class="fas fa-tag text-primary mr-2"></i> Brand</th>
                                            <td style="padding: 14px 18px;">Kagzi Ventures</td>
                                        </tr>
                                        <tr>
                                            <th style="padding: 14px 18px; background-color: #F8FAFC;"><i class="fas fa-box-open text-primary mr-2"></i> Product Category</th>
                                            <td style="padding: 14px 18px;"><?= esc($product['category_name'] ?? 'Storage & Organisers') ?></td>
                                        </tr>
                                        <tr>
                                            <th style="padding: 14px 18px; background-color: #F8FAFC;"><i class="fas fa-shield-alt text-primary mr-2"></i> Quality Standard</th>
                                            <td style="padding: 14px 18px;">100% Quality Inspected &amp; Premium Utility Grade</td>
                                        </tr>
                                        <tr>
                                            <th style="padding: 14px 18px; background-color: #F8FAFC;"><i class="fas fa-home text-primary mr-2"></i> Recommended Use</th>
                                            <td style="padding: 14px 18px;">Wardrobe, Closet, Travel, Gift Hampers &amp; Home Storage</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
