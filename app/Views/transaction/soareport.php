<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">

    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1 fw-bold text-dark">Statement of Accounts</h2>
                    <p class="text-muted mb-0">Track your income and expenses with running balance</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary" onclick="window.print()">
                        <i class="bi bi-printer me-2"></i>Print
                    </button>
                    <!-- <a href="<?= base_url('transaction/soa_pdf?payment_mode=' . ($selected_mode ?? '') . '&from_date=' . ($_GET['from_date'] ?? '') . '&to_date=' . ($_GET['to_date'] ?? '')) ?>"
                        class="btn btn-primary">
                        <i class="bi bi-file-earmark-pdf"></i> Print PDF
                    </a>
                    <a href="<?= route_to('soa_pdf', 'payment_mode=' . ($selected_mode ?? '') . '&from_date=' . ($_GET['from_date'] ?? '') . '&to_date=' . ($_GET['to_date'] ?? '')) ?>"
                        class="btn btn-success">
                        Print PDF
                    </a> -->
                    <a href="<?= base_url('transaction/soa_pdf?payment_mode=' . ($selected_mode ?? '') . '&from_date=' . ($_GET['from_date'] ?? '') . '&to_date=' . ($_GET['to_date'] ?? '')) ?>"
   class="btn btn-primary">
   <i class="bi bi-file-earmark-pdf"></i> Print PDF
</a>




                    <!-- <i class="bi bi-download me-2"></i>Export -->

                </div>
            </div>
        </div>
    </div>

    <!-- Balance Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-success bg-opacity-10 rounded-3 p-3">
                                <i class="bi bi-arrow-down-circle text-success fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-muted mb-1 small">Total Income</p>
                            <h4 class="mb-0 fw-bold text-success">
                                ₹
                                <?= number_format(array_sum(array_column(array_filter($transactions, fn($t) => $t['type'] == 1), 'amount')), 2) ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-danger bg-opacity-10 rounded-3 p-3">
                                <i class="bi bi-arrow-up-circle text-danger fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-muted mb-1 small">Total Expenses</p>
                            <h4 class="mb-0 fw-bold text-danger">
                                ₹
                                <?= number_format(array_sum(array_column(array_filter($transactions, fn($t) => $t['type'] == 2), 'amount')), 2) ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-primary bg-opacity-10 rounded-3 p-3">
                                <i class="bi bi-wallet2 text-primary fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-muted mb-1 small">Current Balance</p>
                            <h4 class="mb-0 fw-bold text-primary">
                                ₹ <?php
                                $totalIncome = array_sum(array_column(array_filter($transactions, fn($t) => $t['type'] == 1), 'amount'));
                                $totalExpense = array_sum(array_column(array_filter($transactions, fn($t) => $t['type'] == 2), 'amount'));
                                echo number_format($totalIncome - $totalExpense, 2);
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters Card -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="get" class="row g-3 align-items-end">

                <!-- Payment Mode -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold text-dark mb-2">
                        <i class="bi bi-credit-card me-2"></i>Payment Mode
                    </label>
                    <select name="payment_mode" class="form-select">
                        <?php foreach ($paymentModes as $mode): ?>
                            <option value="<?= $mode['id'] ?>" <?= ($selected_mode == $mode['id']) ? 'selected' : '' ?>>
                                <?= esc($mode['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>

                <!-- From Date -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold text-dark mb-2">
                        <i class="bi bi-calendar-date me-2"></i>From Date
                    </label>
                    <input type="date" name="from_date" class="form-control"
                        value="<?= esc($_GET['from_date'] ?? '') ?>">
                </div>

                <!-- To Date -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold text-dark mb-2">
                        <i class="bi bi-calendar-check me-2"></i>To Date
                    </label>
                    <input type="date" name="to_date" class="form-control" value="<?= esc($_GET['to_date'] ?? '') ?>">
                </div>

                <!-- Submit Button -->
                <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-fill">
                    <i class="bi bi-funnel me-2"></i>Apply
                </button>

                <a href="<?= base_url('soareport') ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </div>

            </form>
        </div>
    </div>



    <!-- Transactions Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold">Transaction History</h5>
                <span class="badge bg-primary rounded-pill">
                    <?= count($transactions) ?> Transactions
                </span>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 py-3 ps-4">
                                <div class="d-flex align-items-center">
                                    <span class="fw-semibold text-dark">Date</span>
                                    <i class="bi bi-chevron-down ms-2 text-muted small"></i>
                                </div>
                            </th>
                            <th class="border-0 py-3">
                                <span class="fw-semibold text-dark">Type</span>
                            </th>
                            <th class="border-0 py-3">
                                <span class="fw-semibold text-dark">Category</span>
                            </th>
                             <th class="border-0 py-3 text-end">
                                <span class="fw-semibold text-dark">Debited</span>
                            </th>
                            <th class="border-0 py-3 text-end">
                                <span class="fw-semibold text-dark">Credited</span>
                            </th>
                           
                            <th class="border-0 py-3 text-end pe-4">
                                <span class="fw-semibold text-dark">Balance</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $balance = 0;

                        if (!empty($transactions)):
                            foreach ($transactions as $row):


                                if ($row['type'] == 1) {
                                    $debit = $row['amount'];
                                    $credit = 0;
                                } else {
                                    $debit = 0;
                                    $credit = $row['amount'];
                                }

                                // Running balance
                                $balance += ($debit - $credit);
                                ?>
                                <tr class="border-bottom">
                                    <td class="py-3 ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-light rounded-2 p-2 me-3">
                                                <i class="bi bi-calendar3 text-muted"></i>
                                            </div>
                                            <div>
                                                <div class="fw-medium text-dark"><?= date('d M Y', strtotime($row['date'])) ?>
                                                </div>
                                                <small class="text-muted"><?= date('l', strtotime($row['date'])) ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        <?php if ($row['type'] == 1): ?>
                                            <span
                                                class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">
                                                <i class="bi bi-arrow-down-circle me-1"></i>Income
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2">
                                                <i class="bi bi-arrow-up-circle me-1"></i>Expense
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-3">
                                        <span class="text-dark fw-medium"><?= esc($row['category_name']) ?></span>
                                    </td>
                                    <td class="py-3 text-end">
                                        <?php if ($debit): ?>
                                            <span class="text-success fw-semibold"> ₹ <?= number_format($debit, 2) ?></span>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-3 text-end">
                                        <?php if ($credit): ?>
                                            <span class="text-danger fw-semibold"> ₹ <?= number_format($credit, 2) ?></span>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td class="py-3 text-end pe-4">
                                        <span class="fw-bold <?= $balance >= 0 ? 'text-primary' : 'text-danger' ?>">
                                            ₹ <?= number_format($balance, 2) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="bi bi-inbox display-4 text-muted d-block mb-3"></i>
                                        <h5 class="text-muted mb-2">No Transactions Found</h5>
                                        <p class="text-muted mb-3">Start adding transactions to see your statement</p>
                                        <button class="btn btn-primary">
                                            <i class="bi bi-plus-circle me-2"></i>Add Transaction
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if (!empty($transactions)): ?>
            <div class="card-footer bg-light border-top py-3">
                <div class="d-flex justify-content-between align-items-center text-muted small">
                    <span>Showing <?= count($transactions) ?> transactions</span>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-secondary">Previous</button>
                        <button class="btn btn-sm btn-outline-secondary">Next</button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>

<style>
    /* Additional custom styles for enhanced appearance */

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease;
    }

    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .badge {
        font-weight: 500;
        letter-spacing: 0.3px;
    }
    #reset {
        width: 50px;
        /* margin-top: 32px; */
    }


    @media print {

        .btn,
        .card-header,
        .card-footer {
            display: none !important;
        }
    }
</style>
<script>
    function resetFilters() {
        // Clear all filter inputs
        document.querySelector('select[name="payment_mode"]').value = '';
        document.querySelector('input[name="from_date"]').value = '';
        document.querySelector('input[name="to_date"]').value = '';


        document.querySelector('form').submit();
    }
</script>

<?= $this->endSection() ?>