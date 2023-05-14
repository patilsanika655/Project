<?php
include "connect.php";

$query="select * from products where productId"; // Fetch all the data from the table customers

$result=mysqli_query($con,$query);
$con->close();
?>