<?php

include('db.php');

if (isset($_POST['save_events'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = $_POST['image'];
  $query = "INSERT INTO events(title, description,image) VALUES ('$title', '$description', '$image')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'events Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: events.php');

}

?>
