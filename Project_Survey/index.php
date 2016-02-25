<?php
// Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 1095;    // 3 years in seconds
session_set_cookie_params($lifetime, '/');
session_start();

require('./model/database_connection.php');
require('./model/functions.php');


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
      //echo $userName;
      //echo $password;
      $user = validateUser($userName, $password);
      //include('view/home.php');
      print_r($user);
      break;
  case 'register':
      $firstName = filter_input(INPUT_POST, 'firstName');
      echo $firstName;
      $lastName = filter_input(INPUT_POST, 'lastName');
      $email = filter_input(INPUT_POST, 'email');
      $userName = filter_input(INPUT_POST, 'userName');
      $password = filter_input(INPUT_POST, 'password');
      $password = hash('sha256', $password);
      registerUser($firstName, $lastName, $email, $userName, $password);
      break;
  case 'membership':
      include('view/membership_view.php');
      break;
  case 'admin':
      include('view/admin_view.php');
      break;
}

    //
    // case 'add':
    //     $product_key = filter_input(INPUT_POST, 'productkey');
    //     $item_qty = filter_input(INPUT_POST, 'itemqty');
    //     add_item($product_key, $item_qty);
    //     include('cart_view.php');
    //     break;
    // case 'update':
    //     $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    //     foreach($new_qty_list as $key => $qty) {
    //         if ($_SESSION['cart12'][$key]['qty'] != $qty) {
    //             update_item($key, $qty);
    //         }
    //     }
    //     include('cart_view.php');
    //     break;
    // case 'show_cart':
    //     include('cart_view.php');
    //     break;
    // case 'show_add_item':
    //     include('add_item_view.php');
    //     break;
    // case 'empty_cart':
    //     unset($_SESSION['cart12']);
    //     include('cart_view.php');
    //     break;
//     case 'end_session':
//             $_SESSION = array(); // clear session data from memory
//
//             session_destroy(); // clean up the session id
//
//             $name = session_name();  // get name of session cookie
//             $expire = strtotime('-1 year'); // create expire date in the past
//             $params = session_get_cookie_params();  // get session params
//             $path = $params['path'];
//             $domain = $params['domain'];
//             $secure = $params['secure'];
//             $httponly = $params['httponly'];
//             setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
//             include('cart_view.php');
//             break;
//
//
// Create a session cookie
// $name = 'PHPSESSID';
// $value = '';
// $expire = 0;
// $path = '/';
// setcookie($name, $value, $expire, $path);

?>

<?php include("view/footer.php"); ?>
</body>
</html>
