
<section class="content-header">

    <h1>
        Home
        <small>Edit POST</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit POST</li>
    </ol>
</section>
<?php
$sql = $main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("id" => $_REQUEST["id"]));
$result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
$row = $result->fetch_assoc();
?>
<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div id="display"></div>
            <div class="panel panel-primary">

                <?php $desc = "" . $row["description"]; ?>
                <div class="panel-body">
                    <legend>EDIT POST</legend>
                    <form action="#" method="post"  id="myForm" onsubmit="return postDataCodeMirror('<?php echo $obj->encdata("C_UpdatePostData"); ?>', '#display', '#myForm')" enctype="multipart/form-data">
                        <div class="form-group">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title </label>
                                    <input type="hidden" id="post_id" name="post_id" value="<?php echo $row["id"]; ?>" readonly="">
                                    <input type="text"  name="title" id="title" class="form-control"  value="<?php echo $row["title"]; ?>" autocomplete="off" placeholder="Enter Category (ex. Hollywood) *">
                                </div>
                                <div class="form-group">
                                    <label>Title Tag <span id="require">*</span></label>
                                    <input type="text" value="<?php echo $row["btitle"]; ?>"  name="btitle" id="btitle" class="form-control" required="" value="" autocomplete="off" placeholder="Title Tag *">
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea  class="form-control"  required="" name="meta" id="meta2"> <?php echo $row["meta"]; ?></textarea>
                                    
                                </div>
                                 <div class="form-group">
                                    <label>Keyword</label>
                                    <textarea  class="form-control"  required="" placeholder="Keywords" name="keyword" id="keyword"> <?php echo $row["keyword"]; ?></textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <h3 class="box-title">Data <small>(Description Below ) </small></h3>
                                    <textarea class="codemirror-textarea"  id="txtEditor">
                                        <?php echo $row["description"]; ?>
                                    </textarea>
                                    <input type="hidden" name="txtEditor"  id="desc">
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6 nopadding">
                                        <label>Select File </label>
                                        <input type="file" name="file" id="file" accept="image/*" >
                                    </div>
                                    <div class="col-lg-6 nopadding">
                                        <br>
                                        <input type="hidden" name="path" id="path" value="<?php echo $row["path"]; ?>">
                                        <img src="<?php echo $row["img"]; ?>" alt="Image" style="width: 100px; height: auto;">
                                    </div>

                                </div>
                                <div class="form-group"><div class="col-lg-12"><br></div></div> <div class="form-group"><div class="col-lg-12"><br></div></div>
                                <div class="form-group">
                                    <label>Category </label>
                                    <select id="category" name="category" class="form-control">
                                        <option value="<?php echo $row["category"]; ?>"><?php echo $row["category"]; ?></option>
                                        <?php
                                        $sql = $main->select("category", $_SESSION["db_1"]);

                                        $resutl = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                                        while ($row1 = $resutl->fetch_assoc()) {
                                            echo "<option value='" . $row1["category"] . "'>" . $row1["category"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Branch <span id="require"> * </span></label>
                                    <select id="branch" name="branch" class="form-control">
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $main->getData($main->select("hf_branch", $_SESSION["db_1"]) . $main->whereSingle(array("id" => $row["branch"])), "blocation"); ?></option>

                                        <?php
                                        $sql = $main->select("hf_branch", $_SESSION["db_1"]);

                                        $resutl = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                                        while ($row2 = $resutl->fetch_assoc()) {
                                            echo "<option value='" . $row2["id"] . "'>" . $row2["blocation"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6 nopadding">
                                        <label>Select Banner <span id="require"> </span></label>
                                        <input type="file" name="banner" id="banner" accept="image/*">
                                    </div> 
                                    <div class="col-lg-6 nopadding"><br>
                                        <input type="hidden" name="bannerpath" id="bannerpath" value="<?php echo $row["banner_path"]; ?>">
                                        <img src="<?php echo $row["banner_url"]; ?>" alt="Image" style="width: 100px; height: auto;">
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="form-group" style="margin-top: 10px;"> 
                                    <button type="submit" class="btn btn-primary" ><i class="fa fa-upload fa-1x"></i>  Update Post Data </button>
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
//        var value = $("#old-data").val();
//        edit = CodeMirror.fromTextArea($("#txtEditor")[0], {
//            value: value,
//            lineNumbers: true,
//            mode: "javascript",
//            keyMap: "sublime",
//            autoCloseBrackets: true,
//            matchBrackets: true,
//            showCursorWhenSelecting: true,
//            theme: "monokai",
//            tabSize: 2
//        });
//        edit.getDoc().setValue(value);
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