<!--
assign11
Name: Damler, Lucas
zID: z1761739
Semester: Spring 2018
TA: Yaswanth Reddy Vayalpati
Due: 27 APR 2018
-->

<html>
	<head>
	<title>Add New Owner</title>
	</head>
	
	<body>
	<!--html page head-->
	<h1 align="center">Input owner info</h1>
	
	<!--Input new owner info-->
	<form method="POST" action="">
		Last Name:		<input type="text" name="LastName"/>
		First Name:		<input type="text" name="FirstName" align="center"/></br>
		Address:		<input type="text" name="Address"/>
		City:			<input type="text" name="City" align="center"/></br>
		State:			<input type="text" name="State"/>
		Zip:			<input type="text" name="Zip" align="center"/></br>
		<input type="submit" name="submit" value="Submit"/>
		<input type="button" name="reset" value="Reset" onclick="window.location.href='http://students.cs.niu.edu/~z1761739/assign11_p1.php'"/>
	</form>
	</br>
	
		<?php
		include 'passwd.php';
		
		//where input values for owner info are retrieved
		$ownerNum = (isset($_POST["OwnerNumber"]) ? $_POST["OwnerNumber"] : null);
		$lName = (isset($_POST["LastName"]) ? $_POST["LastName"] : null);
		$fName = (isset($_POST["FirstName"]) ? $_POST["FirstName"] : null);
		$addr = (isset($_POST["Address"]) ? $_POST["Address"] : null);
		$city = (isset($_POST["City"]) ? $_POST["City"] : null);
		$state = (isset($_POST["State"]) ? $_POST["State"] : null);
		$zip = (isset($_POST["Zip"]) ? $_POST["Zip"] : null);
		
		try{
			if(isset($_POST['submit'])){
				//connection to host
				$dsn = "mysql:host=courses;dbname=z1761739";
				$pdo = new PDO($dsn, $username, $password);
				
				//query to be run to insert new owner into Owner table
				$sql =  "insert into Owner VALUES(?,?,?,?,?,?,?);";
				
				//prepares and executes command
				$result = $pdo->prepare($sql);
				$result->execute(array($ownerNum,$lName,$fName,$addr,$city,$state,$zip));
				
				echo $result->rowCount() . " records UPDATED successfully</br>";
			}
		}
		//message if connection to host fails
		catch(PDOexception $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		?>
	
	<!--Links at bottom of page to other pages-->
	<a href="http://students.cs.niu.edu/~z1761739/assign11_p1.php">Add New Owner</a>
	<a href="http://students.cs.niu.edu/~z1761739/assign11_p2.php">Add Service Request</a>
	<a href="http://students.cs.niu.edu/~z1761739/assign11_p3.php">Amend Service Request</a>
	
<!--Centers author name and section at bottom of page-->
		<center>
		<footer id = "footer">
			<div id = "footer-content">Damler, Lucas SEC 03, Due: 27 APR 2018</div>
		</footer>
		</center>
	</body>

</html>
