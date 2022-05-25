<?php
session_start();
include_once '../dbconnect.php';
?>
<?php 

$yer=mysqli_query($mysqli, "SELECT * FROM billingrate where account='".$_GET["account"]."' order by idbilling limit 1");
$mala=mysqli_fetch_array($yer);
$kaka=mysqli_query($mysqli, "SELECT * FROM users where nomoUSD langgan='".$_GET["account"]."'");
$rows=mysqli_fetch_array($kaka);
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
	<b><?php echo $rows['first_name'];?><br>
	<?php echo $rows['coUSD ratename'];?></b><br>
	<?php echo $rows['brandcoUSD rate'];?><br>
	<?php echo $rows['alamatkantor1'];?><br>
	<?php echo $rows['alamatkantor2'];?><br>
	<?php echo $rows['alamatkantor3'];?><br>
	<?php echo $rows['alamatkantor4'];?><br>
	
	<br><br>
	</td>
    <td style="text-align:left;vertical-align:middle"width="50%"><br><br>
	<b>LEMBAR TAGIHAN<br><i style="color:grey">BILLING STATEMENT</i></b><br><br>
<b>PT. Meissa Berkah Teknologi</b><br>
Dwijaya Plaza Blok H<br>
Jl. Dwijaya Raya No.1<br>
Radio Dalam – Kebayoran Baru <br>
Jakarta Selatan 12140<br>
Tlp. (021) 30068819
	
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
<table width="100%" class="tg">
  <tr>
    <th class="tg-izx2">Nama Perusahaan / <span style="font-style:italic;color:grey;">CoUSD rate Name</span></th>
    <th class="tg-izx2"><?php echo $rows['coUSD ratename'];?></th>
    <th class="tg-y6fn">Tanggal Cetak<br><span style="font-style:italic;color:grey;float:right">Print Date</span></th>
  </tr>
  <tr>
    <td class="tg-izx2">Layanan / <span style="font-style:italic;color:grey;">Services</span></td>
    <td class="tg-izx2"><?php echo $mala['nameservice'];?></td>
    <td class="tg-baqh"><?php echo date('d-m-Y');?></td>
  </tr>
  <tr>
    <td class="tg-izx2">Tagihan Bulan Ini / <span style="font-style:italic;color:grey;">Curent Bill</span></td>
    <td class="tg-izx2">USD  <?php $utilisasike=$sendal['totharga']; $utilisasikan = number_format($utilisasike,0,",","."); echo $utilisasikan; ?>,-</td>
    <td class="tg-y6fn">Nomor Tagihan<br><span style="font-style:italic;color:grey;float:right">Invoice Number</span></td>
  </tr>
  <tr>
    <td class="tg-kftd">Total Tagihan / <span style="font-style:italic;color:grey;">Total bill</span></td>
    <td class="tg-kftd">USD  <?php $utilisasike=$sendal['totharga']; $utilisasikan = number_format($utilisasike,0,",","."); echo $utilisasikan; ?>,-</td>
    <td class="tg-baqh"><?php echo $mala['idbilling'];?></td>
  </tr>
  <tr>
    <td class="tg-kftd">PPN 10% / <span style="font-style:italic;color:grey;">VAT 10%</span></td>
    <td class="tg-kftd">USD  <?php $utilisasike=$sendal['totharga']; $perkalian=$utilisasike*10/100; $semprot = number_format($perkalian,0,",","."); echo $semprot; ?>,-</td>
    <td class="tg-y6fn">Nomor Pelanggan<br><span style="font-style:italic;color:grey;float:right">Customer ID Number</span></td>
  </tr>
  <tr>
    <td class="tg-kftd">Materai / <span style="font-style:italic;color:grey;">Stamp Duty</span></td>
    <td class="tg-kftd">USD  6,-</td>
    <td class="tg-baqh"><?php echo $rows['nomoUSD langgan'];?></td>
  </tr>
  <tr>
    <td class="tg-kftd">Total yang harus dibayar / <span style="font-style:italic;color:grey;">Amount Due to be Paid</span></td>
    <td class="tg-kftd">USD  <?php $rutin=$utilisasike+$perkalian+; $semok = number_format($rutin,0,",","."); echo $semok; ?></td>
    <td class="tg-y6fn">Nomor Layanan<br><span style="font-style:italic;color:grey;float:right">Service ID Number</span></td>
  </tr>
  <tr>
    <td class="tg-baqh" style="border-bottom: 1px solid #fff;"colspan="2">Terbilang :</td>
    <td class="tg-baqh">
<?php
$description=$rows['description'];
$pesul = mysqli_query($mysqli, "SELECT * FROM kota WHERE namakota like '%".$description."%'");
$pow= mysqli_fetch_array($pesul);
$idzona=$pow['idzonakota'];
echo $idzona;
?>
	<?php 
function terbilang($bilangan) {

  $angka = array('0','0','0','0','0','0','0','0','0','0',
                 '0','0','0','0','0','0');
  $kata = array('','satu','dua','tiga','empat','lima',
                'enam','tujuh','delapan','sembilan');
  $tingkat = array('','ribu','juta','milyar','triliun');

  $panjang_bilangan = strlen($bilangan);

  /* pengujian panjang bilangan */
  if ($panjang_bilangan > 15) {
    $kalimat = "Diluar Batas";
    return $kalimat;
  }

  /* mengambil angka-angka yang ada dalam bilangan,
     dimasukkan ke dalam array */
  for ($i = 1; $i <= $panjang_bilangan; $i++) {
    $angka[$i] = substr($bilangan,-($i),1);
  }

  $i = 1;
  $j = 0;
  $kalimat = "";


  /* mulai proses iterasi terhadap array angka */
  while ($i <= $panjang_bilangan) {

    $subkalimat = "";
    $kata1 = "";
    $kata2 = "";
    $kata3 = "";

    /* untuk ratusan */
    if ($angka[$i+2] != "0") {
      if ($angka[$i+2] == "1") {
        $kata1 = "seratus";
      } else {
        $kata1 = $kata[$angka[$i+2]] . " ratus";
      }
    }

    /* untuk puluhan atau belasan */
    if ($angka[$i+1] != "0") {
      if ($angka[$i+1] == "1") {
        if ($angka[$i] == "0") {
          $kata2 = "sepuluh";
        } elseif ($angka[$i] == "1") {
          $kata2 = "sebelas";
        } else {
          $kata2 = $kata[$angka[$i]] . " belas";
        }
      } else {
        $kata2 = $kata[$angka[$i+1]] . " puluh";
      }
    }

    /* untuk satuan */
    if ($angka[$i] != "0") {
      if ($angka[$i+1] != "1") {
        $kata3 = $kata[$angka[$i]];
      }
    }

    /* pengujian angka apakah tidak nol semua,
       lalu ditambahkan tingkat */
    if (($angka[$i] != "0") OR ($angka[$i+1] != "0") OR
        ($angka[$i+2] != "0")) {
      $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
    }

    /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
       ke variabel kalimat */
    $kalimat = $subkalimat . $kalimat;
    $i = $i + 3;
    $j = $j + 1;

  }

  /* mengganti satu ribu jadi seribu jika diperlukan */
  if (($angka[5] == "0") AND ($angka[6] == "0")) {
    $kalimat = str_replace("satu ribu","seribu",$kalimat);
  }

  return trim($kalimat);

} 
?></td>
  </tr>
  <tr>
    <td class="tg-0lax" style="vertical-align:middle"colspan="2"><center><?php echo terbilang($rutin);?> rupiah</center>
	</td>
     <td class="tg-y6fn">NPWP Pelanggan<br><span style="font-style:italic;color:grey;float:right">Cust. Tax Reg number</span></td>
  
  </tr>
 <tr>
    <td class="tg-0lax" colspan="2">Harap Lakukan Pembayaran Sejumlah Tagihan Kepada :<br><span style="font-style:italic;color:grey;">Please Transfer Full Amount to</span><br><br>PT. Meissa Berkah Teknologi<br>BCA, Pondok Indah, Jakarta Selatan <br>A/C: 4980 372222 (a/n Meissa Berkah Teknologi)<br></td>
    <td class="tg-baqh"><?php echo $rows['npwp'];?></td>
  </tr>
  <tr>
    <td class="tg-0lax" colspan="2">Cantumkan Nomor Layanan dan Nama Pelanggan (di kolom berita) pada saat melakukan pembayaran.<br><span style="font-style:italic;color:grey;">insert Tax Service and Customer Name at the time of payment</span></td>
    <td class="tg-y6fn">Periode pemakaian<br><span style="font-style:italic;color:grey;">Usage Period</span></td>
  </tr>
  <tr>
    <td class="tg-0lax" colspan="2">Tidak sampainya lembar tagihan ini tidak menghapus kewajiban pelanggan untuk membayar tagihan.<br><span style="font-style:italic;color:grey;">Not received  this invoice the customer does not remove the obligation to pay the bill</span></td>
    <td class="tg-baqh"><?php echo date('M');?> <?php echo date('Y');?></td>
  </tr>
  <tr>
    <td class="tg-0lax" colspan="2">Jika melakukan pembayaran untuk beberapa Nomor Pelanggan sekaligus, harap mengirimkan rincian tiap-tiap Nomor Pelanggan, <br>melalui email ke admin@profitgm.com<br><span style="font-style:italic;color:grey;">If you make payments to some customers as well number, please send the details of each customer number, </span><br><span style="font-style:italic;color:grey;">via email to admin@profitgm.com</span></td>
    <td class="tg-y6fn">Akhir Pembayaran<br><span style="font-style:italic;color:grey;">Due Date</span></td>
  </tr>
  <tr>
    <td class="tg-0lax" colspan="2">Keterlambatan dan ketidakjelasan data pembayaran dapat mengakibatkan terblokirnya layanan anda.<br><span style="font-style:italic;color:grey;">Delays and lack of payment data may result in blocking your service</span></td>
    <td class="tg-baqh">25 <?php echo date('M',strtotime('first day of +1 month'));?> <?php echo date('Y');?></td>
  </tr>
  <tr>
    <td class="tg-0lax" colspan="2"></td>
    <td class="tg-y6fn">Hubungi kami<br><span style="font-style:italic;color:grey;">Contact Us</span></td>
  </tr>
  <tr>
    <td class="tg-0lax" colspan="2"></td>
    <td class="tg-0lax">Email: admin@profitgm.com</td>
  </tr>
</table>

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
