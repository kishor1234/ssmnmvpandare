<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!-->
<?php
$uri = $_SERVER['REQUEST_URI'];
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url2 = urlencode($url); // Outputs: Full URL$title ="Best Pest Control in Navi Mumabi";
$title = "Tahaan Pest Solutions | Best pest control in Mumbai & Navi Mumbai";
if (isset($_REQUEST["v"])) {
    //$title = $_REQUEST["v"];//"Best Pest Control in Navi Mumabi";
}
$cat = "Default";
$img = HOSTURL . "favicon.png";
//print_r($_SESSION["mData"]);
$desc = $_SESSION["mData"]["meta"];
$btilte = "Best Pest Control In Mumbai | pest control for society in navi Mumbai";
$pmeta = "Tahaan Pest Solutions offers the best pest control services in Mumbai & navi Mumbai. We provide pest control service like Residential, Commercial, cockroach, bed bugs, termite, mosquito, rat, bird netting. Call Now- 7045671515";
$pkey = "pest control for society in navi Mumbai, pest control in Mumbai, best pest control in mumbai";
try {
    if (isset($_SESSION["mData"]["postid"])) {
        $sql = $main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("id" => $obj->decdata($_SESSION["mData"]["postid"])));
        $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
        $r = $result->fetch_assoc();
        $title = $r["title"];
        $cat = $r["category"];
        if (!empty($r["img"])) {
            $img = HOSTURL . $r["img"];
        }
        $desc = $_SESSION["mData"]["meta"];
        $btilte = $r["btitle"];
        $pmeta = $r["meta"];
        $pkey = $r["keyword"];
    }
} catch (Exception $ex) {
    
}
?>  
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title> <?= $btilte ?> </title>
        <base href="<?= HOSTURL ?>">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta property="og:url"                content="<?php echo $url; ?>" />
        <meta property="og:type"               content="<?php echo $cat; ?>" />
        <meta property="og:title"              content="<?php echo $btitle; ?>" />
        <meta property="og:description"        content="<?php echo $pmeta; ?>" />
        <meta property="og:image"              content="<?php echo $img; ?>" />
        <meta property="og:keywords" content="<?= $pkey ?>"/>
        <meta name="description" content="<?php echo $pmeta; ?>"/>
        <meta name="keywords" content="<?= $pkey ?>">
        <link rel="shortcut icon" href="favicon.png" hreflang="en-us"> 
        <meta name="author" content="http://aasksoft.co.in/">
        <link rel="canonical" href="<?php echo $url; ?>" hreflang="en-us">
        <meta name="copyright" content='Tahaan Pest Solutions'>
        <meta name="MobileOptimized" content="320" />
        <meta name="ahrefs-site-verification" content="cb92d308d29e45dea33f2a6c71363bd7949b59cffd6e09702987a337d30d307a">
        <script type="application/ld+json">
            {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "<?= $btitle ?>",
            "author": "",
            "image": "<?= $img ?>",
            "description": "<?= $desc ?>"
            }
        </script>
        <script>
            document.addEventListener('contextmenu', event => event.preventDefault());
        </script>
        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start':
                            new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-KTSDJN4');</script>
        <!-- End Google Tag Manager -->
        <!--start theme style -->
        <!--        <link rel="stylesheet" type="text/css" href="assets/html/css/animate.css">-->
        <style>
            @import url(<?php echo HOSTURL; ?>assets/html/css/bootstrap.min.css);
            @import url(<?php echo HOSTURL; ?>assets/html/css/font-awesome.min.css);
            @import url(<?php echo HOSTURL; ?>assets/html/css/owl.carousel.css);
            @import url(<?php echo HOSTURL; ?>assets/html/css/owl.theme.default.css);
            /*@import url(<?php echo HOSTURL; ?>assets/html/css/flaticon.css);*/
            /*@import url(<?php echo HOSTURL; ?>assets/html/css/fonts.css);*/
            @import url(<?php echo HOSTURL; ?>assets/html/css/style.css);
            @import url(<?php echo HOSTURL; ?>assets/html/css/responsive.css);
            @import url(<?php echo HOSTURL; ?>assets/html/css/custome.css);

        </style>
        <link rel="stylesheet" type="text/css" href="assets/html/css/newcss.css">
        <!--<link rel="stylesheet" type="text/css" href="assets/html/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/html/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/html/css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="assets/html/css/owl.theme.default.css">
        <link rel="stylesheet" type="text/css" href="assets/html/css/flaticon.css">-->
        <!--        <link rel="stylesheet" type="text/css" href="assets/html/css/magnific-popup.css">
                <link rel="stylesheet" type="text/css" href="assets/html/venobox/css/venobox.css" />
                <link rel="stylesheet" type="text/css" href="assets/html/css/owl.theme.default.css">
                <link rel="stylesheet" type="text/css" href="assets/html/css/flaticon.css">
                <link rel="stylesheet" type="text/css" href="assets/html/css/fonts.css" />
                <link rel="stylesheet" type="text/css" href="assets/html/js/plugin/rs_slider/layers.css" />
                <link rel="stylesheet" type="text/css" href="assets/html/js/plugin/rs_slider/navigation.css" />
                <link rel="stylesheet" type="text/css" href="assets/html/js/plugin/rs_slider/settings.css" />-->

        <!--<link rel="stylesheet" type="text/css" href="assets/html/css/fonts.css" />
        <link rel="stylesheet" type="text/css" href="assets/html/css/style.css" />
        <link rel="stylesheet" type="text/css" href="assets/html/css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="assets/html/css/custome.css" />-->
        <!-- favicon link-->
        <link rel="shortcut icon" type="image/icon" href="favicon.ico" hreflang="en-us" />
        <script src="assets/main.js"></script>
        <style>
            .white>span {
                color:#fff;
            }

        </style>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }
            #login_button_id{
                display: none !important;
            }

            .error{
                color:red; 
                font-size: 12px;
            }
            section {
                position: relative;
                /*min-height: 100vh;*/
                /*background-color: #a0dcf4;*/
                /*background-color:#ffffff;*/
                display: flex;
                justify-content: center;
                align-items: center;
                /*padding: 20px;*/
            }

            section .container {
                position: relative;
                width: 800px;
                height: 500px;
                background: #fff;
                box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            section .container .user {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
            }

            section .container .user .imgBx {
                position: relative;
                width: 50%;
                height: 100%;
                background: #ff0;
                transition: 0.5s;
            }

            section .container .user .imgBx img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            section .container .user .formBx {
                position: relative;
                width: 50%;
                height: 100%;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 40px;
                transition: 0.5s;
            }

            section .container .user .formBx form h2 {
                font-size: 18px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 2px;
                text-align: center;
                width: 100%;
                margin-bottom: 10px;
                color: #555;
            }

            section .container .user .formBx form input {
                position: relative;
                width: 100%;
                padding: 10px;
                background: #f5f5f5;
                color: #333;
                border: none;
                outline: none;
                box-shadow: none;
                margin: 8px 0;
                font-size: 14px;
                letter-spacing: 1px;
                font-weight: 300;
            }

            section .container .user .formBx form input[type='submit'] {
                max-width: 100px;
                background: #677eff;
                color: #fff;
                cursor: pointer;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 1px;
                transition: 0.5s;
            }

            section .container .user .formBx form .signup {
                position: relative;
                margin-top: 20px;
                font-size: 12px;
                letter-spacing: 1px;
                color: #555;
                text-transform: uppercase;
                font-weight: 300;
            }

            section .container .user .formBx form .signup a {
                font-weight: 600;
                text-decoration: none;
                color: #677eff;
            }

            section .container .signupBx {
                pointer-events: none;
            }

            section .container.active .signupBx {
                pointer-events: initial;
            }

            section .container .signupBx .formBx {
                left: 100%;
            }

            section .container.active .signupBx .formBx {
                left: 0;
            }

            section .container .signupBx .imgBx {
                left: -100%;
            }

            section .container.active .signupBx .imgBx {
                left: 0%;
            }

            section .container .signinBx .formBx {
                left: 0%;
            }

            section .container.active .signinBx .formBx {
                left: 100%;
            }

            section .container .signinBx .imgBx {
                left: 0%;
            }

            section .container.active .signinBx .imgBx {
                left: -100%;
            }

            @media (max-width: 991px) {
                section .container {
                    max-width: 400px;
                }

                section .container .imgBx {
                    display: none;
                }

                section .container .user .formBx {
                    width: 100%;
                }
            }
            #reg-btn,#login-btn{
                max-width: 100% !important;
                width: 100%;
            }


        </style>
        <style>
            .google{
                width: 100%;
                height: auto;
                margin: 0px auto;
                border: 1px solid #ccc;
                box-shadow: 3px 3px #888888;
            }
            .span {
                overflow: hidden;
                text-align: center;
                margin: auto 46%;
                font-size: 10px;
            }
            .span:before,
            .span:after {
                background-color: #ccc;
                content: "";
                display: inline-block;
                height: 1px;
                position: relative;
                vertical-align: middle;
                width: 50%;
            }
            .span:before {
                right: 0.5em;
                margin-left: -50%;
            }
            .span:after {
                left: 0.5em;
                margin-right: -50%;
            }
            /* Hide scrollbar for Chrome, Safari and Opera */
            .scrollbar-hidden::-webkit-scrollbar {
                display: none;
            }

            /* Hide scrollbar for IE, Edge add Firefox */
            .scrollbar-hidden {
                -ms-overflow-style: none;
                scrollbar-width: none; /* Firefox */
            }
            body {

                overflow-y: hidden;
                overflow-x: hidden;
            }
            #hide{
                display:none !important;
            }
        </style>
        <style>
            #modal-dial{
                width: 80%;
                height: 50%;

            }
            #modal-cont{
                height: 170%;
            }
            #modal-header{
                padding: 8px;
                border: none;
            }
            iframe{

                width: 100%;
                height: 530px;
                border: none;
                position: inherit;
                margin-top: -26px;

            }
            @media only screen and (max-width: 767px){
                #modal-cont{
                    height: 140%;
                    width: 118%;
                } 
            }
        </style>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132492546-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-132492546-1');
        </script>
        <script>
            var m = document.createElement('meta');
            m.name = 'theme-color';
            m.content = '#ddbb00';
            document.head.appendChild(m);
        </script>
    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTSDJN4"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <!--header menu wrapper-->

        <!--stick menu_fixed -->
        <div class="menu_wrapper header-area hidden-menu-bar stick stick menu_fixed">
            <div class="container">

                <div class="menu_wrapper_mn">
                    <div class="row">
                       
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

                            <!--                            <div id="search_button">
                                                            <i class="flaticon-magnifier"></i>
                                                        </div>-->
                            <nav class="navbar hidden-xs">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>

                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse nav_response" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-left" id="nav_filter">
                                        <li role="presentation">
                                            <img src="<?php echo $_SESSION["logo"]; ?>"  id="logo-h" alt="Logo 2" onclick="window.location = '/'">
                                        </li>
                                        <li > <a href="/" role="button">  Home </a>
                                        </li>
                                        <?php
                                        $sql = $main->select("menu", $_SESSION["db_1"]) . $main->where(array("active" => 1, "parent" => 0), "AND") . $main->orderby("ASC", "position");
                                        $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                            $sql2 = $main->select("menu", $_SESSION["db_1"]) . $main->where(array("active" => 1, "parent" => $row["id"]), "AND") . $main->orderby("ASC", "position");
                                            $result2 = $main->adminDB[$_SESSION["db_1"]]->query($sql2);
                                            if ($result2->num_rows > 0) {
                                                echo "<li role=\"presentation\" class=\"dropdown\"> <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"> {$row["mtitle"]} <span class=\"caret\"></span> </a>";
                                                echo "<ul class=\"dropdown-menu\">";
                                                while ($row2 = $result2->fetch_assoc()) {
                                                    if (strcmp($row["title"], "blog") == 0) {
                                                        ?>

                                                        <li><a href="/<?php echo $row2["title"]; ?>"><?php echo $row2["mtitle"]; ?></a></li>
                                                        <?php
                                                    } else {
                                                        ?>

                                                        <li><a href="/<?php echo $row["title"]; ?>/<?php echo $row2["title"]; ?>"><?php echo $row2["mtitle"]; ?></a></li>
                                                        <?php
                                                    }
                                                }
                                                echo "</ul></li>";
                                            } else {
                                                ?>
                                                <li><a href="/<?php echo "" . $row["title"]; ?>"><?php echo $row["mtitle"]; ?></a></li>
                                                <?php
                                            }
                                        }

                                        if (isset($_SESSION["uid"])) {
                                            ?>

                                            <li><a href="/dashboard">DASHBOARD</a></li>
                                            <?php
                                        }
                                        ?>


                                    </ul>
                                </div>
                                <!-- /.navbar-collapse -->
                            </nav>
                            <div class="rp_mobail_menu_main_wrapper visible-xs">
                                <div class="row">
                                    <div class="col-xs-6 header_nav_div">
                                        <a href="/"><img src="<?php echo $_SESSION["logo"]; ?>" alt="Desktop-logo"></a>
                                    </div>

                                    <div class="col-xs-4">

                                    </div>
                                    <div class="col-xs-2">
                                        <div id="toggle">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177"  xml:space="preserve" width="25px" height="25px">
                                            <g>
                                            <g>
                                            <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#000" />
                                            </g>
                                            <g>
                                            <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#000" />
                                            </g>
                                            <g>
                                            <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#000" />
                                            </g>
                                            <g>
                                            <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#000" />
                                            </g>
                                            <g>
                                            <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#000" />
                                            </g>
                                            </g>
                                            </svg>
                                        </div>
                                    </div>

                                </div>
                                <div id="sidebar">
                                    <a href="/"><img src="<?php echo $_SESSION["logo"]; ?>" alt="mobile-logo" ></a>
                                    <div id="toggle_close">&times;</div>
                                    <div id='cssmenu' class="wd_single_index_menu">
                                        <ul>
                                            <?php
                                            if (isset($_SESSION["uemail"])) {
                                                ?>

                                                <li><a href="/dashboard">Dashboard</a></li>
                                                <?php
                                            }
                                            ?>
                                            <li role="presentation"> <a href="/" role="button">  Home </a>
                                            </li>
                                            <li><a href="/booking">Book Now</a></li>
                                            <li><a href="<?= HOSTURL ?>about-us">About</a></li>
                                            <li><a href="<?= HOSTURL ?>Services" >Service</a></li>
                                            <li><a href="<?= HOSTURL ?>blogs">Blog</a></li>
                                            <li><a href="<?= HOSTURL ?>contact">Contact</a></li>
                                            <li><a href="<?= HOSTURL ?>career">Career</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="appointmnt_wrapper hidden-xs hidden-sm">
                                <ul>
                                    <li>
                                        <a href="/booking" class="appint-btn hidden-xs hidden-sm">
                                            <div class="btn-front"><i class="fa fa-calendar"></i>Enquiry Now</div>
                                            <div class="btn-back"><i class="fa fa-calendar"></i>Enquiry Now</div>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--top header end-->
        <!--Slider wrapper Start -->

        <a href="tel:7045671515"><div class="get_call_fixed" data-toggle="modal" data-target="#myModalddd"></div></a>
        <div id="myModal" class="modal fade bg-color-tran" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <div class="modal-body sp_choose_main_wrapper mod" >
                        <div class="sp_choose_heading_main_wrapper">
                            <span class="sli"><span>GET A CALL</span></span>
                        </div>
                        <div id="msg"></div>
                        <form action="#" id="getCall" method="post" onsubmit="return postData('<?php echo $obj->encdata("C_GetCall"); ?>', '#msg', '#getCall')">
                            <div class="form-group">
                                <label>Name <small class="text-danger">*</small></label>
                                <input type="text" name="name" class="form-control" onkeypress="return onlyAlphabetswithspace(event, 1)" id="name" placeholder="Full Name" required="">
                            </div>
                            <div class="form-group">
                                <label>Phone <small class="text-danger">*</small></label>
                                <input type="tel" maxlength="10" name="phone" id="phone" class="form-control" onkeypress="return isNumber(this)" placeholder="Mobile Number" required="">
                            </div>
                            <div class="form-group">
                                <label>Email <small class="text-danger">*</small></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <label>City <small class="text-danger">*</small></label>
                                <input type="text" name="city" id="city" onkeypress="return onlyAlphabetswithspace(event, 1)" class="form-control" placeholder="City" required="">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-custom-black" value="Get Call">
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
        <br><br>

        <div class="sharethis-inline-share-buttons"></div>