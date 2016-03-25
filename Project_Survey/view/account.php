<?php
include('view/header.php');
$title = "Accounts";
?>
<div id="main">
<h1><?php echo $title; ?></h1>
</div>

<div class="container">
<?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'M')) { ?>
  <h2>Account Update</h2>
    <p>To update your username.</p>
    <p>To update your password.</p>
    <p>To update your address.</p>
    <p>To update your email.</p>
  <?php } ?>
<?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'A')) { ?>
     <h2>Account Update</h2>
     <p>To update a username.</p>
     <p>To update a password.</p>
     <p>To update a address.</p>
     <p>To update a email.</p>
     <p>To update user permissions.</p>
<?php } ?>
</div> <!-- end container div
