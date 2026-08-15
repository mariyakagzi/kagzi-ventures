<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>
<div class="card card-dash p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h5 class="font-weight-bold mb-0 text-dark">Edit Product: <?= esc($product['name']) ?></h5>
        <a href="<?= base_url('admin/products') ?>" class="btn btn-outline-secondary btn-sm">
            <i class="fa fa-arrow-left mr-1"></i> Back to Products
        </a>
    </div>

    <form action="<?= base_url('admin/products/update/' . $product['id']) ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="font-weight-bold text-dark">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="<?= esc($product['name']) ?>" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Category <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-control" required>
                                <option value="">-- Select Category --</option>
                                <?php if (!empty($categories)): ?>
                                    <?php foreach ($categories as $cat): ?>
                                        <option value="<?= $cat['id'] ?>" <?= ($cat['id'] == $product['category_id']) ? 'selected' : '' ?>><?= esc($cat['name']) ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">SKU Code</label>
                            <input type="text" name="sku" class="form-control" value="<?= esc($product['sku'] ?? '') ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Regular Price ($) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="price" class="form-control" value="<?= esc($product['price']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Sale Price ($)</label>
                            <input type="number" step="0.01" name="sale_price" class="form-control" value="<?= esc($product['sale_price'] ?? '') ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Stock Quantity <span class="text-danger">*</span></label>
                            <input type="number" name="stock_quantity" class="form-control" value="<?= esc($product['stock_quantity']) ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold text-dark">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="2"><?= esc($product['short_description'] ?? '') ?></textarea>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold text-dark">Key Features / Highlights (One per line)</label>
                    <textarea name="features" class="form-control" rows="4" placeholder="Enter key features, one per line..."><?= esc($product['features'] ?? '') ?></textarea>
                    <small class="text-muted">Enter product highlights. Each line will be rendered as a bullet point on the product page.</small>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold text-dark">Technical Specifications</label>
                    <textarea name="specifications" class="form-control" rows="4" placeholder="Enter technical specifications..."><?= esc($product['specifications'] ?? '') ?></textarea>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold text-dark">Full Description</label>
                    <textarea name="description" class="form-control" rows="5"><?= esc($product['description'] ?? '') ?></textarea>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 bg-light border-0 mb-4">
                    <label class="font-weight-bold text-dark">Current Product Image</label>
                    <div class="mb-3 text-center bg-white p-2 border rounded">
                        <img src="<?= base_url($product['main_image']) ?>" alt="Current Image" style="max-height: 140px; object-fit: contain;">
                    </div>
                    <label class="font-weight-bold text-dark">Upload New Image</label>
                    <input type="file" name="main_image" class="form-control-file" accept="image/*">
                    <small class="text-muted mt-1 d-block">Leave blank to keep existing image</small>
                </div>

                <div class="card p-3 bg-light border-0 mb-4">
                    <label class="font-weight-bold text-dark">Publish Settings</label>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" name="featured" class="custom-control-input" id="featuredCheck" value="1" <?= ($product['featured'] == 1) ? 'checked' : '' ?>>
                        <label class="custom-control-label font-weight-semibold" for="featuredCheck">Mark as Featured Product</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" name="is_trending" class="custom-control-input" id="trendingCheck" value="1" <?= (($product['is_trending'] ?? 0) == 1) ? 'checked' : '' ?>>
                        <label class="custom-control-label font-weight-semibold" for="trendingCheck">Mark as Trending Product</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="status" class="custom-control-input" id="statusCheck" value="1" <?= ($product['status'] == 1) ? 'checked' : '' ?>>
                        <label class="custom-control-label font-weight-semibold" for="statusCheck">Active (Visible on Shop)</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-lg font-weight-bold">
                    <i class="fa fa-save mr-1"></i> Update Product
                </button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
