<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-3xl">
        <h1 class="text-4xl font-black mb-6">Make a Donation</h1>
        <p class="text-lg text-gray-600 mb-10">Your support helps us deliver programs that change lives. Choose a giving option below.</p>

        <form action="<?= base_url('donate/create') ?>" method="post" class="space-y-6 bg-white p-10 rounded-3xl shadow-lg">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" class="w-full p-4 rounded-xl border border-gray-200" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" class="w-full p-4 rounded-xl border border-gray-200" required>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                    <input type="text" name="phone" class="w-full p-4 rounded-xl border border-gray-200" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Donation Type</label>
                    <select name="gateway" class="w-full p-4 rounded-xl border border-gray-200">
                        <option value="razorpay">Online (Razorpay)</option>
                        <option value="cash">Cash</option>
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Amount (₹)</label>
                    <input type="number" name="amount" min="10" class="w-full p-4 rounded-xl border border-gray-200" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Payment Method</label>
                    <select name="type" class="w-full p-4 rounded-xl border border-gray-200">
                        <option value="online">Online</option>
                        <option value="cash">Cash</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-6 rounded-xl font-semibold hover:opacity-90 transition">Donate Now</button>
        </form>

        <div class="mt-10 text-sm text-gray-500">
            <p>Note: Online donations use Razorpay. Please update API keys in <code>app/Controllers/Donation.php</code> before going live.</p>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
