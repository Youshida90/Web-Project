<?php
session_start();
include 'config.php';

if(isset($_POST['add_product'])){
   $product_name = mysqli_real_escape_string($conn,$_POST['product_name']);
   $product_price = mysqli_real_escape_string($conn,$_POST['product_price']);
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;
   $cat = mysqli_real_escape_string($conn,$_POST['Category']);
   $dis = mysqli_real_escape_string($conn,$_POST['Dis']);
   $uname = $_SESSION['admin_name'];
   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'Please fill out all fields';
   } else {
      // Check if product with the same name already exists
      $query = "SELECT * FROM products WHERE name = '$product_name'";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 0){
         $message[] = 'A product with the same name already exists';
      } else {
        // Check if product with the same image already exists
        $query = "SELECT * FROM products WHERE image = '$product_image'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
           $message[] = 'A product with the same image already exists';
        } else {
           $category_ID = null;
           if($cat=='Food'){
            $category_ID = '1';
           }else if($cat == 'Art'){
            $category_ID = '2';
           }elseif($cat == 'Cloth'){
            $category_ID = '3';
           }elseif($cat == 'Furniture'){
            $category_ID = '4';
           }elseif($cat == 'Jewelry'){
            $category_ID = '5';
           }elseif($cat == 'Pets'){
            $category_ID = '6';
           }elseif($cat=='Toys'){
            $category_ID = '7';
           }
           $insert = "INSERT INTO products(name,price,image,Discription,cid,uname) VALUES('$product_name', '$product_price', '$product_image','$dis','$category_ID','$uname')";
          $upload_files = mysqli_query($conn,$insert);
           if($upload_files){
              move_uploaded_file($product_image_tmp_name, $product_image_folder);
              $message[] = 'New product added successfully';
           } else {
              $message[] = 'Could not add the product';
           }
        }
      }
   }
}
if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE id = $id");
   header("location:AdminPanel.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/7068/7068007.png">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   <script src="https://kit.fontawesome.com/4068d2f63d.js" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="AdminPanel.css">

</head>
<body>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
 <header id="header">
     <img src="img/logo.png" alt="logo" class="logo">           

     <?php
include 'config.php';
?>
<div class='hed' id='id'>
  <div class="dropdown">
    <button class="dropbtn button">
      <span class="b_icon"><ion-icon name='person-circle-outline'></ion-icon></span>
      <span class="b_text"><?php echo $_SESSION['admin_name'];?></span>
    </button>
  </div>
</div>

<style>
/* Position the scroll down icon to the right of the text */
.scroll_icon {
  display: inline-block;
  margin-left: 5px;
}

/* Make the scroll down icon unclickable */
.scroll_icon {
  pointer-events: none;
}
</style>

<!-- Add the following JavaScript code to handle the dropdown menu -->
<script defer>
// Get the dropdown button element
var dropdownBtn = document.querySelector(".dropbtn");

// Add a click event listener to the dropdown button
dropdownBtn.addEventListener("click", function() {
  // Toggle the "show" class to display or hide the dropdown content
  document.querySelector(".dropdown-content").classList.toggle("show");
});

// Close the dropdown menu when the user clicks outside of it
window.addEventListener("click", function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.querySelectorAll(".dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
});
</script>



</header>

  
   
        </header>
<main>
   
<div class="container">

   <div class="admin-product-form-container">

<br>
<br>

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" placeholder="enter product name" name="product_name" class="box">
         <input type="number" placeholder="enter product price" name="product_price" class="box">
         <select name="Category" class="box" required>
            <option value="Art">Art</option>
            <option value="Cloth">Cloth</option>
            <option value="Food">Food</option>
            <option value="Furniture">Furniture</option>
            <option value="Jewelry">Jewelry</option>
            <option value="Pets">Pets</option>
            <option value="Toys">Toys</option>
         </select>
         <input type="text" placeholder="enter Description" name="Dis" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>
   <?php

   $select = mysqli_query($conn, "SELECT * FROM products WHERE uname = '".  $_SESSION['admin_name']."'");
   
   ?>

   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>product image</th>
            <th>product name</th>
            <th>product price</th>
            <th>Description</th>
            <th>action</th>
         </tr>
         </thead>
         <?php 
         while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['price']; ?></td>
            <td><?php echo $row['Discription'];?></td>
            <td>
               <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="AdminPanel.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
   </table>
      <br>
      <br>
      <br>
      <br>
      <br>
      <a href="index.php" class="btn2">Logout</a>
   </div>
</div>
</body>
</html>