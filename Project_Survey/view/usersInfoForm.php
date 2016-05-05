<!-- 
  Author: Ashley Hanes
  Revision Date: 05/05/2016
  File Name: usersInfoForm.php
  Description: Page where the admin actually updates the user information.
--> 

<?php
include('view/header.php');
$title = "Home";
?>

<div id="main">
<h2>Update user information.</h2>
 <form class="form-horizontal" action="." method="POST">
   <div class="form-group">
     <label for="userID" class="col-sm-2 control-label">User ID</label>
     <div class="col-sm-10">
       <input value="<?php echo $user['userID']; ?>" type="text" class="form-control" name="userID" id="userID" placeholder="User ID" required>
     </div>
   </div>
   <div class="form-group">
     <label for="firstName" class="col-sm-2 control-label">First Name</label>
     <div class="col-sm-10">
       <input value="<?php echo $user['firstName']; ?>" type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>
     </div>
   </div>
   <div class="form-group">
     <label for="lastName" class="col-sm-2 control-label">Last Name</label>
     <div class="col-sm-10">
       <input value="<?php echo $user['lastName']; ?>" type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required>
     </div>
   </div>
   <div class="form-group">
     <label for="email" class="col-sm-2 control-label">Email</label>
     <div class="col-sm-10">
       <input value="<?php echo $user['email']; ?>" type="email" class="form-control" name="email" id="email" placeholder="Email" required>
     </div>
   </div>
   <div class="form-group">
     <label for="userName" class="col-sm-2 control-label">User Name</label>
     <div class="col-sm-10">
       <input value="<?php echo $user['userName']; ?>" type="text" class="form-control" name="userName" id="userName" placeholder="User Name" required>
     </div>
   </div>
   <div class="form-group">
     <label for="password" class="col-sm-2 control-label">Password</label>
     <div class="col-sm-10">
       <input value="<?php echo $user['password']; ?>" type="password" class="form-control" name="password" id="password" placeholder="Password" required>
     </div>
   </div>
   <div class="form-group">
     <label for="userLevel" class="col-sm-2 control-label">User Level</label>
     <div class="col-sm-10">
       <input value="<?php echo $user['userLevel']; ?>" type="userLevel" class="form-control" name="userLevel" id="userLevel" placeholder="A/M" required>
     </div>
   </div>
    <input name="action" type="hidden" value="update_user">
    <input type="hidden" value="<?php echo $user['userID']; ?>" name="userID" id="userID">
    <input type="submit" value="Update">
</form>
<div> <!-- end main -->

<?php include("view/footer.php"); ?>
