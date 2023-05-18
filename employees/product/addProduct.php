<?php
include "connect.php";
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
          <li><button class="btn btn-light" onclick="window.location.href = '../home.php';">EMPLOYEE</button></li>
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
        <h2>ADD PRODUCT</h2>
      </div>
    </section><!-- End Breadcrumbs -->
    </main><!-- End #main -->

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