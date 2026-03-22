<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'NGO Management') ?> | NGO Org</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    
    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md shadow-xl sticky top-0 z-50 border-b border-gray-200/50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="/" class="text-3xl font-black bg-gradient-to-r from-purple-600 via-pink-600 to-indigo-600 bg-clip-text text-transparent hover:scale-105 transition-all">
                    <i class="fas fa-heart text-red-500 mr-3"></i>NGO Org
                </a>

                <!-- ✅ FIXED: Always show default navbar -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="/" class="text-lg font-medium text-gray-700 hover:text-purple-600 transition-all flex items-center space-x-1">
                        <i class="fas fa-home"></i><span>Home</span>
                    </a>
                    <a href="/about" class="text-lg font-medium text-gray-700 hover:text-purple-600 transition-all flex items-center space-x-1">
                        <i class="fas fa-info-circle"></i><span>About</span>
                    </a>
                    <a href="/events" class="text-lg font-medium text-gray-700 hover:text-purple-600 transition-all flex items-center space-x-1">
                        <i class="fas fa-calendar-alt"></i><span>Events</span>
                    </a>
                    <a href="/gallery" class="text-lg font-medium text-gray-700 hover:text-purple-600 transition-all flex items-center space-x-1">
                        <i class="fas fa-images"></i><span>Gallery</span>
                    </a>
                    <a href="/donate" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-3 rounded-2xl font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all flex items-center space-x-2">
                        <i class="fas fa-heart"></i><span>Donate</span>
                    </a>
                    <a href="/member/login" class="text-lg font-medium text-gray-700 hover:text-purple-600 transition-all">
                        Member
                    </a>
                    <a href="/admin/login" class="text-lg font-medium text-gray-700 hover:text-purple-600 transition-all">
                        Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-4 pb-20">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-900 via-slate-900 to-black text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <!-- Logo & Description -->
                <div>
                    <div class="flex items-center mb-6">
                        <i class="fas fa-heart text-3xl text-red-500 mr-3"></i>
                        <span class="text-2xl font-black bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">NGO Org</span>
                    </div>
                    <p class="text-gray-300 leading-relaxed mb-6">Transforming lives through compassion, dedication, and unwavering commitment to social good.</p>
                </div>
                <!-- Quick Links -->
                <div>
                    <h4 class="text-xl font-bold mb-8">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="/" class="text-gray-300 hover:text-white flex items-center space-x-2"><i class="fas fa-chevron-right w-4"></i><span>Home</span></a></li>
                        <li><a href="/about" class="text-gray-300 hover:text-white flex items-center space-x-2"><i class="fas fa-chevron-right w-4"></i><span>About</span></a></li>
                        <li><a href="/donate" class="text-gray-300 hover:text-white flex items-center space-x-2"><i class="fas fa-chevron-right w-4"></i><span>Donate</span></a></li>
                    </ul>
                </div>
                <!-- Contact -->
                <div>
                    <h4 class="text-xl font-bold mb-8">Contact</h4>
                    <div class="space-y-3 text-gray-300">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-purple-400"></i>
                            <span>Meerut, Uttar Pradesh</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-green-400"></i>
                            <span>+91 98765 43210</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-pink-400"></i>
                            <span>info@ngo.org</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; 2026 NGO Organization. All rights reserved. | Made with ❤️ in Meerut</p>
            </div>
        </div>
    </footer>
</body>
</html>
