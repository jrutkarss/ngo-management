<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>दान प्रबंधन - Manage Donations</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?= base_url('admin/donations/add') ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> नया दान जोड़ें
            </a>
        </div>
    </div>

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h6 class="card-title">कुल दान</h6>
                    <h3>₹<?= number_format($total_donations ?? 0, 2) ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h6 class="card-title">सत्यापित दान</h6>
                    <h3><?= $total_verified ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h6 class="card-title">लंबित दान</h6>
                    <h3><?= $total_pending ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h6 class="card-title">अस्वीकृत दान</h6>
                    <h3><?= $total_rejected ?? 0 ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <form class="row g-3" method="get" action="<?= base_url('admin/donations') ?>">
                <div class="col-md-3">
                    <input type="text" class="form-control" name="search" placeholder="दानकर्ता का नाम या ईमेल..." 
                           value="<?= $search ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <select class="form-select" name="status">
                        <option value="">सभी स्थिति</option>
                        <option value="verified" <?= ($status ?? '') === 'verified' ? 'selected' : '' ?>>सत्यापित</option>
                        <option value="pending" <?= ($status ?? '') === 'pending' ? 'selected' : '' ?>>लंबित</option>
                        <option value="rejected" <?= ($status ?? '') === 'rejected' ? 'selected' : '' ?>>अस्वीकृत</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" name="type">
                        <option value="">सभी प्रकार</option>
                        <option value="online" <?= ($type ?? '') === 'online' ? 'selected' : '' ?>>ऑनलाइन</option>
                        <option value="cash" <?= ($type ?? '') === 'cash' ? 'selected' : '' ?>>नकद</option>
                        <option value="cheque" <?= ($type ?? '') === 'cheque' ? 'selected' : '' ?>>चेक</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-primary w-100">खोजें</button>
                </div>
                <div class="col-md-3">
                    <a href="<?= base_url('admin/donations') ?>" class="btn btn-outline-secondary w-100">रीसेट</a>
                </div>
            </form>
        </div>
        <div class="card-body">
            <?php if(!empty($donations)): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>दानकर्ता</th>
                                <th>राशि</th>
                                <th>प्रकार</th>
                                <th>तारीख</th>
                                <th>स्थिति</th>
                                <th>रसीद</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach($donations as $donation): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <strong><?= htmlspecialchars($donation['donor_name']) ?></strong>
                                        <br><small class="text-muted"><?= htmlspecialchars($donation['donor_email']) ?></small>
                                    </td>
                                    <td><strong>₹<?= number_format($donation['amount'], 2) ?></strong></td>
                                    <td>
                                        <?php 
                                        $type_labels = ['online' => 'ऑनलाइन', 'cash' => 'नकद', 'cheque' => 'चेक'];
                                        echo $type_labels[$donation['donation_type']] ?? $donation['donation_type'];
                                        ?>
                                    </td>
                                    <td><?= date('d-m-Y', strtotime($donation['created_at'])) ?></td>
                                    <td>
                                        <?php 
                                        $status_badges = [
                                            'verified' => '<span class="badge bg-success">सत्यापित</span>',
                                            'pending' => '<span class="badge bg-warning">लंबित</span>',
                                            'rejected' => '<span class="badge bg-danger">अस्वीकृत</span>'
                                        ];
                                        echo $status_badges[$donation['status']] ?? '<span class="badge bg-secondary">अज्ञात</span>';
                                        ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($donation['receipt_path'])): ?>
                                            <a href="<?= base_url($donation['receipt_path']) ?>" target="_blank" 
                                               class="btn btn-sm btn-outline-info">
                                                <i class="bi bi-download"></i> डाउनलोड
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="<?= base_url('admin/donations/edit/' . $donation['id']) ?>" 
                                               class="btn btn-outline-primary" title="संपादित करें">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="<?= base_url('admin/donations/view/' . $donation['id']) ?>" 
                                               class="btn btn-outline-info" title="विस्तृत जानकारी">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if(!empty($pager)): ?>
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?= $pager->links() ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            <?php else: ?>
                <div class="alert alert-info">कोई दान नहीं मिला।</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
