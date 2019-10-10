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
?>
<?php
			$subject = $_POST['subject'];
			$year= $_POST['year'];
			$etype= $_POST['etype'];
			if($_SESSION['type'] == "stu") $roll = $_SESSION['roll'];
			else $roll = $_POST['roll'];
			if($subject == "") header('Location:inans.php');
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
			<tr>
				<td>
					Roll:
				</td>
				<td>
					<?php echo $roll; ?>
				</td>
			</tr>
			</table>
			<form action="inans.php"><input type="submit" value="Change" /></form> 
		<p><center>Answer sheet</center></p>
		<?php
			$idx = 1;
			$link=mysqli_connect("localhost","root")or die("Database is not connected");
			$db=mysqli_select_db($link,"oes");
			$sear = "SELECT * FROM answer WHERE ( subcode = '$subject' AND year = '$year' AND examtype = '$etype' AND roll = '$roll') ORDER BY qid ASC";
					//$sear = "SELECT * FROM question";
					$search_result = filterTable($sear);
						function filterTable($sear)
						{
							$connect = mysqli_connect("localhost", "root", "", "oes");
							$filter_Result = mysqli_query($connect, $sear);
							return $filter_Result;
						} 
		?>
		<?php  while($row = mysqli_fetch_array($search_result)):?>
              <table id = "customers">
				<tr ><td >
					<?php echo "Question $idx : ";?>
                    <?php echo $row['ques'] ;?></td></tr><br/>
					
                    <tr><td ><?php echo "Answer $idx : ";?> <?php echo $row['ans']; $idx++;?></td>
                    
                     <?php echo "<br>"; ?>
                </tr>
			</table>
                
        <?php endwhile;?>
		<?php if($idx == 1) : ?>
		<p>Question Not Available</p>
		<?php else : ?>
		</br></br></br>
		<form action ="ansaction.php" method = "post">
		<?php if($_SESSION['type'] == "exa") : ?>
		<div> 
			<?php 
				$_SESSION['asubject'] = $subject;
				$_SESSION['ayear'] = $year;
				$_SESSION['aroll'] = $roll;
				$_SESSION['aetype'] = $etype;
			?>
			Mark : <input rows="4" cols="50" name="mark">
			<input name="submit" type="submit" />
		</div>
		<?php endif; ?>
	</form>
	<?php endif; ?>
	</body>
</html>
