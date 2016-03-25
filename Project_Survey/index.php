<?php
session_start();

require('model/database_connection.php');
require('model/functions.php');

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
if ($action === NULL) {
        $action = 'home';
    }
}

// Add or update cart as needed
switch($action) {
  case 'home':
      include('view/home.php');
      break;
  case 'login':
      $userName = filter_input(INPUT_POST, 'userName');
      $password = filter_input(INPUT_POST, 'password');

      $ifValid = validateUser($userName, $password);
      include('view/home.php');
      break;
  case 'register':
      include('view/register.php');
      break;
  case 'register-user':
      $firstName = filter_input(INPUT_POST, 'firstName');
      $lastName = filter_input(INPUT_POST, 'lastName');
      $userName = filter_input(INPUT_POST, 'userName');
      $email = filter_input(INPUT_POST, 'email');
      $password = filter_input(INPUT_POST, 'password');
      $registerUser = registerUser($firstName, $lastName, $userName, $email, $password);
      if ($registerUser == true) {
        include('view/home.php');
      } else {
        include('view/register.php');
      }
      break;
  case 'surveys':
      include('view/surveys.php');
      break;
  case 'contact':
      include('view/contact.php');
      break;
  case 'account':
      include('view/account.php');
      break;
  case 'users':
      include('view/users.php');
      break;


}

?>

<?php include("view/footer.php"); ?>
</body>
</html>
