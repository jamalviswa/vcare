<!DOCTYPE html>
<html>
<head>
<title>Smart Technology</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
if(isset($_POST['submit1'])){
$user = $_POST['user'];
$senderid = $_POST['senderid'];
$channel = $_POST['channel'];
$DCS = $_POST['DCS'];
$flashsms = $_POST['flashsms'];
$number = $_POST['number'];
$message = $_POST['message'];
$route = $_POST['route'];
$ch=curl_init('http://sms.weedirect.in/api/mt/SendSMS?APIKEY='.$user.'&senderid='.$senderid.'&channel='.$channel.'&DCS='.$DCS.'&flashsms='.$flashsms.'&number='.$number.'&text='.$message.'&route='.$route.'');
$data = curl_exec($ch);
print($data); /* result of API call*/
}
?>
<body>
<div class="container">
<h2>Send Message Using APIKEY</h2>
<form method="post" action="">
<div class="form-group">
<label for="api">API:</label>
<input type="text" id="TextBox1" name="" value="http://sms.weedirect.in/api/mt/SendSMS?" readonly="readonly" class="form-control">
</div>
<div class="col-md-6">
<div class="form-group">
<label for="apikey">APIKey:</label>
<input id="TextBox2" type="text" name="user" value="" class="form-control" placeholder="Enter APIKey">
</div>
<div class="form-group">
<label for="senderid">Sender ID</label>
<input id="TextBox3" type="text" name="senderid" value="WEBSMS" class="form-control">
</div>
<div class="form-group">
<label for="channel"> Channel</label>
<input id="TextBox4" type="text" name="channel" value="" class="form-control" placeholder="Enter Channel(Promo/Trans)">
</div>
<div class="form-group">
<label for="route">Route:</label>
<input id="TextBox9" type="text" name="route" value="1" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="dcs">DCS</label>
<input id="TextBox5" type="text" name="DCS" value="0" class="form-control">
</div>
<div class="form-group">
<label for="flashsms">FlashSMS</label>
<input id="TextBox6" type="text" name="flashsms" value="0" class="form-control">
</div>
<div class="form-group">
<label for="mobnumber">MobileNo:</label>
<input id="TextBox7" type="text" name="number" value="" class="form-control" placeholder="Enter MobileNo">
</div>
<div class="form-group">
<label for="msg">Message:</label>
<input id="TextBox8" type="text" name="message" value="" class="form-control" placeholder="Enter Message">
</div>
</div>
<input type="submit" name="submit1" value="submit" class="btn btn-default">
</form>
</div>
</body>