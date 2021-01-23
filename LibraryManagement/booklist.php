<?php

include 'connection.php';
$id_user = $_GET['uid'];
$sqlSelect="SELECT * FROM tblLibrary WHERE id_number='$id_user'";
          $query=mysqli_query($connect,$sqlSelect);
          $rowss=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bookliststyle.css">
</style>
<body>
	<header>


<div class="headerblock">
		<div class="logo">
			<p><a href="home.php?userid=<?=$id_user = $_GET['uid']?>">ConstruXology</a></p>
		</div>









<?php
 	
		echo '<form class="frmbody" action= "booklist.php?uid=$rowss[id_number]" method="POST">';
$sqlDisplay = "SELECT * FROM tblBook ";
		$queryDisplay = mysqli_query($connect,$sqlDisplay);    
if ($queryDisplay->num_rows > 0) {
  echo "<table cellspacing='0' border='1'>";
  echo "<tr>
	<th colspan='12'>Book List</th>
	</tr>";
	echo "<tr>
	<th>Author ID:</th>
	<th>Authro First Name:</th>
	<th>Author Last Name:</th>
	<th>Book NO:</th>
	<th>Book Title:</th>
	<th>Book Description:</th>
	<th>Book Price: </th>
	<th>Publisher Name:</th>
	<th>Year Published:</th>
	<th>Month Published:</th>
	<th>Day Published:</th>
	<th>Edit/Delete:</th>
	</tr>";
  echo "<th colspan='12'></th>";
  echo "<tr>";
 
	
  // output data of each row
  while($row = $queryDisplay->fetch_assoc()) {

	# code...

    echo "</center><td><center>".$row["author_id"].
    "</center><td><center>".$row["author_fname"]. 
    "</center></td><td><center>".$row["author_lname"].
    "</center></td><td><center>".$row["book_number"].
    "</center></td><td><center>".$row["book_title"].
    "</center></td><td><center>". $row["book_desc"].
    "</center></td><td><center>".$row["book_price"].
    "</center></td><td><center>".$row["publisher_name"].
    "</center></td><td><center>". $row["year_pub"].
    "</center></td><td><center>". $row["month_pub"].
    "</center></td><td><center>". $row["day_pub"].
    "</center></td><td>".





    "<br>"."<center><button type='submit' name='btnEdit' value=".$row["author_id"].">Edit</button></center>"."<br>".




    "<center><button type='submit' name='btnDelete' value=".$row["author_id"].">Delete</button></center>"."<br>".





     "</td></tr>";

}
  echo "</table>";
}
 else {
  echo "0 results";
}

echo "</form>";
if(isset($_POST['btnEdit'])){


$perRow = $_POST['btnEdit'];
          $sqlSelect="SELECT * FROM tblBook WHERE author_id='$perRow'";
          $query=mysqli_query($connect,$sqlSelect);
          $rows=mysqli_fetch_assoc($query);  
               if($rows['author_id']==$perRow){
                   header ("location: edititem.php?uid=$rowss[id_number]&itemid=$rows[author_id]");
               }
               else{
                    echo '<script>alert("Invalid")</script>';
               }


}




if(isset($_POST['btnDelete'])){

$perRow=$_POST['btnDelete'];


$sql = "DELETE FROM tblBook WHERE author_id= '$perRow'";

if (mysqli_query($connect, $sql)) {
  
echo "Delete Successfully!";
 header ("location: booklist.php?uid=1");



} else {
  echo "Error deleting record: ";
}


}



?>






       </div>
		</header>
               </body>
</html>
<?php
$id= 1;
$sqlSelect = "SELECT * FROM tblLibrary WHERE id_number = '$id'";
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