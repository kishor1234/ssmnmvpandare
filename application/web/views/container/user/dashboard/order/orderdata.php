<style>
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
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 col-xl-3">
                <span>ORDER PLACED</span>
                <p><?= date("d M Y", strtotime($order["onCreate"])); ?></p>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 col-xl-3">
                <span>TOTAL</span>
                <span>₹<?= $order["final_total"] ?></span>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 col-xl-3">
                <span>SHIP TO</span>
                <p><?= $order["fname"] . " " . $order["lname"] ?></p>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 col-xl-3">
                <span>ORDER #<?= $order["order_id"] ?></span>

            </div>
        </div>
        <div class="badge-overlay">
            <!-- Change Badge Position, Color, Text here-->
            <span class="top-left badge <?= $order["status"] ?>"><?= $order["status"] ?></span>
        </div>

    </div>
    <div class="panel-body">
        <div class="row">
            <?php
            foreach ($order["product"] as $key => $val) {
                ?>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 col-xl-3">
                    <p>
                        <img style="width: 50%; height: auto;" src="<?= $val["img"] ?>" alt="<?= $val["product"] ?>">
                        <br><span><a href="/booking/#<?= str_replace(' ', '-', $val["product"]); ?>"><?= $val["product"] ?></a></span>
                        <br><span><b>Area: </b><?= $val["area"] ?></span>
                        <br><span><b>Type: </b><?= $val["type"] ?></span>
                        <?php
                        switch ($order["status"]) {
                            case "Success":
                                ?>
                                <br><span><b>Schedule: </b><a href="/setschedule/<?= $val["order_id"] ?>">Set Schedule</a></span>
                                <?php
                                break;
                        }
                        ?>

                    </p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>