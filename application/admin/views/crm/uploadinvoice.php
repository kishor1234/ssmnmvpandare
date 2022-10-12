<section class="content-header">
    <h1>
        Invoice
        <small>Upload</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order</li>
        <li class="active">Invoice</li>
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
    #Success{
        color:green;
    }
    small,#init, #failed{
        color:red;
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
            <h1>Order Details <small id="<?= $orderRow["status"] ?>">(Payment is <?= $orderRow["status"] ?>)</small></h1>
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
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 col-xl-3">
                        <p id="summery-p">Payment Method</p>
                        <p><?= $orderRow["payment_mode"] ?></p>
                        <p><b>Razorpay Order ID: </b><?= $orderRow["razorpay_order_id"] ?></p>
                        <p><b>Payment ID :<?= $orderRow["payment_di"] ?></p>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 col-xl-3"></div>
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
        <div class="col-lg-4">
            <?php
            if (strcmp($orderRow["status"], "Success") == 0 || strcmp($orderRow["status"], "Completed") == 0) {
                ?>

                <form method="post" id="uploadInvoice">
                    <div class="form-group">
                        <label for="invoice">Upload PDF Invoice</label>
                        <input type="file" id="invoice" name="invoice" placeholder="Select File" class="form-control">
                    </div>
                    <input type="hidden" id="order_id" name="order_id" value="<?= $_REQUEST["id"] ?>" accept="application/pdf">
                    <input type="hidden" id="action" name="action" value="uploadInvoice">
                    <div class="form-group">
                        <button class="btn btn-success btn-sm form-control" type="submit">Save</button>
                    </div>
                </form>
                <?php
            }
            ?>
        </div>
        <div class="col-lg-8">

            <iframe src="<?= $orderRow["invoice"] ?>" style="width:100%; height: 500px;">
            </iframe>

        </div>
    </div>

</section>
<script>
    $(function () {

        $('#uploadInvoice').validate({// initialize the plugin
            rules: {
                invoice: {
                    required: true
                }
            },
            submitHandler: function (form) { // for demo
                $("#invoice_btn").val("Please wait ...");
                var formdata = new FormData($(form)[0]);
                swal({
                    title: "Are you sure?",
                    text: "Once submit, your invoice will access user directly",
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
                                            $("#invoice_btn").html("Please Wait... " + progressbar + '%');
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
                                        $("#invoice_btn").val("Submit");
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


</script>