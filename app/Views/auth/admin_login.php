<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-md">
        <div class="bg-white p-10 rounded-3xl shadow-lg">
            <div class="flex items-center justify-center mb-6">
                <i class="fas fa-shield-alt text-4xl text-purple-600"></i>
            </div>
            <h1 class="text-3xl font-bold mb-2 text-center">Admin Panel</h1>
            <p class="text-sm text-gray-600 text-center mb-6">Secure Administrator Access</p>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-4 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/admin/login') ?>" method="post" class="space-y-4">
                <?= csrf_field() ?>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Admin Email *</label>
                    <input type="email" name="email" placeholder="Enter admin email" class="w-full p-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password *</label>
                    <input type="password" name="password" placeholder="Enter your password" class="w-full p-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-6 rounded-xl font-semibold hover:shadow-lg transition-shadow">Login to Admin</button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500">
                <a href="<?= base_url('/') ?>" class="text-purple-600 hover:underline">← Back to Website</a>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
