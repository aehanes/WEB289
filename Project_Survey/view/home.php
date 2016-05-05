<!-- 
  Author: Ashley Hanes
  Revision Date: 05/05/2016
  File Name: home.php
  Description: The home page which also includes the login area
--> 
<?php
include('view/header.php');
$title = "Home";
?>
<h1><?php echo $title; ?></h1>

    <!--check to see if session is set -->
    <?php
    if (isset($firstName)) {
      $output = "";
      $output = "<h4>Thanks for registering, " .  strtoupper($firstName) . "</h4>";
      $output .= "<span>Login below to take a survey.</span>";

      print '<div class="alert alert-success" role="alert">' . $output . '</div>';
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
            <p> Quality Control is an important part of the beer brewing process. Here at Highland, we take pride in our beer being the best it can be.
                As one of Asheville's first breweries, we have been brewing consistently delicous beer since day one. We have only been able to do this through the 
                dedication of our Quality Control Specialists and those willing to drink a little beer in the name of Science. Each keg or batch brewed here at Highland goes 
                through a rigorous taste testing panel. The taste test panel provides insight on the beer's appearance, smell and taste and whether or not it has the general 
                characteristics it should have. To find out more about our quality control department email us at <a href="mailto:aehanes326@gmail.com?Subject=Request%20Info%20on%20QC%20Dept" target="_top">info@highlandbrewery.com</a>
            </p>
            <h3>Please login to continue</h3>

            <?php if(!empty($errors)) {
              print '<div class="alert alert-danger" role="alert">'.$errors.'</div>';
            }
            ?>
      
            <form class="form-horizontal login-form" action="index.php" method="POST">
              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">User Name</label>
                <div class="col-sm-10">
                  <input value="<?php echo isset($userName) ? $userName : null; ?>" type="text" class="form-control" name="userName" id="userName" placeholder="User Name" size="45" required>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input value="<?php echo isset($password) ? $password : null; ?>" type="password" class="form-control" name="password" id="password" placeholder="Password"  size="45" required>
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
                  <p>To create the samples for <?php $today = date("F j, Y") ?> <?php echo $today; ?>, please click <a href="index.php?action=samples">here.</a></p>
                <?php } ?>
        </div> <!-- Main -->
      </div> <!-- end homepage content -->
    </div>

    <?php include("view/footer.php"); ?>
