<?php

include'conn.php';

$id = $_GET['id'];

$q = "DELETE FROM `slist` WHERE Id = $id ";

mysqli_query($con, $q);

header("location:display.php");

?>