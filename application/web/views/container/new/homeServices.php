<div class="form-group">
    <div class="row">
        <?php
        foreach ($data as $key => $row) {
            ?>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <span class="label label-danger">5% Off on Online Payment </span>
                    <div class="panel-body">
                        <h3 class="text-black b400-12"><?= $row["pest"] ?></h3>
                        <!--                                <div id="description">
                                                            
                        <?= substr($row["meta"], 0, 800) ?>
                                                        </div>-->
                        <div class="ul-list">
                            <ul id="ul-li">
                                <li id="liid">
                                    <span id="span-14">
                                        <?= $row["area"] ?> Covered Area 

                                    </span> 
                                </li>
                                <li id="liid">
                                    <span id="spanb">
                                        Complementary Ant Treatment
                                    </span>
                                </li>
                            </ul>
                        </div>

                        <br>
                        <button class="form-control btn-back"><?= $row["hms"] ?> Services in <?= $row["type"] ?></button>
                        <?php
                        if ((float) $row["price"] == 0.00) {
                            ?>
                        <div class="row no-gutters pricerow align-items-center">
                            
                            <div class="col-lg-12 m-10">
                                <a href="tel:+917045671515" class="appint-btn appint-btn-home">
                                    <div class="btn-front"><i class="fa fa-phone"></i>  Call for custom charges </div>
                                    <div class="btn-back"><i class="fa fa-phone"></i>  Call for custom charges  </div>

                                </a>
                            </div>
                        </div>
                            <?php
                        } else {
                            ?>
                            <div class="row no-gutters pricerow align-items-center">
                                <div class="col-sm-6">
                                    <div class="price light">
                                        Cash on Delivery
                                        <span class="d-block">Rs. <?= $row["price"] ?>/-</span>
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="price ">
                                        Online Payment
                                        <span class="d-block">Rs. <?= ($row["price"] - ($row["price"] * 0.05)) ?>/-</span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <a href="/bookingpage/<?= $row["pest"] ?>">Click Here To Read More</a>
                        <br> <br> 
                        <a href="/bookingpage/<?= $row["pest"] ?>" class="btn btn-success btn-sm">Book Now</a>
                        <br> <br>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>



    </div>
</div>

<!--<div class="col-lg-4">
                        <div class="panel panel-default">
                            <span class="label label-danger">5% Off on Online Payment </span>
                            <div class="panel-body">
                                <h3 class="text-black b400-12">Best Pest Control Services</h3>
                                <div class="ul-list">
                                    <ul id="ul-li">
                                        <li id="liid">
                                            <span id="span-14">
                                                Gel + Spray Treatment

                                            </span> 
                                        </li>
                                        <li id="liid">
                                            <span id="spanb">
                                                Complementary Ant Treatment
                                            </span>
                                        </li>
                                    </ul>
                                </div>

                                <br>
                                <button class="form-control btn-back">3 Services 1 Year</button>
                                <div class="row no-gutters pricerow align-items-center">
                                    <div class="col-sm-6">
                                        <div class="price light">
                                            Cash on Delivery
                                            <span class="d-block">Rs. 5750/-</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="price">
                                            Online Payment
                                            <span class="d-block">Rs. 5463/-</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">Click Here To Read More</a>
                                <br> <br> 
                                <button  class="btn btn-success">Book Now</button>
                                <br> <br>
                            </div>
                        </div>
                    </div>-->