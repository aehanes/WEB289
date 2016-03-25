<?php
include('view/header.php');
$title = "Users";
?>
<div id="main">
<h1><?php echo $title; ?></h1>
</div>

<?php if ((!empty($_SESSION)) && ($_SESSION['userLevel'] == 'A')) { ?>
<div class="container">
<p>This page will be used for the admin to maintain and update user information. For example, adding an admin when necessary.</p>
</div>

<?php } ?>
