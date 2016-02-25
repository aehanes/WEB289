<?php

function validateUser($userName, $password) {
	global $db;
	$query = 'SELECT * FROM Users
			  WHERE userName = :userName AND password = :password';
	$statement = $db->prepare($query);
	$statement->bindValue(':userName', $userName);
	$statement->bindValue(':password', $password);
	$statement->execute();
	$user = $statement->fetch();
	$statement->closeCursor();
	$valid = ($statement->rowCount() == 1);
	//return $valid;
	return $user;

	//print_r($user);
}

function registerUser($firstName, $lastName, $email, $userName, $password) {
	global $db;
	//write an insert statement that GETS THE "POSTED" values from the form
	// return $password;
	echo $firstName;
	echo $lastName;
	$query = 'INSERT INTO Users
								(firstName, lastName, email, userName, password)
						VALUES
								(:firstName, :lastName, :email, :userName, :password)';
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
