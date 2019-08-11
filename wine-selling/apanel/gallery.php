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

      <!-- ADD gallery FORM -->

    <br/><br/><br/>
    <div class="center-align container">
  <div class="row">
  <h3 class="heading">Gallery Management</h3>
  <a class="btn red lighten-2" href="uploads/upload.php" onclick="window.open('uploads/upload.php', 'newwindow', 'width=300,height=250'); return false;">
  Upload Image Here</a>
  </div>
</div>

      <div class="form">
        <form action="save_gallery.php" method="POST">
          <div class="input-field form-group">
            <input type="text" name="title" class="input-field form-control" placeholder="gallery Title" autofocus required>
          </div>
          <div class="input-field form-group">
            <textarea name="description" rows="2" class="materialize-textarea form-control" placeholder="gallery Description" required></textarea>
            <textarea name="image" rows="2" class="materialize-textarea form-control" placeholder="gallery Image" required></textarea>
          </div>
          <input type="submit" name="save_gallery" class="btn red lighten-2" value="Save gallery">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM gallery";
          $result_gallerys = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_gallerys)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>          
            <td style="height:15%; width:15%;"><img class="circle responsive-img" src="uploads/<?php echo $row['image']; ?>"></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit_gallery.php?id=<?php echo $row['id']?>" class="btn red lighten-2">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_gallery.php?id=<?php echo $row['id']?>" class="btn red lighten-2">
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

<?php include('includes/footer.php'); ?>
