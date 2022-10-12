<!--  The entire list of Checkout fields is available at
 https://docs.razorpay.com/docs/checkout-form#checkout-fields -->
<script src="assets/DataTables/jQuery-3.3.1/jquery-3.3.1.min.js" type="text/javascript"></script>
<form action="/paymentverify" method="POST" name="razorpay_checkout">
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $data['key'] ?>"
        data-amount="<?php echo $data['amount'] ?>"
        data-currency="INR"
        data-name="<?php echo $data['name'] ?>"
        data-image="<?php echo $data['image'] ?>"
        data-description="<?php echo $data['description'] ?>"
        data-prefill.name="<?php echo $data['prefill']['name'] ?>"
        data-prefill.email="<?php echo $data['prefill']['email'] ?>"
        data-prefill.contact="<?php echo $data['prefill']['contact'] ?>"
        data-notes.shopping_order_id=<?= $data['notes']['merchant_order_id'] ?>
        data-order_id="<?php echo $data['order_id'] ?>"
        <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount'] ?>" <?php } ?>
        <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency'] ?>" <?php } ?>
        >
    </script>
    <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
    <input type="hidden" name="shopping_order_id" value="<?= $data['notes']['merchant_order_id'] ?>">
</form>
<!--<script>
    window.onload = function () {
        document.forms['razorpay_checkout'].click();
    }
</script>-->
<style>
    .razorpay-payment-button {
        display: none;
    }
</style>
<script>
    $(document).ready(function () {
        $(".razorpay-payment-button").click();
    });
</script>
