<?php

include 'connection.php';
$id_user = $_GET['uid'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/updateaccount2.css">
<body>
	<header>
	
	<div class="header-block">
		<div class="logo">
			<p><a href="home.php?userid=<?=$id_user = $_GET['uid']?>">ConstruXology</a></p>
		</div>        
	
 
		<?php
			//retrieve a single record
		$sqlDisplay = "SELECT * FROM tblLibrary WHERE id_number = '$id_user'";
		$queryDisplay = mysqli_query($connect,$sqlDisplay);
		$row = mysqli_fetch_assoc($queryDisplay);

		?>
<form class="frmbody" action="updateaccount.php?uid=<?=$row['id_number']?>" method="POST">	
<label>First Name:</label>
<br>
<input type="text" name="fnameUp" value="<?=$row['fname']?>">
<br>
<label>Last Name:</label>
<br>
<input type="text" name="lnameUp" value="<?=$row['lname']?>">
<br>
<label>Email:</label>
<br>
<input type="text" name="emailUp" value="<?=$row['username']?>">
<br>


<div class="buttonup">
<button type="submit" name="btnUpdate">Update</button>
</div>
</form>
<?php

		//Post Method
		 if(isset($_POST['btnUpdate'])){
			//initialization
			
			$fnameUp = $_POST['fnameUp'];
			$lnameUp = $_POST['lnameUp'];
			$emailUp = $_POST['emailUp'];


		$sqlUpdate = "UPDATE tblLibrary set fname = '$fnameUp', lname = '$lnameUp', username = '$emailUp' WHERE id_number = '$id_user'";
		$query = mysqli_query($connect,$sqlUpdate);
		if ($query == TRUE) {
			echo "Record Updated";
		}else{
			echo "Record Not Updated";
		}

	}
?>


<form class="frmbody" action="updateaccount.php?uid=<?=$row['id_number']?>" method="POST">	

<label>Change Password</label>
<br>
<label>Confirm Password:</label>
<br>
<input id="cPass" type="password" name="conPass" required>

<br>
<label>New Password:</label>
<br>
<input type="password" name="newPass" required>
<br>



<div class="buttonup">
<button type="submit" name="btnUpPass">Update</button>
</div>
</form>

<?php

		//Post Method
		 if(isset($_POST['btnUpPass'])){
			//initialization
			$newPass = $_POST['newPass'];
			$conPass = $_POST['conPass'];



		$sqlSelect="SELECT * FROM tblLibrary WHERE id_number='$id_user'";
          $query=mysqli_query($connect,$sqlSelect);
          $rowss=mysqli_fetch_assoc($query);
		if ($rowss['password']==$conPass) {
			$sqlUpdate = "UPDATE tblLibrary set password = '$newPass' WHERE id_number = '$id_user'";
			$queryy = mysqli_query($connect,$sqlUpdate);
		if ($queryy == TRUE) {
			echo "Record Updated";
		}
	}
		else{
			echo "Record Not Updated";
		}
		
	}
?>

<?php

?>
</div>
</header>
</body>
</html>
  <?php

$sqlSelect = "SELECT * FROM tblLibrary WHERE id_number = '$id_user'";
			$query = mysqli_query($connect,$sqlSelect);
			while($uid = mysqli_fetch_assoc($query)){
			?>
	

				<?php
				echo "<div class='seedetails'>";
		
echo "<button class='btnBack' name='btnBack'>".  "<a href='home.php?userid=$uid[id_number]'>".  "Back" . "</a></button>
</div>"
	
?>


			<?php
		}
	
		?>    