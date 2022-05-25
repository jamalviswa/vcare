<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
if(isset($_POST['submit']))
{
	$nama_mobil = mysqli_real_escape_string($mysqli, $_POST['nama_mobil']);
	$merkmobil = mysqli_real_escape_string($mysqli, $_POST['merkmobil']);
	$deskripsimobil = mysqli_real_escape_string($mysqli, $_POST['deskripsimobil']);
	$harga_12jam = mysqli_real_escape_string($mysqli, $_POST['harga_12jam']);
	$harga_24jam = mysqli_real_escape_string($mysqli, $_POST['harga_24jam']);
	$pemilikmobil = mysqli_real_escape_string($mysqli, $_POST['pemilikmobil']);
	$gambarmobil = mysqli_real_escape_string($mysqli, $_POST['gambarmobil']);
	$jenisbahanbakar = mysqli_real_escape_string($mysqli, $_POST['jenisbahanbakar']);
	$alamat_barang = mysqli_real_escape_string($mysqli, $_POST['alamat_barang']);
	$ada = mysqli_real_escape_string($mysqli, $_POST['ada']);
	$plat = mysqli_real_escape_string($mysqli, $_POST['plat']);
	$kursi = mysqli_real_escape_string($mysqli, $_POST['kursi']);
	$pintu = mysqli_real_escape_string($mysqli, $_POST['pintu']);
	$hargasopir = mysqli_real_escape_string($mysqli, $_POST['hargasopir']);
	$fitur = mysqli_real_escape_string($mysqli, $_POST['fitur']);
	$tipetransmisi = mysqli_real_escape_string($mysqli, $_POST['tipetransmisi']);
	$kecamatan = mysqli_real_escape_string($mysqli, $_POST['kecamatan']);
	$tahun = mysqli_real_escape_string($mysqli, $_POST['tahun']);
	$warna = mysqli_real_escape_string($mysqli, $_POST['warna']);
	$bagasi = mysqli_real_escape_string($mysqli, $_POST['bagasi']);
	$singleac = mysqli_real_escape_string($mysqli, $_POST['singleac']);
	$doubleac = mysqli_real_escape_string($mysqli, $_POST['doubleac']);
	$chargerhp = mysqli_real_escape_string($mysqli, $_POST['chargerhp']);
	$audio = mysqli_real_escape_string($mysqli, $_POST['audio']);
	$entertainment = mysqli_real_escape_string($mysqli, $_POST['entertainment']);
	$airbag = mysqli_real_escape_string($mysqli, $_POST['airbag']);
	$teUSD l = mysqli_real_escape_string($mysqli, $_POST['teUSD l']);
	$bancadangan = mysqli_real_escape_string($mysqli, $_POST['bancadangan']);
	$jenismobil = mysqli_real_escape_string($mysqli, $_POST['jenismobil']);
	$kodeafiliasi = mysqli_real_escape_string($mysqli, $_POST['kodeafiliasi']);
	$tipeads = mysqli_real_escape_string($mysqli, $_POST['tipeads']);
	$harga1jam = mysqli_real_escape_string($mysqli, $_POST['harga1jam']);
	$harga6jam = mysqli_real_escape_string($mysqli, $_POST['harga6jam']);
	$harga1bulan = mysqli_real_escape_string($mysqli, $_POST['harga1bulan']);
	$plat = trim($plat);
	// email exist or not
	$query = "SELECT * FROM car WHERE plat='$plat'";
	$result = mysqli_query($mysqli, $query);
	
	$count = mysqli_num_rows($result); // if email not found then register
	
	
	if($count == 0){
		
	$gambarmobil = $_POST['gambarmobil'];
	if(empty($_FILES['gambarmobil']['name'])){
		$gambarmobil=$_POST['gambarmobil'];
	}else{
		$gambarmobil=$_FILES['gambarmobil']['name'];
		//definisikan variabel file dan kendaraan file
		$uploaddir='../fotobarang/';
		$kendaraanfile=$uploaddir.$gambarmobil;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['gambarmobil']['tmp_name'],$kendaraanfile);
	}
		
		if(mysqli_query($mysqli, "INSERT INTO `car` (`nama_mobil`, `merkmobil`, `deskripsimobil`, `harga_12jam`, `harga_24jam`, `pemilikmobil`, `gambarmobil`, `jenisbahanbakar`, `alamat_barang`, `ada`, `kursi`, `pintu`, `hargasopir`, `fitur`, `tipetransmisi`, `plat`, `kecamatan`, `tahun`, `warna`, `bagasi`, `singleac`, `doubleac`, `chargerhp`, `audio`, `entertainment`, `airbag`, `teUSD l`, `bancadangan`, `jenismobil`, `kodeafiliasi`, `tipeads`, `harga1jam`, `harga6jam`, `harga1bulan`) VALUES ('$nama_mobil', '$merkmobil', '$deskripsimobil', '$harga_12jam', '$harga_24jam', '$pemilikmobil', '$gambarmobil', '$jenisbahanbakar', '$alamat_barang', '1', '$kursi', '$pintu', '$hargasopir', '$fitur', '$tipetransmisi', '$plat', '$kecamatan', '$tahun', '$warna', '$bagasi', '$singleac', '$doubleac', '$chargerhp', '$audio', '$entertainment', '$airbag', '$teUSD l', '$bancadangan', '$jenismobil', '$kodeafiliasi', '1', '$harga1jam', '$harga6jam', '$harga1bulan');"))
		{
			?>
	<script>document.location.href="index.php";</script>
			<?php
		}
		else
		{
			?><div style="color: #F0;">Server Sibuk,Coba Ulangi</div><?php
		}		
	}
	else{
			?><div style="color: #F0;">Nama Product sudah ada dalam database</div><?php
	}
	
}
?>
<html>
<head>
	<title>Add Data</title>
</head>
<body style="font-family:Segoe UI light;margin-left:70px;margin-right:70px">
<form id="form"action="add.php" enctype="multipart/form-data"  method="post" name="postform">

<table style="width:100%;padding:10px">
  <tr style="padding:10px">
    <th colspan="4" style="padding:10px"><center><b style="padding:10px">Tambah Data Mobil yang disewakan</b></center></th>
  </tr>
 <tr>
    <th colspan="2" rowspan="15" style="background: url(duk.png)no-repeat,#dadada;
    background-position: center top;
    background-size: 80% auto;padding:10px;background-color:#dadada"><center>
		<article>
        <label for="files">Tambahkan Foto Utama Mobil: </label>
        <input size="999999" required="required" name="gambarmobil" id="files" type="file"/>
        <output id="result" />
    </article>
  <style>

  article
{
    width: 80%;
    margin:auto;
    margin-top:10px;
}


.thumbnail{

    width: 300px;height: auto;
    margin: 10px;    
}

  </style>
  <script>
  window.onload = function(){
        
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("files");
        
        filesInput.addEventListener("change", function(event){
            
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                
                //Only pics
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                    
                    var div = document.createElement("div");
                    
                    div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>";
                    
                    output.insertBefore(div,null);            
                
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}
    
  </script></center>
	</th>
  </tr>
<tr>
    <td style="padding:10px;background:#dadada">
	Apa Nama Mobil/Judul iklan :</td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="text" name="nama_mobil" placeholder="Nama Mobil" required="required"></td>
  </tr>
<tr>
    <td style="padding:10px;border:1px solid grey">
	<input style="padding:10px;width:100%"type="text" name="merkmobil" placeholder="Model/Merek" required="required"></td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="text" name="warna" placeholder="cth: merah-silver" required="required"></td>
  </tr>
 
<tr>
	<td style="padding:10px;border:1px solid grey"><small>Nomor Plat</small><br><input style="padding:10px;width:100%"type="text" name="plat" placeholder="cth: L 3333 MM"></td>
    <td style="padding:10px;border:1px solid grey"><small>Jenis Bahan Bakar</small><br><input style="padding:10px;width:100%" type="text" name="jenisbahanbakar" placeholder="cth: premium/solar" required="required"></td>
    
</tr>
<tr>
	<td style="padding:10px;border:1px solid grey"><small>Tipe Transmisi</small><br><input style="padding:10px;width:100%"type="text" name="tipetransmisi" placeholder="manual/matic/more"></td>
    <td style="padding:10px;border:1px solid grey"><small>Tahun Produksi</small><br><input style="padding:10px;width:100%" type="text" name="tahun" placeholder="cth: 2018" required="required"></td>
    
</tr>
<tr>
	<td style="padding:10px;border:1px solid grey"><small>Jumlah Bagasi</small><br><input style="padding:10px;width:100%"type="number" name="bagasi" placeholder="jumlah bagasi"></td>
    <td style="padding:10px;border:1px solid grey"><small>Jumlah Kursi</small><br><input style="padding:10px;width:100%" type="number" name="kursi" placeholder="berapa kursi" required="required"></td>
    
</tr>
<tr>
	<td style="padding:10px;border:1px solid grey"><small>Single AC</small><br>
	<select style="color:grey"name="singleac" > 
    <option name="singleac"value="yes" required="required">Ada</option>
    <option name="singleac"value="no" required="required">Tidak Ada</option>
    </select>
	</td>
    <td style="padding:10px;border:1px solid grey"><small>Double AC</small><br>	<select style="color:grey"name="doubleac" > 
    <option name="doubleac"value="yes" required="required">Ada</option>
    <option name="doubleac"value="no" required="required">Tidak Ada</option>
    </select></td>
    
</tr>
<tr>
	<td style="padding:10px;border:1px solid grey"><small>Charger HP</small><br>
	<select style="color:grey"name="chargerhp" > 
    <option name="chargerhp"value="yes" required="required">Ada</option>
    <option name="chargerhp"value="no" required="required">Tidak Ada</option>
    </select>
	</td>
    <td style="padding:10px;border:1px solid grey"><small>Ban Cadangan</small><br>	<select style="color:grey"name="bancadangan" > 
    <option name="bancadangan"value="yes" required="required">Ada</option>
    <option name="bancadangan"value="no" required="required">Tidak Ada</option>
    </select></td>
    
</tr>
<tr>
	<td style="padding:10px;border:1px solid grey"><small>Airbag</small><br>
	<select style="color:grey"name="airbag" > 
    <option name="airbag"value="yes" required="required">Ada</option>
    <option name="airbag"value="no" required="required">Tidak Ada</option>
    </select>
	</td>
    <td style="padding:10px;border:1px solid grey"><small>Entertainment</small><br>	<select style="color:grey"name="entertainment" > 
    <option name="entertainment"value="yes" required="required">Ada</option>
    <option name="entertainment"value="no" required="required">Tidak Ada</option>
    </select></td>
    
</tr>
<tr>
	   
</tr>
<tr>
    <td style="padding:10px;background:#dadada">
	Tarif Sewa 1 Jam :</td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="number" name="harga1jam" placeholder="Sewa 1 jam (USD )" required="required"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">
	Tarif Sewa 6 Jam :</td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="number" name="harga6jam" placeholder="Sewa 6 jam (USD )" required="required"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">
	Tarif Sewa 12 Jam :</td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="number" name="harga_12jam" placeholder="Sewa 1 jam (USD )" required="required"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">
	Tarif Sewa 24 Jam :</td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="number" name="harga_24jam" placeholder="Sewa 1 jam (USD )" required="required"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">
	Tarif Sewa 1 bulan :</td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="number" name="harga1bulan" placeholder="Sewa 1 jam (USD )" required="required"></td>
  </tr>
<tr>
   
</tr>
<tr>
   
</tr>
    <th colspan="2" style="padding:10px;background:#dadada"> 
<small>Pemilik mobil</small><br>
<select style="color:grey"name="pemilikmobil" > 
    <option name="pemilikmobil"value="" required="required">Pilih Pemilik mobil</option>
        <?php
		$les=mysqli_query($mysqli, "SELECT * FROM mitra");
            while($moki = mysqli_fetch_assoc($les))
            {
            ?>
            <option name="pemilikmobil" style="color:grey"value="<?php echo $moki['id_mitra'];?>" >
                <b style="color:grey"><?php echo $moki['nama_mitra']; ?></b>
            </option>
            <?php
            }               
        ?>
    </select><br><br>
<small>Alamat lengkap</small><br><input style="padding:10px;width:100%" type="text" name="alamat_barang" placeholder="Alamat pemilik mobil" required="required"><br>
<textarea style="padding:10px;width:100%"type="text" name="deskripsimobil" placeholder="Tulis deskripsi lengkap" required="required"></textarea>
	</th>
			
<td colspan="2" style="padding:10px;background:#dadada">
<center><small>Pastikan data produk yang diinputkan sudah benar, klik Simpan data untuk menyimpan, Setelah itu Show Gallery jika ingin menambahkan Gambar Galery</small><br><br><a href="index.php"><div style="width:200px;border-radius:30px;background:red;border:none;padding:10px;color:#fff" class="testbutton">Batal</div></a>
<br><button style="width:200px;border-radius:30px;background:green;border:none;padding:10px;color:#fff" class="testbutton" type="submit" name="submit" value="Simpan Data">Simpan Data</button></center>
</td>
			</tr>
		</table>
  
		<br>
	</form>
</body>
</html>

