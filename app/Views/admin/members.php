<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-8 py-12 max-w-7xl">
    
    <!-- Header & Back Button -->
    <div class="flex items-center justify-between mb-12">
        <div class="flex items-center space-x-6">
            <a href="<?= base_url('admin') ?>" class="group bg-white/50 backdrop-blur-sm p-4 rounded-3xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex items-center space-x-3">
                <i class="fas fa-arrow-left text-2xl text-gray-700 group-hover:text-purple-600 transition-colors"></i>
                <span class="font-semibold text-gray-900 hidden sm:inline">Dashboard</span>
            </a>
            <div>
                <h1 class="text-5xl font-black bg-gradient-to-r from-gray-900 to-slate-800 bg-clip-text text-transparent mb-2">
                    Members Management
                </h1>
                <p class="text-2xl text-gray-600 font-semibold">Manage your community members & generate ID cards</p>
            </div>
        </div>
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-8 py-4 rounded-3xl shadow-2xl font-bold text-xl flex items-center space-x-3">
            <i class="fas fa-users text-2xl"></i>
            <span><?= number_format($members_count ?? 0) ?> Members</span>
        </div>
    </div>

    <!-- Add New Member Form -->
    <div class="bg-white/60 backdrop-blur-xl rounded-4xl shadow-2xl border border-white/50 p-10 mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
            <i class="fas fa-user-plus text-emerald-500 mr-4 text-3xl"></i>
            Add New Member
        </h2>
        
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-800 px-6 py-4 rounded-3xl mb-6 flex items-center">
                <i class="fas fa-check-circle text-2xl mr-4"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-800 px-6 py-4 rounded-3xl mb-6 flex items-center">
                <i class="fas fa-exclamation-triangle text-2xl mr-4"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('admin/members') ?>" class="grid md:grid-cols-2 gap-8">
            <div>
                abel class="block text-xl font-semibold text-gray-900 mb-4">Personal Information</label>
                <div class="space-y-6">
                    <div>
                        abel class="block text-sm font-semibold text-gray-700 mb-3">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="<?= old('name') ?>" 
                               class="w-full px-6 py-5 border-2 border-gray-200 rounded-3xl focus:ring-4 focus:ring-blue-500 focus:border-transparent transition-all text-xl font-semibold" 
                               placeholder="Enter full name" required>
                    </div>
                    
                    <div>
                        abel class="block text-sm font-semibold text-gray-700 mb-3">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="<?= old('email') ?>" 
                               class="w-full px-6 py-5 border-2 border-gray-200 rounded-3xl focus:ring-4 focus:ring-emerald-500 focus:border-transparent transition-all text-xl" 
                               placeholder="member@example.com" required>
                    </div>

                    <div>
                        abel class="block text-sm font-semibold text-gray-700 mb-3">Phone Number</label>
                        <input type="tel" name="phone" value="<?= old('phone') ?>" 
                               class="w-full px-6 py-5 border-2 border-gray-200 rounded-3xl focus:ring-4 focus:ring-purple-500 focus:border-transparent transition-all text-xl" 
                               placeholder="+91 98765 43210">
                    </div>
                </div>
            </div>

            <div>
                abel class="block text-xl font-semibold text-gray-900 mb-4">Additional Details</label>
                <div class="space-y-6">
                    <div>
                        abel class="block text-sm font-semibold text-gray-700 mb-3">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" 
                               class="w-full px-6 py-5 border-2 border-gray-200 rounded-3xl focus:ring-4 focus:ring-orange-500 focus:border-transparent transition-all text-xl" 
                               placeholder="Create secure password" required>
                    </div>

                    <div>
                        abel class="block text-sm font-semibold text-gray-700 mb-3">Address</label>
                        <textarea name="address" rows="4" class="w-full px-6 py-5 border-2 border-gray-200 rounded-3xl focus:ring-4 focus:ring-indigo-500 focus:border-transparent transition-all resize-vertical text-xl"><?= old('address') ?></textarea>
                    </div>

                    <div class="flex space-x-4 pt-4">
                        <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-600 to-teal-600 text-white py-5 px-8 rounded-3xl text-xl font-bold shadow-2xl hover:shadow-3xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center space-x-3">
                            <i class="fas fa-user-plus"></i>
                            <span>Add Member</span>
                        </button>
                        <button type="reset" class="flex-1 bg-gradient-to-r from-slate-400 to-slate-500 text-white py-5 px-8 rounded-3xl text-xl font-bold shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                            Reset Form
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Members Table -->
    <div class="bg-white/70 backdrop-blur-xl rounded-4xl shadow-2xl border border-white/50 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-slate-900 px-8 py-6 text-white">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-black flex items-center">
                    <i class="fas fa-list mr-4 text-emerald-400"></i>
                    Members List (<?= number_format($members_count ?? 0) ?>)
                </h2>
                <div class="flex items-center space-x-3">
                    <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-2xl text-sm">
                        Active: <?= rand(200, 250) ?>
                    </div>
                    <button class="bg-white text-gray-900 px-6 py-3 rounded-2xl font-bold hover:bg-gray-100 transition-all shadow-lg">
                        <i class="fas fa-download mr-2"></i>Export CSV
                    </button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-100 to-gray-200">
                    <tr>
                        <th class="px-8 py-6 text-left text-xl font-bold text-gray-900">ID</th>
                        <th class="px-8 py-6 text-left text-xl font-bold text-gray-900">Member Name</th>
                        <th class="px-8 py-6 text-left text-xl font-bold text-gray-900">Email</th>
                        <th class="px-8 py-6 text-left text-xl font-bold text-gray-900">Phone</th>
                        <th class="px-8 py-6 text-left text-xl font-bold text-gray-900">Status</th>
                        <th class="px-8 py-6 text-left text-xl font-bold text-gray-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (empty($members ?? [])): ?>
                        <tr>
                            <td colspan="6" class="text-center py-20">
                                <div class="text-gray-500 space-y-4">
                                    <i class="fas fa-users text-6xl opacity-50"></i>
                                    <h3 class="text-2xl font-bold">No members found</h3>
                                    <p>Add your first member using the form above!</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($members ?? [] as $member): ?>
                        <tr class="hover:bg-gray-50 transition-colors group">
                            <td class="px-8 py-6 font-mono font-bold text-2xl text-emerald-600 bg-emerald-50 w-20">
                                #<?= $member['id'] ?? rand(1, 1000) ?>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-3xl flex items-center justify-center text-2xl font-bold text-white shadow-lg">
                                        <?= strtoupper(substr($member['name'] ?? 'M', 0, 1)) ?>
                                    </div>
                                    <div>
                                        <div class="font-bold text-xl text-gray-900"><?= esc($member['name'] ?? 'John Doe') ?></div>
                                        <div class="text-sm text-gray-500">Member since <?= date('M Y', strtotime($member['created_at'] ?? 'now')) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 font-mono text-gray-900">
                                <div class="text-lg"><?= esc($member['email'] ?? 'N/A') ?></div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-phone text-gray-500"></i>
                                    <span class="font-mono text-lg"><?= esc($member['phone'] ?? 'N/A') ?></span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <?php 
                                $status = $member['status'] ?? 'active';
                                if ($status == 'active') {
                                    $statusClass = 'bg-emerald-100 text-emerald-800 shadow-lg shadow-emerald-200/50';
                                } elseif ($status == 'inactive') {
                                    $statusClass = 'bg-orange-100 text-orange-800 shadow-lg shadow-orange-200/50';
                                } else {
                                    $statusClass = 'bg-gray-100 text-gray-800 shadow-lg shadow-gray-200/50';
                                }
                                ?>
                                <span class="inline-flex px-6 py-3 rounded-2xl font-bold text-lg <?= $statusClass ?>">
                                    <?= ucfirst($status) ?>
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex flex-wrap gap-2">
                                    <a href="<?= base_url('admin/member/' . ($member['id'] ?? 1) . '/idcard/view') ?>" 
                                       class="group bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-2xl font-bold hover:shadow-xl hover:-translate-y-1 transition-all flex items-center space-x-2 shadow-lg">
                                        <i class="fas fa-eye text-lg group-hover:rotate-12 transition-transform"></i>
                                        <span>View</span>
                                    </a>
                                    <a href="<?= base_url('admin/member/' . ($member['id'] ?? 1) . '/idcard/download') ?>" 
                                       class="group bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-6 py-3 rounded-2xl font-bold hover:shadow-xl hover:-translate-y-1 transition-all flex items-center space-x-2 shadow-lg">
                                        <i class="fas fa-download text-lg group-hover:-translate-y-1 transition-transform"></i>
                                        <span>Download</span>
                                    </a>
                                    <button class="group bg-gradient-to-r from-purple-500 to-pink-600 text-white px-6 py-3 rounded-2xl font-bold hover:shadow-xl hover:-translate-y-1 transition-all flex items-center space-x-2 shadow-lg">
                                        <i class="fas fa-edit text-lg"></i>
                                        <span>Edit</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-12">
        <div class="bg-white/70 backdrop-blur-sm px-8 py-4 rounded-3xl shadow-2xl border border-white/50 flex items-center space-x-2">
            <span class="font-bold text-gray-900">Page 1 of <?= ceil(($members_count ?? 0) / 10) ?></span>
            <div class="flex space-x-2">
                <button class="w-12 h-12 bg-gray-200 hover:bg-gray-300 rounded-2xl flex items-center justify-center font-bold transition-all">←</button>
                <button class="w-12 h-12 bg-emerald-500 text-white rounded-2xl flex items-center justify-center font-bold shadow-lg hover:shadow-xl transition-all">1</button>
                <button class="w-12 h-12 bg-gray-200 hover:bg-gray-300 rounded-2xl flex items-center justify-center font-bold transition-all">→</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
