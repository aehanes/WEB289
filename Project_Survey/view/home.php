<?php
include('view/header.php');
$title = "Home";
?>
<h1><?php echo $title; ?></h1>

    <!--check to see if session is set -->
    <?php
    if (isset($firstName)) {
      print "<h3>Thanks for Registering! $firstName</h3>";
    }
    ?>

    <div id="wrapper">
      <div id="content">

        <div id="main">
          <?php if (!empty($_SESSION)) { ?>
              <?php
                if ($_SESSION['userLevel'] == 'M') {
                  $userLevel = 'Member';
                }
                else $userLevel = 'Admin';
              ?>
              <h4>Welcome, <?php echo ($_SESSION['userName']); ?> you are logged in as: <?php echo $userLevel; ?></h4>
            <?php } ?>
            <?php if (empty($_SESSION)) { ?>
            <h4>Welcome to our Quality Control Department</h4>
            <p>QC is very important to Highland for so many reasons...</p>
            <h2>Please login to continue</h2>

              <?php if(!empty($errors)) {
              print '<p class="text-danger">'.$errors.'</p>';
            }
            ?>

            <form class="form-horizontal" action="index.php" method="POST">
              <div class="form-group">
                <label for="userName" class="col-sm-2 control-label">User Name</label>
                <div class="col-sm-10">
                  <input value="" type="text" class="form-control" name="userName" id="userName" placeholder="User Name"  required>
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
                  <input name="action" type="hidden" value="login">
                  <button type="submit" class="btn btn-default">Login</button>
                </div>
              </div>
            </form>
            <p>Don't have an account? <a href="index.php?action=register">Register here</a></p>
            <?php } ?>

            <div class="container">
            <?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'M')) { ?>
                <p>To take the survey for <?php $today = date("F j, Y") ?> <?php echo $today; ?>, please click <a href="index.php?action=surveys">here.</a></p>
              <?php } ?>
              <?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'A')) { ?>
                  <p>To create a survey for <?php $today = date("F j, Y") ?> <?php echo $today; ?>, please click <a href="index.php?action=surveys">here.</a></p>
                <?php } ?>
        </div> <!-- Main -->
      </div> <!-- end homepage content -->
    </div>
