<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>
<div class="card card-dash p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h5 class="font-weight-bold mb-0 text-dark">All Categories (<?= count($categories) ?>)</h5>
        <a href="<?= base_url('admin/categories/create') ?>" class="btn btn-primary font-weight-semibold">
            <i class="fa fa-plus-circle mr-1"></i> Add New Category
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $cat): ?>
                        <tr>
                            <td>#<?= $cat['id'] ?></td>
                            <td>
                                <img src="<?= base_url($cat['image'] ?? 'assets/images/demoes/demo1/cats/cat-1.jpg') ?>" alt="Category" style="width: 45px; height: 45px; object-fit: cover;" class="rounded border">
                            </td>
                            <td><strong class="text-dark"><?= esc($cat['name']) ?></strong></td>
                            <td><code><?= esc($cat['slug']) ?></code></td>
                            <td><?= esc($cat['description'] ?? 'No description') ?></td>
                            <td>
                                <?php if ($cat['status'] == 1): ?>
                                    <span class="badge badge-success">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-secondary">Disabled</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-right">
                                <a href="<?= base_url('shop?category=' . $cat['slug']) ?>" class="btn btn-sm btn-outline-secondary" target="_blank" title="View in Shop">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="<?= base_url('admin/categories/edit/' . $cat['id']) ?>" class="btn btn-sm btn-outline-info" title="Edit">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="<?= base_url('admin/categories/delete/' . $cat['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this category?')" title="Delete">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted py-5">No categories found. Click "Add New Category" to create one.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
