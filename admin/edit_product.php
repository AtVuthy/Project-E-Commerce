<?php 
    include('header.php');
    if(!isset($_SESSION['admin_logged_in'])){
      header('location: login.php');
      exit();
    }

  //get edit ordered

          if(isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];
            $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
            $stmt->bind_param('i',$product_id);
            $stmt->execute();
            $products = $stmt->get_result();
          }else if(isset($_POST['edit_btn'])){
            //update product
            $product_id = $_POST['product_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $color = $_POST['color'];
            $offer = $_POST['offer'];
            $stmt = $conn->prepare("UPDATE products SET product_name=?,product_description=?,product_price=?,
                                      product_special_offer=?,product_color=?,product_category=? WHERE product_id=?");

            $stmt->bind_param('ssssssi',$title,$description,$price,$offer,$color,$category,$product_id);

           if($stmt->execute()){
            header('location: products.php?edit_success_message=Product has been update successfully');
           }else{
            header('location: products.php?edit_failure_message=Error accured, try again');
           }
          }else{
            header('products.php');
            exit();
          }

?>


<div class="container-fluid">
  <div class="row">
    <?php include('sidemenu.php'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      
      </div>


      <h2>Edit Product</h2>
      <div class="table-responsive">
        <div class="mx-auto container">
                <form id="edit-form" method="POST" action="edit_product.php">
                    <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                    <div class="form-group mt-2">
                      <?php foreach($products as $product) {?>
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>"/>
                        <label>Title</label>
                        <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_name']; ?>" name="title" placeholder="Title"/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Description</label>
                        <input type="text" class="form-control" id="product-description" value="<?php echo $product['product_description']; ?>" name="description" placeholder="Description"/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Price</label>
                        <input type="text" class="form-control" id="product-price" value="<?php echo $product['product_price']; ?>" name="price" placeholder="Price"/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Category</label>
                        <select class="form-select" required name="category">
                            <option value="bags">Bags</option>
                            <option value="shoes">Shoes</option>
                            <option value="watches">Watches</option>
                            <option value="clothes">Clothes</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label>Color</label>
                        <input type="text" class="form-control" id="product-color" value="<?php echo $product['product_color']; ?>" name="color" placeholder="Color"/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Special Offer/Sales</label>
                        <input type="text" class="form-control" id="product-specialoffer" value="<?php echo $product['product_special_offer']; ?>" name="offer" placeholder="Sales %"/>
                    </div>
                    <div class="form-group mt-3">
                          <input type="submit" class="btn btn-primary" name="edit_btn" value="Edit"/>
                    </div>
                    <?php }?>
                </form>
        </div>

        </div>
      </div>
    </main>

  </div>

    <script src="../admin/assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
