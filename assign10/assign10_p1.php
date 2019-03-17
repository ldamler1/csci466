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
	<title>Owner and Boat Info</title>
	</head>
	
	<body>
	<!--html page head-->
	<h1 align="center">Owner and Boat Information</h1>
	</br>
	
		<?php
		include 'passwd.php';
		
		try{
			//connection to host
			$dsn = "mysql:host=courses;dbname=z1761739";
			$pdo = new PDO($dsn, $username, $password);
			
			//query to be run to get boat name, last name, first name, marina name, and slip number
			$sql =  "select MarinaSlip.BoatName, LastName, FirstName,
				Marina.Name, MarinaSlip.SlipNum from Owner
				inner join MarinaSlip on
				MarinaSlip.OwnerNum = Owner.OwnerNum
				inner join Marina on
				MarinaSlip.MarinaNum = Marina.MarinaNum;";
			
			//runs query
			$result = $pdo->query($sql);
			//fetches all info from query
			$rows = $result->fetchAll();
			
			//table headers
			echo "<table border=1>";
			echo "<tr>";
			echo "<th>Boat Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>First Name</th>";
			echo "<th>Marina Name</th>";
			echo "<th>Slip Number</th>";
			echo "</tr>";
			//puts query info into a table
			foreach($rows as $row){
				echo "<tr>";
				foreach($row as $key => $field){
					if(gettype($key) == 'integer')
						echo "<td>$field</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}
		//message if connection to host fails
		catch(PDOexception $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		?>
	
	<!--Links at bottom of page to other pages-->
	<a href="http://students.cs.niu.edu/~z1761739/assign10_p1.php">Owner and Boat Info</a>
	<a href="http://students.cs.niu.edu/~z1761739/assign10_p2.php">Boats by Owner</a>
	<a href="http://students.cs.niu.edu/~z1761739/assign10_p3.php">Boat Service List</a>
	
<!--Centers author name and section at bottom of page-->
		<center>
		<footer id = "footer">
			<div id = "footer-content">Damler, Lucas SEC 03, Due: 20 APR 2018</div>
		</footer>
		</center>
	</body>

</html>
