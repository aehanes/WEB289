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

echo $action;

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
  case 'edit_user':
      $userID = filter_input(INPUT_POST, 'userID');
      $user = edit_user($userID);
      include('view/usersInfoForm.php');
      break;
  // call allUserInfo: that has a query that will return all of the user info.
  // write my foreach loop to pull out each individual user
    //  break;
     //case 'update_user':
    //  $userId = filter_input(userId);
    //  $firstName
    //  update_user($userId, etc.);
}

?>

<?php include("view/footer.php"); ?>
</body>
</html>
