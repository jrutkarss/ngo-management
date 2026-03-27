<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>सदस्य प्रबंधन - Manage Members</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?= base_url('admin/members/add') ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> नया सदस्य जोड़ें
            </a>
        </div>
    </div>

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(session()->has('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <form class="row g-3" method="get" action="<?= base_url('admin/members') ?>">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search" placeholder="नाम या ईमेल खोजें..." 
                           value="<?= $search ?? '' ?>">
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="status">
                        <option value="">सभी स्थितियाँ</option>
                        <option value="active" <?= ($status ?? '') === 'active' ? 'selected' : '' ?>>सक्रिय</option>
                        <option value="blocked" <?= ($status ?? '') === 'blocked' ? 'selected' : '' ?>>अवरुद्ध</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-outline-primary w-100">खोजें</button>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('admin/members') ?>" class="btn btn-outline-secondary w-100">रीसेट</a>
                </div>
            </form>
        </div>
        <div class="card-body">
            <?php if(!empty($members)): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>नाम</th>
                                <th>ईमेल</th>
                                <th>फ़ोन</th>
                                <th>शहर</th>
                                <th>जॉइन तारीख</th>
                                <th>स्थिति</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach($members as $member): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <strong><?= htmlspecialchars($member['name']) ?></strong>
                                        <?php if($member['is_referrer']): ?>
                                            <span class="badge bg-info">Referrer</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($member['email']) ?></td>
                                    <td><?= htmlspecialchars($member['phone'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($member['city'] ?? 'N/A') ?></td>
                                    <td><?= date('d-m-Y', strtotime($member['created_at'])) ?></td>
                                    <td>
                                        <?php if($member['is_blocked']): ?>
                                            <span class="badge bg-danger">अवरुद्ध</span>
                                        <?php else: ?>
                                            <span class="badge bg-success">सक्रिय</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="<?= base_url('admin/members/edit/' . $member['id']) ?>" 
                                               class="btn btn-outline-primary" title="संपादित करें">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="<?= base_url('admin/members/view/' . $member['id']) ?>" 
                                               class="btn btn-outline-info" title="विस्तृत जानकारी">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <?php if(!$member['is_blocked']): ?>
                                                <a href="<?= base_url('admin/members/block/' . $member['id']) ?>" 
                                                   class="btn btn-outline-warning" title="अवरुद्ध करें"
                                                   onclick="return confirm('क्या आप इस सदस्य को अवरुद्ध करना चाहते हैं?');">
                                                    <i class="bi bi-lock"></i>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?= base_url('admin/members/unblock/' . $member['id']) ?>" 
                                                   class="btn btn-outline-success" title="अनब्लॉक करें"
                                                   onclick="return confirm('क्या आप इस सदस्य को अनब्लॉक करना चाहते हैं?');">
                                                    <i class="bi bi-unlock"></i>
                                                </a>
                                            <?php endif; ?>
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
                <div class="alert alert-info">कोई सदस्य नहीं मिला।</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
