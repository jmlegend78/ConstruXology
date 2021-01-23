<?php

include 'connection.php';

$id_item = $_GET['itemid'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/editstyle.css">
<body>
	<header>
	<div class="headerblock">
		<div class="logo">
			<p><a href="home.php?userid=<?=$id_user = $_GET['uid']?>">ConstruXology</a></p>
		</div>
		<?php
			//retrieve a single record
		$sqlDisplay = "SELECT * FROM tblBook WHERE author_id = '$id_item'";
		$queryDisplay = mysqli_query($connect,$sqlDisplay);
		$row = mysqli_fetch_assoc($queryDisplay);

		?>
<form class="frmbody" action="edititem.php?itemid=<?=$row['author_id']?>" method="POST">
<br>	
<label>Author First Name:</label>
<br>
<input type="text" name="fnameUp" value="<?=$row['author_fname']?>">
<br>
<label>Author Last Name:</label>
<br>
<input type="text" name="lnameUp" value="<?=$row['author_lname']?>">
<br>
<label>Book Number:</label>
<br>
<input type="text" name="bnumber" value="<?=$row['book_number']?>">
<br>
<label>Book Title:</label>
<br>
<input type="text" name="btitle" value="<?=$row['book_title']?>">
<br>
<label>Book Description:</label>
<br>
<input type="text" name="bdesc" value="<?=$row['book_desc']?>">
<br>
<label>Book Price:</label>
<br>
<input type="text" name="bprice" value="<?=$row['book_price']?>">
<br>
<label>Publisher Name:</label>
<br>
<input type="text" name="pname" value="<?=$row['publisher_name']?>">
<br>
<label>Year Published:</label>
<br>
<input type="text" name="yrpublish" value="<?=$row['year_pub']?>">
<br>
<label>Month Published:</label>
<br>
<input type="text" name="mnthpublish" value="<?=$row['month_pub']?>">
<br>
<label>Day Published:</label>
<br>
<input type="text" name="dypublish" value="<?=$row['day_pub']?>">
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
			$bnumber = $_POST['bnumber'];
			$btitle = $_POST['btitle'];
			$bdesc = $_POST['bdesc'];
			$bprice = $_POST['bprice'];
			$pname = $_POST['pname'];
			$yrpublish = $_POST['yrpublish'];
			$mnthpublish = $_POST['mnthpublish'];
			$dypublish = $_POST['dypublish'];



		$sqlUpdate = "UPDATE tblBook set author_fname  = '$fnameUp',
		 author_lname = '$lnameUp',
		  book_number  = '$bnumber', 
		  book_title = '$btitle', 
		  book_desc = '$bdesc',
		   book_price = '$bprice',
		   publisher_name = '$pname',
		    year_pub = '$yrpublish' ,
		     month_pub ='$mnthpublish',
		     day_pub ='$dypublish'




		WHERE author_id = '$id_item'";
		$query = mysqli_query($connect,$sqlUpdate);
		if ($query == TRUE) {
			echo "Record Updated";
		}else{
			echo "Record Not Updated";
		}

	}
?>


</div>
</header>
</body>
</html>

		<?php
$id_user = 1;
$sqlSelect = "SELECT * FROM tblLibrary WHERE id_number = '$id_user'";
			$query = mysqli_query($connect,$sqlSelect);
			while($uid = mysqli_fetch_assoc($query)){
			?>
	

				<?php
				echo "<div class='seedetails'>";
		
echo "<button class='btnBack' name='btnBack'>".  "<a href='booklist.php?uid=$uid[id_number]'>".  "Back" . "</a></button>
</div>"
	
?>


			<?php
		}
	
		?>


