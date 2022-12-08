<?php 
    include('header.php');
    if(!isset($_SESSION['admin_logged_in'])){
      header('location: login.php');
      exit();
    }

  //get ordered

          //1. determine page no
          if(isset($_GET['page_no']) && $_GET['page_no']!="")
          {
            //if user has already entered page then number is the one that they select 
            $page_no = $_GET['page_no'];
          }else{
            $page_no = 1;
          }

          //2. return number of product
            $stmt1 = $conn->prepare("SELECT COUNT(*) as total_records FROM orders");
            $stmt1->execute();
            $stmt1->bind_result($total_records);
            $stmt1->store_result();
            $stmt1->fetch();

            //3. products
            $total_record_per_page = 10;
            $offset = ($page_no-1) * $total_record_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacernts ="2";
            $total_no_of_page = ceil($total_records/$total_record_per_page);

            //4. get all products
            $stmt2 = $conn->prepare("SELECT * FROM orders LIMIT $offset,$total_record_per_page");
            $stmt2->execute();
            $orders= $stmt2->get_result();

?>


<div class="container-fluid">
  <div class="row">
    <?php include('sidemenu.php'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
       <!-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>-->
      </div>

     <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->

      <h2>Orders</h2>
      <?php if(isset($_GET['order_updated'])){ ?>
          <p class="text-center" style="color: green;"><?php echo $_GET['order_updated']; ?></p>
        <?php }?>
        <?php if(isset($_GET['order_failure'])){ ?>
          <p class="text-center" style="color: red;"><?php echo $_GET['order_failure']; ?></p>
        <?php }?>

        <?php if(isset($_GET['deleted_successfully'])){ ?>
          <p class="text-center" style="color: green;"><?php echo $_GET['deleted_successfully']; ?></p>
        <?php }?>
        <?php if(isset($_GET['deleted_failure'])){ ?>
          <p class="text-center" style="color: red;"><?php echo $_GET['deleted_failure']; ?></p>
        <?php }?>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Order Id</th>
              <th scope="col">Order Status</th>
              <th scope="col">User Id</th>
              <th scope="col">Order Date</th>
              <th scope="col">User Phone</th>
              <th scope="col">User Address</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($orders as $order) { ?>
            <tr>
              <td><?php echo $order['order_id']; ?></td>
              <td><?php echo $order['order_status']; ?></td>
              <td><?php echo $order['user_id']; ?></td>
              <td><?php echo $order['order_date']; ?></td>
              <td><?php echo $order['user_phone']; ?></td>
              <td><?php echo $order['user_address']; ?></td>
              <td><a class="btn btn-primary" href="edit_order.php?order_id=<?php echo $order['order_id']; ?>">Edit</a> </td>
              <td><a class="btn btn-danger" href="delete_order.php?order_id=<?php echo $order['order_id']; ?>">Delete</a> </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        <!--pagination-->
        <div aria-label="Page navigation example">
                    <ul class="pagination mt-5">
                      <li class="page-item <?php if($page_no<=1){ echo 'disabled'; } ?>">
                          <a class="page-link" href="<?php  if($page_no<=1){ echo '#';}else{ echo "?page_no=".$page_no-1;} ?>">Previous</a>
                    </li>

                      <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                      <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                      <?php if($page_no>=3) {?>
                          <li class="page-item"><a class="page-link" href="#">...</a></li>
                          <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no; ?>"><?php echo $page_no; ?></a></li>

                        <?php }?>

                      <li class="page-item <?php if($page_no>=$total_no_of_page){ echo 'disabled'; } ?>">
                      <a class="page-link" href="<?php  if($page_no>=$total_no_of_page){ echo '#';}else{ echo "?page_no=".$page_no+1;} ?>">Next</a>
                    </li>

                    </ul>
                </div>

        </div>
      </div>
    </main>

  </div>

    <script src="../admin/assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
