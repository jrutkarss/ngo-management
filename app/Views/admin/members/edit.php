<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2><?= isset($member) ? 'सदस्य संपादित करें' : 'नया सदस्य जोड़ें' ?></h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="<?= base_url('admin/members') ?>" class="btn btn-outline-secondary">
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
                    <h5>व्यक्तिगत जानकारी</h5>
                </div>
                <div class="card-body">
                    <form action="<?= isset($member) 
                        ? base_url('admin/members/update/' . $member['id']) 
                        : base_url('admin/members/store') ?>" method="post">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">पूरा नाम *</label>
                                <input type="text" class="form-control" name="name" required
                                       value="<?= isset($member) ? htmlspecialchars($member['name']) : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ईमेल *</label>
                                <input type="email" class="form-control" name="email" required
                                       value="<?= isset($member) ? htmlspecialchars($member['email']) : '' ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">फ़ोन नंबर *</label>
                                <input type="tel" class="form-control" name="phone" required
                                       value="<?= isset($member) ? htmlspecialchars($member['phone']) : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">जन्मतिथि</label>
                                <input type="date" class="form-control" name="dob"
                                       value="<?= isset($member) ? $member['dob'] : '' ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">लिंग</label>
                                <select class="form-select" name="gender">
                                    <option value="">चुनें</option>
                                    <option value="Male" <?= (isset($member) && $member['gender'] === 'Male') ? 'selected' : '' ?>>पुरूष</option>
                                    <option value="Female" <?= (isset($member) && $member['gender'] === 'Female') ? 'selected' : '' ?>>महिला</option>
                                    <option value="Other" <?= (isset($member) && $member['gender'] === 'Other') ? 'selected' : '' ?>>अन्य</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">पेशा</label>
                                <input type="text" class="form-control" name="occupation"
                                       value="<?= isset($member) ? htmlspecialchars($member['occupation'] ?? '') : '' ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">पता</label>
                            <input type="text" class="form-control" name="address"
                                   value="<?= isset($member) ? htmlspecialchars($member['address'] ?? '') : '' ?>">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">शहर</label>
                                <input type="text" class="form-control" name="city"
                                       value="<?= isset($member) ? htmlspecialchars($member['city'] ?? '') : '' ?>">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">राज्य</label>
                                <input type="text" class="form-control" name="state"
                                       value="<?= isset($member) ? htmlspecialchars($member['state'] ?? '') : '' ?>">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">पिन कोड</label>
                                <input type="text" class="form-control" name="postal_code"
                                       value="<?= isset($member) ? htmlspecialchars($member['postal_code'] ?? '') : '' ?>">
                            </div>
                        </div>

                        <?php if(!isset($member)): ?>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">पासवर्ड *</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">पासवर्ड की पुष्टि करें *</label>
                                    <input type="password" class="form-control" name="password_confirm" required>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_referrer" id="is_referrer"
                                           <?= (isset($member) && $member['is_referrer']) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="is_referrer">
                                        संदर्भ के लिए पात्र (रेफरर)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save"></i> सहेजें
                            </button>
                            <a href="<?= base_url('admin/members') ?>" class="btn btn-outline-secondary">
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
                    <h5>अतिरिक्त जानकारी</h5>
                </div>
                <div class="card-body">
                    <?php if(isset($member)): ?>
                        <div class="mb-3">
                            <label class="form-label"><strong>सदस्य ID:</strong></label>
                            <p class="text-muted"><?= $member['id'] ?></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>रजिस्ट्रेशन तारीख:</strong></label>
                            <p class="text-muted"><?= date('d-m-Y H:i', strtotime($member['created_at'])) ?></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>स्थिति:</strong></label>
                            <p>
                                <?php if($member['is_blocked']): ?>
                                    <span class="badge bg-danger">अवरुद्ध</span>
                                <?php else: ?>
                                    <span class="badge bg-success">सक्रिय</span>
                                <?php endif; ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
