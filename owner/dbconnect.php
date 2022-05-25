<?php
$mysqli = mysqli_connect("localhost","root","","vcare");

$con = mysqli_connect("localhost","root","","vcare");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
} 

/*setting untuk koneksi ke database */
if(!defined('DATABASE_USER'))
{
    DEFINE('DATABASE_USER', 'root');   
}
if(!defined('DATABASE_PASSWORD'))
{ 
    DEFINE('DATABASE_PASSWORD', '');
}
if(!defined('DATABASE_HOST'))
{
    DEFINE('DATABASE_HOST', 'localhost');  
}

if(!defined('DATABASE_NAME'))
{
   DEFINE('DATABASE_NAME', 'vcare'); 
}

if(!defined('WEBSITE_URL'))
{ 
    
DEFINE('WEBSITE_URL', 'http://localhost/taxi/registrasiemail');
}
// DEFINE('DATABASE_USER', 'viswatechnologys_webtrack');
// DEFINE('DATABASE_PASSWORD', '!dsnUDD5Ilf2');
// DEFINE('DATABASE_HOST', 'localhost');
// DEFINE('DATABASE_NAME', 'viswatechnologys_barisand_cargo');
/*setting default time zone untuk dapat mengirimm email */
date_default_timezone_set('UTC');
 
//menetukan pengirim email
// define('EMAIL', 'viswa.technologysolution@gmail.com');


// membuat koneksi ke database
$dbc = @mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD,
    DATABASE_NAME);
 
if (!$dbc) {
    // trigger_error('koneksi tidak sukses: ' . mysqli_connect_error());
}
?>