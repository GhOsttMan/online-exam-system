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
else if($_SESSION['type'] == "exa"){
	header("Location:login.php");
}
else if($_SESSION['type'] == "stu"){
	$id = $_SESSION['id'];
	$pass = $_SESSION['pass'];
	$link=mysqli_connect("localhost","root")or die("Database is not connected");
	$db=mysqli_select_db($link,"oes");
	$sear = "SELECT * FROM studb WHERE ( id = '$id' AND pass = '$pass')";
	$connect = mysqli_connect("localhost", "root", "", "oes");
	$search_result = mysqli_query($connect, $sear);
	$row = mysqli_fetch_array( $search_result);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>online exam system</title>
<style>
.logo{
	text-indent: -999999px;
	background: url("logo.png");
	width:200px;
	height:105px;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>
<div >
<h1 class ="logo">logo here </h1>
<ul>
	<li><a href="studenthomepage.php">PROFILE</a></li>
	<li><a href="Question.php">START EXAM</a></li>
	<li><a href="Answer.php">MY ANSWER</a></li>
	<li><a href="Result.php">RESULT</a></li>
	<li style="float:right"><a class="active" href="logout.php">Log Out</a></li>
	<li style="float:right"><b> <a style="color:yellow;"> <?php echo $_SESSION['name'] ?></a></b></li>
</ul>
</div>
	<center> <img src = "<?php echo $_SESSION['img']; ?>" height = "1%" width = "10%"> </center>
	<table id = "customers">
			<tr>
				<td>
					Name:
				</td>
				<td>
					<?php echo $_SESSION['name']; ?>
				</td>
			</tr>
			<tr>
				<td>
					Roll :
				</td>
				<td>
					<?php echo $_SESSION['roll']; ?>
				</td>
			</tr>
			<tr>
				<td>
					Session
				</td>
				<td>
					<?php echo $_SESSION['session']; ?>
				</td>
			</tr>
			<tr>
				<td>
					ID:
				</td>
				<td>
					<?php echo $_SESSION['id']; ?>
				</td>
			</tr>
			<tr>
				<td>
					Email:
				</td>
				<td>
					<?php echo $_SESSION['email']; ?>
				</td>
			</tr>
			<tr>
				<td>
					Contact:
				</td>
				<td>
					<?php echo $_SESSION['contact']; ?>
				</td>
			</tr>
			</table>
  </body>
  </html>