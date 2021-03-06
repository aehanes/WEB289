
<!-- 
  Author: Ashley Hanes
  Revision Date: 05/05/2016
  File Name: header.php
  Description: Contains the header information, including the navbar and login/logout button
--> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href='https://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC' rel='stylesheet' type='text/css'>
    <title>Highland | QC/QA Control Survey</title>
</head>
<body>
  <div class="wrapper">
  <div class="container">
    <!-- <h1>QC Survey</h1> -->


  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img alt="Brand" src="images/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <?php if (empty($_SESSION)) { ?>
        <li><a href="index.php?action=register">Register</a></li>
        <?php } ?>
        <?php if (!empty($_SESSION)) { ?>
            <li><a href="index.php?action=surveys">Surveys</a></li>
            <?php if ($_SESSION['userLevel'] == 'A') { ?>
              <li><a href="index.php?action=samples">Samples</a></li>
              <li><a href="index.php?action=brands">Brands</a></li>
            <?php } // end if admin ?>
          <?php } //end !empty($sesson) ?>
          <li><a href="index.php?action=contact">Contact</a></li>
      </ul>
      <?php
        if (!empty($_SESSION)) {
      ?>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            <?php echo $_SESSION['userName']; ?>
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php if ($_SESSION['userLevel'] == 'M') { ?>
            <li><a href="index.php?action=account">Account Settings</a></li>
            <?php } ?>
            <?php if ($_SESSION['userLevel'] == 'A') { ?>
              <li><a href="index.php?action=users">Users</a></li>
            <?php } ?>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
      <?php } ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
