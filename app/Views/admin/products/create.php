<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>
<div class="card card-dash p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h5 class="font-weight-bold mb-0 text-dark">Add New Product</h5>
        <a href="<?= base_url('admin/products') ?>" class="btn btn-outline-secondary btn-sm">
            <i class="fa fa-arrow-left mr-1"></i> Back to Products
        </a>
    </div>

    <form action="<?= base_url('admin/products/store') ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="font-weight-bold text-dark">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Premium Leather Laptop Bag" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Category <span class="text-danger">*</span></label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">-- Select Category --</option>
                                <?php if (!empty($categories)): ?>
                                    <?php foreach ($categories as $cat): ?>
                                        <option value="<?= $cat['id'] ?>"><?= esc($cat['name']) ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">SKU Code</label>
                            <input type="text" name="sku" class="form-control" placeholder="e.g. BAG-001">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Regular Price (₹) <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" name="price" class="form-control" placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Sale Price (₹)</label>
                                    <input type="number" step="0.01" name="sale_price" class="form-control" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Stock Quantity <span class="text-danger">*</span></label>
                            <input type="number" name="stock_quantity" class="form-control" value="50" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <label class="font-weight-bold text-dark mb-0">Short Description</label>
                        <button type="button" class="btn btn-xs btn-outline-primary font-weight-bold btn-ai-gen" data-field="short_description">
                            <i class="fa fa-magic mr-1"></i> Generate with AI
                        </button>
                    </div>
                    <textarea name="short_description" id="short_description" class="form-control" rows="2" placeholder="Brief summary of product features..."></textarea>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <label class="font-weight-bold text-dark mb-0">Key Features / Highlights</label>
                        <button type="button" class="btn btn-xs btn-outline-primary font-weight-bold btn-ai-gen" data-field="features">
                            <i class="fa fa-magic mr-1"></i> Generate with AI
                        </button>
                    </div>
                    <textarea name="features" id="features" class="form-control" rows="4" placeholder="• Active Noise Cancellation up to 35dB&#10;• 40-Hour Long Battery Life&#10;• Bluetooth 5.2 Wireless Connectivity"></textarea>
                    <small class="text-muted">Enter product highlights. Each line will be rendered as a bullet point on the product page.</small>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <label class="font-weight-bold text-dark mb-0">Technical Specifications</label>
                        <button type="button" class="btn btn-xs btn-outline-primary font-weight-bold btn-ai-gen" data-field="specifications">
                            <i class="fa fa-magic mr-1"></i> Generate with AI
                        </button>
                    </div>
                    <textarea name="specifications" id="specifications" class="form-control" rows="4" placeholder="Brand: Kagzi Audio&#10;Driver Size: 40mm&#10;Warranty: 1 Year Manufacturer Warranty"></textarea>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <label class="font-weight-bold text-dark mb-0">Full Description</label>
                        <button type="button" class="btn btn-xs btn-outline-primary font-weight-bold btn-ai-gen" data-field="description">
                            <i class="fa fa-magic mr-1"></i> Generate with AI
                        </button>
                    </div>
                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Detailed product specifications, materials, warranty info..."></textarea>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 bg-light border-0 mb-4">
                    <label class="font-weight-bold text-dark">Product Main Image</label>
                    <input type="file" name="main_image" class="form-control-file" accept="image/*">
                    <small class="text-muted mt-2 d-block">Recommended size: 600x600px (JPG, PNG, WEBP)</small>
                </div>

                <div class="card p-3 bg-light border-0 mb-4">
                    <label class="font-weight-bold text-dark"><i class="fa fa-video text-danger mr-1"></i> Product Video (.mp4)</label>
                    <input type="file" name="video" class="form-control-file mb-2" accept="video/mp4, .mp4">
                    <small class="text-muted d-block mb-2">Upload MP4 video file (.mp4 format recommended)</small>
                    <div class="form-group mb-0">
                        <input type="text" name="video_url" class="form-control form-control-sm" placeholder="Or enter MP4 Video URL / YouTube link">
                    </div>
                </div>

                <div class="card p-3 bg-light border-0 mb-4">
                    <label class="font-weight-bold text-dark">Publish Settings</label>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" name="featured" class="custom-control-input" id="featuredCheck" value="1">
                        <label class="custom-control-label font-weight-semibold" for="featuredCheck">Mark as Featured Product</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" name="is_trending" class="custom-control-input" id="trendingCheck" value="1" checked>
                        <label class="custom-control-label font-weight-semibold" for="trendingCheck">Mark as Trending Product</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" name="is_home_category" class="custom-control-input" id="homeCatCheck" value="1" checked>
                        <label class="custom-control-label font-weight-semibold text-primary" for="homeCatCheck"><i class="fa fa-home mr-1"></i> Display in Home Category Section</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" name="shitabi" class="custom-control-input" id="shitabiCheck" value="1">
                        <label class="custom-control-label font-weight-semibold text-success" for="shitabiCheck"><i class="fa fa-gift mr-1"></i> Mark as Shitabi Gift</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="status" class="custom-control-input" id="statusCheck" value="1" checked>
                        <label class="custom-control-label font-weight-semibold" for="statusCheck">Active (Visible on Shop)</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-lg font-weight-bold">
                    <i class="fa fa-save mr-1"></i> Save Product
                </button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
