<!--video section Start -->

<div class="about_us_sections sp_choose_heading_main_wrapper">
    <!--<div class="sp_abt_overlay"></div>-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="video_sec_icon_wrappe"><br>
                    <h3 class="h3"><span>Our Blogs</span></h3>
                    <br>
                         <div class="commonService" >
                    <div class="owl-carousel owl-theme">
                    

                        <?php
                        $limit = 6;
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
                            
                            <div class="item">
                                <div class="sp_choose_main_wrapper_1 ">

                                    <div class="center">
                                        <div class="panel panel-default" >
                                            <div class="panel-heading"><p class="h-50" ><strong><a title="<?=$row["title"]?>" href="/blogs/<?php echo strtolower(str_replace(" ", "-", $row["title"])); ?>"><?php echo $row["title"]; ?></a></strong></p></div>
                                            <div class="panel-body">
                                                <div class="lest_news_img_wrapper img-effect">
                                        
                                                    <div class="center">
                                                    <img src="<?php echo $row["banner_url"]; ?>" alt="<?=$row["title"]?>" class="bl_img" >
                                                    <br>
                                                   
                                                    <p class="h-100"><?= substr($row["meta"], 0, 100)?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                            <p ><a class="btn btn-info btn-custom-black theamcolor" href="/blogs/<?php echo strtolower(str_replace(" ", "-", $row["title"])); ?>" >Continue Reading</a></p>
                                                    
                                            </div>
                                         </div>
                                    
                                    

                                    </div>
                                    <!--<div>
                                        <p class="blog_single_para"></p>
                                        <h6><a class="readmore" href="/?r=<?php //echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VSingle") . "&c=" . $obj->encdata($row["id"]);          ?>">read more </a></h6>
                                    </div>-->
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
    </div>
</div>
<!-- video section End -->
