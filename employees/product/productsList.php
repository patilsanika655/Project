<?php 
  include 'getProduct.php';  
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
        <th scope="col">Product Type</th>
        <th scope="col">Prduct Name</th>
        <th scope="col">Price</th>
        <th scope="col">Stock Availablety</th>
        <th></th>
      </tr>

    </thead>

    <tbody >

        <?php
          while($rows=$result->fetch_assoc())
          { ?>

          <tr>
            <td></td>
            <td><?php echo $rows['productType']; ?></td>
            <td><?php echo $rows['productName']; ?></td>
            <td><?php echo $rows['sellingPrice']; ?></td>
            <td><?php echo $rows['availability']; ?></td>
            <td>
              <a href="updateProduct.php?id=<?php echo $rows['productID']; ?>" class="btn btn-success">Edit</a></td>
          </tr>

        <?php }?>

    </tbody>
  </table>
</div>
</section>


