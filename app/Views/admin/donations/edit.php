<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><?= isset($donation) ? 'दान संपादित करें' : 'नया दान जोड़ें' ?></h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?= base_url('admin/donations') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> वापस जाएं
            </a>
        </div>
    </div>

    <?php if(session()->has('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php foreach(session('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>दान विवरण</h5>
                </div>
                <div class="card-body">
                    <form action="<?= isset($donation) 
                        ? base_url('admin/donations/update/' . $donation['id']) 
                        : base_url('admin/donations/store') ?>" method="post">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">दानकर्ता का नाम *</label>
                                <input type="text" class="form-control" name="donor_name" required
                                       value="<?= isset($donation) ? htmlspecialchars($donation['donor_name']) : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ईमेल *</label>
                                <input type="email" class="form-control" name="donor_email" required
                                       value="<?= isset($donation) ? htmlspecialchars($donation['donor_email']) : '' ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">फ़ोन नंबर</label>
                                <input type="tel" class="form-control" name="donor_phone"
                                       value="<?= isset($donation) ? htmlspecialchars($donation['donor_phone'] ?? '') : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">राशि *</label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control" name="amount" required 
                                           step="0.01" value="<?= isset($donation) ? $donation['amount'] : '' ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">दान का प्रकार *</label>
                                <select class="form-select" name="donation_type" required>
                                    <option value="">चुनें</option>
                                    <option value="online" <?= (isset($donation) && $donation['donation_type'] === 'online') ? 'selected' : '' ?>>ऑनलाइन</option>
                                    <option value="cash" <?= (isset($donation) && $donation['donation_type'] === 'cash') ? 'selected' : '' ?>>नकद</option>
                                    <option value="cheque" <?= (isset($donation) && $donation['donation_type'] === 'cheque') ? 'selected' : '' ?>>चेक</option>
                                    <option value="bank_transfer" <?= (isset($donation) && $donation['donation_type'] === 'bank_transfer') ? 'selected' : '' ?>>बैंक ट्रांसफर</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">स्थिति *</label>
                                <select class="form-select" name="status" required>
                                    <option value="pending" <?= (isset($donation) && $donation['status'] === 'pending') ? 'selected' : '' ?>>लंबित</option>
                                    <option value="verified" <?= (isset($donation) && $donation['status'] === 'verified') ? 'selected' : '' ?>>सत्यापित</option>
                                    <option value="rejected" <?= (isset($donation) && $donation['status'] === 'rejected') ? 'selected' : '' ?>>अस्वीकृत</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">उद्देश्य / विवरण</label>
                            <textarea class="form-control" name="description" rows="4"><?= isset($donation) ? htmlspecialchars($donation['description'] ?? '') : '' ?></textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">तरीका संदर्भ नंबर</label>
                                <input type="text" class="form-control" name="transaction_id"
                                       value="<?= isset($donation) ? htmlspecialchars($donation['transaction_id'] ?? '') : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">दान की तारीख</label>
                                <input type="date" class="form-control" name="donation_date"
                                       value="<?= isset($donation) ? date('Y-m-d', strtotime($donation['created_at'])) : date('Y-m-d') ?>">
                            </div>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="is_anonymous" id="is_anonymous"
                                   <?= (isset($donation) && $donation['is_anonymous']) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="is_anonymous">
                                गुमनाम दान
                            </label>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save"></i> सहेजें
                            </button>
                            <a href="<?= base_url('admin/donations') ?>" class="btn btn-outline-secondary">
                                रद्द करें
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>सूचना</h5>
                </div>
                <div class="card-body">
                    <?php if(isset($donation)): ?>
                        <div class="mb-3">
                            <label class="form-label"><strong>दान ID:</strong></label>
                            <p class="text-muted"><?= $donation['id'] ?></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>तारीख:</strong></label>
                            <p class="text-muted"><?= date('d-m-Y H:i', strtotime($donation['created_at'])) ?></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>अंतिम अपडेट:</strong></label>
                            <p class="text-muted"><?= date('d-m-Y H:i', strtotime($donation['updated_at'] ?? $donation['created_at'])) ?></p>
                        </div>
                        <?php if(!empty($donation['receipt_path'])): ?>
                            <div class="mb-3">
                                <label class="form-label"><strong>रसीद:</strong></label>
                                <a href="<?= base_url($donation['receipt_path']) ?>" target="_blank" class="btn btn-sm btn-outline-primary w-100">
                                    <i class="bi bi-download"></i> डाउनलोड करें
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <p class="text-muted">नया दान जोड़ने के लिए विवरण भरें।</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
