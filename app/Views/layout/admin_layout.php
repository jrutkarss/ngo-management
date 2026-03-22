<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title', 'Admin') ?> | Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 to-slate-100 min-h-screen">
    
    <!-- Admin Navbar -->
    <nav class="bg-gradient-to-r from-purple-600 to-pink-600 shadow-2xl sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="/admin" class="text-3xl font-black text-white">
                    <i class="fas fa-cogs mr-3"></i>Admin Panel
                </a>
                <div class="flex items-center space-x-4">
                    <a href="/admin/members" class="text-white px-6 py-3 rounded-xl bg-white/20 hover:bg-white/30 transition-all">Members</a>
                    <a href="/admin/donations" class="text-white px-6 py-3 rounded-xl bg-white/20 hover:bg-white/30 transition-all">Donations</a>
                    <a href="/" class="text-white px-6 py-3 border border-white rounded-xl hover:bg-white hover:text-purple-600 transition-all">← Public</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Admin Content -->
    <main class="container mx-auto px-6 py-12">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Simple Footer -->
    <footer class="bg-gray-900 text-white py-8 text-center">
        <p>&copy; 2026 NGO Management. Admin Panel.</p>
    </footer>
</body>
</html>
