
<section class="content-header">

    <h1>
        Photo's
        <small>View Gallery</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Photo</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12 ">
            <div id="display"></div>
            <div>
                
                <div class="panel-body" id="displayAjax">
                  <div class="form-group">
                      
                        <div class="col-lg-12">
                            <div class="form-group">
                                
                        <?php
                        $limit = 24;
                        $sql = $main->selectCount("photo_gallery", "id");
                        $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                        $row = $result->fetch_assoc();
                        $max_count = $row["count(id)"];
                        // die($max_count);
                        $page = 1;
                        $offset = 0;
                        if (empty($_REQUEST["p"])) {
                            $limit = $limit * $page;
                            $offset = 0;
                        } else {
                            $page = $_REQUEST["p"];
                            $tempLimit = $limit;
                            $tempLimit = $limit * $page;
                            $offset = $tempLimit - $limit;
                        }
                        $sql = $main->select("photo_gallery", $_SESSION["db_1"]) . $main->limitWithOffset($offset, $limit);
                        $r = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                        
                        while ($row = $r->fetch_assoc()) {
                            ?>
                                <div class="prettyphoto col-md-3 col-sm-3 col-xs-6 " style="padding:10px;" id="img<?php echo $row["id"];?>" rel="prettyPhoto[gallery]" title="" href="javascript:void(0)">
                                    <a href="javascript:void(0)" id="aimg" onclick="deletePhoto('<?php echo $obj->encdata("C_DeleteGalleryPhoto");?>','<?php echo $row["id"];?>','<?php echo $row["file_path"];?>')" title="Delete This Image" class="btn btn-danger btn-xs">&times; Delete Below Image..<i class="fa fa-arrow-down"></i></a>
                                    <img class="img-responsive img-thumbnail lazy" src="logo.gif" data-src="<?php echo $row["file_url"]; ?>" alt="" style="height: 100px;" />
                                    
                                </div>
                                
                            <?php
                        }
                        ?>
                         
                            </div>
                        </div>  
                    </div>
                    <div class="form-group"> 
                        <div class="col-lg-12">
                            <div class="form-group">
                        <center>
                            <ul class="pagination pagination-sm">

                                <?php
                                if ($page == 1) {
                                    $t = $page - 1;
                                    echo "<li class='disabled'><a href='/?r=" . $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VViewPhotoGallery") . "&p=" . $t . "'>&laquo;</a></li>";
                                } else {
                                    $t = $page - 1;
                                    echo "<li><a href='/?r=" . $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VViewPhotoGallery") . "&p=" . $t . "'>&laquo;</a></li>";
                                }
                                $i = 0;
                                $k = 1;
                                $fl = 0;
                                while ($i < $max_count) {
                                    if ($k == $page) {
                                        echo "<li class='disabled'><a href='/?r=" . $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VViewPhotoGallery") . "&p=" . $k . "'>" . $k . "</a></li>";

                                        $fl = $k;
                                    } else {
                                        echo "<li><a href='/?r=" . $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VViewPhotoGallery") . "&p=" . $k . "'>" . $k . "</a></li>";
                                    }
                                    $k++;
                                    $i = $i + $limit;
                                }
                                $k--;
                                if ($fl == $k) {
                                    $t = $page + 1;
                                    echo "<li class='disabled'><a href='/?r=" . $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VViewPhotoGallery") . "&p=" . $t . "'>&raquo;</a></li>";
                                } else {
                                    $t = $page + 1;
                                    echo "<li><a href='/?r=" . $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VViewPhotoGallery") . "&p=" . $t . "'>&raquo;</a></li>";
                                }
                                ?>

                            </ul>
                        </center>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
