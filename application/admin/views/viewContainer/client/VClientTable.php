<?php
$limit = 25;
if (!empty($main->filterPost("limit"))) {
    $limit = $main->filterPost("limit");
}

$sql = $main->selectCount("client", "id"); // . $main->whereSingle(array("isActive" => "0"));
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

?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">All Logos</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> ADD</button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <style>
                .form-container
                {
                    width: 500px;

                }
                form {
                    display: block;
                    margin-left: 60px;
                }

                .progress {
                    display: none;
                    position: relative;

                    width: 400px;
                    background-color: #ddd;
                    border: 1px solid blue;
                    padding: 1px;
                    left: 15px;
                    border-radius: 3px;
                }

                .progress-bar {
                    background-color: green;
                    width: 0%;
                    height: 30px;
                    border-radius: 4px;
                    -webkit-border-radius: 4px;
                    -moz-border-radius: 4px;
                }

                .percent {
                    position: absolute;
                    display: inline-block;
                    color: #fff;
                    font-weight: bold;
                    top: 50%;
                    left: 50%;
                    margin-top: -9px;
                    margin-left: -20px;
                    -webkit-border-radius: 4px;
                }

                #outputImage {
                    display: none;
                }

                .error {
                    color: #ad7b7b;
                    background: #ffb3b3;
                    padding: 10px;
                    box-sizing: border-box;
                    margin: 10px;
                    border-radius: 3px;
                    border: #f1a8a8 1px solid;
                }

                input#uploadImage {
                    border: #f1f1f1 1px solid;
                    padding: 6px;
                    border-radius: 3px;
                }

                #outputImage img {
                    max-width: 300px;
                }

                #submitButton {
                    padding: 7px 20px;
                    background: #9a9a9a;
                    border: #898a89 1px solid;
                    color: #F0F0F0;
                    margin-left: 10px;
                    border-radius: 3px;
                    font-size: 0.8em;
                }

                .error {

                }
            </style>
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload Logo</h4>
                </div>
                <div class="modal-body">
                    <center>
                        <div class="form-container">
                            <form action="/?r=C_UploadClient" id="uploadForm" name="frmupload" method="post" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    <input type="file"  id="uploadImage" name="uploadImage" /> 
                                </div>
                                <div class="col-lg-6">
                                    <input id="submitButton" class="btn btn-primary" type="submit" name='btnSubmit' value="Submit Image" />
                                </div>
                            </form>
                            <br><br>
                            <div class='progress' id="progressDivId">
                                <div class='progress-bar' id='progressBar'></div>
                                <div class='percent' id='percent'>0%</div>
                            </div>
                            <div style="height: 10px;"></div>
                            <div id='outputImage'></div>
                        </div>
                    </center>
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
                        <th>Logo ID</th>
                        <th>Logo</th>
                        <th>IP</th>
                        <th>Create On</th>
                        <th>Action</th>

                    </tr>

                    <?php
                    $sql = $main->select("client", $_SESSION["db_1"]) . $main->orderBy("DESC", "id") . $main->limitWithOffset($offset, $limit);
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr id="#trsk<?php echo $row["id"]; ?>">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row["id"]; ?></td>
                            <td><img src="<?php echo $row["logo"]; ?>" style="width:50px; height:auto;"></td>
                            <td><?php echo $row["ip"]; ?></td>
                            <td><?php echo $row["onCreate"]; ?></td>
                            <td><a href="javascript:void(0)" onclick="return deleteLogo('<?php echo $obj->encdata("C_DeleteClient") . "&logo=" . $obj->encdata($row["logopath"]); ?>', '#msg', '<?php echo $row["id"]; ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete Logo</a></td>
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
                        ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VLogoTable") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');">&laquo;</a></li><?php
                        }

                        while ($i < $max_count) {
                            if ($k == $page) {
                                $fl = $k;
                                ?><li class = 'disabled'> <a href="#"><?php echo $k; ?></a></li><?php
                            } else {
                                ?><li><a href ='javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VLogoTable") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');"> <?php echo $k; ?></a></li><?php
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
                            ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VLogoTable") . "&pg=" . $t . "&tk=0"; ?>', '#display', '1');">&raquo;</a></li><?php
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
                url: '<?php echo HOSTURL; ?>/?r=C_UploadClient',
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