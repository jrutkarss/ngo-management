<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-5xl">
        <h1 class="text-5xl font-black mb-6">Latest Activity</h1>
        <p class="text-lg text-gray-600 mb-10">See what we've been up to recently.</p>

        <div class="space-y-6">
            <div class="bg-white p-8 rounded-3xl shadow-lg">
                <h2 class="text-2xl font-bold mb-2">Community Health Camp Completed</h2>
                <p class="text-gray-600">We successfully ran a health camp supporting over 250 families with free checkups and medicines.</p>
                <p class="text-sm text-gray-500 mt-3">Mar 15, 2026</p>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-lg">
                <h2 class="text-2xl font-bold mb-2">Education Drive Launched</h2>
                <p class="text-gray-600">Our education drive distributed school supplies to 500 children in the region.</p>
                <p class="text-sm text-gray-500 mt-3">Feb 28, 2026</p>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
