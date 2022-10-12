<?php
$limit = 25;
if (!empty($main->filterPost("limit"))) {
    $limit = $main->filterPost("limit");
}

$sql = $main->selectCount("areaserved", "id"); // . $main->whereSingle(array("isActive" => "0"));
$result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
$r = $result->fetch_assoc();
$max_count = $r["count(id)"];

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
        <h3 class="box-title">All Area</h3>
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
                        <form action="javascript:void(0)" method="post" id="myForm" onsubmit="return postDataWithRedirect('<?= $obj->encdata("C_CreateAreaServed") ?>', '#myForm', '#display', '?r=<?= $obj->encdata("C_OpenLinkTrue") . "&v=" . $obj->encdata("VAreasServed") . "&tk=0"; ?>')">
                            <div class="col-lg-12">
                                <label>Enter Area Name <small class="text-danger">*</small></label>
                                <input type="text"  id="area" class="form-control" name="area"  placeholder="Enter Area" /> 
                            </div>
                            <div class="col-lg-3">
                                <input type="checkbox" name="served"  id="served" ><label> &nbsp;Served Area</label>
                            </div>
                            <div class="col-lg-3">
                                <input type="checkbox" name="popular"  id="popular" ><label> &nbsp;Popular Area</label>
                            </div>
                            <input type="hidden" name="action" id="action" value="save">
                            <input type="hidden" name="id" id="id" >
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
                        <th>Area</th>
                        <th>Served</th>
                        <th>Popular</th>
                        <th>IP</th>
                        <th>Create On</th>
                        <th>Action</th>

                    </tr>

                    <?php
                    $sql = $main->select("areaserved", $_SESSION["db_1"]) . $main->orderBy("DESC", "id") . $main->limitWithOffset($offset, $limit);
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr id="#trsk<?= $row["id"]; ?>">
                            <td><?= $i; ?></td>
                            <td><?= $row["id"]; ?></td>
                            <td><?= $row["area"]; ?></td>
                            <td><?= $row["served"]; ?></td>
                            <td><?= $row["popular"]; ?></td>
                            <td><?= $row["ip"]; ?></td>
                            <td><?= $row["onCreate"]; ?></td>
                            <td>
                                <a href="javascript:void(0)" onclick="return deleteLogo('<?= $obj->encdata("C_DeleteAreaServed"); ?>', '#msg', '<?= $row["id"]; ?>')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> 
                                </a>
                                <a href="javascript:void(0)" onclick="return showPopup('<?= $row["id"]; ?>', '<?= $row["area"]; ?>', '<?= $row["served"]; ?>', '<?= $row["popular"]; ?>')" class="btn btn-success btn-xs">
                                    <i class="fa fa-edit"></i> 
                                </a>
                            </td>
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
                Showing Record Per Pages <?= $offset . " to " . $ct . " of " . $max_count . " entries"; ?>
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
                        ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?= $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VAreasServed") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');">&laquo;</a></li><?php
                        }

                        while ($i < $max_count) {
                            if ($k == $page) {
                                $fl = $k;
                                ?><li class = 'disabled'> <a href="#"><?= $k; ?></a></li><?php
                            } else {
                                ?><li><a href ='javascript:void(0)' onclick="return postURL3('<?= $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VAreasServed") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');"> <?= $k; ?></a></li><?php
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
                            ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?= $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VAreasServed") . "&pg=" . $t . "&tk=0"; ?>', '#display', '1');">&raquo;</a></li><?php
                        }
                        ?>



                </ul>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    function showPopup(id, area, served, popular) {
        $('#myModal').modal('show');
        $("#id").val(id);
        $("#area").val(area);
        $("#action").val("update");
        if(served==="on"){
           $('#served').prop('checked', true); 
        }else{
            $('#served').prop('checked', false);
        }
        if(popular==="on"){
           $('#popular').prop('checked', true); 
        }else{
            $('#popular').prop('checked', false);
        }
        
    }
//    $(document).ready(function () {
//        $('#submitButton').click(function () {
//            $('#uploadForm').ajaxForm({
//                target: '#outputImage',
//                url: '<?= HOSTURL; ?>/?r=C_UploadLogo',
//                beforeSubmit: function () {
//                    $("#outputImage").hide();
//                    if ($("#uploadImage").val() == "") {
//                        $("#outputImage").show();
//                        $("#outputImage").html("<div class='error'>Choose a file to upload.</div>");
//                        return false;
//                    }
//                    $("#progressDivId").css("display", "block");
//                    var percentValue = '0%';
//
//                    $('#progressBar').width(percentValue);
//                    $('#percent').html(percentValue);
//                },
//                uploadProgress: function (event, position, total, percentComplete) {
//
//                    var percentValue = percentComplete + '%';
//                    $("#progressBar").animate({
//                        width: '' + percentValue + ''
//                    }, {
//                        duration: 5000,
//                        easing: "linear",
//                        step: function (x) {
//                            percentText = Math.round(x * 100 / percentComplete);
//                            $("#percent").text(percentText + "%");
//                            if (percentText == "100") {
//                                $("#outputImage").show();
//                            }
//                        }
//                    });
//                },
//                error: function (response, status, e) {
//                    alert('Oops something went.');
//                },
//                complete: function (xhr) {
//                    if (xhr.responseText && xhr.responseText != "error")
//                    {
//                        $("#outputImage").html(xhr.responseText);
//                    } else {
//                        $("#outputImage").show();
//                        //$("#outputImage").html("<div class='error'>Problem in uploading file.</div>");
//                        //$("#progressBar").stop();
//                        $("#outputImage").html(xhr);
//                    }
//                }
//            });
//        });
//    });
</script>