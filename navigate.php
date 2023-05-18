<?php      
    include('connect.php');  
    $email = $_POST['email'];  
    $password = $_POST['pass'];  

    $email = stripcslashes($email);  
    $password = stripcslashes($password);  
    $email = mysqli_real_escape_string($con, $email);  
    $password = mysqli_real_escape_string($con, $password);

   
    $pattern = "/admin/i"; // The "i" flag makes it case-insensitive

    if (preg_match($pattern, $email)) {
        $custSql = "select * from employee where email = '$email' and password = '$password'";
        $result = mysqli_query($con, $custSql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if($count == 1){
            header("location:employees/home.php");
        }    
        
    }
    else {
        $custSql = "select *from customers where email = '$email' and password = '$password'";
        $result = mysqli_query($con, $custSql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if($count == 1){  
            header("location:customers/home.php");
        }  
    }
        

?>  