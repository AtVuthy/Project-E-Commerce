<?php include('layouts/header.php'); ?>

<?php
    
    if(isset($_SESSION['logged_in'])){
      header('location: account.php');
      exit();
    }
    if(isset($_POST['login_btn']))
    {
      $email = $_POST['email'];
      $password = md5($_POST['password']);

      $stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email=? AND user_password=?");
      $stmt -> bind_param('ss',$email,$password);
      if($stmt->execute()){
        $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
        $stmt->store_result();
        if($stmt->num_rows()==1){
          $stmt->fetch();

          $_SESSION['user_id']    = $user_id;
          $_SESSION['user_name']  = $user_name;
          $_SESSION['user_email'] = $user_email;
          $_SESSION['logged_in']  = true;
          header('location: account.php?login_success=logged in successfully');
        }else{
          header('location: login.php?error=could not verify your account');
        }
      }else{
        header('location: login.php?error=something went wrong');
      }

    }
?>

    <!--Login-->

    <section class="my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                <h2 class="form-weight-bold">Login</h2>
                <hr class="mx-auto">
            </div>
            <div class="mx-auto container">
                <form id="login-form" action="login.php" method="POST">
                  <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                    <div class="login-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" />
                    </div>
                    <div class="login-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" />
                    </div>
                    <div class="login-group">
                        <input type="submit" class="btn" name="login_btn" id="login-btn" value="Login"/>
                    </div>
                    <div class="login-group">
                        <a href="register.php" id="register-url" class="btn">Don't have account? Register</a>
                    </div>
                </form>
            </div>
    </section>


    <?php include('layouts/footer.php'); ?>