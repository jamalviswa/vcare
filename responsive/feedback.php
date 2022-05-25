<!DOCTYPE html>
<html>
<head>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!--  CSS for Demo PuUSD se, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
  
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    background-color:white;font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  top: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=file] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=file]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}





</style>
</head>
<body>


<table><tr>
<td width="25%" style="padding:20px;background:none">
<center></center>
</td>
<td width="25%"style="padding:20px;background:none">
<center>
  
   
</td>
</tr></table>
<br/><br>
</head>
<body>
<table class="table table-bordered" style="font-size:12px;" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                          <button style="width:10%;padding:14px;color:#FFA500;background:#101D25;border-radius:20px;" class="open-button" onclick="openForm()">Add banner</button>
<th style="background:#fff;color:#101D25;"><b></b>S.no</b></th>
<th style="background:#fff;color:#101D25;"><b>Name</b></th>
<th style="background:#fff;color:#101D25;"><b>Date</b></th>
<th style="background:#fff;color:#101D25;"><b>service</b></b></th>
<th style="background:#fff;color:#101D25;"><b>Service Starts</b></th>
<th style="background:#fff;color:#101D25;"><b>Service Ends</b></th>
<th style="background:#fff;color:#101D25;"><b>status</b></th>
		<th style="background:#fff;color:#101D25;"><b>Action</b></th>
		
	</thead>









	<?php 
	include_once '../dbconnect.php';
	$res1=mysqli_query($mysqli, "SELECT * FROM driverfb");
    $count = 0;
	while($res = mysqli_fetch_array($res1)) { 	
     $count ++; 
		echo "<tr>";
		echo  "<td>"."$count". "</td>";
	   echo "<td>".$res['name']."</td>";
	    echo "<td>".$res['datecr']."</td>";
	     echo "<td>".$res['service']."</td>";
	      echo "<td>".$res['intime']."</td>";
	       echo "<td>".$res['outime']."</td>";
	      echo "<td>".$res['status']."</td>";
	      
	
	
	
	
		echo "<td width=10%> <a style=padding:5px;color:#fff;background:red href=\"delete1.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a><br><br>
		
		</td>";	
	}
	?>

</table>

<div class="form-popup" id="myForm">
  <form action="actionfile.php" class="form-container" method="post" enctype="multipart/form-data">
   

    <label for="email"><b>Enter imagename</b></label>
    <input type="text" placeholder="Enter name" name="username" required>
	<article>
    <label for="email"><b>image file</b></label>
    <input type="file" size="99999" id="imege" name="image" required=required>
     <output id="result" />
     	</article>
<br><br></br>
    <button type="submit" class="btn">upload</button>
    <button type="button" class="btn cancel" onclick="closeForm()">cancel</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>
