<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-5xl">
        <h1 class="text-5xl font-black mb-6">Contact Us</h1>
        <p class="text-lg text-gray-600 mb-10">Reach out to us with your questions, feedback, or to learn how you can get involved.</p>

        <div class="grid md:grid-cols-2 gap-10">
            <div class="bg-white p-10 rounded-3xl shadow-lg">
                <h2 class="text-2xl font-bold mb-4">Get in Touch</h2>
                <div class="space-y-4 text-gray-600">
                    <div><strong>Address:</strong> Meerut, Uttar Pradesh, India</div>
                    <div><strong>Phone:</strong> +91 98765 43210</div>
                    <div><strong>Email:</strong> info@ngo.org</div>
                </div>
            </div>
            <div class="bg-white p-10 rounded-3xl shadow-lg">
                <h2 class="text-2xl font-bold mb-4">Send a Message</h2>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="mb-4 p-4 rounded-xl bg-green-50 text-green-700"><?= esc(session()->getFlashdata('success')) ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="mb-4 p-4 rounded-xl bg-red-50 text-red-700"><?= esc(session()->getFlashdata('error')) ?></div>
                <?php endif; ?>

                <form action="<?= base_url('contact') ?>" method="post" class="space-y-4">
                    <input type="text" name="name" placeholder="Your Name" class="w-full p-4 rounded-xl border border-gray-200" required>
                    <input type="email" name="email" placeholder="Your Email" class="w-full p-4 rounded-xl border border-gray-200" required>
                    <textarea name="message" placeholder="Your Message" rows="5" class="w-full p-4 rounded-xl border border-gray-200" required></textarea>
                    <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-6 rounded-xl font-semibold hover:opacity-90 transition">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?=$this->endSection() ?>
