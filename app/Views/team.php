<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-6xl">
        <h1 class="text-5xl font-black mb-6">Our Management Team</h1>
        <p class="text-lg text-gray-600 mb-10">A dedicated team working together to deliver social impact and support our community.</p>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-3xl p-8 shadow-lg text-center">
                <div class="w-28 h-28 mx-auto rounded-full bg-gradient-to-tr from-purple-500 to-pink-500 flex items-center justify-center text-white text-4xl font-bold">A</div>
                <h3 class="text-xl font-bold mt-6">Anjali Sharma</h3>
                <p class="text-gray-600">Founder & Executive Director</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-lg text-center">
                <div class="w-28 h-28 mx-auto rounded-full bg-gradient-to-tr from-blue-500 to-green-500 flex items-center justify-center text-white text-4xl font-bold">R</div>
                <h3 class="text-xl font-bold mt-6">Rajesh Kumar</h3>
                <p class="text-gray-600">Operations Head</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-lg text-center">
                <div class="w-28 h-28 mx-auto rounded-full bg-gradient-to-tr from-yellow-500 to-orange-500 flex items-center justify-center text-white text-4xl font-bold">S</div>
                <h3 class="text-xl font-bold mt-6">Simran Kaur</h3>
                <p class="text-gray-600">Program Manager</p>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
