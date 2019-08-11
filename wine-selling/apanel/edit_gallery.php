<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM gallery WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
    $image = $row['image'];    
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $description = $_POST['description'];
  $image = $_POST['image'];
  $query = "UPDATE gallery set title = '$title', description = '$description',image = '$image' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'gallery Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: gallery.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="form">
      <form action="edit_gallery.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="input-field form-group">
          <input name="title" type="text" class="input-field form-control" value="<?php echo $title; ?>" placeholder="Update Title">
        </div>
        <div class="input-field form-group">
        <textarea name="description" class="materialize-textarea form-control" cols="30" rows="10" required><?php echo $description;?></textarea>
        <textarea name="image" class="materialize-textarea form-control" cols="30" rows="10" required><?php echo $image;?></textarea>
        </div>
        <button class="btn red lighten-2" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
