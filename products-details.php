<?php

@include 'config.php';

if(isset($_POST['add_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['items'];
   $username = $_POST['username'];
   $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = ' $product_name'");
   if(mysqli_num_rows($select_cart) >0){
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Chocolate Cake.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/4129/4129437.png">
    <script defer>
        function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}
    </script>
    <title>Products</title>
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
if(isset($_GET['pid'])){
    $result = mysqli_query($conn,"SELECT * FROM products WHERE id = ".$_GET['pid']);
    while($row = mysqli_fetch_assoc($result)){
        $pid = $row['id'];
        echo "<div class='devider'>
          <div class='imdve'><img src='uploaded_img/".$row['image']."' class='proim' id='imgid'></div>
          <form method = 'post'> 
        <div class='textdiv'><h1>".$row['name']."</h1>
            <h2>".$row['price']."$</h2>
            <h2>".$row['uname']."</h2>
            <div class='value-button' id='decrease' onclick='decreaseValue()' value='Decrease Value'>-</div>
            <input type='number' id='number' name = 'items' value='0' >
            <div class='value-button' id='increase' onclick='increaseValue()' value='Increase Value'>+</div>
            <input type='hidden' name='product_name' value=".$row['name'].">
            <input type='hidden' name='product_price' value=".$row['price'].">
            <input type='hidden' name='product_image' value=".$row['image'].">
            <input type='hidden' name='username' value=".$_SESSION['user_name'].">
            <br>
            <br>   
            <input type='submit' class='buy' value='Add To Cart' name='add_cart'>
    </form></div>
</div>

<br>
<h2 id='dist'>Description</h2>

<h3 id='disb'>".$row['Discription']."</h3>";
}
}else{
    header('location:index.html');
}

include 'fotter.php';
?> 
</body>
</html>