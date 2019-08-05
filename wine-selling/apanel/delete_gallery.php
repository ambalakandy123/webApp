<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM gallery WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'gallery Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: gallery.php');
}

?>
