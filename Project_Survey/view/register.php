<?php
include('view/header.php');
$title = "Register";
?>


<!-- Registration From -->
<div id="main">
  <h1><?php echo $title; ?></h1>
    <h2>Please Register</h2>

  <?php
  if(!empty($errors)) {
    print '<p class="text-danger">'.$errors.'</p>';
  }
  ?>


<form class="form-horizontal" action="index.php" method="POST">
  <div class="form-group">
    <label for="firstName" class="col-sm-2 control-label">First Name</label>
    <div class="col-sm-10">
      <input value="" type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="lastName" class="col-sm-2 control-label">Last Name</label>
    <div class="col-sm-10">
      <input value="" type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="userName" class="col-sm-2 control-label">User Name</label>
    <div class="col-sm-10">
      <input value="" type="text" class="form-control" name="userName" id="userName" placeholder="User Name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input value="" type="email" class="form-control" name="email" id="email" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input value="" type="password" class="form-control" name="password" id="password" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input name="action" type="hidden" value="register-user">
      <button type="submit" class="btn btn-default">Register</button>
    </div>
  </div>
  <div class="g-recaptcha" data-sitekey="6LfS8h0TAAAAAPhldDsSW8j1sOQJzhyGWbSZcE6z"></div>
</form>
</div> <!-- end main div -->

</div> <!-- Main -->
