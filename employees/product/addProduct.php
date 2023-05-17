<?php
include "connect.php";
?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<section>
<div class="container">
<div class="jumbotron">
  <br>
  <form method="POST">

  <div class="form-group">
    <label for="ProductType">Product type</label>
    <select class="form-control" name = "productType" id = "ProductType">
        <option value="Cabinet SMPS">Cabinet SMPS</option>
        <option value="CPU">CPU</option>
        <option value="DVD Writer">DVD Writer</option>
        <option value="Hard Disk">Hard Disk</option>
        <option value="KeyBoard">KeyBoard</option>
        <option value="LED Monitor">LED Monitor</option>
        <option value="MotherBoard">MotherBoard</option>
        <option value="Printer">Printer</option>
        <option value="RAM">RAM</option>
        <option value="Webcam">Webcam</option>
    </select>
    </div>

  <div class="form-group">
    <label for="productName">Products</label>
    <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name" required>
  </div>

  <div class="form-group">
    <label for="costPrice">Cost Price</label>
    <input type="number" class="form-control" name="costPrice" id="costPrice" placeholder="cost price" required>
  </div>

  <div class="form-group">
    <label for="sellingPrice">Selling Price</label>
    <input type="number" class="form-control" name="sellingPrice" id="sellingPrice" placeholder="selling price">
  </div>

  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="quantity">
  </div>
  <br>
  <input type="submit" id="update" name="update" type="submit" class="btn btn-primary" placeholder="Update" value="Update">
</form>
</div>
</div>
</section>

<?php
include_once("connect.php");

if(isset($_POST['update']))
{	
$type = $_POST['productType'];
$name = $_POST['productName'];
$cprice = $_POST['costPrice'];
$sprice = $_POST['sellingPrice'];	
$stock = $_POST['quantity'];	

$query = "INSERT INTO products (productType, productName, costPrice, sellingPrice, availability) VALUES ('$type', '$name', '$cprice', '$sprice', '$stock');";

if ($con->query($query) === TRUE) {
  header("Location: productsList.php");
  exit();

} else {
  echo "Error updating record: " . $con->error;
}

$con->close();

}
?>