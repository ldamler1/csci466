<!DOCTYPE html>
<html>
<h3>Public View of Who is Up (Top to Bottom)</h3>
<table align:"right" border="2">
	<tr>
		<th>Who is up</th>
		<th>Song Name</th>
		<th>Artist</th>
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

		$query = "SELECT Users.name, Queue.signedTime, Songs.title, Queue.payment, Files.FileIdNum, Queue.PlaceNum, Songs.Artist FROM Queue JOIN InQueue ON Queue.PlaceNum = InQueue.PlaceNum JOIN Files ON InQueue.FileIdNum = Files.FileIdNum JOIN Songs ON Files.SongIdNum = Songs.SongIdNum JOIN Users On InQueue.UserIdNum = Users.UserIdNum ORDER BY Queue.payment DESC , Queue.signedTime ASC";
		$result = $pdo->prepare($query);
		$result->execute();
		$size = $result->rowCount();
		for($i = 0; $i < $size; $i++){
			$row = $result->fetch();
			echo"<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['title']."</td>";
			echo "<td>".$row['Artist']."</td>";
			echo "</tr>";
		}

	?>

	
</table>


</html>
