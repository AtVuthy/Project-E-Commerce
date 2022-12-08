<?php 
    include('header.php');
    if(!isset($_SESSION['admin_logged_in'])){
      header('location: login.php');
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


      <h2>Add New Product</h2>
      <div class="table-responsive">
        <div class="mx-auto container">
                <form id="create-form" enctype="multipart/form-data" method="POST" action="create_product.php">
                    <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                    <div class="form-group mt-2">
                        <label>Title</label>
                        <input type="text" class="form-control" id="product-name" value="" name="name" placeholder="Title"/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Description</label>
                        <input type="text" class="form-control" id="product-desc" value="" name="description" placeholder="Description"/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Price</label>
                        <input type="text" class="form-control" id="product-price" value="" name="price" placeholder="Price"/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Special Offer/Sales</label>
                        <input type="text" class="form-control" id="product-specialoffer" value="" name="offer" placeholder="Sales %"/>
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
                        <input type="text" class="form-control" id="product-color" value="" name="color" placeholder="Color"/>
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
                          <input type="submit" class="btn btn-primary" name="create_product" value="Create Product"/>
                    </div>
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
