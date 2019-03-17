<!DOCTYPE html>
<html>
<head>
	<title> Assignment 10 part 3 </title>
</head>
<body>


	<div style="position: fixed; top: 0; width:50%; text-align: center">

	<h1> Service by Boat Name</h1>

	<?php

        try{
	   include 'secrets.php';
           $dsn= "mysql:host=courses;dbname=z1818810";
           $pdo= new PDO($dsn, $user, $password);
           $sql = "select BoatName, SlipId from MarinaSlip;";
           $result= $pdo->query($sql);
	   $rows= $result->fetchALL();
	
	   echo '<form method="POST">';
	   echo '<select name="bname">';
	   foreach($rows as $key){
	     echo "<option>";
	     echo "$key[BoatName]";
	     echo " </option>";
	   }

	  echo "</select>";
	  echo '<input type="submit">';
  	  echo '<input type="reset">';
	  echo "</form>";



	if(!empty($_POST)){
	 $Pname = $_POST["bname"];
	 $string =$Pname;
     $sql = "select s.Description, b.BoatName 
		 from ServiceRequest s join MarinaSlip b
	  	 on s.SlipId = b.SlipId where 
		 b.BoatName like (:boatname);";
	 $prep = $pdo->prepare($sql);
	 $prep->bindParam(':boatname', $string, PDO::PARAM_STR,15);
	
	 $prep->execute();
	 $res = $prep->fetchALL();
	
	 if(!empty($res)){
         echo "<table border = 1>";
	 foreach($res as $key){
	   echo "<tr>";
	  // echo "<td> $key </td>";
	   echo "<td> $key[Description] </td>";
	   echo "</tr>";
	 }
         echo "</table>";
	 }

	 else{
	   echo "<h3> no service requests at this time </h3>";
	 }
	}


	}
	catch (PDOexception $e){
	   echo "connection failed".$e->getMessage();
	}

	?>



	<a href = "http://students.cs.niu.edu/~z1818810/assign10.php"> part 1
	
	<br>

	<a href = "http://students.cs.niu.edu/~z1818810/assign10p2.php"> part 2
	</div>
</body>
</html>
