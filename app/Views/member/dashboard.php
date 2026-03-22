<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-4xl">
        <h1 class="text-4xl font-bold mb-6">Member Dashboard</h1>

        <div class="bg-white p-10 rounded-3xl shadow-lg">
            <p class="text-gray-700 mb-4">Welcome back, <strong><?= esc($member['name']) ?></strong>!</p>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gray-50 p-6 rounded-2xl">
                    <h2 class="text-xl font-semibold mb-2">Your Info</h2>
                    <p><strong>Email:</strong> <?= esc($member['email']) ?></p>
                    <p><strong>Phone:</strong> <?= esc($member['phone']) ?></p>
                    <p><strong>Status:</strong> <?= esc($member['status'] ?? 'Active') ?></p>
                </div>

                <div class="bg-gray-50 p-6 rounded-2xl">
                    <h2 class="text-xl font-semibold mb-2">Actions</h2>
                    <a href="<?= base_url('/member/idcard') ?>" class="inline-block bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 px-6 rounded-xl font-semibold hover:opacity-90">Download ID Card</a>
                </div>
            </div>

            <div class="mt-8">
                <a href="<?= base_url('/logout') ?>" class="text-sm text-gray-500 hover:text-gray-800">Logout</a>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
