<?php
include "connect.php";
$orderId = $_GET['id'];
$query = "select * from orderDetails where orderID=$orderId" ;
$data = $con -> query($query);

$totalPrice = 0;
?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<section target="productsList" id="productsList">
<div class="container">
  <div class="jumbotron"></div>
  <table class="table table-striped">
    <thead class="table-primary">

      <tr>
        <th scope="col">#</th>
        <th scope="col">product Type</th>
        <th scope="col">product Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th></th>
      </tr>

    </thead>

    <tbody >

        <?php
        while($rows = $data -> fetch_assoc())
          { 

            $productId = $rows['productID'];
            $productQuery = "SELECT * FROM products WHERE productID = $productId";
            $productRec = $con -> query($productQuery);
            $productData = $productRec -> fetch_assoc();
            $totalPrice = $totalPrice + $rows['price'] ; 

            ?>

          <tr>

            <td></td>
            <td><?php echo $productData['productType']; ?></td>
            <td><?php echo $productData['productName']; ?></td>
            <td><?php echo $rows['quantity']; ?></td>
            <td><?php echo $rows['price']; ?></td>

          </tr>
        <?php }?>

        <tr>
            <td colspan = "4" style = "text-align:right">TOTAL PRICE - </td>
            <td><?php echo $totalPrice ;?></td>
        </tr>

    </tbody>
  </table>
</div>
</section>