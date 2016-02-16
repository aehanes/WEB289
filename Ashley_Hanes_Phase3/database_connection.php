<?php
$debug=true;

if ($_SERVER['HTTP_HOST'] == "localhost" OR $_SERVER['HTTP_HOST'] == "127.0.0.1") {
	$dsn = 'mysql:host=localhost;dbname=projectSurvey';
	$username = 'project_survey';
	$pass = 'pass';
	$host_location = "local";
} else {
  $dsn = 'mysql:host=webproject.db;dbname=projectSurvey';
	$username = 'aehanes';
	$pass = '@cgNbo.Qwm6uN';
	$host_location = "remote";
}

try {
	$db = new PDO($dsn, $username, $pass);
		if ($debug) {
			echo "Successfully connected to: " . $host_location;
			echo "<p />";
		}
	}
	catch (PDOException $e) {
		$error_message = $e->getMessage();
    include("./errors/database_error.php");
		echo $error_message;
		exit();
	}
?>
