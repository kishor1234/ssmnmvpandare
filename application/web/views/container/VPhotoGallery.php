
<div id="page_title">
    <div class="container text-center">
        <div class="panel-heading">Photo Gallery</div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Photo</li>
        </ol>
    </div>
</div>
<section id="blog-area" class="blog-with-sidebar-area" >
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12" >
                <!-- code here-->
                <div class="blog-post"> 
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
                                $sql = $main->select("photo_gallery", $_SESSION["db_1"]) . $main->orderBy("DESC", "id") . $main->limitWithOffset($offset, $limit);
                                $r = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                                while ($row = $r->fetch_assoc()) {
                                    ?>
                                    <a class="col-md-3 col-sm-3 col-xs-6" rel="prettyPhoto[gallery]" title="" href="<?php echo $row["file_url"]; ?>"><img class="img-responsive img-thumbnail" src="<?php echo $row["file_url"]; ?>" alt="Image" style="height: 200px; width:200px;" /></a>
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
                                            echo "<li class='disabled'><a href='/?r=" . $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VPhotoGallery") . "&p=" . $t . "'>&laquo;</a></li>";
                                        } else {
                                            $t = $page - 1;
                                            echo "<li><a href='/?r=" . $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VPhotoGallery") . "&p=" . $t . "'>&laquo;</a></li>";
                                        }
                                        $i = 0;
                                        $k = 1;
                                        $fl = 0;
                                        while ($i < $max_count) {
                                            if ($k == $page) {
                                                echo "<li class='disabled'><a href='/?r=" . $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VPhotoGallery") . "&p=" . $k . "'>" . $k . "</a></li>";

                                                $fl = $k;
                                            } else {
                                                echo "<li><a href='/?r=" . $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VPhotoGallery") . "&p=" . $k . "'>" . $k . "</a></li>";
                                            }
                                            $k++;
                                            $i = $i + $limit;
                                        }
                                        $k--;
                                        if ($fl == $k) {
                                            $t = $page + 1;
                                            echo "<li class='disabled'><a href='/?r=" . $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VPhotoGallery") . "&p=" . $t . "'>&raquo;</a></li>";
                                        } else {
                                            $t = $page + 1;
                                            echo "<li><a href='/?r=" . $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VPhotoGallery") . "&p=" . $t . "'>&raquo;</a></li>";
                                        }
                                        ?>

                                    </ul>
                                </center>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!--Start sidebar Wrapper-->
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="sidebar-wrapper">
                    
                    <div class="single-sidebar">
                      <?php $main->isLoadView("sidebar", false, array()); ?>
                    </div>

                </div>
            </div>
            <!--End Sidebar Wrapper--> 
        </div>
    </div>
</section>

