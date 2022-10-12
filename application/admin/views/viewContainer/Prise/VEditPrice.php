<?php
$fl = false;
if (!isset($_REQUEST["i"]) && empty($_REQUEST["i"])) {
    $msg = $main->printMessage("Invalid request parameter !", "danger");
} else {
    $fl = true;
}
?>
<section class="content-header">
    <h1>
        Company
        <small>Price Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Your Page Content Here -->
    <div id="display">
        <div class="row">
            <?php
           if ($fl) {
               $sql=$main->select("price", $_SESSION["db_1"]).$main->whereSingle(array("price_id" => $_REQUEST["i"]));
                $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                if ($row = $result->fetch_assoc()) {
                    $_SESSION["priceid"]=$row["price_id"];
                    ?>
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Edit Pest Price</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-container">
                                    <form action="javascript:void(0)" method="post" id="myForm" onsubmit="return postDataWithRedirect('<?php echo $obj->encdata("C_UpdatePrise") ?>', '#myForm', '#display', '?r=<?php echo $obj->encdata("C_OpenLinkTrue") . "&v=" . $obj->encdata("VPrise") . "&tk=0"; ?>')">
<!--                                        <div class="col-lg-12">
                                            <label>Location <i class="fa fa-map-marker"></i><small class="text-danger">*</small></label>
                                            <select class="form-control" disabled id="location" required="">
                                                <option value="">Select</option>
                                                <option value="<?php echo $row["location"];?>" selected=""><?php echo $row["location"];?></option>
                                                <?php
//                                                $branchResult = $main->adminDB[$_SESSION["db_1"]]->query($main->select("hf_branch", $_SESSION["db_1"]));
//                                                while ($branch = $branchResult->fetch_assoc()) {
//                                                    echo "<option value='" . $branch["blocation"] . "'>" . $branch["blocation"] . "</option>";
//                                                }
                                                ?>
                                            </select>
                                        </div>-->
                                        <div class="col-lg-12">
                                            <label>Pest <small class="text-danger">*</small></label>
                                            <select class="form-control" disabled id="pest" required="">
                                                <option value="<?php echo $row["pest"];?>" selected=""><?php echo $row["pest"];?></option>
                                                <option value="">Select</option>
                                                <?php
                                                $pestResult = $main->adminDB[$_SESSION["db_1"]]->query($main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Services")));
                                                while ($pest = $pestResult->fetch_assoc()) {
                                                    echo "<option value='" . $pest["title"] . "'>" . $pest["title"] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Area <small class="text-danger">*</small></label>
                                            <select class="form-control" disabled id="area" required="">
                                                <option value="">Select</option>
                                                <option value="<?php echo $row["area"];?>" selected=""><?php echo $row["area"];?></option>
                                                <?php
                                                $areaResult = $main->adminDB[$_SESSION["db_1"]]->query($main->select("area", $_SESSION["db_1"]));
                                                while ($area = $areaResult->fetch_assoc()) {
                                                    echo "<option value='" . $area["area"] . "'>" . $area["area"] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Type <small class="text-danger">*</small></label>
                                            <select class="form-control" disabled id="type" required="">
                                                
                                                <option value="">Select</option>
                                                <option value="<?php echo $row["type"];?>" selected=""><?php echo $row["type"];?></option>
                                                <?php
                                                $typeResult = $main->adminDB[$_SESSION["db_1"]]->query($main->select("type", $_SESSION["db_1"]));
                                                while ($type = $typeResult->fetch_assoc()) {
                                                    echo "<option value='" . $type["type"] . "'>" . $type["type"] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Price <small class="text-danger">*</small></label>
                                            <input type="number" value="<?php echo $row["price"];?>" id="price" name="price" placeholder="Price" required="" class="form-control">
                                        </div>
<!--                                        <div class="col-lg-12">
                                            <label>How Many Services <small class="text-danger">*</small></label>
                                            <input type="number" value="<?php echo $row["hms"];?>" id="hms" name="hms" placeholder="How Many Services" required="" class="form-control">
                                        </div>-->

                                        <div class="col-lg-12">
                                            <input id="submitButton" class="btn btn-primary" type="submit"  value="Update Price" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo $msg;
            }
            ?>
        </div>
    </div>

</section><!-- /.content -->
