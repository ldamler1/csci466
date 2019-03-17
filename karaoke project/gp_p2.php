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
	<title>ROBOGARI P2</title>
	</head>
	
	<body>
	<!--html page head-->
	<h1 align="center">Search By Song Title</h1>
	
	<form method="POST" action="">
		Song Name:		<input type="text" name="songName"/>
		<input type="submit" name="submit" value="Submit"/>
		<input type="button" name="reset" value="Reset" onclick="window.location.href='http://students.cs.niu.edu/~z1761739/gp/gp_p2.php'"/>
	</form>
	</br>
	
	<?php
		include 'passwd.php';
		
		$songName = (isset($_POST["songName"]) ? $_POST["songName"] : null);
		
		try{		
			//connection to host
			$dsn = "mysql:host=courses;dbname=z1761739";
			$pdo = new PDO($dsn, $username, $password);
			
			if(isset($_POST['submit'])){		
				//query to be run to get boat name, last name, first name, marina name, and slip number
				$sql =  "select Files.FileIdNum, title, artist, Files.SongType from Songs
						inner join Files on Songs.SongIdNum = Files.SongIdNum 
						where title Like :keywrd;";
				$result = $pdo->prepare($sql);
				$songName = "%".$songName."%";
				$result->bindParam(':keywrd', $songName, PDO::PARAM_STR);
				$result->execute();
				$rows = $result->fetchAll();
				
				echo "<table border=1>";
				echo "<tr>";
				echo "<th>File Number</th>";
				echo "<th>Title</th>";
				echo "<th>Artist</th>";
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
