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
		$_SESSION['userID'] = $user['userID'];
		$_SESSION['firstName'] = $user['firstName'];
		$_SESSION['lastName'] = $user['lastName'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['userName'] = $user['userName'];
		$_SESSION['password'] = $user['password'];
		$_SESSION['userLevel'] = $user['userLevel'];
		// set all variables for each user //
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

function getUserName() {
	global $db;
	global $errors;

	$query = 'SELECT firstName, lastName, userID from Users';
	$statement = $db->prepare($query);
	$statement->execute();
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $users;
}

function getAllUserInfo() {
	global $db;
	global $errors;

	$query = 'SELECT * from Users';
	$statement = $db->prepare($query);
	$statement->execute();
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $users;
}

function edit_user($userID) {
	global $db;
	global $errors;

	//Fetch single user row
	$query = 'SELECT * FROM Users WHERE userID = :userID';
	$statement = $db->prepare($query);
	$statement->bindValue(':userID', $userID);
	$statement->execute();
	$user = $statement->fetch(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $user;
}

function update_user($userID, $firstName, $lastName, $email, $userName, $password, $userLevel) {
    global $db;
		global $errors;

    $query = "UPDATE Users SET
								userID = :userID,
                firstName = :firstName,
                lastName = :lastName,
								email = :email,
								userName = :userName,
								password = :password,
								userLevel = :userLevel
              WHERE userID = :userID";
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
	$statement->bindValue(':userName', $userName);
	$statement->bindValue(':password', $password);
	$statement->bindValue(':userLevel', $userLevel);
	$statement->execute();
    $statement->closeCursor();
		// return $row_count;
}


function addBrand($brand) { 
	global $db;
	global $errors;

	$query = 'INSERT INTO Brands
								(brandName)
						VALUES
								(:brand)';
	$statement = $db->prepare($query);
	$statement->bindValue(':brand', $brand);
	$statement->execute();
	$statement->closeCursor();
}

function addOrigin($origin) { 
	global $db;
	global $errors;

	$query = 'INSERT INTO Origin
								(type)
						VALUES
								(:origin)';
	$statement = $db->prepare($query);
	$statement->bindValue(':origin', $origin);
	$statement->execute();
	$statement->closeCursor();
}

function getBrand($brandID) {
	global $db;
	global $errors;
	$query = 'SELECT brandName from Brands WHERE brandID = :brandID';
	$statement = $db->prepare($query);
	$statement->bindValue(':brandID', $brandID);
	$statement->execute();
	$brand = $statement->fetch(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $brand;
}

function getBrands() {
	global $db;
	global $errors;

	$query = 'SELECT brandID, brandName from Brands';
	$statement = $db->prepare($query);
	$statement->execute();
	$brands = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $brands;
}

function getOrigin($originID) {
	global $db;
	global $errors;
	$query = 'SELECT type from Origin WHERE originID = :originID';
	$statement = $db->prepare($query);
	$statement->bindValue(':originID', $originID);
	$statement->execute();
	$origin = $statement->fetch(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $origin;
}

function getOrigins() {
	global $db;
	global $errors;

	$query = 'SELECT originID, type from Origin';
	$statement = $db->prepare($query);
	$statement->execute();
	$origins = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $origins;
}

function getQuestions() {
	global $db;
	global $errors;

	$query = 'SELECT questionID, questionText from Questions';
	$statement = $db->prepare($query);
	$statement->execute();
	$questions = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $questions;
}

function createSample($brand, $origin, $batch) {
	global $db;
	global $errors;

	$query = 'INSERT INTO Sample
								(brandID, originID, batch)
						VALUES
								(:brandID, :originID, :batch)';
	$statement = $db->prepare($query);
	$statement->bindValue(':brandID', $brand);
	$statement->bindValue(':originID', $origin);
	$statement->bindValue(':batch', $batch);
	$statement->execute();
	$statement->closeCursor();	
}

function getSamples() {
	global $db;
	global $errors;

	$query = 'SELECT * from Sample WHERE createDate >= CURDATE()';
	$statement = $db->prepare($query);
	$statement->execute();
	$samples = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $samples;
}

function get_questions() {
	global $db;
	global $errors;

	$query = 'SELECT * from Questions';
	$statement = $db->prepare($query);
	$statement->execute();
	$questions = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $questions;
}



?>
