<div class="page_title_section">
    <div class="page_title_overlay"></div>
    <div class="page_header text-center">
        <div class="container">
            <div class="row">
                <!-- section_heading start -->
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="page_header_line">
                        <h1 class="pst_bottompadder30"><span>Infographic categories</span></h1>
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
                        <li>Infographic</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog_section start -->
<div class="blog_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="blog_wrapper_catt sidebar_widget pst_toppadder-10">
                    <h4> Infographic  <span> </span> </h4>
                    <?php
                    $limit = 10;
                    $sql = $main->selectCount("post", "id") . $main->whereSingle(array("category" => "Infographic"));
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $r = $result->fetch_assoc();
                    $max_count = $r["count(id)"];
                    $page = 1;
                    $offset = 0;
                    if (isset($_REQUEST["pg"])) {
                        $page = $_REQUEST["pg"];
                        $tempLimit = $limit;
                        $tempLimit = $limit * $page;
                        $offset = $tempLimit - $limit;
                    } else {
                        $limit = $limit * $page;
                        $offset = 0;
                    }
                    $i = 0;

                    $sql = $main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Infographic")) . $main->orderBy("DESC", "isDate") . $main->limitWithOffset($offset, $limit);
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        ?>
                        <div class="lest_news_box_wrapper blog_cat_image_wrapper pst_bottompadder50">
                            <div class="lest_news_img_wrapper img-effect ">
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
                                 <h5><a class="readmore" href="/in/infographics/<?php echo strtolower(str_replace(" ","-",$row["title"]));?>"><?php echo $row["title"]; ?></a></h5>
                                    <br>
                                <br>
                                <div class="form-group">
                                    <h3><strong>Embed Infographic code</strong></h3>
                                    <textarea class="form-control" readonly="" style="height: 110px; align-content:center; overflow:auto;"><div class="aasksfot_embed"><div id="display_image"><img id="img" src='<?= HOSTURL . $row["img"] ?>'><p>From <sapn id='span'> <a href="<?= HOSTURL . "?utm_source=infographic&utm_medium=web-blog&utm_campaign=infographic&utm_term=1&utm_content={$row["title"]}" ?>" target="_blank"><?= $row["title"] ?></a></sapn></p></div><script type="text/javascript" src="<?= HOSTURL ?>img.js" class='aasksfot_embed_script' data-name='<?= HOSTURL . "*" . $row["id"] ?>' id='aasksfot_embed_script'></script></div></textarea>
                                </div>

                            </div>
                        </div>




                        <?php
                    }
                    ?>


                </div>
                <?php
                $main->isLoadView("VPageing", false, array("ct" => $ct, "limit" => $limit, "offset" => $offset, "max_count" => $max_count, "page" => $page, "file" => $obj->decdata($_REQUEST["v"])));
                ?>

            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php $main->isLoadView("sidebar", false, array()); ?>

            </div>
        </div>
    </div>
</div>
<!--blog  section end-->

