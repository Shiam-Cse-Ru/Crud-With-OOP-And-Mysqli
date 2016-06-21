<?php include "inc/header.php";
include "config.php";
include "database.php";

 ?>
<?php 
$db=new Databse();
$id=$_GET['id'];
$query="DELETE FROM tbl_user WHERE id=$id";
$delete=$db->Delete($query);

 ?>

	 



<?php include "inc/footer.php"; ?>