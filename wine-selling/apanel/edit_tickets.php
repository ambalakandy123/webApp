<?php
include("db.php");
$CustomerName = '';
$EventsTitle= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tickets WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $CustomerName = $row['CustomerName'];
    $EventsTitle = $row['EventsTitle'];
    $Status = $row['Status'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $CustomerName= $_POST['CustomerName'];
  $EventsTitle = $_POST['EventsTitle'];
  $Status = $_POST['Status'];
  $query = "UPDATE tickets set CustomerName = '$CustomerName', EventsTitle = '$EventsTitle',Status = '$Status' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Tickets Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: ticket.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="form">
      <form action="edit_tickets.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="input-field form-group">
          <input name="CustomerName" type="text" class="input-field form-control" value="<?php echo $CustomerName; ?>" placeholder="Update CustomerName" readonly>
        </div>
        <div class="input-field form-group">
        <textarea name="EventsTitle" class="materialize-textarea form-control" cols="30" rows="10" readonly><?php echo $EventsTitle;?></textarea>
        
        <label class="">Browser Select</label>
  <select name="Status" class="browser-default">
    <option value="Choose" disabled >Choose Status of Tickets</option>
    <option value="Registered">Registered</option>
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
