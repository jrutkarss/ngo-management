<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Jan Prakrati Seva Trust') ?> | NGO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Open+Sans:wght@400;500;700&display=swap');
        body { font-family: 'Inter', sans-serif; 
    overflow-x: hidden; }
        .logo { transition: transform 0.3s ease; }
        .logo:hover { transform: rotate(360deg) scale(1.1); }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'leaf': '#3A5A40',
                        'leaf-light': '#588157',
                        'earth': '#5E4B2E',
                        'moss': '#344E41',
                        'blossom': '#DDA15E',
                        'cream': '#F8F9FA',
                        'text-dark': '#2F3E46',
                    },
                    fontFamily: {
                        'sans': ['"Open Sans"', 'sans-serif'],
                        'display': ['"Libre Baskerville"', 'serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .hero-bg {
            background-image: 
                linear-gradient(rgba(248, 249, 250, 0.7), rgba(248, 249, 250, 0.3)),
                url('/img_gal/image8.jpeg');
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
        }
        .text-shadow { text-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .card-shadow { box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="font-sans bg-cream text-text-dark">
    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden">
        <div class="fixed right-0 top-0 h-full w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out">
            <div class="p-6">
                <div class="flex justify-between items-center mb-8">
                    <div class="flex items-center space-x-3">
                        <img src="/jan_prakarti.png" alt="NGO Logo" class="h-12">
                        <span class="font-display text-xl text-moss">Jan Prakrati</span>
                    </div>
                    <button onclick="toggleMobileMenu()" class="text-2xl text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <!-- Mobile Navigation Links -->
                <div class="space-y-4">
                    <a href="/" class="block py-3 px-4 text-lg font-medium text-text-dark hover:text-leaf border-r-4 border-transparent hover:border-leaf transition-all">
                        <i class="fas fa-home mr-3"></i>Home
                    </a>
                    <a href="/about" class="block py-3 px-4 text-lg font-medium text-text-dark hover:text-leaf border-r-4 border-transparent hover:border-leaf transition-all">
                        <i class="fas fa-info-circle mr-3"></i>About
                    </a>
                    <!-- <a href="/objectives" class="block py-3 px-4 text-lg font-medium text-text-dark hover:text-leaf border-r-4 border-transparent hover:border-leaf transition-all">
                        <i class="fas fa-bullseye mr-3"></i>Objectives
                    </a>
                    <a href="/president" class="block py-3 px-4 text-lg font-medium text-text-dark hover:text-leaf border-r-4 border-transparent hover:border-leaf transition-all">
                        <i class="fas fa-user-tie mr-3"></i>President
                    </a> -->
                    <a href="/team" class="block py-3 px-4 text-lg font-medium text-text-dark hover:text-leaf border-r-4 border-transparent hover:border-leaf transition-all">
                        <i class="fas fa-users mr-3"></i>Team
                    </a>
                    <a href="/events" class="block py-3 px-4 text-lg font-medium text-text-dark hover:text-leaf border-r-4 border-transparent hover:border-leaf transition-all">
                        <i class="fas fa-calendar-alt mr-3"></i>Events
                    </a>
                    <a href="/activity" class="block py-3 px-4 text-lg font-medium text-text-dark hover:text-leaf border-r-4 border-transparent hover:border-leaf transition-all">
                        <i class="fas fa-tasks mr-3"></i>Activities
                    </a>
                    <a href="/gallery" class="block py-3 px-4 text-lg font-medium text-text-dark hover:text-leaf border-r-4 border-transparent hover:border-leaf transition-all">
                        <i class="fas fa-images mr-3"></i>Gallery
                    </a>
                    <a href="/videos" class="block py-3 px-4 text-lg font-medium text-text-dark hover:text-leaf border-r-4 border-transparent hover:border-leaf transition-all">
                        <i class="fas fa-video mr-3"></i>Videos
                    </a>
                    <a href="/donate" class="block py-3 px-4 text-lg font-medium text-text-dark hover:text-leaf border-r-4 border-transparent hover:border-leaf transition-all">
                        <i class="fas fa-heart mr-3"></i>Donate
                    </a>
                </div>

                <!-- Mobile Auth Links -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <a href="/member/dashboard" class="block w-full py-4 px-6 bg-leaf text-white rounded-xl text-lg font-semibold mb-4 flex items-center justify-center space-x-2 hover:bg-moss transition-all">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="/logout" class="block w-full py-3 px-4 text-lg font-medium text-earth hover:text-moss border border-earth rounded-xl hover:bg-earth/10 transition-all text-center">
                            Logout
                        </a>
                    <?php else: ?>
                        <a href="/member/login" class="block w-full py-3 px-4 text-lg font-semibold text-leaf bg-leaf/10 border-2 border-leaf rounded-xl hover:bg-leaf hover:text-white transition-all mb-3 text-center">
                            Sign In
                        </a>
                        <a href="/member/register" class="block w-full py-3 px-4 text-lg font-semibold bg-blossom text-white border-2 border-blossom rounded-xl hover:bg-earth hover:border-earth transition-all text-center">
                            Sign Up
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-sm fixed w-full z-50 border-b border-leaf/20 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <img src="/jan_prakarti.png" alt="NGO Logo" class="h-12 logo">
                    <a href="/" class="font-display text-2xl text-moss hidden sm:block">Jan Prakrati Seva Trust</a>
                    <a href="/" class="font-display text-xl text-moss sm:hidden">Jan Prakrati</a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex space-x-1 xl:space-x-2 2xl:space-x-4 items-center">
                    <a href="/" class="text-sm font-medium text-text-dark hover:text-leaf px-3 py-2 rounded-lg transition-all hover:bg-leaf/10" title="Home">
                        <i class="fas fa-home"></i>
                    </a>
                    <a href="/about" class="text-sm font-medium text-text-dark hover:text-leaf px-3 py-2 rounded-lg transition-all hover:bg-leaf/10" title="About">About</a>
                    <a href="/objectives" class="text-sm font-medium text-text-dark hover:text-leaf px-3 py-2 rounded-lg transition-all hover:bg-leaf/10" title="Objectives">Objectives</a>
                    <a href="/president" class="text-sm font-medium text-text-dark hover:text-leaf px-3 py-2 rounded-lg transition-all hover:bg-leaf/10" title="President">President</a>
                    <a href="/team" class="text-sm font-medium text-text-dark hover:text-leaf px-3 py-2 rounded-lg transition-all hover:bg-leaf/10" title="Team">Team</a>
                    <a href="/events" class="text-sm font-medium text-text-dark hover:text-leaf px-3 py-2 rounded-lg transition-all hover:bg-leaf/10" title="Events">Events</a>
                    <a href="/gallery" class="text-sm font-medium text-text-dark hover:text-leaf px-3 py-2 rounded-lg transition-all hover:bg-leaf/10" title="Gallery">Gallery</a>
                    <a href="/donate" class="text-sm font-medium text-text-dark hover:text-leaf px-3 py-2 rounded-lg transition-all hover:bg-leaf/10" title="Donate">Donate</a>
                </div>
                
                <!-- Auth Buttons & Mobile Menu -->
                <div class="flex items-center space-x-2">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <a href="/member/dashboard" 
                           class="hidden md:inline-flex px-4 py-2 bg-leaf text-white rounded-full text-sm font-semibold hover:bg-moss transition-all duration-200 items-center space-x-2 shadow-lg hover:shadow-xl">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="/logout" 
                           class="hidden sm:inline-flex px-4 py-2 bg-red-500 text-white rounded-full text-sm font-semibold hover:bg-red-600 transition-all duration-200 shadow-lg hover:shadow-xl">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    <?php else: ?>
                        <a href="/member/login" 
                           class="hidden md:inline-flex px-4 py-2 bg-leaf text-white rounded-full text-sm font-semibold hover:bg-moss transition-all duration-200 mr-2 shadow-lg hover:shadow-xl">
                            Sign In
                        </a>
                        <a href="/member/register" 
                           class="hidden sm:inline-flex px-4 py-2 bg-blossom text-white rounded-full text-sm font-semibold hover:bg-earth transition-all duration-200 shadow-lg hover:shadow-xl">
                            Sign Up
                        </a>
                    <?php endif; ?>
                    
                    <!-- Mobile Menu Button -->
                    <button onclick="toggleMobileMenu()" class="lg:hidden p-2 text-text-dark hover:text-leaf transition-colors rounded-lg hover:bg-leaf/10">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-15 pb-20">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-[#1A1D2B] text-white">
        <div class="container mx-auto px-6 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Logo & Description -->
                <div class="space-y-6">
                    <a href="/" class="flex items-center space-x-3">
                        <img src="/jan_prakarti.png" alt="NGO Logo" class="w-16 h-16">
                        <span class="text-2xl font-bold text-white">Jan Prakrati Seva Trust</span>
                    </a>
                    <p class="text-gray-300 leading-relaxed">
                        Social service, cow welfare, and environmental conservation organization. Raising awareness and helping those in need through various initiatives.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition-all">
                            <i class="fab fa-linkedin text-gray-300"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition-all">
                            <i class="fab fa-twitter text-gray-300"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-700 transition-all">
                            <i class="fab fa-facebook text-gray-300"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-6 flex items-center space-x-2">
                        <i class="fas fa-link text-leaf"></i>
                        <span>Quick Links</span>
                    </h3>
                    <ul class="space-y-3">
                        <li><a href="/about" class="text-gray-300 hover:text-white transition-colors flex items-center space-x-2">
                            <i class="fas fa-chevron-right w-4"></i>
                            <span>About Us</span>
                        </a></li>
                        <li><a href="/objectives" class="text-gray-300 hover:text-white transition-colors flex items-center space-x-2">
                            <i class="fas fa-chevron-right w-4"></i>
                            <span>Objectives</span>
                        </a></li>
                        <li><a href="/" class="text-gray-300 hover:text-white transition-colors flex items-center space-x-2">
                            <i class="fas fa-chevron-right w-4"></i>
                            <span>President</span>
                        </a></li>
                        <li><a href="/team" class="text-gray-300 hover:text-white transition-colors flex items-center space-x-2">
                            <i class="fas fa-chevron-right w-4"></i>
                            <span>Team</span>
                        </a></li>
                    </ul>
                </div>

                <!-- Activities -->
                <div>
                    <h3 class="text-lg font-semibold mb-6 flex items-center space-x-2">
                        <i class="fas fa-calendar-check text-leaf"></i>
                        <span>Activities</span>
                    </h3>
                    <ul class="space-y-3">
                        <li><a href="/events" class="text-gray-300 hover:text-white transition-colors flex items-center space-x-2">
                            <i class="fas fa-chevron-right w-4"></i>
                            <span>Events</span>
                        </a></li>
                        <li><a href="/activity" class="text-gray-300 hover:text-white transition-colors flex items-center space-x-2">
                            <i class="fas fa-chevron-right w-4"></i>
                            <span>Activities</span>
                        </a></li>
                        <li><a href="/gallery" class="text-gray-300 hover:text-white transition-colors flex items-center space-x-2">
                            <i class="fas fa-chevron-right w-4"></i>
                            <span>Gallery</span>
                        </a></li>
                        <li><a href="/videos" class="text-gray-300 hover:text-white transition-colors flex items-center space-x-2">
                            <i class="fas fa-chevron-right w-4"></i>
                            <span>Videos</span>
                        </a></li>
                    </ul>
                </div>

                <!-- Member Actions -->
                <div>
                    <h3 class="text-lg font-semibold mb-6 flex items-center space-x-2">
                        <i class="fas fa-user-circle text-leaf"></i>
                        <span>Members</span>
                    </h3>
                    <?php if (session()->get('isLoggedIn')): ?>
                        <div class="space-y-3">
                            <a href="/member/dashboard" class="block w-full bg-leaf text-white py-3 px-4 rounded-lg text-center font-semibold hover:bg-moss transition-all flex items-center justify-center space-x-2">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>My Dashboard</span>
                            </a>
                            <a href="/donate" class="block w-full border-2 border-gray-600 text-gray-300 py-3 px-4 rounded-lg text-center hover:bg-gray-800 hover:border-gray-500 hover:text-white transition-all">
                                Donate Now
                            </a>
                        </div>
                    <?php else: ?>
                        <ul class="space-y-3">
                            <li><a href="/member/register" class="text-gray-300 hover:text-white transition-colors flex items-center space-x-2">
                                <i class="fas fa-chevron-right w-4"></i>
                                <span>Join Us</span>
                            </a></li>
                            <li><a href="/member/login" class="text-gray-300 hover:text-white transition-colors flex items-center space-x-2">
                                <i class="fas fa-chevron-right w-4"></i>
                                <span>Member Login</span>
                            </a></li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-700 pt-8 mt-12">
                <div class="text-center text-gray-400">
                    © 2024 Jan Prakrati Seva Trust. Crafted with <span class="text-red-400">♥</span> by <a href="#" class="hover:text-white font-semibold">Innova Bharat</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            if (!menu.classList.contains('hidden')) {
                document.body.style.overflow = 'hidden';
                menu.querySelector('.translate-x-full').classList.remove('translate-x-full');
            } else {
                document.body.style.overflow = 'auto';
                menu.querySelector('.translate-x-full').classList.add('translate-x-full');
            }
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobile-menu');
            const menuButton = event.target.closest('button[onclick="toggleMobileMenu()"]');
            if (menu.classList.contains('hidden') === false && !menu.contains(event.target) && !menuButton) {
                toggleMobileMenu();
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>