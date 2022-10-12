<div class="page_title_section">
    <div class="page_title_overlay"></div>
    <div class="page_header text-center">
        <div class="container">
            <div class="row">
                <!-- section_heading start -->
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="page_header_line">
                        <h1 class="pst_bottompadder30"><span>blog categories</span></h1>
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
                        <li>blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
                                        #blog_img{
                                            width: 300px; height: 200px;
                                            display:block;
                                        }
                                        #byw{
                                           text-transform: lowercase; 
                                        }
                                        #img-effect{
                                            min-width:100px;
                                            max-width:300px;
                                            width:auto;
                                            
                                        }
                                    </style>
<!-- blog_section start -->
<div class="blog_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="blog_wrapper_catt sidebar_widget">
                    <h4> Our Blog  <span> </span> </h4>
                    <?php
                    $limit = 10;
                    $sql = $main->selectCount("post", "id") . $main->whereSingle(array("category" => "Blog"));
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

                    $sql = $main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Blog")) . $main->orderBy("DESC", "isDate") . $main->limitWithOffset($offset, $limit);
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        ?>
                        <div class="lest_news_box_wrapper blog_cat_image_wrapper ">
                            <div class="lest_news_cont_wrapper news_blog_btm_bordr">
                                <h5><a href="/blog/<?php echo strtolower(str_replace(" ", "-", $row["title"])); ?>"><?php echo $row["title"]; ?></a></h5>
                                <div class="lest_news_cont_bottom sc_blog_btm_div">
                                    <?php
                                    $sl = $main->select("postcvc", $_SESSION["db_1"]) . $main->whereSingle(array("post_id" => $row["id"]));
                                    $rslt = $main->adminDB[$_SESSION["db_1"]]->query($sl);
                                    $rp = $rslt->fetch_assoc();
                                    ?>
                                    <div class="lest_news_cont_bottom_left sc_left_btm">
                                        <p><a href="#" title="viesw"><i class="fa fa-eye"></i><?php echo $rp["view"]; ?></a></p>
                                    </div>
                                    <div class="lest_news_cont_bottom_center sc_center_btm">
                                        <p><a href="#" title="comments"><i class="fa fa-comments"></i><?php echo $rp["comment"]; ?></a></p>
                                    </div>
                                    <div class="lest_news_cont_bottom_right sc_right_btm hidden-sm hidden-xs">
                                        <p><a href="#"><i class="fa fa-tags"></i><?= $row["category"] ?></a></p>
                                    </div>
                                    <div class="lest_news_cont_bottom_right_2 sc_right_btm" id="byw">
                                        <p><a href="#" ><i class="fa fa-user"></i><?php echo $row["byw"]; ?></a></p>
                                    </div>
                                </div>
                                <p>
                                    
                                <div class="lest_news_img_wrapper img-effect " id="img-effect" >
                                    <img src="<?php echo $row["img"]; ?>" alt="<?php echo $row["title"]; ?>" id='blog_img' >
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
                                <style>
                                    #me{
                                      /*
                                      //height:160px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; margin-right:15px; padding-left: 10px;
                                      */
                                    }
                                </style>
                                <div id="me" >
                                    <?= $row["meta"] ?>
                                    [....]
                                </div>
                                <a class="btn btn-info btn-custom-black theamcolor" href="/blog/<?php echo strtolower(strtolower(str_replace(" ", "-", $row["title"]))); ?>" style="float:right;">Continue Reading...</a>

                                </p>
                                <!--<div>
                                    <p class="blog_single_para"></p>
                                    <h6><a class="readmore" href="/?r=<?php //echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VSingle") . "&c=" . $obj->encdata($row["id"]);        ?>">read more </a></h6>
                                </div>-->
                            </div>
                        </div>
                    <legend>&nbsp;</legend>



                        <?php
                    }
                    ?>


                </div>
                 <div class="blog_wrapper_catt sidebar_widget">
                <?php
                $main->isLoadView("VPageing", false, array("ct" => $ct, "limit" => $limit, "offset" => $offset, "max_count" => $max_count, "page" => $page, "file" => $obj->decdata($_REQUEST["v"])));
                ?>
    </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php $main->isLoadView("sidebar", false, array()); ?>

            </div>
        </div>
    </div>
</div>
<!--blog  section end-->

