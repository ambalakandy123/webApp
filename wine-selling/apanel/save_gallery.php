<?php

include('db.php');

if (isset($_POST['save_gallery'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = $_POST['image'];
  $query = "INSERT INTO gallery(title, description,image) VALUES ('$title', '$description', '$image')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'gallery Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: gallery.php');

}

?>
