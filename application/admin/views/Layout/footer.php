

</div><!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Powered by <a href='http://aasksoft.co.in/' target="blank">@askSoft</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#"><?php echo $_SESSION["collegename"]; ?></a>.</strong> All rights reserved.
    <div class="form-group">


    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">

    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->

<!-- Bootstrap 3.3.5 -->
<script src="assets/ap/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/ap/aasksoft editor/jquery.lazy.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="assets/ap/dist/js/app.min.js"></script>
<script src="assets/ap/dropzone.js" type="text/javascript"></script>
<script src="assets/ap/aasksoft editor/editor.js" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

<script>

    $(document).ready(function () {
        $("#txtEditors").Editor();

    });
    setInterval(function () {
        $('.lazy').lazy();
    }, 1000);
    /* $(function() {
     
     });*/
</script>
<script>
    function onLoading()
    {
        $("#cover").show();
        $("#msg").html("<center><img src='logo.gif' style='width:100px;' /><h4 style='color:#000;'><strong>Please Wait.!</strong></h4></center>");
    }
    function offLoading()
    {
        $("#msg").html("");
        $("#cover").hide();
    }
    function sendAjax(file, display)
    {
        onLoading();
        //$(display).html(file);
        $.post("/?r=" + file, {}, function (data) {
            $(display).html(data);
        });
        offLoading();
    }
    function sendConfirmBooking(file, display)
    {
        onLoading();
        //$(display).html(file);
        $.post("/?r=" + file, {}, function (data) {
            $(display).html(data);
            location.reload();
        });
        offLoading();
    }
    $(function () {
// Multiple images preview in browser
        var imagesPreview = function (input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);

                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function () {
            imagesPreview(this, 'div.gallery');
        });
    });
    function uploadEvent(file, display, form)
    {
        var form_data = new FormData($(form)[0]);
        onLoading();
        $.ajax({
            type: "POST",
            url: '/?r=' + file,
            data: form_data, //$("#studetnReg").serialize(), // serializes the form's elements.,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data)
            {
                offLoading();
                printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
                $(display).html(data);
                $(form)[0].reset();
                $(".gallery").html("");
            }});


        return false;
    }
    function printMessage(file, display)
    {
        $.post("/?r=" + file, {}, function (data) {
            $(display).html(data);
        });
    }
    function openAjaxURL(file, display)
    {
        onLoading();
        $.post("/?r=" + file, {id: 1}, function (data) {
            offLoading();
            $(display).html(data);
            $("#msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");

            if (typeof (history.pushState) != "undefined") {
                var obj = {Title: "Title", Url: "<?php echo HOSTURL; ?>" + "?r=" + file + "1"};
                history.pushState(obj, obj.Title, obj.Url);
                //$.session.set("historyurl", "<?php //echo HOSTURL;                                                 ?>" + "?r=" + file + "1");
            } else {
                alert("Browser does not support HTML5.");
            }
            // history.pushState(obj, obj.Title, obj.Url);
        });
        return false;
    }
    function openAjaxButton(file, display, modal)
    {

        onLoading();
        $.post("/?r=" + file, {id: 1}, function (data) {
            offLoading();
            dissmiss(modal);
            $(display).html(data);
            $("#msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");

            if (typeof (history.pushState) != "undefined") {
                var obj = {Title: "Title", Url: "<?php echo HOSTURL; ?>" + "?r=" + file + "1"};
                history.pushState(obj, obj.Title, obj.Url);
                location.reload();
            } else {
                alert("Browser does not support HTML5.");
            }
            // history.pushState(obj, obj.Title, obj.Url);
        });
        return false;
    }
    function openAjaxRld(file, display, modal, id)
    {

        onLoading();

        $.post("/?r=" + file, {loanaccountno: id}, function (data) {
            offLoading();
            dissmiss(modal);
            $(display).html(data);
            $("#msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");

            if (typeof (history.pushState) != "undefined") {
                var obj = {Title: "Title", Url: "<?php echo HOSTURL; ?>" + "?r=" + file + "1"};
                history.pushState(obj, obj.Title, obj.Url);
                location.reload();
            } else {
                alert("Browser does not support HTML5.");
            }
            // history.pushState(obj, obj.Title, obj.Url);
        });
        return false;
    }
    function openAjaxButton2(file, display, odata, modal)
    {

        onLoading();
        $.post("/?r=" + file, {id: 1}, function (data) {
            offLoading();
            dissmiss(modal);
            $(display).html(data);
            $("#msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");

            if (typeof (history.pushState) != "undefined") {
                var obj = {Title: "Title", Url: "<?php echo HOSTURL; ?>" + "?r=" + file + "1"};
                history.pushState(obj, obj.Title, obj.Url);
                location.reload();
            } else {
                alert("Browser does not support HTML5.");
            }
            // history.pushState(obj, obj.Title, obj.Url);
        });
        return false;
    }
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;

        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            //alert("Only Number Accept");
            return false;
        }
        return true;
    }
    function onlyAlphabets(e, t) {
        try {
            if (window.event) {
                var charCode = window.event.keyCode;
            } else if (e) {
                var charCode = e.which;
            } else {
                return true;
            }
            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                return true;
            else
                return false;
        } catch (err) {
            alert(err.Description);
        }
    }
    function onlyAlphabetswithspace(e, t) {
        try {
            if (window.event) {
                var charCode = window.event.keyCode;
            } else if (e) {
                var charCode = e.which;
            } else {
                return true;
            }
            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 32)
                return true;
            else
                return false;
        } catch (err) {
            alert(err.Description);
        }
    }
    function postDataWithValidationform(file, display, form, validation, file2)
    {
        //alert(file);
        if (addValidation(validation))
        {
            var data = new FormData($(form)[0]);
            onLoading();
            $.ajax({
                type: "POST",
                url: '/?r=' + file,
                data: data, //$("#studetnReg").serialize(), // serializes the form's elements.,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (data)
                {

                    offLoading();
                    openAjaxURL(file2, '#main');
                    $("#msg").show();
                    printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
                    $(display).html(data);
                    $(form)[0].reset();

                }});


        } else {
            alert("Invalid Value insert");
        }
        return false;
    }

    function addValidation(choise)
    {
        switch (choise)
        {
            case 'addBranchValidation':
                if (addBranchValidation())
                    return true;
                else
                    return false;
                // break;
            default:
                return false;
                // break;
        }
        //return false;
    }

    function addBranchValidation()
    {
        return true;
    }
    function SearchByNameBySelect(id, list, file, display)
    {
        var val = $(id).val();

        var opts = $(list).children();//.childNodes;
        for (var i = 0; i < opts.length; i++) {
            if (opts[i].value === val) {
                var s = opts[i].value.split("|");
                $(id).val(s[0]);
                onLoading();
                $.post("/?r=" + file, {empid: s[1]}, function (data) {
                    offLoading();
                    $(display).html(data);
                });
                break;
            }
        }

        return false;
    }
    function postDataWithRedirect(file, form, display, reurl)
    {
        var data = new FormData($(form)[0]);
        onLoading();
        $.ajax({
            type: "POST",
            url: '/?r=' + file,
            data: data, //$("#studetnReg").serialize(), // serializes the form's elements.,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data)
            {
                offLoading();
                window.location.href = reurl;
                //$("#msg").show();
                //printMessage('<php //echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
                //$(display).html(data);
                //$(form)[0].reset();

            }});

        // $(form).hide();
        return false;
    }
    function postData(file, display, form)
    {
        var data = new FormData($(form)[0]);
        onLoading();
        $.ajax({
            type: "POST",
            url: '/?r=' + file,
            data: data, //$("#studetnReg").serialize(), // serializes the form's elements.,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data)
            {
                offLoading();
                $("#msg").show();
                printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
                $(display).html(data);
                $(form)[0].reset();

            }});

        $(form).hide();
        return false;
    }
    function postDataCodeMirror(file, display, form)
    {
        var data = new FormData($(form)[0]);


        onLoading();
        $.ajax({
            type: "POST",
            url: '/?r=' + file,
            data: data, //$("#studetnReg").serialize(), // serializes the form's elements.,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data)
            {
                offLoading();
                console.log(data);
                $("#msg").show();
                printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
                $(display).html(data);
                $(form)[0].reset();

            }});

        $(form).hide();
        return false;
    }
    function postURL(file, display, id)
    {
        onLoading();
        $.post("/?r=" + file, {id: id}, function (data) {
            offLoading();
            $(display).html(data);
            $("#msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
        });
        return false;
    }
    function deletepostURL(file, display, id)
    {
        onLoading();
        if (confirm("Are you sure want to delete?"))
        {
            $.post("/?r=" + file, {id: id}, function (data) {
                offLoading();
                $(display).html(data);
                $("#msg").show();
                printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
            });
        } else {
            offLoading();
        }
        return false;
    }
    function deleteLogo(file, display, id)
    {
        if (confirm("Are you sure want to delete?"))
        {
            console.log("logo");
            onLoading();
            $.post("/?r=" + file, {id: id}, function (data) {
                offLoading();
                $(display).html(data);
                $("#msg").show();
                printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
                $("#trsk" + id).hide();
                location.reload();
            });
        } else {
            console.log("logoddd");
        }

        return false;
    }
    function getEvent(file, display)
    {
        onLoading();
        $.post("/?r=" + file, {title: $("#eventName").val()}, function (data) {
            offLoading();
            $(display).html(data);
            $("#msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
        });
        return false;
    }
    function postURL2(file, display, id)
    {
        onLoading();
        $.post("/?r=" + file, {id: id}, function (data) {
            offLoading();
            $(display).html(data);

        });
        return false;
    }
    function postURL3(file, display, id)
    {
        var limit = $("#limit").val();

        onLoading();
        $.post("/?r=" + file, {id: id, limit: limit}, function (data) {
            offLoading();

            $(display).html(data);
            return false;
        });

    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#select-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function onInput(id, list, display, file) {
        var val = $(id).val();
        var opts = $(list).children();//.childNodes;
        for (var i = 0; i < opts.length; i++) {
            if (opts[i].value === val) {
                onLoading();
                $.post("/?r=" + file, {master: opts[i].value}, function (data) {
                    offLoading();
                    $(display).html(data);
                });
                break;
            }
        }
    }
    function deletePhoto(file, id, path)
    {
        if (confirm("Are you sure want to delete?"))
        {
            console.log("Deleted");
            onLoading();
            $.post('/?r=' + file, {id: id, path: path}, function (data) {
                onLoading();
                $("#img" + id).hide();
                $("#msg").show();
                printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
            });
        } else {
            console.log("Not deleted");
        }

    }
    function SliderAdd()
    {
        $("#Slider-perview").html($("#data").val());
    }
    $(document).ready(function () {
        $(".Editor-editor").keyup(function (e) {
            var data = $(".Editor-editor").html();
            $("#txtEditor").html(data);
        });
        //setInterval(function(){$("#msg").hide(); }, 10000);
    });


</script>
</body>
</html>
