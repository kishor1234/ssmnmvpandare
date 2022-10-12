<style>
    .ellipsis {
        text-overflow: ellipsis;
        /* Required for text-overflow to do anything */
        white-space: nowrap;
        overflow: hidden;
    }
    #img-s{
        height: 50px; width: 50px; border-radius: 100%; border: 1px dotted #ddbb00;
    }
</style>
<div class="sidebar_widget">
    <h4> Our Services  <span> </span> </h4>
    <div class="archives_wrapper">
        <ul class="categories clearfix">
            <?php
            $result = $main->adminDB[$_SESSION["db_1"]]->query($main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Services")));
            while ($row = $result->fetch_assoc()) {
                ?>
                <li class="ellipsis">
                    <a href="/Services/<?php echo strtolower(str_replace(" ","-",$row["title"]));?>">
                        <img src="<?php echo $row["img"]; ?>" alt="<?=$row["title"]?>" id="img-s">&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $row["title"]; ?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<div class="sidebar_widget">
    <h4> Recent Blog <span> </span> </h4>
    <div class="archives_wrapper">
        <ul class="categories clearfix">

            <?php
            $result = $main->adminDB[$_SESSION["db_1"]]->query($main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Blog")) . $main->orderBy("DESC", 'id') . $main->limitWithOutOffset(10));
            while ($row = $result->fetch_assoc()) {
                ?>
                <li class="ellipsis">
                    <a href="/blog/<?php echo strtolower(str_replace(" ","-",$row["title"]));?>">
                        <img src="<?php echo $row["img"]; ?>" alt="<?=$row["title"]?>" id="img-s" >&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $row["title"]; ?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<!--<div class="sidebar_widget">
    <h4> Infographic <span> </span> </h4>
    <div class="archives_wrapper">
        <ul class="categories clearfix">
            <?php
           /* $result = $main->adminDB[$_SESSION["db_1"]]->query($main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Infographic")) . $main->orderBy("DESC", 'id') . $main->limitWithOutOffset(10));
            while ($row = $result->fetch_assoc()) {
                ?>
                <li class="ellipsis">
                    <a href="/in/infographics/<?php echo strtolower(str_replace(" ","-",$row["title"]));?>">
                        <img src="<?php echo $row["img"]; ?>" style="height: 50px; width: 50px; border-radius: 100%; border: 1px dotted #ddbb00;">&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $row["title"]; ?>
                    </a>
                </li>
                <?php
            }*/
            ?>
        </ul>
    </div>
</div>-->
<?php
//$main->isLoadView("VTopLocations", false, array());
//$main->isLoadView("VClientLogo", false, array());
$main->isLoadView("VAreaServed", false, array());
?>