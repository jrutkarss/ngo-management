<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>समाचार प्रबंधन - Manage News</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?= base_url('admin/news/add') ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> नया समाचार जोड़ें
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
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h6 class="card-title">कुल समाचार</h6>
                    <h3><?= $total_news ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h6 class="card-title">प्रकाशित समाचार</h6>
                    <h3><?= $published_news ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h6 class="card-title">ड्राफ्ट समाचार</h6>
                    <h3><?= $draft_news ?? 0 ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <form class="row g-3" method="get" action="<?= base_url('admin/news') ?>">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="search" placeholder="समाचार शीर्षक खोजें..." 
                           value="<?= $search ?? '' ?>">
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="status">
                        <option value="">सभी स्थिति</option>
                        <option value="published" <?= ($status ?? '') === 'published' ? 'selected' : '' ?>>प्रकाशित</option>
                        <option value="draft" <?= ($status ?? '') === 'draft' ? 'selected' : '' ?>>ड्राफ्ट</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-primary w-100">खोजें</button>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('admin/news') ?>" class="btn btn-outline-secondary w-100">रीसेट</a>
                </div>
            </form>
        </div>
        <div class="card-body">
            <?php if(!empty($newsList)): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>शीर्षक</th>
                                <th>सारांश</th>
                                <th>लेखक</th>
                                <th>तारीख</th>
                                <th>स्थिति</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach($newsList as $news): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <strong><?= htmlspecialchars(substr($news['title'], 0, 50)) ?></strong>
                                    </td>
                                    <td>
                                        <small class="text-muted"><?= htmlspecialchars(substr($news['content'], 0, 80)) ?>...</small>
                                    </td>
                                    <td><?= htmlspecialchars($news['author'] ?? 'Admin') ?></td>
                                    <td><?= date('d-m-Y', strtotime($news['created_at'])) ?></td>
                                    <td>
                                        <?php if($news['is_published']): ?>
                                            <span class="badge bg-success">प्रकाशित</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning">ड्राफ्ट</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="<?= base_url('admin/news/edit/' . $news['id']) ?>" 
                                               class="btn btn-outline-primary" title="संपादित करें">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="<?= base_url('admin/news/view/' . $news['id']) ?>" 
                                               class="btn btn-outline-info" title="देखें">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="<?= base_url('admin/news/delete/' . $news['id']) ?>" 
                                               class="btn btn-outline-danger" title="हटाएं"
                                               onclick="return confirm('क्या आप इस समाचार को हटाना चाहते हैं?');">
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
                <div class="alert alert-info">कोई समाचार नहीं मिला।</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
