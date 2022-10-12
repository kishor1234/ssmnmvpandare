<div id="page_title">
    <div class="container text-center">
        <div class="panel-heading">Event </div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Event Photo</li>
        </ol>
    </div>
</div>
<section id="blog-area" class="blog-with-sidebar-area">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">
                <!-- code here-->
                <div class="blog-post"> 
                    <?php
                    $sql = $main->selectDistinct("events", "title");
                    $r = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    while ($row = $r->fetch_assoc()) {
                        $sql = $main->select("events", $_SESSION["db_1"]) . $main->whereSingle(array("title" => $row["title"])) . $main->limitWithOutOffset(1);
                        $rp = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                        $_row = $rp->fetch_assoc();
                        ?>
                        <div class='col-sm-4 col-xs-4 col-md-4 col-lg-4'>
                            <a class="thumbnail fancybox" href="/?r=<?php echo $obj->encdata("C_OpenLink"); ?>&v=<?php echo $obj->encdata("V_EventGallery"); ?>&t=<?php echo $obj->encdata($row["title"]); ?>">
                                <img class="img-responsive" alt="Image" src="<?php echo $_row["url"]; ?>" />
                                <center><h4><?php echo $_row["title"]; ?></h4></center>
                            </a>

                        </div>

                        <?php
                    }
                    ?>
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

