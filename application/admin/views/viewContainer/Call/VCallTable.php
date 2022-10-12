<?php
$limit = 5;
if (!empty($main->filterPost("limit"))) {
    $limit = $main->filterPost("limit");
}

$sql = $main->selectCount("booking", "id"); // . $main->whereSingle(array("isActive" => "0"));
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
                    <p>Call Request Can add by end user only</p>
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
                        
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Service</th>
                        <th>Message</th>
                        <th>Area</th>
                        <th>Create</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $cal=array("default","danger");
                    $sql = $main->select("booking", $_SESSION["db_1"]) . $main->orderBy("DESC", "id") . $main->limitWithOffset($offset, $limit);
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        ?>
                    <tr id="#trsk<?php echo $row["id"]; ?>" class="<?php echo $cal[$row["isActive"]];?>">
                            
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["mobile"]; ?></td>
                            <td><?php echo $row["ourservices"]; ?></td>
                            <td><?php echo $row["message"]; ?></td>
                            <td><?php echo $row["area"]; ?></td>
                            <td><?php echo $row["onCreate"]; ?></td>
                            <td><a href="javascript:void(0)" onclick="return postURL('<?php echo $obj->encdata("C_ApproveCall"); ?>', '#msg', '<?php echo $row["id"]; ?>')" class="btn btn-primary btn-sm" title="Approve"><i class="fa fa-save"></i>  </a></td>
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
                        ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VCallTable") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');">&laquo;</a></li><?php
                        }

                        while ($i < $max_count) {
                            if ($k == $page) {
                                $fl = $k;
                                ?><li class = 'disabled'> <a href="#"><?php echo $k; ?></a></li><?php
                            } else {
                                ?><li><a href ='javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VCallTable") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');"> <?php echo $k; ?></a></li><?php
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
                            ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VCallTable") . "&pg=" . $t . "&tk=0"; ?>', '#display', '1');">&raquo;</a></li><?php
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
                    }
                    else {
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