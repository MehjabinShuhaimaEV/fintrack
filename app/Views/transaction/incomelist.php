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

    .filter-card {
        background: #ffffff;
        /* border: 1px solid #e2e8f0; */
        border-radius: 8px;
        padding: 15px 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-top: 10px;
        width: 100%;
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
                <div class="summary-value" id="totalIncome">
                </div>
            </div>

            <div class="summary-item">
                <div class="summary-icon">📊</div>
                <div class="summary-label">Entries</div>
                <div class="summary-value" id="totalEntries" style="color: #667eea;">0</div>
            </div>
        </div>
        <!-- Filter -->
        <form action="<?= base_url('income_listfilter') ?>" method="post" class="filter-form mb-4">
            <div class="row g-3 align-items-end">

                <!-- From Date -->
                <div class="col-md-3">
                    <label class="form-label">From Date</label>
                    <input type="date" name="date_from" class="form-control"
                        value="<?= esc($filters['date_from'] ?? '') ?>">
                </div>

                <!-- To Date -->
                <div class="col-md-3">
                    <label class="form-label">To Date</label>
                    <input type="date" name="date_to" class="form-control"
                        value="<?= esc($filters['date_to'] ?? '') ?>">
                </div>

                <!-- Category -->
                <div class="col-md-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= (!empty($filters['category']) && $filters['category'] == $cat['id']) ? 'selected' : '' ?>>
                                <?= esc($cat['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Search -->
                <div class="col-md-3">
                    <label class="form-label">Search</label>
                    <input type="text" name="search" class="form-control" placeholder="Voucher / Remarks / Amount"
                        value="<?= esc($filters['search'] ?? '') ?>">
                </div>

                <!-- Buttons -->
                <div class="col-md-12 text-end mt-3">
                    <button type="submit" class="btn btn-primary">
                        🔍 Filter
                    </button>
                    <a href="<?= base_url('income_list') ?>" class="btn btn-secondary">
                        ♻ Reset
                    </a>
                </div>

            </div>
        </form>



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
                                    <span> <?= date('d M Y', strtotime($row['transaction_date'])) ?>
                                    </span>
                                </div>
                            </td>

                            <td>
                                <div class="voucher-cell">
                                    <!-- <span class="voucher-icon">🔖</span> -->
                                    <span><?= $row['id'] ?></span>
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
                                <div class="remarks-cell" title="<?= esc($row['description']); ?>">
                                    <?= esc($row['description']); ?>
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
            //     function updateStatistics() {
            //     const rows = document.querySelectorAll('#incomeTableBody tr:not(:has(.empty-state))');
            //     let totalIncome = 0;
            //     let totalEntries = rows.length;

            //     rows.forEach(row => {
            //         const amountText = row.querySelector('.amount-cell')?.textContent || '$0.00';
            //         const amount = parseFloat(amountText.replace(/[$,]/g, ''));
            //         if (!isNaN(amount)) {
            //             totalIncome += amount;
            //         }
            //     });

            //     const avgIncome = totalEntries > 0 ? totalIncome / totalEntries : 0;

            //     document.getElementById('totalIncome').textContent = '$' + totalIncome.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            //     document.getElementById('totalEntries').textContent = totalEntries;
            //     document.getElementById('avgIncome').textContent = '$' + avgIncome.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            // }

            // // Client-side search filtering (for better UX before form submission)
            // document.getElementById('searchInput')?.addEventListener('input', function(e) {
            //     const searchTerm = e.target.value.toLowerCase();
            //     const rows = document.querySelectorAll('#incomeTableBody tr:not(:has(.empty-state))');

            //     rows.forEach(row => {
            //         const text = row.textContent.toLowerCase();
            //         row.style.display = text.includes(searchTerm) ? '' : 'none';
            //     });
            // });

            // // Initialize on page load
            // document.addEventListener('DOMContentLoaded', function() {
            //     updateStatistics();
            // });
        });




    </script>

    <?= $this->endSection() ?>
