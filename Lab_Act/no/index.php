<?php
	session_start();

	$_Answer = '';

	if(isset($_POST['submitBTN'])){
		
		//Get value of input 1
		$_A = $_POST['input1'];

		//Get value of input 2
		$_B = $_POST['input2'];
		
		//Get value of input 3
		$_C = $_POST['input3'];

		$_Answer = ($_B**2) - (4*$_A*$_C);
		
	}
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
		<form action="index.php" method="POST">
			<label for="input1">A</label>
			<input type="text" id="input1" name="input1">
			<br>
			<br>
			<label for="input2">B</label>
			<input type="text" id="input2" name="input2">
			<br>
			<br>
			<label for="input3">C</label>
			<input type="text" id="input3" name="input3">
			<br>
			<br>
			<input type="submit" value="submit" name="submitBTN">
		</form>
		<?php if($_Answer !== ''): ?>
			<p>The Answer is: <?php echo $_Answer; ?></p>
		<?php endif; ?>
	</body>
</html>