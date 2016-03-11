<?php
$title = "Home";
include("./view/header.php");
?>

    <?php
    if (isset($firstName)) {
      print "<h3>Welcome, $firstName</h3>";
    }
    ?>

    <div id="wrapper">
      <div id="content">
        <h4>Welcome to our Quality Control Department</h4>
        <p>QC is very importatnt to Highland for so many reasons...</p>

        <div id="main">
            <h2>Please login to continue</h2>

            <form class="form-horizontal" action="index.php" method="POST">
              <div class="form-group">
                <label for="userName" class="col-sm-2 control-label">User Name</label>
                <div class="col-sm-10">
                  <input value="J" type="text" class="form-control" name="userName" id="userName" placeholder="User Name">
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
                  <input name="action" type="hidden" value="login">
                  <button type="submit" class="btn btn-default">Login</button>
                </div>
              </div>
            </form>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div> <!-- Main -->
      </div> <!-- end homepage content -->
    </div>
