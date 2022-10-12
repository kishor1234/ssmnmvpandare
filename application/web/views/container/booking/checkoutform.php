<style>
    .wrap {
        width: 85%;
        max-width: 1024px;
        margin: 0 auto;
        padding: 100px 0;
    }
    h4{
        font-weight: 400;
    }
</style>
<script src="/assets/plugins/form/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="/assets/plugins/form/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/plugins/form/additional-methods.min.js" type="text/javascript"></script>
<script src="/assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="wrap">
                <div class="py-5 text-center">

                    <h1 class=".h1">Checkout form</h1>
                    <p>&nbsp;</p>
                </div>
                <?php
                $sql = $main->select("profile", $_SESSION["db_1"]) . $main->whereSingle(array("uid" => $_SESSION["uid"]));
                $result = $main->executeQuery($sql);
                $row = $result->fetch_assoc();
                ?>

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="col-mb-3">User Details</h4>
                        <form class="needs-validation" id="mycheckout" name="mycheckout" method="post" action="/generateorder">
                            <div class="row">
                                <div class="col-md-6 col-mb-3">
                                    <label for="firstName">First name<span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control" id="fname" name="fname" placeholder="" value="<?= $row["fname"] ?>" required>

                                </div>
                                <div class="col-md-6 col-mb-3">
                                    <label for="lastName">Last name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lname" name="lname"  placeholder="" value="<?= $row["lname"] ?>" required>

                                </div>
                            </div>

                            <div class="col-mb-3">
                                <label for="mobile">Mobile No.</label>
                                <input type="tel" value="<?= $_SESSION["umobile"] ?>" class="form-control" readonly placeholder="Mobile No." required>

                            </div>

                            <div class="col-mb-3">
                                <label for="email">Email <span class="text-muted"></span></label>
                                <input type="email" value="<?= $_SESSION["uemail"] ?>" class="form-control" readonly placeholder="you@example.com">

                            </div>
                            <hr class="mb-4">
                            <h4 class="col-mb-3">Billing address</h4>
                            <div class="col-mb-3">
                                <label for="address">Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="billing_address" name="billing_address" placeholder="1234 Main St" value="<?= $row["billing_address"] ?>" required>

                            </div>

                            <div class="col-mb-3">
                                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="billing_address2" name="billing_address2" placeholder="Apartment or suite" value="<?= $row["billing_address2"] ?>">
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-mb-6">
                                    <label for="country">Country<span class="text-danger">*</span></label>
                                    <input type="txt" list="country" class="custom-select d-block w-100 form-control" id="billing_country" name="billing_country" value="<?= $row["billing_country"] ?>" required>
                                </div>
                                <div class="col-md-6 col-mb-6">
                                    <label for="state">State<span class="text-danger">*</span></label>
                                    <input type="txt" list="state" class="custom-select d-block w-100 form-control" id="billing_state" name="billing_state" value="<?= $row["billing_state"] ?>" required>

                                </div>
                                <div class="col-md-6 col-mb-6">
                                    <label for="city">City<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="billing_city" name="billing_city" placeholder="" value="<?= $row["billing_city"] ?>" required>

                                </div>
                                <div class="col-md-6 col-mb-6">
                                    <label for="zip">Zip<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="billing_zip" maxlength="6" minlength="6" name="billing_zip" placeholder="" value="<?= $row["billing_zip"] ?>" required onchange="checkzip(this)" onkeyup="checkzip(this)">

                                </div>
                                <div class="col-md-6 col-mb-6">
                                    <label for="address">GST</label>
                                    <input type="text" class="form-control" id="gstno" name="gstno" placeholder="GST" value="<?= $row["gstno"] ?>">

                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" onclick="sameAddress()" class="custom-control-input" id="same-address" name="same_address">
                                <label class="custom-control-label" for="same_address">Shipping address is the same as my billing address</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info" name="save_info">
                                <label class="custom-control-label" for="save-info">Save this information for next time</label>
                            </div>
                            <hr class="mb-4">
                            <h4 class="col-mb-3">Shipping address</h4>
                            <div class="col-mb-3">
                                <label for="address">Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="shipping_address" name="shipping_address" value="<?= $row["shipping_address"] ?>" placeholder="1234 Main St" required>

                            </div>

                            <div class="col-mb-3">
                                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="shipping_address2" name="shipping_address2" value="<?= $row["shipping_address2"] ?>" placeholder="Apartment or suite">
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-mb-6">
                                    <label for="country">Country<span class="text-danger">*</span></label>
                                    <input type="txt" list="country" class="custom-select d-block w-100 form-control" id="shipping_country" name="shipping_country" value="<?= $row["shipping_country"] ?>" required>


                                </div>
                                <div class="col-md-6 col-mb-6">
                                    <label for="state">State<span class="text-danger">*</span></label>
                                    <input type="txt" list="state" class="custom-select d-block w-100 form-control" id="shipping_state" name="shipping_state" value="<?= $row["shipping_state"] ?>" required>

                                </div>
                                <div class="col-md-6 col-mb-6">
                                    <label for="city">City<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="shipping_city" name="shipping_city" placeholder="" value="<?= $row["shipping_city"] ?>" required>

                                </div>
                                <div class="col-md-6 col-mb-6">
                                    <label for="zip">Zip<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="shipping_zip" maxlength="6" minlength="6" name="shipping_zip" placeholder="" value="<?= $row["shipping_zip"] ?>" required onchange="checkzip(this)" onkeyup="checkzip(this)">

                                </div>
                            </div>
                            <hr class="mb-4">

                            <input type="hidden" name="action" value="generateorder">
                            <button class="btn btn-primary btn-lg btn-block" id="btn_checkout" type="submit">Continue to checkout</button>
                        </form>
                    </div>
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center col-mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill"><?= count($_SESSION["cart"]) ?></span>
                        </h4>
                        <ul class="list-group col-mb-3">
                            <?php
                            foreach ($_SESSION["cart"] as $key => $val) {
                                ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0"><?= $val["product"] ?></h6>
                                        <small class="text-muted">Area: <?= $val["area"] ?></small>
                                        <small class="text-muted">Type: <?= $val["type"] ?></small>
                                    </div>
                                    <span class="text-muted">₹<?= $val["price"] ?></span>
                                </li>
                                <?php
                            }
                            ?>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <strong style="float:right;">₹<?= $_SESSION["subtotal"]["subtotal"] ?></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Discount(<?= $_SESSION["subtotal"]["disper"] ?>%)</span>
                                <strong style="float:right;">₹<?= $_SESSION["subtotal"]["discount"] ?></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>GST TAX </span>
                                <strong style="float:right;">₹<?= $_SESSION["subtotal"]["gst"] ?></strong>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (INR)</span>
                                <strong style="float:right;">₹<?= $_SESSION["subtotal"]["finaltotal"] ?></strong>
                            </li>
                        </ul>

                        <!--                        <form class="card p-2">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Promo code">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-secondary">Redeem</button>
                                                        </div>
                                                    </div>
                                                </form>-->
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
<datalist id="country">
    <option>India</option>
</datalist>
<datalist id="state">
    <?php
    $result = $main->executeQuery("SELECT * FROM `states` ORDER BY `state` ASC");
    while ($row = $result->fetch_assoc()) {
        echo "<option>{$row["state"]}</option>";
    }
    ?>
</datalist>

<script>
    $(document).ready(function () {
        checkzip("#billing_zip");
        checkzip("#shipping_zip");
        $('#same-address').click(function () {
            if ($(this).prop("checked") == true) {
                $("#shipping_address").val($("#billing_address").val());
                $("#shipping_address2").val($("#billing_address2").val());
                $("#shipping_zip").val($("#billing_zip").val());
                $("#shipping_city").val($("#billing_city").val());
                $("#shipping_country").val($("#billing_country").val());
                $("#shipping_state").val($("#billing_state").val());

            } else if ($(this).prop("checked") == false) {
                $("#shipping_address").val("");
                $("#shipping_address2").val("");
                $("#shipping_zip").val("");
                $("#shipping_city").val("");
                $("#shipping_country").val("");
                $("#shipping_state").val("");
            }
        });
        $(function () {
            $('#mycheckout').validate({// initialize the plugin
                rules: {

                    email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        required: true,
                        maxlength: 10,
                        minlength: 10,
                        number: true
                    },
                    billing_address: {
                        required: true
                    },
                    billing_country: {
                        required: true
                    },
                    billing_state: {
                        required: true
                    },
                    billing_city: {
                        required: true
                    },
                    billing_zip: {
                        required: true,
                        maxlength: 6,
                        minlength: 6,
                        number: true
                    },
                    shipping_address: {
                        required: true
                    },
                    shipping_country: {
                        required: true
                    },
                    shipping_state: {
                        required: true
                    },
                    shipping_city: {
                        required: true
                    },
                    shipping_zip: {
                        required: true,
                        maxlength: 6,
                        minlength: 6,
                        number: true
                    }
                },
                submitHandler: function (form) { // for demo
                    $("#btn_checkout").html("Please wait....");
                    form.submit();
                    $("#btn_checkout").html("Continue to checkout");
                }
            });

        });
    });
    function checkzip(a) {
        //alert($(a).val());
        var r = true;
        if (parseInt($(a).val().length) >= 6) {
            var formData = {zip: $(a).val(), action: "validzip"}; //Array 
            console.log(formData);
            $.ajax({
                url: "/cart", // Url of backend (can be python, php, etc..)
                type: "POST", // data type (can be get, post, put, delete)
                data: formData, // data in json format
                async: true, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
                success: function (response, textStatus, jqXHR) {
                    console.log(response);
                    var json = JSON.parse(response);
                    if (json.status !== 1)
                    {
                       
                        swal("Sorry!", "We not provid service at " + $(a).val(), "error");
                         $(a).val("");
                         return false;
                    } else {
                        return true;
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }
    }
</script>