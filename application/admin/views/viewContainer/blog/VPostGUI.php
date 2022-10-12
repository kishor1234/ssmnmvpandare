
<section class="content-header">

    <h1>
        Home
        <small>POST</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">POST</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div class="display"></div>
            <div class="box box-primary">
                <div class="box-title">
                    <h3 class="box-header">NEW POST</h3>
                </div>
                <div class="box-body">

                    <form action="#" method="post" id="myForm" onsubmit="return postDataCodeMirror('<?php echo $obj->encdata("C_PostData"); ?>', '#display', '#myForm')" enctype="multipart/form-data">
                        <div class="form-group">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title <span id="require">*</span></label>
                                    <input type="text"  name="title" id="title" class="form-control" required="" value="" autocomplete="off" placeholder="Title*">
                                </div>
                                <div class="form-group">
                                    <label>Title Tag <span id="require">*</span></label>
                                    <input type="text"  name="btitle" id="btitle" class="form-control" required="" value="" autocomplete="off" placeholder="Title Tag *">
                                </div>
                              <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea  class="form-control" placeholder="Meta description" required=""  name="meta" id="meta2"> </textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Keyword</label>
                                    <textarea  class="form-control"  required="" placeholder="Keywords" name="keyword" id="keyword"> </textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="box-header">
                                        <h3 class="box-title">Data <small>(Description Below ) <span id="require"> * </span></small></h3>
                                        <!-- tools box -->
                                    </div><!-- /.box-header -->
                                    <div class="col-lg-12 nopadding">
                                        <textarea class="codemirror-textarea"  id="txtEditor">

                                        </textarea>  
                                        <input type="hidden" name="txtEditor"  id="desc">
                                    </div>
                                    <br>
                                </div>
                                <div class="form-group"><div class="col-lg-12"></div></div>

                                <div class="form-group">
                                    <label>Select File <span id="require"> </span></label>
                                    <input type="file" name="file" id="file" accept="image/*">
                                </div>

                                <div class="form-group">
                                    <label>Category <span id="require"> * </span></label>
                                    <select id="category" name="category" class="form-control" required="">
                                        <option value="">Select</option>
                                        <?php
                                        $sql = $main->select("category", $_SESSION["db_1"]);

                                        $resutl = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                                        while ($row = $resutl->fetch_assoc()) {
                                            echo "<option value='" . $row["category"] . "'>" . $row["category"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Branch <span id="require">  </span></label>
                                    <select id="branch" name="branch" class="form-control">
                                        <option value="">Select</option>
                                        <?php
                                        $sql = $main->select("hf_branch", $_SESSION["db_1"]);

                                        $resutl = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                                        while ($row = $resutl->fetch_assoc()) {
                                            echo "<option value='" . $row["id"] . "'>" . $row["blocation"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select Banner <span id="require">  </span></label>
                                    <input type="file" name="banner" id="banner" accept="image/*">
                                </div>
                                <div class="form-group" style="margin-top: 10px;"> 
                                    <button type="submit" class="btn btn-primary" ><i class="fa fa-upload fa-1x"></i>  Post Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
<script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script>
                        var edit;
                        $("document").ready(function () {
//
//        edit = CodeMirror.fromTextArea($("#txtEditor")[0], {
//            value: "",
//            lineNumbers: true,
//            mode: "javascript",
//            keyMap: "sublime",
//            autoCloseBrackets: true,
//            matchBrackets: true,
//            showCursorWhenSelecting: true,
//            theme: "monokai",
//            tabSize: 2
//        });
                            //CKEDITOR.replace('meta1');

                            CKEDITOR.replace('txtEditor', {
                                fullPage: true,
                                allowedContent: true
                            });
                            setInterval(updateDiv, 100);
                            function updateDiv() {
                                var editorText = CKEDITOR.instances['txtEditor'].getData();
                                $('#desc').val(editorText);
                            }
                            /*setInterval(updateDesc, 100);
                            function updateDesc() {
                                var editorText = CKEDITOR.instances.meta1.getData();
                                $('#meta2').val(editorText);
                            }*/
                        });


</script>