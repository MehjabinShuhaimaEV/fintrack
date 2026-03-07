<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        /* padding: 20px; */
    }

    .container {
        max-width: 1200px;

        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(138, 0, 0, 0.1);
        overflow: hidden;
    }

    .content {
        /* border:5px solid blue; */

        /* padding: 20px; */
    }

    #content {
        margin-left: 250px;
        /* Width of the sidebar */
        padding: 20px;
    }

    .container-fluid {
        /* border: 1px solid green; */
        padding: 20px;
    }

    .header {
        border: 1px solid red;
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
    #card-header2{

        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .controls {
        padding: 20px 30px;
        /* border: 2px solid #000000ff; */
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

    /* .sidebar {
        height: 100vh;
        background: #ffffffff;
        padding-top: 20px;
        color: #fff;
    }

    .sidebar a {
        color: #ccc;
        text-decoration: none;
        padding: 12px 20px;
        display: block;
    }

    .sidebar a:hover {
        background: #34344A;
        color: #fff;
    }

    .topbar {
        background: #fff;
        padding: 12px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    } */

    .quick-action-btn {
        text-decoration: none;
        color: inherit;
        display: inline-block;

    }
</style>





<!-- Sidebar -->

<div class="container">
    <!-- Main Content -->
    <div class="contents" id="contents" style=";">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1" style="font-weight: 700; color: #1f2937;">Dashboard Overview</h2>
                    <p class="text-muted mb-0">Welcome back, John! Here's what's happening with your finances
                        today.</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary">
                        <i class="bi bi-download"></i> Export
                    </button>
                    <!-- <button class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add New
                    </button> -->
                    <a href="/fintrack/transaction" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add New
                    </a>
                    <a href="<?= base_url('uploadFiles') ?>" class="btn btn-primary">
                        <i class="bi bi-upload"></i> upload
                    </a>

                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <a class="quick-action-btn" href="<?= base_url('/income_list') ?>">
                    <i class="bi bi-arrow-down-circle"></i> Add Income
                </a>
                <a class="quick-action-btn" href="<?= base_url('/expense_list') ?>">
                    <i class="bi bi-arrow-up-circle"></i> Add Expense
                </a>

                <div class="quick-action-btn">
                    <i class="bi bi-arrow-left-right"></i> Transfer
                </div>
                <div class="quick-action-btn">
                    <i class="bi bi-file-earmark-text"></i> Create Invoice
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card stats-card">
                        <div class="card-body">
                            <div class="stats-icon blue">
                                <i class="bi bi-wallet2"></i>
                            </div>

                            <div class="stats-label">Total Balance</div>
                            <div class="stats-value"><?= number_format($totals['balance'], 2) ?></div>

                            <div class="stats-change positive">
                                <i class="bi bi-arrow-up"></i> 12.5% from last month
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card stats-card">
                        <div class="card-body">
                            <div class="stats-icon green">
                                <i class="bi bi-arrow-down-circle"></i>
                            </div>
                            <div class="stats-label">Total Income</div>
                            <div class="stats-value"><?= number_format($totals['total_income'], 2) ?></div>
                            <div class="stats-change positive">
                                <i class="bi bi-arrow-up"></i> 8.2% from last month
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card stats-card">
                        <div class="card-body">
                            <div class="stats-icon orange">
                                <i class="bi bi-arrow-up-circle"></i>
                            </div>
                            <div class="stats-label">Total Expenses</div>
                            <div class="stats-value"><?= number_format($totals['total_expense'], 2) ?></div>

                            <div class="stats-change negative">
                                <i class="bi bi-arrow-down"></i> 3.1% from last month
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card stats-card">
                        <div class="card-body">
                            <div class="stats-icon red">
                                <i class="bi bi-credit-card"></i>
                            </div>
                            <div class="stats-label">Pending Invoices</div>
                            <div class="stats-value">8,450.00</div>
                            <div class="stats-change positive">
                                <i class="bi bi-arrow-up"></i> 24 invoices
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row g-4 mb-4">
                <div class="col-lg-8">
                    <div class="card chart-card">
                        <div class="card-header" >
                            <h5 class="card-title">Revenue Overview</h5>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-secondary active">Month</button>
                                <button class="btn btn-outline-secondary">Year</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="revenueChart" height="80"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card chart-card">
                        <div class="card-header">
                            <h5 class="card-title">Expense Breakdown</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="expenseChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
<!-- Income & Expense Category Totals -->
<div class="row g-4 mb-4">
    <!-- Income Category Totals -->
    <div class="col-lg-6">
        <div class="card table-card">
            <div class="card-header" style="background: #fff; border-bottom: 1px solid #e5e7eb; padding: 1.25rem;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-1" style="font-weight: 600; color: #1f2937;">Income Category Totals</h5>
                        <p class="text-muted mb-0" style="font-size: 0.875rem;">Breakdown of income by category</p>
                    </div>
                    <div class="stats-icon green" style="width: 40px; height: 40px;">
                        <i class="bi bi-arrow-down-circle"></i>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead style="background-color: #f9fafb; border-bottom: 2px solid #e5e7eb;">
                            <tr>
                                <th style="padding: 0.875rem 1.25rem; font-weight: 600; color: #374151; font-size: 0.875rem;">Category</th>
                                <th class="text-end" style="padding: 0.875rem 1.25rem; font-weight: 600; color: #374151; font-size: 0.875rem;">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php
                            // echo '<pre>';
                            // print_r($incomeCategoryTotals);
                            // echo '</pre>';
                            ?> -->
                            <?php foreach($incomeCategoryTotals as $index => $row): ?>
                            <tr style="border-bottom: 1px solid #f3f4f6;">
                                <td style="padding: 1rem 1.25rem;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width: 8px; height: 8px; border-radius: 50%; background-color: #10b981;"></div>
                                        <span style="font-weight: 500; color: #374151;"><?= $row['category_name'] ?></span>
                                    </div>
                                </td>
                                <td class="text-end" style="padding: 1rem 1.25rem;">
                                    <span style="font-weight: 600; color: #059669; font-size: 0.9375rem;">
                                        $<?= number_format($row['total_amount'], 2) ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot style="background-color: #f9fafb; border-top: 2px solid #e5e7eb;">
                            <tr>
                                <td style="padding: 1rem 1.25rem;">
                                    <span style="font-weight: 700; color: #1f2937;">Total Income</span>
                                </td>
                                <td class="text-end" style="padding: 1rem 1.25rem;">
                                    <span style="font-weight: 700; color: #059669; font-size: 1rem;">
                                        $<?php 
                                            $totalIncome = array_sum(array_column($incomeCategoryTotals, 'total_amount'));
                                            echo number_format($totalIncome, 2);
                                        ?>
                                    </span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Expense Category Totals -->
    <div class="col-lg-6">
        <div class="card table-card">
            <div class="card-header" style="background: #fff; border-bottom: 1px solid #e5e7eb; padding: 1.25rem;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-1" style="font-weight: 600; color: #1f2937;">Expense Category Totals</h5>
                        <p class="text-muted mb-0" style="font-size: 0.875rem;">Breakdown of expenses by category</p>
                    </div>
                    <div class="stats-icon orange" style="width: 40px; height: 40px;">
                        <i class="bi bi-arrow-up-circle"></i>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead style="background-color: #f9fafb; border-bottom: 2px solid #e5e7eb;">
                            <tr>
                                <th style="padding: 0.875rem 1.25rem; font-weight: 600; color: #374151; font-size: 0.875rem;">Category</th>
                                <th class="text-end" style="padding: 0.875rem 1.25rem; font-weight: 600; color: #374151; font-size: 0.875rem;">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($expenseCategoryTotals as $index => $row): ?>
                            <tr style="border-bottom: 1px solid #f3f4f6;">
                                <td style="padding: 1rem 1.25rem;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width: 8px; height: 8px; border-radius: 50%; background-color: #f97316;"></div>
                                        <span style="font-weight: 500; color: #374151;"><?= $row['category_name'] ?></span>
                                    </div>
                                </td>
                                <td class="text-end" style="padding: 1rem 1.25rem;">
                                    <span style="font-weight: 600; color: #dc2626; font-size: 0.9375rem;">
                                        $<?= number_format($row['total_amount'], 2) ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot style="background-color: #f9fafb; border-top: 2px solid #e5e7eb;">
                            <tr>
                                <td style="padding: 1rem 1.25rem;">
                                    <span style="font-weight: 700; color: #1f2937;">Total Expenses</span>
                                </td>
                                <td class="text-end" style="padding: 1rem 1.25rem;">
                                    <span style="font-weight: 700; color: #dc2626; font-size: 1rem;">
                                        $<?php 
                                            $totalExpense = array_sum(array_column($expenseCategoryTotals, 'total_amount'));
                                            echo number_format($totalExpense, 2);
                                        ?>
                                    </span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- Recent Transactions -->
            <div class="card table-card">
                <div class="card-header" id="card-header2">
                    <h5 class="card-title">Recent Transactions</h5>
                    <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <!-- <?php
                            // echo '<pre>';
                            // print_r($last);
                            // echo '</pre>';
                            ?>  -->

                            <?php foreach ($last as $transaction): ?>

                                <tr>
                                    <td> <?= date('d M Y', strtotime($transaction['transaction_date'])) ?></td>
                                    <td>
                                        <div class="fw-semibold"><?= $transaction['voucher_no'] ?></div>
                                        <small class="text-muted"><?= $transaction['category_name'] ?></small>
                                    </td>

                                    <td>
                                        <span class="badge <?= $transaction['type'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                            <?= $transaction['type'] == 1 ? 'Income' : 'Expense' ?>
                                        </span>
                                    </td>

                                    

                                    <td class="fw-semibold text-danger"><?= $transaction['amount'] ?></td>
                                    <td>
                                        <div class="fw-semibold"><?= $transaction['payment_mode_name'] ?></div>
                                    </td>

                                    <td>
                                        <button class="btn btn-sm btn-link"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-sm btn-link"><i class="bi bi-pencil"></i></button>
                                    </td>
                                </tr>
                               
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<canvas id="revenueChart"></canvas>

<script>
    const monthly = <?= json_encode($monthly) ?>;

    new Chart(document.getElementById('revenueChart'), {
        type: 'line',
        data: {
            labels: monthly.months,
            datasets: [
                {
                    label: 'Income',
                    data: monthly.income,
                    borderWidth: 2
                },
                {
                    label: 'Expense',
                    data: monthly.expense,
                    borderWidth: 2
                }
            ]
        }
    });
</script>
<canvas id="expenseChart"></canvas>

<script>
    const expData = <?= json_encode($categoryExpense) ?>;

    new Chart(document.getElementById('expenseChart'), {
        type: 'pie',
        data: {
            labels: expData.labels,
            datasets: [{
                data: expData.values
            }]
        }
    });
</script>


<?= $this->endSection() ?>
