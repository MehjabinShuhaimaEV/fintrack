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
        text-align: left;
        font-weight: 600;
        color: #495057;
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
    .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 8px;
    font-size: 14px;
}



</style>


<div class="container">
    <div class="header">
        <h1>💰 Track and manage all your expense sources</h1>
        <p></p>
    </div>
    <div class="controls">
        <a class="add-btn" href="<?= base_url('transaction') ?>">+ Add Expense</a>
        <div class="summary">
            <div class="summary-item">
                <div class="summary-icon">💵</div>
                <div class="summary-label">Total Expense</div>
                <div class="summary-value" id="totalExpense">$0.00</div>
            </div>
            <div class="summary-item">
                <div class="summary-icon">📊</div>
                <div class="summary-label">Entries</div>
                <div class="summary-value" id="totalEntries" style="color: #667eea;">0</div>
            </div>
        </div>
    </div>
    <div class="table-container">
        <table id="expenseTable">
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
            <tbody id="expenseTableBody">
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
                                     <a href="<?= base_url('/view?id=' . $row['id']) ?>" class="action-btn edit-btn"
                                        data-id="<?= $row['id'] ?>">
                                        <span class="icon icon-edit"></span> View
                                    </a>

                                    <a href="<?= base_url('/edit?id=' . $row['id']) ?>" class="action-btn edit-btn"
                                        data-id="<?= $row['id'] ?>">
                                        <span class="icon icon-edit"></span> Edit
                                    </a>

                                    
                                    <a href="<?= base_url('/delete?id=' . $row['id']) ?>" class="action-btn delete-btn"
                                        data-id="<?= $row['id'] ?>" >
                                        <span class="icon icon-delete"></span> Delete
                                    </a>
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



    <?= $this->endSection() ?>
