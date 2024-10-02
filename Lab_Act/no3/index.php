<?php

	$_reciept = "";

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$_Order = $_POST['Poods'];
		$_Quantity = $_POST['Quantity'];
		$_Cash = $_POST['cash'];

		$_Food_Menu_Prices = array(
			'Burger' => 50,
			'Fries' => 75,
			'Steak' => 150
		);

		$_Total = $_Food_Menu_Prices[$_Order] * $_Quantity;

		if($_Cash < $_Total){
			$_reciept = "<b><p>The Amount you have paid is <span style='color: red;'>insuffcient</span> . Please pay the appropriate amount.</p></b>";
		} else{
			$_Change = $_Cash - $_Total;

			$_Date_Time = date('m/d/Y h:i A');


			//For reciepts
			$_reciept = "
				<div class='reciept'>
					<h1>Receipt</h1>
					<p>Total Price: " .htmlspecialchars($_Total) . "</p>
					<p>You Paid: " .htmlspecialchars($_Cash) . "</p>
					<p>CHANGE: " .htmlspecialchars($_Change) . "</p>
					<p>" .htmlspecialchars($_Date_Time) . "</p>
				</div>
			";
		}

	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		table, th, td {
  		border:1px solid black;
		}

		.receipt{
			border: 2px solid black;
            padding: 15px;
            margin-top: 20px;
            width: fit-content;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<td><b>Order</b></td>
			<td><b>Amount</b></td>
		</tr>
		<tr>
			<td>Burger</td>
			<td>50</td>
		</tr>
		<tr>
			<td>Fries</td>
			<td>75</td>
		</tr>
		<tr>
			<td>Steak</td>
			<td>150</td>
		</tr>


	</table>
	<br>
	<form action="index.php" method="POST">
		<label for="Poods_Menu">Select an Order: </label>
		<select name="Poods" id="Poods_Menu">
			<option value="Burger">Burger</option>
			<option value="Fries">Fries</option>
			<option value="Steak">Steak</option>
		</select>
		<br><br>
		<label for="quanti">Quantity: </label>
		<input type="number" name="Quantity" id="quanti" min="1" max="100">
		<br><br>
		<label for="pay">Cash: </label>
		<input type="number" name="cash" id="pay" min="1" max="10000">
		<br><br>
		<input type="submit" value="submit" name="submitBTN">
	</form>

	<?php 
		if($_reciept){
			echo $_reciept;
		}
	?>
</body>
</html>


