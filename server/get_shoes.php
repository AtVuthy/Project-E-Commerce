<?php 

    include('connection.php');
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_category='shoes' LIMIT 4");
    $stmt->execute();
    $shoes_products = $stmt->get_result();

?>