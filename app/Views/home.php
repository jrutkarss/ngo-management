<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>
  <section class="hero-bg min-h-screen pt-20 flex items-center">
        <div class="max-w-7xl mx-auto px-6 py-12 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Text content - now with better contrast -->
                <div class="space-y-8 text-center lg:text-left bg-white/70 p-8 rounded-xl backdrop-blur-sm card-shadow">
                    <div class="space-y-6">
                        <h1 class="font-display text-4xl md:text-5xl lg:text-6xl leading-tight text-moss text-shadow">
                            <span class="block">Nurture Your</span>
                            <span class="block font-light">Plant Paradise</span>
                        </h1>
                        <p class="text-lg text-text-dark/90 max-w-lg mx-auto lg:mx-0">
                            Discover the joy of gardening with our premium plant selection and expert care guides. Transform your space into a lush oasis.
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#" class="px-8 py-3 bg-leaf text-white font-medium rounded-full hover:bg-moss transition-colors shadow-md">
                            Shop Plants
                        </a>
                        <a href="#" class="px-8 py-3 border border-text-dark text-text-dark font-medium rounded-full hover:bg-white transition-colors">
                            Learn More
                        </a>
                    </div>
                </div>
                
                <!-- Featured plant card -->
                <div class="relative animate-float">
                    <div class="bg-white rounded-2xl overflow-hidden shadow-xl border border-cream/50 card-shadow">
                        <img src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1472&q=80" 
                             alt="Featured plant"
                             class="w-full h-80 object-cover">
                        <div class="p-6">
                            <h3 class="font-display text-xl text-moss">Monstera Deliciosa</h3>
                            <p class="text-text-dark/80 mt-1">"The Swiss Cheese Plant"</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="font-medium text-leaf text-lg">$39.99</span>
                                <button class="px-4 py-2 bg-blossom text-white rounded-full text-sm font-medium hover:bg-blossom/90 transition-colors">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 bg-leaf-light text-white px-4 py-2 rounded-full text-sm font-medium shadow">
                        Popular Choice
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Plant benefits section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="font-display text-3xl text-center text-moss mb-12">Why Plants Make Life Better</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-cream p-8 rounded-xl shadow-md border border-cream/50 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-leaf/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#3A5A40" viewBox="0 0 16 16">
                            <path d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                            <path d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl text-moss mb-2">Air Purification</h3>
                    <p class="text-text-dark/80">Plants naturally filter toxins and release oxygen, improving your indoor air quality.</p>
                </div>
                
                <div class="bg-cream p-8 rounded-xl shadow-md border border-cream/50 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-leaf/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#3A5A40" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl text-moss mb-2">Stress Reduction</h3>
                    <p class="text-text-dark/80">Caring for plants lowers stress levels and promotes mindfulness.</p>
                </div>
                
                <div class="bg-cream p-8 rounded-xl shadow-md border border-cream/50 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-leaf/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#3A5A40" viewBox="0 0 16 16">
                            <path d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl text-moss mb-2">Productivity Boost</h3>
                    <p class="text-text-dark/80">Greenery in your workspace can increase productivity by up to 15%.</p>
                </div>
            </div>
        </div>
    </div>
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
