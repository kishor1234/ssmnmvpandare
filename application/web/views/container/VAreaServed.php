
<div class="btm_newslater_section" >

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="h1">Popular Areas Served</h3>
                <div class="area-served" >
                    <p>
                        <?php
                        $sql = $main->select("areaserved", $_SESSION["db_1"]) . $main->whereSingle(array("popular" => "on"));
                        $resutl = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                        while ($row = $resutl->fetch_assoc()) {
                            ?>

                            <a href="/pest-control-service/<?=str_replace(' ', '-', strtolower($row["area"]))?>"><?= $row["area"] ?></a> | 

                            <?php
                        }
                        ?>

                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
