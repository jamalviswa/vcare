<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name=viewport content="width=device-width, initial-scale=1">
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0"><link rel="stylesheet"type="text/css"href="../demo.css"/><link rel="stylesheet"href="../css/bemo.css"><link rel="stylesheet"href="../dist/ladda.min.css"></head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
<body style="background: #fafafa;font-family:segoe UI light"><br><br><br>
<div style="background: #fff;
    -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    display: block;
    margin: 0 auto;
    min-height: 0;
    width: 85%;">
<?php 
include_once 'dbconnect.php';
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id='" . $_GET["id_users"] . "'");
$row= mysqli_fetch_array($result);
?>
<center><h4 style="border-bottom:1px solid grey;color:grey;padding:10px">Ijin Akses</h4>
<table width="100%"><tr><td style="font-family:segoe UI light;padding:10px;font-size:12px;color:#444;font-weight:bold"width="100%">
<center>Anda akan menghubungi <?php echo $row['first_name'];?>: <br>
Ke Nomor: <?php echo $row['phone']; ?>.<br><small style="font-family:segoe UI light;color:grey">Panggilan ini akan dikenakan biaya dan tarif dari operator seluler</small>
</center></td></tr><tr><td width="100%"><center><a href="tel:<?php echo $row['phone']; ?>" ><i style="font-size:150;color:green" class="fa fa-phone-square" aria-hidden="true"></i></a></center>
<br><br></td></tr>
<tr style="border-top:1px solid grey"><td style="border-top:2px solid grey" width="100%"><br><center><b><small><img src="wa.png" width="50px" style="padding:10px;vertical-align:middle"/><a style="border-radius:10px;border:2px solid #09c;font-family:segoe UI light;padding:10px;color:#09c;text-decoration:none;underline:none" href="https://wa.me/+62<?php echo $row['phone']; ?>?text=Halo, %20Saya%20driver%20jemput%20anda%20via%20aplikasi%20Trol" > WA : <?php echo $row['phone']; ?></b></small></a></center>
</td></tr></table>
</center><br></div></div>
</body>