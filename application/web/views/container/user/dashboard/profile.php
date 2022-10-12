<style>
    .wrap {
        width: 85%;
        max-width: 1024px;
        margin: 0 auto;
        padding: 100px 0;
    }
</style>
<script src="/assets/plugins/form/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/plugins/form/additional-methods.min.js" type="text/javascript"></script>
<script src="/assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

<section class="content-header">
    <h1>
        Dashboard
        <small>Profile</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Your Profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <?php
    $sql = $main->select("profile", $_SESSION["db_1"]) . $main->whereSingle(array("uid" => $_SESSION["uid"]));
    $result = $main->executeQuery($sql);
    $row = $result->fetch_assoc();
    ?>
    <div class="row">
        <div class="col-lg-10">
            <form class="needs-validation" id="saveprofilese" novalidate method="post">

                <div class="panel panel-default">
                    <div class="panel-heading">User Details</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-mb-3">
                                <label for="firstName">First name<span class="text-danger">*</span></label>
                                <input type="text"  class="form-control" id="fname" name="fname" placeholder="" value="<?= $row["fname"] ?>" required>

                            </div>
                            <div class="col-md-6 col-mb-3">
                                <label for="lastName">Last name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="lname" name="lname"  placeholder="" value="<?= $row["lname"] ?>" required>

                            </div>
                            <div class="col-md-6 col-mb-3">
                                <label for="gender">Gender<span class="text-danger">*</span></label>
                                <input type="text" list="genderlist" class="form-control" id="gender" name="gender"  placeholder="" value="<?= $row["gender"] ?>" required>
                                <datalist id="genderlist">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </datalist>
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
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Billing address</div>
                    <div class="panel-body">
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
                                <input type="text" class="form-control" id="billing_zip" name="billing_zip" placeholder="" value="<?= $row["billing_zip"] ?>" required onchange="checkzip(this)" onkeyup="checkzip(this)">

                            </div>
                            <div class="col-md-6 col-mb-6">
                                <label for="address">GST</label>
                                <input type="text" class="form-control" id="gstno" name="gstno" placeholder="GST" value="<?= $row["gstno"] ?>">

                            </div>
                        </div>
                    </div>
                </div>


                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" onclick="sameAddress()" class="custom-control-input" id="same-address" name="same_address">
                    <label class="custom-control-label" for="same_address">Shipping address is the same as my billing address</label>
                </div>
<!--                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info" name="save_info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>-->
                <hr class="mb-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Shipping address</div>
                    <div class="panel-body">
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
                                <input type="text" class="form-control" id="shipping_zip" name="shipping_zip" placeholder="" value="<?= $row["shipping_zip"] ?>" required onchange="checkzip(this)" onkeyup="checkzip(this)">

                            </div>
                        </div>
                    </div>
                </div>

                <hr class="mb-4">

                <input type="hidden" name="uid" value="<?=$row["uid"]?>">
                <input type="hidden" name="action" value="saveprofile">
                <button class="btn btn-primary btn-lg btn-block" id="cart-btn" type="submit">Save Profile</button>
            </form>
        </div>
    </div>
</section>
<script>
    $(function () {
        //load orders
        var loadOrder = function () {
            var year = $("#order_years").val();
            var formData = {year: $("#order_years").val(), status: "Success", action: "loadYourOrder"}; //Array 
            console.log(formData);
            $.ajax({
                url: "/userData", // Url of backend (can be python, php, etc..)
                type: "POST", // data type (can be get, post, put, delete)
                data: formData, // data in json format
                async: true, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
                success: function (response, textStatus, jqXHR) {
                    var json = JSON.parse(response);
                    var arr = [], len;

                    for (key in json.data) {
                        arr.push(key);
                    }

                    len = arr.length;

                    if (json.status === 1) {
                        $(".msg").html(json.message);
                        $("#nooforders").html(len);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });

        };
        loadOrder();
        //load cancel orders
    });
</script>
<script>
    $(document).ready(function () {
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
            $('#saveprofilese').validate({// initialize the plugin
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
                    $("#cart-btn").val("Please wait ...");
                    var formdata = new FormData($(form)[0]);
                    $.ajax({
                        type: 'POST',
                        url: '/generateorder',
                        data: formdata,
                        contentType: false,
                        processData: false,
                        xhr: function () {
                            //progressShow();
                            var xhr = new XMLHttpRequest();
                            xhr.upload.addEventListener('progress', function (e) {
                                var progressbar = Math.round((e.loaded / e.total) * 100);
                                //$("#inner-progress").css('width', progressbar + '%');
                                $("#cart-btn").html("Please Wait... " + progressbar + '%');
                            });
                            return xhr;
                        },
                        success: function (objString) {
                            console.log(objString);
                            var obj = JSON.parse(objString);
                            if (obj.status === 1)
                            {
                                printMessage(obj.message, "success", ".msg");
                                swal({
                                    title: "Successfully added..!",
                                    text: "Your successfully save profile..",
                                    icon: "success",
                                    button: "Okay",
                                });
                            } else {
                                printMessage(obj.message, "danger", ".msg");

                            }
                            $("#cart-btn").val("Save Profile");
                            //loadCart();
                        },
                        error: function (request, status, error) {
                            printMessage("Please try agin after sometime", "danger", ".msg");
                            $("#cart-btn").val("Save profile");
                            //   gcaptch();
                        }
                    });
                    return false; // for demo
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
                        $(a).val("");
                        swal("Sorry!", "We not provid service at " + $(a).val(), "error");
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