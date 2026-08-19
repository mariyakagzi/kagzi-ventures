<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>
<div class="card card-dash p-4" style="max-width: 700px;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h5 class="font-weight-bold mb-0 text-dark">Edit Category: <?= esc($category['name']) ?></h5>
        <a href="<?= base_url('admin/categories') ?>" class="btn btn-outline-secondary btn-sm">
            <i class="fa fa-arrow-left mr-1"></i> Back to Categories
        </a>
    </div>

    <form action="<?= base_url('admin/categories/update/' . $category['id']) ?>" method="post" enctype="multipart/form-data">
        <div class="card p-3 border-primary mb-4" style="background-color: #f0f7ff; border: 1px solid #1D5EB8 !important;">
            <label class="font-weight-bold text-primary mb-1 d-flex align-items-center">
                <i class="fa fa-robot mr-2" style="font-size: 1.2rem;"></i> Gemini AI Assistant Active
            </label>
            <small class="text-muted d-block">1-Click Category Description AI Generation is active. Click <strong>Generate with AI</strong> to auto-fill description.</small>
        </div>
        <div class="form-group">
            <label class="font-weight-bold text-dark">Category Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" value="<?= esc($category['name']) ?>" required>
        </div>

        <div class="form-group">
            <div class="d-flex align-items-center justify-content-between mb-1">
                <label class="font-weight-bold text-dark mb-0">Description</label>
                <button type="button" class="btn btn-xs btn-outline-primary font-weight-bold btn-ai-cat-gen">
                    <i class="fa fa-magic mr-1"></i> Generate with AI
                </button>
            </div>
            <textarea name="description" id="description" class="form-control" rows="3"><?= esc($category['description'] ?? '') ?></textarea>
        </div>

        <div class="form-group">
            <label class="font-weight-bold text-dark">Current Category Image</label>
            <div class="mb-2">
                <img src="<?= base_url($category['image'] ?? 'assets/images/demoes/demo1/cats/cat-1.jpg') ?>" alt="Category" style="max-height: 100px; object-fit: cover;" class="rounded border p-1">
            </div>
            <label class="font-weight-bold text-dark">Upload New Image</label>
            <input type="file" name="image" class="form-control-file" accept="image/*">
            <small class="text-muted">Leave empty to keep existing image</small>
        </div>

        <div class="custom-control custom-checkbox my-2">
            <input type="checkbox" name="show_on_home" class="custom-control-input" id="showHomeCheckCat" value="1" <?= (($category['show_on_home'] ?? 0) == 1) ? 'checked' : '' ?>>
            <label class="custom-control-label font-weight-bold text-primary" for="showHomeCheckCat"><i class="fa fa-home mr-1"></i> Display Category Section on Home Page</label>
        </div>

        <div class="custom-control custom-checkbox my-2">
            <input type="checkbox" name="status" class="custom-control-input" id="statusCheckCat" value="1" <?= ($category['status'] == 1) ? 'checked' : '' ?>>
            <label class="custom-control-label font-weight-semibold" for="statusCheckCat">Active (Visible in Menus)</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block font-weight-bold mt-4">
            <i class="fa fa-save mr-1"></i> Update Category
        </button>
    </form>
</div>
<?= $this->endSection() ?>
