<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>इवेंट प्रबंधन - Manage Events</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?= base_url('admin/events/add') ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> नया इवेंट बनाएं
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
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h6 class="card-title">आसन्न इवेंट</h6>
                    <h3><?= $upcoming_events ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h6 class="card-title">कुल पंजीकरण</h6>
                    <h3><?= $total_registrations ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h6 class="card-title">पूर्ण हुए इवेंट</h6>
                    <h3><?= $completed_events ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h6 class="card-title">कुल इवेंट</h6>
                    <h3><?= $total_events ?? 0 ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <form class="row g-3" method="get" action="<?= base_url('admin/events') ?>">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search" placeholder="इवेंट शीर्षक खोजें..." 
                           value="<?= $search ?? '' ?>">
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="status">
                        <option value="">सभी स्थिति</option>
                        <option value="upcoming" <?= ($status ?? '') === 'upcoming' ? 'selected' : '' ?>>आसन्न</option>
                        <option value="ongoing" <?= ($status ?? '') === 'ongoing' ? 'selected' : '' ?>>जारी</option>
                        <option value="completed" <?= ($status ?? '') === 'completed' ? 'selected' : '' ?>>पूर्ण</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-primary w-100">खोजें</button>
                </div>
                <div class="col-md-3">
                    <a href="<?= base_url('admin/events') ?>" class="btn btn-outline-secondary w-100">रीसेट</a>
                </div>
            </form>
        </div>
        <div class="card-body">
            <?php if(!empty($events)): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>इवेंट शीर्षक</th>
                                <th>तारीख</th>
                                <th>स्थान</th>
                                <th>पंजीकरण</th>
                                <th>स्थिति</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach($events as $event): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <strong><?= htmlspecialchars($event['title']) ?></strong>
                                    </td>
                                    <td>
                                        <small><?= date('d-m-Y', strtotime($event['event_date'])) ?></small>
                                        <br><small class="text-muted"><?= date('H:i', strtotime($event['event_time'])) ?></small>
                                    </td>
                                    <td><?= htmlspecialchars($event['location'] ?? 'N/A') ?></td>
                                    <td>
                                        <span class="badge bg-primary"><?= $event['registration_count'] ?? 0 ?></span>
                                    </td>
                                    <td>
                                        <?php 
                                        $status_badges = [
                                            'upcoming' => '<span class="badge bg-info">आसन्न</span>',
                                            'ongoing' => '<span class="badge bg-warning">जारी</span>',
                                            'completed' => '<span class="badge bg-success">पूर्ण</span>'
                                        ];
                                        echo $status_badges[$event['status']] ?? '<span class="badge bg-secondary">अज्ञात</span>';
                                        ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="<?= base_url('admin/events/edit/' . $event['id']) ?>" 
                                               class="btn btn-outline-primary" title="संपादित करें">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="<?= base_url('admin/events/registrations/' . $event['id']) ?>" 
                                               class="btn btn-outline-info" title="पंजीकरण देखें">
                                                <i class="bi bi-people"></i>
                                            </a>
                                            <a href="<?= base_url('admin/events/delete/' . $event['id']) ?>" 
                                               class="btn btn-outline-danger" title="हटाएं"
                                               onclick="return confirm('क्या आप इस इवेंट को हटाना चाहते हैं?');">
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
                <div class="alert alert-info">कोई इवेंट नहीं मिला।</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
