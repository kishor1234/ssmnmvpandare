<?php
$limit = 10;
if (!empty($main->filterPost("limit"))) {
    $limit = $main->filterPost("limit");
}
$sql = $main->selectCount("project", "id"); // . $main->whereSingle(array("isActive" => "0"));
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
        <h3 class="box-title">Menu List's</h3>
        <a href="#" data-toggle="modal" data-target="#project"  id="right" class="bnt btn-primary btn-sm"><i class="fa fa-plus"></i> ADD NEW</a>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

        </div>
    </div>
    <div class="box-body">
        <div class="form-group">
            <div class="col-lg-6">
                <table>
                    <tr>
                        <td>
                            <strong>Select Record Per Page</strong>
                        </td>
                        <td>
                            <select id="limit" name="limit" onchange="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VLoanTypeTable") . "&pg=" . $page . "&tk=0"; ?>', '#display', '1');">
                                <option value="<?php echo $limit; ?>"><?php echo $limit; ?></option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="col-lg-6"> 
                <table style="width:100%;">
                    <tr>
                        <td>
                            <strong>Search</strong>
                        </td>
                        <td>
                            <input type="text" class="form-control" list="alluserlist"  name="keyword" id="keyword" placeholder="Search User by Name" onkeyup="SearchByNameBySelect('#keyword', '#alluserlist', '<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VBranchSearchTable") . "&tk=0"; ?>', '#adp')">

                        </td>
                    </tr>
                </table>
            </div>


        </div>
        <br><br>
        <div class="form-group" id='adp'>
            <div class="col-lg-12" style="overflow: auto;">
                <table class="table table-hover table-responsive table-striped table-bordered">

                    <tr>
                        <th>id</th>
                        <th>root</th>
                        <th>controller</th>
                        <th>view</th>
                        <th>domain</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql = $main->select("project", $_SESSION["db_1"]) . $main->orderBy("DESC", "id") . $main->limitWithOffset($offset, $limit);
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["root"]; ?></td>
                            <td><?php echo $row["controller"]; ?></td>
                            <td><?php echo $row["view"]; ?></td>
                            <td><?php echo $row["domain"]; ?></td>

                            <td>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#project"  onclick="view('<?= $row["id"] ?>')"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"  onclick="del('<?= $row["id"] ?>')"><i class="fa fa-trash"></i></button>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>
                </table>

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
                Showing Restul <?php echo $offset . " to " . $ct . " of " . $max_count . " entries"; ?>
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
                        ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VProject") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');">&laquo;</a></li><?php
                        }

                        while ($i < $max_count) {
                            if ($k == $page) {
                                $fl = $k;
                                ?><li class = 'disabled'> <a href="#"><?php echo $k; ?></a></li><?php
                            } else {
                                ?><li><a href ='javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VProject") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');"> <?php echo $k; ?></a></li><?php
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
                            ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VProject") . "&pg=" . $t . "&tk=0"; ?>', '#display', '1');">&raquo;</a></li><?php
                        }
                        ?>
                </ul>
            </div>
        </div>

    </div>
</div>
<div id="project" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Project</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Create New Project</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="javascript:void(0)" method="post" id="myForm">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Root <small class="text-danger">*</small></label>
                                    <input type="text" name="root" id="root" placeholder="Enter Unquie Title" required="" class="form-control">

                                </div>
                                <div class="col-lg-6">
                                    <label>Controller <small class="text-danger">*</small></label>
                                    <input type="text" name="controller" id="controller" placeholder="Enter Controller" required="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>View <rq>*</rq></label>
                                    <input type="text" name="view" id="view" placeholder="View" required="" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label>Domain <rq>*</rq></label>
                                    <input type="text" name="domain" id="domain" placeholder="Domain" required="" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" id="id" name="id" value="">
                            <input type="hidden" name="action" id="action" value="saveData">
                        </div>
                        <div class="box-footer">
                            <div class="col-lg-3">
                                <button type="submit"  class="btn btn-primary btn-sm form-control"><i class="fa fa-save"></i> Save </button>
                            </div>

                        </div>
                    </form>
                    <div class="form-group">
                        <div class="progress">
                            <div class="progress-bar" id="pro1" style="width: 0%">
                            </div>
                        </div>
                        <center>
                            <div class="col-md-12">
                                <img id="loadimg" src="logo.gif" style="display:none;width: 50px; height: auto;">
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        $("#myForm").submit(function () {
            $("#loadimg").show();
            var formdata = new FormData($("#myForm")[0]);
            $.ajax({url: '/?r=<?= $obj->encdata("C_NewProject"); ?>',
                type: 'post',
                data: formdata,
                enctype: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                xhr: function () {
                    $("#loadimg").show();
                    $("#pro1").show();
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function (e) {
                        var progressbar = Math.round((e.loaded / e.total) * 100);
                        $("#pro1").css('width', progressbar + '%');
                        $("#pro1").html(progressbar + '%');
                    });
                    return xhr;
                },
                success: function (data) {
                    console.log(data);
                    $("#loadimg").hide();
                    var json = JSON.parse(data);
                    if (json.status == 1) {
                        swal("Success", json.msg, "success");
                    } else {
                        swal("Error", json.msg, "error");
                    }
                    $("#pro1").css('width', '0%');
                    $("#pro1").html('0%');
                    $("#pro1").hide();
                },
                error: function (xhr, error, code)
                {
                    console.log(xhr);
                    console.log(code);
                }
            });
        });
    });
    function view(id)
    {
        $.post("/?r=<?= $obj->encdata("C_NewProject"); ?>", {id: id, action: "getData"}, function (data) {
            var json = JSON.parse(data);
            if (json.status == 1) {
               
                $("#id").val(json.data["id"]);
                $("#root").val(json.data["root"]);
                $("#controller").val(json.data["controller"]);
                $("#view").val(json.data["view"]);
                $("#domain").val(json.data["domain"]);
                $("#action").val("updateData");
            } else {
                swal("Error", json.msg, "error");
            }
        });
    }
    function del(id)
    {
        $.post("/?r=<?= $obj->encdata("C_NewProject"); ?>", {id: id, action: "deleteData"}, function (data) {
            var json = JSON.parse(data);
            if (json.status == 1) {
                swal("Success", json.msg, "success");
                
            } else {
                swal("Error", json.msg, "error");
            }
        });
    }
</script>
