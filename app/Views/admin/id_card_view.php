<?=$this->extend('layout/admin_layout') ?>
<?=$this->section('content') ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @page { margin: 0; size: A6; }
        body { 
            font-family: 'Inter', system-ui, -apple-system, sans-serif; 
            margin: 0; 
            background: white;
        }
        .id-card { 
            width: 100%; 
            height: 100vh; 
            border: 4px solid #000;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 50%, #06b6d4 100%);
            color: white;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }
        .gradient-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.3);
            z-index: 1;
        }
    </style>
    <div class="id-card relative">
        <div class="gradient-overlay"></div>
        
        <!-- Logo Header -->
        <div class="text-center py-4 px-4 z-10 relative">
            <div class="text-2xl font-black tracking-wide drop-shadow-lg">NGO ORGANIZATION</div>
            <div class="text-sm font-semibold opacity-90 mt-1">Member ID Card</div>
            <div class="w-20 h-1 bg-white mx-auto mt-2 rounded-full"></div>
        </div>

        <!-- Photo & Main Info -->
        <div class="flex flex-1 px-6 z-10 relative">
            <!-- Photo Circle -->
            <div class="w-20 h-20 rounded-full border-4 border-white shadow-2xl flex-shrink-0 mt-4 overflow-hidden">
                <img src="https://via.placeholder.com/80x80/4f46e5/ffffff?text=<?= substr($member['name'],0,2) ?>" 
                     class="w-full h-full object-cover">
            </div>
            
            <!-- Member Info -->
            <div class="flex-1 ml-6 mt-4">
                <div class="text-2xl font-black leading-tight mb-3 drop-shadow-lg">
                    <?= esc($member['name']) ?>
                </div>
                
                <div class="space-y-1 mb-6">
                    <div class="flex items-center text-lg">
                        <span class="w-20 font-semibold">ID:</span>
                        <span class="bg-white/20 px-3 py-1 rounded-full text-sm font-bold">
                            #<?= $member['id'] ?>
                        </span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-20 font-semibold text-sm">Email:</span>
                        <span class="text-sm"><?= esc($member['email']) ?></span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-20 font-semibold text-sm">Phone:</span>
                        <span class="text-sm"><?= esc($member['phone']) ?></span>
                    </div>
                </div>
                
                <!-- Status Badge -->
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/20 backdrop-blur-sm border border-white/30">
                    <span class="text-xs font-bold uppercase tracking-wide"><?= ucfirst($member['status']) ?></span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 pb-6 pt-4 z-10 relative text-right">
            <div class="text-xs opacity-90 tracking-wide">
                Valid Till: <span class="font-bold">31-12-2026</span>
            </div>
            <div class="text-xs mt-1 opacity-75">Issued: <?= date('d-m-Y') ?></div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute top-4 left-4 w-12 h-12 bg-white/10 rounded-full blur"></div>
        <div class="absolute bottom-8 right-8 w-16 h-16 bg-white/5 rounded-full blur"></div>
    </div>

<?=$this->endSection() ?>