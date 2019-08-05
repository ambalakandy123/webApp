<?php include("db.php"); ?>

<?php include('header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="red-text text-lighten-2 alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="btn red lighten-2 close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD products FORM -->

    <br/><br/><br/>
    <div class="center-align container">
  <div class="row">
  <h3 class="heading">Add Your Order</h3>
  </div>
</div>

      <div class="form">
        <form action="order_now.php" method="POST">
  <label class="">Browser Select</label>
  <select name="ProductTitle" class="browser-default">
    <option value="Choose" disabled selected>Choose your option</option>
    <?php
          $query = "SELECT * FROM products";
          $result_productss = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($result_productss)) { ?>
    <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
    <?php } ?>
  </select>  
</div>
                  
          <div class="input-field form-group">
            <textarea name="CustomerName" rows="2" class="materialize-textarea form-control" placeholder="Customer Name" required></textarea>
          </div>
          
  <p>
    <label>
      <input class="with-gap" name="Status" type="radio" value="Queue" checked />
      <span>Queue</span>
    </label>
  </p>
        
          <input type="submit" name="order_now" class="btn red lighten-2" value="Order Now">
        </form>
      </div>
    </div>

<div class="row">
<div class="col s12 m12 l12 xl12">
<center><h2>Current Orders</h2></center>
<h5>Only the Queue, Processing and Ready Orders will be Displayed Here.</h5>
</div>
</div>

    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>OrderID</th>
            <th>CustomerName</th>
            <th>ProductTitle</th>
            <th>Status</th>        
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM orders";
          $result_productss = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_productss)) { ?>
          <tr id="order_report" name="order_report" >
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['CustomerName']; ?></td>          
            <td><?php echo $row['ProductTitle']; ?></td>
            <td><?php echo $row['Status']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<script>
$(document).ready(function()
     {
        $("#order_report td").text(function(index, currentText) 
        {
            if(currentText.trim()=='Complete')
                $(this).parent().remove();
        }); 
    });
</script>

<?php include('footer.php'); ?>
