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
if($_SESSION['type'] == "mod"){
	header("Location:login.php");
}
else if($_SESSION['type'] == "stu"){
	header("Location:login.php");
}
?>
<?php
	$subject = $_POST['subject'];
	$year= $_POST['year'];
	$etype= $_POST['etype'];
	$examine= $_POST['examine'];
	$on= $_POST['on'];
	$to= $_POST['to'];
	$thr= $_POST['thr'];
	$for= $_POST['for'];
	$fiv= $_POST['fiv'];
	$link=mysqli_connect("localhost","root")or die("Database is not connected");
	$db=mysqli_select_db($link,"oes");
	
	if($subject == "subject" || $examine == "examine" || $year == "year" || $etype == "etype"){
		echo "You Have To Insert Valid Data";
	}
	else if($subject != $_SESSION['subcode']) {
		echo "You are not allowed to set question for this subject";
	}
	else if($_SESSION['position'] == "FIRST EXAMINE" && $examine == "examinetwo"){
		echo "You have to set question as a FIRST EXAMINE";
	}
	else if($_SESSION['position'] == "SECOND EXAMINE" && $examine == "examineone"){
		echo "You have to set question as a SECOND EXAMINE";
	}
	else if($on == "" || $to =="" || $thr == "" || $for == "" || $fiv == ""){
		echo " You Have To Set All Five Question ";
	}
	else {
		$sear = "SELECT * FROM question WHERE ( subcode = '$subject' AND year = $year AND examtype = '$etype' AND examine = '$examine') ORDER BY qid ASC";
		$connect = mysqli_connect("localhost", "root", "", "oes");
		$search_result = mysqli_query($connect, $sear);
		if($row = mysqli_fetch_array( $search_result)){
			echo "Question Already Exist";
		}
			else {
				$query1="INSERT INTO  question (qid, subcode,year,examtype, 
				examine,ques) VALUES ('1','$subject',
				'$year','$etype','$examine','$on')";
				$query2="INSERT INTO  question (qid, subcode,year,examtype, 
				examine,ques) VALUES ('2','$subject',
				'$year','$etype','$examine','$to')";
				$query3="INSERT INTO  question (qid, subcode,year,examtype, 
				examine,ques) VALUES ('3','$subject',
				'$year','$etype','$examine','$thr')";
				$query4="INSERT INTO  question (qid, subcode,year,examtype, 
				examine,ques) VALUES ('4','$subject',
				'$year','$etype','$examine','$for')";
				$query5="INSERT INTO  question (qid, subcode,year,examtype, 
				examine,ques) VALUES ('5','$subject',
				'$year','$etype','$examine','$fiv')";
				$q=mysqli_query($link,$query1);
				$q=mysqli_query($link,$query2);
				$q=mysqli_query($link,$query3);
				$q=mysqli_query($link,$query4);
				$q=mysqli_query($link,$query5);
				if($q)
				{	
					$_SESSION['ok'] = 1;
					header('Location:login.php');
				}
					
				else
					echo"Could not insert";
				}
	}
?>