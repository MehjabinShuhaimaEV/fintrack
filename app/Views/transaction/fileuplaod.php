<?=$this->extend('layout/main')?>
<?=$this->section('content')?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-gradient text-white py-3 rounded-top-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h5 class="mb-0 d-flex align-items-center" style="color: black;">
                        <i class="bi bi-cloud-upload me-2"></i>
                        Upload Bill
                    </h5>
                    <a href="<?= base_url('upload-list')?>">list</a>

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

                    <form action="<?= base_url('upload-file') ?>" method="post" enctype="multipart/form-data">
                        
                        <!-- Bill Number Input -->
                        <div class="mb-4">
                            <label for="bill_no" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-receipt me-1"></i>Bill Number
                            </label>
                            <input 
                                type="text" 
                                class="form-control form-control-lg" 
                                id="bill_no"
                                name="bill_no" 
                                
                                required
                                value="<?= old('bill_no') ?>"
                            >
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>Enter a unique identifier for this bill
                            </div>
                        </div>

                        <!-- File Upload -->
                        <div class="mb-4">
                            <label for="file" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-paperclip me-1"></i>Bill Document
                            </label>
                            <div class="upload-area border-2 border-dashed rounded-3 p-5 text-center bg-light">
                                <i class="bi bi-cloud-arrow-up fs-1 text-primary mb-3 d-block"></i>
                                <input 
                                    type="file" 
                                    class="form-control" 
                                    id="file"
                                    name="file" 
                                    required
                                    accept=".pdf,.jpg,.jpeg,.png,.doc,.docx"
                                >
                                <p class="text-muted small mb-0 mt-2">Supported formats: PDF, JPG, PNG, DOC (Max 10MB)</p>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-upload me-2"></i>Upload Bill
                            </button>
                            <a href="<?= base_url('bills') ?>" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div>

            <!-- Upload Tips -->
            <div class="card border-0 bg-light mt-3">
                <div class="card-body p-3">
                    <h6 class="mb-2 text-secondary">
                        <i class="bi bi-lightbulb me-1"></i>Tips
                    </h6>
                    <ul class="small text-muted mb-0 ps-3">
                        <li>Ensure bill numbers are unique to avoid duplicates</li>
                        <li>Use clear, high-quality scans for best results</li>
                        <li>Keep file sizes under 10MB for faster uploads</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
.upload-area {
    background: #f8f9fa;
    transition: all 0.3s ease;
}
.card-header{
    /* border: 1px solid red; */
    display: flex;
    justify-content: space-between;
    align-items:center;

}

.upload-area:hover {
    background: #e9ecef;
    border-color: #667eea !important;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

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

.btn-outline-secondary:hover {
    transform: translateY(-1px);
}
</style>

<?=$this->endSection()?>
