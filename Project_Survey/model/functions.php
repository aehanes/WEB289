<?php

function validateUser($userName, $password) {
	global $db;
	// print $userName . " " . $password;
	$password = hash('sha256', $password);
	$query = 'SELECT * FROM Users
			  WHERE userName = :userName AND password = :password';
	$statement = $db->prepare($query);
	$statement->bindValue(':userName', $userName);
	$statement->bindValue(':password', $password);
	$statement->execute();
	$user = $statement->fetch(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	$userLevel = $user['userLevel'];
	$valid = ($statement->rowCount() == 1);
	//return $valid;
	//return $user;

	if ($valid == true) {
		// set session vars
		return true;
		$_SESSION['userName'] = $user['userName'];
		$_SESSION['userID'] = $user['userID'];
		$_SESSION['userLevel'] = $user['userLevel'];
	} else {
		return false;
	}
}

function registerUser($firstName, $lastName, $userName, $email, $password) {
	$password = hash('sha256', $password);
	global $db;
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
}

?>
