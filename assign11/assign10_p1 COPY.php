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
	<title>TEST_PAGE_1</title>
	</head>
	
	<body>
		<?php
		include 'passwd.php';
		
		try {
			$dsn = "mysql:host=courses;dbname=z1761739";
			$pdo = new PDO($dsn, $username, $password);
			
			$n = $pdo->exec("use z1761739");
			
			$sql =  "select MarinaSlip.BoatName, LastName, FirstName, MarinaSlip.MarinaNum
					from Owner 
					inner join MarinaSlip on Owner.OwnerNum = MarinaSlip.OwnerNum
					inner join Marina on MarinaSlip.MarinaNum = Marina.MarinaNum
					order by LastName;";
			
			$result = $pdo->query($sql);
			
			$rows = $result->fetchAll();
			
			echo "<table border=1>";
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
		catch(PDOexception $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		?>
	</body>

</html>