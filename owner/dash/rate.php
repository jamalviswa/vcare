<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"><meta name="viewport"content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div style="color:grey:font-size 13px;margin:10px;"><br><br><br>
Berikan Rating untuk Surveyor atau Biro Jasa Anda, Rating Memberikan motivasi kepada Surveyor atau Biro Jasa  agar lebih semangat dalam melayani klien. Klik Bintang ...
</div>
<?php
ob_start();
include("dbconnect.php");
?>
<script src="rating.js"></script>
<script type="text/javascript" >
function sendRate(sel){
	alert("Your rating was: "+sel.title);
}
function showCustomer(str)
{
var xmlhttp; 
if (str.title=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
s = str.name.replace("_", '');
xmlhttp.open("GET","rate-ajax.php?rate="+str.title+"&id="+s,true);
xmlhttp.send();
}
</script> 
<link href="ratings.css" rel="stylesheet" />
<?php
//enter the post_id or article or product which has to be rated 
$post_id = $_GET['id_mitra'];
$id=$post_id;
$query=mysqli_query($mysqli, "select * from ratings where art_id='$id'");
$query1=mysqli_fetch_array($query);
$total_votes=$query1['total_votes'];
$total_points=$query1['total_points'];
$ratings=$total_points/$total_votes;
$rates=round($ratings);
?>
<div class="container">
  <div id="rateMe">
  <?php
  for($i=1;$i<=5;$i++)
  {
	  switch($i)
	  {
		case 1:
		$title="Very Poor";
		$star=1;
		break;
		case 2:
		$title="Poor";
		$star=2;
		break;
		case 3:
		$title="Good";
		$star=3;
		break;
		case 4:
		$title="Very Good";
		$star=4;
		break;
		case 5:
		$title="Excellent";
		$star=5; 
		break; 
	  }
		$starred="";
		if($star<=$rates)
		{
		$starred="class='on'";
		}
  		echo "<a onClick='rateIt(this)' id='_".$i."' title='".$title."' onMouseOver='rating(this)' onMouseOut='off(this)'".$starred." name=".$post_id."></a>";
  }
  if($rates!=0)
  {
  }
  else
  {
  }
  ?>
    <span id="rateStatus"></span>
    <span id="ratingSaved"></span>
  </div>
</div>
<center><button onclick="history.back()">Selesai</button></center>