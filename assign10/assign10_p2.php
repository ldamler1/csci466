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
	<title>Boats by Owner</title>
	</head>
	
	<body>
	<!--html page head-->
	<h1 align="center">Boats by Owner</h1>
	</br>
	
	<!--form for dropdown list-->
	<form method="GET" action="">
		<select id="LastName" name="LastName">
	
		<?php
		include 'passwd.php';
		
		try {
			//connection to host
			$dsn = "mysql:host=courses;dbname=z1761739";
			$pdo = new PDO($dsn, $username, $password);
			
			//query to run fetching owner last names
			$sql = "select LastName from Owner;";
			
			//prepares and executes query
			$result = $pdo->prepare($sql);
			$result->execute();
			//fetches all data from query
			$rows = $result->fetchAll();
			
			//populates dropdown list with last names
			foreach($rows as $row){
				echo "<option value='" .$row['LastName'] . "'>" .$row['LastName'] . "</option>";
			}
		}
		//message if connection to host fails
		catch(PDOexception $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		?>
		
		<!--submit button to run query-->
		<input type="submit" name="submit"/>
		<!--reset button to reset query-->
		<input type="button" name="cancel" value="reset" onclick="window.location.href='http://students.cs.niu.edu/~z1761739/assign10_p2.php'"/>
		</br>
		
		<?php
			//gets input from dropdown list
			$input = (isset($_GET['LastName']) ? $_GET['LastName'] : null);
			echo "<h>$input</h>";
			
			//query to be run based on selection form dropdown list
			$sql = "select BoatName from MarinaSlip inner join Owner on MarinaSlip.OwnerNum = Owner.OwnerNum where LastName = '$input';";
			
			//runs query based on sleection from dropdown list and fetches data
			$result = $pdo->query($sql);
			$rows = $result->fetchAll();
			
			//places data from query into a table
			echo "<table border=1>";
			echo "<tr>";
			echo "<th>Boat Name</th>";
			echo "</th>";
			foreach($rows as $row){
				echo "<tr>";
				foreach($row as $key => $field){
					if(gettype($key) == 'integer')
						echo "<td>$field</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		?>
		</select>
	</form>
	
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