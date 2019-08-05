<?php include("db.php"); ?>
   <?php include('header.php') ?>

    <br>
    <div class="container">

    <div class="col-md-8">
      <table class="table table-bordered">

        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Order Now</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM events";
          $result_productss = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($result_productss)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td style="height:15%; width:15%;"><img class="circle responsive-img" src="apanel/uploads/<?php echo $row['image']; ?>"></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="ticket.php" class="btn red lighten-2">
                Order Ticket For Events
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      </div>
    </div>
    <?php include('footer.php') ?>
