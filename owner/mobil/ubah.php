<?php
session_start();
include_once '../dbconnect.php';
if(!isset($_SESSION['mitra']))
{
	header("Location:../index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);

$id_mobil = $_GET['id_mobil'];
$row=mysqli_fetch_array(mysqli_query($mysqli, "select * from car where id_mobil='$id_mobil'"));
?>
<html>
<head>
	<title>Add Data</title>
</head>
<body style="font-family:Segoe UI light;margin-left:70px;margin-right:70px">
<form id="form"action="simpan.php" enctype="multipart/form-data"  method="post" name="postform">

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
        <input size="999999" name="gambarmobil" id="files" type="file"/>
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
 <input type="hidden" name="id_mobil" value="<?php echo $row['id_mobil'];?>" required="required">
 <tr>
    <td style="padding:10px;background:#dadada">
	Apa Nama Mobil/Judul iklan :</td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="text" name="nama_mobil" value="<?php echo $row['nama_mobil'];?>" placeholder="Nama Mobil" required="required"></td>
  </tr>
<tr>
    <td style="padding:10px;border:1px solid grey">
	<input style="padding:10px;width:100%"type="text" name="merkmobil" placeholder="Nama Product/Model/Tipe" required="required" value="<?php echo $row['merkmobil'];?>"></td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="text" name="warna" placeholder="cth: merah-silver" value="<?php echo $row['warna'];?>" required="required"></td>
  </tr>
 
<tr>
	<td style="padding:10px;border:1px solid grey"><small>Nomor Plat</small><br><input style="padding:10px;width:100%"type="text" name="plat" placeholder="cth: L 3333 MM" value="<?php echo $row['plat'];?>"></td>
    <td style="padding:10px;border:1px solid grey"><small>Jenis Bahan Bakar</small><br><input style="padding:10px;width:100%" type="text" name="jenisbahanbakar" value="<?php echo $row['jenisbahanbakar'];?>" placeholder="cth: premium/solar" required="required"></td>
    
</tr>
<tr>
	<td style="padding:10px;border:1px solid grey"><small>Tipe Transmisi</small><br><input style="padding:10px;width:100%"type="text" name="tipetransmisi" value="<?php echo $row['tipetransmisi'];?>" placeholder="manual/matic/more"></td>
    <td style="padding:10px;border:1px solid grey"><small>Tahun Produksi</small><br><input style="padding:10px;width:100%" type="text" name="tahun" value="<?php echo $row['tahun'];?>" placeholder="cth: 2018" required="required"></td>
    
</tr>
<tr>
	<td style="padding:10px;border:1px solid grey"><small>Jumlah Bagasi</small><br><input style="padding:10px;width:100%"type="number" name="bagasi" value="<?php echo $row['bagasi'];?>" placeholder="jumlah bagasi"></td>
    <td style="padding:10px;border:1px solid grey"><small>Jumlah Kursi</small><br><input style="padding:10px;width:100%" type="number" name="kursi" value="<?php echo $row['kursi'];?>" placeholder="berapa kursi" required="required"></td>
    
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
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="number" name="harga1jam" value="<?php echo $row['harga1jam'];?>" placeholder="Sewa 1 jam (USD )" required="required"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">
	Tarif Sewa 6 Jam :</td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="number" name="harga6jam" value="<?php echo $row['harga6jam'];?>" placeholder="Sewa 6 jam (USD )" required="required"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">
	Tarif Sewa 12 Jam :</td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="number" name="harga_12jam" value="<?php echo $row['harga_12jam'];?>" placeholder="Sewa 12 jam (USD )" required="required"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">
	Tarif Sewa 24 Jam :</td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="number" name="harga_24jam" value="<?php echo $row['harga_24jam'];?>" placeholder="Sewa 1 24 jam (USD )" required="required"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#dadada">
	Tarif Sewa 1 bulan :</td>
    <td style="padding:10px;border:1px solid grey"><input style="padding:10px;width:100%" type="number" name="harga1bulan" value="<?php echo $row['harga1bulan'];?>" placeholder="Sewa 1 bulan (USD )" required="required"></td>
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
<small>Alamat lengkap</small><br><input style="padding:10px;width:100%" type="text" name="alamat_barang" value="<?php echo $row['alamat_barang'];?>" placeholder="Alamat pemilik mobil" required="required"><br>
<textarea style="padding:10px;width:100%"type="text" name="deskripsimobil" value="<?php echo $row['deskripsi'];?>" placeholder="Tulis deskripsi lengkap" required="required"></textarea>
	</th>
			
<td colspan="2" style="padding:10px;background:#dadada">
<center><small>Pastikan data produk yang diinputkan sudah benar, klik Simpan data untuk menyimpan, Setelah itu Show Gallery jika ingin menambahkan Gambar Galery</small><br><br><a href="index.php"><div style="width:200px;border-radius:30px;background:red;border:none;padding:10px;color:#fff" class="testbutton">Batal</div></a>
<br><button style="width:200px;border-radius:30px;background:green;border:none;padding:10px;color:#fff" class="testbutton" type="submit" name="post" value="Simpan Data">Simpan Data</button></center>
</td>
			</tr>
		</table>
  
		<br>
	</form>
</body>
</html>

