<?= $this->include('layout/nav') ?>
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3f37c9;
        --success-color: #06d6a0;
        --danger-color: #ef476f;
        --light-bg: #f8f9fa;
        --card-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        --hover-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .main-container {
        margin-top: 40px;
        margin-bottom: 40px;
    }

    .page-header {
        background: white;
        padding: 24px 32px;
        border-radius: 16px;
        box-shadow: var(--card-shadow);
        margin-bottom: 32px;
    }

    .page-title {
        font-size: 28px;
        font-weight: 700;
        color: #1e1e1e;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .page-title i {
        color: var(--primary-color);
    }

    .btn-add-entry {
        background: linear-gradient(135deg, var(--success-color) 0%, #00b894 100%);
        border: none;
        padding: 12px 24px;
        font-weight: 600;
        font-size: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(6, 214, 160, 0.3);
        transition: all 0.3s ease;
    }

    .btn-add-entry:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(6, 214, 160, 0.4);
    }

    .transaction-block {
        background: white;
        border-radius: 16px;
        padding: 28px;
        margin-bottom: 24px;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .transaction-block:hover {
        transform: translateY(-4px);
        box-shadow: var(--hover-shadow);
    }

    .transaction-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 2px solid #f0f0f0;
    }

    .transaction-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .transaction-number {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
    }

    .btn-remove {
        background: linear-gradient(135deg, var(--danger-color) 0%, #e63946 100%);
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(239, 71, 111, 0.3);
    }

    .btn-remove:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(239, 71, 111, 0.4);
    }

    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 15px;
        transition: all 0.3s ease;
        background: #fafbfc;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        background: white;
    }

    .form-control:hover, .form-select:hover {
        border-color: #cbd5e0;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 48px;
    }

    .btn-save-all {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        border: none;
        padding: 14px 40px;
        font-weight: 700;
        font-size: 16px;
        border-radius: 12px;
        box-shadow: 0 6px 16px rgba(67, 97, 238, 0.3);
        transition: all 0.3s ease;
    }

    .btn-save-all:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(67, 97, 238, 0.4);
    }

    .save-button-container {
        background: white;
        padding: 24px 32px;
        border-radius: 16px;
        box-shadow: var(--card-shadow);
        margin-top: 32px;
    }

    .input-icon {
        position: relative;
    }

    .input-icon i {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #adb5bd;
        pointer-events: none;
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 20px;
        }

        .transaction-block {
            padding: 20px;
        }

        .page-title {
            font-size: 22px;
        }

        .btn-add-entry {
            padding: 10px 16px;
            font-size: 14px;
        }
    }

    .fade-in {
        animation: fadeIn 0.4s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 64px;
        margin-bottom: 16px;
        opacity: 0.3;
    }
    /* Adjust according to your sidebar width */
.content-wrapper {
    margin-left: 250px; 
    padding: 30px;
    transition: all 0.3s ease;
}

/* If your sidebar collapses */
.sidebar-collapsed .content-wrapper {
    margin-left: 80px;
}

@media (max-width: 992px) {
    .content-wrapper {
        margin-left: 0 !important;
        padding: 20px;
    }
}
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

.flash-msg i {
    font-size: 20px;
}

</style>

<div class="content-wrapper">
<div class="container main-container" style="max-width: 100%">
<!-- <div class="container main-container" style="max-width: 1200;border:1px solid red"> -->
     <div class="flash-container position-fixed top-0 start-50 translate-middle-x mt-3"
        style="z-index: 1050; width: 400px; max-width: 90%;">

        <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success shadow-sm">
            <?= session()->getFlashdata('success') ?>
        </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger shadow-sm">
            <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>

    </div>
    <!-- Page Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <h1 class="page-title">
                <i class="bi bi-receipt"></i>
                Add Transactions
            </h1>
            <button id="addEntryBtn" class="btn btn-success btn-add-entry">
                <i class="bi bi-plus-circle me-2"></i>Add Entry
            </button>
        </div>
    </div>

    <!-- Form Start -->
    <form id="transactionForm" action="<?=base_url('save_transaction')?>" method="post">


        <div id="transactionContainer">

            <!-- Initial Transaction Block -->
            <div class="transaction-block fade-in">
                
                <div class="transaction-header">
                    <h5 class="transaction-title">
                        <span class="transaction-number block-number">1</span>
                        Transaction Entry
                    </h5>
                    <button type="button" class="btn btn-danger btn-remove remove-btn d-none">
                        <i class="bi bi-trash me-1"></i>Remove
                    </button>
                </div>

                <div class="row g-3">
                    <input type="hidden"
                    name="transaction_id[]" value="0">
                    <div class="col-md-6 col-lg-3">
                        <label class="form-label">
                            <i class="bi bi-calendar3 me-1"></i>Date
                        </label>
                        <input type="date" name="date[]" class="form-control" required>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <label class="form-label">
                            <i class="bi bi-file-text me-1"></i>Voucher Number
                        </label>
                        <input type="text" name="voucher_no[]" class="form-control" placeholder="Enter voucher number" required>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <label class="form-label">
                            <i class="bi bi-arrow-left-right me-1"></i>Type
                        </label>
                        <select name="type[]" class="form-select type-select" required>
                            <option value="">Select Type</option>
                            <option value="1">💰 Income</option>
                            <option value="2">💸 Expense</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <label class="form-label">
                            <i class="bi bi-tag me-1"></i>Category
                        </label>
                        <select name="category[]" class="form-select category-select" required>
                            <option value="">Select Category</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label class="form-label">
                            <i class="bi bi-currency-dollar me-1"></i>Amount
                        </label>
                        <input type="number" name="amount[]" class="form-control" placeholder="0.00" step="0.01" min="0" required>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label class="form-label">
                            <i class="bi bi-credit-card me-1"></i>Mode of Payment
                        </label>
                        <select name="payment_mode[]" class="form-select" required>
                            <option value="">Select Payment Mode</option>
                            <?php foreach ($paymentModes as $mode): ?>
                                <option value="<?= $mode['id'] ?>"><?= $mode['name'] ?></option>
                                <?php endforeach; ?>
                            <!-- <option value="cash">💵 Cash</option>
                            <option value="card">💳 Card</option>
                            <option value="upi">📱 UPI</option>
                            <option value="bank_transfer">🏦 Bank Transfer</option> -->
                        </select>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <label class="form-label">
                            <i class="bi bi-pencil me-1"></i>Remarks
                        </label>
                        <textarea name="remarks[]" class="form-control" rows="1" placeholder="Add notes or remarks (optional)"></textarea>
                    </div>

                </div>

            </div>

        </div>

        <!-- Save Button Container -->
        <div class="save-button-container text-end">
            <button type="submit" class="btn btn-primary btn-save-all">
                <i class="bi bi-check-circle me-2"></i>Save All Transactions
            </button>
        </div>

    </form>

</div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
     // AJAX Category Loader
    $(document).on("change", ".type-select", function () {
        let typeId = $(this).val();    //fetching the id and stooring itoo typeId vari
        let categoryDropdown = $(this).closest('.row').find('.category-select');  //finding the category dropdown related to this type select--

        if (!typeId) {
            categoryDropdown.html('<option value="">Select Category</option>');
            return;
        }

        categoryDropdown.html('<option value="">Loading...</option>').prop('disabled', true);  // temporarily replace the dropdown text with logginnn

        $.ajax({
            url: "<?= base_url('get_categories') ?>",
            type: "POST",
            data: { type_id: typeId },
            dataType: "json",

        
            success: function (response) {
                categoryDropdown.empty().append('<option value="">Select Category</option>');//removes all existing options in the category dropdown. and appends the default option
                response.forEach(cat => {
                    categoryDropdown.append(
                        `<option value="${cat.id}">${cat.name}</option>`
                    );
                });
                categoryDropdown.prop('disabled', false);
            },
            error: function() {
                categoryDropdown.html('<option value="">Error loading categories</option>').prop('disabled', false);
            }
        });
    });



    const container = document.getElementById("transactionContainer");
    const addBtn = document.getElementById("addEntryBtn");

    // Add new transaction block
    addBtn.addEventListener("click", () => {
        let clone = container.children[0].cloneNode(true);

        // Clear all inputs
        clone.querySelectorAll("input, textarea").forEach(el => {
            el.value = "";
        });
        
        // Reset all selects
        clone.querySelectorAll("select").forEach(el => {
            el.selectedIndex = 0;
        });

        // Show remove button
        clone.querySelector(".remove-btn").classList.remove("d-none");

        // Add fade-in animation
        clone.classList.add("fade-in");

        container.appendChild(clone);
        updateBlockNumbers();

        // Scroll to new block
        clone.scrollIntoView({ behavior: 'smooth', block: 'center' });
    });

    // Remove transaction block
    container.addEventListener("click", (e) => {
        if (e.target.closest(".remove-btn")) {
            const block = e.target.closest(".transaction-block");
            
            // Add fade out animation
            block.style.opacity = "0";
            block.style.transform = "translateX(-20px)";
            
            setTimeout(() => {
                block.remove();
                updateBlockNumbers();
            }, 300);
        }
    });

    // Update block numbers
    function updateBlockNumbers() {
        document.querySelectorAll(".block-number").forEach((el, index) => {
            el.textContent = index + 1;
        });

        // Show/hide remove buttons
        const blocks = document.querySelectorAll(".transaction-block");
        blocks.forEach((block, index) => {
            const removeBtn = block.querySelector(".remove-btn");
            if (blocks.length === 1) {
                removeBtn.classList.add("d-none");
            } else {
                removeBtn.classList.remove("d-none");
            }
        });
    }

   
    // Form submission handling
    

    // Set today's date as default
    // document.addEventListener('DOMContentLoaded', function() {
    //     const today = new Date().toISOString().split('T')[0];
    //     document.querySelectorAll('input[type="date"]').forEach(input => {
    //         if (!input.value) {
    //             input.value = today;
    //         }
    //     });
    // });
</script>
