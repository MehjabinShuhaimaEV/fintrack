<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<style>
     .flash-container {
            animation: fadeSlide 0.6s ease;
        }

        .flash-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            margin-bottom: 10px;
            border-left: 6px solid;
            backdrop-filter: blur(6px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            font-weight: 500;
            opacity: 0;
            animation: slideIn 0.5s forwards;
            /* margin-top: 50px; */
        }

        .flash-success {
            background-color: rgba(40, 167, 69, 0.15);
            border-color: #28a745;
            color: #000000ff;
        }

        .flash-error {
            background-color: rgba(220, 53, 69, 0.15);
            border-color: #dc3545;
            color: #842029;
        }

        .flash-close {
            cursor: pointer;
            opacity: 0.7;
            transition: 0.2s;
        }

        .flash-close:hover {
            opacity: 1;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            to {
                opacity: 1;
            }
        }

        /* Auto remove after 4 seconds */
        .flash-box.auto-hide {
            animation: slideIn 0.5s forwards, fadeOut 0.5s 4s forwards;
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                transform: translateY(-15px);
            }
        }
        </style>
<div class="flash-container position-fixed top-8 start-50 translate-middle-x mt-3" style="z-index: 1050; width: 400px; max-width: 90%;">

<?php if(session()->getFlashdata('success')): ?>
    <div class="flash-box flash-success d-flex align-items-center justify-content-between shadow-sm rounded-3 p-3 mb-2">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <span class="fw-medium"><?= session()->getFlashdata('success') ?></span>
        </div>
        <i class="bi bi-x-lg flash-close" onclick="this.parentElement.remove()"></i>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="flash-box flash-error d-flex align-items-center justify-content-between shadow-sm rounded-3 p-3 mb-2">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-exclamation-triangle-fill fs-5"></i>
            <span class="fw-medium"><?= session()->getFlashdata('error') ?></span>
        </div>
        <i class="bi bi-x-lg flash-close" onclick="this.parentElement.remove()"></i>
    </div>
<?php endif; ?>

</div>


<!-- Header with Navigation -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1"><?= $page_title ?? 'Products' ?></h4>
        <small class="text-muted">Manage all your stock and product details</small>
    </div>

    <div class="btn-group">
        <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-secondary">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="<?= base_url('/add') ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Product
        </a>
    </div>
</div>

<!-- Products Card -->
<!-- <div class="card border-0 shadow-lg rounded-4 overflow-hidden"> -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden p-4">


    <!-- Card Header -->
    <div class="card-header bg-light py-3 border-0"
        style="background: rgba(255,255,255,0.7); backdrop-filter: blur(12px);">
        <h6 class="fw-bold m-0"><i class="bi bi-box-seam"></i> Product List</h6>
    </div>
    <!-- Search & Filter Section -->
    <div class="card p-3 mb-4 shadow-sm border-0 rounded-4 mt-3">

        <form method="get" action="<?= base_url('/products') ?>">

            <div class="row g-3  align-items-end">

                <!-- Product Name -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Product Name</label>
                    <input type="text" name="product_name" class="form-control" placeholder="Search product..."
                        value="<?= esc($_GET['product_name'] ?? '') ?>">
                </div>

                <!-- Category -->
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Category</label>
                    <select name="product_category" class="form-select">
                        <option value="">All</option>
                        <option value="1" <?= (($_GET['product_category'] ?? '') == 1) ? 'selected' : '' ?>>Electronics
                        </option>
                        <option value="2" <?= (($_GET['product_category'] ?? '') == 2) ? 'selected' : '' ?>>Fashion
                        </option>
                        <option value="3" <?= (($_GET['product_category'] ?? '') == 3) ? 'selected' : '' ?>>Grocery
                        </option>
                        <option value="4" <?= (($_GET['product_category'] ?? '') == 4) ? 'selected' : '' ?>>Home Appliances
                        </option>
                        <option value="5" <?= (($_GET['product_category'] ?? '') == 5) ? 'selected' : '' ?>>Furniture
                        </option>
                    </select>
                </div>

                <!-- Brand -->
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Brand</label>
                    <input type="text" name="product_brand" class="form-control" placeholder="Brand..."
                        value="<?= esc($_GET['product_brand'] ?? '') ?>">
                </div>

                <!-- Stock -->
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Min Stock</label>
                    <input type="number" name="product_stock" class="form-control" placeholder="Min stock"
                        value="<?= esc($_GET['product_stock'] ?? '') ?>">
                </div>

                <!-- Status -->
                <div class="col-md-2">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="product_status" class="form-select">
                        <option value="">All</option>
                        <option value="1" <?= (($_GET['product_status'] ?? '') == '0') ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= (($_GET['product_status'] ?? '') == '1') ? 'selected' : '' ?>>Inactive
                        </option>
                    </select>
                </div>

                <div class="col-md-1">
                    <button class="btn btn-primary w-100">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

            </div>

        </form>

    </div>

    <!-- Table Section -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Stock Qty</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $index => $product): ?>
                            <tr>
                                <!-- <td class="fw-semibold"><?= $index + 1 ?></td> -->
                                 <td class="fw-semibold ps-3 border"><?= $index + 1 ?></td>

                                <td class="fw-semibold text-dark"><?= esc($product['product_name']) ?></td>
                                <td><?= ($product['category_name'])?$product['category_name']:'unknown' ?></td>
                                <td><?= esc($product['brand']) ?></td>
                                <td>
                                    <?php if ($product['stockqty'] <= 10): ?>
                                        <span class="badge bg-danger"><?= esc($product['stockqty']) ?> Low</span>
                                    <?php else: ?>
                                        <?= esc($product['stockqty']) ?>
                                    <?php endif; ?>
                                </td>
                                <td class="fw-bold text-primary">₹<?= number_format($product['price'], 2) ?></td>

                                <td>
                                    <?php if ($product['status'] == 1): ?>
                                        <span class="badge bg-success px-3 py-2">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary px-3 py-2">Inactive</span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <a href="<?= base_url('products/update?id=' . $product['id']) ?>"
                                        class="btn btn-sm btn-warning rounded-pill me-1">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>

                                    <a href="<?= base_url('products/delete?id=' . $product['id']) ?>"
                                        class="btn btn-sm btn-danger rounded-pill"
                                        onclick="return confirm('Are you sure you want to delete this product?');">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                <i class="bi bi-folder2-open fs-2 d-block mb-2"></i>
                                No products found.
                            </td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-end mt-3">
    <nav>
        <ul class="pagination pagination-sm">
            <li class="page-item disabled"><a class="page-link">Prev</a></li>
            <li class="page-item active"><a class="page-link">1</a></li>
            <li class="page-item"><a class="page-link">2</a></li>
            <li class="page-item"><a class="page-link">Next</a></li>
        </ul>
    </nav>
</div>

<!-- Custom Styling -->
<style>
    .table-hover tbody tr:hover {
        background: rgba(0, 0, 0, 0.04);
        transition: 0.2s;
    }

    .btn-group .btn {
        border-radius: 8px;
    }

    .card {
        border-radius: 18px !important;
    }

    .table thead th {
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: .5px;
    }
</style>

<?= $this->endSection() ?>