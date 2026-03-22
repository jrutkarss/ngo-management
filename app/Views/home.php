<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-6 py-20 max-w-7xl">
    
    <!-- Hero Section -->
    <div class="text-center mb-24">
        <div class="inline-block bg-gradient-to-r from-purple-500 to-pink-500 p-4 rounded-3xl mb-8 shadow-2xl">
            <i class="fas fa-heart text-3xl text-white"></i>
        </div>
        <h1 class="text-6xl md:text-7xl font-black bg-gradient-to-r from-gray-900 via-gray-800 to-slate-900 bg-clip-text text-transparent mb-6 leading-tight">
            Transforming <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">Lives</span>
        </h1>
        <p class="text-xl md:text-2xl text-gray-600 mb-12 max-w-4xl mx-auto leading-relaxed">
            Dedicated to education, healthcare, and community development across Uttar Pradesh.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="<?= base_url('donate') ?>" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-12 py-5 rounded-3xl text-xl font-bold shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition-all duration-300 flex items-center space-x-3">
                <i class="fas fa-heart"></i>
                <span>💝 Donate Now</span>
            </a>
            <a href="<?= base_url('about') ?>" class="border-3 border-gray-300 text-gray-800 px-12 py-5 rounded-3xl text-xl font-bold hover:bg-gray-100 hover:shadow-xl transition-all duration-300">
                Learn More
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <section class="mb-24">
        <div class="grid md:grid-cols-4 gap-8 text-center">
            <div class="group bg-white/70 backdrop-blur-sm p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 border border-white/50">
                <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">₹</div>
                <h3 class="text-3xl font-bold text-gray-900 mb-3">₹12.5L+</h3>
                <p class="text-gray-600 font-semibold text-lg">Total Raised</p>
            </div>
            <div class="group bg-white/70 backdrop-blur-sm p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 border border-white/50">
                <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">👥</div>
                <h3 class="text-3xl font-bold text-gray-900 mb-3">856+</h3>
                <p class="text-gray-600 font-semibold text-lg">Active Members</p>
            </div>
            <div class="group bg-white/70 backdrop-blur-sm p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 border border-white/50">
                <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">📅</div>
                <h3 class="text-3xl font-bold text-gray-900 mb-3">47+</h3>
                <p class="text-gray-600 font-semibold text-lg">Events Held</p>
            </div>
            <div class="group bg-white/70 backdrop-blur-sm p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 border border-white/50">
                <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">❤️</div>
                <h3 class="text-3xl font-bold text-gray-900 mb-3">98%</h3>
                <p class="text-gray-600 font-semibold text-lg">Success Rate</p>
            </div>
        </div>
    </section>

    <!-- Feature Cards -->
    <section class="mb-24">
        <h2 class="text-4xl font-bold text-center mb-20 bg-gradient-to-r from-gray-900 to-slate-900 bg-clip-text text-transparent">Our Services</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <a href="/about" class="group p-10 bg-white rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition-all duration-500 border border-white/50">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-3xl flex items-center justify-center text-2xl mb-6 mx-auto group-hover:scale-110 transition-all">
                    👥
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Membership</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">Join our community and get your official ID card</p>
                <div class="text-center">
                    <span class="text-blue-600 font-semibold hover:underline cursor-pointer">Learn More →</span>
                </div>
            </a>
            <a href="/donate" class="group p-10 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition-all duration-500">
                <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center text-2xl mb-6 mx-auto group-hover:scale-110 transition-all">
                    ❤️
                </div>
                <h3 class="text-2xl font-bold mb-4 text-center">Donations</h3>
                <p class="text-white/90 text-center mb-6 leading-relaxed">Secure payments via Razorpay</p>
                <div class="text-center">
                    <span class="text-white font-semibold hover:underline cursor-pointer bg-white/20 px-4 py-2 rounded-xl">Donate Now →</span>
                </div>
            </a>
            <a href="/gallery" class="group p-10 bg-white rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition-all duration-500 border border-white/50">
                <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-600 rounded-3xl flex items-center justify-center text-2xl mb-6 mx-auto group-hover:scale-110 transition-all">
                    🖼️
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Gallery</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">Our events and activities</p>
                <div class="text-center">
                    <span class="text-green-600 font-semibold hover:underline cursor-pointer">View Gallery →</span>
                </div>
            </a>
            <a href="/admin" class="group p-10 bg-gradient-to-r from-gray-800 to-slate-900 text-white rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition-all duration-500">
                <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center text-2xl mb-6 mx-auto group-hover:scale-110 transition-all">
                    ⚙️
                </div>
                <h3 class="text-2xl font-bold mb-4 text-center">Admin Panel</h3>
                <p class="text-white/90 text-center mb-6 leading-relaxed">Manage members & donations</p>
                <div class="text-center">
                    <span class="text-white font-semibold hover:underline cursor-pointer">Admin Login →</span>
                </div>
            </a>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="text-center py-24 bg-gradient-to-r from-purple-600 via-pink-600 to-indigo-600 text-white rounded-4xl">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Make a Difference?</h2>
        <p class="text-xl mb-12 opacity-90 max-w-3xl mx-auto">Every contribution brings us closer to creating lasting positive change.</p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center max-w-2xl mx-auto">
            <a href="<?= base_url('donate') ?>" class="bg-white text-purple-600 px-12 py-5 rounded-3xl text-xl font-bold shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition-all flex items-center space-x-3">
                <i class="fas fa-credit-card"></i>
                <span>Donate Securely</span>
            </a>
            <a href="<?= base_url('membership') ?>" class="border-3 border-white text-white px-12 py-5 rounded-3xl text-xl font-bold hover:bg-white hover:text-purple-600 transition-all">
                Become Member
            </a>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
