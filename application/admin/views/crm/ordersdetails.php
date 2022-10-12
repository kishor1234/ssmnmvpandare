<section class="content-header">
    <h1>
        Your Order's
        <small>Oder Details</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Your Order's</li>
        <li class="active">Order Details</li>
    </ol>
</section>
<style>
    #invoice-right {
        float: right;
    }
    #summery-p{
        font-size: 14px;
        font-weight: bold;
    }
</style>
<style>
    * { box-sizing: border-box; }

    .container {
        background-image: url("https://www.toptal.com/designers/subtlepatterns/patterns/concrete-texture.png");
        display: flex;
        flex-wrap: wrap;
        height: 100vh;
        align-items: center;
        justify-content: center;
        padding: 0 20px;
    }

    .rating {
        display: flex;
        width: 50%;
        justify-content: center;
        overflow: hidden;
        flex-direction: row-reverse;
        /*height: 150px;*/
        position: relative;
    }

    .rating-0 {
        filter: grayscale(100%);
    }

    .rating > input {
        display: none;
    }

    .rating > label {
        cursor: pointer;
        width: 40px;
        height: 40px;
        margin-top: auto;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 76%;
        transition: .3s;
    }

    .rating > input:checked ~ label,
    .rating > input:checked ~ label ~ label {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
    }


    .rating > input:not(:checked) ~ label:hover,
    .rating > input:not(:checked) ~ label:hover ~ label {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
    }

    .emoji-wrapper {
        width: 100%;
        text-align: center;
        height: 100px;
        overflow: hidden;
        position: absolute;
        top: 0;
        left: 0;
    }

    .emoji-wrapper:before,
    .emoji-wrapper:after{
        content: "";
        height: 15px;
        width: 100%;
        position: absolute;
        left: 0;
        z-index: 1;
    }

    .emoji-wrapper:before {
        top: 0;
        background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
    }

    .emoji-wrapper:after{
        bottom: 0;
        background: linear-gradient(to top, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
    }

    .emoji {
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: .3s;
    }

    .emoji > svg {
        margin: 15px 0; 
        width: 70px;
        height: 70px;
        flex-shrink: 0;
    }

    #rating-1:checked ~ .emoji-wrapper > .emoji { transform: translateY(-100px); }
    #rating-2:checked ~ .emoji-wrapper > .emoji { transform: translateY(-200px); }
    #rating-3:checked ~ .emoji-wrapper > .emoji { transform: translateY(-300px); }
    #rating-4:checked ~ .emoji-wrapper > .emoji { transform: translateY(-400px); }
    #rating-5:checked ~ .emoji-wrapper > .emoji { transform: translateY(-500px); }

    .feedback {
        max-width: 360px;
        background-color: #fff;
        width: 100%;
        padding: 30px;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        align-items: center;
        box-shadow: 0 4px 30px rgba(0,0,0,.05);
    }
    #done{
        background-color: green;
        color:#FFF;
    }
    #processing{
        background-color: yellow;
    }
    #schedule{
        background-color: transparent;
    }
    #cancel{
        background-color: red;
        color:#FFF;
    }
    #Success{
        color:green;
    }

    small,#init, #failed{
        color:red;
    }


    .Success, .Completed{
        background-color: green !important;
    }
    .init,.Failed
    {
        background-color: red !important;

    }
    .Refund,.Canceled
    {
        background-color: orange !important;

    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js" type="text/javascript"></script>
<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="/assets/plugins/form/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/plugins/form/additional-methods.min.js" type="text/javascript"></script>
<script src="/assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->

    <div class="row">
        <?php
        $sql = $sql = "SELECT * FROM `orders` WHERE order_id='{$_REQUEST["id"]}'";
        $orderResult = $main->executeQuery($sql);
        $orderRow = $orderResult->fetch_assoc();
        ?>
        <div class="col-lg-12">
            <h1>Order Details <small id="<?= $orderRow["status"] ?>">(Order is <?= $orderRow["status"] ?>)</small></h1>
            <p id="summery-p">Ordered on <span id="orderDate"><?= date("d M Y", strtotime($orderRow["onCreate"])); ?></span> | Order#<span id="orderid"><?= $orderRow["order_id"] ?></span><span id="invoice-right"><a href="<?= $orderRow["invoice"] ?>" target="_blank">Invoice</a></span></p>

        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 col-xl-3">
                        <p id="summery-p">Shipping Address</p>
                        <p><?= $orderRow["shipping_address"] ?></p>
                        <p><?= $orderRow["shipping_address2"] ?></p>
                        <p><?= $orderRow["shipping_city"] . ", " . $orderRow["shipping_state"] . " " . $orderRow["shipping_zip"] ?> </p>
                        <p><?= $orderRow["shipping_country"] ?></p>
                        <?php
                        if (strcmp($orderRow["status"], "init") != 0 && strcmp($orderRow["status"], "Failed") != 0) {
                            ?>
                            <div class="">
                                <form method="post" id="orderStatus">
                                    <div class="form-group">
                                        <label>Change Status</label>
                                        <input type="text" required="" value="<?= $orderRow["status"] ?>" list="st" id="status" name="status" class="form-control">
                                    </div>
                                    <datalist id="st">
                                        <!--<option>init</option>-->
                                        <option>Success</option>
                                        <!--<option>Failed</option>-->
                                        <option>Refund</option>
                                        <option>Completed</option>
                                        <option>Canceled</option>
                                    </datalist>
                                    <input type="hidden" name="id" id="oid" value="<?= $orderRow["id"] ?>">
                                    <input type="hidden" name="action" id="action" value="updateStatus">

                                    <div class="form-group">
                                        <button class="btn-primary btn-sm form-control" id="update_btn" type="submit">Update</button>
                                    </div>

                                </form>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 col-xl-3">
                        <p id="summery-p">Payment Method</p>
                        <p><?= $orderRow["payment_mode"] ?></p>
                        <p><b>Razorpay Order ID: </b><?= $orderRow["razorpay_order_id"] ?></p>
                        <p><b>Payment ID :<?= $orderRow["payment_di"] ?></p>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 col-xl-3">

                        <p id="summery-p">Billing Address</p>
                        <p><?= $orderRow["billing_address"] ?></p>
                        <p><?= $orderRow["billing_address2"] ?></p>
                        <p><?= $orderRow["billing_city"] . ", " . $orderRow["billing_state"] . " " . $orderRow["shipping_zip"] ?> </p>
                        <p><?= $orderRow["billing_country"] ?></p>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 col-xl-3">
                        <p id="summery-p">Order Summary</p>  
                        <p>Items(s) Subtotal: <span style="float:right;">₹<?= $orderRow["subtotal"] ?></span></p>
                        <p>Discount: <span style="float:right;">₹<?= $orderRow["discount"] ?></span></p>
                        <p>GST: <span style="float:right;">₹<?= $orderRow["gst"] ?></span></p>
                        <p><b>Grand Total: <span style="float:right;">₹<?= $orderRow["final_total"] ?></span></b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <?php
            $innerQuery = "SELECT post.img,orderproduct.product,orderproduct.id,orderproduct.order_id,orderproduct.area,orderproduct.type,orderproduct.price FROM `post` INNER JOIN `orderproduct` ON orderproduct.post_id=post.post_id WHERE orderproduct.order_id='{$orderRow["order_id"]}'";
            //$innerQuery = "SELECT post.img,orderproduct.product,orderproduct.id,orderproduct.area,orderproduct.type,orderproduct.price,schedule.schedule,schedule.modify,schedule.modify_reson,schedule.assign,schedule.status FROM `post` INNER JOIN `orderproduct` ON orderproduct.post_id=post.post_id INNER JOIN `schedule` ON orderproduct.id=schedule.id WHERE orderproduct.order_id='{$row["order_id"]}'";
            $innerResult = $main->executeQuery($innerQuery);
            $row["product"] = array();

            while ($innerRow = $innerResult->fetch_assoc()) {
                ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 col-xl-4">
                            <h3><?= $innerRow["product"] ?></h3>
                            <p>
                                <img style="width: 50%; height: auto;" src="<?= $innerRow["img"] ?>" alt="<?= $innerRow["product"] ?>">
                                <br><span><a href="/booking/#<?= str_replace(' ', '-', $innerRow["product"]); ?>"><?= $innerRow["product"] ?></a></span>
                                <br><span><b>Area: </b><?= $innerRow["area"] ?></span>
                                <br><span><b>Type: </b><?= $innerRow["type"] ?></span>
                            </p>
                        </div>
                        <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 col-xl-8">
                            <h3>Service Schedule</h3>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Service No.</th>
                                    <th>Schedule</th>
                                    <th>Set</th>
                                    <th>Employee</th>
                                    <th>Status</th>
                                    <th>Review</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $schQuery = "SELECT * FROM `schedule` WHERE schedule.order_id='{$orderRow["order_id"]}' AND cid='{$innerRow["id"]}'";
                                $schResult = $main->executeQuery($schQuery);
                                $i = 0;
                                while ($schRow = $schResult->fetch_assoc()) {
                                    $i++;
                                    switch ($orderRow["status"]) {
                                        case "Success":
                                            ?>

                                            <tr id="<?= $schRow["status"] ?>">
                                                <td>Service <?= $schRow["id"] ?></td>
                                                <td>

                                                    <?= $schRow["schedule"] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    switch ($schRow["status"]) {
                                                        case "schedule":
                                                            echo "<button class=\"btn btn-primary btn-md \" data-toggle=\"modal\" data-target=\"#myModal\" onclick=\"updateSchedule('{$schRow["id"]}','{$schRow["schedule"]}','{$schRow["assign"]}')\" title=\"Set new schedule\"><span class=\"glyphicon glyphicon-time\"></span></button>";
                                                            break;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $schRow["assign"] ?></td>
                                                <td><?= ucfirst($schRow["status"]) ?></td>
                                                <td>
                                                    <?= "Thanks! You rated this {$schRow["rating"]} stars." ?>
                                                    <!--<button class="btn btn-warning btn-md" title="Star Reating" data-toggle="modal" data-target="#myRating" onclick="setReating('<?= $schRow["id"] ?>', '<?= $schRow["rating"] ?>', '<?= $schRow["feedback"] ?>')"><span class="glyphicon glyphicon-flag"></span></button></td>-->
                                                </td>

                                                <td>
                                                    <?php
                                                    switch ($schRow["status"]) {
                                                        default:
                                                            echo "<button class=\"btn btn-warning btn-md \" data-toggle=\"modal\" data-target=\"#myAssing\" onclick=\"updateStatus('{$schRow["id"]}','{$schRow["status"]}','{$schRow["assign"]}')\" title=\"Set new schedule\"><span class=\"glyphicon glyphicon-edit\"></span></button>";
                                                            break;
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                            <?php
                                            break;
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change your service schedule</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" id="change_schedule">
                                <div class="form-gorup">
                                    <label for="datetime">Schedule Date & Time</label>

                                    <div class='input-group date' id='datetimepicker'>
                                        <input type='text' class="form-control" name="schedule" id="schedule" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>

                                </div>
                                <div class="form-gorup">
                                    <label for="datetime">Modify Reasons</label>
                                    <textarea id="modify_reson" name="modify_reson" class="form-control"></textarea>
                                </div>

                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="modify" id="modify" value="<?= $_SESSION["id"] ?>">
                                <input type="hidden" name="action" id="action" value="changeSchedule">
                                <div class="form-gorup">
                                    <button type="submit" class="btn btn-primary" >Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <datalist id="employee">
        <?php
        $sql = $main->select("staff", $_SESSION["db_1"]);
        $res = $main->executeQuery($sql);
        while ($r = $res->fetch_assoc()) {
            echo "<option>{$r["fname"]}</option>";
        }
        ?>
    </datalist>
    <!-- Modal -->
    <div id="myAssing" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Assign Employee</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <form method="post" id="setStatus">
                                <div class="form-gorup">
                                    <label for="assign">Assign Service Employee</label>
                                    <input type="text" class="form-control" list="employee" id="assign" name="assign" placeholder="Get Employee name">
                                </div>

                                <div class="form-gorup">
                                    <label for="status">Service Status</label>
                                    <input type="text" class="form-control" list="sstatus" id="status" name="status" placeholder="Get Employee name">
                                </div>
                                <datalist id="sstatus">
                                    <option>done</option>
                                    <option>processing</option>
                                    <option>schedule</option>
                                    <option>cancel</option>
                                </datalist>

                                <input type="hidden" name="id" id="rid">
                                <input type="hidden" name="action" id="action" value="changeSchedule">
                                <div class="form-gorup">
                                    <button type="submit" id="feed_btn" class="btn btn-primary" >Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD LT'
        });
        $('#setStatus').validate({// initialize the plugin
            rules: {
                status: {
                    required: true
                },
                assign: {
                    required: true
                }
            },
            submitHandler: function (form) { // for demo
                $("#feed_btn").val("Please wait ...");
                var formdata = new FormData($(form)[0]);
                swal({
                    title: "Are you sure?",
                    text: "Once submit, your service status will updated",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    type: 'POST',
                                    url: '/?r=orders',
                                    data: formdata,
                                    contentType: false,
                                    processData: false,
                                    xhr: function () {
                                        //progressShow();
                                        var xhr = new XMLHttpRequest();
                                        xhr.upload.addEventListener('progress', function (e) {
                                            var progressbar = Math.round((e.loaded / e.total) * 100);
                                            //$("#inner-progress").css('width', progressbar + '%');
                                            $("#feed_btn").html("Please Wait... " + progressbar + '%');
                                        });
                                        return xhr;
                                    },
                                    success: function (objString) {
                                        console.log(objString);
                                        var obj = JSON.parse(objString);
                                        if (obj.status === 1)
                                        {
                                            $("#date_time_" + obj.id).val(obj.schedule);
                                            swal("Done! Your new scheduel successfully set.", {
                                                icon: "success",
                                            });
                                            location.reload();
                                        } else {
                                            swal("Error! new schedule not set, kindly contact support@tahaanpestsolutions.com", {
                                                icon: "danger",
                                            });

                                        }
                                        $("#feed_btn").val("Submit");

                                    },
                                    error: function (request, status, error) {
                                        printMessage("Please try agin after sometime", "danger", ".msg");
                                        $("#feed_btn").val("Submit");
                                        //   gcaptch();
                                    }
                                });
                            } else {
                                swal("Cancel to set schedule");
                            }
                        });


                return false; // for demo
            }
        });
        $('#change_schedule').validate({// initialize the plugin
            rules: {
                schedule: {
                    required: true
                },
                modify_reson: {
                    required: true
                }
            },
            submitHandler: function (form) { // for demo
                $("#change-btn").val("Please wait ...");
                var formdata = new FormData($(form)[0]);
                swal({
                    title: "Are you sure?",
                    text: "Once submit, your service schedule will updated",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    type: 'POST',
                                    url: '/?r=orders',
                                    data: formdata,
                                    contentType: false,
                                    processData: false,
                                    xhr: function () {
                                        //progressShow();
                                        var xhr = new XMLHttpRequest();
                                        xhr.upload.addEventListener('progress', function (e) {
                                            var progressbar = Math.round((e.loaded / e.total) * 100);
                                            //$("#inner-progress").css('width', progressbar + '%');
                                            $("#change-btn").html("Please Wait... " + progressbar + '%');
                                        });
                                        return xhr;
                                    },
                                    success: function (objString) {
                                        console.log(objString);
                                        var obj = JSON.parse(objString);
                                        if (obj.status === 1)
                                        {
                                            $("#date_time_" + obj.id).val(obj.schedule);
                                            swal("Done! Your new scheduel successfully set.", {
                                                icon: "success",
                                            });
                                            location.reload();
                                        } else {
                                            swal("Error! new schedule not set, kindly contact support@tahaanpestsolutions.com", {
                                                icon: "danger",
                                            });

                                        }
                                        $("#change-btn").val("Submit");

                                    },
                                    error: function (request, status, error) {
                                        printMessage("Please try agin after sometime", "danger", ".msg");
                                        $("#change-btn").val("Submit");
                                        //   gcaptch();
                                    }
                                });
                            } else {
                                swal("Cancel to set schedule");
                            }
                        });


                return false; // for demo
            }
        });
        $('#orderStatus').validate({// initialize the plugin
            rules: {
                status: {
                    required: true
                }
            },
            submitHandler: function (form) { // for demo
                $("#update-btn").val("Please wait ...");
                var formdata = new FormData($(form)[0]);
                swal({
                    title: "Are you sure?",
                    text: "Once submit, update status",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    type: 'POST',
                                    url: '/?r=orders',
                                    data: formdata,
                                    contentType: false,
                                    processData: false,
                                    xhr: function () {
                                        //progressShow();
                                        var xhr = new XMLHttpRequest();
                                        xhr.upload.addEventListener('progress', function (e) {
                                            var progressbar = Math.round((e.loaded / e.total) * 100);
                                            //$("#inner-progress").css('width', progressbar + '%');
                                            $("#update-btn").html("Please Wait... " + progressbar + '%');
                                        });
                                        return xhr;
                                    },
                                    success: function (objString) {
                                        console.log(objString);
                                        var obj = JSON.parse(objString);
                                        if (obj.status === 1)
                                        {
                                            $("#date_time_" + obj.id).val(obj.schedule);
                                            swal("Done! Your new scheduel successfully set.", {
                                                icon: "success",
                                            });
                                            location.reload();
                                        } else {
                                            swal("Error! new schedule not set, kindly contact support@tahaanpestsolutions.com", {
                                                icon: "danger",
                                            });

                                        }
                                        $("#update-btn").val("Submit");

                                    },
                                    error: function (request, status, error) {
                                        printMessage("Please try agin after sometime", "danger", ".msg");
                                        $("#update-btn").val("Submit");
                                        //   gcaptch();
                                    }
                                });
                            } else {
                                swal("Cancel to set schedule");
                            }
                        });


                return false; // for demo
            }
        });

    });
    function updateSchedule(id, schedule, assign) {
        var inputid = '#date_time_';
        //$("#schedulea").html($(inputid + id).val());

        $("#id").val(id);
        $("#schedule").val(schedule);
        $("#assign").val(assign);
    }

    function updateStatus(id, status, assign) {
        //alert(assign);
        $("#rid").val(id);
        $("#status").val(status);
        $("#assign").val(assign);
    }

    function setReating(id, star, feed) {
        if (star === '0')
        {
            $("#rating-" + 1).attr('checked', true);
            $("#rating-" + 1).attr('checked', false);
        } else {
            $("#rating-" + star).attr('checked', true);
        }
        $("#feedback").val(feed);
        $("#rid").val(id);

    }

</script>