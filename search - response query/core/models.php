<?php
	require_once 'dbConfig.php';

	function getAllApplicants($pdo) {

		$sql = "SELECT * FROM nurse_applications
				ORDER BY last_name ASC";

		$stmt = $pdo->prepare($sql);

		$executeQuery = $stmt->execute();

		if ($executeQuery) {
			return $stmt->fetchAll();
		}
	}


	function getApplicantByID($pdo, $id) {

		$sql = "SELECT * FROM nurse_applications WHERE id=?";

		$stmt = $pdo->prepare($sql);

		$executeQuery = $stmt->execute([$id]);

		if ($executeQuery) {
			return $stmt->fetch();
		}
	}


	function searchForAApplicant($pdo, $searchQuery) {

		$sql = "SELECT * FROM nurse_applications WHERE
				CONCAT(last_name, first_name, email, gender, address, nationality, date_added)
				LIKE ?";

		$stmt = $pdo->prepare($sql);

		$executeQuery = $stmt->execute(["%" .$searchQuery. "%"]);

		if ($executeQuery) {
			return $stmt->fetchAll();
		}
	}


	function insertNewApplicant($pdo, $first_name, $last_name, $email, $gender, $address, $nationality) {

		$sql = "INSERT INTO nurse_applications 
			(
				first_name,
				last_name,
				email,
				gender,
				address,
				nationality,
				
			)
			VALUES (?,?,?,?,?,?)";

		$stmt = $pdo->prepare($sql);

		$executeQuery = $stmt->execute([$first_name, $last_name, $email, $gender, $address, $nationality,]);

		if ($executeQuery) {
			return true;
		}
	}


	function editUser($pdo, $first_name, $last_name, $email, $gender, $address, $nationality, $id) {

		$sql = "UPDATE nurse_applications
					SET first_name = ?,
						last_name = ?,
						email = ?,
						gender = ?,
						address = ?,
						nationality = ?,
					WHERE id = ? 
				";

		$stmt = $pdo->prepare($sql);

		$executeQuery = $stmt->execute([$first_name, $last_name, $email, $gender, $address, $nationality, $id]);

		if ($executeQuery) {
			return true;
		}

	}


	function deleteUser($pdo, $id) {
		$sql = "DELETE FROM nurse_applications 
				WHERE id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$id]);
	
		if ($executeQuery) {
			return true;
		}
	}


	function checkIfUserExists($pdo, $username) {
		$response = array();
		$sql = "SELECT * FROM user_accounts WHERE username = ?";
		$stmt = $pdo->prepare($sql);
	
		if ($stmt->execute([$username])) {
	
			$userInfoArray = $stmt->fetch();
	
			if ($stmt->rowCount() > 0) {
				$response = array(
					"result"=> true,
					"status" => "200",
					"userInfoArray" => $userInfoArray
				);
			}
	
			else {
				$response = array(
					"status" => "400",
					"message"=> "User doesn't exist from the database"
				);
			}
		}
	
		return $response;
	
	}


	function insertNewUser($pdo, $username, $first_name, $last_name, $password) {
		$response = array();
		$checkIfUserExists = checkIfUserExists($pdo, $username); 
	
		if (!$checkIfUserExists['result']) {
	
			$sql = "INSERT INTO user_accounts (username, first_name, last_name, password) 
			VALUES (?,?,?,?)";
	
			$stmt = $pdo->prepare($sql);
	
			if ($stmt->execute([$username, $first_name, $last_name, $password])) {
				$response = array(
					"status" => "200",
					"message" => "User successfully inserted!"
				);
			}
	
			else {
				$response = array(
					"status" => "400",
					"message" => "An error occured with the query!"
				);
			}
		}
	
		else {
			$response = array(
				"status" => "400",
				"message" => "User already exists!"
			);
		}
	
		return $response;
	}
?>