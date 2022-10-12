<?php
$uri = $_SERVER['REQUEST_URI'];
//echo $uri; // Outputs: URI

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url2 = urlencode($url); // Outputs: Full URL
?>
<?php
$sql = $main->updateINC(array("view" => "view + 1"), "postcvc") . $main->whereSingle(array("post_id" => $_SESSION["mData"]["postid"]));

$main->adminDB[$_SESSION["db_1"]]->query($sql);
$sql = $main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("id" => $_SESSION["mData"]["postid"]));
$result = $main->adminDB[$_SESSION["db_1"]]->query($sql);

while ($row = $result->fetch_assoc()) {
    // $i++;
?>
    <!-- page_title_section start -->
    <div class="page_title_section">
        <div class="page_title_overlay"></div>
        <div class="page_header text-center">
            <div class="container">
                <div class="row">
                    <!-- section_heading start -->
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="page_header_line">
                            <h1 class="pst_bottompadder30"><span><?php echo $row["title"]; ?></span></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="row">
                    <div class="page_header_bottom">
                        <ul class="sub_title">
                            <li><a href="#"> Home </a></li>
                            <li class="icon_breamcum"> > </li>
                            <li><?php echo $row["title"]; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        strong {
            font-size: 20px;
        }

        h1 strong {
            font-size: 28px;
        }
    </style>
    <!-- page_title_section end -->
    <!-- blog_section start -->
    <div class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="lest_news_box_wrapper">

                        <style>
                            .page_title_section {
                                float: left;
                                width: 100%;
                                background: url(<?php echo $row["img"]; ?>) no-repeat center !important;
                                background-size: cover;
                                position: relative;
                                margin-top: 15px;
                                padding-top: 300px !important;
                            }
                        </style>
                        <div class="lest_news_box_wrapper blog_cat_image_wrapper pst_bottompadder50">
                            
                            <div class="lest_news_cont_wrapper news_blog_btm_bordr">
                                <h1 class="text-center"><?php echo $row["title"]; ?></h1>

                                
                                <div>
                                    <?php echo $row["description"]; ?>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
<?php
}
?>
<!--blog  section end-->
<!--<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5dd55bb59e304f00123cfb0e&product=sticky-share-buttons&cms=sop' async='async'></script>-->