<?php

include('db.php');

if (isset($_POST['order_now'])) {
  $CustomerName = $_POST['CustomerName'];
  $Status = $_POST['Status'];
  $ProductTitle = $_POST['ProductTitle'];
  $query = "INSERT INTO orders(CustomerName,Status,ProductTitle) VALUES ('$CustomerName', '$Status','$ProductTitle')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  
  $_SESSION['message'] = 'Order Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: order.php');

}

?>
