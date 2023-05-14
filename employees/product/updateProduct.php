<?php
include "connect.php";
$productId = $_GET['id'];
$query = "select * from products where productID=$productId" ;
$data = $con -> query($query);
$result = $data -> fetch_assoc();

$product_type = $result['productType'];
$product = $result['productName'];
$price = $result['sellingPrice'];
$quantity = $result['availability'];
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
    <input type="text" class="form-control" id="ProductType" placeholder="<?php echo $product_type ?>" disabled>
  </div>

  <div class="form-group">
    <label for="productName">Product</label>
    <input type="text" class="form-control" id="productName" placeholder="<?php echo $product ?>" disabled>
  </div>

  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" name="price" id="price" value="<?php echo $price ?>">
  </div>

  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" class="form-control" name="quantity" id="quantity" value="<?php echo $quantity ?>">
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

$sprice = $_POST['price'];	
$stock = $_POST['quantity'];	

$query = "UPDATE products SET sellingPrice = '$sprice' , availability = '$stock' WHERE productID=$productId";

if ($con->query($query) === TRUE) {
  header("Location: productsList.php");
  exit();

} else {
  echo "Error updating record: " . $con->error;
}

$con->close();

}
?>