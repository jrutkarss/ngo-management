<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-5xl">
        <h1 class="text-5xl font-black mb-6">Upcoming Events</h1>
        <p class="text-lg text-gray-600 mb-10">Stay tuned for our upcoming community events, drives, and campaigns. Check back soon for the latest schedule.</p>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white rounded-3xl p-10 shadow-lg">
                <h2 class="text-2xl font-bold mb-3">Community Health Camp</h2>
                <p class="text-gray-600 mb-4">A free health camp offering checkups, medicines, and awareness sessions for local families.</p>
                <div class="text-sm text-gray-500">Date: TBD</div>
            </div>
            <div class="bg-white rounded-3xl p-10 shadow-lg">
                <h2 class="text-2xl font-bold mb-3">Education Drive</h2>
                <p class="text-gray-600 mb-4">Join us to distribute school supplies and conduct learning workshops for children in need.</p>
                <div class="text-sm text-gray-500">Date: TBD</div>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
