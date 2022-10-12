<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>User | Tahaan Pest Solutions LLP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            .error{
                color:red; 
                font-size: 12px;
            }
            section {
                position: relative;
                min-height: 100vh;
                /*background-color: #a0dcf4;*/
                background-color:#ffffff;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
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
        <script src="/assets/plugins/form/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/form/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/form/additional-methods.min.js" type="text/javascript"></script>
        <style>
            .google{
                width: 100%;
                height: auto;
                margin: 0px auto;
                border: 1px solid #ccc;
                box-shadow: 3px 3px #888888;
            }
            span {
                overflow: hidden;
                text-align: center;
                margin: auto 46%;
                font-size: 10px;
            }
            span:before,
            span:after {
                background-color: #ccc;
                content: "";
                display: inline-block;
                height: 1px;
                position: relative;
                vertical-align: middle;
                width: 50%;
            }
            span:before {
                right: 0.5em;
                margin-left: -50%;
            }
            span:after {
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

    </head>
    <body>
        <section>

            <div class="container <?= $active ?>">

                <div class="user signinBx">
                    <div class="imgBx">
                        <img src="/assets/images/user/image1.jpeg" alt=""/>    
                    </div>
                    <div class="formBx">
                        <form  id="myLoginForm" name="myLoginForm" onsubmit="return false;">

                            <a class="login-btn" href="<?= $main->google->createAuthUrl(); ?>">
                                <img src="/assets/images/google.webp" class="google" alt="Google-login"/>

                            </a>
                            <span>OR</span>
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
                            <span>OR</span>
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
                const container = document.querySelector('.container');
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
    </body>
</html>
