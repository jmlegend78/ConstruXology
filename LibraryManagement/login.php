<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>ConstruXology</title>
	<link rel="stylesheet" type="text/css" href="css/loginstyle2.css">
</head>	
<body>
<header>
	<div class="header-block">
		<div class="logo">
			<p><a href="login.php">ConstruXology</a></p>
		</div>

	<div class="fblogin">
          <form class="frmbody" action="login.php" method="POST">
		<div class="email">
		<label>Username</label><br>
		<input type="text" name="email" required/>
		</div>
		<div class="password">
		<label>Password</label><br>
		<input type="password" name="password" required/>
			
		</div>
		<div class="loginbutton">
               <button type="submit" name="login">Log In</button>
		</div>
          </form>
          <?php
          if(isset($_POST['login']) && ($_POST['email']) && ($_POST['password'])){
$Email = $_POST['email'];
$Password = $_POST['password'];
          $sqlSelect="SELECT * FROM tblLibrary WHERE username='$Email' AND password='$Password'";
          $query=mysqli_query($connect,$sqlSelect);
          $rows=mysqli_fetch_assoc($query);  
               if($rows['username']==$Email && $rows['password']==$Password){
                   header ("location: home.php?userid=$rows[id_number]");
               }
               else{
                    echo '<script>alert("Incorrect")</script>';
               }    
               
}
?>
	</div>
</div>
</header>

</body>
</html>
