<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
?>
<html lang="en">
<head>
 <link rel="shortcut icon" type="text/css" href="../Data/FR.png">
    
    <meta charset="UTF-8">
    <meta name="description" content="Billing SIP Trunk Provider, IT Solution dan Mobile Apps Developer">
    <meta name="keywords" content="Billing Portal">
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo PuUSD se, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | puUSD e"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo" style="background:#fff;border-right: 3px solid #09c;"><center><img src="../Data/LogoFR.png" width="150px"></center>
            </div>

            <ul class="nav">
			 <li class="active">
                    <a><button class="tablinks" style="background:none;border:0;"onclick="openCity(event, 'dash')"  id="defaultOpen">
                        <i class="pe-7s-note2"></i>
                        <p>Input Billing</p>
                    </button></a>
                </li>        
                <li class="active">
                    <a><button class="tablinks" style="background:none;border:0;"onclick="openCity(event, 'home')">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </button></a>
                </li>              
				<li>
                    <a><button class="tablinks" style="background:none;border:0;"onclick="openCity(event, 'billing')">
                        <i class="pe-7s-bell"></i>
                        <p>Billing ivoicing</p>
                    </button></a>
                </li>
				<li>
                    <a><button class="tablinks" style="background:none;border:0;"onclick="openCity(event, 'invoice')"  >
                        <i class="pe-7s-news-paper"></i>
                        <p>Hasil Rating</p>
                  </button></a>
                </li>        
				 <li>
                   <a><button class="tablinks" style="background:none;border:0;"onclick="openCity(event, 'users')"  >
                        <i class="pe-7s-note2"></i>
                        <p>Pelanggan</p>
                  </button></a>
                </li>
                <li>
                   <a><button class="tablinks" style="background:none;border:0;"onclick="openCity(event, 'mitra')"  >
                         <i class="pe-7s-note2"></i>
                        <p>PIC</p>
                  </button></a>
                </li>

                <li>
                 <a><button class="tablinks" style="background:none;border:0;"onclick="openCity(event, 'pic')"  >
                        <i class="pe-7s-user"></i>
                        <p>My Account</p>
                  </button></a>
                </li>
                      
				<li>
 <a><button class="tablinks" style="background:none;border:0;"onclick="openCity(event, 'zona')"  >
                        <i class="pe-7s-science"></i>
                        <p>Zona</p>
                  </button></a>
                </li> 
				<li>
                     <a><button class="tablinks" style="background:none;border:0;"onclick="openCity(event, 'document')"  >
                        <i class="pe-7s-note2"></i>
                        <p>Document</p>
                  </button></a>
                </li>
                <li>
                   <a><button class="tablinks" style="background:none;border:0;"onclick="openCity(event, 'maps')"  >
                        <i class="pe-7s-map-marker"></i>
                        <p>Tracking</p>
                  </button></a>
                </li>
            </ul>
    	</div>
    </div>
<style>
.mainpanel {
    position: relative;
    z-index: 2;
    float: right;
    width: calc(100% - 260px);
}

.mainpanel > .content {
    padding: 30px 15px;
    min-height: calc(100% - 123px);
}

.mainpanel > .footer {
    border-top: 1px solid #e7e7e7;
}

.mainpanel .navbar {
    margin-bottom: 0;
}

.sidebar,
.mainpanel {
    max-height: 100%;
    height: 100%;
    -webkit-transition-property: top,bottom;
    transition-property: top,bottom;
    -webkit-transition-duration: .2s,.2s;
    transition-duration: .2s,.2s;
    -webkit-transition-timing-function: linear,linear;
    transition-timing-function: linear,linear;
    -webkit-overflow-scrolling: touch;
}
@media (max-width: 991px) {
    .mainpanel {
        width: 100%;
    }
    .navbar-transparent {
        padding-top: 15px;
        background-color: rgba(0, 0, 0, 0.45);
    }
    body {
        position: relative;
    }
    .mainpanel {
	width:100%;
        -webkit-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        -moz-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        -o-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        -ms-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        left: 0;
 margin-left:0;
    }
    .navbar .container {
        left: 0;
        width: 100%;
        -webkit-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        -moz-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        -o-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        -ms-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        position: relative;
    }
    .navbar .navbar-collapse.collapse,
    .navbar .navbar-collapse.collapse.in,
    .navbar .navbar-collapse.collapsing {
        display: none !important;
    }
    .navbar-nav > li {
        float: none;
        position: relative;
        display: block;
    }
    .navbar-collapse,
    .sidebar {
        position: fixed;
        display: block;
        top: 0;
        height: 100%;
        right: 0;
        left: auto;
        z-index: 1032;
        visibility: visible;
        background-color: #999;
        overflow-y: visible;
        border-top: none;
        text-align: left;
        padding: 0;
        -webkit-transform: translate3d(260px, 0, 0);
        -moz-transform: translate3d(260px, 0, 0);
        -o-transform: translate3d(260px, 0, 0);
        -ms-transform: translate3d(260px, 0, 0);
        transform: translate3d(260px, 0, 0);
        -webkit-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        -moz-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        -o-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        -ms-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
    }
    .navbar-collapse > ul,
    .sidebar > ul {
        position: relative;
        z-index: 4;
        overflow-y: scroll;
        height: calc(100vh - 61px);
        width: 100%;
    }
    .navbar-collapse::before,
    .sidebar::before {
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        position: absolute;
        background-color: #282828;
        display: block;
        content: "";
        z-index: 1;
    }
    .navbar-collapse .logo,
    .sidebar .logo {
        position: relative;
        z-index: 4;
    }
    .navbar-collapse .nav li > a,
    .sidebar .nav li > a {
        padding: 10px 15px;
    }
    .navbar-collapse .nav,
    .sidebar .nav {
        margin-top: 10px;
    }
    .nav-open .navbar-collapse,
    .nav-open .sidebar {
        -webkit-transform: translate3d(0px, 0, 0);
        -moz-transform: translate3d(0px, 0, 0);
        -o-transform: translate3d(0px, 0, 0);
        -ms-transform: translate3d(0px, 0, 0);
        transform: translate3d(0px, 0, 0);
    }
    .nav-open .navbar .container {
        left: -250px;
    }
    .nav-open .mainpanel {
        left: 0;
        -webkit-transform: translate3d(-260px, 0, 0);
        -moz-transform: translate3d(-260px, 0, 0);
        -o-transform: translate3d(-260px, 0, 0);
        -ms-transform: translate3d(-260px, 0, 0);
        transform: translate3d(-260px, 0, 0);
    }
    .nav-open .menu-on-left .sidebar {
        -webkit-transform: translate3d(0px, 0, 0);
        -moz-transform: translate3d(0px, 0, 0);
        -o-transform: translate3d(0px, 0, 0);
        -ms-transform: translate3d(0px, 0, 0);
        transform: translate3d(0px, 0, 0);
    }
    .nav-open .menu-on-left .mainpanel {
        left: 0;
        -webkit-transform: translate3d(260px, 0, 0);
        -moz-transform: translate3d(260px, 0, 0);
        -o-transform: translate3d(260px, 0, 0);
        -ms-transform: translate3d(260px, 0, 0);
        transform: translate3d(260px, 0, 0);
    }
    .menu-on-left .sidebar {
        left: 0;
        right: auto;
        -webkit-transform: translate3d(-260px, 0, 0);
        -moz-transform: translate3d(-260px, 0, 0);
        -o-transform: translate3d(-260px, 0, 0);
        -ms-transform: translate3d(-260px, 0, 0);
        transform: translate3d(-260px, 0, 0);
    }
    .menu-on-left #bodyClick {
        right: 0;
        left: auto;
    }
    .navbar-toggle .icon-bar {
        display: block;
        position: relative;
        background: #fff;
        width: 24px;
        height: 2px;
        border-radius: 1px;
        margin: 0 auto;
    }
    .navbar-header .navbar-toggle {
        margin: 10px 15px 10px 0;
        width: 40px;
        height: 40px;
    }
    .bar1,
    .bar2,
    .bar3 {
        outline: 1px solid transparent;
    }
    .bar1 {
        top: 0px;
        -webkit-animation: topbar-back 500ms linear 0s;
        -moz-animation: topbar-back 500ms linear 0s;
        animation: topbar-back 500ms 0s;
        -webkit-animation-fill-mode: forwards;
        -moz-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
    }
    .bar2 {
        opacity: 1;
    }
    .bar3 {
        bottom: 0px;
        -webkit-animation: bottombar-back 500ms linear 0s;
        -moz-animation: bottombar-back 500ms linear 0s;
        animation: bottombar-back 500ms 0s;
        -webkit-animation-fill-mode: forwards;
        -moz-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
    }
    .toggled .bar1 {
        top: 6px;
        -webkit-animation: topbar-x 500ms linear 0s;
        -moz-animation: topbar-x 500ms linear 0s;
        animation: topbar-x 500ms 0s;
        -webkit-animation-fill-mode: forwards;
        -moz-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
    }
    .toggled .bar2 {
        opacity: 0;
    }
    .toggled .bar3 {
        bottom: 6px;
        -webkit-animation: bottombar-x 500ms linear 0s;
        -moz-animation: bottombar-x 500ms linear 0s;
        animation: bottombar-x 500ms 0s;
        -webkit-animation-fill-mode: forwards;
        -moz-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
    }
    @keyframes topbar-x {
        0% {
            top: 0px;
            transform: rotate(0deg);
        }
        45% {
            top: 6px;
            transform: rotate(145deg);
        }
        75% {
            transform: rotate(130deg);
        }
        100% {
            transform: rotate(135deg);
        }
    }
    @-webkit-keyframes topbar-x {
        0% {
            top: 0px;
            -webkit-transform: rotate(0deg);
        }
        45% {
            top: 6px;
            -webkit-transform: rotate(145deg);
        }
        75% {
            -webkit-transform: rotate(130deg);
        }
        100% {
            -webkit-transform: rotate(135deg);
        }
    }
    @-moz-keyframes topbar-x {
        0% {
            top: 0px;
            -moz-transform: rotate(0deg);
        }
        45% {
            top: 6px;
            -moz-transform: rotate(145deg);
        }
        75% {
            -moz-transform: rotate(130deg);
        }
        100% {
            -moz-transform: rotate(135deg);
        }
    }
    @keyframes topbar-back {
        0% {
            top: 6px;
            transform: rotate(135deg);
        }
        45% {
            transform: rotate(-10deg);
        }
        75% {
            transform: rotate(5deg);
        }
        100% {
            top: 0px;
            transform: rotate(0);
        }
    }
    @-webkit-keyframes topbar-back {
        0% {
            top: 6px;
            -webkit-transform: rotate(135deg);
        }
        45% {
            -webkit-transform: rotate(-10deg);
        }
        75% {
            -webkit-transform: rotate(5deg);
        }
        100% {
            top: 0px;
            -webkit-transform: rotate(0);
        }
    }
    @-moz-keyframes topbar-back {
        0% {
            top: 6px;
            -moz-transform: rotate(135deg);
        }
        45% {
            -moz-transform: rotate(-10deg);
        }
        75% {
            -moz-transform: rotate(5deg);
        }
        100% {
            top: 0px;
            -moz-transform: rotate(0);
        }
    }
    @keyframes bottombar-x {
        0% {
            bottom: 0px;
            transform: rotate(0deg);
        }
        45% {
            bottom: 6px;
            transform: rotate(-145deg);
        }
        75% {
            transform: rotate(-130deg);
        }
        100% {
            transform: rotate(-135deg);
        }
    }
    @-webkit-keyframes bottombar-x {
        0% {
            bottom: 0px;
            -webkit-transform: rotate(0deg);
        }
        45% {
            bottom: 6px;
            -webkit-transform: rotate(-145deg);
        }
        75% {
            -webkit-transform: rotate(-130deg);
        }
        100% {
            -webkit-transform: rotate(-135deg);
        }
    }
    @-moz-keyframes bottombar-x {
        0% {
            bottom: 0px;
            -moz-transform: rotate(0deg);
        }
        45% {
            bottom: 6px;
            -moz-transform: rotate(-145deg);
        }
        75% {
            -moz-transform: rotate(-130deg);
        }
        100% {
            -moz-transform: rotate(-135deg);
        }
    }
    @keyframes bottombar-back {
        0% {
            bottom: 6px;
            transform: rotate(-135deg);
        }
        45% {
            transform: rotate(10deg);
        }
        75% {
            transform: rotate(-5deg);
        }
        100% {
            bottom: 0px;
            transform: rotate(0);
        }
    }
    @-webkit-keyframes bottombar-back {
        0% {
            bottom: 6px;
            -webkit-transform: rotate(-135deg);
        }
        45% {
            -webkit-transform: rotate(10deg);
        }
        75% {
            -webkit-transform: rotate(-5deg);
        }
        100% {
            bottom: 0px;
            -webkit-transform: rotate(0);
        }
    }
    @-moz-keyframes bottombar-back {
        0% {
            bottom: 6px;
            -moz-transform: rotate(-135deg);
        }
        45% {
            -moz-transform: rotate(10deg);
        }
        75% {
            -moz-transform: rotate(-5deg);
        }
        100% {
            bottom: 0px;
            -moz-transform: rotate(0);
        }
    }
    @-webkit-keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    @-moz-keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    .dropdown-menu .divider {
        background-color: rgba(229, 229, 229, 0.15);
    }
    .navbar-nav {
        margin: 1px 0;
        float: none !important;
    }
    .navbar-nav .open .dropdown-menu > li > a {
        padding: 10px 15px 10px 60px;
        border-radius: 4px;
        color: inherit;
    }
    .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-nav .open .dropdown-menu > li > a:focus {
        background-color: transparent;
    }
    [class*="navbar-"] .navbar-nav > li > a,
    [class*="navbar-"] .navbar-nav > li > a:hover,
    [class*="navbar-"] .navbar-nav > li > a:focus,
    [class*="navbar-"] .navbar-nav .active > a,
    [class*="navbar-"] .navbar-nav .active > a:hover,
    [class*="navbar-"] .navbar-nav .active > a:focus,
    [class*="navbar-"] .navbar-nav .open .dropdown-menu > li > a,
    [class*="navbar-"] .navbar-nav .open .dropdown-menu > li > a:hover,
    [class*="navbar-"] .navbar-nav .open .dropdown-menu > li > a:focus,
    [class*="navbar-"] .navbar-nav .open .dropdown-menu > li > a:active {
        color: white;
    }
    [class*="navbar-"] .navbar-nav > li > a,
    [class*="navbar-"] .navbar-nav > li > a:hover,
    [class*="navbar-"] .navbar-nav > li > a:focus {
        opacity: .7;
        background-color: transparent;
        outline: none;
    }
    [class*="navbar-"] .navbar-nav .open .dropdown-menu > li > a:hover,
    [class*="navbar-"] .navbar-nav .open .dropdown-menu > li > a:focus {
        background-color: rgba(255, 255, 255, 0.1);
    }
    [class*="navbar-"] .navbar-nav.navbar-nav .open .dropdown-menu > li > a:active {
        opacity: 1;
    }
    [class*="navbar-"] .navbar-nav .dropdown > a:hover .caret {
        border-bottom-color: #fff;
        border-top-color: #fff;
    }
    [class*="navbar-"] .navbar-nav .dropdown > a:active .caret {
        border-bottom-color: white;
        border-top-color: white;
    }
    .dropdown-menu {
        display: none;
    }
    .navbar-fixed-top {
        -webkit-backface-visibility: hidden;
    }
    #bodyClick {
        height: 100%;
        width: calc(100% - 260px);
        position: fixed;
        opacity: 0;
        top: 0;
        left: 0;
        content: "";
        z-index: 9999;
        overflow-x: hidden;
    }
    .social-line .btn {
        margin: 0 0 10px 0;
    }
    .subscribe-line .form-control {
        margin: 0 0 10px 0;
    }
    .social-line.pull-right {
        float: none;
    }
    .footer nav.pull-left {
        float: none !important;
    }
    .footer:not(.footer-big) nav > ul li {
        float: none;
    }
    .social-area.pull-right {
        float: none !important;
    }
    .form-control + .form-control-feedback {
        margin-top: -8px;
    }
    .navbar-toggle:hover, .navbar-toggle:focus {
        background-color: transparent !important;
    }
    .btn.dropdown-toggle {
        margin-bottom: 0;
    }
    .media-post .author {
        width: 20%;
        float: none !important;
        display: block;
        margin: 0 auto 10px;
    }
    .media-post .media-body {
        width: 100%;
    }
    .navbar-collapse.collapse {
        height: 100% !important;
    }
    .navbar-collapse.collapse.in {
        display: block;
    }
    .navbar-header .collapse, .navbar-toggle {
        display: block !important;
    }
    .navbar-header {
        float: none;
    }
    .navbar-nav .open .dropdown-menu {
        position: static;
        float: none;
        width: auto;
        margin-top: 0;
        background-color: transparent;
        border: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    .navbar-collapse .nav p {
        font-size: 14px;
        margin: 0;
    }
    .navbar-collapse [class^="pe-7s-"] {
        float: left;
        font-size: 20px;
        margin-right: 10px;
    }
}

@media (min-width: 992px) {
    .table-full-width {
        margin-left: -15px;
        margin-right: -15px;
    }
    .table-responsive {
        overflow: visible;
    }
    .navbar-nav p {
        line-height: normal;
        margin: 0;
    }
}

@media (max-width: 991px) {
    .table-responsive {
        width: 100%;
        margin-bottom: 15px;
        overflow-x: scroll;
        overflow-y: hidden;
        -ms-overflow-style: -ms-autohiding-scrollbar;
        -webkit-overflow-scrolling: touch;
    }
}
</style>
    <div id="home" class="mainpanel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
									
                              </a>
                              <ul class="dropdown-menu">
                                <li><a onclick="openCity(event, 'mitra')">Data PIC</a></li>
                                <li><a onclick="openCity(event, 'users')">Data pelanggan</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a onclick="openCity(event, 'pic')">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Data
										<b class="caret"></b>
									</p>

                              </a>
                                <ul class="dropdown-menu">
                                <li><a onclick="openCity(event, 'mitra')">Data PIC</a></li>
                                <li><a onclick="openCity(event, 'users')">Data pelanggan</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="logoutadmin.php?logout">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Email Statistics</h4>
                                <p class="category">Last Campaign Performance</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Bounce
                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Users Behavior</h4>
                                <p class="category">24 Hours performance</p>
                            </div>
                            <div class="content">
                                <div id="chartHours" class="ct-chart"></div>
                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Click
                                        <i class="fa fa-circle text-warning"></i> Click Second Time
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">2014 Sales</h4>
                                <p class="category">All products including Taxes</p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Tesla Model S
                                        <i class="fa fa-circle text-danger"></i> BMW 5 Series
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Data information certified
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Tasks</h4>
                                <p class="category">Backend development</p>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
													<div class="checkbox">
						  							  	<input id="checkbox1" type="checkbox">
						  							  	<label for="checkbox1"></label>
					  						  		</div>
                                                </td>
                                                <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
													<div class="checkbox">
						  							  	<input id="checkbox2" type="checkbox" checked>
						  							  	<label for="checkbox2"></label>
					  						  		</div>
                                                </td>
                                                <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
													<div class="checkbox">
						  							  	<input id="checkbox3" type="checkbox">
						  							  	<label for="checkbox3"></label>
					  						  		</div>
                                                </td>
                                                <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
												</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
													<div class="checkbox">
						  							  	<input id="checkbox4" type="checkbox" checked>
						  							  	<label for="checkbox4"></label>
					  						  		</div>
                                                </td>
                                                <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
													<div class="checkbox">
						  							  	<input id="checkbox5" type="checkbox">
						  							  	<label for="checkbox5"></label>
					  						  		</div>
                                                </td>
                                                <td>Read "Following makes Medium better"</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
													<div class="checkbox">
						  							  	<input id="checkbox6" type="checkbox" checked>
						  							  	<label for="checkbox6"></label>
					  						  		</div>
                                                </td>
                                                <td>Unfollow 5 enemies from twitter</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> profitgm
                </p>
            </div>
        </footer>
    </div>
	
	<!-- tab source--->
<div id="dash" class="mainpanel">
<br><br>
<iframe src="dash/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="billing" class="mainpanel">
<br><br>
<iframe src="board/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="pic" class="mainpanel">
<br><br>
<iframe src="pic/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="mitra" class="mainpanel">
<br><br>
<iframe src="mitra/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="users" class="mainpanel">
<br><br>
<iframe src="users/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="invoice" class="mainpanel">
<br><br>
<iframe src="invoice/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="document" class="mainpanel">
<br><br>
<iframe src="document/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="maps" class="mainpanel">
<br><br>
<iframe src="maps/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="zona" class="mainpanel">
<br><br>
<iframe src="zona/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<!--java -->
<script>
function openCity(evt, cityName) {
  var i, mainpanel, tablinks;
  mainpanel = document.getElementsByClassName("mainpanel");
  for (i = 0; i < mainpanel.length; i++) {
    mainpanel[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with  and click on it
document.getElementById("defaultOpen").click();
</script>
   
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo puUSD se -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Trol Administrator</b> - Thanks for login."

            },{
                type: 'info',
                timer: 
            });

    	});
	</script>

</html>
