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

// Add or update user as needed
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
   case 'update_user':
     $userID = filter_input(INPUT_POST, 'userID');
     $firstName = filter_input(INPUT_POST, 'firstName');
     $lastName = filter_input(INPUT_POST, 'lastName');
     $email = filter_input(INPUT_POST, 'email');
     $userName = filter_input(INPUT_POST, 'userName');
     $password = filter_input(INPUT_POST, 'password');
     $userLevel = filter_input(INPUT_POST, 'userLevel');
     update_user($userID, $firstName, $lastName, $email, $userName, $password, $userLevel);
     $user = edit_user($userID);
     include('view/usersInfoForm.php');
     break;
   case 'create-survey':
      $brand = filter_input(INPUT_POST, 'brand');
      $origin = filter_input(INPUT_POST, 'origin');
      $batch = filter_input(INPUT_POST, 'batch');
      $survey_values = array($brand,$origin,$batch);
      create_survey($brand,$origin,$batch);
      include('view/home.php');
      // var_dump($survey_values);
}

?>

<?php include("view/footer.php"); ?>
</body>
</html>
