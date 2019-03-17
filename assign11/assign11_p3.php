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
	<title>Amend Service Request</title>
	</head>
	
	<body>
	<!--html page head-->
	<h1 align="center">Choose service request to amend</h1>
	</br>
	
	<!--form for dropdown list and text input to update service request-->
	<form method="POST" action="">

		<?php
		include 'passwd.php';
		
		try {
			//connection to host
			$dsn = "mysql:host=courses;dbname=z1761739";
			$pdo = new PDO($dsn, $username, $password);
			
			//query to run fetching service id
			$sql = "select ServiceID from ServiceRequest order by ServiceID;";
			$result = $pdo->query($sql);
			$rows = $result->fetchAll();
			
			//text boxes to update description, status, and spent hours
			echo "Description: <input type='text' name='Description'/></br>";
			echo "Status: <input type='text' name='Status'/></br>";
			echo "Spent Hours: <input type='text' name='SpentHours'/></br>";
			
			//dropdown list to select which service request to update based on serviceid
			echo "<select id='ServiceID' name='ServiceID'/>";
			echo "<option>Select Service ID</option>";
			//populates dropdown list with serviceid
			foreach($rows as $row){
				echo "<option value='" .$row['ServiceID'] . "'>" .$row['ServiceID'] . "</option>";
			}
			echo "</select>";
		
			//submit and reset buttons
			echo "<input type='submit' name='submit' value='Submit Changes'/>";
			echo "<input type='reset' name='cancel' value='Reset' onclick='window.location.href='http://students.cs.niu.edu/~z1761739/assign11_p2.php''/>";
		}
		//message if connection to host fails
		catch(PDOexception $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		?>
		
		</form>
		</br>
	
		<?php
			//fetches data to update from input
			$input = (isset($_POST['ServiceID']) ? $_POST['ServiceID'] : null);
			$desc = (isset($_POST['Description']) ? $_POST['Description'] : null);
			$stat = (isset($_POST['Status']) ? $_POST['Status'] : null);
			$spentHours = (isset($_POST['SpentHours']) ? $_POST['SpentHours'] : null);
			
			if(isset($_POST['submit'])){
				//updates description, status, and spent hours in service request
				$sql = "UPDATE ServiceRequest SET Description='$desc', Status='$stat',
							SpentHours='$spentHours' where ServiceID = $input;";
				$result = $pdo->prepare($sql);
				$result->execute();
				echo $result->rowCount() . " records UPDATED successfully</br>";
			
				//dispalys updated service request in a table
				$sql = "select * from ServiceRequest where ServiceID = '$input';";
				$result = $pdo->query($sql);
				$rows = $result->fetchAll();
				//places updated data from query into a table
				echo "<table border=1>";
				echo "<tr>";
				echo "<th>Service ID</th>"; echo "<th>Slip ID</th>";
				echo "<th>Category Number</th>"; echo "<th>Description</th>";
				echo "<th>Status</th>"; echo "<th>Estimated Hours</th>";
				echo "<th>Spent Hours</th>"; echo "<th>Next Service Date</th>"; 
				echo "</th>";
				if($rows){
					foreach($rows as $row){
						echo "<tr>";
						foreach($row as $key => $field){
							if(gettype($key) == 'integer')	
								echo "<td>$field</td>";
						}
						echo "</tr>";
					}
				}
				echo "</table>";
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