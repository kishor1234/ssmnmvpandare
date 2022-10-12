<div class="testimonial_wrapper">
    <div class="test_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sp_choose_heading_main_wrapper "><br>
                    <h3 class="h3 white"><span>testimonial</span></h3>
                    
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="testimonial_slider_wrapper">
                    <div class="owl-carousel owl-theme">
                        <?php
                        $resutl = $main->adminDB[$_SESSION["db_1"]]->query($main->select("testimonials", $_SESSION["db_1"]));
                        while ($row = $resutl->fetch_assoc()) {
                            ?>
                            <div class="item box_testimonial">
                               <div class="section2_img_wrapper">
                                    <div class="author-thumb">
                                        <a href="#"><img src="<?php echo $row["logo"]; ?>" class="img-responsive " alt="Image">
                                        </a>
                                    </div>
                                </div>
                                <div class="section2_text_wrapper">
                                    <p><?php echo $row["testimonials"]; ?></p>
                                    <h4><?php echo $row["name"]; ?> </h4>
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
