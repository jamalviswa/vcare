
<head>
<meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1">
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:#000;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:0;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}</style>
</head><body onkeydown="javascript:if(window.event.keyCode==13)window.event.keyCode=9">
<div id="home"class="panel"style="color:#000"><div class="content">
<?php
include_once("../dbconnect.php");
if(isset($_POST['tambah'])) {	
if (empty($_POST['namabank'])) {
   ?>
<script>window.alert("Please complete form..");document.location.href="index.php";</script><?php
  return false;
}
if (empty($_POST['norek'])) {
   ?>
<script>window.alert("Please complete form..");document.location.href="index.php";</script><?php
  return false;
}if (empty($_POST['namaorang'])) {
   ?>
<script>window.alert("Please complete form..");document.location.href="index.php";</script><?php
  return false;
}
$namabank = $_POST['namabank'];
$jambuka = $_POST['jambuka'];
$norek = $_POST['norek'];
$namaorang = $_POST['namaorang'];
$result = mysqli_query($mysqli, "INSERT INTO infobank(namabank, namaorang, norek, jambuka) VALUES('$namabank', '$namaorang', '$norek', '$jambuka')");?>
<script>document.location.href="index.php";</script><?php } ?>


    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
	
        <div class="content" style="padding:10px;">
            <div class="container-fluid">
                <div class="row" style="margin-left:0;margin-right:0;">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Data Bank Account</h4>
                            </div>
                            <div class="content">
                                <form id="form"action="<?php echo $_SERVER['PHP_SELF']?>"method="post" style="padding:10px;">
                                    <div class="row">
                                     
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Bank name</label>
                                                <input type="text" class="form-control" name="namabank" required placeholder="Bank example (HSBC, CIMB, BCA)">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Branch Bank</label>
                                                <input type="text" name="jambuka" class="form-control" placeholder="Branch">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Account Number</label>
                                                <input type="number" name="norek" class="form-control" required placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Owner Name</label>
                                                <input type="text" name="namaorang" class="form-control" required placeholder="Owner name">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit"name="tambah" class="btn btn-info btn-fill pull-right">save</button>
                                    <br><br>
                                    </div>

                              
                                   <div class="clearfix"></div>
                                </form>
                            </div>
							
						<center>
						
<a href="index.php"style="color:orange">Cancel</a><br><br>
						</center>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</body>