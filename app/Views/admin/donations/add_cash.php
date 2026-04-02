<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-8 py-12">
    <h1 class="text-4xl font-bold mb-8 text-gray-900">Add Cash Donation</h1>

    <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl">
        <form action="<?= base_url('admin/donations/save-cash') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Donor Name -->
                <div>
                    <label for="donor_name" class="block text-sm font-medium text-gray-700 mb-2">Donor Name *</label>
                    <input type="text" id="donor_name" name="donor_name" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                           placeholder="Enter donor name">
                </div>

                <!-- Donor Email -->
                <div>
                    <label for="donor_email" class="block text-sm font-medium text-gray-700 mb-2">Donor Email *</label>
                    <input type="email" id="donor_email" name="donor_email" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                           placeholder="Enter donor email">
                </div>

                <!-- Donor Phone -->
                <div>
                    <label for="donor_phone" class="block text-sm font-medium text-gray-700 mb-2">Donor Phone</label>
                    <input type="tel" id="donor_phone" name="donor_phone"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                           placeholder="Enter donor phone">
                </div>

                <!-- Amount -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Amount (₹) *</label>
                    <input type="number" id="amount" name="amount" required step="0.01" min="0"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                           placeholder="Enter donation amount">
                </div>

                <!-- Select Member -->
                <div class="md:col-span-2">
                    <label for="member_id" class="block text-sm font-medium text-gray-700 mb-2">Link to Member (Optional)</label>
                    <select id="member_id" name="member_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">-- Select a member --</option>
                        <?php foreach($members as $member): ?>
                            <option value="<?= $member['id'] ?>"><?= htmlspecialchars($member['name']) ?> (<?= htmlspecialchars($member['email']) ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Donation Purpose -->
                <div class="md:col-span-2">
                    <label for="purpose" class="block text-sm font-medium text-gray-700 mb-2">Purpose of Donation</label>
                    <textarea id="purpose" name="purpose" rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                              placeholder="Describe the purpose of this donation..."></textarea>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 pt-6 border-t">
                <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium">
                    <i class="fas fa-save mr-2"></i> Save Donation
                </button>
                <a href="<?= base_url('admin/donations') ?>" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 font-medium">
                    <i class="fas fa-arrow-left mr-2"></i> Back
                </a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
