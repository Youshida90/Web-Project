<?php

@include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE cart SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:CartPage.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM cart WHERE id = '$remove_id'");
   header('location:CartPage.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM cart");
   header('location:CartPage.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="cart.js" defer></script>
   <script defer>
      function money(){
   window.alert("You are my Friend");
}
   </script>
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <script src="https://kit.fontawesome.com/4068d2f63d.js" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="cart.css">
   <link rel="stylesheet" href="MainPage.css">

</head>
<body>
<header id="header">
     <img src="img/logo.png" alt="logo" class="logo">           

     <?php
     session_start();
include 'config.php';
?>
<div class='hed' id='id'>
  <div class="dropdown">
    <button class="dropbtn button">
      <span class="b_icon"><ion-icon name='person-circle-outline'></ion-icon></span>
      <span class="b_text"><?php echo  $_SESSION['user_name'];?></span>
    </button>
    <div class="dropdown-content">
      <a href="index.php">Logout</a>
    </div>
  </div>
</div>
</header>
<div class="container">

<section class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE Username = '".$_SESSION['user_name']."'");

         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo number_format($fetch_cart['price']); ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
            <td><a href="CartPage.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="MainPage.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>$<?php echo $grand_total; ?></td>
            <td><a href="CartPage.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
   <span onclick="return money()"><a class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a></span>
   </div>

</section>

</div>
</body>
</html>