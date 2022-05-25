
<style>
body {
    background-color:white;font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
</style>
<body>
<?php 	

include_once '../dbconnect.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST)
{	

	$username 		= $_POST['username'];
    $image = $_POST['image'];
	$type = $_FILES['image']['name'];
	$type = $type[count($type)-1];		
	$url = '../taxi/imgtaxi/'.uniqid(rand()).'.'.$type;

		    
	
	$image = $_POST['image'];
	if(empty($_FILES['image']['name']))
	{
		$image=$_POST['image'];
	}else{
		$image=$_FILES['image']['name'];
		//definisikan variabel file dan kendaraan file
		$uploaddir='../imagephoto/';
		$kendaraanfile=$uploaddir.$image;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['image']['tmp_name'],$kendaraanfile);
	}
		
		if(mysqli_query($mysqli, "INSERT INTO imagestore(name,image)VALUES('$username', '$image')"))
		{
			?>
	<script>document.location.href="index1.php";</script>
			<?php
		}
		else
		{
			?><div style="color: #F0;">Server is busy trafic</div><?php
		}		
}
	else{
			?><div style="color: #F0;">Name or product already registered</div><?php
	}
	die();

	
	
		    
		   

		    
		    
		    
		?>
	<script>document.location.href="index1.php";</script>
			<?php
		
	
			?><div style="color: #F0;">Server is busy trafic</div><?php
		
	$mysqli->close();

	echo json_encode($valid);
 

?>

</body>
</html>	