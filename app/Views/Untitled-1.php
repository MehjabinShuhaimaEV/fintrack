 filter
 
 
 <!-- <div class="filter-card">

            <form id="filterForm" action="<?= base_url('/income_listfilter') ?>" method="post">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="searchInput" class="form-label">
                            <i class="bi bi-search"></i> Search
                        </label>
                        <input type="text" class="form-control" id="searchInput" name="search"
                            placeholder="Search by voucher, category, remarks..."
                            value="<?= isset($_GET['search']) ? esc($_GET['search']) : '' ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="dateFrom" class="form-label">
                            <i class="bi bi-calendar-event"></i> Date From
                        </label>
                        <input type="date" class="form-control" id="dateFrom" name="date_from"
                            value="<?= isset($_GET['date_from']) ? esc($_GET['date_from']) : '' ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="dateTo" class="form-label">
                            <i class="bi bi-calendar-check"></i> Date To
                        </label>
                        <input type="date" class="form-control" id="dateTo" name="date_to"
                            value="<?= isset($_GET['date_to']) ? esc($_GET['date_to']) : '' ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="categoryFilter" class="form-label">
                            <i class="bi bi-tag"></i> Category
                        </label>
                        <select class="form-select" id="categoryFilter" name="category">
                            <option value="">All Categories</option>
                            <!-- PHP: Loop through categories -->
                           
                            <?php if (isset($categories) && !empty($categories)): ?>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat['id'] ?>" <?= (isset($_GET['category']) && $_GET['category'] == $cat['id']) ? 'selected' : '' ?>>
                                        <?= esc($cat['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-primary flex-grow-1">
                            <i class="bi bi-search"></i> Filter
                        </button>
                        <a href="<?= base_url('income_list') ?>" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div> -->
        filter






<!-- income table=-=-=-=-=-=-=-=-=-=-=- -->

<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        /* padding: 20px; */
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(138, 0, 0, 0.1);
        overflow: hidden;
    }

    .header {
        /* border: 1px solid red; */
        border-radius: 12px;

        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        margin: 10px;
        text-align: center;
    }

    .header h1 {
        font-size: 2em;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .header p {
        opacity: 0.9;
    }

    .controls {
        padding: 20px 30px;
        background: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .add-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
        font-weight: 600;
    }

    .add-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .summary {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .summary-item {
        text-align: center;
    }

    .summary-label {
        font-size: 12px;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .summary-value {
        font-size: 20px;
        font-weight: bold;
        color: #28a745;
        margin-top: 5px;
    }

    .table-container {
        width: 100%;
        /* padding: 30px; */
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: #f8f9fa;
    }

    th {
        padding: 15px;
        text-align: center;
        font-weight: 600;
        color: #000000ff;
        border-bottom: 2px solid #dee2e6;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
    }

    td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #e9ecef;
    }

    tbody tr {
        transition: background-color 0.2s;
    }

    tbody tr:hover {
        background-color: #f8f9fa;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-received {
        background: #d4edda;
        color: #155724;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .actions {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 12px;
        transition: all 0.2s;
    }

    .edit-btn {
        background: #e7f3ff;
        color: #0066cc;
    }

    .edit-btn:hover {
        background: #cce5ff;
    }

    .delete-btn {
        background: #ffe5e5;
        color: #cc0000;
    }

    .delete-btn:hover {
        background: #ffcccc;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }

    .content {
        margin-left: var(--sidebar-width);
        padding: 90px 30px 30px 30px;
        transition: margin-left 0.3s ease;
        min-height: 100vh;
    }

    .modal.active {
        display: flex;
    }

    .modal-content {
        background: white;
        padding: 30px;
        border-radius: 12px;
        width: 90%;
        max-width: 500px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #495057;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.2s;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #667eea;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
        margin-top: 25px;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s;
        font-weight: 600;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .btn-secondary {
        background: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background: #5a6268;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
    }

    .empty-state-icon {
        font-size: 64px;
        margin-bottom: 20px;
        opacity: 0.3;
    }

    .empty-state-text {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .amount-positive {
        color: #28a745;
        font-weight: 600;
    }

    .add-btn {
        text-decoration: none;
        color: white;
        display: inline-block;

    }

    .action-btn {
        text-decoration: none;
        /* color: white; */
        display: inline-block;

    }


    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 14px;
    }

    .modal {
        z-index: 1070 !important;
    }

    .modal-backdrop {
        z-index: 1060 !important;
    }
</style>


<div class="container">
    <div class="header">
        <h1>💰 Track and manage all your income sources</h1>
        <p></p>
    </div>
    <div class="controls">
        <a class="add-btn" href="<?= base_url('transaction') ?>">+ Add Income</a>
        <div class="summary">
            <div class="summary-item">
                <div class="summary-icon">💵</div>
                <div class="summary-label">Total Income</div>
                <div class="summary-value" id="totalIncome">$0.00</div>
            </div>
            <div class="summary-item">
                <div class="summary-icon">📊</div>
                <div class="summary-label">Entries</div>
                <div class="summary-value" id="totalEntries" style="color: #667eea;">0</div>
            </div>
        </div>
    </div>
    <div class="table-container">
        <table id="incomeTable">
            <thead>
                <tr>
                    <th>📅 Date</th>
                    <th>🧾 Voucher No</th>
                    <th>🏷️ Category</th>
                    <th>💰 Amount</th>
                    <th>💳 Payment Mode</th>
                    <th>✅ Status</th>
                    <th>📝 Remarks</th>
                    <th>⚙️ Actions</th>
                </tr>
            </thead>
            <tbody id="incomeTableBody">
                <?php if (!empty($incomeList)): ?>
                    <?php foreach ($incomeList as $row): ?>
                        <tr>
                            <td>
                                <div class="date-cell">
                                    <!-- <span class="date-icon">📆</span> -->
                                    <span> <?= date('d M Y', strtotime($row['date'])) ?>
                                    </span>
                                </div>
                            </td>

                            <td>
                                <div class="voucher-cell">
                                    <!-- <span class="voucher-icon">🔖</span> -->
                                    <span><?= $row['voucher_no'] ?></span>
                                </div>
                            </td>

                            <td>
                                <div class="category-cell">
                                    <!-- <span class="category-icon">📂</span> -->
                                    <span><?= $row['category_name'] ?? 'N/A' ?></span>
                                </div>
                            </td>

                            <td>
                                <div class="amount-cell">
                                    <!-- <span class="amount-icon">💵</span> -->
                                    <span><?= number_format($row['amount'], 2) ?></span>
                                </div>
                            </td>

                            <td>
                                <div class="payment-cell">
                                    <!-- <span class="payment-icon">💳</span> -->
                                    <span><?= esc($row['payment_mode_name']); ?></span>
                                </div>
                            </td>

                            <td>
                                <span class="status-badge <?= $row['status'] == 1 ? 'active' : 'inactive' ?>">
                                    <span class="status-icon"><?= $row['status'] == 1 ? '✓' : '✗' ?></span>
                                    <span><?= $row['status'] == 1 ? 'Active' : 'Inactive' ?></span>
                                </span>
                            </td>

                            <td>
                                <div class="remarks-cell" title="<?= esc($row['remarks']); ?>">
                                    <?= esc($row['remarks']); ?>
                                </div>
                            </td>

                            <td>
                                <div class="actions">
                                    <!--  -->
                                    <a href="<?= base_url('/view?id=' . $row['id']) ?>" class="action-btn edit-btn"
                                        data-id="<?= $row['id'] ?>">
                                        <span class="icon icon-edit"></span> View
                                    </a>

                                    <a href="<?= base_url('/edit?id=' . $row['id']) ?>" class="action-btn edit-btn"
                                        data-id="<?= $row['id'] ?>">
                                        <span class="icon icon-edit"></span> Edit
                                    </a>

                                    <!-- <button class="action-btn edit-btn" data-id="<?= $row['id'] ?>">
                                        <span class="icon icon-edit"></span> Edit
                                    </button> -->

                                    <button class="action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        data-id="<?= $row['id'] ?>" data-type="<?= $row['type'] ?>">
                                        Delete
                                    </button>


                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">
                                <div class="empty-state-icon">📊</div>
                                <div class="empty-state-text">No income entries yet</div>
                                <p>Click "Add Income" to get started tracking your income</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- modaaal  -->
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form action="<?= base_url('delete_transaction') ?>" method="post">
                    <input type="hidden" name="type" id="delete_type">
                    <input type="hidden" name="id" id="delete_id">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        Are you sure you want to delete this record?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>

        $(document).ready(function () {
            $(document).on('click', '.delete-btn', function () {
                var id = $(this).data('id');
                var type = $(this).data('type');
                // alert(id,type);

                $('#delete_id').val(id);
                $('#delete_type').val(type);
            });
        });




    </script>

    <?= $this->endSection() ?>








    <?= $this->extend('layout/main') ?>
    <?= $this->section('content') ?>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-primary">expense List</h4>
            <a href="<?= base_url('transaction/add') ?>" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Add New Income
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Voucher No</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Payment Mode</th>
                                <th>Remarks</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($incomeList)): ?>
                                <?php foreach ($incomeList as $i => $row): ?>
                                    <tr>
                                        <td><?= $i + 1 ?></td>

                                        <td>
                                            <span class="badge bg-secondary">
                                                <?= date('d M Y', strtotime($row['date'])) ?>
                                            </span>
                                        </td>

                                        <td><?= $row['voucher_no'] ?></td>

                                        <td>
                                            <span class="badge bg-info text-dark">
                                                <?= $row['category_name'] ?? 'N/A' ?>
                                            </span>
                                        </td>

                                        <td class="fw-bold text-success">
                                            <?= number_format($row['amount'], 2) ?>
                                        </td>

                                        <td>
                                            <span class="badge bg-dark">
                                                <?= ucfirst($row['payment_mode_name']) ?>
                                            </span>
                                        </td>

                                        <td><?= $row['remarks'] ?: '-' ?></td>

                                        <td>
                                            <?php if ($row['status'] == 1): ?>
                                                <span class="badge bg-success">Approved</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            <?php endif; ?>
                                        </td>

                                        <!-- ACTION BUTTONS -->
                                        <td class="text-center">
                                            <!-- View Button -->
                                            <a href="<?= base_url('transaction/view/' . $row['id']) ?>"
                                                class="btn btn-sm btn-outline-success me-1" title="View">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="<?= base_url('transaction/edit/' . $row['id']) ?>"
                                                class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <!-- Delete Button -->
                                            <a href="<?= base_url('transaction/delete/' . $row['id']) ?>"
                                                class="btn btn-sm btn-outline-danger" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this record?');">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="9" class="text-muted py-4">
                                        <i class="bi bi-file-earmark-text fs-1"></i><br>
                                        No income records found
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>




    <?= $this->include('layout/nav') ?>

    <div class="container" style="margin-top: 80px; max-width: 1250px;">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark mb-0">Add Transactions</h3>

            <button id="addEntryBtn" class="btn btn-success shadow-sm px-3">
                <i class="bi bi-plus-lg me-1"></i> Add Entry
            </button>
        </div>

        <!-- Form Start -->
        <form action="<?= base_url('save_transaction') ?>" method="post">

            <div id="transactionContainer">

                <!-- Transaction Block -->
                <div class="transaction-block card shadow-sm border-0 rounded-4 p-4 mb-4">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="fw-semibold mb-0 text-primary">
                            Transaction <span class="block-number">1</span>
                        </h5>

                        <button type="button" class="btn btn-danger btn-sm remove-btn d-none">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>

                    <hr class="mt-0 mb-4">

                    <!-- Inputs -->
                    <div class="row g-4">

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Date</label>
                            <input type="date" name="date[]" class="form-control form-control-lg shadow-sm-sm" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Voucher Number</label>
                            <input type="text" name="voucher_no[]" class="form-control form-control-lg shadow-sm-sm"
                                required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Type</label>
                            <select name="type[]" class="form-select form-select-lg type-select shadow-sm-sm" required>
                                <option value="">Select Type</option>
                                <option value="1">Income</option>
                                <option value="2">Expense</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Category</label>
                            <select name="category[]" class="form-select form-select-lg category-select shadow-sm-sm"
                                required>
                                <option value="">Select Category</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Amount</label>
                            <input type="number" name="amount[]" class="form-control form-control-lg shadow-sm-sm"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Mode of Payment</label>
                            <select name="payment_mode[]" class="form-select form-select-lg shadow-sm-sm" required>
                                <option value="">Select Payment Mode</option>
                                <option value="cash">Cash</option>
                                <option value="card">Card</option>
                                <option value="upi">UPI</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Remarks</label>
                            <textarea name="remarks[]" class="form-control form-control-lg shadow-sm-sm"
                                rows="1"></textarea>
                        </div>

                    </div>

                </div>
                <!-- END BLOCK -->

            </div>

            <!-- Save Button -->
            <div class="text-end mt-4">
                <button class="btn btn-primary btn-lg px-4 shadow-sm">
                    <i class="bi bi-save me-1"></i> Save All Transactions
                </button>
            </div>

        </form>
        <!-- Form End -->

    </div>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- JS for cloning -->
    <script>
        const container = document.getElementById("transactionContainer");
        const addBtn = document.getElementById("addEntryBtn");

        addBtn.addEventListener("click", () => {

            let clone = container.children[0].cloneNode(true);

            clone.querySelectorAll("input, textarea").forEach(el => el.value = "");
            clone.querySelector("select").selectedIndex = 0;

            clone.querySelector(".remove-btn").classList.remove("d-none");

            container.appendChild(clone);
            updateBlockNumbers();
        });

        container.addEventListener("click", (e) => {
            if (e.target.closest(".remove-btn")) {
                e.target.closest(".transaction-block").remove();
                updateBlockNumbers();
            }
        });

        function updateBlockNumbers() {
            document.querySelectorAll(".block-number").forEach((el, index) => {
                el.textContent = index + 1;
            });
        }
    </script>


    <!-- AJAX Category Loader -->
    <script>
        $(document).on("change", ".type-select", function () {

            let typeId = $(this).val();
            let categoryDropdown = $(this).closest('.row').find('.category-select');

            categoryDropdown.html('<option>Loading...</option>');

            $.ajax({
                url: "<?= base_url('/get_categories') ?>",
                type: "POST",
                data: { type_id: typeId },
                dataType: "json",

                success: function (response) {
                    categoryDropdown.empty().append('<option value="">Select Category</option>');
                    response.forEach(cat => {
                        categoryDropdown.append(
                            `<option value="${cat.id}">${cat.name}</option>`
                        );
                    });
                }
            });

        });
    </script>

    <!-- Extra Styling -->
    <style>
        .shadow-sm-sm {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .transaction-block:hover {
            transform: translateY(-2px);
            transition: 0.2s ease-in-out;
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.08) !important;
        }
    </style>




























    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register | FinTrack</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <style>
            body {
                background: linear-gradient(135deg, #e6f2ff, #ffffff);
                font-family: "Poppins", sans-serif;
            }

            /* Flash Messages */
            .flash-container {
                position: fixed;
                top: 20px;
                left: 50%;
                transform: translateX(-50%);
                z-index: 2000;
                width: 420px;
                max-width: 90%;
            }

            .flash-msg {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 14px 18px;
                border-radius: 12px;
                color: #fff;
                font-size: 15px;
                font-weight: 500;
                box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.15);
                margin-bottom: 12px;
                animation: slideDown 0.4s ease-out;
                border-left: 6px solid;
            }

            .flash-msg.success {
                background: linear-gradient(135deg, #38c172, #2d995b);
                border-color: #1f7a45;
            }

            .flash-msg.error {
                background: linear-gradient(135deg, #e3342f, #cc1f1a);
                border-color: #a31313;
            }

            @keyframes slideDown {
                0% {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .register-wrapper {
                max-width: 900px;
                margin: 60px auto;
                padding: 20px;
            }

            .register-card {
                display: flex;
                background: #ffffff;
                border-radius: 18px;
                box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.12);
                overflow: hidden;
            }

            .register-left {
                flex: 1;
                padding: 45px 40px;
            }

            .register-right {
                flex: 1;
                background: #9e8edd;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 40px;
            }

            .register-right img {
                width: 85%;
                max-width: 330px;
                filter: drop-shadow(0px 6px 14px rgba(0, 0, 0, 0.2));
            }

            .register-title {
                font-weight: 800;
                font-size: 32px;
                color: #003d71;
            }

            .tagline {
                color: #555;
                font-size: 14px;
            }

            .form-control {
                height: 46px;
                border-radius: 10px;
            }

            .btn-primary {
                background-color: #0056b3;
                border-radius: 10px;
                height: 46px;
                font-weight: 600;
                border: none;
            }

            .password-wrapper {
                position: relative;
            }

            .password-wrapper input {
                padding-right: 40px;
            }

            .toggle-eye {
                margin-top: 14px;
                position: absolute;
                right: 12px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                color: #555;
            }

            @media (max-width: 768px) {
                .register-card {
                    flex-direction: column;
                }

                .register-right {
                    padding: 20px;
                }
            }
        </style>
    </head>

    <body>

        <!-- Flash Messages -->
        <div class="flash-container">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="flash-msg success">
                    <i class="bi bi-check-circle"></i>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="flash-msg error">
                    <i class="bi bi-exclamation-triangle"></i>
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>
        </div>

        <div class="register-wrapper">
            <div class="register-card">

                <!-- LEFT SIDE -->
                <div class="register-left">
                    <h2 class="register-title">Create your FinTrack Account</h2>
                    <p class="tagline mt-2 mb-4">Start managing your income & expenses with clarity.</p>

                    <form action="<?= base_url('/save') ?>" method="post" id="registerForm">

                        <div class="mb-3">
                            <label class="fw-semibold">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-3 password-wrapper">
                            <label class="fw-semibold">Password</label>
                            <input type="password" name="password" id="passwordField" class="form-control"
                                placeholder="Enter password" required>
                            <i class="bi bi-eye-slash toggle-eye" id="togglePassword"></i>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3 password-wrapper">
                            <label class="fw-semibold">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirmPasswordField"
                                class="form-control" placeholder="Re-enter password" required>
                            <i class="bi bi-eye-slash toggle-eye" id="toggleConfirmPassword"></i>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-2" id="submitBtn">
                            <i class="bi bi-person-plus"></i> Create Account
                        </button>

                        <div class="text-center mt-3">
                            <span>Already have an account?</span>
                            <a href="<?= base_url('/') ?>" style="text-decoration:none;">Login</a>
                        </div>

                    </form>

                </div>

                <!-- RIGHT IMAGE -->
                <div class="register-right">
                    <img src="<?= base_url('assets/images/login-bg.jpeg') ?>" alt="Finance Illustration">
                </div>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            $(document).ready(function () {
                const $form = $("#registerForm");
                const $nameField = $("input[name='name']");
                const $emailField = $("input[name='email']");
                const $passwordField = $("#passwordField");
                const $confirmPasswordField = $("#confirmPasswordField");
                const $submitBtn = $("#submitBtn");

                // Flash message function
                function showFlash(type, message) {
                    const $flash = $(`<div class="flash-msg ${type}">
                            <i class="bi ${type === 'success' ? 'bi-check-circle' : 'bi-exclamation-triangle'}"></i>
                            <span>${message}</span>
                          </div>`);
                    $(".flash-container").append($flash);
                    setTimeout(() => $flash.remove(), 4000);
                }

                function markInvalid($field) {
                    $field.addClass("is-invalid").removeClass("is-valid");
                }

                function markValid($field) {
                    $field.addClass("is-valid").removeClass("is-invalid");
                }

                function validateName() {
                    const name = $nameField.val().trim();
                    const regex = /^[A-Za-z ]{3,}$/;
                    if (!regex.test(name)) {
                        markInvalid($nameField);
                        return false;
                    }
                    markValid($nameField);
                    return true;
                }

                function validateEmail() {
                    const email = $emailField.val().trim();
                    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!regex.test(email)) {
                        markInvalid($emailField);
                        return false;
                    }
                    markValid($emailField);
                    return true;
                }

                // function validatePassword() {
                //     const pass = $passwordField.val();
                //     const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
                //     if (!regex.test(pass)) {
                //         markInvalid($passwordField);
                //         return false;
                //     }
                //     markValid($passwordField);
                //     return true;
                // }

                function validateConfirmPassword() {
                    const pass = $passwordField.val();
                    const confirm = $confirmPasswordField.val();
                    if (pass !== confirm || confirm.length === 0) {
                        markInvalid($confirmPasswordField);
                        return false;
                    }
                    markValid($confirmPasswordField);
                    return true;
                }

                // Real-time validation
                $nameField.on("keyup", validateName);
                $emailField.on("keyup", validateEmail);
                $passwordField.on("keyup", validatePassword);
                $confirmPasswordField.on("keyup", validateConfirmPassword);

                // Password toggle
                $("#togglePassword").click(function () {
                    const type = $passwordField.attr("type") === "password" ? "text" : "password";
                    $passwordField.attr("type", type);
                    $(this).toggleClass("bi-eye bi-eye-slash");
                });

                $("#toggleConfirmPassword").click(function () {
                    const type = $confirmPasswordField.attr("type") === "password" ? "text" : "password";
                    $confirmPasswordField.attr("type", type);
                    $(this).toggleClass("bi-eye bi-eye-slash");
                });

                // Form submit
                $form.submit(function (e) {
                    let valid = validateName() & validateEmail() & validatePassword() & validateConfirmPassword();

                    if (!valid) {
                        e.preventDefault();
                        showFlash("error", "Please fix the highlighted fields before submitting.");
                        return;
                    }

                    // Show loader
                    $submitBtn.prop("disabled", true).html('<span class="spinner-border spinner-border-sm"></span> Creating...');
                });
            });
        </script>


    </body>

    </html>