<?php

include('db.php');

if (isset($_POST['save_products'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = $_POST['image'];
  $price = $_POST['price'];
  $query = "INSERT INTO products(title, description,image,price) VALUES ('$title', '$description', '$image', '$price')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'products Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
