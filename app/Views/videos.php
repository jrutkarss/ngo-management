<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-5xl">
        <h1 class="text-5xl font-black mb-6">YouTube Videos</h1>
        <p class="text-lg text-gray-600 mb-10">Watch some highlights from our recent projects.</p>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="rounded-3xl overflow-hidden shadow-lg">
                <iframe class="w-full h-64" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="rounded-3xl overflow-hidden shadow-lg">
                <iframe class="w-full h-64" src="https://www.youtube.com/embed/3GwjfUFyY6M" title="YouTube video" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
