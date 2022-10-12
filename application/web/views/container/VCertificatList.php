<!--video section Start -->
<style>
    a {
        outline:none !important;
    }
    .popup-youtube {
        .youtube-click {
            outline:none;
            width: 50px;
            height: 50px;
        }
    }
    #pdfThumbanil{
        width: auto;
        height: 200px;
    }
    .text-danger{
        color:#FFF !important;
    }
</style>
<div class="about_us_sections pst_toppadder100">
    <div class="test_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sp_choose_heading_main_wrapper pst_bottompadder50">
                    <h2><span class="text-danger">Certificate</span></h2>

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="web">
                <div class="testimonial_slider_wrapper">
                    <?php
                    $resutl = $main->adminDB[$_SESSION["db_1"]]->query($main->select("certificate", $_SESSION["db_1"]));
                    while ($certificate = $resutl->fetch_assoc()) {
                        ?>
                        <div class="col-lg-3">
                            <center>
                                <a href="https://docs.google.com/gview?url=<?php echo $certificate["pdf"]; ?>&embedded=true" target="1">
                                    <img src="<?php echo $certificate["img"]; ?>" id="pdfThumbanil">
                                </a>

                                <h3 class="text-uppercase text-danger"><strong> Certificate </strong> </h3>
                            </center>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="mobile">
              
                    <div class="certificate">
                        <div class="owl-carousel owl-theme">
                            <?php
                            $resutl = $main->adminDB[$_SESSION["db_1"]]->query($main->select("certificate", $_SESSION["db_1"]));
                            while ($certificate = $resutl->fetch_assoc()) {
                                ?>
                                <div class="col-lg-4 col-lg-offset-4 item">
                                  
                                        <a href="<?php echo $certificate["pdf"]; ?>" target="1">
                                            <img src="<?php echo $certificate["img"]; ?>" id="pdfThumbanil">
                                        </a>

                                        <h3 class="text-uppercase text-danger"><strong> Certificate </strong> </h3>
                                    
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


