
<div class="btm_newslater_section clh" >

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="commonService" >
                    <div class="owl-carousel owl-theme">

                        <?php
                        $resutl = $main->adminDB[$_SESSION["db_1"]]->query($main->select("client", $_SESSION["db_1"]));
                        while ($row = $resutl->fetch_assoc()) {
                            ?>
                            <div class="item">
                                <div class="center">
                                    <img src="<?php echo $row["logo"]; ?>" class="clientImage" alt="<?=$row["alt"]?>">
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
