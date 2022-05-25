<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO brand (namalapangan,image) 
			VALUES (:namalapangan,:image)
		");
		$result = $statement->execute(
			array(
				':namalapangan'	=>	$_POST["namalapangan"],
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE brand 
			SET namalapangan = :namalapangan, image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':namalapangan'	=>	$_POST["namalapangan"],
				':image'		=>	$image,
				':id'			=>	$_POST["id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Berhasil di Update';
		}
	}
}

?>