<script src="/assets/plugins/form/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/plugins/form/additional-methods.min.js" type="text/javascript"></script>
<script src="/assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

<section class="content-header">

    <h1>
        Home
        <small>Change Password</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div id="display"></div>
        <div class="col-md-6 col-md-offset-3 ">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <p>Change Password</p>

                </div>
                <div class="panel-body">
                    <form action="javascript:void(0)" method="post" id="change-pwd"  enctype="multipart/form-data">
                        <div class="form-group">
                            <legend>Change User Panel Password</legend>
                            <div class="col-md-12">
                                <div class="form-group">

                                    <input type="password"  name="old" id="old" class="form-control" required="" value="" autocomplete="off" placeholder="Old Password *">
                                </div>
                                <div class="form-group">

                                    <input type="password"  name="pwd" id="pwd" class="form-control" required=""  autocomplete="off" placeholder="New Password *">

                                    <input type="hidden" name="id" id="byw" value="<?php echo $_SESSION["uid"]; ?>" >
                                    <input type="hidden" name="action"  value="changepassword" >
                                </div>
                                <div class="form-group">

                                    <input type="password"  name="apwd"   id="apwd" class="form-control" required=""  autocomplete="off" placeholder="Confirm New Password *">
                                </div>
                                <div class="form-group" style="margin-top: 10px;"> 
                                    <input type="submit" id="change-btn" class="btn btn-primary" value="Change Password">
                                </div>
                            </div>



                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</section>
<script>
    $(document).ready(function () {
        $('#change-pwd').validate({// initialize the plugin
            rules: {

                old: {
                    required: true
                },
                pwd: {
                    required: true,
                    minlength: 5,
                },
                apwd: {

                    required: true,
                    minlength: 5,
                    equalTo: "#pwd"
                }
            },
            submitHandler: function (form) { // for demo
                $("#change-btn").val("Please wait ...");
                var formdata = new FormData($(form)[0]);
                swal({
                    title: "Are you sure?",
                    text: "Once submit, your acount logout, you need to login with new password.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    type: 'POST',
                                    url: '/userData',
                                    data: formdata,
                                    contentType: false,
                                    processData: false,
                                    xhr: function () {
                                        //progressShow();
                                        var xhr = new XMLHttpRequest();
                                        xhr.upload.addEventListener('progress', function (e) {
                                            var progressbar = Math.round((e.loaded / e.total) * 100);
                                            //$("#inner-progress").css('width', progressbar + '%');
                                            $("#change-btn").html("Please Wait... " + progressbar + '%');
                                        });
                                        return xhr;
                                    },
                                    success: function (objString) {
                                        console.log(objString);
                                        var obj = JSON.parse(objString);
                                        if (obj.status === 1)
                                        {
                                            $("#date_time_" + obj.id).val(obj.schedule);
                                            swal(obj.message, {
                                                icon: "success",
                                            });
                                            setTimeout(function () {
                                                window.location.reload();
                                            }, 2000);
                                        } else {
                                            swal(obj.message, {
                                                icon: "danger",
                                            });
                                        }
                                        $("#change-btn").html("Change Password");
                                    },
                                    error: function (request, status, error) {
                                        printMessage("Please try agin after sometime", "danger", ".msg");
                                        $("#change-btn").val("Change Password");
                                        //   gcaptch();
                                    }
                                });
                            } else {
                                swal("Cancel to Change password process");
                            }
                        });
                return false; // for demo
            }
        });
    });
</script>