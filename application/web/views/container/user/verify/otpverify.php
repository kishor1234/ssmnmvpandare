<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <title>Verify User | Tahaan Pest Solutions LLP</title>
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
            #reg-btn{
                max-width: 100% !important;
                width: 100%;
            }

        </style>
        <script src="/assets/plugins/form/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/form/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/form/additional-methods.min.js" type="text/javascript"></script>

    </head>
    <body>
        <section>

            <div class="container <?= $active ?>">

                <div class="user signinBx">
                    <div class="imgBx">
                        <img src="/assets/images/user/image1.jpeg" alt=""/>    
                    </div>
                    <div class="formBx">
                        <form action="" id="myOTPVerify" name="myOTPVerify" onsubmit="return false;">
                            <h2>Mobile Number Verification</h2>
                            <div class="msg error">

                            </div>
                            <input type="text" name="otp" id="otp" placeholder="Enter OTP" />
                            <input type="hidden" id="token" name="token" value="<?= $_REQUEST["v"] ?>">
                            <input type="submit" id="reg-btn" value="Verify" />
                            <p class="signup">
                            <p class="signup">Resend otp after  <span id="timer"></span></p>
                            <p class="signup">
                                Already have an account ?
                                <a href="/login">Sign in.</a>
                            </p>
                            </p>
                        </form>
                    </div>
                </div>

            </div>
        </section>
        <script>

            let timerOn = true;

            function timer(remaining) {
                var m = Math.floor(remaining / 60);
                var s = remaining % 60;

                m = m < 10 ? '0' + m : m;
                s = s < 10 ? '0' + s : s;
                document.getElementById('timer').innerHTML = m + ':' + s;
                remaining -= 1;

                if (remaining >= 0 && timerOn) {
                    setTimeout(function () {
                        timer(remaining);
                    }, 1000);
                    return;
                }

                if (!timerOn) {
                    // Do validate stuff here
                    return;
                }

                // Do timeout stuff here
                $("#timer").html("<a  href='javascript:void(0)' onclick='return resend()'>Resend</a>");
            }
            timer(120);

            function resend() {

                $.ajax({
                    type: 'POST',
                    url: '/resendotp/' + $("#token").val(),

                    contentType: false,
                    processData: false,
                    xhr: function () {
                        //progressShow();
                        var xhr = new XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function (e) {
                            var progressbar = Math.round((e.loaded / e.total) * 100);
                            //$("#inner-progress").css('width', progressbar + '%');
                            $("#timer").html("Please Wait... " + progressbar + '%');
                        });
                        return xhr;
                    },
                    success: function (objString) {
                        console.log(objString);
                        var obj = JSON.parse(objString);
                        if (obj.status === 1)
                        {
                            printMessage(obj.message, "success", ".msg");

                            timer(120);
                        } else {
                            printMessage(obj.message, "danger", ".msg");

                            timer(30);
                            //gcaptch();
                        }

                    },
                    error: function (request, status, error) {
                        printMessage("Please try agin after sometime", "danger", ".msg");

                        timer(30);
                        //   gcaptch();
                    }
                });
            }
            $(function () {
                $('#myOTPVerify').validate({// initialize the plugin
                    rules: {

                        otp: {
                            required: true,
                            maxlength: 4,
                            minlength: 4,
                            number: true
                        },
                        token: {
                            required: true
                        }
                    },
                    submitHandler: function (form) { // for demo
                        $("#reg-btn").val("Please wait ...");
                        var formdata = new FormData($(form)[0]);
                        $.ajax({
                            type: 'POST',
                            url: '/otpverify',
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
                                    var next = "login";
                                    var snext = "<?= $_SESSION["next"] ?>";
                                    if (snext) {
                                        next = snext;
                                    }
                                    setTimeout(function () {
                                            window.location.replace("/" + next);
                                        }, 1000);
                                    
                                    //gcaptch();
                                } else {
                                    printMessage(obj.message, "danger", ".msg");
                                    $(form)[0].reset();
                                    var snext = "<?= $_SESSION["next"] ?>";
                                    if (snext) {
                                        next = snext;
                                    }
                                    setTimeout(function () {
                                            window.location.replace("/" + next);
                                        }, 1000);
                                    //gcaptch();
                                }
                                $("#reg-btn").val("Verify");
                            },
                            error: function (request, status, error) {
                                printMessage("Please try agin after sometime", "danger", ".msg");
                                $(form)[0].reset();
                                $("#reg-btn").val("Verify");
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
        </script>
    </body>
</html>
