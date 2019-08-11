<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

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
  <h3 class="heading">Orders Management</h3>
 
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
            <th> 
            <label class="">Filter By</label>
            <select name="filter_order" id="filter_order" class="browser-default">
            <option value="All" selected>All</option>
            <option value="Queue">Queue</option>
            <option value="Processing">Processing</option>
            <option value="Ready">Ready</option>
            <option value="Complete">Complete</option>
            </select></th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM orders";
          $result_productss = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($result_productss)) { ?>
            <tr name="order_report" id="order_report">
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['CustomerName']; ?></td>          
              <td><?php echo $row['ProductTitle']; ?></td>
              <td><?php echo $row['Status']; ?></td>
              <td><?php echo $row['created_at']; ?></td>
              <td>
              <a href="edit_orders.php?id=<?php echo $row['id']?>" class="btn red lighten-2">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_orders.php?id=<?php echo $row['id']?>" class="btn red lighten-2">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
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
      $('select#filter_order').change(function() {
    var value = $(this).val();
    if(value=="All")
    {
      $( "tr:contains('All')" ).show();
      $( "tr:contains('Queue')" ).show();
      $( "tr:contains('Processing')" ).show();
      $( "tr:contains('Ready')" ).show();
      $( "tr:contains('Complete')" ).show();
    }
    else if(value=="Queue")
    {  
      $( "tr:not(:contains('Queue'))" ).hide();
      $( "tr:contains('Queue')" ).show();
      }
    else if(value=="Processing")
    {
      $( "tr:not(:contains('Processing'))" ).hide();
      $( "tr:contains('Processing')" ).show();
    }
    else if(value=="Ready")
    {
      $( "tr:not(:contains('Ready'))" ).hide();
      $( "tr:contains('Ready')" ).show();
    }
    else if(value=="Complete")
    {
      $( "tr:not(:contains('Complete'))" ).hide();
      $( "tr:contains('Complete')" ).show();
    }
    });
     });
</script>


<?php include('includes/footer.php'); ?>
