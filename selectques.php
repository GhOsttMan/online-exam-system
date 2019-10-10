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
	$aDoor = $_POST['formDoor'];
	$N = count($aDoor);
	$subject = $_POST['subject'];
	$year= $_POST['year'];
	$etype= $_POST['etype'];
	$link=mysqli_connect("localhost","root")or die("Database is not connected");
	$db=mysqli_select_db($link,"oes");
	$chk = "SELECT * FROM moderate WHERE (subcode = '$subject' AND year = '$year' AND examtype = '$etype')";
			$co = mysqli_connect("localhost", "root", "", "oes");
			$search_resul = mysqli_query($co, $chk);
	if($year == ""){
		header("Location:login.php");
	}
	if($_SESSION['subcode'] != $subject){
		echo "You are not allowed to moderate this subject";
	}
  else if($N != 5) 
  {
    echo("You Have To Select Exactly Five Question");
  } 
  else if($roww = mysqli_fetch_array( $search_resul)){
	  echo "Question already exist";
  }
  else
  {
   // echo("You selected $N door(s): ");
   $link=mysqli_connect("localhost","root")or die("Database is not connected");
	$db=mysqli_select_db($link,"oes");
	$id = 1;
    for($i=0; $i < $N; $i++)
    {
      echo($aDoor[$i] . " ");
	  if($aDoor[$i] == "A") {
			$sear = "SELECT * FROM question WHERE ( qid = 1 AND subcode = '$subject' AND year = '$year' AND examtype = '$etype' AND examine = 'examineone')";
			$connect = mysqli_connect("localhost", "root", "", "oes");
			$search_result = mysqli_query($connect, $sear);
			$row = mysqli_fetch_array( $search_result);
			$ques = $row['ques'];
			$q="INSERT INTO moderate (qid, subcode,examtype,year ,
			question) VALUES ($id,'$subject',
			'$etype','$year','$ques')";
			$q=mysqli_query($link,$q);
			$id++;
	  }
	  else  if($aDoor[$i] == "B") {
		   echo($aDoor[$i] . " ");
			$sear = "SELECT * FROM question WHERE ( qid = 2 AND subcode = '$subject' AND year = '$year' AND examtype = '$etype' AND examine = 'examineone')";
			$connect = mysqli_connect("localhost", "root", "", "oes");
			$search_result = mysqli_query($connect, $sear);
			$row = mysqli_fetch_array( $search_result);
			$ques = $row['ques'];
			$q="INSERT INTO moderate (qid, subcode,examtype,year ,
			question) VALUES ($id,'$subject',
			'$etype','$year','$ques')";
			$q=mysqli_query($link,$q);
			$id++;
	  }
	  else  if($aDoor[$i] == "C") {
			$sear = "SELECT * FROM question WHERE ( qid = 3 AND subcode = '$subject' AND year = '$year' AND examtype = '$etype' AND examine = 'examineone')";
			$connect = mysqli_connect("localhost", "root", "", "oes");
			$search_result = mysqli_query($connect, $sear);
			$row = mysqli_fetch_array( $search_result);
			$ques = $row['ques'];
			$q="INSERT INTO moderate (qid, subcode,examtype,year,
			question) VALUES ($id,'$subject',
			'$etype','$year','$ques')";
			$q=mysqli_query($link,$q);
			$id++;
	  }
	  else  if($aDoor[$i] == "D") {
			$sear = "SELECT * FROM question WHERE ( qid = 4 AND subcode = '$subject' AND year = '$year' AND examtype = '$etype' AND examine = 'examineone')";
			$connect = mysqli_connect("localhost", "root", "", "oes");
			$search_result = mysqli_query($connect, $sear);
			$row = mysqli_fetch_array( $search_result);
			$ques = $row['ques'];
			$q="INSERT INTO moderate (qid, subcode,examtype,year ,
			question) VALUES ($id,'$subject',
			'$etype','$year','$ques')";
			$q=mysqli_query($link,$q);
			$id++;
	  }
	  else  if($aDoor[$i] == "E") {
			$sear = "SELECT * FROM question WHERE ( qid = 5 AND subcode = '$subject' AND year = '$year' AND examtype = '$etype' AND examine = 'examineone')";
			$connect = mysqli_connect("localhost", "root", "", "oes");
			$search_result = mysqli_query($connect, $sear);
			$row = mysqli_fetch_array( $search_result);
			$ques = $row['ques'];
			$q="INSERT INTO moderate (qid, subcode,examtype,year ,
			question) VALUES ($id,'$subject',
			'$etype','$year','$ques')";
			$q=mysqli_query($link,$q);
			$id++;
	  }
	  else  if($aDoor[$i] == "F") {
			$sear = "SELECT * FROM question WHERE ( qid = 1 AND subcode = '$subject' AND year = '$year' AND examtype = '$etype' AND examine = 'examinetwo')";
			$connect = mysqli_connect("localhost", "root", "", "oes");
			$search_result = mysqli_query($connect, $sear);
			$row = mysqli_fetch_array( $search_result);
			$ques = $row['ques'];
			$q="INSERT INTO moderate (qid, subcode,examtype,year ,
			question) VALUES ($id,'$subject',
			'$etype','$year','$ques')";
			$q=mysqli_query($link,$q);
			$id++;
	  }
	  else  if($aDoor[$i] == "G") {
			$sear = "SELECT * FROM question WHERE ( qid = 2 AND subcode = '$subject' AND year = '$year' AND examtype = '$etype' AND examine = 'examinetwo')";
			$connect = mysqli_connect("localhost", "root", "", "oes");
			$search_result = mysqli_query($connect, $sear);
			$row = mysqli_fetch_array( $search_result);
			$ques = $row['ques'];
			$q="INSERT INTO moderate (qid, subcode,examtype,year ,
			question) VALUES ($id,'$subject',
			'$etype','$year','$ques')";
			$q=mysqli_query($link,$q);
			$id++;
	  }
	  else  if($aDoor[$i] == "H") {
			$sear = "SELECT * FROM question WHERE ( qid = 3 AND subcode = '$subject' AND year = '$year' AND examtype = '$etype' AND examine = 'examinetwo')";
			$connect = mysqli_connect("localhost", "root", "", "oes");
			$search_result = mysqli_query($connect, $sear);
			$row = mysqli_fetch_array( $search_result);
			$ques = $row['ques'];
			$q="INSERT INTO moderate (qid, subcode,examtype,year ,
			question) VALUES ($id,'$subject',
			'$etype','$year','$ques')";
			$q=mysqli_query($link,$q);
			$id++;
	  }
	  else  if($aDoor[$i] == "I") {
			$sear = "SELECT * FROM question WHERE ( qid = 4 AND subcode = '$subject' AND year = '$year' AND examtype = '$etype' AND examine = 'examinetwo')";
			$connect = mysqli_connect("localhost", "root", "", "oes");
			$search_result = mysqli_query($connect, $sear);
			$row = mysqli_fetch_array( $search_result);
			$ques = $row['ques'];
			$q="INSERT INTO moderate (qid, subcode,examtype,year ,
			question) VALUES ($id,'$subject',
			'$etype','$year','$ques')";
			$q=mysqli_query($link,$q);
			$id++;
	  }
	  else  if($aDoor[$i] == "J") {
			$sear = "SELECT * FROM question WHERE ( qid = 5 AND subcode = '$subject' AND year = '$year' AND examtype = '$etype' AND examine = 'examinetwo')";
			$connect = mysqli_connect("localhost", "root", "", "oes");
			$search_result = mysqli_query($connect, $sear);
			$row = mysqli_fetch_array( $search_result);
			$ques = $row['ques'];
			$q="INSERT INTO moderate (qid, subcode,examtype,year ,
			question) VALUES ($id,'$subject',
			'$etype','$year','$ques')";
			$q=mysqli_query($link,$q);
			$id++;
	  }
    }
	header('Location:login.php');
  }
?>