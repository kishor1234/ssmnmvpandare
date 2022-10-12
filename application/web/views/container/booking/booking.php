<style>
    #pp{
        margin-left: 10px;
    }
    .o-video {
        width: 100%;
        height: 0;
        position: relative;
        padding-top: 56.25%; /* 9 / 16 * 100 */
    }
    #call{
        /*display: none;*/
    }
    .o-video > iframe {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        border: 0;
    }
    .about_us_sections.serv_3_wrapper {
        background: #FFFFFF !important;
    }
    .sp_choose_heading_main_wrapper {
        float: left;
        width: 100%;
        text-align: left !important;
    }
    .label-control{
        font-size: 14px;
        color:graytext;
    }

    .img-ct{
        -webkit-filter: opacity(.5) drop-shadow(0 0 0 blue);
        filter: opacity(.5) drop-shadow(0 0 0 blue);
    }
    .about_us_sections {
        float: left;
        width: 100%;
        height: 30%;
        background-position: center 0;
        background-size: cover;
        background-repeat: no-repeat;
        position: relative;
        padding-top: 60px !important;
        padding-bottom: 70px;
        overflow: hidden;
    }
    #gimage {
        position: absolute;
        width: 103px;
        /* height: 256px; */

    }
    .custome {
        background-color: #ddbb00;
        color: #000;
        border-radius: 0;
        border: #ddbb00;
    }

    @media only screen and (max-width: 768px) {
        #gimage {
            display: none;
        }
    }



</style>
<script src="/assets/plugins/form/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/plugins/form/additional-methods.min.js" type="text/javascript"></script>
<script src="/assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
<div class="about_us_sections serv_3_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <?php
                    $sql = $main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Booking"));
                    $result = $main->executeQuery($sql);
                    $i = 1;
                    $data;
                    while ($row = $result->fetch_assoc()) {
                        $title = str_replace(' ', '-', $row["title"]);
                        $data[$title] = $row["description"];
                        if ($i === 1) {
                            echo "<li class=\"active\"><a href=\"#{$title}\" data-toggle=\"tab\">{$row["title"]}</a></li>";
                        } else {
                            echo "<li><a href=\"#{$title}\" data-toggle=\"tab\">{$row["title"]}</a></li>";
                        }
                        $i++;
                    }
                    ?>

                </ul>
            </div>
            <br>
            <div class="col-lg-7">


                <div id="myTabContent" class="tab-content">
                    <?php
                    $i = 1;
                    foreach ($data as $key => $val) {
                        if ($i === 1) {
                            echo "<div class=\"tab-pane fade active in\" id=\"{$key}\">";
                            echo "<p>" . $val . "</p>";
                            echo "</div>";
                        } else {
                            echo "<div class=\"tab-pane fade in\" id=\"{$key}\">";
                            echo "<p>" . $val . "</p>";
                            echo "</div>";
                        }
                        $i++;
                    }
                    ?>

                </div>

            </div>
            <div class="col-lg-5">
                <div class="panel panel-primary">

                    <div class="panel-body">
                        <p>After completed your order schedule your service.</p>
                        <form action="javascript:void(0)" class="form-horizontal" id="myBookingForm" name="myBookingForm" method="post">
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <label class="label-control">Select Product </label>
                                </div>
                                <div class="col-lg-6">
                                    <select class="form-control" name="product"  id="product">

                                        <?php
                                        $result = $main->adminDB[$_SESSION["db_1"]]->query("SELECT DISTINCT pest FROM `price`");
                                        while ($row = $result->fetch_assoc()) {
                                            $title = str_replace(' ', '-', $row["pest"]);
                                            echo "<option value='{$row["pest"]}' data-toggle='#{$title}'>{$row["pest"]}</option>";
                                        }
                                        ?>

                                    </select>
                                </div>


                            </div>
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <label class="label-control">Select Flat Type </label>
                                </div>
                                <div class="col-lg-6">
                                    <select class="form-control" name="area" id="area">


                                        <?php
//                                        $result = $main->adminDB[$_SESSION["db_1"]]->query("SELECT * FROM `area`");
//                                        while ($row = $result->fetch_assoc()) {
//                                            echo "<option value='{$row["area"]}'>{$row["area"]}</option>";
//                                        }
                                        ?>
                                    </select>
                                </div>
                                <!--                                <div class="col-lg-2">
                                                                    <img id="gimage" src="/assets/images/user/tgean.png" alt=""/>
                                                                </div>-->

                            </div>
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <label class="label-control">Select Frequency </label>
                                </div>
                                <div class="col-lg-6">
                                    <select class="form-control" name="type" id="type">


                                        <?php
//                                        $result = $main->adminDB[$_SESSION["db_1"]]->query("SELECT * FROM `type`");
//                                        while ($row = $result->fetch_assoc()) {
//                                            echo "<option value='{$row["type"]}'>{$row["type"]}</option>";
//                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group" id="call">
                                <div class="col-lg-12">
                                    <a href="tel:+917045671515" class="btn btn-warning custome form-control">Call for custom charges</a>
                                </div>
                            </div>
                            <div class="form-group" id="online">
                                <div class="col-lg-4">
                                    <label class="label-control">Price</label>
                                </div>
                                <div class="col-lg-8 ">
                                    <div class="form-group">
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6 col-xs-6">
                                            <p id="price">₹ <span id="price-text"></span>/-</p>
                                            <p id="note">(Cash on Delivery)</p>
                                            <input type="hidden" id="prices" name="price">
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6 col-xs-6">
                                            <p id="price-online">₹ <span id="disamount-text"></span>/-</p>
                                            <p id="note">After <?= $_SESSION["discount"] ?>% discount through online payment</p>
                                            <input type="hidden" id="disamount" name="disamount">
                                            <input type="hidden" id="qty" name="qty" value="1">
                                        </div>
                                    </div>
                                    <p class="msg error">
                                        <?= $msg ?>
                                    </p>
                                    <p>
                                        <input type="hidden" name="action" id="action" value="addtocart">
                                        <input type="submit" id="cart-btn" class="btn btn-warning custome form-control" value="Add to cart">
                                    </p>
                                </div>

                            </div>
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="col-lg-3 col-sm-2 col-md-2 col-xl-2 col-xs-2">
                                            <img class="img-ct" src="/assets/images/user/offer.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-10 col-md-10 col-xl-10 col-xs-10">
                                            <p id="pp">
                                                5% off on online payment
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <div class="col-lg-2 col-sm-2 col-md-2 col-xl-2 col-xs-2">
                                            <img class="img-ct" src="/assets/images/user/assurance.png" alt=""/>
                                        </div>
                                        <div class="col-lg-10 col-sm-10 col-md-10 col-xl-10 col-xs-10">
                                            <p id="pp">

                                                Yearly service comes with year long protection assurance.
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        setServices();
        getArea();
        //getType();
        $('#area').on('change', function (event) {
            event.preventDefault();
            getServiceCost();
        });
        $('#type').on('change', function (event) {
            event.preventDefault();
            getServiceCost();
        });
        $(".nav-tabs li a").click(function (event) {
            event.preventDefault();
            $("#product option[value='" + $(this).html() + "']").prop('selected', true);
            getArea();
            getServiceCost();
        });
        $('#product').on('change', function (event) {
            event.preventDefault();
            var tabID = $(this).find(":selected").data('toggle');
            $('.nav-tabs li a[href="' + tabID + '"]').tab('show');
            getArea();
            //getType();
            getServiceCost();
        });
    });

    function setServices() {
        var url = $(location).attr('href').split("/").splice(0, 5).join("/");
        var segments = url.split('/');
        if (segments[4]) {
            $('.nav-tabs li a[href="' + segments[4] + '"]').tab('show');
            var str = segments[4].replace(/-/g, ' ');
            str = str.replace(/#/g, '');
            $("#product option[value='" + str + "']").prop('selected', true);
            getArea();

            getServiceCost();
        } else {
            var prod = $("#product").val();
            var str = prod.replace(/\s+/g, '-');
            $('.nav-tabs li a[href="#' + str + '"]').tab('show');
            //$("#product option[value='" + str + "']").prop('selected', true);
            getArea();
            getServiceCost();
        }
    }

    function getArea() {
        var formData = {product: $("#product").val()}; //Array 
        console.log(formData);
        $.ajax({
            url: "/getAreaList", // Url of backend (can be python, php, etc..)
            type: "POST", // data type (can be get, post, put, delete)
            data: formData, // data in json format
            async: true, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
            success: function (response, textStatus, jqXHR) {
                console.log("list");
                console.log(response);
                console.log("response");
                var json = JSON.parse(response);
                if (json.status === 1)
                {

                    $("#area").empty();
                    console.log(json.html);
                    $.each(json.html, function (index, value) {
                        $("#area").append(value);
                        console.log(value)

                    });
                    getType();


                } else {

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
    function getServiceCost() {
        var formData = {product: $("#product").val(), area: $("#area").val(), type: $("#type").val()}; //Array 
        $.ajax({
            url: "/getServiceCost", // Url of backend (can be python, php, etc..)
            type: "POST", // data type (can be get, post, put, delete)
            data: formData, // data in json format
            async: true, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
            success: function (response, textStatus, jqXHR) {
                var json = JSON.parse(response);
                if (json.status === 1)
                {
                    var data = json.data;

                    if (data.price === "0.00") {
                        $("#online").hide();
                        $("#call").show();
                    } else {
                        $("#online").show();
                        $("#call").hide();
                        $("#prices").val(data.price);
                        $("#disamount").val(data.disamount);
                        $("#price-text").html(data.price);
                        $("#disamount-text").html(data.disamount);
                    }

                } else {

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
    function getType() {
        var formData = {pest: $("#product").val(), area: $("#area").val()}; //Array 
        $.ajax({
            url: "/getServiceFreq", // Url of backend (can be python, php, etc..)
            type: "POST", // data type (can be get, post, put, delete)
            data: formData, // data in json format
            async: true, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
            success: function (response, textStatus, jqXHR) {
                var json = JSON.parse(response);
                if (json.status === 1)
                {


                    $("#type").empty();
                    $.each(json.html, function (index, value) {
                        $("#type").append(value);
                    });
                    getServiceCost();
                } else {

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
    $(function () {

        $('#myBookingForm').validate({// initialize the plugin
            rules: {

                product: {
                    required: true
                },
                area: {
                    required: true
                },
                type: {
                    required: true
                },
                prices: {
                    required: true
                },
                disamount: {
                    required: true
                }
            },
            submitHandler: function (form) { // for demo
                $("#cart-btn").val("Please wait ...");
                var formdata = new FormData($(form)[0]);
                $.ajax({
                    type: 'POST',
                    url: '/cart',
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
                                text: "Your service added to cart successfully..",
                                icon: "success",
                                button: "Okay",
                            });
                        } else {
                            printMessage(obj.message, "danger", ".msg");

                        }
                        $("#cart-btn").val("Add to cart");
                        loadCart();
                    },
                    error: function (request, status, error) {
                        printMessage("Please try agin after sometime", "danger", ".msg");
                        $("#cart-btn").val("Login");
                        //   gcaptch();
                    }
                });
                return false; // for demo
            }
        });

    });
    function printMessage(message, clas, display)
    {
        var m = '<div class="alert alert-' + clas + ' text-center"><strong>' + message +
                '</strong></div>';
        $(display).html(m);
    }

</script>