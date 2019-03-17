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
	<title>ROBOGARI P4</title>
	</head>
	
	<body>
	<!--html page head-->
	<h1 align="center">Search By Contributor Name</h1>
	
	<form method="POST" action="">
		Contributor Name:		<input type="text" name="cName"/>
		<input type="submit" name="submit" value="Submit"/>
		<input type="button" name="reset" value="Reset" onclick="window.location.href='http://students.cs.niu.edu/~z1761739/gp/gp_p2.php'"/>
	</form>
	</br>
	
	<?php
		include 'passwd.php';
		
		$cName = (isset($_POST["cName"]) ? $_POST["cName"] : null);
		
		try{		
			//connection to host
			$dsn = "mysql:host=courses;dbname=z1761739";
			$pdo = new PDO($dsn, $username, $password);
			
			if(isset($_POST['submit'])){		
				//TODO -- FIX AMBIGUITY
				$sql =  "select distinct Files.FileIdNum, title, artist, Contributors.name,
						Contributors.job, Files.SongType from Songs
						inner join Contributors on Songs.artist = Contributors.band
						inner join Files on Songs.SongIdNum = Files.SongIdNum 
						where name Like :keywrd;";
				$result = $pdo->prepare($sql);
				$cName = "%".$cName."%";
				$result->bindParam(':keywrd', $cName, PDO::PARAM_STR);
				$result->execute();
				$rows = $result->fetchAll();
				
				echo "<table border=1>";
				echo "<tr>";
				echo "<th>File Number</th>";
				echo "<th>Title</th>";
				echo "<th>Artist</th>";
				echo "<th>Contributor</th>";
				echo "<th>Contribution</th>";
				echo "<th>Song Type</th>";
				echo "</tr>";
				foreach($rows as $row){
					echo "<tr>";
					foreach($row as $key => $field){
						if(gettype($key) == 'integer')
							echo "<td>$field</td>";
					}
					echo "</tr>";
				}
				echo "</table></br>";
			}
		}
		//message if connection to host fails
		catch(PDOexception $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	?>
	
	<?php
		$input = (isset($_POST['songID']) ? $_POST['songID'] : null);
		$uidInput = (isset($_POST['UserIdNum']) ? $_POST['UserIdNum'] : null);
		$pay = (isset($_POST['payment']) ? $_POST['payment'] : null);
		
		if(isset($_POST['submit'])){
			echo "<form method='POST' action=''>";
			echo "File ID: <input type='text' name='songID'/></br>";
			echo "Payment: <input type='text' name='payment'/></br>";
			
			$sqlUser = "select UserIdNum from Users;";
			$result = $pdo->query($sqlUser);
			$rows = $result->fetchAll();
			
			echo "<select id='UserIdNum' name='UserIdNum'/>";
			echo "<option>Select User ID</option>";
			//populates dropdown list with userid
			foreach($rows as $row){
				echo "<option value='" .$row['UserIdNum'] . "'>" .$row['UserIdNum'] . "</option>";
			}
			echo "</select>";
			
			echo "<input type='submit' name='submit2' value='Submit'/>";
		}
		
		$time = date('H:i:s');
		
		if($pay <= '0'){$type = 'free';}
		else{$type = 'paid';}
		
		if(isset($_POST['submit2'])){
			$sql = "insert into Queue (QueueType, payment, signedTime) values ('$type', '$pay', '$time');";
			$result = $pdo->prepare($sql);
			$result->execute();
			
			$pNumSql = $pdo->query("select PlaceNum from Queue where signedTime = '$time';");
			$pNum = $pNumSql->fetch(PDO::FETCH_ASSOC);		
			$temp = implode($pNum);
			
			$sql = "insert into InQueue(FileIdNum, PlaceNum, UserIdNum) values ('$input', '$temp', '$uidInput');";
			$result = $pdo->prepare($sql);
			$result->execute();
		}
	?>
	</form>
	
	<!--Links at bottom of page to other pages --PLEASE IGNORE-->
	<a href="http://students.cs.niu.edu/~z1761739/gp/gp_p1.php">Home</a>
	<a href="http://students.cs.niu.edu/~z1761739/gp/gp_p2.php">Search By Song Name</a>
	<a href="http://students.cs.niu.edu/~z1761739/gp/gp_p3.php">Search By Artist</a>
	
<!--Centers author name and section at bottom of page-->
		<center>
		<footer id = "footer">
			<div id = "footer-content">Bottom Of Page</div>
		</footer>
		</center>
	</body>

</html>
