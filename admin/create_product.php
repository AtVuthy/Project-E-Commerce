<?php
    include('../server/connection.php');

    if(isset($_POST['create_product'])){

        $product_name = $_POST['name'];
        $product_description = $_POST['description'];
        $product_price = $_POST['price'];
        $product_offer = $_POST['offer'];
        $product_category = $_POST['category'];
        $product_color = $_POST['color'];

        //this is file itself (image)
        $image1 = $_FILES['image1']['tmp_name'];
        $image2 = $_FILES['image2']['tmp_name'];
        $image3 = $_FILES['image3']['tmp_name'];
        $image4 = $_FILES['image4']['tmp_name'];
        //$file_name = $_FILES['image1']['name'];

        //images name
        $image_name1 =  $product_name."1.jpeg";
        $image_name2 =  $product_name."2.jpeg";
        $image_name3 =  $product_name."3.jpeg";
        $image_name4 =  $product_name."4.jpeg";
        //upload file images

        move_uploaded_file($image1,"../assets/imgs/allimage/".$image_name1);
        move_uploaded_file($image2,"../assets/imgs/allimage/".$image_name2);
        move_uploaded_file($image3,"../assets/imgs/allimage/".$image_name3);
        move_uploaded_file($image4,"../assets/imgs/allimage/".$image_name4);

        //create a new product
        $stmt = $conn->prepare("INSERT INTO products (product_name,product_description,product_price,product_special_offer,
                                                        product_image,product_image2,product_image3,product_image4,product_category,product_color)
                                                        VALUES(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('ssssssssss',$product_name, $product_description,$product_price,$product_offer,  $image_name1,$image_name2,
                                        $image_name3,$image_name4,$product_category,$product_color);
        if($stmt->execute()){
            header('location: products.php?add_success_message=Product has been created successfully');
        }else{
            header('location: products.php?add_failure_message=Error accured, try again');
        }
    }
?>