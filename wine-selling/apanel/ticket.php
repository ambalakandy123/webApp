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
  <h3 class="heading">Tickets Management</h3>
 
  </div>

      
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>Ticket id</th>
            <th>CustomerName</th>
            <th>Event Title</th>
            <th>Status</th>        
            <th>Created At</th>
            <th> 
            <label class="">Filter By</label>
            <select name="filter_order" id="filter_order" class="browser-default">
            <option value="All" selected>All</option>
            <option value="Registered">Registered</option>
            <option value="Complete">Complete</option>
            </select></th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tickets";
          $result_productss = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($result_productss)) { ?>
            <tr name="order_report" id="order_report">
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['CustomerName']; ?></td>          
              <td><?php echo $row['EventsTitle']; ?></td>
              <td><?php echo $row['Status']; ?></td>
              <td><?php echo $row['created_at']; ?></td>
              <td>
              <a href="edit_tickets.php?id=<?php echo $row['id']?>" class="btn red lighten-2">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_tickets.php?id=<?php echo $row['id']?>" class="btn red lighten-2">
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
      $( "tr:contains('Registered')" ).show();
      $( "tr:contains('Complete')" ).show();
    }
    else if(value=="Registered")
    {
      $( "tr:not(:contains('Registered'))" ).hide();
      $( "tr:contains('Registered')" ).show();
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
