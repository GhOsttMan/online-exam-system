<?php
session_start();
if (!isset($_SESSION['type']))
{
    // User is not logged in, so send user away.
    header("Location:login.php");
    die();
}
?>

<?php
	$subject = $_POST['subject'];
	$year= $_POST['year'];
	$etype= $_POST['etype'];
	$on= $_POST['on'];
	$to= $_POST['to'];
	$thr= $_POST['thr'];
	$for= $_POST['for'];
	$fiv= $_POST['fiv'];
	$roll = $_SESSION['roll'];
	if($year == ""){
		header("Location:login.php");
	}
	$link=mysqli_connect("localhost","root")or die("Database is not connected");
	$db=mysqli_select_db($link,"oes");
	for($i = 1; $i <= 5; $i++){
		$sear = "SELECT * FROM moderate WHERE ( qid = $i AND subcode = '$subject' AND year = '$year' AND examtype = '$etype')";
		$connect = mysqli_connect("localhost", "root", "", "oes");
		$search_result = mysqli_query($connect, $sear);
		$row = mysqli_fetch_array( $search_result);
		if($i == 1) $f1 = $row['question'];
		else if($i == 2) $f2 = $row['question']; 
		else if($i == 3) $f3 = $row['question']; 
		else if($i == 4) $f4 = $row['question']; 
		else if($i == 5) $f5 = $row['question']; 
	}
	$query1="INSERT INTO answer(qid, subcode,year,examtype, 
	ques,ans , roll) VALUES ('1','$subject',
	'$year','$etype','$f1','$on' , '$roll')";
	$query2="INSERT INTO answer(qid, subcode,year,examtype, 
	ques,ans , roll) VALUES ('2','$subject',
	'$year','$etype','$f2','$to','$roll')";
	$query3="INSERT INTO answer(qid, subcode,year,examtype, 
	ques,ans , roll) VALUES ('3','$subject',
	'$year','$etype','$f3','$thr' ,'$roll')";
	$query4="INSERT INTO answer(qid, subcode,year,examtype, 
	ques,ans,roll) VALUES ('4','$subject',
	'$year','$etype','$f4','$for','$roll')";
	$query5="INSERT INTO answer(qid, subcode,year,examtype, 
	ques,ans,roll) VALUES ('5','$subject',
	'$year','$etype','$f5','$fiv','$roll')";
	$q=mysqli_query($link,$query1);
	$q=mysqli_query($link,$query2);
	$q=mysqli_query($link,$query3);
	$q=mysqli_query($link,$query4);
	$q=mysqli_query($link,$query5);
	if($q)
	{
		header('Location:login.php');
	}
		
	else
		echo"Could not insert";
	
	
?>