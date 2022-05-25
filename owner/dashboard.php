<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
$departement=$rows['departement'];
$kat=mysqli_query($mysqli, "SELECT * FROM departement WHERE departement='$departement'");
$kot=mysqli_fetch_array($kat);
?>
<html lang="en">
<head>
<link rel="shortcut icon" type="text/css" href="ggo.png">
<meta charset="UTF-8">
<meta name="description" content="Billing Provider, IT Solution dan Mobile Apps Developer">
<meta name="keywords" content="Billing Portal">
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/animate.min.css" rel="stylesheet"/>
<link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
<link href="assets/css/demo.css" rel="stylesheet" />
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body style = "background:#101D25;">
<div class="wrapper">
<div class="sidebar" style="background: #101D25;">
<div class="sidebar-wrapper">
<div class="logo" style="background:#101D25;border-right:3px solid #09c"><center><img src="logo.png" width="120px"></center>
</div>

<ul class="nav">
<li class="active">
<a onclick="refreshIframe();"><button class="tablinks" style="background:none;border:0"onclick="openCity(event,'home')" id="defaultOpen">
<i class="pe-7s-graph"></i>
<p>Dashboard</p>
</button></a>
</li>
<?php 
	if($kot['notifikasi']=='ya')
      {
	?>
<li>
<a onclick="refreshIframe();"><button class="tablinks" style="background:none;border:0"onclick="openCity(event,'notifikasi')">
<i class="pe-7s-bell"></i>
<p>Notification</p>
</button></a>
</li>
<?php 
      }else {}
?>
<?php 
	if($kot['topup']=='ya')
      {
	?>
<li>
<a onclick="refreshIframe();"><button class="tablinks" style="background:none;border:0"onclick="openCity(event,'order')">
<i class="pe-7s-cash"></i>
<p>Orders</p>
</button></a>
</li>

<?php 
      }else {}
?>

<li>
<a onclick="refreshIframe();"><button class="tablinks" style="background:none;border:0"onclick="openCity(event,'pic')">
<i class="pe-7s-user"></i>
<p>My Account</p>
</button></a>
</li>
<li>
<a onclick="refreshIframe();"><button class="tablinks" style="background:none;border:0"onclick="openCity(event,'toko')">
<i class="pe-7s-cart"></i>
<p>Products</p>
</button></a>
</li>
<?php 
	if($kot['user']=='ya')
      {
	?>
<li>
<a onclick="refreshIframe();"><button class="tablinks" style="background:none;border:0"onclick="openCity(event,'users')">
<i class="pe-7s-note2"></i>
<p>Users</p>
</button></a>
</li>
<?php 
      }else {}
?>
<?php 
	if($kot['narasumber']=='ya')
      {
	?>
<li>
<a onclick="refreshIframe();"><button class="tablinks" style="background:none;border:0"onclick="openCity(event,'narasumber')">
<i class="pe-7s-note2"></i>
<p>Drivers</p>
</button></a>
</li>
<?php 
      }else {}
?>
<?php 
	if($kot['admin']=='ya')
      {
	?>
<li>
<a onclick="refreshIframe();"><button class="tablinks" style="background:none;border:0"onclick="openCity(event,'mitra')">
<i class="pe-7s-note2"></i>
<p>Admin/Partners</p>
</button></a>
</li>
<?php 
      }else {}
?>
<?php 
	if($kot['voucher']=='ya')
      {
	?>
<li>
<a onclick="refreshIframe();"><button class="tablinks" style="background:none;border:0"onclick="openCity(event,'voucher')">
<i class="pe-7s-science"></i>
<p>Voucher</p>
</button></a>
</li>
<?php 
      }else {}
?>

<?php 
	if($kot['client']=='ya')
      {
	?>
<?php 
      }else {}
?>
<?php 
	if($kot['bank']=='ya')
      {
	?>
<?php 
      }else {}
?>
<li>
<a onclick="refreshIframe();"><button class="tablinks" style="background:none;border:0"onclick="openCity(event,'maps')">
<i class="pe-7s-map-marker"></i>
<p>Tracking</p>
</button></a>
</li>
<li>
<a onclick="refreshIframe();"><button class="tablinks" style="background:none;border:0"onclick="openCity(event,'complain')">
<i class="pe-7s-chat"></i>
<p>Complainment</p>
</button></a>
</li>
<li>
<a onclick="refreshIframe();"><button class="tablinks" style="background:none;border:0"onclick="openCity(event,'kota')">
<i class="pe-7s-target"></i>
<p>Service City</p>
</button></a>
</li>
</ul>
</div>
</div>
<style>.mainpanel{position:relative;z-index:2;float:right;width:calc(100% - 260px)}.mainpanel>.content{padding:30px 15px;min-height:calc(100% - 123px)}.mainpanel>.footer{border-top:1px; background:#101D25;}.mainpanel .navbar{margin-bottom:0;background:#FFA500;}.sidebar,.mainpanel{max-height:100%;height:100%;-webkit-transition-property:top,bottom;transition-property:top,bottom;-webkit-transition-duration:.2s,.2s;transition-duration:.2s,.2s;-webkit-transition-timing-function:linear,linear;transition-timing-function:linear,linear;-webkit-overflow-scrolling:touch}@media(max-width:991px){.mainpanel{width:100%}.navbar-transparent{padding-top:15px;background:#101D25;}body{position:relative}.mainpanel{width:100%;-webkit-transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);-moz-transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);-o-transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);-ms-transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);left:0;margin-left:0}.navbar .container{left:0;width:100%;-webkit-transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);-moz-transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);-o-transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);-ms-transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);position:relative}.navbar .navbar-collapse.collapse,.navbar .navbar-collapse.collapse.in,.navbar .navbar-collapse.collapsing{display:none!important}.navbar-nav>li{float:none;position:relative;display:block}.navbar-collapse,.sidebar{position:fixed;display:block;top:0;height:100%;right:0;left:auto;z-index:1032;visibility:visible;background-color:#999;overflow-y:visible;border-top:0;text-align:left;padding:0;-webkit-transform:translate3d(260px,0,0);-moz-transform:translate3d(260px,0,0);-o-transform:translate3d(260px,0,0);-ms-transform:translate3d(260px,0,0);transform:translate3d(260px,0,0);-webkit-transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);-moz-transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);-o-transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);-ms-transition:all .33s cubic-bezier(0.685,0.0473,0.346,1);transition:all .33s cubic-bezier(0.685,0.0473,0.346,1)}.navbar-collapse>ul,.sidebar>ul{position:relative;z-index:4;overflow-y:scroll;height:calc(100vh - 61px);width:100%}.navbar-collapse::before,.sidebar::before{top:0;left:0;height:100%;width:100%;position:absolute;background-color:#282828;display:block;content:"";z-index:1}.navbar-collapse .logo,.sidebar .logo{position:relative;z-index:4}.navbar-collapse .nav li>a,.sidebar .nav li>a{padding:10px 15px}.navbar-collapse .nav,.sidebar .nav{margin-top:10px}.nav-open .navbar-collapse,.nav-open .sidebar{-webkit-transform:translate3d(0px,0,0);-moz-transform:translate3d(0px,0,0);-o-transform:translate3d(0px,0,0);-ms-transform:translate3d(0px,0,0);transform:translate3d(0px,0,0)}.nav-open .navbar .container{left:-250px}.nav-open .mainpanel{left:0;-webkit-transform:translate3d(-260px,0,0);-moz-transform:translate3d(-260px,0,0);-o-transform:translate3d(-260px,0,0);-ms-transform:translate3d(-260px,0,0);transform:translate3d(-260px,0,0)}.nav-open .menu-on-left .sidebar{-webkit-transform:translate3d(0px,0,0);-moz-transform:translate3d(0px,0,0);-o-transform:translate3d(0px,0,0);-ms-transform:translate3d(0px,0,0);transform:translate3d(0px,0,0)}.nav-open .menu-on-left .mainpanel{left:0;-webkit-transform:translate3d(260px,0,0);-moz-transform:translate3d(260px,0,0);-o-transform:translate3d(260px,0,0);-ms-transform:translate3d(260px,0,0);transform:translate3d(260px,0,0)}.menu-on-left .sidebar{left:0;right:auto;-webkit-transform:translate3d(-260px,0,0);-moz-transform:translate3d(-260px,0,0);-o-transform:translate3d(-260px,0,0);-ms-transform:translate3d(-260px,0,0);transform:translate3d(-260px,0,0)}.menu-on-left #bodyClick{right:0;left:auto}.navbar-toggle .icon-bar{display:block;position:relative;background:#fff;width:24px;height:2px;border-radius:1px;margin:0 auto}.navbar-header .navbar-toggle{margin:10px 15px 10px 0;width:40px;height:40px}.bar1,.bar2,.bar3{outline:1px solid transparent}.bar1{top:0;-webkit-animation:topbar-back 500ms linear 0s;-moz-animation:topbar-back 500ms linear 0s;animation:topbar-back 500ms 0s;-webkit-animation-fill-mode:forwards;-moz-animation-fill-mode:forwards;animation-fill-mode:forwards}.bar2{opacity:1}.bar3{bottom:0;-webkit-animation:bottombar-back 500ms linear 0s;-moz-animation:bottombar-back 500ms linear 0s;animation:bottombar-back 500ms 0s;-webkit-animation-fill-mode:forwards;-moz-animation-fill-mode:forwards;animation-fill-mode:forwards}.toggled .bar1{top:6px;-webkit-animation:topbar-x 500ms linear 0s;-moz-animation:topbar-x 500ms linear 0s;animation:topbar-x 500ms 0s;-webkit-animation-fill-mode:forwards;-moz-animation-fill-mode:forwards;animation-fill-mode:forwards}.toggled .bar2{opacity:0}.toggled .bar3{bottom:6px;-webkit-animation:bottombar-x 500ms linear 0s;-moz-animation:bottombar-x 500ms linear 0s;animation:bottombar-x 500ms 0s;-webkit-animation-fill-mode:forwards;-moz-animation-fill-mode:forwards;animation-fill-mode:forwards}@keyframes topbar-x{0%{top:0;transform:rotate(0deg)}45%{top:6px;transform:rotate(145deg)}75%{transform:rotate(130deg)}100%{transform:rotate(135deg)}}@-webkit-keyframes topbar-x{0%{top:0;-webkit-transform:rotate(0deg)}45%{top:6px;-webkit-transform:rotate(145deg)}75%{-webkit-transform:rotate(130deg)}100%{-webkit-transform:rotate(135deg)}}@-moz-keyframes topbar-x{0%{top:0;-moz-transform:rotate(0deg)}45%{top:6px;-moz-transform:rotate(145deg)}75%{-moz-transform:rotate(130deg)}100%{-moz-transform:rotate(135deg)}}@keyframes topbar-back{0%{top:6px;transform:rotate(135deg)}45%{transform:rotate(-10deg)}75%{transform:rotate(5deg)}100%{top:0;transform:rotate(0)}}@-webkit-keyframes topbar-back{0%{top:6px;-webkit-transform:rotate(135deg)}45%{-webkit-transform:rotate(-10deg)}75%{-webkit-transform:rotate(5deg)}100%{top:0;-webkit-transform:rotate(0)}}@-moz-keyframes topbar-back{0%{top:6px;-moz-transform:rotate(135deg)}45%{-moz-transform:rotate(-10deg)}75%{-moz-transform:rotate(5deg)}100%{top:0;-moz-transform:rotate(0)}}@keyframes bottombar-x{0%{bottom:0;transform:rotate(0deg)}45%{bottom:6px;transform:rotate(-145deg)}75%{transform:rotate(-130deg)}100%{transform:rotate(-135deg)}}@-webkit-keyframes bottombar-x{0%{bottom:0;-webkit-transform:rotate(0deg)}45%{bottom:6px;-webkit-transform:rotate(-145deg)}75%{-webkit-transform:rotate(-130deg)}100%{-webkit-transform:rotate(-135deg)}}@-moz-keyframes bottombar-x{0%{bottom:0;-moz-transform:rotate(0deg)}45%{bottom:6px;-moz-transform:rotate(-145deg)}75%{-moz-transform:rotate(-130deg)}100%{-moz-transform:rotate(-135deg)}}@keyframes bottombar-back{0%{bottom:6px;transform:rotate(-135deg)}45%{transform:rotate(10deg)}75%{transform:rotate(-5deg)}100%{bottom:0;transform:rotate(0)}}@-webkit-keyframes bottombar-back{0%{bottom:6px;-webkit-transform:rotate(-135deg)}45%{-webkit-transform:rotate(10deg)}75%{-webkit-transform:rotate(-5deg)}100%{bottom:0;-webkit-transform:rotate(0)}}@-moz-keyframes bottombar-back{0%{bottom:6px;-moz-transform:rotate(-135deg)}45%{-moz-transform:rotate(10deg)}75%{-moz-transform:rotate(-5deg)}100%{bottom:0;-moz-transform:rotate(0)}}@-webkit-keyframes fadeIn{0%{opacity:0}100%{opacity:1}}@-moz-keyframes fadeIn{0%{opacity:0}100%{opacity:1}}@keyframes fadeIn{0%{opacity:0}100%{opacity:1}}.dropdown-menu .divider{background-color:rgba(229,229,229,0.15)}.navbar-nav{margin:1px 0;float:none!important}.navbar-nav .open .dropdown-menu>li>a{padding:10px 15px 10px 60px;border-radius:4px;color:inherit}.navbar-nav .open .dropdown-menu>li>a:hover,.navbar-nav .open .dropdown-menu>li>a:focus{background-color:transparent}[class*="navbar-"] .navbar-nav>li>a,[class*="navbar-"] .navbar-nav>li>a:hover,[class*="navbar-"] .navbar-nav>li>a:focus,[class*="navbar-"] .navbar-nav .active>a,[class*="navbar-"] .navbar-nav .active>a:hover,[class*="navbar-"] .navbar-nav .active>a:focus,[class*="navbar-"] .navbar-nav .open .dropdown-menu>li>a,[class*="navbar-"] .navbar-nav .open .dropdown-menu>li>a:hover,[class*="navbar-"] .navbar-nav .open .dropdown-menu>li>a:focus,[class*="navbar-"] .navbar-nav .open .dropdown-menu>li>a:active{color:white}[class*="navbar-"] .navbar-nav>li>a,[class*="navbar-"] .navbar-nav>li>a:hover,[class*="navbar-"] .navbar-nav>li>a:focus{opacity:.7;background-color:transparent;outline:0}[class*="navbar-"] .navbar-nav .open .dropdown-menu>li>a:hover,[class*="navbar-"] .navbar-nav .open .dropdown-menu>li>a:focus{background-color:rgba(255,255,255,0.1)}[class*="navbar-"] .navbar-nav.navbar-nav .open .dropdown-menu>li>a:active{opacity:1}[class*="navbar-"] .navbar-nav .dropdown>a:hover .caret{border-bottom-color:#fff;border-top-color:#fff}[class*="navbar-"] .navbar-nav .dropdown>a:active .caret{border-bottom-color:white;border-top-color:white}.dropdown-menu{display:none}.navbar-fixed-top{-webkit-backface-visibility:hidden}#bodyClick{height:100%;width:calc(100% - 260px);position:fixed;opacity:0;top:0;left:0;content:"";z-index:9999;overflow-x:hidden}.social-line .btn{margin:0 0 10px 0}.subscribe-line .form-control{margin:0 0 10px 0}.social-line.pull-right{float:none}.footer nav.pull-left{float:none!important}.footer:not(.footer-big) nav>ul li{float:none}.social-area.pull-right{float:none!important}.form-control+.form-control-feedback{margin-top:-8px}.navbar-toggle:hover,.navbar-toggle:focus{background-color:transparent!important}.btn.dropdown-toggle{margin-bottom:0}.media-post .author{width:20%;float:none!important;display:block;margin:0 auto 10px}.media-post .media-body{width:100%}.navbar-collapse.collapse{height:100%!important}.navbar-collapse.collapse.in{display:block}.navbar-header .collapse,.navbar-toggle{display:block!important}.navbar-header{float:none}.navbar-nav .open .dropdown-menu{position:static;float:none;width:auto;margin-top:0;background-color:transparent;border:0;-webkit-box-shadow:none;box-shadow:none}.navbar-collapse .nav p{font-size:14px;margin:0}.navbar-collapse [class^="pe-7s-"]{float:left;font-size:20px;margin-right:10px}}@media(min-width:992px){.table-full-width{margin-left:-15px;margin-right:-15px}.table-responsive{overflow:visible}.navbar-nav p{line-height:normal;margin:0}}@media(max-width:991px){.table-responsive{width:100%;margin-bottom:15px;overflow-x:scroll;overflow-y:hidden;-ms-overflow-style:-ms-autohiding-scrollbar;-webkit-overflow-scrolling:touch}}</style>
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
                    <a class="navbar-brand" href="#" style="color:#101D25;"><b>Vcare Systems</b></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="dashboard.php" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>

                        
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a onclick="openCity(event,'pic')">
                               <p style="color:#101D25;">My Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                        
                        <li>
                            <a href="logoutadmin.php?logout">
                                <p style="color:#101D25;">Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
			<style>
        #notification_count {
			font-weight:bold
            padding: 4px;
            color: #ffffff;
            font-weight: bold;
            border-radius: 9px;
            -moz-border-radius: 9px;
            -webkit-border-radius: 9px;
            position: absolute;
            margin-top: -1px;
            font-size: 12px;
        }
    </style>

    <script src="../js/twitnotif2.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        function addmsg(type, msg) {

            $('#notification_count').html(msg);
        }

        function waitForMsg() {

            $.ajax({
                type: "GET",
                url: "meleck.php",

                async: true,
                cache: false,
                timeout: 2,

                success: function(data) {
                    addmsg("new", data);
                    setTimeout(
                        waitForMsg,
                        0
                    );
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    addmsg("error", textStatus + " (" + errorThrown + ")");
                    setTimeout(
                        waitForMsg,
                        2);
                }
            });
        };

        $(document).ready(function() {

            waitForMsg();

        });
    </script>
	
        </nav>
<div class="content">
<br><br>
<iframe src="dash/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>

</div>
<footer class="footer">
<div class="container-fluid">
<p class="copyright pull-right" style="color:#FFA500;">
&copy; <script>document.write(new Date().getFullYear());</script>Viswa Technology Solutions
</p>
</div>
</footer>
</div>
<div id="kota" class="mainpanel">
<br><br>
<iframe src="kota/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="complain" class="mainpanel">
<br><br>
<iframe src="complain/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="dash" class="mainpanel">
<br><br>
<iframe src="dash/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="order" class="mainpanel">
<br><br>
<iframe src="dash/smart.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="toko" class="mainpanel">
<br><br>
<iframe src="barang/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="car" class="mainpanel">
<br><br>
<iframe src="mobil/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="billing" class="mainpanel">
<br><br>
<iframe name="right" src="board/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
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
<div id="narasumber" class="mainpanel">
<br><br>
<iframe src="narasumber/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="invoice" class="mainpanel">
<br><br>
<iframe name="PIK" src="invoice/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="document" class="mainpanel">
<br><br>
<iframe src="document/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="maps" class="mainpanel">
<br><br>
<iframe src="maps/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="voucher" class="mainpanel">
<br><br>
<iframe src="voucher/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="tarif" class="mainpanel">
<br><br>
<iframe src="tarif/upadatetarif.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="paymentpro" class="mainpanel">
<br><br>
<iframe src="payment/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="notifikasi" class="mainpanel">
<br><br>
<iframe name="Mit" src="notifikasi/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="zona" class="mainpanel">
<br><br>
<iframe src="zona/index.php" style="width:100%;height:725px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
    <script>
function refreshIframe() {
    var ifr = document.getElementsByName('Right')[0];
    ifr.src = ifr.src;
}
function refreshIframe() {
    var ifr = document.getElementsByName('Mit')[0];
    ifr.src = ifr.src;
}
function refreshIframe() {
    var ifr = document.getElementsByName('PIK')[0];
    ifr.src = ifr.src;
}
    </script>
<script>/*<![CDATA[*/function openCity(b,c){var e,a,d;a=document.getElementsByClassName("mainpanel");for(e=0;e<a.length;e++){a[e].style.display="none"}d=document.getElementsByClassName("tablinks");for(e=0;e<d.length;e++){d[e].className=d[e].className.replace(" active","")}document.getElementById(c).style.display="block";b.currentTarget.className+=" active"}document.getElementById("defaultOpen").click();/*]]>*/</script>
</div>
</body>

<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM"></script>
<script src="assets/js/chartist.min.js"></script>
<script src="assets/js/bootstrap-notify.js"></script>
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<script src="assets/js/demo.js"></script>
<script type="text/javascript">/*<![CDATA[*/$(document).ready(function(){demo.initChartist();$.notify({icon:"pe-7s-gift",message:"Welcome to <b>barisandata Administrator</b> - Thanks for login."},{type:"info",timer:})});/*]]>*/</script>
</html>
<style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script>
