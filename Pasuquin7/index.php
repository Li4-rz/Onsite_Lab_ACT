<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}

$username = $_SESSION['username'];
$albums = getAlbumsByUser($pdo, $username);
$selectedAlbumId = isset($_GET['album_id']) ? $_GET['album_id'] : null;
$photos = $selectedAlbumId ? getAlbumPhotos($pdo, $selectedAlbumId) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Photo Album</title>
	<link rel="stylesheet" href="styles/styles.css">
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f9f9f9;
			margin: 0;
			padding: 0;
		}
		.navbar {
			background-color: #333;
			color: #fff;
			padding: 10px;
			text-align: center;
		}
		.navbar a {
			color: #fff;
			margin: 0 10px;
			text-decoration: none;
		}
		.navbar a:hover {
			text-decoration: underline;
		}
		.createAlbumForm {
			background-color: #fff;
			padding: 20px;
			margin: 20px auto;
			width: 80%;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
		}
		.albums {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin: 20px;
		}
		.album {
			background-color: #fff;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
			margin: 10px;
			padding: 15px;
			text-align: center;
			width: 200px;
		}
		.album h3 a {
			color: #333;
			text-decoration: none;
		}
		.album h3 a:hover {
			text-decoration: underline;
		}
		.uploadPhotoForm {
			background-color: #fff;
			padding: 20px;
			margin: 20px auto;
			width: 80%;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
		}
		.photos {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin-top: 20px;
		}
		.photo {
			margin: 10px;
			text-align: center;
		}
		.photo img {
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
		}
	</style>
</head>
<body>
	<div class="navbar">
		<?php include 'navbar.php'; ?>
	</div>

	<!-- Create Album Form -->
	<div class="createAlbumForm">
		<form action="core/handleForms.php" method="POST">
			<input type="text" name="album_name" placeholder="Album Name" required>
			<button type="submit" name="createAlbumBtn">Create Album</button>
		</form>
	</div>

	<!-- Display Albums -->
	<div class="albums">
		<?php foreach ($albums as $album) { ?>
			<div class="album">
				<h3>
					<a href="index.php?album_id=<?php echo $album['album_id']; ?>">
						<?php echo htmlspecialchars($album['album_name']); ?>
					</a>
				</h3>
				<p>Created by: <?php echo htmlspecialchars($album['username']); ?></p>
				<p><i><?php echo $album['date_added']; ?></i></p>
				<?php if ($_SESSION['username'] == $album['username']) { ?>
					<!-- Edit Album Button -->
					<form action="core/handleForms.php" method="POST" style="margin-top: 10px;">
						<input type="hidden" name="album_id" value="<?php echo $album['album_id']; ?>">
						<input type="text" name="album_name" placeholder="New Album Name" required>
						<button type="submit" name="editAlbumBtn">Edit</button>
					</form>
					<!-- Delete Album Button -->
					<form action="core/handleForms.php" method="POST" style="margin-top: 5px;">
						<input type="hidden" name="album_id" value="<?php echo $album['album_id']; ?>">
						<button type="submit" name="deleteAlbumBtn" onclick="return confirm('Are you sure you want to delete this album?')">Delete</button>
					</form>
				<?php } ?>
			</div>
		<?php } ?>
	</div>

	<!-- Show Photos for Selected Album -->
	<?php if ($selectedAlbumId) { ?>
		<div class="albumPhotos">
			<h2>Photos in Album</h2>
			<?php if (empty($photos)) { ?>
				<p>No photos in this album yet. Upload one below!</p>
			<?php } else { ?>
				<div class="photos">
					<?php foreach ($photos as $photo) { ?>
						<div class="photo">
							<img src="images/<?php echo htmlspecialchars($photo['photo_name']); ?>" alt="Photo" style="width: 200px; height: 200px; object-fit: cover;">
							<p><?php echo htmlspecialchars($photo['description']); ?></p>
							<?php if ($_SESSION['username'] == $photo['username']) { ?>
								<a href="editphoto.php?photo_id=<?php echo $photo['photo_id']; ?>">Edit</a> |
								<a href="deletephoto.php?photo_id=<?php echo $photo['photo_id']; ?>">Delete</a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>

		<!-- Photo Upload Form -->
		<div class="uploadPhotoForm">
			<h3>Upload a Photo to This Album</h3>
			<form action="core/handleForms.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="album_id" value="<?php echo $selectedAlbumId; ?>">
				<p>
					<label for="photoDescription">Description</label>
					<input type="text" name="photoDescription">
				</p>
				<p>
					<label for="image">Photo Upload</label>
					<input type="file" name="image" required>
				</p>
				<button type="submit" name="insertPhotoBtn">Upload Photo</button>
			</form>
		</div>
	<?php } ?>
</body>
</html>