<?php
$mysqli = mysqli_connect("localhost","root","","vcare");

$con = mysqli_connect('localhost','root','','vcare');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}else{
    //echo"connected";
} 

/*setting untuk koneksi ke database */
DEFINE('DATABASE_USER', 'root');
DEFINE('DATABASE_PASSWORD', '');
DEFINE('DATABASE_HOST', 'localhost');
DEFINE('DATABASE_NAME', 'vcare');
/*setting default time zone untuk dapat mengirimm email */
date_default_timezone_set('UTC');
 
//menetukan pengirim email
define('EMAIL', 'admin@barisandata.com');
DEFINE('WEBSITE_URL', 'http://barisandata.com/registrasiemail');


// membuat koneksi ke database
$dbc = @mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD,
    DATABASE_NAME);

if (!$dbc) {
    trigger_error('koneksi tidak sukses: ' . mysqli_connect_error());
}
?>