<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' | ' : '' ?>NGO Management</title>
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
                <div class="hidden md:flex items-center space-x-8">
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
                    <a href="/donate" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-3 rounded-2xl font-semibold shadow-lg hover:shadow-xl hover:scale-105 transform transition-all duration-300 flex items-center space-x-2">
                        <i class="fas fa-heart"></i><span>Donate</span>
                    </a>
                    <a href="/admin" class="text-purple-600 font-semibold border border-purple-600 px-6 py-3 rounded-xl hover:bg-purple-600 hover:text-white transition-all">
                        <i class="fas fa-cog"></i> Admin
                    </a>
                </div>
                <!-- Mobile menu button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden bg-white/90 backdrop-blur-md border-t border-gray-200 hidden">
            <div class="container mx-auto px-6 py-4 space-y-4">
                <a href="/" class="block py-3 px-4 rounded-xl hover:bg-purple-50 border-r-4 border-transparent hover:border-purple-600">
                    <i class="fas fa-home mr-3"></i>Home
                </a>
                <a href="/about" class="block py-3 px-4 rounded-xl hover:bg-purple-50 border-r-4 border-transparent hover:border-purple-600">
                    <i class="fas fa-info-circle mr-3"></i>About
                </a>
                <a href="/donate" class="block py-3 px-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-semibold">
                    <i class="fas fa-heart mr-3"></i>Donate
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-4 pb-20">
