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
                        <h1 class="pst_bottompadder30"><span>blog single</span></h1>
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
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="lest_news_box_wrapper">
                    <?php
                    $sql = $main->updateINC(array("view" => "view + 1"), "postcvc") . $main->whereSingle(array("post_id" => $_SESSION["mData"]["postid"]));

                    $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $sql = $main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("id" => $_SESSION["mData"]["postid"]));
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        // $i++;
                        ?>
                        <div class="lest_news_box_wrapper blog_cat_image_wrapper pst_bottompadder50">
                            <div class="lest_news_img_wrapper img-effect">
                                <img src="<?php echo $row["img"]; ?>" alt="<?php echo $row["title"]; ?>">
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
                                <h5><strong><?php echo $row["title"]; ?></strong></h5>

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
                                        <p><a href="#"><i class="fa fa-tags"></i><?=$row["category"]?></a></p>
                                    </div>
                                    <div class="lest_news_cont_bottom_right_2 sc_right_btm" style="width: 300px; text-transform: lowercase;">
                                        <p><a href="#"><i class="fa fa-user"></i><?php echo $row["byw"]; ?></a></p>
                                    </div>
                                </div>
                                <div>
                                    <?php echo $row["description"]; ?>
                                </div>


                            </div>
                            <div class="form-group">
                                <h3><strong>Embed Infographic code</strong></h3>
                                <textarea class="form-control" readonly="" style="height: 110px; align-content:center; overflow:auto;"><div class="aasksfot_embed"><div id="display_image"><img id="img" src='<?=HOSTURL.$row["img"]?>'><p>From <sapn id='span'> <a href="<?= HOSTURL . "?utm_source=infographic&utm_medium=web-blog&utm_campaign=infographic&utm_term=1&utm_content={$row["title"]}"?>" target="_blank"><?=$row["title"]?></a></sapn></p></div><script type="text/javascript" src="<?=HOSTURL?>img.js" class='aasksfot_embed_script' data-name='<?=HOSTURL."*".$row["id"] ?>' id='aasksfot_embed_script'></script></div></textarea>
                            </div>
                        </div>



                        <div class="blg_sngle_man_div pst_toppadder60">
                            <div class="sp_choose_heading_main_wrapper cmmnt_heading_wrapper pst_bottompadder30">
                                <h2>comments <span> (<?php echo $rp["comment"]; ?>) </span> </h2>
                            </div>
                            <div class="comment_box_blog">

                                <!--<div class="blog_comment1_wrapper cmnt_wraper_2">
                                    <div class="blog_comment1_img">
                                        <img src="images/cmt_1.png" alt="comment_img" class="img-responsive" />
                                    </div>
                                    <div class="blog_comment1_cont">
                                        <h3>sent france</h3>
                                        <p><span>june 1, 2018 - <a href="#">reply</a></span>
                                        </p>
                                        <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                    </div>
                                </div>-->

                                <?php
                                $sql = $main->select("comment", $_SESSION["db_1"]) . $main->where(array("comment_parent" => "0", "post_id" => $row["id"], "isActive" => "1"), "AND"); //. $main->limitWithOutOffset("6");
                                $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                                $fl = true;
                                while ($rw = $result->fetch_assoc()) {
                                    ?>
                                    <div>
                                        <blockquote class="panel-primary">
                                            <div class="form-group">
                                                <div class="col-lg-1">
                                                    <img src="assets/ap/dist/img/avatar5.png" class="user-image" style="height: 30px; width: auto;" alt="Image">

                                                </div>
                                                <div class="col-lg-11">
                                                    <strong><?php echo $rw["name"]; ?></strong>
                                                    <p><?php echo $rw["message"]; ?></p>
                                                </div>
                                            </div>

                                            <small><?php echo $rw["name"]; ?> &nbsp;&nbsp;&nbsp; post at <cite title="Source Title"><i class="fa fa-clock-o"></i> <?php echo $rw["isDate"]; ?></cite>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<cite><span><i class="fa fa-reply"></i><a href="javascript:void(0)" data-toggle="modal" data-target="#myModalC<?php echo $rw["id"]; ?>">Replay</a></span></cite></small>
                                            <div id="myModalC<?php echo $rw["id"]; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Replay Comment</h4>
                                                        </div>
                                                        <div class="modal-body" style="height:300px;">

                                                            <form action="#" method="post" id="myForm<?php echo $rw["id"]; ?>" onsubmit="return postData('<?php echo $obj->encdata("C_AddComment"); ?>', '#msg<?php echo $rw["id"]; ?>', '#myForm<?php echo $rw["id"]; ?>')">
                                                                <div class="form-group">
                                                                    <div class="col-lg-12">
                                                                        <label>Message <span id="require">*</span></label>
                                                                        <textarea name="message" id="message" class="form-control" placeholder="Message type here" required=""style="height: 100px;"></textarea>

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Name <span id="require">*</span></label>
                                                                            <input type="text" class="form-control" name="name" id="name" required="" placeholder="Enter Name" value="" autocomplete="off">
                                                                            <input type="hidden" name="post_id" id="post_id" readonly value="<?php echo $row["id"]; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Email <span id="require">*</span></label>
                                                                            <input type="hidden" name="comment_parent" id="comment_parent" value="<?php echo $rw["id"]; ?>">
                                                                            <input type="email" class="form-control" name="email" id="email" value="" required="" placeholder="Enter Email" autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="col-lg-12"><br>
                                                                        <div id="msg<?php echo $rw["id"]; ?>"></div>
                                                                        <input type="submit" value="Send" class="btn btn-danger btn-sm">
                                                                    </div>
                                                                </div>
                                                            </form> 
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </blockquote>
                                    </div>
                                    <?php
                                    $main->checkChild($rw["id"]);
                                }
                                ?>

                            </div>
                        </div>
                        <div class="cmnt_area_div_mn pst_toppadder60">
                            <div class="sp_choose_heading_main_wrapper cmmnt_heading_wrapper pst_bottompadder10">
                                <h2>leave a comment  <span></span> </h2>
                            </div>
                            <form action="#" method="post" id="myFormNew" onsubmit="return postData('<?php echo $obj->encdata("C_AddComment"); ?>', '#msg', '#myFormNew')">
                                <div class="row cont_main_section">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="contect_form1">
                                            <input type="text" class="form-control" required="" name="name" id="name" autocomplete="off" placeholder="Name">
                                            <input type="hidden" name="post_id" id="post_id" readonly value="<?php echo $row["id"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="contect_form1">
                                            <input type="email" class="form-control" required="" id="email" autocomplete="off" name="email" placeholder="E-mail" data-valid="email" data-error="Email should be valid.">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="contect_form4">
                                            <textarea rows="6" name="message" id="message" class="form-control" required=""placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="pst_btn_form blog_btn_cnt pst_toppadder30">
                                            <div id="msg">Response here</div>
                                            <ul>
                                                <li>
                                                    <button type="submit" class="tem-btn" form-type="contact">
                                                        <div class="btn-front">Send A Comment </div>
                                                        <div class="btn-back">Send A Comment</div>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                    }
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
<!--<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5dd55bb59e304f00123cfb0e&product=sticky-share-buttons&cms=sop' async='async'></script>-->
        