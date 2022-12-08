
<?php include('layouts/header.php'); ?>
<?php 
    if(isset($_POST['add_to_cart'])){
          //if user has already added a product to cart
          if(isset($_SESSION['cart'])){
            $products_array_ids = array_column($_SESSION['cart'],"product_id");//[2,3,4,5,15]
            //if product has been added to cart or not
            if( !in_array($_POST['product_id'],$products_array_ids))
            {
              $product_id = $_POST['product_id'];
              $product_array = array(
                                'product_id'=>$_POST['product_id'],
                                'product_name'=>$_POST['product_name'],
                                'product_image'=>$_POST['product_image'],
                                'product_price'=>$_POST['product_price'],
                                'product_qty'=>$_POST['product_qty']
              );
              $_SESSION['cart'][$product_id] = $product_array;
              // [2=>[] , 3=>[], 5=>[] ]
              //product has already added to cart
            }else{
                echo '<script>alert("Product was already added to cart");</script>';
                //echo '<script>window.location="index.php";</script>';
            }

          //if this is the first product
          }else{
                $product_id = $_POST['product_id'];
                $product_array = array(
                'product_id'=>$_POST['product_id'],
                'product_name'=>$_POST['product_name'],
                'product_image'=>$_POST['product_image'],
                'product_price'=>$_POST['product_price'],
                'product_qty'=>$_POST['product_qty']
              );
              $_SESSION['cart'][$product_id] = $product_array;
              // [2=>[] , 3=>[], 5=>[] ]
          }

          //update calculate total
            calculateTotalCart();

        //Remove product from cart
        }
    else if(isset($_POST['remove_product'])){
          $product_id = $_POST['product_id'];
          unset($_SESSION['cart'][$product_id]);
          //update calculate total
          calculateTotalCart();

    }else if(isset($_POST['edit_qty'])){
      //we get the id and qty from the form
      $product_id = $_POST['product_id'];
      $product_qty =$_POST['product_qty'];
      //get the product array from the session
      $product_array = $_SESSION['cart'][$product_id];
      //update product qty
      $product_array['product_qty'] = $product_qty;
      //return array its replace
      $_SESSION['cart'][$product_id] = $product_array;
      //update calculate total
      calculateTotalCart();

    }
    else{
      //header('location: index.php');
    }

    function calculateTotalCart(){
      $Total_price = 0;
      $Total_quantity = 0;
      foreach($_SESSION['cart'] as $key => $value){
              $product = $_SESSION['cart'][$key];

              $price = $product['product_price'];
              $qty   = $product['product_qty'];
              $Total_price = $Total_price+($price * $qty);
              $Total_quantity = $Total_quantity + $qty;
      }
      $_SESSION['total'] = $Total_price;
      $_SESSION['total_quantity'] = $Total_quantity;
    }
?>



    <!--Card-->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde"> Your Card</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Qualtity</th>
                <th>Subtotal</th>
            </tr>
          <?php if(isset($_SESSION['cart'])){ ?>
          <?php foreach($_SESSION['cart'] as $key => $value){ ?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/allimage/<?php echo $value['product_image']; ?>"/>
                        <div>
                            <p><?php echo $value['product_name']; ?></p>
                            <small><span>$</span><?php echo $value['product_price']; ?></small>
                            <br>
                            <form method="POST" action="cart.php">
                                  <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>"/>
                                  <input type="submit" name="remove_product" class="remove-btn" value="remove"/>
                            </form>
                        </div>
                    </div>
                </td>
               
                <td>
                    <form action="cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                    <input type="number" name="product_qty" value="<?php echo $value['product_qty']; ?>"/>
                    <input type="submit" class="edit-btn" value="edit" name="edit_qty"/>
                    </form>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price"><?php echo $value['product_qty'] *  $value['product_price']; ?></span>
                </td>
            </tr>
          <?php } ?>
          <?php }else { ?>

            <?php echo "No data in your cart"; }?>
        </table>
        <div class="cart-total">
            <table>
                <tr>
                    <td>Total</td>
                    <td>$<?php if(isset($_SESSION['total'])){echo $_SESSION['total'];} ?></td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
          <form action="checkout.php" method="POST">
               <input type="submit" class="btn checkout-btn" value="checkout" name="checkout">
          </form>
        </div>
    </section>

    <?php include('layouts/footer.php'); ?>