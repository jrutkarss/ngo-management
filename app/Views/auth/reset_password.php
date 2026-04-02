<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-md">
        <div class="bg-white p-10 rounded-3xl shadow-lg">
            <div class="flex items-center justify-center mb-6">
                <i class="fas fa-shield-alt text-4xl text-purple-600"></i>
            </div>
            <h1 class="text-3xl font-bold mb-2 text-center">Reset Your Password</h1>
            <p class="text-sm text-gray-600 text-center mb-6">Enter your new password below.</p>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-4 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('reset-password') ?>" method="post" class="space-y-4">
                <?= csrf_field() ?>
                
                <input type="hidden" name="token" value="<?= esc($token) ?>">
                <input type="hidden" name="member_id" value="<?= esc($member_id) ?>">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">New Password * (Min 6 characters)</label>
                    <input type="password" name="password" placeholder="Enter your new password" class="w-full p-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent" required minlength="6">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password *</label>
                    <input type="password" name="confirm_password" placeholder="Re-enter your password" class="w-full p-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent" required minlength="6">
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-sm text-blue-700">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Password Requirements:</strong>
                    <ul class="ml-6 mt-2 space-y-1">
                        <li>✓ At least 6 characters long</li>
                        <li>✓ Mix of uppercase and lowercase letters (recommended)</li>
                        <li>✓ Include numbers and special characters (recommended)</li>
                    </ul>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-6 rounded-xl font-semibold hover:shadow-lg transition-shadow">Reset Password</button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500">
                <a href="<?= base_url('/member/login') ?>" class="text-purple-600 hover:underline font-medium">← Back to Login</a>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
