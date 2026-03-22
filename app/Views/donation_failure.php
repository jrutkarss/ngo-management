<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-3xl">
        <div class="bg-white p-10 rounded-3xl shadow-lg text-center">
            <h1 class="text-4xl font-black mb-4">Payment Failed</h1>
            <p class="text-lg text-gray-600 mb-6">Unfortunately, we could not process your payment.</p>
            <p class="text-gray-700 mb-6"><strong>Error:</strong> <?= esc($error ?? 'Unknown error occurred.') ?></p>
            <a href="<?= base_url('/donate') ?>" class="inline-block bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 px-8 rounded-xl font-semibold">Try Again</a>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
