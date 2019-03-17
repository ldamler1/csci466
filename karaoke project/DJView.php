<!DOCTYPE html>
<html>
<head></head>
<body>
<p> Table of All the people in queue</p>
<table align:"left" border="2">
	<tr>
		<th>Position in Queue</th>
		<th>Who is up</th>
		<th>Song Name</th>
		<th>Artist</th>
		<th>File Id</th>
	</tr>
	<?php 
		include 'passwd.php';
		try{
			$dsn = "mysql:host=courses;dbname=z1761739";
			$pdo = new PDO($dsn, $username, $password);
		}
		catch(PDOexception $e){
			echo "connection to database failed" . $e->getMessage();
		}	
		$query = "SELECT Users.name, Songs.title, Files.FileIdNum, InQueue.PlaceNum, Songs.Artist FROM InQueue JOIN Files ON InQueue.FileIdNum = Files.FileIdNum JOIN Songs ON Files.SongIdNum = Songs.SongIdNum JOIN Users On InQueue.UserIdNum = Users.UserIdNum JOIN Queue ON InQueue.PlaceNum = Queue.PlaceNum Where Queue.QueueType = 'free' ORDER BY Queue.signedTime ASC";
		$result = $pdo->prepare($query);
		$result->execute();
		$size = $result->rowCount();
		for($i = 0; $i < $size; $i++){
			$row = $result->fetch();
			echo"<tr>";
			echo "<td>".$row['PlaceNum']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['title']."</td>";
			echo "<td>".$row['Artist']."</td>";
			echo "<td>".$row['FileIdNum']."</td>";
			echo "</tr>";
		}

	?>

	
</table>
<p>Table of People who Paid</p>
<table border="2">
	<tr>
		<th onclick="DoNav('https:google.com');">Payment</th>
		<th>Sign Up Time</th>
		<th>Position in Queue</th>
		<th>Who is up</th>
		<th>Song Name</th>
		<th>Artist</th>
		<th>File Id</th>
	</tr>
	<?php 
		include 'passwd.php';
		try{
			$dsn = "mysql:host=courses;dbname=z1761739";
			$pdo = new PDO($dsn, $username, $password);
		}
		catch(PDOexception $e){
			echo "connection to database failed" . $e->getMessage();
		}	
		if(isset($_POST['orderby'])){
			$query =  "SELECT Users.name, Songs.title, Queue.payment, Queue.signedTime, Files.FileIdNum, Queue.PlaceNum, Songs.Artist FROM Queue JOIN InQueue ON Queue.PlaceNum = InQueue.PlaceNum JOIN Files ON InQueue.FileIdNum = Files.FileIdNum JOIN Songs ON Files.SongIdNum = Songs.SongIdNum JOIN Users On InQueue.UserIdNum = Users.UserIdNum WHERE Queue.QueueType = 'paid' ORDER BY ". $_POST['orderby'];
		}else{
		$query = "SELECT Users.name, Songs.title, Queue.payment, Files.FileIdNum, Queue.signedTime, Queue.PlaceNum, Songs.Artist FROM Queue JOIN InQueue ON Queue.PlaceNum = InQueue.PlaceNum JOIN Files ON InQueue.FileIdNum = Files.FileIdNum JOIN Songs ON Files.SongIdNum = Songs.SongIdNum JOIN Users On InQueue.UserIdNum = Users.UserIdNum WHERE Queue.QueueType = 'paid' ORDER BY Queue.payment DESC";
		}
		$result = $pdo->prepare($query);
		$result->execute();
		$size = $result->rowCount();
		for($i = 0; $i < $size; $i++){
			$row = $result->fetch();
			echo"<tr>";
			echo "<td> $ ".$row['payment']."</td>";
			echo "<td>".$row['signedTime']."</td>";
			echo "<td>".$row['PlaceNum']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['title']."</td>";
			echo "<td>".$row['Artist']."</td>";
			echo "<td>".$row['FileIdNum']."</td>";
			echo "</tr>";
		}

	?>

	
</table>
</body>



<p>Change Paid Tables Order</p>
<form method="post" action="page3.php"> 

<select name="orderby">
	<option value="Queue.signedTime ASC">Time Ascending</option>
	<option value="Queue.signedTime DESC">Time Descending</option>
	<option value="Queue.payment ASC">Payment Ascending</option>
	<option value="Queue.payment DESC">Payment Descending</option>
</select>
<input type="submit">
</form>

<p>Select Position to Remove</p>
<form method="post" action="page3.php">
<select name="position">
<?php 
		try{
			$dsn = "mysql:host=courses;dbname=".$user;
			$pdo = new PDO($dsn, $user, $password);
		}
		catch(PDOexception $e){
			echo "connection to database failed" . $e->getMessage();
		}	
		$query = "SELECT PlaceNum From InQueue ORDER BY PlaceNum";
		$result = $pdo->prepare($query);
		$result->execute();
		$size = $result->rowCount();
		for($i = 0; $i < $size; $i++){
			$row = $result->fetch();
			echo "<option value=".$row['PlaceNum'].">".$row['PlaceNum']."</option>";
		}
?>
<input type="submit">
</select>
</form>

<?php
		try{
			$dsn = "mysql:host=courses;dbname=z1761739";
			$pdo = new PDO($dsn, $username, $password);
		}
		catch(PDOexception $e){
			echo "connection to database failed" . $e->getMessage();
		}	
		if(isset($_POST['position'])){
			$query = "DELETE FROM InQueue WHERE PlaceNum = ".$_POST['position'];
			$result = $pdo->prepare($query);
			$result->execute();
			echo "<p> Position Number ".$_POST['position']." has been removed</p>";
		}
?>


</html>
