<?php
$title = "Login";
include('view/header.php');
?>

    <div id="main">
        <h2>Enter your username and password</h2>
        <form action='index.php' method='POST'>
            Username:<input id="userName" type="text" name="userName" placeholder="User Name"><br />
            Password:<input id="password" type="password" name="password"><br /><br />

            <input name="action" type="hidden" value="login">
            <input type="submit" value="Submit">
            <br /><br />
        </form>
    </div> <!-- Main -->

<?php include('view/footer.php'); ?>
