<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>
<div class="card card-dash p-4" style="max-width: 700px;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h5 class="font-weight-bold mb-0 text-dark">Add New Category</h5>
        <a href="<?= base_url('admin/categories') ?>" class="btn btn-outline-secondary btn-sm">
            <i class="fa fa-arrow-left mr-1"></i> Back to Categories
        </a>
    </div>

    <form action="<?= base_url('admin/categories/store') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="font-weight-bold text-dark">Category Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Office Stationery" required>
        </div>

        <div class="form-group">
            <div class="d-flex align-items-center justify-content-between mb-1">
                <label class="font-weight-bold text-dark mb-0">Description</label>
                <button type="button" class="btn btn-xs btn-outline-primary font-weight-bold btn-ai-cat-gen">
                    <i class="fa fa-magic mr-1"></i> Generate with AI
                </button>
            </div>
            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Brief summary of category items..."></textarea>
        </div>

        <div class="form-group">
            <label class="font-weight-bold text-dark">Category Image</label>
            <input type="file" name="image" class="form-control-file" accept="image/*">
        </div>

        <div class="custom-control custom-checkbox my-2">
            <input type="checkbox" name="show_on_home" class="custom-control-input" id="showHomeCheckCat" value="1">
            <label class="custom-control-label font-weight-bold text-primary" for="showHomeCheckCat"><i class="fa fa-home mr-1"></i> Display Category Section on Home Page</label>
        </div>

        <div class="custom-control custom-checkbox my-2">
            <input type="checkbox" name="status" class="custom-control-input" id="statusCheckCat" value="1" checked>
            <label class="custom-control-label font-weight-semibold" for="statusCheckCat">Active (Visible in Menus)</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block font-weight-bold mt-4">
            <i class="fa fa-save mr-1"></i> Save Category
        </button>
    </form>
</div>
<?= $this->endSection() ?>
