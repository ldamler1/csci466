<!--
assign10
Name: Damler, Lucas
zID: z1761739
Semester: Spring 2018
TA: Yaswanth Reddy Vayalpati
Due: 2018
-->

<html>
	<head>
	<title>ROBOGARI P1</title>
	</head>
	
	<body>
	<!--html page head-->
	<h1 align="center">Select Search by</h1>
	
	<form method="POST" action="">
		User Name:		<input type="text" name="uName"/>
		<input type="submit" name="submit" value="Submit"/>
		<input type="button" name="reset" value="Reset" onclick="window.location.href='http://students.cs.niu.edu/~z1761739/gp/gp_p2.php'"/>
	</form>
	</br>
	
	<?php
	include 'passwd.php';
	
	$input = (isset($_POST['uName']) ? $_POST['uName'] : null);
	
	//connection to host
	$dsn = "mysql:host=courses;dbname=z1761739";
	$pdo = new PDO($dsn, $username, $password);
			
	if(isset($_POST['submit'])){		
		$sql =  "insert into Users (name) values('$input');";
		$result = $pdo->prepare($sql);
		$result->execute();
	}
	?>
	
	<a href="http://students.cs.niu.edu/~z1761739/gp/gp_p1.php">Home</a>
	<a href="http://students.cs.niu.edu/~z1761739/gp/pageForUser.php">User Queue</a>
	<a href="http://students.cs.niu.edu/~z1761739/gp/gp_p2.php">Search By Title</a>
	<a href="http://students.cs.niu.edu/~z1761739/gp/gp_p3.php">Search By Artist</a>
	<a href="http://students.cs.niu.edu/~z1761739/gp/gp_p4.php">Search By Contributor</a>
	
<!--Centers author name and section at bottom of page-->
		<center>
		<footer id = "footer">
			<div id = "footer-content">Bottom Of Page</div>
		</footer>
		</center>
	</body>

</html>
