<?php

@include 'config.php';

if(isset($_POST['add_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['items'];
   $username = $_POST['username'];
   $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = ' $product_name'");
   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO cart (name, price,image,quantity,Username) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity','$username')");
      $message[] = 'product added to cart succesfully';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinocart</title>
    <link rel="stylesheet" href="MainPage.css">
    <!-- icon link -->
<script src="https://kit.fontawesome.com/4068d2f63d.js" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
      .message{
   display: block;
   background: var(--bg-color);
   padding:1.5rem 1rem;
   font-size: 2rem;
   color:var(--black);
   margin-bottom: 2rem;
   text-align: center;
}
    </style>
    <script src="MainPage.js" defer></script>
    <link rel="shortcut icon" href="img/Untitled2.png">
</head>
<body>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span></div>';
   };
};

?>
<?php
include 'header.php';
include 'config.php';
?>
<main>
    <!--New items-->

    <h2 id="newI">Products</h2>
    <br>
    <div class="all-products">
    <?php
    $search = $_GET['search'];
    // for coonection
    $flutter = "SELECT * FROM products WHERE name LIKE '%$search%'";
    // for the results
    $dart = mysqli_query($conn,$flutter); 
    // count the rows
    $count = mysqli_num_rows($dart);
    // Check the product if available
    if($count>0){
        while($row = mysqli_fetch_assoc($dart)){
            $pid = $row['id'];
            echo "<form method = 'post'>
            <a href='products-details.php?pid=$pid'><div class='Product'><div class='img-contaner'><img src='uploaded_img/".$row['image']."'' class='pro-im'></div>
            <div class='pro-text'><span class='pro-name'>".$row['name']."</span></a><br>
                                  <span class='mony'>".$row['price']."$</span><br>
                                  <input type = 'number' name = 'items' value = '0' min = '1'>
                                  <input type='hidden' name='product_name' value=".$row['name'].">
                                  <input type='hidden' name='product_price' value=".$row['price'].">
                                  <input type='hidden' name='product_image' value=".$row['image'].">
                                  <input type='hidden' name='username' value=".$_SESSION['user_name'].">
                                  <br>
                                  <br>
                                  <input type='submit' class='buy' value='Add To Cart' name='add_cart'>
                                  </div></div></form>";
        }
     }else{
        echo "'<div class = 'sa'><span class='error-msg'>'there is no product matching your <search class='</span></div>'";
    }
        
?>
<br>
    </main>
        <?php
        include 'fotter.php';
        ?>
</body>
</html>