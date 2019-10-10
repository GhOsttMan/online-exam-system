<?php
session_start();
$link=mysqli_connect("localhost","root")or die("Database is not connected");
$db=mysqli_select_db($link,"oes");


if(isset($_SESSION['type'])) {
    if($_SESSION['type'] == "mod") header("Location: moderatehomepage.php");
	else if($_SESSION['type'] == "exa") header("Location: teacherhomepage.php");
	else header("Location: studenthomepage.php");
}
if(isset($_POST['type'])){
	$type = $_POST['type'];
	$id = $_POST['id'];
	$pass = $_POST['pass'];
	if($type == "mod"){
		$sear = "SELECT * FROM moddb WHERE ( id = '$id' AND pass = '$pass')";
		$connect = mysqli_connect("localhost", "root", "", "oes");
		$search_result = mysqli_query($connect, $sear);
		if($row = mysqli_fetch_array( $search_result)){
			$_SESSION['type'] = "mod";
				$_SESSION['id'] = $id;
				$_SESSION['pass'] = $pass;
				$_SESSION['name'] = $row['name'];
			$_SESSION['position'] = $row['position'];
			$_SESSION['img'] = $row['img'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['contact'] = $row['contact'];
			$_SESSION['subcode'] = $row['subcode'];
			$_SESSION['ok'] = 0;
			header("Location: moderatehomepage.php");
		}
	}
	else if($type == "exa"){
		$sear = "SELECT * FROM exadb WHERE ( id = '$id' AND pass = '$pass')";
		$connect = mysqli_connect("localhost", "root", "", "oes");
		$search_result = mysqli_query($connect, $sear);
		if($row = mysqli_fetch_array( $search_result)){
			$_SESSION['type'] = "exa";
			$_SESSION['id'] = $id;
				$_SESSION['pass'] = $pass;
				$_SESSION['name'] = $row['name'];
			$_SESSION['position'] = $row['position'];
			$_SESSION['img'] = $row['img'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['contact'] = $row['contact'];
			$_SESSION['subcode'] = $row['subcode'];
			$_SESSION['ok'] = 0;
			header("Location: teacherhomepage.php");
		}
	}
	else {
		$sear = "SELECT * FROM studb WHERE ( id = '$id' AND pass = '$pass')";
		$connect = mysqli_connect("localhost", "root", "", "oes");
		$search_result = mysqli_query($connect, $sear);
		if($row = mysqli_fetch_array( $search_result)){
			$_SESSION['type'] = "stu";
			$_SESSION['id'] = $id;
			$_SESSION['pass'] = $pass;
			$_SESSION['name'] = $row['name'];
			$_SESSION['roll'] = $row['roll'];
			$_SESSION['img'] = $row['img'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['contact'] = $row['contact'];
			$_SESSION['session'] = $row['session'];
			$_SESSION['ok'] = 0;
			header("Location: studenthomepage.php");
		}
	}
	echo "Invalid User ID or Password";
}
?>

<html>
<head>
<title>oes</title>
<style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
input[type=password], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}
p.double {border-style: double;}
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
.logo{
	text-indent: -999999px;
	background: url("logo.png");
	width:200px;
	height:105px;
}

.column {
	 border-radius: 5px;
    background-color: #f2f2f2;
    float: middle;
    width: 35%;
    padding: 50px;
}
.logox{
	float: left;
    width: 28%;
    padding: 4px;
}
.logoy{
	float: right;
    width: 28%;
    padding: 4px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}

p.one {
    border-style: double;
	padding: 4px;
	
}
</style>
</head>
<body>
<div >
<h1 class ="logo">logo here </h1>
</div>
<div class ="logox">
	<p class="one">What is OES?</br>- OES(Online Exam System) is a platform which offer students to take part in exam online. this platform also offers Moderator and teacher to set question for examination and result system.</p>
</div>
<div class ="logoy">
	<p class="one">Moderator - Who Select Question From Question Set That Was Given By Examines.</p>
</div>
<center>	
<div class="column">
	<h3>Login</h3>
  <form action="" method ="post">
    <div class="row">
      <div class="col-25">
        <label for="fname">User ID</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="id">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Password</label>
      </div>
      <div class="col-75">
        <input type="password" id="lname" name="pass">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Sign As :</label>
      </div>
      <div class="col-75">
        <select id="country" name="type">
          <option value="mod">Moderator</option>
          <option value="exa">Examine</option>
          <option value="stu">Student</option>
        </select>
      </div>
    </div>
	<div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
</center>
</body>
</html>
