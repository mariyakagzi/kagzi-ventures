<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>
<div class="card card-dash p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h5 class="font-weight-bold mb-0 text-dark">All Products (<?= count($products) ?>)</h5>
        <a href="<?= base_url('admin/products/create') ?>" class="btn btn-primary font-weight-semibold">
            <i class="fa fa-plus-circle mr-1"></i> Add New Product
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>SKU</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $p): ?>
                        <tr>
                            <td>#<?= $p['id'] ?></td>
                            <td>
                                <img src="<?= base_url($p['main_image']) ?>" alt="Thumbnail" style="width: 50px; height: 50px; object-fit: contain;" class="rounded border p-1">
                            </td>
                            <td>
                                <strong class="text-dark d-block"><?= esc($p['name']) ?></strong>
                                <small class="text-muted"><?= esc($p['slug']) ?></small>
                            </td>
                            <td><code><?= esc($p['sku'] ?? 'N/A') ?></code></td>
                            <td><span class="badge badge-secondary px-2 py-1"><?= esc($p['category_name'] ?? 'Uncategorized') ?></span></td>
                            <td>
                                <?php if ($p['sale_price']): ?>
                                    <span class="text-success font-weight-bold">$<?= number_format($p['sale_price'], 2) ?></span>
                                    <small class="text-muted" style="text-decoration: line-through;">$<?= number_format($p['price'], 2) ?></small>
                                <?php else: ?>
                                    <span class="font-weight-bold">$<?= number_format($p['price'], 2) ?></span>
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
                                <?php if ($p['featured'] == 1): ?>
                                    <span class="badge badge-warning text-dark"><i class="fa fa-star"></i> Featured</span>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
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
                                <a href="<?= base_url('product/' . $p['slug']) ?>" class="btn btn-sm btn-outline-secondary" target="_blank" title="Preview">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="<?= base_url('admin/products/edit/' . $p['id']) ?>" class="btn btn-sm btn-outline-info" title="Edit">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="<?= base_url('admin/products/delete/' . $p['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this product?')" title="Delete">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10" class="text-center text-muted py-5">No products found. Click "Add New Product" to create one.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
