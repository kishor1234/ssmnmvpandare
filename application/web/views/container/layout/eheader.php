<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!-->
<?php
$uri = $_SERVER['REQUEST_URI'];
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url2 = urlencode($url); // Outputs: Full URL
$title = "";
$cat = "";
$img = HOSTURL . "favicon.png";
try {
    if (isset($_REQUEST["c"])) {
        $sql = $main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("id" => $obj->decdata($_REQUEST["c"])));
        $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
        $r = $result->fetch_assoc();
        $title = $r["title"];
        $cat = $r["category"];
        //$img = $r["img"];
        $desc = $r["title"];
    } else {
        if (isset($_REQUEST["v"])) {
            $title = $_REQUEST["v"];
        } else {
            $title = "Mumbai";
        }
        $cat = $_SESSION["collegename"];
        //$img = $_SESSION["logo"];
        $desc = "Over the years pest management has gained significant importance providing 100% satisfactory results. " . rand(0, 99);
    }
} catch (Exception $ex) {
    
}
?>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>TPS | <?php echo $title; ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta property="og:url"                content="<?php echo $url; ?>" />
        <meta property="og:type"               content="<?php echo $cat; ?>" />
        <meta property="og:title"              content="<?php echo $title; ?>" />
        <meta property="og:description"        content="<?php echo $desc; ?>" />
        <meta property="og:image"              content="<?php echo $img; ?>" />
        <meta property="og:keywords" content="bed bugs,bed bug bites,termites,bed bug,pest control,bed bugs bites,termite,rats,bedbugs,bugs,exterminator,mice,mosquito repellent,mouse trap,how to kill bed bugs,fumigation, Mumbai Best Pest control"/>
        <meta name="description" content="<?php echo $desc; ?>"/>
        <meta name="author" content="">  
        <link rel="shortcut icon" href="favicon.png"> 
        <meta name="author" content="http://aasksoft.co.in/">
        <link rel="canonical" href="<?php echo $url; ?>">
        <meta name="copyright" content='Tahaan Pest Solutions'>
        <meta name="MobileOptimized" content="320" />
        <!--start theme style -->
        <!--        <link rel="stylesheet" type="text/css" href="assets/html/css/animate.css">-->
        <link rel="stylesheet" type="text/css" href="assets/html/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/html/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/html/css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="assets/html/css/owl.theme.default.css">
        <link rel="stylesheet" type="text/css" href="assets/html/css/flaticon.css">
        <!--        <link rel="stylesheet" type="text/css" href="assets/html/css/magnific-popup.css">
                <link rel="stylesheet" type="text/css" href="assets/html/venobox/css/venobox.css" />
                <link rel="stylesheet" type="text/css" href="assets/html/css/owl.theme.default.css">
                <link rel="stylesheet" type="text/css" href="assets/html/css/flaticon.css">
                <link rel="stylesheet" type="text/css" href="assets/html/css/fonts.css" />
                <link rel="stylesheet" type="text/css" href="assets/html/js/plugin/rs_slider/layers.css" />
                <link rel="stylesheet" type="text/css" href="assets/html/js/plugin/rs_slider/navigation.css" />
                <link rel="stylesheet" type="text/css" href="assets/html/js/plugin/rs_slider/settings.css" />-->

        <link rel="stylesheet" type="text/css" href="assets/html/css/fonts.css" />
        <link rel="stylesheet" type="text/css" href="assets/html/css/style.css" />
        <link rel="stylesheet" type="text/css" href="assets/html/css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="assets/html/css/custome.css" />
        <!-- favicon link-->
        <link rel="shortcut icon" type="image/icon" href="favicon.ico" />
        <style>

        </style>
    </head>

    <body>


