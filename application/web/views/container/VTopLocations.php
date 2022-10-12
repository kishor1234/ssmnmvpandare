
<div class="btm_newslater_section" >

    <div class="container">
        <div class="row">
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php
                $sql = $main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Services"));
                $resutlPost = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                while ($rowPost = $resutlPost->fetch_assoc()) {
                    ?>
                    <h3 class="h1 text-danger">Top Location for <?= $rowPost["title"] ?></h3>
                    <div class="area-served" >
                        <p>
                            <?php
                            $sql = $main->select("areaserved", $_SESSION["db_1"]) . $main->whereSingle(array("served" => "on")) . $main->limitWithOutOffset(10);
                            $resutl = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                            while ($row = $resutl->fetch_assoc()) {
                                ?>

                                <a href="/<?=str_replace(' ', '-', strtolower($rowPost["title"]))?>-service/<?=str_replace(' ', '-', strtolower($row["area"]))?>"><?= $rowPost["title"] ?>&nbsp;in &nbsp;<?= $row["area"] ?></a> | 

                                <?php
                            }
                            ?>

                        </p>
                        <p>&nbsp;</p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
