<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-3xl">
        <div class="bg-white p-10 rounded-3xl shadow-lg text-center">
            <h1 class="text-4xl font-black mb-4">Thank You!</h1>
            <p class="text-lg text-gray-600 mb-6">Your donation was successful.</p>
            <p class="text-gray-700 mb-2"><strong>Payment ID:</strong> <?= esc($payment_id) ?></p>
            <p class="text-gray-700 mb-6"><strong>Amount:</strong> ₹<?= esc(number_format($amount, 2)) ?></p>
            <a href="<?= base_url('/') ?>" class="inline-block bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 px-8 rounded-xl font-semibold">Back to Home</a>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
