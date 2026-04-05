<?php
require 'config.php';


if(isset($_POST['update'])){

	$id = $_POST['id'];
	$klientas_id = $_POST['klientas_id'];

	$vardas = $_POST['vardas'];
	$telefonas = $_POST['telefonas'];
	$email = $_POST['email'];

	$paslauga = $_POST['paslauga'];
	$meistras = $_POST['meistras'];
	$data = $_POST['data'];
	$laikas = $_POST['laikas'];

	mysqli_query($conn,"
	UPDATE klientai 
	SET vardas='$vardas', telefonas='$telefonas', email='$email'
	WHERE id='$klientas_id' ");

	mysqli_query($conn,"
	UPDATE registracijos 
	SET paslauga_id='$paslauga',
		meistras_id='$meistras',
		data='$data',
		laikas_id='$laikas'
	WHERE id='$id' ");

	header("Location: admin.php");
	exit;
}


$id = $_GET['id'];

$q = mysqli_query($conn,"
SELECT registracijos.*, klientai.vardas, klientai.telefonas, klientai.email
FROM registracijos
LEFT JOIN klientai ON registracijos.klientas_id = klientai.id
WHERE registracijos.id='$id' ");

$row = mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<title>Edit</title>
	<link rel="stylesheet" href="dizainas2.css">
</head>

<body class="edit">

	<div class="box">

		<h2>Redagavimas</h2>

		<form method="POST">

			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<input type="hidden" name="klientas_id" value="<?php echo $row['klientas_id']; ?>">

			<label>Vardas</label>
			<input type="text" name="vardas" value="<?php echo $row['vardas']; ?>">

			<label>Telefonas</label>
			<input type="text" name="telefonas" value="<?php echo $row['telefonas']; ?>">

			<label>El. paštas</label>
			<input type="email" name="email" value="<?php echo $row['email']; ?>">

			<label>Paslauga</label>
			<select name="paslauga">
				<?php
				$q = mysqli_query($conn,"SELECT * FROM paslaugos");
				while($p = mysqli_fetch_assoc($q)){
					$sel = ($row['paslauga_id']==$p['id']) ? "selected" : "";
					echo "<option value='".$p['id']."' $sel>".$p['pavadinimas']."</option>";
				}
				?>
			</select>

			<label>Meistras</label>
			<select name="meistras">
				<?php
				$q = mysqli_query($conn,"SELECT * FROM meistrai");
				while($m = mysqli_fetch_assoc($q)){
					$sel = ($row['meistras_id']==$m['id']) ? "selected" : "";
					echo "<option value='".$m['id']."' $sel>".$m['vardas']."</option>";
				}
				?>
			</select>

			<label>Data</label>
			<input type="date" name="data" value="<?php echo $row['data']; ?>">

			<label>Laikas</label>
			<select name="laikas">
				<?php
				$q = mysqli_query($conn,"SELECT * FROM laikai");
				while($l = mysqli_fetch_assoc($q)){
					$sel = ($row['laikas_id']==$l['id']) ? "selected" : "";
					echo "<option value='".$l['id']."' $sel>".$l['laikas']."</option>";
				}
				?>
			</select>

			<br><br>

			<button type="submit" name="update">Išsaugoti</button>
			<a href="admin.php" class="cancel">Atšaukti</a>

		</form>

	</div>

</body>
</html>