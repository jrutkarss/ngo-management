<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <button id="rzp-button" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-8 rounded-2xl text-xl font-bold mx-auto block">
        Pay ₹<?= number_format($amount, 0) ?> Now
    </button>

    <script>
    var options = {
        "key": "<?= $key ?>",
        "amount": "<?= $amount * 100 ?>",
        "currency": "INR",
        "name": "NGO Organization",
        "description": "Donation",
        "order_id": "<?= $orderId ?>",
        "prefill": {
            "name": "<?= $name ?>",
            "email": "<?= $email ?>",
            "contact": "<?= $phone ?>"
        },
        "handler": function (response){
            document.getElementById('razorpay-form').submit();
        },
        "theme": {
            "color": "#7b1fa2"
        }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button').onclick = function(e){
        rzp1.open();
        e.preventDefault();
    }
    </script>
<?=$this->endSection() ?>