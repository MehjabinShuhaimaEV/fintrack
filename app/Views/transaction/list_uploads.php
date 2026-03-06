<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1">
                        <i class="bi bi-receipt-cutoff me-2 text-primary"></i>Bills
                    </h4>
                    <p class="text-muted mb-0 small">Manage your uploaded bills and documents</p>
                </div>
                <a href="<?= base_url('uploadFiles') ?>" class="btn btn-primary">
                    <i class="bi bi-upload me-2"></i>Upload New Bill
                </a>
            </div>
        </div>
    </div>
    <div class="card-body p-4">
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
    <!-- Stats Cards -->
    <?php if (isset($uploads) && count($uploads) > 0): ?>
        <div class="row mt-4 g-3">
            <div class="col-md-4">
                <div class="card border-0 bg-primary bg-opacity-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="bi bi-file-earmark-text fs-2 text-primary"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="text-muted mb-1">Total Bills</h6>
                                <h4 class="mb-0"><?= count($uploads) ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 bg-success bg-opacity-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="bi bi-calendar-check fs-2 text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="text-muted mb-1">This Month</h6>
                                <h4 class="mb-0">
                                    <?php
                                    $thisMonth = array_filter($uploads, function ($uploads) {
                                        return date('m-Y', strtotime($uploads['created_at'])) == date('m-Y');
                                    });
                                    echo count($thisMonth);
                                    ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 bg-info bg-opacity-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="bi bi-hdd fs-2 text-info"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="text-muted mb-1">Total Storage</h6>
                                <h4 class="mb-0">
                                    <?php
                                    $totalSize = array_sum(array_column($uploads, 'file_size_bytes'));
                                    echo number_format($totalSize / (1024 * 1024), 2) . ' MB';
                                    ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>



<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-0">
        <?php if (isset($uploads) && count($uploads) > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3">#</th>
                            <th class="py-3">Bill Number</th>
                            <th class="py-3">File Name</th>
                            <th class="py-3">Upload Date</th>
                            <th class="py-3 text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($uploads as $index => $upload): ?>

                            <tr>
                                <td class="px-4 py-3 text-muted"><?= $index + 1 ?></td>
                                <td class="py-3">
                                    <span class="badge bg-primary-subtle text-primary fw-semibold">
                                        <?= esc($upload['bill_no']) ?>
                                    </span>
                                </td>
                                <td class="py-3">
                                    <i class="bi bi-file-earmark-pdf text-danger me-1"></i>
                                    <?= esc($upload['upload_file']) ?>
                                </td>
                                <td class="py-3 text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <?= date('M d, Y H:i:s', strtotime($upload['created_at'])) ?>
                                </td>
                                <td class="py-3 text-end pe-4">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <!-- View button by ID -->
                                        <button class="btn btn-outline-primary btn-sm view-bill"
                                            data-file="<?= esc($upload['upload_file']) ?>"
                                            data-bill="<?= esc($upload['bill_no']) ?>">
                                            <i class="bi bi-eye"></i>
                                        </button>

                                      

                                        <a href="<?= base_url('download-bill/' . $upload['id']) ?>"
                                            class="btn btn-outline-success" title="Download">
                                            <i class="bi bi-download"></i>
                                        </a>
                                        <a href="<?= base_url('delete-bill/' . $upload['id']) ?>" class="btn btn-outline-danger"
                                            title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this bill?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-inbox fs-1 text-muted mb-3 d-block"></i>
                <h5 class="text-muted mb-2">No Bills Uploaded Yet</h5>
                <p class="text-muted mb-4">Start by uploading your first bill document</p>
                <a href="<?= base_url('upload-bill') ?>" class="btn btn-primary">
                    <i class="bi bi-upload me-2"></i>Upload Your First Bill
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="modal fade" id="billModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Bill No: <span id="modalBillNo"></span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img id="billImage" class="img-fluid rounded" alt="Bill Image">
            </div>

        </div>
    </div>
</div>





<style>
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #5568d3 0%, #63408a 100%);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(102, 126, 234, 0.05);
    }

    .btn-group .btn {
        transition: all 0.2s ease;
    }

    .btn-group .btn:hover {
        transform: translateY(-2px);
    }
</style>
<script>
    document.querySelectorAll('.view-bill').forEach(button => {
        button.addEventListener('click', function () {

            const fileName = this.dataset.file;
            const billNo = this.dataset.bill;

            // ✅ FORCE SLASH HERE
            const imageUrl = "<?= base_url('assets/uploads') ?>/" + fileName;

            // Debug check (optional but recommended once)
            console.log(imageUrl);

            document.getElementById('billImage').src = imageUrl;
            document.getElementById('modalBillNo').innerText = billNo;

            new bootstrap.Modal(document.getElementById('billModal')).show();
        });
    });
</script>





<?= $this->endSection() ?>