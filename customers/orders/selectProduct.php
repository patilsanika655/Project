<?php
include "connect.php";

$getProducts = "select * from products order by productType"; // Fetch all the data from the table customers

$result=mysqli_query($con,$getProducts);

$row = $result->fetch_assoc();

?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<section>
<form method="POST" >
<div class="container">
  <div class="jumbotron"></div>
  <table class="table table-striped" style="text-align: center">
    <thead class="table-primary">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product Type</th>
        <th scope="col">Prduct Name</th>
        <th scope="col">Price</th>
        <th scope="col">Stock Available</th>
      </tr>
    </thead>

    <tbody >
        <?php
          while($rows=$result->fetch_assoc())
          { ?>
          <tr>
            <td><from method="POST">
              <input type="checkbox" name="product[]"  value='<?php echo $rows['productID']; ?>' autocomplete="off">
            </td>
            <td><?php echo $rows['productType']; ?></td>
            <td><?php echo $rows['productName']; ?></td>
            <td><?php echo $rows['sellingPrice']; ?></td>
            <td><?php echo $rows['availability']; ?></td>
            
          </tr>
        <?php }?>
        <tr style="text-align: right">
          <td colspan="6" >
          <button class="btn btn-primary" type="submit" name="selectProduct" id="selectProduct"
          >Next</button>          
          </td>
        </tr>
    </tbody>
  </table>
</div>
</form>
</section>

<script>
function Redirect(prod){
        const url = "placeOrder.php?product="+ prod ;
        window.location.href = url;
    };
</script>


<?php
if(isset($_POST['selectProduct'])) 
{
  $product = $_POST['product'];
  $serProduct = serialize($product);

  if(empty($product)){
    echo "Please Select any Product";
  }
  else{
    echo "<script type='text/javascript'>Redirect('$serProduct');</script>" ;
  }

}
?>
