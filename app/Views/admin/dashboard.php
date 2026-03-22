<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-8 py-12 max-w-7xl">
    
    <!-- Header with Stats -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-12 gap-8">
        <div>
            <h1 class="text-5xl lg:text-6xl font-black bg-gradient-to-r from-gray-900 to-slate-800 bg-clip-text text-transparent mb-4">
                Dashboard Overview
            </h1>
            <p class="text-2xl text-gray-600 font-semibold">Welcome back! Here's your NGO stats at a glance</p>
        </div>
        
        <!-- Main KPI Card -->
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white p-8 rounded-4xl shadow-2xl min-w-[300px]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-90 mb-1">Total Donations YTD</p>
                    <div class="text-4xl font-black">₹<?= number_format($donations ?? 285000, 0, '.', ',') ?></div>
                </div>
                <div class="w-20 h-20 bg-white/20 rounded-3xl flex items-center justify-center">
                    <i class="fas fa-chart-line text-3xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
        <!-- Total Members -->
        <div class="group bg-gradient-to-br from-blue-500 to-blue-600 text-white p-8 rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-2 transition-all duration-500 cursor-pointer border border-white/30">
            <div class="flex items-center justify-between mb-6">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center text-2xl shadow-lg">👥</div>
                <div class="text-3xl font-bold bg-white/20 px-4 py-1 rounded-2xl">+<?= rand(8, 25) ?></div>
            </div>
            <h3 class="text-xl font-bold mb-3">Total Members</h3>
            <div class="text-4xl font-black"><?= number_format($members ?? 247) ?></div>
            <p class="text-white/80 text-sm mt-2">Active members</p>
        </div>

        <!-- Total Donations -->
        <div class="group bg-gradient-to-br from-emerald-500 to-teal-600 text-white p-8 rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-2 transition-all duration-500 cursor-pointer border border-white/30">
            <div class="flex items-center justify-between mb-6">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center text-2xl shadow-lg">💰</div>
                <div class="text-3xl font-bold bg-white/20 px-4 py-1 rounded-2xl">+₹<?= number_format(rand(15000, 85000), 0, '.', ',') ?></div>
            </div>
            <h3 class="text-xl font-bold mb-3">Total Donations</h3>
            <div class="text-4xl font-black">₹<?= number_format($donations ?? 285000, 0, '.', ',') ?></div>
            <p class="text-white/80 text-sm mt-2">This year collection</p>
        </div>

        <!-- ID Cards -->
        <div class="group bg-gradient-to-br from-purple-500 to-pink-600 text-white p-8 rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-2 transition-all duration-500 cursor-pointer border border-white/30">
            <div class="flex items-center justify-between mb-6">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center text-2xl shadow-lg">🪪</div>
                <div class="text-3xl font-bold bg-white/20 px-4 py-1 rounded-2xl">+<?= rand(3, 12) ?></div>
            </div>
            <h3 class="text-xl font-bold mb-3">ID Cards Issued</h3>
            <div class="text-4xl font-black"><?= number_format(($members ?? 247) * 0.8) ?></div>
            <p class="text-white/80 text-sm mt-2">Delivered this month</p>
        </div>

        <!-- Pending Tasks -->
        <div class="group bg-gradient-to-br from-orange-500 to-red-500 text-white p-8 rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-2 transition-all duration-500 cursor-pointer border border-white/30">
            <div class="flex items-center justify-between mb-6">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center text-2xl shadow-lg">📋</div>
                <div class="text-3xl font-bold bg-white/20 px-4 py-1 rounded-2xl"><?= rand(2, 8) ?></div>
            </div>
            <h3 class="text-xl font-bold mb-3">Pending Tasks</h3>
            <div class="text-4xl font-black"><?= rand(5, 15) ?></div>
            <p class="text-white/80 text-sm mt-2">Action required</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
        <a href="<?= base_url('admin/members') ?>" class="group bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-10 rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-3 transition-all duration-500 flex flex-col items-center justify-center text-center h-[200px]">
            <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-4xl flex items-center justify-center text-4xl mb-8 group-hover:scale-110 transition-all">👥</div>
            <h3 class="text-2xl font-bold mb-4">Manage Members</h3>
            <p class="opacity-90 mb-6">Add/Edit members, generate ID cards</p>
            <i class="fas fa-arrow-right text-2xl group-hover:translate-x-3 transition-all"></i>
        </a>

        <a href="<?= base_url('admin/donations') ?>" class="group bg-gradient-to-r from-emerald-600 to-teal-600 text-white p-10 rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-3 transition-all duration-500 flex flex-col items-center justify-center text-center h-[200px]">
            <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-4xl flex items-center justify-center text-4xl mb-8 group-hover:scale-110 transition-all">💰</div>
            <h3 class="text-2xl font-bold mb-4">Donations</h3>
            <p class="opacity-90 mb-6">View all donations & receipts</p>
            <i class="fas fa-arrow-right text-2xl group-hover:translate-x-3 transition-all"></i>
        </a>

        <a href="<?= base_url('admin/gallery') ?>" class="group bg-gradient-to-r from-purple-600 to-pink-600 text-white p-10 rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-3 transition-all duration-500 flex flex-col items-center justify-center text-center h-[200px]">
            <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-4xl flex items-center justify-center text-4xl mb-8 group-hover:scale-110 transition-all">🖼️</div>
            <h3 class="text-2xl font-bold mb-4">Photo Gallery</h3>
            <p class="opacity-90 mb-6">Upload & manage photos</p>
            <i class="fas fa-arrow-right text-2xl group-hover:translate-x-3 transition-all"></i>
        </a>

        <a href="<?= base_url('admin/emails') ?>" class="group bg-gradient-to-r from-orange-600 to-red-600 text-white p-10 rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-3 transition-all duration-500 flex flex-col items-center justify-center text-center h-[200px]">
            <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-4xl flex items-center justify-center text-4xl mb-8 group-hover:scale-110 transition-all">📧</div>
            <h3 class="text-2xl font-bold mb-4">Bulk Emails</h3>
            <p class="opacity-90 mb-6">Send notices & updates</p>
            <i class="fas fa-arrow-right text-2xl group-hover:translate-x-3 transition-all"></i>
        </a>
    </div>

    <!-- Recent Activity - STATIC DATA (No fake()) -->
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Recent Members -->
        <div class="bg-white rounded-4xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-8 text-white">
                <h3 class="text-2xl font-bold flex items-center">New Members (12)</h3>
            </div>
            <div class="divide-y divide-gray-100 max-h-96 overflow-y-auto">
                <div class="p-6 hover:bg-gray-50 transition-colors flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-blue-500 rounded-3xl flex items-center justify-center text-xl font-bold text-white">R</div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900">Ravi Kumar</p>
                        <p class="text-sm text-gray-500">ravi@email.com</p>
                    </div>
                    <span class="text-xs font-semibold text-emerald-600 bg-emerald-100 px-3 py-1 rounded-full">2h ago</span>
                </div>
                <div class="p-6 hover:bg-gray-50 transition-colors flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-green-500 rounded-3xl flex items-center justify-center text-xl font-bold text-white">P</div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900">Priya Singh</p>
                        <p class="text-sm text-gray-500">priya@email.com</p>
                    </div>
                    <span class="text-xs font-semibold text-emerald-600 bg-emerald-100 px-3 py-1 rounded-full">5h ago</span>
                </div>
                <div class="p-6 hover:bg-gray-50 transition-colors flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-400 to-purple-500 rounded-3xl flex items-center justify-center text-xl font-bold text-white">A</div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900">Amit Sharma</p>
                        <p class="text-sm text-gray-500">amit@email.com</p>
                    </div>
                    <span class="text-xs font-semibold text-emerald-600 bg-emerald-100 px-3 py-1 rounded-full">1d ago</span>
                </div>
            </div>
        </div>

        <!-- Recent Donations -->
        <div class="bg-white rounded-4xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-emerald-600 to-teal-600 p-8 text-white">
                <h3 class="text-2xl font-bold flex items-center">Recent Donations (8)</h3>
            </div>
            <div class="divide-y divide-gray-100">
                <div class="p-6 hover:bg-gray-50 transition-colors">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold text-gray-900">Rajesh Gupta</span>
                        <span class="font-bold text-2xl text-emerald-600">₹15,000</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Mar 15</span>
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs rounded-full font-semibold">Verified</span>
                    </div>
                </div>
                <div class="p-6 hover:bg-gray-50 transition-colors">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold text-gray-900">Neha Patel</span>
                        <span class="font-bold text-2xl text-emerald-600">₹8,500</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Mar 14</span>
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs rounded-full font-semibold">Verified</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
