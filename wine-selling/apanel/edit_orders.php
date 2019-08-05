<?php
include("db.php");
$CustomerName = '';
$ProductTitle= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM orders WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $CustomerName = $row['CustomerName'];
    $ProductTitle = $row['ProductTitle'];
    $Status = $row['Status'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $CustomerName= $_POST['CustomerName'];
  $ProductTitle = $_POST['ProductTitle'];
  $Status = $_POST['Status'];
  $query = "UPDATE orders set CustomerName = '$CustomerName', ProductTitle = '$ProductTitle',Status = '$Status' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'orders Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: orders.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="form">
      <form action="edit_orders.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="input-field form-group">
          <input name="CustomerName" type="text" class="input-field form-control" value="<?php echo $CustomerName; ?>" placeholder="Update CustomerName" readonly>
        </div>
        <div class="input-field form-group">
        <textarea name="ProductTitle" class="materialize-textarea form-control" cols="30" rows="10" readonly><?php echo $ProductTitle;?></textarea>
        
        <label class="">Browser Select</label>
  <select name="Status" class="browser-default">
    <option value="Choose" disabled >Choose Status of Wine</option>
    <option value="Queue" selected >Queue</option>
    <option value="Processing">Processing</option>
    <option value="Ready">Ready</option>
    <option value="Complete">Complete</option>
  </select>  
        
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
