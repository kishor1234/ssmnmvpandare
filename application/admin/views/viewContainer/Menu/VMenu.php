
<section class="content-header">
    <h1>
        Menu
        <small>All Menu</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Menu</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="form-group">
            <div class="col-lg-12">
                <div id="display" style="overflow: auto;">
                    <?php //$main->isLoadView("VMenuTable", false, array()); ?>
                </div>

            </div>
        </div>

    </div>
</section><!-- /.content -->

<!-- Modal -->
<div id="newMenu" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Menu</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Create New Menu</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>

                        </div>
                    </div>

                    <form action="javascript:void(0)" method="post" id="myMenu">
                        <div class="box-body">

                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Domain <small class="text-danger">*</small></label>
                                    <select class="form-control" id="domain" name="domain" required >
                                        <?php
                                        $sql = $main->adminDB[$_SESSION["db_1"]]->query($main->select("project", $_SESSION["db_1"]));
                                        while ($row = $sql->fetch_assoc()) {
                                            echo "<option value='{$row["domain"]}'>{$row["domain"]}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Parent Menu <small class="text-danger">*</small></label>
                                    <select class="form-control" id="parent" name="parent" placeholder="Select Parent Menu">
                                        <option value="0">select</option>
                                        <?php
                                        $sql = $main->adminDB[$_SESSION["db_1"]]->query($main->select("menu", $_SESSION["db_1"]) . $main->whereSingle(array("parent" => 0)));
                                        while ($row = $sql->fetch_assoc()) {
                                            echo "<option value='{$row["id"]}'>{$row["title"]}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Post <small class="text-danger">*</small></label>
                                    <select class="form-control" id="postid" name="postid" required >
                                        <?php
                                        $sql = $main->adminDB[$_SESSION["db_1"]]->query($main->select("post", $_SESSION["db_1"]));
                                        while ($row = $sql->fetch_assoc()) {
                                            echo "<option value='{$row["id"]}'>{$row["title"]}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Url <small class="text-danger">*</small></label>
                                    <input type="text" name="title" id="title" placeholder="Enter Unquie Title" required="" class="form-control">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label>Meta Description <rq>*</rq></label>
                                    <textarea name="meta" id="meta" placeholder="Meta Description" class="form-control" required="" style="height: 100px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <a href="#" class="btn btn-warning btn-xs" onclick="return getFileList()"><i class="fa fa-database"></i> Php File List </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Controller Class <small class="text-danger">*</small></label>
                                    <select class="form-control" id="controller" name="controller" required >

                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>View <small class="text-danger">*</small></label>
                                    <select class="form-control" id="view" name="view" required >

                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Menu Title <small class="text-danger">*</small></label>
                                    <input type="text" name="mtitle" id="mtitle" required="" placeholder="Menu Title for Display" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label>Position <small class="text-danger">*</small></label>
                                    <input type="text" onkeypress="return isNumber(event);" name="position" id="position" value="0" required="" placeholder="Menu Position" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" id="id" name="id" value="">
                            <input type="hidden" id="action" name="action" value="saveData">
                        </div>
                        <div class="box-footer">
                            <div class="col-lg-3">
                                <button type="submit"  class="btn btn-primary btn-sm form-control"><i class="fa fa-save"></i> Save</button>

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
    function getFileList() {
        $.post("/?r=<?= $obj->encdata("C_ListofFile") ?>", {domain: $("#domain").val(), cont: "controller"}, function (data) {

            $("#controller").html(data);
            $("#controller").attr("disabled", false);
        });
        $.post("/?r=<?= $obj->encdata("C_ListofFile") ?>", {domain: $("#domain").val(), cont: "view"}, function (data) {

            $("#view").html(data);
            $("#view").attr("disabled", false);
        });
        return false;
    }
    $(document).ready(function () {
        loadTable();
        $("#myMenu").submit(function () {
            $("#loadimg").show();
            var formdata = new FormData($("#myMenu")[0]);
            $.ajax({url: '/?r=<?= $obj->encdata("C_CreateNewMenu"); ?>',
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
                    getFileList();
                },
                error: function (xhr, error, code)
                {
                    console.log(xhr);
                    console.log(error);
                    console.log(code);
                }
            });
        });

    });
    function loadTable(pg)
    {
        $("#display").html("<center><img style='width:100px; height:auto;' src='https://media0.giphy.com/media/y1ZBcOGOOtlpC/giphy.gif'></center>");
        getFileList();
        $.post("/?r=<?= $obj->encdata("C_CreateNewMenu"); ?>", {action: "loadTable", pg: pg}, function (data) {
            $("#display").html(data);
        });
    }
    function publish(id)
    {
        swal({
            title: "Are you sure?",
            text: "This post become live after click yes",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes",
            closeOnConfirm: false
        },
        function () {

            $("#display").html("<center><img style='width:100px; height:auto;' src='https://media0.giphy.com/media/y1ZBcOGOOtlpC/giphy.gif'></center>");
            $.post("/?r=<?= $obj->encdata("C_CreateNewMenu"); ?>", {action: "publish", id: id}, function (data) {
                loadTable(1);
                console.log(data);
                var json = JSON.parse(data);

                swal(json.method, json.msg, json.dis);
            });

        });
        return false;
    }
    function unpublish(id)
    {
        swal({
            title: "Are you sure?",
            text: "This post become disable and not display on web site after click yes",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes",
            closeOnConfirm: false
        },
        function () {

            $("#display").html("<center><img style='width:100px; height:auto;' src='https://media0.giphy.com/media/y1ZBcOGOOtlpC/giphy.gif'></center>");
            $.post("/?r=<?= $obj->encdata("C_CreateNewMenu"); ?>", {action: "unpublish", id: id}, function (data) {
                loadTable(1);
                var json = JSON.parse(data);
                swal(json.method, json.msg, json.dis);
            });

        });
        return false;
    }
    function deleteMenu(id)
    {
        swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this imaginary post!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function () {
            $("#display").html("<center><img style='width:100px; height:auto;' src='https://media0.giphy.com/media/y1ZBcOGOOtlpC/giphy.gif'></center>");
            $.post("/?r=<?= $obj->encdata("C_CreateNewMenu"); ?>", {action: "deleteMenu", id: id}, function (data) {
                loadTable(1);
                var json = JSON.parse(data);
                swal(json.method, json.msg, json.dis);
            });
        });
        return false;
    }
    function view(id)
    {
        //$("#display").html("<center><img style='width:100px; height:auto;' src='https://media0.giphy.com/media/y1ZBcOGOOtlpC/giphy.gif'></center>");
        getFileList();
        $.post("/?r=<?= $obj->encdata("C_CreateNewMenu"); ?>", {action: "viewData", id: id}, function (data) {
            console.log(data);
            var json = JSON.parse(data);
            $("#domain option[value=" + json.data["postid"] + "]").attr('selected', 'selected');
            $("#parent option[value=" + json.data["parent"] + "]").attr('selected', 'selected');
            $("#title").val(json.data["title"]);
            $("#meta").val(json.data["meta"]);
            $("#postid option[value=" + json.data["postid"] + "]").attr('selected', 'selected');
            $("#controller option[value=" + json.data["controller"] + "]").attr('selected', 'selected');
            $("#view option[value=" + json.data["view"] + "]").attr('selected', 'selected');
            $("#mtitle").val(json.data["mtitle"]);
            $("#action").val("updateData");
            $("#id").val(json.data["id"]);
            $("#position").val(json.data["position"]);
        });
        return false;
    }

</script>