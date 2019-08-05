<?php include('server.php') ?>
<?php include('header.php') ?>
<br>
    <br><br><br>
    <div class="row">
      <div class="col s12 m4">
          <div class="icon-block">
              <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
              <h5 class="center">Welcome Wine Lovers</h5>

              <p    >
              To Know more about the website and place the orders sign up with the wine makers gallore! You'll have a weekly newsletter, learn more about the offers and events that happen at the Eagle wine. 
              </p>
              <p>Fill the adjacent form if you are new to the website and check out the exciting offers we have for the wine lovers</p>
              </p>
          </div>
      </div>
      

<div class="col s12 m8">
       <center><h2>Login Form</h2></center>
       <form method="post" action="login.php" class="form">
       <?php include('errors.php'); ?>
       <div class="input-group">
         <label>Email</label>
         <input type="email" name="email" required>
       </div>
       <div class="input-group">
         <label>Password</label>
         <input type="password" name="password" required>
       </div>
       <div class="input-group">
         <button type="submit" class="btn red" name="login_user">Login</button>
       </div>
       </form>
   </div>
    </div>
    
  
<br><br>
    <?php include('footer.php') ?>
    