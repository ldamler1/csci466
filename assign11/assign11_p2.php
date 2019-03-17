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
	<title>Add Service Request</title>
	</head>
	
	<body>
	<!--html page head-->
	<h1 align="center">Choose servie request to add</h1>
	</br>
	
	<!--form for dropdown lists of boat name and service category-->
	<form method="POST" action="">

		<?php
		include 'passwd.php';
		
		$bName = array();
		$catDesc = array();
		
		try {
			//connection to host
			$dsn = "mysql:host=courses;dbname=z1761739";
			$pdo = new PDO($dsn, $username, $password);
			
			//query to run fetching boat names
			$sql = "select distinct BoatName from MarinaSlip;";
			$result = $pdo->query($sql);
			while($rows = $result->fetch(PDO::FETCH_NAMED)){
				$bName[] = $rows['BoatName'];
			}
			
			echo "<select id='BoatName' name='BoatName'/>";
			echo "<option>Select Boat Name</option>";
			//populates dropdown list with boat names
			foreach($bName as $bn){
				echo "<option value='$bn'>" . $bn . "</option>";
			}
			echo "</select>";
			
			
			//query to run fetching service category list
			$sql = "select CategoryDescription from ServiceCategory;";
			$result = $pdo->query($sql);
			while($rows = $result->fetch(PDO::FETCH_NAMED)){
				$catDesc[] = $rows['CategoryDescription'];
			}
			
			echo "<select id='CategoryDescription' name='CategoryDescription'/>";
			echo "<option>Select Service Category</option>";
			//populates dropdown list with service categories
			foreach($catDesc as $cd){
				echo "<option value='$cd'>" . $cd . "</option>";
			}
			echo "</select>";
			
		}
		//message if connection to host fails
		catch(PDOexception $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		?>
		
		<!--Dropdown list for estimated hours to input into new service request-->
		<select name="estHours">
			<option>Estimtated Hours</option>
			<option>1.00</option><option>2.00</option><option>3.00</option>
			<option>4.00</option><option>5.00</option><option>6.00</option>
			<option>7.00</option><option>8.00</option>
		</select>
		
		<!--submit and reset buttons-->
		<input type="submit" name="submit" value="Submit"/>
		<input type="reset" name="cancel" value="Reset" onclick="window.location.href='http://students.cs.niu.edu/~z1761739/assign11_p2.php'"/>
		</br>
	</form>
	
		<?php
			if(isset($_POST['submit'])){
				//gets input from dropdown lists
				$bnInput = (isset($_POST['BoatName']) ? $_POST['BoatName'] : null);
				$cdInput = (isset($_POST['CategoryDescription']) ? $_POST['CategoryDescription'] : null);
				$hours = (isset($_POST['estHours']) ? $_POST['estHours'] : null);
				
				//querys to get slipID for boat name, and CategoryNum for category description
				$slipIDSql = $pdo->query("select SlipID from MarinaSlip where BoatName = '$bnInput';");
				$catNumSql = $pdo->query("select CategoryNum from ServiceCategory where CategoryDescription = '$cdInput';");
				$slipID = $slipIDSql->fetch(PDO::FETCH_ASSOC); $catNum = $catNumSql->fetch(PDO::FETCH_ASSOC);
				//changes array value from query into string values
				$temp1 = implode($slipID); $temp2 = implode($catNum);
				//current date input
				$date = date('Y-m-d');
				
				//inserts selected data into ServiceRequest table
				$sql = "insert into ServiceRequest(SlipID, CategoryNum, EstHours, NextServiceDate) values
						('$temp1', '$temp2', '$hours', '$date');";
				$result = $pdo->prepare($sql);
				$result->execute();
				
				echo $result->rowCount() . " records UPDATED successfully</br>";
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