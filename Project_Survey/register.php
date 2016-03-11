<?php
$title = "Register";
include('view/header.php');
?>

<!-- Registration From -->
<div id="main">
    <h2>Please Register</h2>
<form class="form-horizontal" action="index.php" method="POST">
  <div class="form-group">
    <label for="firstName" class="col-sm-2 control-label">First Name</label>
    <div class="col-sm-10">
      <input value="J" type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
    </div>
  </div>
  <div class="form-group">
    <label for="lastName" class="col-sm-2 control-label">Last Name</label>
    <div class="col-sm-10">
      <input value="J" type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
    </div>
  </div>
  <div class="form-group">
    <label for="userName" class="col-sm-2 control-label">User Name</label>
    <div class="col-sm-10">
      <input value="J" type="text" class="form-control" name="userName" id="userName" placeholder="User Name">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input value="J@j.com" type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input value="J" type="password" class="form-control" name="password" id="password" placeholder="Password">
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
      <input name="action" type="hidden" value="register">
      <button type="submit" class="btn btn-default">Register</button>
    </div>
  </div>
</form>
</div> <!-- end main div -->



    <!-- <form action='index.php' method='POST'>
        <label>FirstName:</label>
          <input id="firstName" type="text" name="firstName">
        <label>LastName:</label>
          <input id="lastName" type="text" name="lastName"><br>
        <label>Email:</label>
            <input id="email" type="text" name="email"><br>
        <label>Username:</label>
            <input id="userName" type="text" name="userName" placeholder="User Name"><br>
        <label>Password:</label>
            <input id="password" type="password" name="password"><br>


        <input name="action" type="hidden" value="register">
        <input type="submit" value="Submit">
        <br /><br />
    </form> -->
</div> <!-- Main -->

<?php include('view/footer.php'); ?>
