<section class="content-header">
    <h1>
        Dashboard
        <small>Your Order's</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Your Order's</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->

    <div class="row">
        <div class="col-lg-10">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#orders" data-toggle="tab">Orders</a></li>
                <li><a href="#cancelled" data-toggle="tab">Cancelled Orders</a></li>

            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="orders">
                    <div class="row">
                        <div class="col-lg-12">
                            <div style="margin:10px 0px;">
                                <p>
                                    <b><span id="nooforders">0</span> orders</b> placed in 
                                    <select id="order_years">
                                        <!--                                        <option value="3 months">Last 3 month</option>
                                                                                <option value="6 months">Last 6 month</option>-->
                                        <?php
                                        $currentYear = date("Y");
                                        $startyear = explode("-", $_SESSION['onCreate']);
                                        $year = $startyear[0];
                                        for ($i = $startyear[0]; $i <= $currentYear; $i++) {

                                            echo "<option value='{$year}'>{$year}</option>";
                                            $year++;
                                        }
                                        ?>
                                    </select>
                                </p>
                            </div>
                            <div class="msg">

                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="cancelled">
                    <div class="row">
                        <div class="col-lg-12">
                            <div style="margin:10px 0px;">
                                <p>
                                    <b><span id="nooforderscancel">0</span> orders</b> placed in 
                                    <select id="order_years">
                                        <!--                                        <option value="3 months">Last 3 month</option>
                                                                                <option value="6 months">Last 6 month</option>-->
                                        <?php
                                        $currentYear = date("Y");
                                        $startyear = explode("-", $_SESSION['onCreate']);
                                        $year = $startyear[0];
                                        for ($i = $startyear[0]; $i <= $currentYear; $i++) {

                                            echo "<option value='{$year}'>{$year}</option>";
                                            $year++;
                                        }
                                        ?>
                                    </select>
                                </p>
                            </div>
                            <div class="msgcancel">

                            </div>

                        </div>
                    </div>
                </div>

            </div>

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
        var cancelOrder = function () {
            var year = $("#order_years").val();
            var formData = {year: $("#order_years").val(), status: "Canceled", action: "loadYourOrder"}; //Array 
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
                        $(".msgcancel").html(json.message);
                        $("#nooforderscancel").html(len);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });

        };
        cancelOrder();
    });
</script>