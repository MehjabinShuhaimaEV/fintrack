<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Product</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">My Website</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="<?= base_url('/') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('product') ?>">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('about') ?>">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('services') ?>">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('contact') ?>">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- PRODUCT FORM -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add New Product</h2>

        <div class="card p-4 shadow-sm">

            <form action="<?=base_url('save_product') ?>" method="post" enctype="multipart/form-data">

                <!-- Product Name -->
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control" placeholder="Enter product name" required>
                </div>

                <!-- Product Price -->
                <div class="mb-3">
                    <label class="form-label">Product Price</label>
                    <input type="number" name="product_price" class="form-control" placeholder="Enter price" required>
                </div>

                <!-- Discount -->
                <div class="mb-3">
                    <label class="form-label">Discount (%)</label>
                    <input type="number" name="product_discount" class="form-control" placeholder="Enter discount">
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="product_category" class="form-control" required>
                        <option value="">Select category</option>
                        <option value="1">Electronics</option>
                        <option value="2">Fashion</option>
                        <option value="3">Grocery</option>
                        <option value="4">Home Appliances</option>
                        <option value="5">Furniture</option>
                    </select>
                </div>

                <!-- Stock Quantity -->
                <div class="mb-3">
                    <label class="form-label">Stock Quantity</label>
                    <input type="number" name="product_stock" class="form-control" placeholder="Enter stock quantity" required>
                </div>

                <!-- Product Image -->
                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" name="product_image" class="form-control">
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="product_status" class="form-control">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Product Description</label>
                    <textarea name="product_description" class="form-control" rows="4" placeholder="Enter description"></textarea>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('/') ?>" class="btn btn-secondary">Back</a>
                    <button class="btn btn-dark" type="submit">Submit Product</button>
                </div>

            </form>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
