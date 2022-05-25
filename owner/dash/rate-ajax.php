<?php
ob_start();
include('dbconnect.php');
if((isset($_GET['id']))&&(isset($_GET['rate'])))
{
$id=$_GET['id'];
$string=$_GET['rate'];
	switch($string)
	{
		case "Very Poor":
		$vote=1;
		break;
		case "Poor":
		$vote=2;
		break;
		case "Good":
		$vote=3;
		break;
		case "Very Good":
		$vote=4;
		break;
		case "Excellent":
		$vote=5;
		break;
	}
	//chack the article is voted already
	$check_query=mysqli_query($mysqli, "select * from ratings where art_id='$id'");
	$voted=mysqli_num_rows($check_query);
		if($voted==0)
		{
		$vote_query=mysqli_query($mysqli, "insert into ratings values('','$id','1','$vote')");	
		}
		else
		{
		$upadte_vote=mysqli_query($mysqli, "select * from ratings where art_id='$id'");
		$upadte_vote1=mysqli_fetch_array($upadte_vote);
		$total_votes=$upadte_vote1['total_votes']+1;
		$total_points=$upadte_vote1['total_points']+$vote;
		$rate_id=$upadte_vote1['id'];
		$vote_query=mysqli_query($mysqli, "update ratings set total_votes='$total_votes', total_points='$total_points' where id='$rate_id'");
		}
}
if($vote_query)
{
	echo "Voting Succesfull";
}
?>