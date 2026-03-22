<?=$this->extend('layout/admin_layout') ?>
<?=$this->section('content') ?>
    <div class="container mx-auto px-4 max-w-2xl">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="w-24 h-24 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mx-auto mb-6 shadow-2xl flex items-center justify-center">
                <span class="text-3xl">❤️</span>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Support Our Mission</h1>
            <p class="text-xl text-gray-600 mb-8">Every contribution brings us closer to creating positive change</p>
        </div>

        <!-- Donation Form -->
        <div class="bg-white rounded-3xl shadow-2xl p-8 mb-8">
            <form method="post" action="<?= base_url('donate/create') ?>">
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="name" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                        <input type="tel" name="phone" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Donation Amount</label>
                        <select name="amount" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option value="">Select Amount</option>
                            <option value="500">₹500</option>
                            <option value="1000">₹1,000</option>
                            <option value="2500">₹2,500</option>
                            <option value="5000">₹5,000</option>
                            <option value="10000">₹10,000</option>
                            <option value="custom">Custom Amount</option>
                        </select>
                        <input type="number" name="custom_amount" id="custom_amount" style="display:none;" 
                               class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500" 
                               placeholder="Enter custom amount in INR">
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="mb-8">
                    <label class="block text-lg font-semibold text-gray-900 mb-4">Payment Method</label>
                    <div class="grid grid-cols-3 gap-4">
                        <label class="flex items-center p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-purple-400 cursor-pointer transition-all">
                            <input type="radio" name="gateway" value="razorpay" class="mr-3 text-purple-600" checked>
                            <div>
                                <div class="font-semibold text-gray-900">Razorpay</div>
                                <div class="text-sm text-gray-500">Cards, UPI, Wallets</div>
                            </div>
                        </label>
                        <label class="flex items-center p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-green-400 cursor-pointer transition-all">
                            <input type="radio" name="gateway" value="cash" class="mr-3 text-green-600">
                            <div>
                                <div class="font-semibold text-gray-900">Cash</div>
                                <div class="text-sm text-gray-500">Offline Payment</div>
                            </div>
                        </label>
                    </div>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-8 rounded-2xl text-xl font-bold shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                    💝 Donate Now
                </button>
            </form>
        </div>

        <!-- Razorpay Checkout (Hidden) -->
        <form id="razorpay-form" method="POST" action="<?= base_url('donate/verify') ?>" style="display:none;">
            <input type="hidden" name="razorpay_payment_id">
            <input type="hidden" name="razorpay_order_id">
            <input type="hidden" name="razorpay_signature">
        </form>

        <!-- Success Stats -->
        <div class="text-center grid md:grid-cols-3 gap-6 mt-16">
            <div class="bg-white/70 backdrop-blur-sm p-6 rounded-2xl">
                <div class="text-3xl font-bold text-purple-600">₹5,00,000+</div>
                <div class="text-gray-600">Raised</div>
            </div>
            <div class="bg-white/70 backdrop-blur-sm p-6 rounded-2xl">
                <div class="text-3xl font-bold text-pink-600">1,250+</div>
                <div class="text-gray-600">Donors</div>
            </div>
            <div class="bg-white/70 backdrop-blur-sm p-6 rounded-2xl">
                <div class="text-3xl font-bold text-green-600">50+</div>
                <div class="text-gray-600">Projects</div>
            </div>
        </div>
    </div>

    <!-- Razorpay JS -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        // Custom amount toggle
        document.querySelector('select[name="amount"]').addEventListener('change', function() {
            if(this.value === 'custom') {
                document.getElementById('custom_amount').style.display = 'block';
                document.querySelector('input[name="custom_amount"]').required = true;
            } else {
                document.getElementById('custom_amount').style.display = 'none';
                document.querySelector('input[name="custom_amount"]').required = false;
            }
        });

        // Razorpay handler will be called on form submission
    </script>
<?=$this->endSection() ?>