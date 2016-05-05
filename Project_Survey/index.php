<?php
session_start();

ini_set('display_errors', '1');

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
      $firstName = htmlentities(filter_input(INPUT_POST, 'firstName'));
      $lastName = htmlentities(filter_input(INPUT_POST, 'lastName'));
      $userName = htmlentities(filter_input(INPUT_POST, 'userName'));
      $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
      $password = filter_input(INPUT_POST, 'password');
      $captcha = filter_input(INPUT_POST, 'captcha', FILTER_VALIDATE_INT);

      $registerUser = registerUser($firstName, $lastName, $userName, $email, $password, $captcha);
      
      if ($registerUser == true) {
        include('view/home.php');
      } else {
        include('view/register.php');
      }
      break;
  case 'brands':
      include('view/brands.php');
      break;
  case 'samples':
      include('view/samples.php');
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
   case 'createSample':
      $brand = filter_input(INPUT_POST, 'brand');
      $origin = filter_input(INPUT_POST, 'origin');
      $batch = filter_input(INPUT_POST, 'batch');
      $survey_values = array($brand,$origin,$batch);
      createSample($brand,$origin,$batch);
      include('view/samples.php');
      break;
   case 'addBrand':
      $brand = filter_input(INPUT_POST, 'brand');
      addBrand($brand);
      include('view/brands.php');
      break;
    case 'addOrigin':
      $origin = filter_input(INPUT_POST, 'origin');
      addOrigin($origin);
      include('view/brands.php');
      break;
    case 'submitSurvey':
      $responses = array();
      $sampleID = filter_input(INPUT_POST, 'sampleID');
      $responses[] = filter_input(INPUT_POST, 'question1');
      $responses[] = filter_input(INPUT_POST, 'question2');
      $responses[] = filter_input(INPUT_POST, 'question3');
      $responses[] = filter_input(INPUT_POST, 'question4');
      $responses[] = filter_input(INPUT_POST, 'question5');
      $responses[] = filter_input(INPUT_POST, 'question6');

      $notes = filter_input(INPUT_POST, 'notes');
      submitSurvey($sampleID, $responses, $notes);
      include('view/surveys.php');
      break;
    case 'confirmation':
      include('view/confirmation.php');
      break;

     

}

?>

<?php //include("view/footer.php"); ?>
</body>
</html>
