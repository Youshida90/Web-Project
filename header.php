<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="food1.css">
    <title>Document</title>
    <style>
        .btn2{
    display: block;
    width: 30%;
    cursor: pointer;
    border-radius: .5rem;
    margin-left: 40rem;
    font-size: 1.7rem;
    padding:1rem 3rem;
    background: var(--red);
    color:var(--white);
    text-align: center;
}
.btn2:hover{
    background: var(--black);
}
    </style>
</head>
<body>
  <?php 
  include 'config.php';
  ?>
<header id="header">
     <img src="img/logo.png" alt="logo" class="logo">           
 
     <div class="wrap">
    <form method="get" action="search.php">
        <div class="search">
            <input type="text" name="search" class="searchm" placeholder="search">
            <button type="submit" name="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </form>
</div>
 
         <div class="hed" >
             <a href="CartPage.php"><button type="button" class="button">
                 <span class="b_icon"><ion-icon name="cart-outline"></ion-icon></span>
                 <p class="b_text">Youre cart</p>
                </button></a>
         </div>
         <?php
         session_start();
?>
<div class="hed" >
             <a href="index.php"><button type="button" class="button">
                 <span class="b_icon"><ion-icon name="log-out-outline"></ion-icon></span>
                 <p class="b_text">Logout</p>
                </button></a>
         </div>
<div class='hed' id='id'>
    <button class="dropbtn button">
      <span class="b_icon"><ion-icon name='person-circle-outline'></ion-icon></span>
      <span class="b_text"><?php echo  $_SESSION['user_name']?></span>
      
    </button>
</div>

</header>
         <header id="head2">
             <div id="categ">
                <a href="MainPage.php"><button class="but" style="background-color: #4787d1;">Home</button></a>
                <?php
                 $salah = mysqli_query($conn,"SELECT * FROM category");
                 while($row = mysqli_fetch_assoc($salah)){
                  $cid = $row['id'];
                 echo '<a href= "products.php?cid='.$cid.'"><button class="but">'.$row['cname'].'</button></a>';
                 }
                 ?>   
             </div>
         </header>


         <header id="head3">
            <img src="img/logo.png" alt="logo" class="logo"> 
            <div class="hed" >
                <a href="CartPage.php"><button type="button" class="button">
                    <span class="b_icon"><ion-icon name="cart-outline"></ion-icon></span>
                    <p class="b_text">Youre cart</p>
                </button></a>
            </div>
<?php
include 'config.php';
?>

        </header>
        <header id="head4">
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"> &#9776</button>
                <div id="myDropdown" class="dropdown-content">
                  <a href="MainPage.php"><span style="color: #4787d1;">Home</span></a>
                  <?php
                 $salah = mysqli_query($conn,"SELECT * FROM category");
                 while($row = mysqli_fetch_assoc($salah)){
                  $cid = $row['id'];
                 echo '<a href= "products.php?cid='.$cid.'">'.$row['cname'].'</a>';
                 }
                 ?> 
                 <a href="index.php">Logout</a>
                </div>
              </div>


              <div class="wrap">
    <form method="get" action="search.php">
        <div class="search">
            <input type="text" name="search" class="searchm" placeholder="search">
            <button type="submit" name="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </form>
</div>
        </header>
</body>
</html>