<?php
$limit = 25;
if (!empty($main->filterPost("limit"))) {
    $limit = $main->filterPost("limit");
}

$sql = $main->selectCount("price", "price_id"); // . $main->whereSingle(array("isActive" => "0"));
$result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
$r = $result->fetch_assoc();
$max_count = $r["count(price_id)"];

$page = 1;
$offset = 0;

if (isset($_REQUEST["pg"])) {
    $page = $_REQUEST["pg"];
    $tempLimit = $limit;
    $tempLimit = $limit * $page;
    $offset = $tempLimit - $limit;
} else {
    $limit = $limit * $page;
    $offset = 0;
}
$i = 0;
$sql = $main->update(array("rd" => "1"), "notification"); //. $this->whereSingle(array("tid" => $_REQUEST["id"]));
$main->adminDB[$_SESSION["db_1"]]->query(($sql));
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">All Prise</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> ADD</button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Area</h4>
                </div>
                <div class="modal-body">

                    <div class="form-container">
                        <form action="javascript:void(0)" method="post" id="myForm" onsubmit="return postDataWithRedirect('<?php echo $obj->encdata("C_CreatePrise") ?>', '#myForm', '#display', '?r=<?php echo $obj->encdata("C_OpenLinkTrue") . "&v=" . $obj->encdata("VPrise") . "&tk=0"; ?>')">
<!--                            <div class="col-lg-12">
                                <label>Location <i class="fa fa-map-marker"></i><small class="text-danger">*</small></label>
                                <select class="form-control" name="location" id="location" required="">
                                    <option value="">Select</option>
                                    <?php
//                                    $branchResult = $main->adminDB[$_SESSION["db_1"]]->query($main->select("hf_branch", $_SESSION["db_1"]));
//                                    while ($branch = $branchResult->fetch_assoc()) {
//                                        echo "<option value='" . $branch["blocation"] . "'>" . $branch["blocation"] . "</option>";
//                                    }
                                    ?>
                                </select>
                            </div>-->
                            <div class="col-lg-12">
                                <label>Pest <small class="text-danger">*</small></label>
                                <select class="form-control" name="pest" id="pest" required="">
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
                                <select class="form-control" name="area" id="area" required="">
                                    <option value="">Select</option>
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
                                <select class="form-control" name="type" id="type" required="">
                                    <option value="">Select</option>
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
                                <input type="number" id="price" name="price" placeholder="Price" required="" class="form-control">
                            </div>
<!--                            <div class="col-lg-12">
                                <label>How Many Services <small class="text-danger">*</small></label>
                                <input type="number"  id="hms" name="hms" placeholder="How Many Services" required="" class="form-control">
                            </div>-->
                            <div class="col-lg-12">
                                <input id="submitButton" class="btn btn-primary" type="submit"  value="Save" />
                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="location.reload();" data-dismiss="modal">Done</button>
                </div>
            </div>

        </div>
    </div>
    <div class="box-body">

        <div class="form-group" id='adp'>
            <div class="col-lg-12" style="overflow: auto;">
                <table id="example" class="table table-hover  table-responsive table-bordered table-striped">
                    <tr>
                        <th>#</th>
                        <th>ID</th>
<!--                        <th>Location</th>-->
                        <th>Pest</th>
                        <th>Area</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Create</th>
                        <th>Action</th>

                    </tr>

                    <?php
                    $sql = $main->select("price", $_SESSION["db_1"]) . $main->orderBy("DESC", "price_id") . $main->limitWithOffset($offset, $limit);
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr id="#trsk<?php echo $row["price_id"]; ?>">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row["price_id"]; ?></td>
<!--                            <td><?php //echo $row["location"]; ?></td>-->
                            <td><?php echo $row["pest"]; ?></td>
                            <td><?php echo $row["area"]; ?></td>
                            <td><?php echo $row["type"]; ?></td>
                            <td><?php echo $row["price"]; ?></td>
                            <td><?php echo $row["onCreate"]; ?></td>
                            <td><a href="javascript:void(0)" onclick="return deleteLogo('<?php echo $obj->encdata("C_DeletePrise"); ?>', '#msg', '<?php echo $row["price_id"]; ?>')" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i>  </a>
                                <a href="/?r=<?php echo $obj->encdata("C_OpenLinkTrue") . "&v=" . $obj->encdata("VEditPrice") . "&i=" . $row["price_id"]; ?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i>  </a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <?php
                $ct = ($limit + $offset);
                if ($ct > $max_count) {
                    $ct = $max_count;
                }
                ?>
                Showing Record Per Pages <?php echo $offset . " to " . $ct . " of " . $max_count . " entries"; ?>
            </div>
            <div class="col-lg-6">
                <ul class = "pagination pagination-sm" style="float: right;">
                    <?php
                    $i = 0;
                    $k = 1;
                    $fl = 0;
                    if ($k == $page) {
                        $t = $page - 1;
                        ?> <li class = 'disabled'><a href="#">&laquo;</a></li><?php
                    } else {
                        ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VPriseTable") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');">&laquo;</a></li><?php
                        }

                        while ($i < $max_count) {
                            if ($k == $page) {
                                $fl = $k;
                                ?><li class = 'disabled'> <a href="#"><?php echo $k; ?></a></li><?php
                            } else {
                                ?><li><a href ='javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VPriseTable") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');"> <?php echo $k; ?></a></li><?php
                            }
                            $k++;
                            $i = $i + $limit;
                        }
                        $k--;
                        if ($fl == $k) {
                            $t = $page + 1;
                            ?> <li class = 'disabled'><a href="#">&raquo;</a></li><?php
                        } else {
                            $t = $page + 1;
                            ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VPriseTable") . "&pg=" . $t . "&tk=0"; ?>', '#display', '1');">&raquo;</a></li><?php
                        }
                        ?>



                </ul>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#submitButton').click(function () {
            $('#uploadForm').ajaxForm({
                target: '#outputImage',
                url: '<?php echo HOSTURL; ?>/?r=C_UploadLogo',
                beforeSubmit: function () {
                    $("#outputImage").hide();
                    if ($("#uploadImage").val() == "") {
                        $("#outputImage").show();
                        $("#outputImage").html("<div class='error'>Choose a file to upload.</div>");
                        return false;
                    }
                    $("#progressDivId").css("display", "block");
                    var percentValue = '0%';

                    $('#progressBar').width(percentValue);
                    $('#percent').html(percentValue);
                },
                uploadProgress: function (event, position, total, percentComplete) {

                    var percentValue = percentComplete + '%';
                    $("#progressBar").animate({
                        width: '' + percentValue + ''
                    }, {
                        duration: 5000,
                        easing: "linear",
                        step: function (x) {
                            percentText = Math.round(x * 100 / percentComplete);
                            $("#percent").text(percentText + "%");
                            if (percentText == "100") {
                                $("#outputImage").show();
                            }
                        }
                    });
                },
                error: function (response, status, e) {
                    alert('Oops something went.');
                },
                complete: function (xhr) {
                    if (xhr.responseText && xhr.responseText != "error")
                    {
                        $("#outputImage").html(xhr.responseText);
                    } else {
                        $("#outputImage").show();
                        //$("#outputImage").html("<div class='error'>Problem in uploading file.</div>");
                        //$("#progressBar").stop();
                        $("#outputImage").html(xhr);
                    }
                }
            });
        });
    });
</script>