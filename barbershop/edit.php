<?php
session_start();
if(!isset($_SESSION['loggedin'])){
	header("Location: login.php");
	exit;
}

require 'config.php';

if (isset($_POST['update'])) {
	$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
	$klientas_id = filter_input(INPUT_POST, 'klientas_id', FILTER_VALIDATE_INT);
	$paslauga = filter_input(INPUT_POST, 'paslauga', FILTER_VALIDATE_INT);
	$meistras = filter_input(INPUT_POST, 'meistras', FILTER_VALIDATE_INT);
	$laikas = filter_input(INPUT_POST, 'laikas', FILTER_VALIDATE_INT);

	$vardas = $_POST['vardas'] ?? '';
	$telefonas = $_POST['telefonas'] ?? '';
	$email = $_POST['email'] ?? '';
	$data = $_POST['data'] ?? '';

	if (!$id || !$klientas_id || !$paslauga || !$meistras || !$laikas) {
		http_response_code(400);
		exit('Neteisingi registracijos duomenys.');
	}

	$stmt = $conn->prepare(
		"UPDATE klientai SET vardas = ?, telefonas = ?, email = ? WHERE id = ?"
	);
	$stmt->bind_param("sssi", $vardas, $telefonas, $email, $klientas_id);
	$stmt->execute();
	$stmt->close();

	$stmt = $conn->prepare(
		"UPDATE registracijos
		 SET paslauga_id = ?, meistras_id = ?, data = ?, laikas_id = ?
		 WHERE id = ?"
	);
	$stmt->bind_param("iisii", $paslauga, $meistras, $data, $laikas, $id);
	$stmt->execute();
	$stmt->close();

	header("Location: admin.php");
	exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
	http_response_code(400);
	exit('Neteisingas registracijos ID.');
}

$stmt = $conn->prepare(
	"SELECT registracijos.*, klientai.vardas, klientai.telefonas, klientai.email
	 FROM registracijos
	 LEFT JOIN klientai ON registracijos.klientas_id = klientai.id
	 WHERE registracijos.id = ?"
);
$stmt->bind_param("i", $id);
$stmt->execute();
$q = $stmt->get_result();
$row = $q->fetch_assoc();
$stmt->close();

if (!$row) {
	http_response_code(404);
	exit('Registracija nerasta.');
}
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

			<input type="hidden" name="id" value="<?php echo (int)$row['id']; ?>">
			<input type="hidden" name="klientas_id" value="<?php echo (int)$row['klientas_id']; ?>">

			<label>Vardas</label>
			<input type="text" name="vardas" value="<?php echo htmlspecialchars($row['vardas'], ENT_QUOTES, 'UTF-8'); ?>">

			<label>Telefonas</label>
			<input type="text" name="telefonas" value="<?php echo htmlspecialchars($row['telefonas'], ENT_QUOTES, 'UTF-8'); ?>">

			<label>El. paštas</label>
			<input type="email" name="email" value="<?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?>">

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
			<input type="date" name="data" value="<?php echo htmlspecialchars($row['data'], ENT_QUOTES, 'UTF-8'); ?>">

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
