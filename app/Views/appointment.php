<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-5xl">
        <h1 class="text-5xl font-black mb-6">Appointment Letter</h1>
        <p class="text-lg text-gray-600 mb-10">Generate a formal appointment letter for roles within the organization.</p>

        <div class="bg-white p-10 rounded-3xl shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Sample Appointment Letter</h2>
            <p class="text-gray-700 mb-4">Dear <strong>Volunteer</strong>,</p>
            <p class="text-gray-700 mb-4">We are pleased to appoint you as a <strong>Community Outreach Volunteer</strong> at NGO Organization. Your role will involve supporting our education and health initiatives across local communities.</p>
            <p class="text-gray-700 mb-4">We look forward to your contribution and dedication.</p>
            <p class="text-gray-700">Sincerely,<br>NGO Organization</p>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
