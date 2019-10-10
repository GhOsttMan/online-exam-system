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
if($_SESSION['type'] == "exa"){
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
			if($subject == "") header('Location:inmod.php');
?>

<html>
	<head> <title>OES</title>
	<style>
	input[type=button], input[type=submit], input[type=reset] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
		textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
}
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
select {
    width: 100%;
    padding: 16px 20px;
    border: 1px solid black;
    border-radius: 4px;
    background-color: #f1f1f1;
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
	<?php if($_SESSION['type'] == "mod"): ?>
	<li><a href="moderatehomepage.php">PROFILE</a></li>
	 <li><a href="Modrator.php">MODERATE</a></li>
  <li><a href="Question.php">EXAM QUESTION</a></li>
	<?php endif; ?>
	<?php if($_SESSION['type'] == "exa"): ?>
	<li><a href="teacherhomepage.php">PROFILE</a></li>
	<li><a href="setQ.php">CREATE QUESTION</a></li>
	<li><a href="Answer.php">ANSWER SHEET</a></li>
	<?php endif; ?>
	<?php if($_SESSION['type'] == "stu"): ?>
	<li><a href="studenthomepage.php">PROFILE</a></li>
	<li><a href="Question.php">START EXAM</a></li>
	<li><a href="Answer.php">MY ANSWER</a></li>
	<?php endif; ?>
  <li><a href="Result.php">RESULT</a></li>
  <li style="float:right"><a class="active" href="logout.php">Log Out</a></li>
  <li style="float:right"><b> <a style="color:yellow;"> <?php echo $_SESSION['name'] ?></a></b></li>
</ul>
</div>
		<?php if($subject == "subject" || $year == "year" || $etype == "etype"): ?>
			<p><center> You Have To Insert Valid Subject , Year and Exam Type</center> </p>
		<?php else : ?>
			<table id = "customers">
			<tr>
				<td>
					Subject Code :
				</td>
				<td>
					<?php echo $subject; ?>
				</td>
			</tr>
			<tr>
				<td>
					Year :
				</td>
				<td>
					<?php echo $year; ?>
				</td>
			</tr>
			<tr>
				<td>
					Exam Type:
				</td>
				<td>
					<?php echo $etype; ?>
				</td>
			</tr>
			</table>
			<form action="inmod.php"><input type="submit" value="Change" /></form>
		<div>
		    <div>
			   <?php
					$idx = 1;
					$subject = $_POST['subject'];
					$year= $_POST['year'];
					$etype= $_POST['etype'];
					$link=mysqli_connect("localhost","root")or die("Database is not connected");
					$db=mysqli_select_db($link,"oes");
					$sear = "SELECT * FROM question WHERE ( subcode = '$subject' AND year = $year AND examtype = '$etype' AND examine = 'examineone') ORDER BY qid ASC";
					//$sear = "SELECT * FROM question";
					$connect = mysqli_connect("localhost", "root", "", "oes");
		$search_result = mysqli_query($connect, $sear);

				?>
				<?php 
					while($row = mysqli_fetch_array($search_result)){
						$val[$idx++] = $row['ques'];
					}
				?>
		    </div>
			<div>
			   <?php
					$id2 = 1;
					$subject = $_POST['subject'];
					$year= $_POST['year'];
					$etype= $_POST['etype'];
					$link=mysqli_connect("localhost","root")or die("Database is not connected");
					$db=mysqli_select_db($link,"oes");
					$sear = "SELECT * FROM question WHERE ( subcode = '$subject' AND year = $year AND examtype = '$etype' AND examine = 'examinetwo') ORDER BY qid ASC";
					//$sear = "SELECT * FROM question";
					$connect = mysqli_connect("localhost", "root", "", "oes");
				$search_result = mysqli_query($connect, $sear);

				?>
				<?php 
					while($row = mysqli_fetch_array($search_result)){
						$val2[$id2++] = $row['ques'];
					}
				?>
		    </div>
		</div>
		<?php if($idx == 1 && $id2 == 1) : ?>
		<p><center>Question Not Available</center></p>
		<?php endif ?>
		<form action="selectques.php" method="post">
			<?php if($idx > 5) : ?>
			<p><center> Question From Fisrt Examine</p></center> <br/>
			<table id = "customers"> <tr><td><input type="checkbox" name="formDoor[]" value="A" /><?php echo $val[1]; ?></tr></td></table><br />
			<table id = "customers"> <tr><td><input type="checkbox" name="formDoor[]" value="B" /><?php echo $val[2]; ?></tr></td></table><br />
			<table id = "customers"> <tr><td><input type="checkbox" name="formDoor[]" value="C" /><?php echo $val[3]; ?></tr></td></table><br />
			<table id = "customers"> <tr><td><input type="checkbox" name="formDoor[]" value="D" /><?php echo $val[4]; ?></tr></td></table><br />
			<table id = "customers"> <tr><td><input type="checkbox" name="formDoor[]" value="E" /><?php echo $val[5]; ?></tr></td></table><br/>
			<?php endif ?>
			<?php if($id2 > 5) : ?>
			<p><center> Question From Second Examine</p></center> <br/>
			<table id = "customers"> <tr><td><input type="checkbox" name="formDoor[]" value="F" /><?php echo $val2[1]; ?></tr></td></table><br />
			<table id = "customers"> <tr><td><input type="checkbox" name="formDoor[]" value="G" /><?php echo $val2[2]; ?></tr></td></table><br />
			<table id = "customers"> <tr><td><input type="checkbox" name="formDoor[]" value="H" /><?php echo $val2[3]; ?></tr></td></table><br />
			<table id = "customers"> <tr><td><input type="checkbox" name="formDoor[]" value="I" /><?php echo $val2[4]; ?></tr></td></table><br />
			<table id = "customers"> <tr><td><input type="checkbox" name="formDoor[]" value="J" /><?php echo $val2[5]; ?></tr></td></table><br/>
			<?php endif ?>
			<?php if($idx > 5 && $id2 > 5) : ?>
			<select name = "subject">
				<option value="subject">Subject Code</option>
			 <option value="CSE1105">CSE1105</option>
			  <option value="CSE1101">CSE1101</option>
			  <option value="CSE1102">CSE1102</option>
			  <option value="CSE1103">CSE1103</option>
			  <option value="CSE1104">CSE1104</option>
			  <option value="CSE1106">CSE1106</option>
			</select>
			<select  name = "year">
			<option value="year">Year</option>
				
			  <option value="2015">2015</option>
			  <option value="2016">2016</option>
			  <option value="2017">2017</option>
			  <option value="2018">2018</option>
			  <option value="2019">2019</option>
				<option value="2020">2020</option>
			</select>
			<select name = "etype">
			 <option value="etype">Exam Type</option>
			  <option value="First Mid">First Mid</option>
			  <option value="Second Mid">Second Mid</option>
			<option value="Semester Final">Semester Final</option>
			</select><br/>
			<input type="submit" name="formSubmit" value="Submit" />
		</form>
		<?php endif ?>
		<?php endif ?>
	</body>
</html>
