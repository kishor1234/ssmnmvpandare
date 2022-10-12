
<div class="sp_choose_main_wrapper white">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12 col-lg-offset-2">
                <div class="sp_choose_heading_main_wrapper pst_bottompadder10">
                    <h3 class="h3"><span>School Levels</span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $result = $main->adminDB[$_SESSION["db_1"]]->query($main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Services")));
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="center">
                        <a href="/Services/<?php echo strtolower(str_replace(" ", "-", $row["title"])); ?>">

                            <img src="<?php echo $row["banner_url"]; ?>" class='imgs'  alt="<?php echo $row["banner_url"]; ?>" /><br>

                            <?php echo "<strong>" . $row["title"] . "</strong>"; ?>
                        </a>
                    </div>

                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

