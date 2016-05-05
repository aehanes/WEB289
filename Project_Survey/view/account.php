<!-- 
  Author: Ashley Hanes
  Revision Date: 05/05/2016
  File Name: account.php
  Description: Allows single logged in member to update their account info.
--> 

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
  <div id="main">
<h2>Update user information</h2>
 <form class="form-horizontal" action="." method="POST">
   <div class="form-group">
     <label for="firstName" class="col-sm-2 control-label">First Name</label>
     <div class="col-sm-10">
       <input value="<?php echo $_SESSION['firstName']; ?>" type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>
     </div>
   </div>
   <div class="form-group">
     <label for="lastName" class="col-sm-2 control-label">Last Name</label>
     <div class="col-sm-10">
       <input value="<?php echo $_SESSION['lastName']; ?>" type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required>
     </div>
   </div>
   <div class="form-group">
     <label for="email" class="col-sm-2 control-label">Email</label>
     <div class="col-sm-10">
       <input value="<?php echo $_SESSION['email']; ?>" type="email" class="form-control" name="email" id="email" placeholder="Email" required>
     </div>
   </div>
   <div class="form-group">
     <label for="userName" class="col-sm-2 control-label">User Name</label>
     <div class="col-sm-10">
       <input value="<?php echo $_SESSION['userName']; ?>" type="text" class="form-control" name="userName" id="userName" placeholder="User Name" required>
     </div>
   </div>
   <div class="form-group">
     <label for="password" class="col-sm-2 control-label">Password</label>
     <div class="col-sm-10">
       <input value="<?php echo $_SESSION['password']; ?>" type="password" class="form-control" name="password" id="password" placeholder="Password" required>
     </div>
   </div>
    <input name="action" type="hidden" value="update_single_user">
    <input type="hidden" value="<?php echo $_SESSION['userID']; ?>" name="userID" id="userID">
    <input type="submit" value="Update User">
</form>
<div> <!-- end main -->
  <?php } ?>
</div> <!-- end container div -->

<?php include("view/footer.php"); ?>
