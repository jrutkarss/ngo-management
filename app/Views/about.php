<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-4xl">
        <!-- Hero Section -->
        <div class="text-center mb-20">
            <h1 class="text-5xl md:text-7xl font-black bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent mb-6">
                About Our NGO
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Dedicated to social transformation through education, healthcare, and community development.
            </p>
        </div>

        <!-- Mission Vision -->
        <div class="grid md:grid-cols-2 gap-16 mb-20 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Our Mission</h2>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    To empower underprivileged communities through sustainable development programs, education, 
                    healthcare initiatives, and skill development, creating lasting positive impact.
                </p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-8 rounded-3xl text-center">
                        <i class="fas fa-graduation-cap text-4xl mb-4 block"></i>
                        <h3 class="font-bold text-xl mb-2">Education</h3>
                        <p>5000+ Children</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-8 rounded-3xl text-center">
                        <i class="fas fa-heartbeat text-4xl mb-4 block"></i>
                        <h3 class="font-bold text-xl mb-2">Healthcare</h3>
                        <p>20K+ Patients</p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1578916171728-46686eac8d58?w=600&h=400&fit=crop&crop=center" 
                     alt="NGO Team" class="rounded-3xl shadow-2xl w-full h-96 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-3xl"></div>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid md:grid-cols-4 gap-8 text-center py-20 bg-white/50 rounded-3xl">
            <div><div class="text-4xl font-black text-purple-600 mb-2">15+</div><div class="text-gray-600 font-semibold">Years</div></div>
            <div><div class="text-4xl font-black text-pink-600 mb-2">50K+</div><div class="text-gray-600 font-semibold">Lives Impacted</div></div>
            <div><div class="text-4xl font-black text-green-600 mb-2">100+</div><div class="text-gray-600 font-semibold">Projects</div></div>
            <div><div class="text-4xl font-black text-blue-600 mb-2">98%</div><div class="text-gray-600 font-semibold">Success Rate</div></div>
        </div>
    </div>
</section>
<?=$this->endSection() ?>

