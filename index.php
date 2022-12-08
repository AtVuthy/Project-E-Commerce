<?php include('layouts/header.php'); ?>

    <!--Home-->
    <section id="home">
        <div class="container"> 
          <h5>NEW ARRIVALS</h5>
          <h1><span>Best Prices</span>This season</h1>
          <p>Eshop offers the best products for the most affordable price</p>
          <button>Shop Now</button>

        </div>
    </section>

    <!--Brand-->
    <section id="brand" class="container">
      <div class="row"> 
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg"/>
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.png"/>
        <img class="img-fluis col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg"/>
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg"/>
      </div>
    </section>

    <!--New-->
    <section id="new" class="w-100">
      <div class="row p-0 m-0">
        <!--One-->
        <div class="one col-lg-4 col-md-12 col-sm-12">
          <img class="img-fluid" src="assets/imgs/1.png"/>
          <div class="details">
            <h2>Extreamely Awesome Shoes</h2>
            <button>Show Now</button>
          </div>
        </div>
        <!--Two-->
        <div class="one col-lg-4 col-md-12 col-sm-12">
          <img class="img-fluid" src="assets/imgs/2.jpeg"/>
          <div class="details">
            <h2>Awesome Jacket</h2>
            <button>Show Now</button>
          </div>
        </div>

        <!--Three-->
        <div class="one col-lg-4 col-md-12 col-sm-12">
          <img class="img-fluid" src="assets/imgs/3.jpeg"/>
          <div class="details">
            <h2>50% OFF Watches</h2>
            <button>Show Now</button>
          </div>
        </div>
      </div>
    </section>

    <!--Featured-->
    <section id="featured" class="my-5 pb-5">
          <div class="container text-center mt-5 py-5">
              <h3>Our Featured</h3>
              <hr class="mx-auto">
              <p>Here you can check out our featured products</p>
          </div>
          <div class="row mx-auto container-fluid">
            <?php include('server/get_featured_product.php'); ?>

            <?php while ($row = $featured_products->fetch_assoc()){ ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid md-3" src="assets/imgs/featured/<?php echo $row['product_image']; ?>"/>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
              <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
             <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a> 
            </div>
            <?php } ?>
          </div>
    </section>

    <!--Banner-->
    <section id="banner" class="my-5 py-5">
      <div class="container">
        <h4>MID SEASON'S SALE</h4>
        <h1>Autumn Collection <br> UP to 30% OFF</h1>
        <button class="text-uppercase">Show Now</button>
      </div>
    </section>

    <!--Closthes-->

    <section id="clothes" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h3>Dresses & Coats</h3>
        <hr class="mx-auto">
        <p>Here you can check out our amazing clothes</p>
    </div>
    <div class="row mx-auto container-fluid">
    <?php include('server/get_coats.php'); ?>

      <?php while ($row = $coats_products->fetch_assoc()){ ?>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid md-3" src="assets/imgs/clothes/<?php echo $row['product_image']; ?>"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
        <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
       <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a> 
      </div>
      <?php } ?>
    </div>
    </section>
     <!--Watches-->

    <section id="watches" class="my-5">
      <div class="container text-center mt-5 py-5">
          <h3>Best Watches</h3>
          <hr class="mx-auto">
          <p>Check out our unique watches</p>
      </div>
      <div class="row mx-auto container-fluid">
      <?php include('server/get_watches.php'); ?>

          <?php while ($row = $watches_products->fetch_assoc()){ ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid md-3" src="assets/imgs/<?php echo $row['product_image'] ?>"/>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
              <h4 class="p-price">$<?php echo $row['product_price'] ?></h4>
              <button class="buy-btn">Buy Now</button>
            </div>
          <?php } ?>
      </div>
    </section>
    
   <!--Shoes-->

   <section id="shoes" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h3>Dresses & Coats</h3>
        <hr class="mx-auto">
        <p>Here you can check out our amazing clothes</p>
    </div>
    <div class="row mx-auto container-fluid">
    <?php include('server/get_shoes.php'); ?>

          <?php while ($row = $shoes_products->fetch_assoc()){ ?>
              <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid md-3" src="assets/imgs/<?php echo $row['product_image'] ?>"/>
                <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price'] ?></h4>
                <button class="buy-btn">Buy Now</button>
              </div>
          <?php } ?>
   
    </div>
    </section>

    <?php include('layouts/footer.php'); ?>