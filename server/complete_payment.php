<?php 
    session_start();
    include('connection.php');

    //change order_status to paid
    if(isset($_GET['transaction_id']) && isset($_GET['order_id'])){
        $order_status = "paid";
        $order_id = $_GET['order_id'];
        $transaction_id = $_GET['transaction_id'];
        $user_id = $_SESSION['user_id'];
        $payment_date = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
        $stmt->bind_param('si',$order_status,$order_id);
        $stmt->execute();

        //strore payment info
        $stmt1 = $conn->prepare("INSERT INTO payments (order_id,user_id,transaction_id,payment_date) 
        VALUE(?,?,?,?); ");
        $stmt1->bind_param('iiss',$order_id,$user_id,$transaction_id,$payment_date);
        $stmt_status = $stmt1->execute();

        //go to user account
        header('location: ../account.php?payment_massage=paid succesfully, thanks for your shopping with us');

    }else{
        header('location: index.php');
        exit;
    }

    

?>