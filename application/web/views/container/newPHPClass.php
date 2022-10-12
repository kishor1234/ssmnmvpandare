
<div id="page_title">
    <div class="container text-center">
        <div class="panel-heading">Single Services</div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Single Services</li>
        </ol>
    </div>
</div>
<?php
$uri = $_SERVER['REQUEST_URI'];
//echo $uri; // Outputs: URI

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url2 = urlencode($url); // Outputs: Full URL
?>
<section id="blog-area" class="blog-with-sidebar-area">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12" >
                <!-- code here-->
                <div class="blog-post">                        
                    <!-- code here-->
                    <?php
                    $sql = $main->updateINC(array("view" => "view + 1"), "postcvc") . $main->whereSingle(array("post_id" => $obj->decdata($_REQUEST["c"])));

                    $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $sql = $main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("id" => $obj->decdata($_REQUEST["c"])));
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="single-blog-post">
                            <div class="img-holder"> 
                                <div class="date_more">
                                    <?php
                                    $dat = explode(" ", $row["isDate"]);
                                    $dat = explode("-", $dat[0]);
                                    $month = array(0 => "", 1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "July", 8 => "Aug", 9 => "Sept", 10 => "Oct", 11 => "Nov", 12 => "Dec",);
                                    ?>
                                    <div> 
                                        <img style="width:50px; height: 50px; float: left;" src="<?php echo $row["img"]; ?>" alt="blog2" />
                                    </div>
                                    <div class="text-holder">
                                        <h3 class="blog-title">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row["title"]; ?></h3>
                                    </div>
                                </div>
                                <div class="text">
                                    <?php echo $row["description"]; ?>
                                </div>
                                <script>
                                $(document).ready(function(){
                                    $("#page_title").css("background","url('<?php echo HOSTURL.$row["banner_url"]; ?>')");
                                });
                                </script>
                            </div>
                        </div>


                        <?php
                    }
                    ?>

                </div><!--//news-wrapper-->

            </div><!--//page-row-->
            <!--Start sidebar Wrapper-->
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="sidebar-wrapper">

                    <div class="single-sidebar">
                        <?php $main->isLoadView("sidebar", false, array()); ?>
                    </div>

                </div>
            </div>
            <!--End Sidebar Wrapper--> 
        </div><!--//page-content-->
    </div><!--//page--> 
</section><!--//content-->

