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
	<title>ROBOGARI P3</title>
	</head>
	
	<body>
	<!--html page head-->
	<h1 align="center">Search By Artist</h1>
	
	<form method="POST" action="">
		<!-- Owner Number:	<input type="text" name="OwnerNumber"/></br> -->
		Artist Name:		<input type="text" name="aName"/>
		<input type="submit" name="submit" value="Submit"/>
		<input type="button" name="reset" value="Reset" onclick="window.location.href='http://students.cs.niu.edu/~z1761739/gp/gp_p3.php'"/>
	</form>
	</br>
	
		<?php
		include 'passwd.php';
		
		$aName = (isset($_POST["aName"]) ? $_POST["aName"] : null);
		
		try{			
			if($_POST['submit']){
				//connection to host
				$dsn = "mysql:host=courses;dbname=z1761739";
				$pdo = new PDO($dsn, $username, $password);
				
				//query to be run to get boat name, last name, first name, marina name, and slip number
				$sql =  "select * from Songs where artist Like :keywrd;";
				$result = $pdo->prepare($sql);
				
				$aName = "%".$aName."%";
				
				$result->bindParam(':keywrd', $aName, PDO::PARAM_STR);
				$result->execute();
				
				$rows = $result->fetchAll();
				
				echo "<table border=1>";
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
		}
		//message if connection to host fails
		catch(PDOexception $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		?>
		
	<a href="http://students.cs.niu.edu/~z1761739/gp/gp_p1.php">Home</a>
	<a href="http://students.cs.niu.edu/~z1761739/gp/gp_p2.php">Search By Song Title</a>
	<a href="http://students.cs.niu.edu/~z1761739/gp/gp_p4.php">Search By Contributor</a>
	
<!--Centers author name and section at bottom of page-->
		<center>
		<footer id = "footer">
			<div id = "footer-content">Bottom Of Page</div>
		</footer>
		</center>
	</body>

</html>
