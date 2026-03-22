<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-6xl">
        <h1 class="text-5xl font-black mb-6">Photo Gallery</h1>
        <p class="text-lg text-gray-600 mb-10">Browse moments from our events and outreach programs.</p>

        <div class="grid md:grid-cols-3 gap-8">
            <?php for ($i = 1; $i <= 6; $i++): ?>
                <div class="rounded-3xl overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-15<?= $i ?>?w=800&h=600&fit=crop" alt="Gallery image" class="w-full h-56 object-cover">
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
