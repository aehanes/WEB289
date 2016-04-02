<?php
include('view/header.php');
$title = "Users";
?>
<div id="main">
<h1><?php echo $title; ?></h1>
</div>

<?php if ((empty($_SESSION['userLevel']))) { ?>
   <div class="containter">
     <p>You must be logged in to view this page. Please <a href="index.php?action=login">Login</a> or <a href="index.php?action=register">Register</a></p>
<?php } ?>
<?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'A')) { ?>
    <div class="container">
    <p>This page will be used for the admin to maintain and update user information. For example, adding an admin when necessary.</p>

<!-- list all of the usersnames as links -->
<div class="usersList list-group">
<?php
  $users = getUserName();
  foreach ($users as $user) { ?>
     <?php echo '<a href="#" class="list-group-item">' . $user['firstName'] . " " . $user['lastName'] . '</a>'; ?>
     <form action="." method="post">
        <input name="action" type="hidden" value="edit_user">
        <input type="hidden" value="<?php echo $user['userID']; ?>" name="userID" id="userID">
        <input type="submit" value="Edit">
    </form>
<?php } ?>
</div> <!-- end usersList div -->
</div>
<?php } ?>

<!-- <?php
  $users = getAllUserInfo();
  print_r($users);
?> -->
