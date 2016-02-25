<?php
$title = "Register";
include('view/header.php');
?>

<div id="main">
    <h2>Please Register</h2>
    <form action='index.php' method='POST'>
        <label>FirstName:</label>
          <input id="firstName" type="text" name="firstName">
        <label>LastName:</label>
          <input id="lastName" type="text" name="lastName"><br>
        <label>Email:</label>
            <input id="email" type="text" name="email"><br>
        <label>Username:</label>
            <input id="userName" type="text" name="userName" placeholder="User Name"><br>
        <label>Password:</label>
            <input id="password" type="password" name="password"><br>


        <input name="action" type="hidden" value="register">
        <input type="submit" value="Submit">
        <br /><br />
    </form>
</div> <!-- Main -->

<?php include('view/footer.php'); ?>
