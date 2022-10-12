<?php
$uri = $_SERVER['REQUEST_URI'];
//echo $uri; // Outputs: URI

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url2 = urlencode($url); // Outputs: Full URL
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
                        <h1 class="pst_bottompadder30"><span>Tahaan Blog</span></h1>
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
                        <li>Embedded</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page_title_section end -->
<!-- blog_section start -->
<div class="blog_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="lest_news_box_wrapper">
                    <?php
                    $sql = $main->updateINC(array("view" => "view + 1"), "postcvc") . $main->whereSingle(array("post_id" => $obj->decdata($_REQUEST["c"])));

                    $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $sql = $main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("id" => $obj->decdata($_REQUEST["c"])));
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);

                    while ($row = $result->fetch_assoc()) {
                       // $i++;
                        ?>
                        <div class="lest_news_box_wrapper blog_cat_image_wrapper pst_bottompadder50">
                            <div class="lest_news_img_wrapper img-effect">
                                <img src="<?php echo $row["img"]; ?>" alt="blog_img">
                                <div class="lest_news_date_wrapper">
                                    <?php
                                    $dat = explode(" ", $row["isDate"]);
                                    $dat = explode("-", $dat[0]);
                                    $month = array(0 => "", 1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "July", 8 => "Aug", 9 => "Sept", 10 => "Oct", 11 => "Nov", 12 => "Dec",);
                                    ?>
                                    <ul>
                                        <li><?php echo $dat[2]; ?></li>
                                        <li><?php echo $month[(int) $dat[1]]; ?></li>
                                    </ul>
                                    <p><?php echo $dat[0]; ?> </p>
                                </div>
                            </div>
                            <div class="lest_news_cont_wrapper news_blog_btm_bordr">
                                <h5><a class="readmore" href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VSingle") . "&c=" . $obj->encdata($row["id"]); ?>"><?php echo $row["title"]; ?></a></h5>

                                <div class="lest_news_cont_bottom sc_blog_btm_div">
                                    <?php
                                    $sl = $main->select("postcvc", $_SESSION["db_1"]) . $main->whereSingle(array("post_id" => $row["id"]));
                                    $rslt = $main->adminDB[$_SESSION["db_1"]]->query($sl);
                                    $rp = $rslt->fetch_assoc();
                                    ?>
                                    <div class="lest_news_cont_bottom_left sc_left_btm">
                                        <p><a href="#" title="viesw"><i class="fa fa-thumbs-up"></i><?php echo $rp["view"]; ?></a></p>
                                    </div>
                                    <div class="lest_news_cont_bottom_center sc_center_btm">
                                        <p><a href="#" title="comments"><i class="fa fa-comments"></i><?php echo $rp["comment"]; ?></a></p>
                                    </div>
                                    <div class="lest_news_cont_bottom_right sc_right_btm hidden-sm hidden-xs">
                                        <p><a href="#"><i class="fa fa-tags"></i>News tag</a></p>
                                    </div>
                                    <div class="lest_news_cont_bottom_right_2 sc_right_btm" style="width: 300px;">
                                        <p><a href="#"><i class="fa fa-user"></i><?php echo $row["byw"]; ?></a></p>
                                    </div>
                                </div>
                                <div>
                                    <?php echo $row["description"]; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--blog  section end-->
