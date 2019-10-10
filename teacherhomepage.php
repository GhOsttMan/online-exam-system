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
<li><a href="teacherhomepage.php">PROFILE</a></li>
  <li><a href="setQ.php">CREATE QUESTION</a></li>
  <li><a href="Answer.php">ANSWER SHEET</a></li>
  <li><a href="Result.php">RESULT</a></li>
  <li style="float:right"><a class="active" href="logout.php">Log Out</a></li>
  <li style="float:right"><b> <a style="color:yellow;"> <?php echo $_SESSION['name'] ?></a></b></li>
</ul>
</div>
<?php if($_SESSION['ok'] == 1): ?>
	<center> <p>Successfully Inserted</p></center>
	<?php $_SESSION['ok'] = 0; ?>
<?php endif; ?>
<center> <img src = "<?php echo $_SESSION['img']; ?>" height = "1%" width = "10%"> </center>
	<table id = "customers">
			<tr>
				<td>
					Name :
				</td>
				<td>
					<?php echo $_SESSION['name']; ?>
				</td>
			</tr>
			<tr>
				<td>
					SUBJECT CODE :
				</td>
				<td>
					<?php echo $_SESSION['subcode']; ?>
				</td>
			</tr>
			<tr>
				<td>
					POSITION :
				</td>
				<td>
					<?php echo $_SESSION['position']; ?>
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
