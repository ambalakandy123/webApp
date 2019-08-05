<?php include('server.php') ?>
<?php include('header.php') ?>
<div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <h5 class="header red-text text-lighten-2">
                    <br><br> Welcome to Our Store
                </h5>
            </div>
        </div>
        <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
    </div>
<br>
    <br><br><br>

      <div class="col s6 m4">

      <form method="post" action="contact.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="uname" value="<?php echo $uname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
  	<div class="input-group">
  	  <label>Contact Number</label>
  	  <input type="text" name="phone" value="<?php echo $phone; ?>">
    </div>
    <div class="input-group">
  	  <label>Address</label>
  	  <input type="text" name="address" value="<?php echo $address; ?>">
    </div>
    <div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
      </form>
</div>
    </div>


<br><br>
    <?php include('footer.php') ?>
