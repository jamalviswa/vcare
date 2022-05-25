<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );

if(!($mysqli = mysqli_connect("localhost", "denbagus_android", "vfjsUIjwEuPw")))
{
	die('oops connection problem ! --> '.mysqli_error($mysqli));
}
if(!mysqli_select_db($mysqli, denbagus_android))
{
	die('oops database selection problem ! --> '.mysqli_error($mysqli));
}
?>