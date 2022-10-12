<br><br>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" id="center">

            <ul id="ul">
                <?php
                $sql = "SELECT * FROM `post` WHERE category='Booking' ORDER BY `post`.`id` ASC LIMIT 5";
                $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <li class="li">
                        <a href="#" onclick="fetchHomeServiceBooking('<?= $row["title"] ?>')" class="appint-btn appint-btn-home">

                            <div class="btn-front"><img src="<?= $row["img"] ?>" alt="<?= $row["title"] ?>" class="img-32"/> <?= $row["title"] ?> </div>
                            <div class="btn-back"><img src="<?= $row["banner_url"] ?>" alt="<?= $row["title"] ?>" class="img-32"/> <?= $row["title"] ?>  </div>

                        </a> 
                    </li>
                    <?php
                }
                ?>


            </ul>

        </div>
        <div class="col-lg-10 col-lg-offset-1" id="display-booking">

        </div>
    </div>
</div>
<script>
    var loading = "<div id=\"loading\"><img src=\"http://greenenvironmentservices.com/images/pest_control.gif\" alt=\"Loading\"/></div>";
    
    function fetchHomeServiceBooking(pest) {
        $("#display-booking").html(loading);
        var formData = {pest: pest, limit: 3}; //Array 
        $.ajax({
            url: "/fetchHomeServices", // Url of backend (can be python, php, etc..)
            type: "POST", // data type (can be get, post, put, delete)
            data: formData, // data in json format
            async: true, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
            success: function (response, textStatus, jqXHR) {
                console.log(response);
                if (response === "")
                {
                    $("#display-booking").html("");

                } else {
                    $("#display-booking").html(response);

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
</script>