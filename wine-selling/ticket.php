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
        <form action="event_order.php" method="POST">
  <label class="">Browser Select</label>
  <select name="EventsTitle" class="browser-default">
    <option value="Choose" disabled selected>Choose your option</option>
    <?php
          $query = "SELECT * FROM events";
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
      <input class="with-gap" name="Status" type="radio" value="Registered" checked />
      <span>Register</span>
    </label>
  </p>
        
          <input type="submit" id="event_order" name="event_order" class="btn red lighten-2" value="Order Your Ticket">
        </form>
      </div>
    </div>

<div id="message" class="row">
<div class="col s12 m12 l12 xl12">
<center><h2>Current Orders</h2></center>
<h5>Your Ticket Has been Ordered.  We will get back to you via email.</h5>
</div>
</div>

    
  </div>
</main>

<script>
$(document).ready(function()
     {
        $("#message").hide();
        $("#event_order").onClick()
        {
        	$("#message").show();
        };
    });
</script>

<?php include('footer.php'); ?>
