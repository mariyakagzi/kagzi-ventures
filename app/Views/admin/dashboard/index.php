<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>
<!-- Stats Cards Row -->
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card card-dash p-4 border-left-primary" style="border-left: 4px solid #1D5EB8;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted text-uppercase small font-weight-bold">Total Products</span>
                    <h2 class="mb-0 mt-2 font-weight-bold text-dark"><?= esc($totalProducts) ?></h2>
                </div>
                <div class="bg-light p-3 rounded-circle text-primary">
                    <i class="fa fa-box-open fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card card-dash p-4" style="border-left: 4px solid #28a745;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted text-uppercase small font-weight-bold">Active Categories</span>
                    <h2 class="mb-0 mt-2 font-weight-bold text-dark"><?= esc($totalCategories) ?></h2>
                </div>
                <div class="bg-light p-3 rounded-circle text-success">
                    <i class="fa fa-tags fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card card-dash p-4" style="border-left: 4px solid #ffc107;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted text-uppercase small font-weight-bold">Featured Products</span>
                    <h2 class="mb-0 mt-2 font-weight-bold text-dark"><?= esc($featuredCount) ?></h2>
                </div>
                <div class="bg-light p-3 rounded-circle text-warning">
                    <i class="fa fa-star fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Action & Recent Products Table -->
<div class="card card-dash p-4 mt-2">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h5 class="font-weight-bold mb-0 text-dark">Recent Products</h5>
        <div>
            <a href="<?= base_url('admin/products/create') ?>" class="btn btn-primary btn-sm font-weight-semibold">
                <i class="fa fa-plus mr-1"></i> Add Product
            </a>
            <a href="<?= base_url('admin/categories/create') ?>" class="btn btn-outline-secondary btn-sm ml-2 font-weight-semibold">
                <i class="fa fa-plus mr-1"></i> Add Category
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="thead-light">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($recentProducts)): ?>
                    <?php foreach ($recentProducts as $p): ?>
                        <tr>
                            <td>
                                <img src="<?= base_url($p['main_image']) ?>" alt="Product" style="width: 45px; height: 45px; object-fit: contain;" class="rounded border p-1">
                            </td>
                            <td class="font-weight-bold"><?= esc($p['name']) ?></td>
                            <td><span class="badge badge-secondary px-2 py-1"><?= esc($p['category_name'] ?? 'Uncategorized') ?></span></td>
                            <td>
                                <?php if ($p['sale_price']): ?>
                                    <span class="text-success font-weight-bold">₹<?= number_format($p['sale_price'], 2) ?></span>
                                    <small class="text-muted" style="text-decoration: line-through;">₹<?= number_format($p['price'], 2) ?></small>
                                <?php else: ?>
                                    <span class="font-weight-bold">₹<?= number_format($p['price'], 2) ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($p['stock_quantity'] > 0): ?>
                                    <span class="badge badge-success"><?= $p['stock_quantity'] ?> in stock</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Out of stock</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($p['status'] == 1): ?>
                                    <span class="badge badge-primary">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-secondary">Disabled</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-right">
                                <a href="<?= base_url('admin/products/edit/' . $p['id']) ?>" class="btn btn-sm btn-outline-info" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="<?= base_url('product/' . $p['slug']) ?>" class="btn btn-sm btn-outline-secondary" target="_blank" title="View on Site">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No products found. Add your first product!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
