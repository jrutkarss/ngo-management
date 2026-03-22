<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-md">
        <div class="bg-white p-10 rounded-3xl shadow-lg">
            <h1 class="text-3xl font-bold mb-6">Join as a Member</h1>

            <form action="<?= base_url('/member/register') ?>" method="post" class="space-y-4">
                <input type="text" name="name" placeholder="Full Name" class="w-full p-4 rounded-xl border border-gray-200" required>
                <input type="email" name="email" placeholder="Email" class="w-full p-4 rounded-xl border border-gray-200" required>
                <input type="text" name="phone" placeholder="Phone" class="w-full p-4 rounded-xl border border-gray-200" required>
                <input type="text" name="address" placeholder="Address" class="w-full p-4 rounded-xl border border-gray-200" required>
                <input type="password" name="password" placeholder="Password" class="w-full p-4 rounded-xl border border-gray-200" required>
                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-6 rounded-xl font-semibold">Create Account</button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500">
                Already a member? <a href="<?= base_url('/member/login') ?>" class="text-purple-600 hover:underline">Login here</a>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
