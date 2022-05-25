<?php
session_start();
    if(isset($_SESSION['first_name'])){
	    header("Location: page.php");
	}


include ('../dbconnect.php');
if (isset($_POST['formsubmitted'])) {
    // Mulai session
session_start();
    $error = array();//buat array untuk simpan pesan kesalahan
  

    if (empty($_POST['e-mail'])) {//jika email kosonh
        $error[] = 'Silahkan isi email anda ';
    } else {


        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['e-mail'])) {
           
            $Email = $_POST['e-mail'];
        } else {
             $error[] = 'Email anda tidak valid  ';
        }


    }


    if (empty($_POST['Password'])) {
        $error[] = 'Silahkan masukkan password anda ';
    } else {
        $Password = $_POST['Password'];
    }


       if (empty($error))//Jika array kosong, berarti tidak ada kesalahan
    { 

       

        $query_check_credentials = "SELECT * FROM users WHERE (Email='$Email' AND password='$Password') AND forgot_pass_identity IS NULL";
   
        

        $result_check_credentials = mysqli_query($dbc, $query_check_credentials);
        if(!$result_check_credentials){//Jika query gagal
            echo 'Query Failed ';
        }

        if (@mysqli_num_rows($result_check_credentials) == 1)//Jika query berhasil
        { 

           


            $_SESSION = mysqli_fetch_array($result_check_credentials, MYSQLI_ASSOC);//Masukkan hasil ke session
           
            header("Location: page.php");
          

        }else
        { 
            
            $msg_error= 'Mungkin akun anda belum dikativasi atau alamat Email/password salah';
        }

    }  else {
        
        

echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li>'.$values.'</li>';


       
        }
        echo '</ol></div>';

    }
    
    
    if(isset($msg_error)){
        
        echo '<div class="warning">'.$msg_error.' </div>';
    }
    
    mysqli_close($dbc);

} 



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>


    
    
    
<style type="text/css">
body {
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
}
.registration_form {
	margin:0 auto;
	width:px;
	padding:14px;
}
label {
	width: 10em;
	float: left;
	margin-right: 0.5em;
	display: block
}
.submit {
	float:right;
}
fieldset {
	background:#EBF4FB none repeat scroll 0 0;
	border:2px solid #B7DDF2;
	width: px;
}
legend {
	color: #fff;
	background: #80D3E2;
	border: 1px solid #781351;
	padding: 2px 6px
}
.elements {
	padding:10px;
}
p {
	border-bottom:1px solid #B7DDF2;
	color:#666666;
	font-size:11px;
	margin-bottom:20px;
	padding-bottom:10px;
}
a{
    color:#0099FF;
font-weight:bold;
}

/* Box Style */


 .success, .warning, .errormsgbox, .validation {
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 60px;
	background-repeat: no-repeat;
	background-position: 10px center;
     font-weight:bold;
     width:450px;
     
}

.success {
   
	color: #4F8A10;
	background-color: #DFF2BF;
	background-image:url('images/success.png');
}
.warning {

	color: #9F;
	background-color: #FEEFB3;
	background-image: url('images/warning.png');
}
.errormsgbox {
 
	color: #DC;
	background-color: #FFBABA;
	background-image: url('images/error.png');
	
}
.validation {
 
	color: #D63301;
	background-color: #FFCCBA;
	background-image: url('images/error.png');
}



</style>

</head>
<body>


<form action="login.php" method="post" class="registration_form">
  <fieldset>
    <legend>Form Login  </legend>

    <p>Masukkan username dan password anda  </p>
    
    <div class="elements">
      <label for="name">Email :</label>
      <input type="text" id="e-mail" name="e-mail" size="25" />
    </div>
  
    <div class="elements">
      <label for="Password">Password:</label>
      <input type="password" id="Password" name="Password" size="25" />
    </div>
    <div class="submit">
     <input type="hidden" name="formsubmitted" value="TRUE" />
      <label>Jika belum memiliki akun <a href="index.php">Buat Akun</a></label><input type="submit" value="Login" />
    </div>
  </fieldset>
</form>
</body>
</html>
