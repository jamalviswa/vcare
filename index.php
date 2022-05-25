<html style="background-image: url('wallpaper.jpg');background-position:center;background-repeat:no-repeat;background-size:cover;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body,
        html {
            height: 100%;
            margin: 0
            
        }

        .bg {
            background-image: url("wallpaper.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            z-index: -99999;
            opacity: .4
        }

        .smartphone {
            position: relative;
            width: 270px;
            height: 460px;
            margin: auto;
            border: 16px black solid;
            border-top-width: 60px;
            border-bottom-width: 60px;
            border-radius: 36px
        }

        .smartphone:before {
            content: '';
            display: block;
            width: 60px;
            height: 5px;
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #333;
            border-radius: 10px
        }

        .smartphone:after {
            content: '';
            display: block;
            width: 35px;
            height: 35px;
            position: absolute;
            left: 50%;
            bottom: -65px;
            transform: translate(-50%, -50%);
            background: #333;
            border-radius: 50%
        }

        .smartphone .content {
            width: 270px;
            height: 460px;
            background: white
        }

        .watfone {
            position: relative;
            width: 270px;
            height: 460px;
            margin: auto;
            border: 16px black solid;
            border-top-width: 60px;
            border-bottom-width: 60px;
            border-radius: 36px
        }

        .watfone:before {
            content: '';
            display: block;
            width: 60px;
            height: 5px;
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #333;
            border-radius: 10px
        }

        .watfone:after {
            content: '';
            display: block;
            width: 35px;
            height: 35px;
            position: absolute;
            left: 50%;
            bottom: -65px;
            transform: translate(-50%, -50%);
            background: #333;
            border-radius: 50%
        }

        .watfone .content {
            width: 270px;
            height: 460px;
            background: white
        }
    </style>
</head>

<body style="background:#b43a49;background:linear-gradient(90deg,rgba(180,58,73,1) 0,rgba(253,29,94,0.773546918767507) 58%,rgba(252,176,69,1) 100%)"><br><br><br>
    <div style="float:left;left:0;position:fixed;width:30%;height:100%;color:#fff;top:0">
        <center style="padding:10px;font-family:Segoe UI;font-size:24px;">Passengers App</center>
        <div class="watfone">
            <div class="content"><iframe src="firli.php" style="width:100%;border:none;height:100%"></iframe></div>
        </div><br>
        <center><a href="passengers.apk" class="myButton">Download Android APK</a></center>
    </div>
    <center><br>
        <div style="width:30%;font-family:Segoe UI;font-size:24px;color:#fff;"><small style="font-family:segoe UI light"><b>For first time, please register to create new account before using the app, then you can sign in after verified.</b></small><br>See how the differences between passenger applications for service orders. While the driver application to serve passengers </div><br><br>
        <div style="width:30%;font-family:Segoe UI;font-size:14px;color:#fff;">After conducting a service simulation on the passenger application and driver application,please view the transaction history in the administrator application</div><br><br>
        <style>
            .myButton {
                background-color: #44c767;
                -moz-border-radius: 40px;
                -webkit-border-radius: 40px;
                border-radius: 40px;
                border: 1px solid #18ab29;
                display: inline-block;
                cursor: pointer;
                color: #fff;
                font-family: Trebuchet MS;
                font-size: 17px;
                padding: 17px 57px;
                text-decoration: none;
                text-shadow: 0 -1px 0 #2f6627
            }

            .myButton:hover {
                background-color: #5cbf2a
            }

            .myButton:active {
                position: relative;
                top: 1px
            }
        </style>
        <a href="owner/index.php" class="myButton">Go to Admin Panel</a>
    </center>
    <div style="float:right;right:0;position:fixed;width:30%;height:100%;color:#fff;top:0">
        <center style="padding:10px;font-family:Segoe UI;font-size:24px;">Drivers App</center>
        <div class="smartphone">
            <div class="content"><iframe src="jimli.php" style="width:100%;border:none;height:100%"></iframe></div>
        </div>
        <br>
        <center><a href="driver.apk" class="myButton">Download Android APK</a></center>
    </div>
</body>

</html>