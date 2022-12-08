  <?php 
    session_start();
    include('server/connection.php');
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

     <!--This is the include of style of boothstap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
   
    <!--This is the include of style of css -->
    <link rel="stylesheet" href="assets/css/style.css"/>

</head>
<body>

    <!--navbar start here-->
    
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
      <div class="container">
        <img class="logo" src="assets/imgs/logo.jpg"/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
  
            <li class="nav-item">
              <a class="nav-link" href="shop.php">Shop</a>
            </li>
  
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
  
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
  
            <li class="nav-item">
             <a href="cart.php">
              <i class="fas fa-shopping-cart">
                <?php if(isset($_SESSION['total_quantity']) && isset($_SESSION['total_quantity'])!=0){ ?>
                    <span class="cart-quantity"><?php echo $_SESSION['total_quantity'];?></span>
                <?php }?>
              </i>
            </a> 
             <a href="account.php"><i class="fas fa-user"></i></a> 
            </li>
            
            
          </ul>
        </div>
      </div>
      
  </nav>
