<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"type="text/css"href="../demo.css"/>
<link href="../style.css"rel="stylesheet">
<meta name="HandheldFriendly"content="True"><meta name="MobileOptimized"content="320">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/bemo.css">
<link rel="stylesheet" href="../dist/ladda.min.css">

<meta name="google-signin-client_id" content="373708387647-0r47vgo06p9jtr29nj4c6ei1b777nejl.apps.googleusercontent.com">
<meta name="google-signin-cookiepolicy" content="single_host_origin" />

<style type="text/css">
.Glogout-link { font-weight: bold; font-size: 18px}
#google_profile_box{ display: none; width: 400px; margin: 0 auto;}
#Gimg { text-align: left;}
.container { background: #fff; width: 80%; margin: 20px auto;}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
</head><body style="margin-top:100px;font-family:segoe UI;padding-right:30px;padding-left:30px;">
<div class="w3-container w3-center w3-animate-top">
<center><img style="padding-right:30px;padding-left:30px;width:200px;height:auto" src="../icon/logo.png"><br><small style="color:#0099cc;font-weight:bold"><br>Login Trol dengan pilihan tersedia</small></center>
</div><br><br>
<div class="w3-container w3-center w3-animate-bottom">
<center>
<section style="padding-right:30px;padding-left:30px;width:100%;padding:0"class="button-demo"><a href="../firli.php#login"><button onclick="javascript:showDiv()" style="background:#0099cc;width:100%;border-radius:5px;height:auto"type="submit"name="btn-login"class="ladda-button"data-color="#0099cc"data-style="expand-right"><small>Login with Phone or Email</small></button></a></section>
<script src="../dist/spin.min.js">
</script>
<script src="../dist/ladda.min.js">
</script></section>
<br>
<div style="width:100%" id="google_login_box">
<div class="g-signin2" data-longtitle="true" data-onsuccess="onSignIn" data-theme="light" data-width="200" data-ux_mode="redirect"></div>
</div><br><br><br>
<script type="text/javascript">
	function onSignIn(googleUser) {
	  var profile = googleUser.getBasicProfile();


      if(profile){
          $.ajax({
                type: 'POST',
                url: 'check_user.php',
                data: {id:profile.getId(), name:profile.getName(), email:profile.getEmail(), picture:profile.getImageUrl()}
            })
			.done(function(data){
                console.log(data);
                window.location.href = '../google-oauth/fdex.php';
            }).fail(function() { 
                alert( "Posting failed." );
            });
      }


    }
</script>
  </center>
<div><center><?php echo $output; ?></center></div>
</div>
</body>
<style>#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script>
