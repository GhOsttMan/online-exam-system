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
	$subject = $_SESSION['asubject'];
	if($subject == ""){
		header("Location:login.php");
	}
	$year= $_SESSION['ayear'];
	$etype= $_SESSION['aetype'];
	if($_SESSION['position'] == "FIRST EXAMINE"){
		$examine = "examineone";
	}
	else $examine = "examinetwo";
	$roll = $_SESSION['aroll'];
	$mark = $_POST['mark'];
	$_SESSION['asubject'] = "";
	$link=mysqli_connect("localhost","root")or die("Database is not connected");
	$db=mysqli_select_db($link,"oes");
	$sear = "SELECT * FROM marks WHERE  subcode = '$subject' AND year = '$year' AND examtype = '$etype' AND examinetype = '$examine' AND roll = '$roll'";
	$connect = mysqli_connect("localhost", "root", "", "oes");
	$search_result = mysqli_query($connect, $sear);
	if($row = mysqli_fetch_array($search_result)){
		echo "Mark already exist";
	}
	else {
		$query1="INSERT INTO  marks (roll, examinetype,mark,subcode, 
	year, examtype) VALUES ('$roll','$examine',
	'$mark','$subject','$year','$etype')";
	$q=mysqli_query($link,$query1);
	if($q)
	{
		header('Location:login.php');
	}
		
	else
		echo"Could not insert";
	}
?>