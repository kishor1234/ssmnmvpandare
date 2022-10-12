<script src="assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
<!--<link href="assets/DataTables/datatables.css" rel="stylesheet" type="text/css"/>-->
<link href="assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="assets/DataTables/fixedHeader.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/DataTables/responsive.dataTables.min.css" rel="stylesheet" type="text/css"/>
<script src="assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="assets/DataTables/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="assets/DataTables/dataTables.responsive.min.js" type="text/javascript"></script>
<section class="content-header">
    <h1>
        Company
        <small>Users</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Your Page Content Here -->
    <div id="display">

    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">All Users</h3>
            <div class="box-tools pull-right">
                <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myMain"><i class="fa fa-plus"></i> Add New</button>-->
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

            </div>
        </div>
        <div class="box-body">

            <table id="myTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</section><!-- /.content -->
<div class="modal fade preview-modal" data-backdrop="" id="myMain" role="dialog" aria-labelledby="preview-modal" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New User </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#" method="post" id="myMainForm">
                            <div class="form-group">
                                <label class="form-control-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="fname" id="fname" placeholder="Enter user name." title="Enter user name" required autocomplete="off" class="form-control">
                                <span id="error_fname" class=""></span>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Gender <span class="text-danger">*</span></label>
                                <select name="gender" id="gender" placeholder="Select Gender" title="Gender" required autocomplete="off" class="form-control">
                                    <option value="">-- Select --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <span id="error_gender" class=""></span>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email" placeholder="Enter email id" title="Enter email id" required autocomplete="off" class="form-control">
                                <span id="error_email" class=""></span>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Mobile No. <span class="text-danger">*</span></label>
                                <input type="text" name="contact" id="contact" maxlength="10" onkeypress="return isNumber(event);" placeholder="Enter Mobile No." title="Enter Mobile No." required autocomplete="off" class="form-control">
                                <span id="error_contact" class=""></span>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Join Date <span class="text-danger">*</span></label>
                                <input type="date" name="joining" id="joining"  title="Joining Date" required autocomplete="off" class="form-control">
                                <span id="error_joining" class=""></span>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="action" id="action" value="addUser">
                                <input type="hidden" name="id" id="id" value="0">
                                <button class="btn btn-primary btn-sm form-control" id="myMainSubmit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

                <br>
                <div class="progress" id="progress">
                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" id="inner-progress mainpro1">Please wait....</div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<script>
    var table;
    $(document).ready(function () {

        table = $('#myTable').DataTable({
            serverSide: true,
            Processing: true,
            dom: 'Bfrtip',
            order: [[0, "desc"]],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],

            ajax: {
                url: '/?r=adduser',
                type: "post", // method  , by default get
                dataType: "json",
                data: {action: "loadTable"},
                error: function () {  // error handling
                    $(".data-grid-error").html("");
                    $("#data-grid").append('<tbody class="data-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#data-grid_processing").css("display", "none");
                }
            },
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: true
                }],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            language: {
                info: "_START_-_END_ of _TOTAL_ entries",
                searchPlaceholder: "Search"
            }
        });
        $("#myMainForm").submit(function () {
            $("#myMainSubmit").attr("disabled", true);
            var formdata = new FormData($("#myMainForm")[0]);
            $.ajax({
                url: '/?r=addemployee',
                type: 'post',
                data: formdata,
                enctype: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                xhr: function () {
                    $("#mainloadimg").show();
                    $("#progress").show();
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function (e) {
                        var progressbar = Math.round((e.loaded / e.total) * 100);
                        $("#mainpro1").css('width', progressbar + '%');
                        $("#mainpro1").html(progressbar + '%');
                    });
                    return xhr;
                },
                success: function (data) {
                    console.log(data);
                    $("#myMainSubmit").attr("disabled", false);
                    $("#mainloadimg").hide();
                    var json = JSON.parse(data);
                    if (json.status === 1) {
                        swal("Success", json.msg, "success");
                    } else {
                        swal("Error", json.msg, "error");
                    }
                    $('#myMainForm')[0].reset();
                    $.toaster({priority: json.toast[0], title: json.toast[1], message: json.toast[2]});
                    $("#mainpro1").css('width', '0%');
                    $("#mainpro1").html('0%');
                    $("#progress").hide();
                    table.ajax.reload(null, false);
                },
                error: function (xhr, error, code)
                {
                    console.log(xhr);
                    console.log(code);
                }
            });
            return false;
        });
        $("#myPointForm").submit(function () {
            $("#myPointSubmit").attr("disabled", true);
            var formdata = new FormData($("#myPointForm")[0]);
            $.ajax({
                url: '<?= api_url ?>/?r=CAddUser',
                type: 'post',
                data: formdata,
                enctype: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                xhr: function () {
                    $("#pointloadimg").show();
                    $("#progressPoint").show();
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function (e) {
                        var progressbar = Math.round((e.loaded / e.total) * 100);
                        $("#pointpro1").css('width', progressbar + '%');
                        $("#pointpro1").html(progressbar + '%');
                    });
                    return xhr;
                },
                success: function (data) {
                    console.log(data);
                    $("#myPointSubmit").attr("disabled", false);
                    $("#pointloadimg").hide();
                    var json = JSON.parse(data);
                    if (json.status === 1) {
                        swal("Success", json.msg, "success");
                    } else {
                        swal("Error", json.msg, "error");
                    }
                    $('#myPointForm')[0].reset();
                    $.toaster({priority: json.toast[0], title: json.toast[1], message: json.toast[2]});
                    $("#pointpro1").css('width', '0%');
                    $("#pointpro1").html('0%');
                    $("#progressPoint").hide();
                    table.ajax.reload(null, false);
                },
                error: function (xhr, error, code)
                {
                    console.log(xhr);
                    console.log(code);
                }
            });
            return false;
        });
    });
    function deleteFullAccount(id, st)
    {
        swal({
            title: "Are you sure?",
            text: "want to delete Employee?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, Delete it!",
            closeOnConfirm: true
        },
        function () {
            $.post('<?= api_url ?>/?r=addemployee', {id: id, action: 'delete'}, function (data) {
                console.log(data);
                table.ajax.reload(null, false);
                var json = JSON.parse(data);
                $.toaster({priority: json.toast[0], title: json.toast[1], message: json.toast[2]});
                table.ajax.reload(null, false);
            });

        });
    }
    function editAccount(id, fname, mobile, email, joining, gender)
    {
        $("#myMain").modal("show");
        $("#fname").val(fname);
        $("#contact").val(mobile);
        $("#email").val(email);
        $("#joining").val(joining);
        $("#gender").val(gender);
        $("#id").val(id);
        $("#action").val("update");
    }
</script>