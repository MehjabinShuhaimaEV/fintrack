<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<style>
:root {
    --primary-color: #2563eb;
    --primary-hover: #1d4ed8;
    --success-color: #059669;
    --danger-color: #dc2626;
    --text-primary: #111827;
    --text-secondary: #6b7280;
    --text-muted: #9ca3af;
    --bg-primary: #ffffff;
    --bg-secondary: #f9fafb;
    --bg-tertiary: #f3f4f6;
    --border-color: #e5e7eb;
    --border-light: #f3f4f6;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.view-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 1rem 1.5rem;
}

/* Navigation Header */
.nav-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    transition: all 0.2s ease;
}

.back-link:hover {
    background-color: var(--bg-tertiary);
    color: var(--text-primary);
}

/* Page Title Section - Compact */
.page-title-section {
    background: var(--bg-primary);
    border: 1px solid var(--border-color);
    border-radius: 10px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 1rem;
    box-shadow: var(--shadow-sm);
}

.title-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
}

.title-content h1 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.25rem;
}

.voucher-number {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.8125rem;
    color: var(--text-secondary);
    background: var(--bg-tertiary);
    padding: 0.25rem 0.625rem;
    border-radius: 5px;
    font-weight: 500;
}

.status-indicator {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.375rem 0.875rem;
    border-radius: 6px;
    font-size: 0.8125rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.025em;
}

.status-indicator.active {
    background-color: #d1fae5;
    color: var(--success-color);
}

.status-indicator.inactive {
    background-color: #fee2e2;
    color: var(--danger-color);
}

.status-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background-color: currentColor;
}

/* Main Content Grid - Compact */
.content-grid {
    display: grid;
    grid-template-columns: 1.8fr 1fr;
    gap: 1rem;
    margin-bottom: 1rem;
}

/* Card Styling - Compact */
.card {
    background: var(--bg-primary);
    border: 1px solid var(--border-color);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.card-header {
    padding: 0.875rem 1.25rem;
    border-bottom: 1px solid var(--border-color);
    background: var(--bg-secondary);
}

.card-title {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: 0.375rem;
}

.card-body {
    padding: 1.25rem;
}

/* Details List - Compact */
.details-list {
    display: flex;
    flex-direction: column;
    gap: 0.875rem;
}

.detail-row {
    display: flex;
    align-items: flex-start;
    padding-bottom: 0.875rem;
    border-bottom: 1px solid var(--border-light);
}

.detail-row:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.detail-label {
    flex: 0 0 130px;
    font-size: 0.8125rem;
    font-weight: 500;
    color: var(--text-secondary);
}

.detail-value {
    flex: 1;
    font-size: 0.875rem;
    color: var(--text-primary);
    font-weight: 500;
}

.detail-value.highlight {
    font-size: 1.0625rem;
    font-weight: 600;
    color: var(--primary-color);
}

/* Amount Card - Compact */
.amount-display {
    text-align: center;
    padding: 1.5rem 1rem;
}

.amount-label {
    font-size: 0.8125rem;
    font-weight: 500;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.5rem;
}

.amount-value {
    font-size: 2.25rem;
    font-weight: 700;
    color: var(--primary-color);
    line-height: 1;
    margin-bottom: 0.5rem;
}

.amount-subtext {
    font-size: 0.8125rem;
    color: var(--text-muted);
}

/* Payment Info Card - Compact */
.info-grid {
    display: grid;
    gap: 0.875rem;
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.info-label {
    font-size: 0.6875rem;
    font-weight: 600;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.info-value {
    font-size: 0.875rem;
    color: var(--text-primary);
    font-weight: 500;
}

/* Remarks Card - Compact */
.remarks-content {
    font-size: 0.875rem;
    color: var(--text-secondary);
    line-height: 1.6;
    white-space: pre-wrap;
}

.no-remarks {
    color: var(--text-muted);
    font-style: italic;
    text-align: center;
    padding: 1.5rem;
    font-size: 0.875rem;
}

/* Action Buttons - Compact */
.actions {
    display: flex;
    gap: 0.5rem;
    align-items: center;
    background: var(--bg-primary);
    border: 1px solid var(--border-color);
    border-radius: 10px;
    padding: 1rem;
    box-shadow: var(--shadow-sm);
}

.action-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 500;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.2s ease;
    border: 1px solid transparent;
    cursor: pointer;
    white-space: nowrap;
}

.view-btn {
    background-color: #f3f4f6;
    color: #374151;
    border-color: #e5e7eb;
}

.view-btn:hover {
    background-color: #e5e7eb;
    color: #1f2937;
}

.edit-btn {
    background-color: #dbeafe;
    color: #1e40af;
    border-color: #bfdbfe;
}

.edit-btn:hover {
    background-color: #bfdbfe;
    color: #1e3a8a;
}

.delete-btn {
    background-color: #fee2e2;
    color: #b91c1c;
    border-color: #fecaca;
}

.delete-btn:hover {
    background-color: #fecaca;
    color: #991b1b;
}

.icon {
    width: 14px;
    height: 14px;
}

.icon svg {
    width: 14px;
    height: 14px;
    stroke: currentColor;
    fill: none;
    stroke-width: 2;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .content-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .view-container {
        padding: 1rem;
    }

    .nav-header {
        flex-direction: column;
        align-items: stretch;
        gap: 0.75rem;
    }

    .title-row {
        flex-direction: column;
        align-items: flex-start;
    }

    .page-title-section {
        padding: 1rem;
    }

    .title-content h1 {
        font-size: 1.25rem;
    }

    .amount-value {
        font-size: 2rem;
    }

    .detail-row {
        flex-direction: column;
        gap: 0.375rem;
    }

    .actions {
        flex-wrap: wrap;
    }

    .action-btn {
        flex: 1;
        min-width: calc(50% - 0.25rem);
        justify-content: center;
    }
}
</style>

<div class="view-container">
    <!-- Navigation Header -->
    <div class="nav-header">
        <a href="<?= base_url('income') ?>" class="back-link">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M10 12L6 8l4-4"/>
            </svg>
            Back to Income List
        </a>
    </div>

    <!-- Page Title Section -->
    <div class="page-title-section">
        <div class="title-row">
            <div class="title-content">
                <h1>Transaction Details</h1>
                <span class="voucher-number">
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor">
                        <path d="M3 3a2 2 0 012-2h6a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V3zm3 1a1 1 0 000 2h4a1 1 0 100-2H6zm0 3a1 1 0 000 2h4a1 1 0 100-2H6zm0 3a1 1 0 100 2h4a1 1 0 100-2H6z"/>
                    </svg>
                    <?= esc($transaction['id']) ?>
                </span>
            </div>
            <span class="status-indicator <?= $transaction['status'] == 0 ? 'active' : 'inactive' ?>">
                <span class="status-dot"></span>
                <?= $transaction['status'] == 0 ? 'Active' : 'Inactive' ?>
            </span>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="content-grid">
        <!-- Left Column: Transaction Details -->
        <div>
            <!-- Transaction Information Card -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M9 2a1 1 0 000 2h2.586L7.293 8.293a1 1 0 101.414 1.414L13 5.414V8a1 1 0 102 0V3a1 1 0 00-1-1H9z"/>
                            <path d="M3 7a1 1 0 011-1h3a1 1 0 010 2H5v7h7v-2a1 1 0 112 0v3a1 1 0 01-1 1H4a1 1 0 01-1-1V7z"/>
                        </svg>
                        Transaction Information
                    </h2>
                </div>
                <div class="card-body">
                    <div class="details-list">
                        <div class="detail-row">
                            <span class="detail-label">Date</span>
                            <span class="detail-value"><?= transaction_date('l, F j, Y', strtotime($transaction['transaction_date'])) ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Category</span>
                            <span class="detail-value"><?= esc($transaction['category_name'] ?? 'Uncategorized') ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Amount</span>
                            <span class="detail-value highlight">$<?= number_format($transaction['amount'], 2) ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Payment Method</span>
                            <span class="detail-value"><?= esc($transaction['payment_mode_name']) ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Created</span>
                            <span class="detail-value"><?= date('M j, Y \a\t g:i A', strtotime($transaction['created_at'] ?? $transaction['transaction_date'])) ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Remarks Card -->
            <div class="card" style="margin-top: 1rem;">
                <div class="card-header">
                    <h2 class="card-title">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M4 4a2 2 0 012-2h4a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v8h4V4H6z"/>
                        </svg>
                        Remarks
                    </h2>
                </div>
                <div class="card-body">
                    <?php if (!empty($transaction['remarks'])): ?>
                        <p class="remarks-content"><?= esc($transaction['remarks']) ?></p>
                    <?php else: ?>
                        <p class="no-remarks">No remarks available</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Right Column: Amount & Payment Info -->
        <div>
            <!-- Amount Card -->
            <div class="card">
                <div class="card-body">
                    <div class="amount-display">
                        <div class="amount-label">Total Amount</div>
                        <div class="amount-value">$<?= number_format($transaction['amount'], 2) ?></div>
                        <div class="amount-subtext"><?= esc($transaction['category_name'] ?? 'Income') ?></div>
                    </div>
                </div>
            </div>

            <!-- Payment Details Card -->
            <div class="card" style="margin-top: 1rem;">
                <div class="card-header">
                    <h2 class="card-title">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M2 4a2 2 0 012-2h8a2 2 0 012 2v1H2V4z"/>
                            <path fill-rule="evenodd" d="M2 7v5a2 2 0 002 2h8a2 2 0 002-2V7H2zm3 2a1 1 0 011-1h4a1 1 0 110 2H6a1 1 0 01-1-1z"/>
                        </svg>
                        Payment Details
                    </h2>
                </div>
                <div class="card-body">
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Payment Method</span>
                            <span class="info-value"><?= esc($transaction['payment_mode_name']) ?></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Transaction Status</span>
                            <span class="info-value"><?= $transaction['status'] == 1 ? 'Completed' : 'Pending' ?></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Transaction ID</span>
                            <span class="info-value"><?= esc($transaction['id']) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="actions">
        <a href="<?= base_url('/edit?id=' . $transaction['id']) ?>" class="action-btn edit-btn">
            <span class="icon">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor">
                    <path d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9z"/>
                </svg>
            </span>
            Edit
        </a>
        <a href="<?= base_url('/delete?id=' . $transaction['id']) ?>" 
           class="action-btn delete-btn"
           onclick="return confirm('Are you sure you want to delete this transaction?')">
            <span class="icon">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor">
                    <path d="M6 2a1 1 0 00-1 1v1H3a1 1 0 000 2h10a1 1 0 100-2h-2V3a1 1 0 00-1-1H6zm3 4H5v7a1 1 0 001 1h4a1 1 0 001-1V6z"/>
                </svg>
            </span>
            Delete
        </a>
        <a href="<?= base_url('income') ?>" class="action-btn view-btn">
            <span class="icon">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M10 12L6 8l4-4"/>
                </svg>
            </span>
            Back to List
        </a>
    </div>
</div>

<?= $this->endSection() ?>
