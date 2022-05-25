<?php
session_start();
include_once '../dbconnect.php';
?>
<?php 

$yer=mysqli_query($mysqli, "SELECT * FROM billingrate where account='".$_GET["account"]."' order by idbilling limit 1");
$mala=mysqli_fetch_array($yer);
$kaka=mysqli_query($mysqli, "SELECT * FROM users where nomoUSD langgan='".$_GET["account"]."'");
$_POST=mysqli_fetch_array($kaka);
$binus = mysqli_query($mysqli, "SELECT COUNT(*) as Nos,SUM(durationsecond) as dursec,SUM(harga) as totharga FROM `billingrate` WHERE YEAR(date) = YEAR(NOW( )) AND MONTH(date) = MONTH(NOW( )) and account='".$_GET["account"]."'");
$sendal = mysqli_fetch_array($binus);
?>
<html>
<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<style>
@page {
    size: A4 potrait;
}

@media print
{
    html
    {
        zoom: 67%;
    }
}

</style>

    <!-- Bootstrap core CSS     -->

    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>
<body style="margin:10%;font-family:roboto;font-size:14px;"onkeydown="javascript:if(window.event.keyCode == 13) window.event.keyCode = 9;" onload="window.print()">
<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
   <tr >
    <th style="border-bottom:3px solid #444;font-weight:normal;text-align:left;vertical-align:bottom"width="70%"><b>Informasi Pemakaian jasa CoUSD rate Solution</b><br><small>Service usage information</small><br><br></th>
    <th style="border-bottom:3px solid #444;text-align:center;vertical-align:middle"width="30%"><img src="../logodokumen.jpg" style="max-width:200px"/><br><br></th>
  </tr>
  <tr >
    <td style="text-align:left;vertical-align:middle"width="50%"><br><br>
	
	KEPADA / TO :<br>
	<b><?php echo $_POST['first_name'];?><br>
	<?php echo $_POST['coUSD ratename'];?></b><br>
	<?php echo $_POST['brandcoUSD rate'];?><br>
	<?php echo $_POST['alamatkantor1'];?><br>
	<?php echo $_POST['alamatkantor2'];?><br>
	<?php echo $_POST['alamatkantor3'];?><br>
	<?php echo $_POST['alamatkantor4'];?><br>
	
	<br><br>
	</td>
    <td style="text-align:left;vertical-align:middle"width="50%"><br><br>
	
	<br><br></td>
  </tr>
  <tr>
    <td style="text-align:center;vertical-align:middle" width="100%" colspan="2"><br><br><b><?php echo $mala['tipelayanan'];?></b><br><br></td>
  </tr>
</table>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-kftd{background-color:#efefef;text-align:left;vertical-align:top}
.tg .tg-izx2{background-color:#efefef;text-align:left}
.tg .tg-y6fn{background-color:#c0c0c0;text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>

<div id="editor"></div>
</body>
</html>
<script>
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
</script>
