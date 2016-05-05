<?php

//validates user for login
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
		$errors = "The username or password is incorrect.";
		return false;
	}
}

//register user for member
function registerUser($firstName, $lastName, $userName, $email, $password, $captcha) {
	global $db;
	global $errors;

	if ($captcha == 7) {
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
	} else {
		$errors = "Please check your math and try again.";
		return false;
	}
}

//get the user name and id
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

//get all of the user info
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

//allows the admin the ability to edit user information
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

//updates the user information
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

// function update_single_user($firstName, $lastName, $email, $userName, $password) {
//     global $db;
// 		global $errors;

//     $query = "UPDATE Users SET
//                 firstName = :firstName,
//                 lastName = :lastName,
// 								email = :email,
// 								userName = :userName,
// 								password = :password,
//               WHERE userID = :userID";
//     $statement = $db->prepare($query);
//     $statement->bindValue(':firstName', $firstName);
//     $statement->bindValue(':lastName', $lastName);
//     $statement->bindValue(':email', $email);
// 	$statement->bindValue(':userName', $userName);
// 	$statement->bindValue(':password', $password);
// 	$statement->execute();
//     $statement->closeCursor();
// 		// return $row_count;
// }

//add brands to the database as additional beers are made
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

//adds the origins to the database
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

//gets the Brand information based on Brand ID to display in the drop down
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

//gets brandID and brandName to display in a list of all possible brands
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

//gets the origin information based on OriginID to display in the drop down
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

//gets originID and originName to display in a list of all possible origin
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

//gets a list of all of the available questions
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

//creates the sample for today, brand + origin + batch
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

//gets all the samples for the current date
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

//gets the samples for the current date and displays them on the page one at a time
function getSamplesNew($limit, $offset) {
	global $db;
	global $errors;

	$query = 'SELECT * from Sample 
	WHERE createDate >= CURDATE()
	ORDER BY sampleID
	LIMIT :offset, :limit';
	$statement = $db->prepare($query);
	$statement->bindValue(':limit', $limit, PDO::PARAM_INT);
	$statement->bindValue(':offset', $offset, PDO::PARAM_INT);
	$statement->execute();
	// $samples = $statement->fetchAll(PDO::FETCH_ASSOC);
	// print_r($samples);
	if ($statement->rowCount() > 0) {
        // Define how we want to fetch the results
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $iterator = new IteratorIterator($statement);
        return $iterator;

    } else {
        return false;
    }
	$statement->closeCursor();
}

//gets a count of the samples for current date
function getSamplesCount() {
	global $db;
	global $errors;

	$query = 'SELECT COUNT(*) FROM Sample WHERE createDate >= CURDATE()';
	$statement = $db->prepare($query);
	$statement->execute();
	$sampleCount = $statement->fetchColumn();
	$statement->closeCursor();
	return $sampleCount;
}

//stores the survey responses in the response table and the notes table
function submitSurvey($sampleID, $responses, $notes) {
	global $db;
	global $errors;

	$userID = $_SESSION['userID'];

	foreach($responses as $questionID => $response) {
		$query = 'INSERT INTO Responses
									(userID, questionID, sampleID, response, createDate)
							VALUES
									(:userID, :questionID, :sampleID, :response, now())';
		$statement = $db->prepare($query);
		$statement->bindValue(':userID', $userID);
		$statement->bindValue(':questionID', $questionID);
		$statement->bindValue(':sampleID', $sampleID);
		$statement->bindValue(':response', $response);
		$statement->execute();
		$statement->closeCursor();
	}
}

function completedSurvey($userID) {
	global $db;
	global $errors;

	$query = 'SELECT Brands.brandName, Origin.type, Sample.batch, Questions.questionText, Responses.response, Responses.createDate FROM Responses
				INNER JOIN Questions ON Responses.questionID = Questions.questionID
				INNER JOIN Sample ON Responses.sampleID = Sample.sampleID
				INNER JOIN Brands ON Sample.brandID = Brands.brandID
				INNER JOIN Origin ON Sample.originID = Origin.originID
					WHERE Responses.userID = :userID AND Responses.createDate <= CURDATE();';
	$statement = $db->prepare($query);
	$statement->bindValue(':userID', $userID);
	$statement->execute();
	$completedSurvey = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $completedSurvey;
}

?>
