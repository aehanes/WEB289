<?php

function validateUser($userName, $password) {
	global $db;
	global $errors;

	// print $userName . " " . $password;
	$password = hash('sha256', $password);
	$query = 'SELECT * FROM Users
			  WHERE userName = :userName AND password = :password';
	$statement = $db->prepare($query);
	$statement->bindValue(':userName', $userName);
	$statement->bindValue(':password', $password);
	$statement->execute();
	$user = $statement->fetch(PDO::FETCH_ASSOC);
	$userLevel = $user['userLevel'];
	$valid = ($statement->rowCount() == 1);
	$statement->closeCursor();
	//return $valid;
	//return $user;

	if ($valid == true) {
		// set session vars
		$_SESSION['userName'] = $user['userName'];
		$_SESSION['userID'] = $user['userID'];
		$_SESSION['userLevel'] = $user['userLevel'];
		return true;
	} else {
		$errors = "Username or Password is incorrect.";
		return false;
	}
}

function registerUser($firstName, $lastName, $userName, $email, $password) {
	global $db;
	global $errors;

	$query = 'SELECT userName from Users WHERE userName = :userName';
	$statement = $db->prepare($query);
	$statement->bindValue(':userName', $userName);
	$statement->execute();
	$valid = ($statement->rowCount() == 1);
	$statement->closeCursor();

	//var_dump($valid);

	if ($valid == false) {

		$password = hash('sha256', $password);
		//write an insert statement that GETS THE "POSTED" values from the form
		$query = 'INSERT INTO Users
									(firstName, lastName, userName, email, password)
							VALUES
									(:firstName, :lastName, :userName, :email, :password)';
		$statement = $db->prepare($query);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':userName', $userName);
		$statement->bindValue(':password', $password);
		$statement->execute();
		$statement->closeCursor();
		return true;
	} else {
		$errors = "Username is already taken. Please try another.";
		return false;
	}
}

?>
