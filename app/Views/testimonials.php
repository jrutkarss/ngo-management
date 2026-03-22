<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-5xl">
        <h1 class="text-5xl font-black mb-6">Testimonials</h1>
        <p class="text-lg text-gray-600 mb-10">Hear from those whose lives have been touched by our programs.</p>

        <div class="space-y-8">
            <div class="bg-white rounded-3xl p-10 shadow-lg">
                <p class="text-gray-700 mb-4">"The health camp helped my family when we had nowhere else to turn. The team was kind and caring."</p>
                <p class="text-sm text-gray-500">— Priya, Beneficiary</p>
            </div>
            <div class="bg-white rounded-3xl p-10 shadow-lg">
                <p class="text-gray-700 mb-4">"I was able to start a small business after the training program. Thank you for the support."</p>
                <p class="text-sm text-gray-500">— Arvind, Community Member</p>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
