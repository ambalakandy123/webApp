<?php

include('db.php');

if (isset($_POST['event_order'])) {
  $CustomerName = $_POST['CustomerName'];
  $Status = $_POST['Status'];
  $EventsTitle = $_POST['EventsTitle'];
  $query = "INSERT INTO tickets(CustomerName,Status,EventsTitle) VALUES ('$CustomerName', '$Status','$EventsTitle')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Order Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: events.php');

}

?>
