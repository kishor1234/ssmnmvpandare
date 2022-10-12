<?php
// $main->isLoadView("VClientLogo", false, array());
?>
 <!--Trigger the modal with a button--> 
 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="login_button_id" data-target="#mylogin">Open Modal</button>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<script src="/assets/plugins/form/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="/assets/plugins/form/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/plugins/form/additional-methods.min.js" type="text/javascript"></script>
<!-- Modal -->
<div class="modal fade" id="mylogisn" role="dialog">
    <div class="modal-dialog" id="modal-dial">

        <!-- Modal content-->
        <div class="modal-content" id="modal-cont" >
            <div class="modal-header" id="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <section>

                    <div class="container <?= $active ?>" id="containermodal">

                        <div class="user signinBx">
                            <div class="imgBx">
                                <img src="/assets/images/user/image1.jpeg" alt=""/>    
                            </div>
                            <div class="formBx">
                                <form  id="myLoginForm" name="myLoginForm" onsubmit="return false;">

                                    <a class="login-btn" href="<?= $main->google->createAuthUrl(); ?>">
                                        <img src="/assets/images/google.webp" class="google" alt="Google-login"/>

                                    </a>
                                    <span class="span">OR</span>
                                    <h2>Sign In</h2>
                                    <div class="msg2 error">
                                        <?= $msg ?>
                                    </div>
                                    <input type="email" name="email" id="email" placeholder="Email" />
                                    <input type="password" name="password" id="password" placeholder="Password" />
                                    <input type="submit" id="login-btn" value="Login" />
                                    <p class="signup" id="<?= $_REQUEST["c"] ?>">
                                        <a href="/forgot" >Lost your password?</a>
                                    </p>
                                    <p class="signup">
                                        Don't have an account ?
                                        <a href="#" onclick="toggleForm();">Sign Up.</a>
                                    </p>
                                    <p class="signup" id="<?= $_REQUEST["c"] ?>">
                                        <a href="<?= HOSTURL ?>">Home Page</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <div class="user signupBx">
                            <div class="formBx">
                                <form action="" id="myRegForm" onsubmit="return false;">
                                    <a class="login-btn" href="<?= $main->google->createAuthUrl(); ?>">
                                        <img src="/assets/images/google.webp" class="google" alt="Google-login"/>

                                    </a>
                                    <span class="span">OR</span>
                                    <h2>Create an account</h2>
                                    <div class="msg error">
                                        <?= $msg ?>
                                    </div>
                                    <input type="email" id="email" name="email" placeholder="Email Address" value="<?= $email ?>" />
                                    <div id="error_email" class="valid-feedback"></div>
                                    <input type="tel" id="mobile" name="mobile" placeholder="Mobile Number" />
                                    <div id="error_mobile" class="valid-feedback"></div>
                                    <input type="password" id="spassword" name="password" placeholder="Create Password" />
                                    <div id="error_password" class="valid-feedback"></div>
                                    <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm Password" />
                                    <div id="error_password_confirm" class="valid-feedback"></div>
                                    <input type="hidden" id="gid" name="gid" value="<?= $gid ?>" />
                                    <input type="submit"  id="reg-btn" value="Sign Up" />
                                    <p class="signup">
                                        Already have an account ?
                                        <a href="#" onclick="toggleForm();">Sign in.</a>
                                    </p>
                                    <p class="signup" id="<?= $_REQUEST["c"] ?>">
                                        <a href="<?= HOSTURL ?>">Home Page</a>
                                    </p>
                                </form>
                            </div>
                            <div class="imgBx">
                                <img src="/assets/images/user/image1.jpeg" alt=""/>
                            </div>
                        </div>
                    </div>
                </section>
                <script>
                    const toggleForm = () => {
                        const container = document.querySelector('#containermodal');
                        container.classList.toggle('active');
                    };
                    $(function () {
                        $('#myRegForm').validate({// initialize the plugin
                            rules: {

                                email: {
                                    required: true,
                                    email: true
                                },
                                mobile: {
                                    required: true,
                                    maxlength: 10,
                                    minlength: 10,
                                    number: true
                                },
                                password: {
                                    required: true,
                                    minlength: 5
                                },
                                password_confirm: {
                                    required: true,
                                    minlength: 5,
                                    equalTo: "#spassword"
                                }
                            },
                            submitHandler: function (form) { // for demo
                                $("#reg-btn").val("Please wait ...");
                                var formdata = new FormData($(form)[0]);
                                $.ajax({
                                    type: 'POST',
                                    url: '/createuser',
                                    data: formdata,
                                    contentType: false,
                                    processData: false,
                                    xhr: function () {
                                        //progressShow();
                                        var xhr = new XMLHttpRequest();
                                        xhr.upload.addEventListener('progress', function (e) {
                                            var progressbar = Math.round((e.loaded / e.total) * 100);
                                            //$("#inner-progress").css('width', progressbar + '%');
                                            $("#reg-btn").html("Please Wait... " + progressbar + '%');
                                        });
                                        return xhr;
                                    },
                                    success: function (objString) {
                                        console.log(objString);
                                        var obj = JSON.parse(objString);
                                        if (obj.status === 1)
                                        {
                                            printMessage(obj.message, "success", ".msg");
                                            $(form)[0].reset();
                                            var next = getUrlParameter('?next');
                                            if (next) {
                                                var url = "/verify/" + obj.token + "/?next=" + next;
                                                setTimeout(function () {
                                                    window.location.replace(url);
                                                }, 1000);
                                                //                                             window.location.search.substring(0)
                                            }
                                            // window.location.replace("/verify/" + obj.token)
                                            //gcaptch();
                                        } else {
                                            printMessage(obj.message, "danger", ".msg");
                                            $(form)[0].reset();
                                            //gcaptch();
                                        }
                                        $("#reg-btn").val("Sign Up");
                                    },
                                    error: function (request, status, error) {
                                        printMessage("Please try agin after sometime", "danger", ".msg");
                                        $(form)[0].reset();
                                        $("#reg-btn").val("Sign Up");
                                        //   gcaptch();
                                    }
                                });
                                return false; // for demo
                            }
                        });

                    });
                    $(function () {

                        $('#myLoginForm').validate({// initialize the plugin
                            rules: {

                                email: {
                                    required: true,
                                    email: true
                                },
                                password: {
                                    required: true
                                }
                            },
                            submitHandler: function (form) { // for demo
                                $("#login-btn").val("Please wait ...");
                                var formdata = new FormData($(form)[0]);
                                $.ajax({
                                    type: 'POST',
                                    url: '/account',
                                    data: formdata,
                                    contentType: false,
                                    processData: false,
                                    xhr: function () {
                                        //progressShow();
                                        var xhr = new XMLHttpRequest();
                                        xhr.upload.addEventListener('progress', function (e) {
                                            var progressbar = Math.round((e.loaded / e.total) * 100);
                                            //$("#inner-progress").css('width', progressbar + '%');
                                            $("#login-btn").html("Please Wait... " + progressbar + '%');
                                        });
                                        return xhr;
                                    },
                                    success: function (objString) {
                                        console.log(objString);
                                        var obj = JSON.parse(objString);
                                        if (obj.status === 1)
                                        {
                                            printMessage(obj.message, "success", ".msg2");
                                            $(form)[0].reset();
                                            if (obj.url !== "/login") {
                                                var next = getUrlParameter('?next');
                                                var snext = "<?= $_SESSION["next"] ?>";
                                                if (snext) {
                                                    next = snext;
                                                }
                                                if (next) {
                                                    obj.url = "/" + next;

                                                }
                                                setTimeout(function () {
                                                    window.location.replace(obj.url);
                                                }, 1000);

                                            }
                                            //alert(obj.url);
                                            //gcaptch();
                                        } else {
                                            printMessage(obj.message, "danger", ".msg2");
                                            $(form)[0].reset();
                                            //gcaptch();
                                        }
                                        $("#login-btn").val("Login");
                                    },
                                    error: function (request, status, error) {
                                        printMessage("Please try agin after sometime", "danger", ".msg");
                                        $(form)[0].reset();
                                        $("#login-btn").val("Login");
                                        //   gcaptch();
                                    }
                                });
                                return false; // for demo
                            }
                        });

                    });
                    function printMessage(message, clas, display)
                    {
                        var m = '<div class="alert alert-' + clas + ' text-center"><strong>' + message +
                                '</strong></div>';
                        $(display).html(m);
                    }
                    var getUrlParameter = function getUrlParameter(sParam) {
                        var sPageURL = window.location.search.substring(0),
                                sURLVariables = sPageURL.split('&'),
                                sParameterName,
                                i;

                        for (i = 0; i < sURLVariables.length; i++) {
                            sParameterName = sURLVariables[i].split('=');

                            if (sParameterName[0] === sParam) {
                                return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                            }
                        }
                        return false;
                    };
                </script>
            </div>

        </div>

    </div>
</div>

<div id="myPopupModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
            <div class="modal-body sp_choose_main_wrapper mod" >
                <div class="sp_choose_heading_main_wrapper">
                    <h3 class="sli"><span><strong>Book Now</strong></span></h3>
                </div>
                <div class="col-lg-10 col-lg-offset-1">
                    <form class="form-horizontal" id="contactform" action="javascript:void(0)" method="post" onsubmit="return postData('<?php echo $obj->encdata("C_AdBook"); ?>', '.msgs', '#contactform')">
                        <div class="form-group ">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                                <input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" id="date" data-title="Date" name="cdate"   required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <input type="text" class="form-control"  id="exampleName" data-title="Plese Enter Valid Name" placeholder="Name" name="name"  onkeypress="return onlyAlphabetswithspace(event, 1)" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <input type="email" class="form-control"  id="exampleemail" placeholder="Email" name="email"  required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" id="examplePhone"  placeholder="Phone" name="mobile"  maxlength="10" onkeypress="return isNumber(event, 1)" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-server" aria-hidden="true"></i></div>
                                <select class="form-control" onchange="selectBranch('#dis', '<?php echo $obj->encdata("C_GetBranch"); ?>')" id="ourservices" name="ourservices" required >
                                    <option value="">Select Services</option>
                                    <?php
                                    $result = $main->adminDB[$_SESSION["db_1"]]->query($main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Services")));
                                    while ($services = $result->fetch_assoc()) {
                                        echo "<option value=" . $services["id"] . " >" . $services["title"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-braille" aria-hidden="true"></i></div>
                                <input type="text" class="form-control"  id="branch" name="branch" data-title="Branch" placeholder="Branch Name"  onkeypress="return onlyAlphabetswithspace(event, 1)" required  readonly/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-area-chart" aria-hidden="true"></i></div>&nbsp;&nbsp;
                                <input type="radio" name="area" required value="Residential">&nbsp;&nbsp;Residential&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="area" required value="Commercial">&nbsp;&nbsp;Commercial
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-comment" aria-hidden="true"></i></div>
                                <textarea class="form-control" rows="2"  name="message" id="message" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="msg"></div>
                            <div class="quick_btn">
                                <button type="submit" id="sendbtn" class="btn btn-warning black"><i class="fa fa-paper-plane"></i> Send </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
<!--End popup-->
<div class="footer_wrapper pst_toppadder70 pst_bottompadder60">
    <div class="container">
        <div class="footer_wrapper_first">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-4">
                    <div class="wrapper_first_icon foter_contact_nav">
                        <ul>
                            <li>
                                <i class="fa fa-certificate fa-4x"></i>
                                <a href="javascript:void(0)">
                                    <p>We have more than <br>
                                        2 decades of experience <br>
                                        in School</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-4">
                    <div class="wrapper_first_icon foter_contact_nav">
                        <ul>
                            <li>
                                <i class="fa fa-building"></i>
                                <a href="javascript:void(0)">
                                    <p>
                                        Treated more than <br>
                                        35,000 kids <br>
                                        for good education.
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-4">
                    <div class="wrapper_first_icon foter_contact_nav">
                        <ul>
                            <li>
                                <i class="fa fa-phone "></i>
                                <a href="javascript:void(0)">
                                    <p>
                                        <?php
                                        $result = $main->adminDB[$_SESSION["db_1"]]->query($main->select("hf_branch", $_SESSION["db_1"]));
                                        while ($branch = $result->fetch_assoc()) {
                                            echo $branch["blocation"] . " :<br> +91" . $branch["contact"] . "<br>";
                                        }
                                        ?>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
                    <div class="wrapper_first_icon foter_contact_nav">
                        <ul>
                            <li>
                                <i class="fa fa-industry"></i>
                                <a href="javascript:void(0)">
                                    <p>
                                        Serving the <br>
                                        commercial capital <br>
                                        of India since 1999
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer_wrapper_second">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="wrapper_second_about">
                        <h4>Office</h4>
                        <!--<div class="wrapper_first_image pst_bottompadder40">
                            <a href="index.html"><img src="images/foter_logo.png" class="img-responsive" alt="logo" /></a>
                        </div>-->
                        <div class="abotus_content">
<!--                            <p>Tahaan Pest Solutions & Fumigations is one of the immersing Pest Control agencies in India.
                                We offer professional quality pest management services results since the last <?php //echo date("Y") - 1999;                                           ?>  years.</p>-->
                            <div class="about_info">
                                <p><button class="btn btn-custom btn-sm"><i class="fa fa-map-marker" aria-hidden="true"></i></button> <?= $_SESSION["address1"] ?></p>
                                <p><button class="btn btn-custom btn-sm"><i class="fa fa-envelope" aria-hidden="true"></i></button><a class="white" href="mailto:info@ssmnmvpandare.edu.in" data-title="mail"> info@ssmnmvpandare.edu.in</a></p>
                                <p><button class="btn btn-custom btn-sm"><i class="fa fa-phone" aria-hidden="true"></i></button><a class="white"  href="tel:+91124567890" data-title="call"> +91124567890</a></p>
                            </div>
                        </div>
                        <div class="aboutus_social_icons">
                            <ul>
                                <li><a href="https://www.facebook.com/ssmnmvpandare"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="https://twitter.com/ssmnmvpandare"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="https://www.linkedin.com/company/ssmnmvpandare"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </li>
                                <li> <a href="https://www.instagram.com/ssmnmvpandare/"><i class="fa fa-instagram" aria-hidden="true"></i> </a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
                    <div class="wrapper_second_useful">
                        <h4>Our Services</h4>
                        <?php
                        $result = $main->adminDB[$_SESSION["db_1"]]->query($main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Services")));
                        $flag = true;
                        $right = array();
                        $left = array();
                        while ($row = $result->fetch_assoc()) {
                            array_push($right, $row["title"]);
                        }
                        ?>
                        <ul>
                            <?php
                            foreach ($right as $val) {
                                ?>
                                <li><a href="/Services/<?php echo strtolower(str_replace(" ", "-", $val)); ?>" title="<?= $val ?>" target="blank"><?php echo $val; ?></a></li>

                                <?php
                            }
                            ?>

                        </ul>

                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-6">
                    <div class="wrapper_second_useful">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="/"> Home</a></li>
                            <li><a href="<?= HOSTURL ?>about-us">About us</a></li>
                            <li><a href="<?= HOSTURL ?>academics">Academics</a></li>
                            <li><a href="<?= HOSTURL ?>committees">Committees</a></li>
                            <li><a href="<?= HOSTURL ?>admissions">Admissions</a></li>
                            <li><a href="<?= HOSTURL ?>contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
                    <div class="wrapper_second_useful wrapper_second_useful_2">
                        <h4>Singn up Newsletter</h4>
                        <span id="display"></span>
                        <form action="#" method="post" id="newsletters" onsubmit="return postData('<?php echo $obj->encdata("C_Newsletter"); ?>', '#display', '#newsletters')" class="newsletter">
                            <div class="input-group">
                                <input type="email" name="email" id="emails" required="" class="form-control" placeholder="Enter Email Address">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                </span> </div>
                            <!-- /input-group -->
                        </form>

                        <p class="justify">Get latest updates and news on how to control pest.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section3_bottom_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-xs-10 col-sm-10">
                <div class="section3_copyright">
                    <p> <a href="/privacypolicy">Privacy Policy</a> | <a href="/termsandconditions">Terms & Conditions</a> | Copyright 2018 <a href="/">  <?= $_SESSION["collegename"] ?> </a>. all right reserved - design by <a href="https://aasksoft.com/">@askSoft</a></p>
<!--                    <p class="footer">Memory Useage in <strong>{memory_usage}</strong>Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>-->
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <div class="close_wrapper">

                    <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up"></i>top</a>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://wa.me/917045671515" class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>

<!--</div>-->
<!--/Wrapper End--> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 


<!-- Include all compiled plugins (below), or include individual files as needed --> 
<!--<script src="assets/html/js/jquery_min.js"></script>
<script src="assets/html/js/bootstrap.min.js"></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
<!--<script src="assets/html/js/isotope.pkgd.min.js"></script>
<script src="assets/html/venobox/js/venobox.min.js"></script>
<script src="assets/html/js/jquery.easypiechart.min.js"></script>
<script src="assets/html/js/jquery.inview.min.js"></script>
<script src="assets/html/js/jquery.mixitup.min.js"></script>
<script src="assets/html/js/jquery.magnific-popup.js" type="text/javascript"></script>
<script src="assets/html/js/jquery.countTo.js"></script>
<script src="assets/html/js/wow.min.js"></script>-->
<!--<script src="assets/html/js/owl.carousel.js"></script>
<!--<script src="assets/html/js/plugin/rs_slider/jquery.themepunch.revolution.min.js"></script>
<script src="assets/html/js/plugin/rs_slider/jquery.themepunch.tools.min.js"></script>
<script src="assets/html/js/plugin/rs_slider/revolution.addon.snow.min.js"></script>
<script src="assets/html/js/plugin/rs_slider/revolution.extension.actions.min.js"></script>
<script src="assets/html/js/plugin/rs_slider/revolution.extension.carousel.min.js"></script>
<script src="assets/html/js/plugin/rs_slider/revolution.extension.kenburn.min.js"></script>
<script src="assets/html/js/plugin/rs_slider/revolution.extension.layeranimation.min.js"></script>
<script src="assets/html/js/plugin/rs_slider/revolution.extension.migration.min.js"></script>
<script src="assets/html/js/plugin/rs_slider/revolution.extension.navigation.min.js"></script>
<script src="assets/html/js/plugin/rs_slider/revolution.extension.parallax.min.js"></script>
<script src="assets/html/js/plugin/rs_slider/revolution.extension.slideanims.min.js"></script>
<script src="assets/html/js/plugin/rs_slider/revolution.extension.video.min.js"></script>
<script src="assets/html/js/plugin/rs_slider/revolution.addon.slicey.min.js"></script>-->
<!--<script src="assets/html/js/custom.js"></script>-->
<!--<script src="assets/main.js"></script>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>-->

<script>

    $(document).ready(function () {

        setInterval(function () {
            $("img:not([alt])").attr("alt", "image alt");
        }, 1000);
        setInterval(function () {
            $("link:not([hreflang])").attr("hreflang", "en-us");
        }, 1000);
        $('img').mousedown(function (e) {
            if (e.button == 2) { // right click
                return false; // do nothing!
            }
        });

        setTimeout(function () {
            var id = '<?= $_SESSION["uid"] ?>';
            if (!id)
            {
                $('#login_button_id').trigger('click');
            } 
        }, 20000);

        //$("img:not([alt])").attr("alt", "Image");
        //setInterval(function(){ $("#wh-widget-send-button-wrapper").css("display", "none"); }, 3000);
        $("#style-switcher").animate({
            left: "-215px"
        });
        var username = getCookie("username");
        if (username.localeCompare("aasksoft") === 0) {
            //$("#myPopupModal").modal('show');
        } else {

            if (username.localeCompare("") === 0) {
                //$("#myPopupModal").modal('show');
                setCookie("username", "aasksoft", 365);
            } else {
                // $("#myPopupModal").modal('show');
                console.log("Null " + username);
            }
        }
        $('.colorchange').on('click', function () {

            var color_name = $(this).attr('id');
            var new_style = 'assets/html/css/color/' + color_name + '.css';
            $.post("/?r=C_ChangeTheam", {thm: new_style}, function (da) {
            });
            $('#theme-color').attr('href', new_style);


        });
        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ')
                    c = c.substring(1);
                if (c.indexOf(name) == 0)
                    return c.substring(name.length, c.length);
            }
            return "";
        }
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
    });
</script>
<script>
    function onLoading()
    {
        $("#cover").show();
        $(".msg").html("<div  id='center'><img src='logo.gif' class='w100' /><h4 class='black'><strong>Please Wait.!</strong></h4></div>");
    }
    function load() {
        $("#cover").show();
        return "<div  id='center'><img src='logo.gif' class='w100' /><h4 class='black'><strong>Please Wait.!</strong></h4></div>";

    }

    function offLoading()
    {
        $(".msg").html("");
        $("#cover").hide();
    }
    function popup()
    {
        $("#myPopupModal").modal('show');
    }
    function Load(msg)
    {

        $(msg).html("<div  id='center'><img src='logo.gif' class='w100' /><h4 class='black'><strong>Please Wait.!</strong></h4></div>");
    }
    function unLoad(msg)
    {
        $(msg).html("");

    }

    function selectBranch(display, file)
    {
        Load(display);
        $.post("/?r=" + file, {id: $("#ourservices").val()}, function (data) {
            unLoad(display);
            var obj = JSON.parse(data);
            switch (obj.status)
            {
                case 1:
                    $("#branch").val(obj.val);
                    $("#sendbtn").show();
                    break;
                default:
                    alert(obj.msg);
                    $("#sendbtn").hide();
                    break;
            }

        });
        return false;
    }
    function sendAjax(file, display)
    {
        onLoading();
        //$(display).html(file);
        $.post("/?r=" + file, {}, function (data) {
            $(display).html(data);
        });
        offLoading();
    }
    $(function () {
// Multiple images preview in browser
        var imagesPreview = function (input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);

                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function () {
            imagesPreview(this, 'div.gallery');
        });
    });
    function callcalc()
    {
        var location = $("#location").val();
        var area = $("#area").val();
        var pest = $("#pest").val();
        var type = $("#type").val();
        $.post("/?r=<?php echo $obj->encdata("C_CalcPrice"); ?>", {location: location, area: area, pest: pest, type: type}, function (data) {

            $("#price").html(data);
        });
    }
    function uploadEvent(file, display, form)
    {
        var form_data = new FormData($(form)[0]);
        onLoading();
        $.ajax({
            type: "POST",
            url: '/?r=' + file,
            data: form_data, //$("#studetnReg").serialize(), // serializes the form's elements.,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data)
            {
                offLoading();
                printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', ".msg");
                $(display).html(data);
                $(form)[0].reset();
                $(".gallery").html("");
            }});


        return false;
    }
    function printMessage(file, display)
    {
        $.post("/?r=" + file, {}, function (data) {
            $(display).html(data);
        });
    }
    function openAjaxURL(file, display)
    {
        onLoading();
        $.post("/?r=" + file, {id: 1}, function (data) {
            offLoading();
            $(display).html(data);
            $(".msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', ".msg");

            if (typeof (history.pushState) != "undefined") {
                var obj = {Title: "Title", Url: "<?php echo HOSTURL; ?>" + "?r=" + file + "1"};
                history.pushState(obj, obj.Title, obj.Url);
                //$.session.set("historyurl", "<php //echo HOSTURL;                                                            ?>" + "?r=" + file + "1");
            } else {
                alert("Browser does not support HTML5.");
            }
            // history.pushState(obj, obj.Title, obj.Url);
        });
        return false;
    }
    function openAjaxButton(file, display, modal)
    {

        onLoading();
        $.post("/?r=" + file, {id: 1}, function (data) {
            offLoading();
            dissmiss(modal);
            $(display).html(data);
            $(".msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', ".msg");

            if (typeof (history.pushState) != "undefined") {
                var obj = {Title: "Title", Url: "<?php echo HOSTURL; ?>" + "?r=" + file + "1"};
                history.pushState(obj, obj.Title, obj.Url);
                location.reload();
            } else {
                alert("Browser does not support HTML5.");
            }
            // history.pushState(obj, obj.Title, obj.Url);
        });
        return false;
    }
    function openAjaxRld(file, display, modal, id)
    {

        onLoading();

        $.post("/?r=" + file, {loanaccountno: id}, function (data) {
            offLoading();
            dissmiss(modal);
            $(display).html(data);
            $(".msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', ".msg");

            if (typeof (history.pushState) != "undefined") {
                var obj = {Title: "Title", Url: "<?php echo HOSTURL; ?>" + "?r=" + file + "1"};
                history.pushState(obj, obj.Title, obj.Url);
                location.reload();
            } else {
                alert("Browser does not support HTML5.");
            }
            // history.pushState(obj, obj.Title, obj.Url);
        });
        return false;
    }
    function openAjaxButton2(file, display, odata, modal)
    {

        onLoading();
        $.post("/?r=" + file, {id: 1}, function (data) {
            offLoading();
            dissmiss(modal);
            $(display).html(data);
            $(".msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', ".msg");

            if (typeof (history.pushState) != "undefined") {
                var obj = {Title: "Title", Url: "<?php echo HOSTURL; ?>" + "?r=" + file + "1"};
                history.pushState(obj, obj.Title, obj.Url);
                location.reload();
            } else {
                alert("Browser does not support HTML5.");
            }
            // history.pushState(obj, obj.Title, obj.Url);
        });
        return false;
    }
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;

        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            //alert("Only Number Accept");
            return false;
        }
        return true;
    }
    function onlyAlphabets(e, t) {
        try {
            if (window.event) {
                var charCode = window.event.keyCode;
            } else if (e) {
                var charCode = e.which;
            } else {
                return true;
            }
            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                return true;
            else
                return false;
        } catch (err) {
            alert(err.Description);
        }
    }
    function onlyAlphabetswithspace(e, t) {
        try {
            if (window.event) {
                var charCode = window.event.keyCode;
            } else if (e) {
                var charCode = e.which;
            } else {
                return true;
            }
            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 32)
                return true;
            else
                return false;
        } catch (err) {
            alert(err.Description);
        }
    }
    function postDataWithValidationform(file, display, form, validation, file2)
    {
        //alert(file);
        if (addValidation(validation))
        {
            var data = new FormData($(form)[0]);
            onLoading();
            $.ajax({
                type: "POST",
                url: '/?r=' + file,
                data: data, //$("#studetnReg").serialize(), // serializes the form's elements.,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                success: function (data)
                {

                    offLoading();
                    openAjaxURL(file2, '#main');
                    $(".msg").show();
                    printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', ".msg");
                    $(display).html(data);
                    $(form)[0].reset();

                }});


        } else {
            alert("Invalid Value insert");
        }
        return false;
    }

    function addValidation(choise)
    {
        switch (choise)
        {
            case 'addBranchValidation':
                if (addBranchValidation())
                    return true;
                else
                    return false;
                // break;
            default:
                return false;
                // break;
        }
        //return false;
    }

    function addBranchValidation()
    {
        return true;
    }
    function SearchByNameBySelect(id, list, file, display)
    {
        var val = $(id).val();

        var opts = $(list).children();//.childNodes;
        for (var i = 0; i < opts.length; i++) {
            if (opts[i].value === val) {
                var s = opts[i].value.split("|");
                $(id).val(s[0]);
                onLoading();
                $.post("/?r=" + file, {empid: s[1]}, function (data) {
                    offLoading();
                    $(display).html(data);
                });
                break;
            }
        }

        return false;
    }
    function postDataCL(file, display, form)
    {
        var data = new FormData($(form)[0]);
        $(display).html(load());
        $.ajax({
            type: "POST",
            url: '/?r=' + file,
            data: data, //$("#studetnReg").serialize(), // serializes the form's elements.,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data)
            {
                $(display).html("");
                $(display).show();
                printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', display);
                $(display).html(data);
                $(form)[0].reset();

            }});

        //$(form).hide();
        return false;
    }
    function postData(file, display, form)
    {
        var data = new FormData($(form)[0]);
        onLoading();
        $.ajax({
            type: "POST",
            url: '/?r=' + file,
            data: data, //$("#studetnReg").serialize(), // serializes the form's elements.,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data)
            {
                offLoading();
                console.log(data);
                $(".msg").show();
                printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', ".msg");
                $(display).html(data);
                $(form)[0].reset();

            }});

        //$(form).hide();
        return false;
    }
    function postURL(file, display, id)
    {
        onLoading();
        $.post("/?r=" + file, {id: id}, function (data) {
            offLoading();
            $(display).html(data);
            $(".msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', ".msg");
        });
        return false;
    }
    function deleteLogo(file, display, id)
    {
        onLoading();
        $.post("/?r=" + file, {id: id}, function (data) {
            offLoading();
            $(display).html(data);
            $(".msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', ".msg");
            $("#trsk" + id).hide();
        });
        return false;
    }
    function getEvent(file, display)
    {
        onLoading();
        $.post("/?r=" + file, {title: $("#eventName").val()}, function (data) {
            offLoading();
            $(display).html(data);
            $(".msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', ".msg");
        });
        return false;
    }
    function postURL2(file, display, id)
    {
        onLoading();
        $.post("/?r=" + file, {id: id}, function (data) {
            offLoading();
            $(display).html(data);

        });
        return false;
    }

    function postURL3(file, display, id)
    {
        var limit = $("#limit").val();

        onLoading();
        $.post("/?r=" + file, {id: id, limit: limit}, function (data) {
            offLoading();

            $(display).html(data);
            return false;
        });

    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#select-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function onInput(id, list, display, file) {
        var val = $(id).val();
        var opts = $(list).children();//.childNodes;
        for (var i = 0; i < opts.length; i++) {
            if (opts[i].value === val) {
                onLoading();
                $.post("/?r=" + file, {master: opts[i].value}, function (data) {
                    offLoading();
                    $(display).html(data);
                });
                break;
            }
        }
    }
    function deletePhoto(file, id, path)
    {
        onLoading();
        $.post('/?r=' + file, {id: id, path: path}, function (data) {
            onLoading();
            $("#img" + id).hide();
            $(".msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', ".msg");
        });
    }
    function SliderAdd()
    {
        $("#Slider-perview").html($("#data").val());
    }
    $(document).ready(function () {
        $(".Editor-editor").keyup(function (e) {
            var data = $(".Editor-editor").html();
            $("#txtEditor").html(data);
        });
        //setInterval(function(){$(".msg").hide(); }, 10000);
    });


</script>
<script>
    (function () {
        var options = {
            whatsapp: "+917045671515", // WhatsApp number
            call_to_action: "Tahaan Pest Solutions", // Call to action
            position: "left", // Position may be 'right' or 'left'
            showPopup: true,
        };
        //var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        //var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        //s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        //var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!--<style>.fb-livechat{display:none}.ctrlq.fb-button{z-index:1;background:#0084ff;width:60px;height:60px;text-align:center;position:fixed;bottom:24px;right:24px;border:0;outline:none;border-radius:60px;-webkit-border-radius:60px;-moz-border-radius:60px;-ms-border-radius:60px;-o-border-radius:60px;box-shadow:0 1px 6px rgba(0,0,0,0.06),0 2px 32px rgba(0,0,0,0.16);-webkit-transition:box-shadow 200ms ease;transition:box-shadow 200ms ease;cursor:pointer;background-size:80%;background-repeat:no-repeat;background-position:center;background-image:url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+");transition:all .2s ease-in-out}.ctrlq.fb-button:focus,.ctrlq.fb-button:hover{transform:scale(1.1);box-shadow:0 2px 8px rgba(0,0,0,0.09),0 4px 40px rgba(0,0,0,0.24)}.fb-widget{background:#fff;z-index:99999999999;position:fixed;width:300px;height:435px;overflow:hidden;display:none;opacity:0;bottom:0;right:24px;border-radius:6px;-o-border-radius:6px;-webkit-border-radius:6px;box-shadow:0 5px 40px rgba(0,0,0,0.16);-webkit-box-shadow:0 5px 40px rgba(0,0,0,0.16);-moz-box-shadow:0 5px 40px rgba(0,0,0,0.16);-o-box-shadow:0 5px 40px rgba(0,0,0,0.16)}.fb-credit{border-left:1px solid #e9ebee;border-right:1px solid #e9ebee;height:35px;text-align:center}.fb-credit a{transition:none;color:#bec2c9;font-family:Helvetica,Arial,sans-serif;font-size:12px;text-decoration:none;border:0;font-weight:normal}.ctrlq.fb-overlay{z-index:0;position:fixed;height:100vh;width:100vw;-webkit-transition:opacity .4s,visibility .4s;transition:opacity .4s,visibility .4s;top:0;left:0;background:rgba(0,0,0,0.05);display:none}.ctrlq.fb-close{position:fixed;right:24px;z-index:4;padding:0 6px;background:#365899;font-weight:bold;font-size:11px;color:#fff;cursor:pointer;margin:8px;border-radius:3px}.ctrlq.fb-close::after{content:'X';font-family:sans-serif}h1{font-weight:300}</style>
        <div class="fb-livechat"><div class="ctrlq fb-overlay"></div><div class="fb-widget" ><div class="ctrlq fb-close"></div><div class="fb-page" data-href="https://www.facebook.com/ssmnmvpandare" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/ssmnmvpandare" class="fb-xfbml-parse-ignore"> </blockquote></div><div class="fb-credit"><a href="https:"http://aasksoft.co.in/" target="_blank">Facebook Chat Widget by @askSoft"</a></div><div id="fb-root"></div></div><a href="https://m.me/ssmnmvpandare" title="Send us a message on Facebook" class="ctrlq fb-button" class='zi9' ></a></div><p align="center">
        
<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>-->

<script>
    $(document).ready(function () {
        var $fb = {
            delay: 125,
            overlay: $(".fb-overlay"),
            widget: $(".fb-widget"),
            button: $(".fb-button")
        };
        setTimeout(function () {
            $("div.fb-livechat").fadeIn();
        }, $fb.delay * 8);
        $(".ctrlq").on('click', function (e) {
            e.preventDefault();
            if ($fb.overlay.is(":visible")) {
                $fb.overlay.fadeOut($fb.delay);
                $fb.widget.stop().animate({
                    bottom: 0,
                    opacity: 0
                }, $fb.delay * 2, function () {
                    $(this).hide('slow');
                    $fb.button.show();
                });
            } else {
                $fb.button.fadeOut('medium', function () {
                    $fb.widget.stop().show().animate({
                        bottom: "30px",
                        opacity: 1
                    }, $fb.delay * 2);
                    $fb.overlay.fadeIn($fb.delay);
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $(".wh-widget-left").css("position", "fixed");
            $(".wh-widget-left").css("margin-bottom", "28px");
            $("#wh-widget-send-button-wrapper").css("margin-bottom", "28px");
        }, 9000);
    });
</script>

<script async src="//www.instagram.com/embed.js"></script>
<script>
    $(document).ready(function () {
        loadCart();
        setInterval(function () {
            //loadCart();
        }, 2000);
        $("#owl-demo").owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            smartSpeed: 1200,
            items: 1,
            responsiveClass: true,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1,
                    loop: true,
                    margin: 20
                },
                1000: {
                    items: 3,
                    loop: true,
                    margin: 20
                }
            }

        });
        $(function () {
            setTimeout(function () {
                //fetchHomeServiceBooking('Cockroach Control');
                //loadInsta();
            }, 100);

        });
    });

    //cart code
    function loadCart() {
        var formData = {action: "cartcount"}; //Array 
        //console.log(formData);
        $.ajax({
            url: "/cart", // Url of backend (can be python, php, etc..)
            type: "POST", // data type (can be get, post, put, delete)
            data: formData, // data in json format
            async: true, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
            success: function (response, textStatus, jqXHR) {
                console.log(response);
                var json = JSON.parse(response);
                if (json.status === 1)
                {
                    $("#ct").html(json.ct);
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
</body>
</html>