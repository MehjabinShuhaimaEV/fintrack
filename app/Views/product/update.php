<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    .form-section-title {
        font-size: 17px;
        font-weight: 600;
        color: #444;
        border-left: 4px solid #000;
        padding-left: 10px;
        margin-bottom: 15px;
        margin-top: 25px;
    }

    .card {
        border-radius: 15px;
    }

    .btn-dark {
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 16px;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        height: 46px;
    }

    textarea.form-control {
        height: auto;
    }
</style>


<div class="container mt-3 mb-3">

    <h2 class="text-center fw-bold mb-4">
        <i class="bi bi-box-seam"></i> Edit Product
    </h2>

    <div class="card shadow p-4">


        <form action="<?= base_url('products/update') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?= $_GET['id'] ?>">
            

            
            <!-- Basic Info -->
            <div class="form-section-title">📝 Basic Information</div>

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="product_name"
                        value="<?= isset($product) ? esc($product['product_name']) : '' ?>" class="form-control"
                        required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                    <select name="product_category" class="form-select" required>
                        <option value="">Select Category</option>

                        <option value="1" <?= isset($product) && $product['category'] == 1 ? 'selected' : '' ?>>Electronics
                        </option>
                        <option value="2" <?= isset($product) && $product['category'] == 2 ? 'selected' : '' ?>>Fashion
                        </option>
                        <option value="3" <?= isset($product) && $product['category'] == 3 ? 'selected' : '' ?>>Grocery
                        </option>
                        <option value="4" <?= isset($product) && $product['category'] == 4 ? 'selected' : '' ?>>Home
                            Appliances</option>
                        <option value="5" <?= isset($product) && $product['category'] == 5 ? 'selected' : '' ?>>Furniture
                        </option>
                    </select>
                </div>


                <div class="col-md-6">
                    <label class="form-label fw-semibold">Brand</label>
                    <input type="text" name="product_brand" value="<?= isset($product) ? esc($product['brand']) : '' ?>"
                        class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Stock Quantity <span class="text-danger">*</span></label>
                    <input type="number" name="product_stock"
                        value="<?= isset($product) ? esc($product['stockqty']) : '' ?>" class="form-control" required>
                </div>
            </div>

            <!-- Pricing Section -->
            <div class="form-section-title">💵 Pricing & Tax</div>

            <div class="row g-4">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Price (₹) <span class="text-danger">*</span></label>
                    <input type="number" name="product_price"
                        value="<?= isset($product) ? esc($product['price']) : '' ?>" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Discount (%)</label>
                    <input type="number" value="<?= isset($product) ? esc($product['discount']) : '' ?>"
                        name="product_discount" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tax (%)</label>
                    <input type="number" value="<?= isset($product) ? esc($product['tax']) : '' ?>" name="product_tax"
                        class="form-control">
                </div>
            </div>

            <!-- Other Details -->
            <div class="form-section-title">📦 Additional Details</div>

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Weight (kg)</label>
                    <input type="text" value="<?= isset($product) ? esc($product['weight']) : '' ?> "
                        name="product_weight" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="product_status" value="<?= isset($product) ? esc($product['status']) : '' ?>"
                        class="form-select">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-semibold">Product Image</label>
                    <input type="file" value="<?= isset($product) ? esc($product['image']) : '' ?>" name="product_image"
                        class="form-control">
                </div>
            </div>

            <!-- Description -->
            <div class="form-section-title">🖊️ Product Description</div>

            <div class="mb-3">
                <textarea name="product_description" value="<?= isset($product) ? esc($product['discription']) : '' ?>"
                    class="form-control" rows="4"></textarea>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <a href="<?= base_url('/') ?>" class="btn btn-secondary px-4">
                    <i class="bi bi-arrow-left"></i> Back
                </a>

                <button class="btn btn-dark px-4">
                    <i class="bi bi-check-circle"></i> Submit Product
                </button>
            </div>

        </form>

    </div>
</div>

<?= $this->endSection() ?>