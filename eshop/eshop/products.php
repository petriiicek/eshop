<?php

@include_once '../dbh.inc.php';
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "logindb";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
    die("Připojení selhalo: " . mysqli_connect_error());
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'zboží bylo přidáno do košíku';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'zboží bylo přidáno do košíku';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>



<div class="container">

<section class="products">

   <h1 class="text-center">Všechny produkty</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>
   <section class="py-5">
   <div class="container px-4 px-lg-5 my-5">
   <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-80">
      <form action="" method="post">
         <div class="box">
            <img class="card-img-top img responsive" src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <div class="card-body p-4">
            <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
            <div class="text-center"><h5 class="fw-bolder"><?php echo $fetch_product['name']; ?></h5>
         
            <?php echo $fetch_product['price']; ?>KČ/-
         </div>
         </div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><input type="submit" class="btn btn-outline-dark mt-auto" value="Přidat do košíku" name="add_to_cart"></div>
         </div>
         </div>
         </div>
         </div>

      </form>
       
      <?php
         };
      };
      ?>

   </div>
</section>  
</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
<?php include 'footer.php'; ?>
</html>