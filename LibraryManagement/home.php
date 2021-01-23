<?php
include 'connection.php';
$id_user = $_GET['userid'];

		?>


<!DOCTYPE html>
<html>
<head>
	<title>ConstruXology</title>
	<link rel="stylesheet" type="text/css" href="css/homestyle.css">
</head>
<center>
<body>
	<header class='tabwan'>	




<div class="myweb">
<p><a href="home.php?userid=<?=$id_user = $_GET['userid']?>">ConstruXology</a></p>
</div>

<div class="links">
	
	<form action="login.php">
	<div class="Action">
			<button type="submit" name="logout">Logout</button>
</form>
			<?php
			if(isset($_POST['logout'])){
			session_start();
session_destroy();
header('Location: login.php');
exit;
}
?>
	</div>



<div class="aht">
	<p>ConstruXology.edu</p>
</div>
<?php


			//retrieving of records from mysql database
			$sqlSelect = "SELECT * FROM tblLibrary WHERE id_number = '$id_user'";
			$query = mysqli_query($connect,$sqlSelect);
			$row = mysqli_fetch_assoc($query);
			?>

	</div>
	<div class="view">
	<button class="dashbook"><a href="booklist.php?uid=<?=$row['id_number']?>">Book List</a></button>
	<button class="dashadd"><a href="addbook.php?uid=<?=$row['id_number']?>">Add Book</a></button>
	</div>

	</header>

</body>
</center>
</html>
<?php


			//retrieving of records from mysql database
			$sqlSelect = "SELECT * FROM tblLibrary WHERE id_number = '$id_user'";
			$query = mysqli_query($connect,$sqlSelect);
			while($row = mysqli_fetch_assoc($query)){
			?>	
			<div class="home">
		<a href="home.php?userid=<?=$id_user = $_GET['userid']?>">Home</a>
	</div>

<div class="books">
		<a href="booklist.php?uid=<?=$row['id_number']?>">Book List</a>
	</div>
	<div class="addbook">
		<a href="addbook.php?uid=<?=$row['id_number']?>">Add Book</a>
	</div>

<div class="seedetails">
<button name="btnEdit"><a href="updateaccount.php?uid=<?=$row['id_number']?>">Profile</a></button>
</div>


<?php
		}
	
		?>
		