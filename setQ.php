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
		<div>
		<form action ="setQaction.php" method="post">		
			<select name="subject">
			  <option value="subject">Subject Code</option>
			  <option value="CSE1101">CSE1101</option>
			  <option value="CSE1102">CSE1102</option>
			  <option value="CSE1103">CSE1103</option>
			  <option value="CSE1104">CSE1104</option>
			  <option value="CSE1105">CSE1105</option>
			  <option value="CSE1106">CSE1106</option>
			</select>
			<select name="year">
			  <option value="year">Year</option>
			  <option value="2015">2015</option>
			  <option value="2016">2016</option>
			  <option value="2017">2017</option>
			  <option value="2018">2018</option>
			  <option value="2019">2019</option>
			  <option value="2020">2020</option>
			</select>
			<select name="etype">
			  <option value="etype">Exam Type</option>
			  <option value="First Mid">First Mid</option>
			  <option value="Second Mid">Second Mid</option>
			  <option value="Semester Final">Semester Final</option>
			</select>
			<select name="examine">
			  <option value="examine">Examine Type</option>
			  <option value="examineone">First Examine</option>
			  <option value="examinetwo">Second Examine</option>
			</select>
		</div>
		<p><center>Set Question</center></p>
		<div>
        

		</br><h3>Question-01:</h3>
		 <textarea name = "on"></textarea>
		</br>

		</br><h3>Question-02:</h3>
		 <textarea name = "to"></textarea>
		</br>
		
		</br><h3>Question-03:</h3>
		 <textarea name = "thr"></textarea>
		</br>

		</br><h3>Question-04:</h3>
		 <textarea name = "for"></textarea>
		</br>
		
		</br><h3>Question-05:</h3>
		 <textarea name = "fiv"></textarea>
		<br>
		<input type="submit" value="Submit">
		</br>
		</form>
			
		</div>
	</body>
</html>
