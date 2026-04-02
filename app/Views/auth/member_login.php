<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-md">
        <div class="bg-white p-10 rounded-3xl shadow-lg">
            <h1 class="text-3xl font-bold mb-6">Member Login</h1>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-4 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-4 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200">
                    <i class="fas fa-check-circle mr-2"></i>
                    <?= esc(session()->getFlashdata('success')) ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/member/login') ?>" method="post" class="space-y-4">
                <?= csrf_field() ?>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                    <input type="email" name="email" placeholder="Enter your email" class="w-full p-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password *</label>
                    <input type="password" name="password" placeholder="Enter your password" class="w-full p-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                </div>

                <div class="flex justify-end">
                    <a href="<?= base_url('forgot-password') ?>" class="text-sm text-purple-600 hover:underline font-medium">Forgot Password?</a>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-6 rounded-xl font-semibold hover:shadow-lg transition-shadow">Login</button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500 space-y-3">
                <div>
                    <a href="<?= base_url('/member/register') ?>" class="text-purple-600 hover:underline font-medium">Don't have an account? Create one</a>
                </div>
                <div>
                    <a href="<?= base_url('/contact') ?>" class="text-gray-600 hover:underline">Need help? Contact us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
