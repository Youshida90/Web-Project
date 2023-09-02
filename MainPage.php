<?php

@include 'config.php';

if(isset($_POST['add_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['items'];
   $username = $_POST['username'];
   $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = ' $product_name'");
   if(mysqli_num_rows($select_cart)>0){
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
<main>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span></div>';
   };
};

?>
  <?php
  include 'config.php';
  include 'header.php';
  ?>
       <!--slideshow -->
       
<div class="slideshow-container">
    <?php
    
    $sel = "SELECT image FROM products ORDER BY image ASC LIMIT 7";
    $que = mysqli_query($conn, $sel);

    $output = "";
    if (mysqli_num_rows($que)<1) {
      $output = "<div class = 'sa'><h3 class='error-msg'>No image uploaded </h3></div>";
    } else {
        while ($row = mysqli_fetch_array($que)) {
            $output .= "<div class='mySlides fade'><img src='uploaded_img/" . $row['image'] . "' style='width:100%'></div>";


        }
    }
    echo $output;
?>
    
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br>
    
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
     
    </div>

    <!--New items-->

    <h2 id="newI">Some of ower latest products</h2>
    <br>
    <div class="all-products">
    <?php
    $que = mysqli_query($conn, "SELECT * FROM products ORDER BY price LIMIT 7");
    $output = "";
    if (mysqli_num_rows($que)<1) {
        $output = "<div class = 'sa'><h3 class='error-msg'>No image uploaded </h3></div>";
    } else {
      while($row = mysqli_fetch_assoc($que)){
        $pid = $row['id'];
        echo "  <form method = 'post'>
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
    }
    $id_to_replace = "SELECT cat FROM products";
    $sel = "SELECT * FROM products WHERE id = '{$id_to_replace}'";
$que = mysqli_query($conn, $sel);

if (mysqli_num_rows($que) < 1) {
    $output .= "<p></p>";
} else {
    $row = mysqli_fetch_array($que);
    $output.= " <form method = 'post'>
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
    echo $output;
?> 
</div>
<br>



    </main>
<?php
include 'fotter.php';
?>
</body>
</html>