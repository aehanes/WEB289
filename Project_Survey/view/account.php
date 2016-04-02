<?php
include('view/header.php');
$title = "Accounts";
?>
<div id="main">
<h1><?php echo $title; ?></h1>
</div>

<!-- check to see if the userLevel session is set, if not redirect them to the login page  -->
<?php if ((empty($_SESSION['userLevel']))) { ?>
   <div class="containter">
     <p>You must be logged in to view this page. Please <a href="index.php?action=login">Login</a> or <a href="index.php?action=register">Register</a></p>
<?php } ?>

<div class="container">
<?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'M')) { ?>
  <h2>Account Update</h2>
    <p>To update a firstname.</p>
    <p>To update a lastname.</p>
    <p>To update your username.</p>
    <p>To update your password.</p>
    <p>To update your address.</p>
    <p>To update your email.</p>
  <?php } ?>
<?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'A')) { ?>
     <h2>Account Update</h2>
     <p>To update a firstname.</p>
     <p>To update a lastname.</p>
     <p>To update a username.</p>
     <p>To update a password.</p>
     <p>To update a email.</p>
     <p>To update user permissions.</p>
<?php } ?>
</div> <!-- end container div
