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
          }else if(isset($_POST['update_images'])){
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


      <h2>Update Product Images</h2>
      <div class="table-responsive">
        <div class="mx-auto container">
                <form id="edit-image-form" method="POST" enctype="multipart/form-data" action="update_images.php">
                    <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                    <div class="form-group mt-2">
                      <?php foreach($products as $product) {?>
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>"/>
                        <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>"/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 1</label>
                        <input type="file" class="form-control" id="image1" name="image1" placeholder="Image 1" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 2</label>
                        <input type="file" class="form-control" id="image2" name="image2" placeholder="Image 2" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 3</label>
                        <input type="file" class="form-control" id="image3" name="image3" placeholder="Image 3" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 4</label>
                        <input type="file" class="form-control" id="image4" name="image4" placeholder="Image 4" required/>
                    </div>
                    <div class="form-group mt-3">
                          <input type="submit" class="btn btn-primary" name="update_images" value="Update"/>
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
