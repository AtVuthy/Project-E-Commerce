<?php include('header.php') ?>
<?php
    if(isset($_SESSION['admin_logged_in'])){
      header('location: index.php');
      exit();
    }
    if(isset($_POST['login_btn']))
    {
      $email = $_POST['email'];
      $password = md5($_POST['password']);

      $stmt = $conn->prepare("SELECT admin_id,admin_name,admin_email,admin_password FROM admins WHERE admin_email=? AND admin_password=?");
      $stmt -> bind_param('ss',$email,$password);
      if($stmt->execute()){
        $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
        $stmt->store_result();
        if($stmt->num_rows()==1){
          $stmt->fetch();

          $_SESSION['admin_id']    = $admin_id;
          $_SESSION['admin_name']  = $admin_name;
          $_SESSION['admin_email'] = $admin_email;
          $_SESSION['admin_logged_in']  = true;
          header('location: index.php?login_success=logged in successfully');
        }else{
          header('location: login.php?error=could not verify your account');
        }
      }else{
        header('location: login.php?error=something went wrong');
      }

    }
?>
    <!--Login-->

            <div class="mx-auto container text-center">
                <h2 class="form-weight-bold">Login</h2>
                <hr class="mx-auto">
            </div>
            <div class="mx-auto container mt-5">
                <form class="text-center" id="login-form" action="login.php" enctype="multipart/form-data" method="POST">
                  <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                    <div class="login-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" />
                    </div>
                    <div class="login-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" />
                    </div>
                    <div class="login-group mt-3">
                        <input type="submit" class="btn btn-primary" name="login_btn" id="login-btn" value="Login"/>
                    </div>
                </form>
                </div>