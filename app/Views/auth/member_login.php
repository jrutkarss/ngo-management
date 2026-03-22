<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-md">
        <div class="bg-white p-10 rounded-3xl shadow-lg">
            <h1 class="text-3xl font-bold mb-6">Member Login</h1>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-4 p-4 rounded-xl bg-red-50 text-red-700"><?= esc(session()->getFlashdata('error')) ?></div>
            <?php endif; ?>

            <form action="<?= base_url('/member/login') ?>" method="post" class="space-y-4">
                <input type="email" name="email" placeholder="Email" class="w-full p-4 rounded-xl border border-gray-200" required>
                <input type="password" name="password" placeholder="Password" class="w-full p-4 rounded-xl border border-gray-200" required>
                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-6 rounded-xl font-semibold">Login</button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500">
                <a href="<?= base_url('/member/register') ?>" class="text-purple-600 hover:underline">Create an account</a>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
