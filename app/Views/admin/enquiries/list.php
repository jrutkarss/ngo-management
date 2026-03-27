<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>पूछताछ प्रबंधन - Manage Enquiries</h2>
        </div>
        <div class="col-md-6 text-end">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#sendReplyModal">
                <i class="bi bi-reply"></i> जवाब भेजें
            </button>
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
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h6 class="card-title">कुल पूछताछ</h6>
                    <h3><?= $total_enquiries ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h6 class="card-title">नई पूछताछ</h6>
                    <h3><?= $new_enquiries ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h6 class="card-title">उत्तर दिए गए</h6>
                    <h3><?= $answered_enquiries ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h6 class="card-title">बंद</h6>
                    <h3><?= $closed_enquiries ?? 0 ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <form class="row g-3" method="get" action="<?= base_url('admin/enquiries') ?>">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search" placeholder="नाम या ईमेल खोजें..." 
                           value="<?= $search ?? '' ?>">
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="status">
                        <option value="">सभी स्थिति</option>
                        <option value="new" <?= ($status ?? '') === 'new' ? 'selected' : '' ?>>नई</option>
                        <option value="in_progress" <?= ($status ?? '') === 'in_progress' ? 'selected' : '' ?>>प्रक्रिया में</option>
                        <option value="answered" <?= ($status ?? '') === 'answered' ? 'selected' : '' ?>>उत्तर दिया गया</option>
                        <option value="closed" <?= ($status ?? '') === 'closed' ? 'selected' : '' ?>>बंद</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-primary w-100">खोजें</button>
                </div>
                <div class="col-md-3">
                    <a href="<?= base_url('admin/enquiries') ?>" class="btn btn-outline-secondary w-100">रीसेट</a>
                </div>
            </form>
        </div>
        <div class="card-body">
            <?php if(!empty($enquiries)): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>नाम</th>
                                <th>ईमेल</th>
                                <th>विषय</th>
                                <th>संदेश</th>
                                <th>तारीख</th>
                                <th>स्थिति</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach($enquiries as $enquiry): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <strong><?= htmlspecialchars($enquiry['name']) ?></strong>
                                    </td>
                                    <td><?= htmlspecialchars($enquiry['email']) ?></td>
                                    <td><?= htmlspecialchars(substr($enquiry['subject'], 0, 30)) ?></td>
                                    <td>
                                        <small class="text-muted"><?= htmlspecialchars(substr($enquiry['message'], 0, 50)) ?>...</small>
                                    </td>
                                    <td><?= date('d-m-Y', strtotime($enquiry['created_at'])) ?></td>
                                    <td>
                                        <?php 
                                        $status_badges = [
                                            'new' => '<span class="badge bg-danger">नई</span>',
                                            'in_progress' => '<span class="badge bg-warning">प्रक्रिया में</span>',
                                            'answered' => '<span class="badge bg-success">उत्तर दिया</span>',
                                            'closed' => '<span class="badge bg-secondary">बंद</span>'
                                        ];
                                        echo $status_badges[$enquiry['status']] ?? '<span class="badge bg-secondary">अज्ञात</span>';
                                        ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="<?= base_url('admin/enquiries/view/' . $enquiry['id']) ?>" 
                                               class="btn btn-outline-info" title="विस्तृत जानकारी">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-primary" title="जवाब भेजें"
                                                    data-bs-toggle="modal" data-bs-target="#replyModal<?= $enquiry['id'] ?>">
                                                <i class="bi bi-reply"></i>
                                            </button>
                                            <a href="<?= base_url('admin/enquiries/delete/' . $enquiry['id']) ?>" 
                                               class="btn btn-outline-danger" title="हटाएं"
                                               onclick="return confirm('क्या आप इस पूछताछ को हटाना चाहते हैं?');">
                                                <i class="bi bi-x-circle"></i>
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
                <div class="alert alert-info">कोई पूछताछ नहीं मिली।</div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Reply Modal for each enquiry -->
    <?php foreach($enquiries ?? [] as $enquiry): ?>
    <div class="modal fade" id="replyModal<?= $enquiry['id'] ?>" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">जवाब भेजें - <?= htmlspecialchars($enquiry['name']) ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="<?= base_url('admin/enquiries/reply/' . $enquiry['id']) ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>ईमेल:</strong> <?= htmlspecialchars($enquiry['email']) ?></label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">जवाब *</label>
                            <textarea class="form-control" name="reply_message" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">रद्द करें</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send"></i> जवाब भेजें
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
