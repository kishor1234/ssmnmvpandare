<!--<div class="container">
<div class="row">
 
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-a3f080e0-7204-41a1-8f53-6160cee5b231"></div>
 11883867746.2a46ab3.2a5c67352a2842399135f429939bf8ff
</div>
</div>
//access codebook
https://api.instagram.com/oauth/authorize?client_id=287692795761817&redirect_uri=https://tahaanpestsolutions.com/&scope=user_profile,user_media&response_type=code
{"access_token": "IGQVJVZAGphX0JOaXVFUWc5RHViY042R1c5WVhUaFJOYXBWTEtGSk1VQU9pWnBuR1djX0xlU2tkaGUzQk4zRVhzQmF0OFZABdzd3MVhwYlIySS1Gcm55NWVkazlEWVYyb0c4ZA1c0eFdidjBOdlBmNjFCdEVJWDlfX2tOWWZAB", "user_id": 17841411872395483}
curl -X POST \
  https://api.instagram.com/oauth/access_token \
  -F client_id=287692795761817 \
  -F client_secret=7246ecb9afc1c2c5cba00daf99de1079 \
  -F grant_type=authorization_code \
  -F redirect_uri=https://tahaanpestsolutions.com/ \
  -F code=AQBBRrk4RsSDMeb-OBrxoiyqjqk1aHykfFSMBN5vfuXGmcSHhRebr53oop0AnC-JYvXvIGEeIHuggHPHZBWV5h9egx0kDz99nfoIJPBOTDgiHezKlEzoi7ilfxV8NRX9zFYwHLucCd6B0TF22653iBZv8qoYIOATrc1aiQiuqxDD5C_SCpkAaV-WnlnvhuiXqyRfxOTL8KP6R_imH_3ggukrVmAsj_BdPrqI4Q_68MCQ2g
  
-->

<!---\https://tahaanpestsolutions.com/?code=AQCaA0jvP31IfDuKChJ5gkEFH57PS8SzP7rHjrHpHnFdhzHQGtS3BM0ThH70EpiahiR31HsBOQAtoIeHt-yJ4ViAXg4rv1OTajUhQ-nZIV0GzoCq9_0l5N2bGaQ8V0BnPO8N-UY5fbMQSUX-ez76chQxw0DMUqUvkakrR-c5zuvWRnteem6xeeW5StNI-grt1c8yVieHzSCK-8DrVfPPkAOpq0lx1jvcA_reCxpE1qJ56w#_/-->
<?php
// use this instagram access token generator http://instagram.pixelunion.net/
//$code = "AQBBRrk4RsSDMeb-OBrxoiyqjqk1aHykfFSMBN5vfuXGmcSHhRebr53oop0AnC-JYvXvIGEeIHuggHPHZBWV5h9egx0kDz99nfoIJPBOTDgiHezKlEzoi7ilfxV8NRX9zFYwHLucCd6B0TF22653iBZv8qoYIOATrc1aiQiuqxDD5C_SCpkAaV-WnlnvhuiXqyRfxOTL8KP6R_imH_3ggukrVmAsj_BdPrqI4Q_68MCQ2g";
$short_access_token = "IGQVJXaE83QTFGZAkNjbEs4WU1sNXNfajlZAc3l0by1xOVVuU3JDa01uRk9HamdQMU5OdXRwMTVIR1FTbElpV1BkMkszcllmN1Y0bzl6NTFkS1AxOW12MHNCaGtYMllQTENmWjRtZAmV3RUhZARFVTVThfV2lMRTgwWEtBZAE9V";
$access_token = "IGQVJXUDBUSThSbTBGV1NHVzZAoNmwtSzFhLUx1dzdPSkl1WEswSDZA2cm94aEFWcUcwaVotXzlKV3FVNFF3XzlxX3dwQ0JQWHFuX3BjSmZAtRWJRN0wtYTIxR1U1alVwQWpsNXBVOXV3";
$userid = "17841411872395483";
$client_id = "287692795761817";
$app_secret = "7246ecb9afc1c2c5cba00daf99de1079";
$photo_count = 2;
//$media_id_link = "https://graph.instagram.com/{$userid}?fields=id,username,media&access_token={$access_token}";
//$media = json_decode($main->jsonRespon($media_id_link, array()), true);
//foreach ($media["media"]["data"] as $key => $val) {
//    $single_media = "https://graph.instagram.com/{$val["id"]}?fields=id,media_type,media_url,username,timestamp,caption&access_token={$access_token}";
//    $media = json_decode($main->jsonRespon($single_media, array()), true);
//    print_r($media);
//}
//print_r($media["media"]["data"]);
//die;
//$app_secret = "7246ecb9afc1c2c5cba00daf99de1079";
//GET graph.facebook.com/17962790374324327?fields=id,media_type,media_url,owner,timestamp
//$json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
//$json_link.="access_token={$access_token}&count={$photo_count}";

$json_link = "https://graph.instagram.com/{$userid}?fields=id,media_type,media_url,username,timestamp&access_token={$access_token}";
//echo "https://api.instagram.com/v1/media/17962790374324327?access_token={$access_token}";
////$json_link = "https://graph.instagram.com/{$access_token}?grant_type=ig_exchange_token&client_secret={$app_secret}&access_token={short-lived-access-token}";
//$json_link = "https://api.instagram.com/oauth/authorize?client_id={$client_id}&redirect_uri=https://tahaanpestsolutions.com/&scope=user_profile,user_media&response_type={$code}";
//echo $json_link;
//echo $json = file_get_contents($json_link);
//$obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
//print_r($obj);
//die;
//caption code
//https://graph.instagram.com/17882730505653743?fields=id,media_type,media_url,username,timestamp,caption&access_token=IGQVJXaE83QTFGZAkNjbEs4WU1sNXNfajlZAc3l0by1xOVVuU3JDa01uRk9HamdQMU5OdXRwMTVIR1FTbElpV1BkMkszcllmN1Y0bzl6NTFkS1AxOW12MHNCaGtYMllQTENmWjRtZAmV3RUhZARFVTVThfV2lMRTgwWEtBZAE9V
//long access token
//echo "https://graph.instagram.com/access_token?grant_type=ig_exchange_token&client_secret={$app_secret}&access_token={$access_token}"
/* {
  "access_token": "IGQVJXUDBUSThSbTBGV1NHVzZAoNmwtSzFhLUx1dzdPSkl1WEswSDZA2cm94aEFWcUcwaVotXzlKV3FVNFF3XzlxX3dwQ0JQWHFuX3BjSmZAtRWJRN0wtYTIxR1U1alVwQWpsNXBVOXV3",
  "token_type": "bearer",
  "expires_in": 5184000
  } */
?>

<!--<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <meta content="width=device-width, initial-scale=1.0" name="viewport" />-->
<!--        <link href="assets/ig/css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/ig/css/bootstrap/bootstrap-grid.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/ig/css/bootstrap/bootstrap-reboot.min.css" rel="stylesheet" type="text/css"/>-->

<link href="assets/ig/css/lightgallery/lightgallery.css" rel="stylesheet" type="text/css"/>
<!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
        <link href="assets/ig/css/custome.css" rel="stylesheet" type="text/css"/>-->
<!--    </head>
    <body >-->
<div class=" sp_choose_heading_main_wrapper">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="video_sec_icon_wrappe" >
                    <br>
                    <h2><span>Follow us on Instagram <a href="https://www.instagram.com/tahaanps/" target="blank">#tahaanps</a></span></h2>
                    
                    <br>
                    <div class="blog_wrapper_catt sidebar_widget" >
                        <?php
                        
                        if (!isset($_SESSION["ifeed"])) {
                            $_SESSION["ifeed"] = array();
                            $link = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token={$access_token}";
                            json_decode($main->jsonRespon($link, array()), true);
                            $media_id_link = "https://graph.instagram.com/{$userid}?fields=id,username,media&access_token={$access_token}";
                            $media = json_decode($main->jsonRespon($media_id_link, array()), true);


                            foreach ($media["media"]["data"] as $key => $val) {
                                $single_media = "https://graph.instagram.com/{$val["id"]}?fields=id,media_type,media_url,username,timestamp,caption,permalink,thumbnail_url&access_token={$access_token}";
                                $medias = json_decode($main->jsonRespon($single_media, array()), true);
                                array_push($_SESSION["ifeed"], $medias);
                            }
                        }
                        ?>
                        <style>
                            .container-fluid {
                                width: 100%  !important;
                                padding: 0px !important;
                                margin: 0px !important;
                            }
                            #animated-thumbnials{
                                /*position: fixed !important;*/
                                padding: 0px !important;
                                margin: 0px !important;
                                left: 0 !important;
                                right: 0px !important;
                            }
                            #animated-thumbnials .col-lg-3{
                                margin: 0px !important;
                                padding: 0px !important;
                            }
                            #animated-thumbnials a img{

                                width: 100% !important;
                                height: auto !important;
                                padding: 0px !important;
                                margin:0px !important;
                                margin-right: -4px !important;
                            }
                        </style>
                        <div  id="animated-thumbnials" class="row">
                            <?php
                            $i = 1;
                            foreach ($_SESSION["ifeed"] as $key => $val) {

                                switch ($val["media_type"]) {
                                    case "IMAGE":
                                        ?>
                                        <a class="col-lg-3" data-toggle="lightbox" data-gallery="mixedgallery" href="<?= $val["media_url"] ?>">
                                            <img src="<?= $val["media_url"] ?>"  />
                                        </a> 
                                        <?php
                                        break;
                                    case "VIDEO":
                                        ?>
                                        <a class="col-lg-3" data-toggle="lightbox" data-gallery="mixedgallery" href="<?= $val["thumbnail_url"] ?>">
                                            <img src="<?= $val["thumbnail_url"] ?>" />
                                        </a> 
                                        <?php
                                        break;
                                        default:
                                        break;
                                }

                                if ($i == 8) {
                                    break;
                                }
                                $i++;
                            }
                            ?>

                        </div>


                    </div>
                    <center>
                        <a href="https://www.instagram.com/tahaanps/" target="blank" class="appint-btn hidden-xs hidden-sm">
                                            <div class="btn-front"><i class="fa fa-instagram"></i> Follow Us</div>
                                            <div class="btn-back"><i class="fa fa-instagram"></i> Follow Us</div>

                                        </a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
                <!--        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="assets/ig/js/bootstrap/bootstrap.js" type="text/javascript"></script>-->
                <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<script src="assets/ig/js/lightgallery/lightgallery.js" type="text/javascript"></script>
<script src="assets/ig/js/lightgallery/lg-video.min.js" type="text/javascript"></script>
<script src="assets/ig/js/lightgallery/lg-fullscreen.min.js" type="text/javascript"></script>
<script src="assets/ig/js/lightgallery/lg-hash.min.js" type="text/javascript"></script>
<script src="assets/ig/js/lightgallery/lg-pager.min.js" type="text/javascript"></script>
<script src="assets/ig/js/lightgallery/lg-share.min.js" type="text/javascript"></script>
<script src="assets/ig/js/lightgallery/lg-thumbnail.min.js" type="text/javascript"></script>
<script src="assets/ig/js/lightgallery/lg-video.min.js" type="text/javascript"></script>
<script src="assets/ig/js/lightgallery/lg-zoom.min.js" type="text/javascript"></script>
<script>
    // MDB Lightbox Init https://github.com/sachinchoolur/lightgallery.js/
    lightGallery(document.getElementById('animated-thumbnials'), {
        thumbnail: true,
        animateThumb: true,
        showThumbByDefault: true,
        videojs: true
    });
</script>
<!--
    </body>
</html>-->
<!-- video section End -->
