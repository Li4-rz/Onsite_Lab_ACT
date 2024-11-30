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
		$searchQuery = "%" . $searchQuery . "%"; 
	
		$sql = "SELECT * FROM nurse_applications WHERE
			last_name LIKE ? OR
			first_name LIKE ? OR
			email LIKE ? OR
			gender LIKE ? OR
			address LIKE ? OR
			nationality LIKE ? OR
			added_by LIKE ? OR
			date_added LIKE ? OR
			last_updated_by LIKE ? OR
			last_update LIKE ?";
	
		$stmt = $pdo->prepare($sql);
	
		$executeQuery = $stmt->execute(array_fill(0, 10, $searchQuery));
	
		if ($executeQuery) {
			return $stmt->fetchAll();
		}
	
		return [];
	}
	


	function insertNewApplicant($pdo, $first_name, $last_name, $email, $gender, $address, $nationality,$username) {

		$sql = "INSERT INTO nurse_applications 
			(
				first_name,
				last_name,
				email,
				gender,
				address,
				nationality,
				added_by,
				last_updated_by				
			)
			VALUES (?,?,?,?,?,?,?,?)";

		$stmt = $pdo->prepare($sql);

		$executeQuery = $stmt->execute([$first_name, $last_name, $email, $gender, $address, $nationality,$username,$username]);

		if ($executeQuery) {
			return true;
		}
	}


	function editUser($pdo, $first_name, $last_name, $email, $gender, $address, $nationality, $id, $username) {

		$sql = "UPDATE nurse_applications
					SET first_name = ?,
						last_name = ?,
						email = ?,
						gender = ?,
						address = ?,
						nationality = ?,
						last_updated_by = ?,
						last_update = NOW()
					WHERE id = ? 
				";

		$stmt = $pdo->prepare($sql);

		$executeQuery = $stmt->execute([$first_name, $last_name, $email, $gender, $address, $nationality, $username, $id,]);

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