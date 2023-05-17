<?php
include 'connect.php';

$products = $_GET['product'];
$productSelect = unserialize($products);
?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<section>
<form method="POST">
<div class="container">
  <div class="jumbotron">
  <table class="table table-striped" style="text-align: center">
    <thead class="table-primary">
      <tr>
        <th scope="col">Prduct Name</th>
        <th scope="col">Price</th>
        <th scope="col">Select Quantity</th>
      </tr>
    </thead>

    <tbody >
        <?php
          foreach($productSelect as $product)
          { 
            $getProducts = "SELECT * FROM products WHERE productID = $product";
            $result=mysqli_query($con,$getProducts);
            $rows = $result->fetch_assoc();
            
            ?>
          <tr>
            
            <td><?php echo $rows['productName']; ?></td>
            <td><?php echo $rows['sellingPrice']; ?></td>
            <td>
              <input type="number" name="quantity[]" required>
            </td>            
          </tr>
        <?php }?>
        <tr style="text-align: right">
          <td colspan="3" >
          <button class="btn btn-primary" type="submit" name="placeOrder" id="placeOrder"
          >Place Order</button>          
          </td>
        </tr>
    </tbody>
  </table>
<?php

  if(isset($_POST['placeOrder']))
{
  $quantity = $_POST['quantity'];
  $price = array();
  $total = 0;

  $insertOrder = "INSERT INTO orders (customerID) VALUES ('1')";
  $con->query($insertOrder);

  $lastquery = "SELECT orderID FROM orders ORDER BY orderID DESC LIMIT 1";
  $last=mysqli_query($con,$lastquery);
  $lastRecord = $last->fetch_assoc();
  $orderId = $lastRecord['orderID'];

  for($i = 0 ; $i < sizeof($productSelect); $i++){

    $selectQuery="SELECT * from products where productId = $productSelect[$i]"; // Fetch all the data from the table customers
    $result=mysqli_query($con,$selectQuery);
    $rows = $result->fetch_assoc();
    
    $price[$i] = $rows['sellingPrice'] * $quantity[$i];
    $total = $total + $price[$i];

    $insertDetails = "INSERT INTO orderDetails (productID , quantity , price) VALUES ( $productSelect[$i] , $quantity[$i] , $price[$i])";

    $con->query($insertDetails);
  }
}
?>
</form>
</div></div>

<div class="container" id = "showReceipt">
  <div class="jumbotron">
  <table class="table table-striped" style="text-align: center">
    <thead class="table-primary">
      <tr>
        <th scope="col">Prduct Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total Price<th>
      </tr>
    </thead>

    <tbody >
        <?php
          foreach($productSelect as $product)
          { 
            $getProducts = "SELECT * FROM products WHERE productID = $product";
            $result=mysqli_query($con,$getProducts);
            $rows = $result->fetch_assoc();
            
            ?>
          <tr>
            
            <td><?php echo $rows['productName']; ?></td>
            <td><?php echo $rows['sellingPrice']; ?></td>
            <td>
              <?php if(isset($_POST['placeOrder'])) {
                echo $quantity[array_search($product , $productSelect)] ;
              }
              else {
                echo "";
              }
              ?>
            </td>
            <td>
            <?php if(isset($_POST['placeOrder'])) {
                echo $price[array_search($product , $productSelect)];
              }
              else {
                echo "";
              } ?>
            </td>            
          </tr>
        <?php }?>

        <tr>
          <td style="text-align: right" colspan="3" >Total Amount</td>
          <td>
          <?php if(isset($_POST['placeOrder'])) {
                echo $total;
              }
              else {
                echo "";
              } ?>        
        </td>
        </tr>

        <tr style="text-align: right">
          <td colspan="4" >
            <form method="POST">
          <button class="btn btn-primary" type="submit" name="confirm" id="confirm"
          >Confirm</button></form>       
          </td>
        </tr>
    </tbody>
  </table>
</div> 
</div>
</section>
<?php

if(isset($_POST['confirm'])){
  header("location : selectProduct.php");
}
?>

