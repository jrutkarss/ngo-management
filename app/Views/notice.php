<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-5xl">
        <h1 class="text-5xl font-black mb-6">Notice Board</h1>
        <p class="text-lg text-gray-600 mb-10">Important announcements for members and donors.</p>

        <div class="space-y-6">
            <div class="bg-white p-8 rounded-3xl shadow-lg">
                <h2 class="text-2xl font-bold mb-2">Membership Drive Open</h2>
                <p class="text-gray-600">New member registrations are now open. Fill out the form to join our community.</p>
                <p class="text-sm text-gray-500 mt-3">Posted: Mar 10, 2026</p>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-lg">
                <h2 class="text-2xl font-bold mb-2">Fundraising Event</h2>
                <p class="text-gray-600">We are organizing a fundraising event next month. Volunteers and sponsors are welcome.</p>
                <p class="text-sm text-gray-500 mt-3">Posted: Feb 20, 2026</p>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
