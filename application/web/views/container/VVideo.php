<!--video section Start -->

<div class="about_us_sections sp_choose_heading_main_wrapper">
    <div class="sp_abt_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 web">
                <div class="video_sec_icon_wrappe"><br>
                    <h2 style="color:#FFFFFF;"><span>Pest control Video Work</span></h2>
                    <br>
                    <div class="form-group">
                        <?php
                        $rq = $main->adminDB[$_SESSION["db_1"]]->query($main->select("home_video", $_SESSION["db_1"]));
                        while ($ro = $rq->fetch_assoc()) {
                            ?>
                            <div class="col-lg-4">
                                <?php
                                echo "<iframe src='" . $ro["youtube_url"] . "?autoplay=0' frameborder='0' style='width:100%; height:auto;margin:10px;' ></iframe>";
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mobile">
                <div class="video_sec_icon_wrappe"><br>
                    <h2 style="color:#FFFFFF;"><span>Pest control Video Work</span></h2>
                    <br>
                    <div class="form-group commonvideo">
                       <div class="owl-carousel owl-theme">
                            <?php
                            $rq = $main->adminDB[$_SESSION["db_1"]]->query($main->select("home_video", $_SESSION["db_1"]));
                            while ($ro = $rq->fetch_assoc()) {
                                ?>
                                <div class="col-lg-12 item">
                                    <?php
                                    echo "<iframe src='" . $ro["youtube_url"] . "?autoplay=0' frameborder='0' style='width:100%; height:auto;margin:10px;' ></iframe>";
                                    ?>
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
