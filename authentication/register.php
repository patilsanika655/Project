<?php      
    include('connect.php'); 
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include 'connect.php';   
    
    $storename = $_POST["storeName"];
    $owner = $_POST["owner"];
    $address = $_POST["address"];
    $email = $_POST["email"]; 
    $password = $_POST["pass"];             
    
    $sql = "Select * from customers where email='$email'";
    
    $result = mysqli_query($con, $sql);
    
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the emailname is already present 
    // or not in our Database
    if($num == 0) {

            $sql = "INSERT INTO `customers`(`StoreName`, `Owner`, `Address`, `email`, `password`) VALUES ('$storename','$owner','$address','$email','$password')";
    
            $result = mysqli_query($con, $sql);
    
            if ($result) {
                $showAlert = true; }
            }
    
} 
?>