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
            <th>Price</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM products";
          $result_productss = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_productss)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>          
            <td style="height:15%; width:15%;"><img class="circle responsive-img" src="apanel/uploads/<?php echo $row['image']; ?>"></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <div class="btn red lighten-2">
               <a href="order.php"> Order </a>
              </div>
             </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      </div>
    </div>

    
  </div>
    </div>
    <?php include('footer.php') ?>