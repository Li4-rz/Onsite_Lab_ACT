<?php  
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertNewUserBtn'])) {
	$username = trim($_POST['username']);
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);

	if (!empty($username) && !empty($first_name) && !empty($last_name) && !empty($password) && !empty($confirm_password)) {

		if ($password == $confirm_password) {

			$insertQuery = insertNewUser($pdo, $username, $first_name, $last_name, password_hash($password, PASSWORD_DEFAULT));
			$_SESSION['message'] = $insertQuery['message'];

			if ($insertQuery['status'] == '200') {
				$_SESSION['message'] = $insertQuery['message'];
				$_SESSION['status'] = $insertQuery['status'];
				header("Location: ../login.php");
			}

			else {
				$_SESSION['message'] = $insertQuery['message'];
				$_SESSION['status'] = $insertQuery['status'];
				header("Location: ../register.php");
			}

		}
		else {
			$_SESSION['message'] = "Please make sure both passwords are equal";
			$_SESSION['status'] = '400';
			header("Location: ../register.php");
		}

	}

	else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../register.php");
	}
}

if (isset($_POST['loginUserBtn'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (!empty($username) && !empty($password)) {

		$loginQuery = checkIfUserExists($pdo, $username);
		$userIDFromDB = $loginQuery['userInfoArray']['user_id'];
		$usernameFromDB = $loginQuery['userInfoArray']['username'];
		$passwordFromDB = $loginQuery['userInfoArray']['password'];

		if (password_verify($password, $passwordFromDB)) {
			$_SESSION['user_id'] = $userIDFromDB;
			$_SESSION['username'] = $usernameFromDB;
			header("Location: ../index.php");
		}

		else {
			$_SESSION['message'] = "Username/password invalid";
			$_SESSION['status'] = "400";
			header("Location: ../login.php");
		}
	}

	else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../register.php");
	}

}

if (isset($_GET['logoutUserBtn'])) {
	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	header("Location: ../login.php");
}



if (isset($_POST['deletePhotoBtn'])) {
	$photo_name = $_POST['photo_name'];
	$photo_id = $_POST['photo_id'];
	$deletePhoto = deletePhoto($pdo, $photo_id);

	if ($deletePhoto) {
		unlink("../images/".$photo_name);
		header("Location: ../index.php");
	}

}


if (isset($_POST['createAlbumBtn'])) {
	$album_name = trim($_POST['album_name']);
	$username = $_SESSION['username'];

	if (!empty($album_name)) {
		$createAlbum = createAlbum($pdo, $album_name, $username);
		if ($createAlbum) {
			header("Location: ../index.php");
		}
	}
}

if (isset($_POST['insertPhotoBtn'])) {
    // Get Description and Album ID
    $description = $_POST['photoDescription'];
    $album_id = isset($_POST['album_id']) ? $_POST['album_id'] : null;

    // Get file details
    $fileName = $_FILES['image']['name'];
    $tempFileName = $_FILES['image']['tmp_name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Generate unique file name
    $uniqueID = sha1(md5(rand(1, 9999999)));
    $imageName = $uniqueID . "." . $fileExtension;

    // Save image record to the database
    $saveImgToDb = insertPhoto($pdo, $imageName, $_SESSION['username'], $description, $album_id);

    // Move file to the specified path
    if ($saveImgToDb) {
        $folder = "../images/" . $imageName;
        if (move_uploaded_file($tempFileName, $folder)) {
            header("Location: ../index.php?album_id=$album_id");
            exit;
        }
    } else {
        echo "Error saving image to the database.";
    }
}

if (isset($_POST['editAlbumBtn'])) {
    $album_id = $_POST['album_id'];
    $new_name = $_POST['album_name'];
    if (updateAlbumName($pdo, $album_id, $new_name)) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Error updating album name.";
    }
}

if (isset($_POST['deleteAlbumBtn'])) {
    $album_id = $_POST['album_id'];
    if (deleteAlbum($pdo, $album_id)) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Error deleting album.";
    }
}