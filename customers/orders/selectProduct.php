<?php
include "connect.php";

$getProducts = "select * from products order by productType"; // Fetch all the data from the table customers

$result=mysqli_query($con,$getProducts);

$row = $result->fetch_assoc();

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DWARKA TRADERS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <style>
a {
  color: #f7f7f7;
  text-decoration: none;
}
</style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">DWARKA</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
      <ul>
          <li><button class="btn btn-light" onclick="window.location.href = '../home.php';">CUSTOMER</button></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <br>
        <h2>SELECT PRODUCT</h2>
      </div>
    </section><!-- End Breadcrumbs -->
    </main><!-- End #main -->

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
