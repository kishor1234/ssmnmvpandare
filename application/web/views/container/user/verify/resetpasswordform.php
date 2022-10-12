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

    </head>
    <body>
        <section>

            <div class="container active">


                <div class="user signupBx">
                    <div class="formBx">

                        <form action="" id="myRegForm" onsubmit="return false;">
                            <h2>Reset Password</h2>
                            <div class="msg error">
                                <?= $msg ?>
                            </div>
                            <input type="hidden" id="token" name="token" value="<?= $token ?>" placeholder="Mobile Number" />
                            <input type="password" id="spassword" name="password" placeholder="Create Password" />
                            <div id="error_password" class="valid-feedback"></div>
                            <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm Password" />
                            <div id="error_password_confirm" class="valid-feedback"></div>
                            <input type="submit"  id="reg-btn" value="Reset" />

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

                        id: {
                            required: true,
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
                            url: '/resetuserpassword',
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
                                    if (obj.url === "/login") {
                                        setTimeout(function () {
                                            window.location.replace(obj.url);
                                        }, 1000);

                                    }
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

            function printMessage(message, clas, display)
            {
                var m = '<div class="alert alert-' + clas + ' text-center"><strong>' + message +
                        '</strong></div>';
                $(display).html(m);
            }
        </script>
    </body>
</html>