<style>
    .item img{
        width:100%;
    }
   
</style>
<div id="myCarousel" class="carousel slide" data-ride="carousel">


    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php
        $active = "active";
        $i = 0;
        $slidResult = $main->adminDB[$_SESSION["db_1"]]->query($main->select("slider", $_SESSION["db_1"]) . $main->orderby('DESC', 'id'));
        while ($row = $slidResult->fetch_assoc()) {
            ?>
            <div class="item <?php echo $active; ?>">
                <a href='https://tahaanpestsolutions.com/blogs/disinfestation-service-for-coronavirus' target='blank' ><img src="<?php echo $row["img"]; ?>" alt="<?php echo $row["alt"]; ?>"></a>
            </div>
            <?php
            $active = "";
            $i++;
        }
        ?>

    </div>
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        $j = 0;
        while ($j < $i) {
            ?>
            <li data-target="#myCarousel" data-slide-to="<?= $j ?>" class="<?php if ($j == 0) {
            echo "active";
        } ?>"></li>
            <?php
            $j++;
        }
        ?>
        <!--
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        -->
    </ol>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
