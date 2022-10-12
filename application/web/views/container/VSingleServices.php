<style>
b, strong {
    font-weight: 700;
    color: #000;
}
    #blog-data h1 {
        font-size: 1.975em;
        padding: 5px 0px !important;
        line-height: 1.5;
        font-weight: bold;

    }

    #blog-data h2 {
        font-size: 1.675em;
        padding: 5px 0px !important;
        line-height: 1.5;
        font-weight: bold;
    }
    #blog-data h3 {
        font-size: 1.5em;
        padding: 5px 0px !important;
        line-height: 1.5;
        font-weight: bold;
    }
    #blog-data ul li{
        list-style-type: square;
        list-style-position: inside;
        size: 10px;
    }
    #blog-data{

        line-height: 1.5;
    }
    #blog-data img{
        margin: 5px !important;
        padding: 5px !important;
    }
    @media only screen and (max-width: 768px) {
        #blog-data h1 {
            font-size: 1.6em;
            padding: 5px 0px !important;
            line-height: 1.5;
        }

        #blog-data h2 {
            font-size: 1.5em;
            padding: 5px 0px !important;
            line-height: 1.5;
        }
        #blog-data h3 {
            font-size: 1.3em;
            padding: 5px 0px !important;
            line-height: 1.5;
        }
        #blog-data ul li{
            list-style-type: square;
            list-style-position: inside;
            size: 10px;
        }
        #blog-data{

            line-height: 1.5;
        }
        #blog-data img{
            margin: 5px !important;
            padding: 5px !important;
        }
    }
    @media only screen and (max-width: 480px) {
        #blog-data h1 {
            font-size: 1.6em;
            padding: 5px 0px !important;
            line-height: 1.5;
        }

        #blog-data h2 {
            font-size: 1.5em;
            padding: 5px 0px !important;
            line-height: 1.5;
        }
        #blog-data h3 {
            font-size: 1.3em;
            padding: 5px 0px !important;
            line-height: 1.5;
        }
        #blog-data ul li{
            list-style-type: square;
            list-style-position: inside;
            size: 10px;
        }
        #blog-data{

            line-height: 1.5;
        }
        #blog-data img{
            margin: 5px !important;
            padding: 5px !important;
        }
    }
</style>
<?php
                    //print_r($_SESSION["mData"]);
                    $sql = $main->updateINC(array("view" => "view + 1"), "postcvc") . $main->whereSingle(array("post_id" => $_SESSION["mData"]["postid"]));
                    $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $sql = $main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("id" => $_SESSION["mData"]["postid"]));
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);

                    $row = $result->fetch_assoc();
                        ?>
                       
<div class="page_title_section">
    <div class="page_title_overlay"></div>
    <div class="page_header text-center">
        <div class="container">
            <div class="row">
                <!-- section_heading start -->
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="page_header_line">
                        <h1 class="pst_bottompadder30"><span><?php echo $row["title"]; ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="row">
                <div class="page_header_bottom">
                    <ul class="sub_title">
                        <li><a href="#"> Home </a></li>
                        <li class="icon_breamcum"> > </li>
                        <li>services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$uri = $_SERVER['REQUEST_URI'];
//echo $uri; // Outputs: URI

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url2 = urlencode($url); // Outputs: Full URL
?>
<!--service client section start-->
<div class="service_page_section pst_toppadder50 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="blog_wrapper_catt sidebar_widget">
                     <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sp_choose_heading_main_wrapper ">
                                <h2><span><?php echo $row["title"]; ?></span></h2>
                            </div>
                        </div>-->


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style='margin:0px; padding:0px;'>
                            <div class="serv_page_txt" id="blog-data">
                                <?php echo $row["description"]; ?>
                            </div>
                        </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                <?php $main->isLoadView("sidebar", false, array()); ?>
            </div>
        </div>
    </div>
    <!--service client section end-->
    <!--<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5dd55bb59e304f00123cfb0e&product=sticky-share-buttons&cms=sop' async='async'></script>-->
        