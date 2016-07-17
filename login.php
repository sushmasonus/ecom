<?php
session_start();
if(isset($_SESSION['user_id'])){
  header('location:products.php');
}
include "header.php";
?>

<form class="form-horizontal" action="login_action.php" method="post">
    <?php
if (isset($_GET['error']) && $_GET['error'] == 1) {
  ?>
            <div class="alert-alert-danger">
                Login failed
            </div>
            <?php
}
?>

<fieldset>

<!-- Form Name -->
<legend>Login</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" placeholder="" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password </label>
  <div class="col-md-4">
    <input id="password" name="password" placeholder="" class="form-control input-md" required="" type="password">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Login</button>
  </div>
</div>

</fieldset>
</form>
