
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
			if($subject == "") header('Location:inques.php');
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
			<form action="inans.php"><input type="submit" value="Change" /></form> 
		<p><center>Answer sheet</center></p>
		<br/>
		<?php 
					$link=mysqli_connect("localhost","root")or die("Database is not connected");
					$db=mysqli_select_db($link,"oes");
					$sear = "SELECT * FROM moderate WHERE ( subcode = '$subject' AND year = $year AND examtype = '$etype') ORDER BY qid ASC";
					//$sear = "SELECT * FROM question";
					$search_result = filterTable($sear);
						function filterTable($sear)
						{
							$connect = mysqli_connect("localhost", "root", "", "oes");
							$filter_Result = mysqli_query($connect, $sear);
							return $filter_Result;
						}
		?>
		<?php $idx = 1; ?>
		<?php  while($row = mysqli_fetch_array($search_result)):?>
                
      <?php $val[$idx] = $row['question']; $idx++; ?>
				
                
                <?php endwhile;?>
	<?php 
		if($idx == 1):
	?>
	<p>Question Not Available</p>
	<?php else : ?>
	<form action = "questionaction.php" method = "post">
	
		<?php echo "Question 1: " ; echo $val[1]; ?>
		<br/>
		Answer 1:  <textarea name = "on"></textarea>
		</br>
		<?php echo "Question 2: " ; echo $val[2]; ?>
		<br/>
		Answer 2:  <textarea name = "to"></textarea>
		</br>
		<?php echo "Question 3: " ; echo $val[3]; ?>
		<br/>
		Answer 3: <textarea name = "thr"></textarea>
		</br>
		<?php echo "Question 4: " ; echo $val[4]; ?>
		<br/>
		Answer 4: <textarea name = "for"></textarea>
		</br>
		<?php echo "Question 5: " ; echo $val[5]; ?>
		<br/>
		Answer 5: <textarea name = "fiv"></textarea>
		</br>
		<br>
		<?php if($_SESSION['type'] == "stu"): ?>
		<div> 
			<select name = "subject">
			  <option value="subject">Subject Code</option>
			  <option value="CSE1101">CSE1101</option>
			  <option value="CSE1102">CSE1102</option>
			  <option value="CSE1103">CSE1103</option>
			  <option value="CSE1104">CSE1104</option>
			  <option value="CSE1105">CSE1105</option>
			  <option value="CSE1106">CSE1106</option>
			</select>
			<select name ="year">
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
			</select> 
		</div>
		<br>
		<input type="submit" name = "submit" value="Submit">
		<?php endif; ?>
		</form>
		<?php endif ?>
	</body>
</html>
