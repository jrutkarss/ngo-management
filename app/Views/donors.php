<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-5xl">
        <h1 class="text-5xl font-black mb-6">Our Donors</h1>
        <p class="text-lg text-gray-600 mb-10">We are grateful to the individuals and organizations who support our mission.</p>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-10 rounded-3xl shadow-lg">
                <h3 class="text-2xl font-bold mb-4">Platinum Supporters</h3>
                <ul class="list-disc list-inside text-gray-600">
                    <li>ABC Foundation</li>
                    <li>Helping Hands Trust</li>
                    <li>Global Impact Partners</li>
                </ul>
            </div>
            <div class="bg-white p-10 rounded-3xl shadow-lg">
                <h3 class="text-2xl font-bold mb-4">Individual Contributors</h3>
                <ul class="list-disc list-inside text-gray-600">
                    <li>Ravi Sharma</li>
                    <li>Anita Patel</li>
                    <li>Kumar Brothers</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
