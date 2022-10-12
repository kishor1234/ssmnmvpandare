<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:300,400,900);
    /*@import url(https://i.icomoon.io/public/c88de6d4a5/CartIcons/style.css);*/
    .cf:before, .cf:after {
        content: "\0020";
        display: block;
        height: 0;
        overflow: hidden;
    }
    .cf:after {
        clear: both;
    }
    .cf {
        zoom: 1;
    }
    html {
        box-sizing: border-box;
        overflow-y: scroll;
    }
    *, *:before, *:after {
        box-sizing: inherit;
    }
    body {
        font-family: 'Lato', 'helvetica', arial, sans-serif !important;
        font-size: 100%;
        font-weight: 400;
        color: #424242;
        line-height: 1.3;
    }
    strong {
        font-weight: 900;
    }
    .wrap {
        width: 85%;
        max-width: 1024px;
        margin: 0 auto;
        padding: 100px 0;
    }
    .btn {
        display: inline-block;
        font-size: 0.9em;
        padding: 12px 30px;
        background: #ffc21d;
        color: #232323;
        font-weight: 900;
        cursor: pointer;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 2px;
        opacity: 1;
        transition: opacity 0.3s;
    }
    .btn:hover {
        opacity: 0.8;
    }
    .blue-link {
        color: #659baf;
        cursor: pointer;
    }
    .blue-link:hover {
        color: #223840;
    }
    .cart-header {
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
        position: relative;
    }
    .cart-header strong {
        font-size: 1.8em;
        position: relative;
        font-weight: 400;
        line-height: 1;
    }
    .cart-header .btn {
        position: absolute;
        bottom: 10px;
        right: 0;
    }
    .bonus-products {
        border: 1px solid #ccc;
        border-top: none;
        padding: 18px;
        background: rgba(0, 0, 0, .05);
    }
    .bonus-products strong {
        font-weight: 400;
        color: #888;
        font-size: 0.8em;
    }
    .bonus-products strong .bp-toggle {
        font-size: 0.7em;
        cursor: default;
    }
    .cart-table {
        padding: 10px 0 0;
        border-bottom: 1px solid #ccc;
    }
    .item {
        border-bottom: 1px solid #ccc;
        margin-bottom: 10px;
    }
    .item:last-child {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0;
    }
    .item .item-block {
        float: left;
    }
    .item .item-block.ib-info {
        width: 60%;
    }
    .item .item-block.ib-info img.product-img {
        float: left;
        display: block;
        width: 100px;
        margin-right: 15px;
    }
    .item .item-block.ib-info .ib-info-meta {
        float: left;
    }
    .item .item-block.ib-info span {
        display: block;
        margin-bottom: 3px;
    }
    .item .item-block.ib-info span.title {
        font-size: 1em;
    }
    .item .item-block.ib-info span.itemno {
        color: #888;
        font-size: 0.8em;
    }
    .item .item-block.ib-info span.styles {
        border-left: 3px solid rgba(0, 0, 0, .1);
        padding-left: 5px;
        font-size: 0.8em;
    }
    .item .item-block.ib-info span.styles strong {
        display: inline-block;
        min-width: 70px;
    }
    .item .item-block.ib-info span.styles .blue-link {
        font-size: 0.8em;
    }
    .item .item-block.ib-qty {
        width: 20%;
        text-align: right;
    }
    .item .item-block.ib-qty input {
        text-align: center;
        font-size: 16px;
        border-radius: 0;
        outline: none;
        border: 1px solid #ccc;
        width: 50px;
        height: 40px;
        vertical-align: middle;
        color: #555;
    }
    .item .item-block.ib-qty input:focus {
        border-color: #7bcde8;
    }
    .item .item-block.ib-qty span.price {
        display: inline-block;
        color: #777;
    }
    .item .item-block.ib-qty span.price > span {
        margin: 0 5px;
    }
    .item .item-block.ib-total-price {
        width: 20%;
        text-align: right;
        padding-top: 6px;
        position: relative;
    }
    .item .item-block.ib-total-price span {
        color: #555;
    }
    .item .item-block.ib-total-price span.tp-price {
        font-size: 1.4em;
        font-weight: 900;
    }
    .item .item-block.ib-total-price span.tp-remove {
        font-size: 14px;
        margin-left: 10px;
        position: relative;
        top: -2px;
        cursor: pointer;
    }
    .item .item-block.ib-total-price span.tp-remove:hover {
        color: red;
    }
    .item .item-foot {
        padding: 0 0 10px 0;
        margin-top: 10px;
        font-size: 0.7em;
    }
    .item .item-foot i {
        position: relative;
        font-size: 12px;
    }
    .item .item-foot .if-message {
        float: left;
        width: 100%;
        margin-bottom: 10px;
        color: #777;
    }
    .item .item-foot .if-left {
        float: left;
        color: #ccc;
        font-size: 115%;
        text-transform: uppercase;
    }
    .item .item-foot .if-right {
        float: right;
        color: #ccc;
        padding-top: 2px;
        text-transform: uppercase;
    }
    .item .item-foot .if-status {
        font-weight: 900;
        color: #333;
    }
    .item .bundle-block {
        padding: 0 0 10px 50px;
        position: relative;
    }
    .item .bundle-block ul li {
        position: relative;
        display: block;
        width: 100%;
        margin-top: 10px;
        padding-top: 5px;
    }
    .item .bundle-block ul li i.i-down-right-arrow {
        display: block;
        position: absolute;
        left: -30px;
        font-size: 12px;
        top: 50%;
        margin-top: -6px;
        color: #999;
    }
    .item .bundle-block ul li img {
        width: 100%;
        max-width: 48px;
        display: block;
        float: left;
        margin-right: 15px;
    }
    .item .bundle-block ul li span {
        display: block;
    }
    .item .bundle-block ul li span.bundle-title {
        font-size: 0.85em;
    }
    .item .bundle-block ul li span.bundle-itemno {
        color: #888;
        font-size: 0.7em;
    }
    .sub-table {
        margin: 20px 0 20px;
        position: relative;
    }
    .sub-table .copy-block {
        float: left;
        margin-top: 60px;
    }
    .sub-table .copy-block p {
        font-size: 0.7em;
        color: #666;
        max-width: 320px;
        line-height: 1.55;
        display: block;
    }
    .sub-table .copy-block p a:link, .sub-table .copy-block p a:visited {
        color: #666;
    }
    .sub-table .copy-block p a:hover, .sub-table .copy-block p a:focus {
        color: #333;
    }
    .sub-table .copy-block p.customer-care {
        padding-top: 10px;
        margin-top: 10px;
        border-top: 1px solid #ccc;
    }
    .sub-table .summary-block {
        float: right;
    }
    .sub-table .summary-block .sb-promo {
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        margin-bottom: 10px;
        position: absolute;
        top: 0;
        left: 0;
        width: 320px;
    }
    .sub-table .summary-block .sb-promo input {
        font-size: 16px;
        width: 220px;
        padding: 7px;
        margin-right: 5px;
        vertical-align: top;
        color: #777;
    }
    .sub-table .summary-block .sb-promo .btn {
        padding: 10px 8px;
        font-size: 0.8em;
    }
    .sub-table .summary-block ul li {
        margin-bottom: 10px;
        font-size: 0.9em;
        text-align: right;
    }
    .sub-table .summary-block ul li span {
        display: inline-block;
    }
    .sub-table .summary-block ul li span.sb-label {
        color: #999;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .sub-table .summary-block ul li span.sb-value {
        font-size: 1.1em;
        width: 120px;
    }
    .sub-table .summary-block ul li.tax .tax-edit {
        color: #223840;
        font-size: 0.8em;
        font-weight: 900;
        text-transform: capitalize;
        cursor: pointer;
    }
    .sub-table .summary-block ul li.tax .tax-edit i {
        position: relative;
        top: 1px;
        left: -3px;
    }
    .sub-table .summary-block ul li.tax .tax-edit.te-open i:before {
        content: "\edc7";
    }
    .sub-table .summary-block ul li.tax-calculate {
        padding: 10px;
        margin-top: 10px;
        background: rgba(0, 0, 0, .05);
        display: none;
    }
    .sub-table .summary-block ul li.tax-calculate input {
        font-size: 16px;
        width: 148px;
        padding: 7px;
        margin-right: 5px;
        vertical-align: top;
        color: #777;
    }
    .sub-table .summary-block ul li.tax-calculate .btn {
        padding: 10px 8px;
        font-size: 0.8em;
    }
    .sub-table .summary-block ul li.grand-total {
        border-top: 1px solid #ccc;
        padding-top: 10px;
        margin-top: 10px;
        font-size: 1.2em;
        font-weight: 900;
    }
    .cart-footer {
        border-top: 1px solid #ccc;
        margin-top: 15px;
        padding-top: 15px;
    }
    .cart-footer .cont-shopping {
        float: left;
        font-size: 0.8em;
        padding-top: 10px;
        cursor: pointer;
    }
    .cart-footer .cont-shopping i {
        position: relative;
        top: 0px;
        margin-right: 6px;
        font-size: 75%;
    }
    .cart-footer .btn {
        float: right;
        width: 200px;
        text-align: center;
    }
    @media only screen and (max-width: 860px) {
        .item-main {
            position: relative;
        }
        .item .item-block.ib-info {
            width: 70%;
        }
        .item .item-block.ib-qty {
            width: 30%;
            text-align: right;
        }
        .item .item-block.ib-total-price {
            width: auto;
            text-align: right;
            padding-top: 0;
            position: absolute;
            top: 50px;
            right: 0;
        }
        .sub-table .copy-block {
            float: right;
            margin-top: 0;
            text-align: right;
            padding: 12px;
            background: rgba(0, 0, 0, .035);
        }
        .sub-table .summary-block {
            float: none;
            width: 100%;
            margin-top: 55px;
        }
        .sub-table .summary-block .sb-promo {
            position: absolute;
            top: 0;
            left: auto;
            right: 0;
            max-width: 300px;
            text-align: right;
            border-bottom: none;
        }
    }
    @media only screen and (max-width: 630px) {
        .item .item-block.ib-info {
            float: left;
            width: 100%;
        }
        .item .item-block.ib-qty {
            float: left;
            width: auto;
            margin-top: 10px;
        }
        .item .item-block.ib-total-price {
            float: left;
            width: auto;
            position: relative;
            top: 13px;
            right: 0;
            border-left: 1px solid #ccc;
            padding-left: 15px;
            margin-left: 15px;
        }
        .item .bundle-block {
            display: none;
        }
        .item .item-block.ib-info img.product-img {
            width: 70px;
        }
    }
    .sb-promo {
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        margin-bottom: 10px;
        position: absolute;
        top: 0;
        left: 0;
        width: auto !important;
    }
    .sb-promo input {
        font-size: 16px;
        width: auto !important; 
        padding: 7px;
        margin-right: 5px;
        vertical-align: top;
        color: #777;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="wrap">

                <header class="cart-header cf">
                    <strong>Items in Your Cart</strong>

                    <div class="if-right">
                        <span class="blue-link" onclick="removeFromCart('0', 'removeall')">Clear cart</span>
                        | <a class="" href="/booking" title="Booking">Continue Shopping</a>

                    </div>
                </header>
                <div  id="msg">

                </div>
                <?php
                if (empty($_SESSION["cart"])) {
                    echo "<p class=\"bonus-products\" style=\"text-align:center;\"><strong>Empty Cart <i class=\"fa fa-shopping-cart\"></i> </strong></p>";
                } else {
                    ?>
                    <div class="cart-table">
                        <ul>
                            <!-- begin variation product w/ option -->
                            <?php
                            foreach ($_SESSION["cart"] as $key => $val) {
                                ?>
                                <li class="item">
                                    <div class="item-main cf">
                                        <div class="item-block ib-info cf">
                                            <!--<img class="product-img" src="http://fakeimg.pl/150/e5e5e5/adadad/?text=IMG" />-->
                                            <div class="ib-info-meta">
                                                <span class="title"><?= $val["product"] ?></span>
                                                <span class="itemno">#<?= $val["id"] ?></span>
                                                <span class="styles">
                                                    <span><strong>Area</strong>: <?= $val["area"] ?></span>
                                                    <span><strong>Type</strong>: <?= $val["type"] ?></span>
        <!--                                                <span><strong>Warranty</strong>: 3 Years</span>
                                                    <span class="blue-link">Edit Details</span>-->
                                                </span>
                                            </div>
                                        </div>
                                        <div class="item-block ib-qty">
                                            <input type="text" disabled value="<?= $val["qty"] ?>" class="qty" />
                                            <span class="price"><span>x</span> ₹<?= $val["price"] ?></span>
                                        </div>
                                        <div class="item-block ib-total-price">
                                            <span class="tp-price">₹<?= $val["price"] ?></span>
                                            <span class="tp-remove"><i class="i-cancel-circle"></i></span>
                                        </div>         
                                    </div>
                                    <div class="item-foot cf">
                                        <div class="if-right"><span class="blue-link" onclick="removeFromCart('<?= $val["id"] ?>', 'remove')">Remove</span></div>
                                    </div>
                                </li>
                                <!-- end variation product w/ option -->
                                <?php
                            }
                            ?>



                        </ul>
                    </div>

                    <div class="sub-table cf">
                        <div class="summary-block">
                            <div class="sb-promo">
                                <input type="radio" class="radioBtnClass" checked id="online" name="paymenttype" value="Online">
                                <label for="online">Online</label>
                                <input type="radio" class="radioBtnClass" id="cod" name="paymenttype" value="Cash on delivery">
                                <label for="cod">Cash on delivery</label><br>
                            </div>        
                            <ul>
                                <li class="subtotal"><span class="sb-label">Subtotal</span><span class="sb-value" id="subtotal">Loading..</span></li>
                                <li class="shipping"><span class="sb-label">Discount <i id="disper"></i></span><span class="sb-value" id="discount">Loading..</span></li>
                                <li class="tax"><span class="sb-label">GST. Tax </span><span class="sb-value" id="tax">Loading..</span></li>
                                <!--<li class="tax-calculate"><input type="text" value="06484" class="tax" /><span class="btn">Calculate</span></li>-->
                                <li class="grand-total"><span class="sb-label">Total</span><span class="sb-value" id="finaltotal">Loading...</span></li>
                            </ul>
                        </div>
                        <div class="copy-block">    
                            <!--<p>Items will be saved in your cart for 30 days. To save items longer, add them to your <a href="#">Wish List</a>.</p>-->
                            <p>
                                Call us M-F 8:00 am to 6:00 pm IST<br />
                                (+91)7045671515 or <a href="#">contact us</a>. <br />     
                            </p>
                        </div>    
                    </div>
                    <div class="cart-footer cf">
                        <a class="btn" href="/checkout" title="Checkout">Checkout</a>
                        <span class="cont-shopping"><i class="i-angle-left"></i>Continue Shopping</span>    
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        calculateTotal();
        $("input[type='radio'].radioBtnClass").change(function () {
            calculateTotal();
        });

        $(".tax-edit").click(function () {
            $(this).toggleClass('te-open').parent;
            $('.tax-calculate').slideToggle(200);
        });

        $(".if-left").click(function () {
            $(this).prev('.if-message').slideToggle(200);
        });

        $(".bp-toggle").click(function () {
            $('.bonus-products').slideToggle(200);
        });
    });
    function calculateTotal()
    {
        var payment;
        if ($("input[type='radio'].radioBtnClass").is(':checked')) {
            payment = $("input[type='radio'].radioBtnClass:checked").val();

        }
        var formdata = {action: "subtotal", paymenttype: payment};
        $.ajax({
            type: 'POST',
            url: '/cart',
            data: formdata,
            async: true,
            success: function (objString, textStatus, jqXHR) {
                //console.log(objString);
                var obj = JSON.parse(objString);
                var data = obj.data[1];
                console.log(data);
                if (obj.status === 1)
                {
                    $("#subtotal").html("₹" + data.subtotal);
                    $("#discount").html("₹" + data.discount);
                    $("#tax").html("₹" + data.gst);
                    $("#finaltotal").html("₹" + data.finaltotal);
                    $("#disper").html("(" + data.disper + "%)")
                } else {
                    window.location.replace("/cart");
                }

            },
            error: function (request, status, error) {
                printMessage("Please try agin after sometime", "danger", ".msg");

            }
        });
    }
    function removeFromCart(id, ac)
    {

        var formData = {id: id, action: ac};
        $.ajax({
            type: 'POST',
            url: '/cart',
            data: formData,
            async: true,
            success: function (objString, textStatus, jqXHR) {
                console.log(objString);
                var obj = JSON.parse(objString);

                if (obj.status === 1)
                {
                    loadCart();
                }
                window.location.replace("/cart");

            },
            error: function (request, status, error) {
                printMessage("Please try agin after sometime", "danger", ".msg");

            }
        });
    }
</script>