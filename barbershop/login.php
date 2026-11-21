<?php
session_start();

if(isset($_POST['vardas']) && isset($_POST['slaptazodis'])){

    $vardas = $_POST['vardas'];
    $slaptazodis = $_POST['slaptazodis'];

	if($vardas == "admin" && $slaptazodis == "1234"){
        session_regenerate_id(true);
        $_SESSION['loggedin'] = true;

        header("Location: admin.php");
        exit;
    } else {
        $klaida = "Neteisingi prisijungimo duomenys";
    }
}
?>

<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<title>Prisijungimas</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

<header class="topbar">
	<a href="pagrindinis.php">
		<img src="images/logo2.png" class="logo">
	</a>

	<nav class="menu">
		<a href="pagrindinis.php" class="btn">Pagrindinis</a>
	</nav>
</header>

<main class="login-puslapis" style="justify-content:center;">

	<div style="width:400px;" class="info-block">

		<h2>Prisijungimas</h2>

		<?php
		if(isset($klaida)){
			echo "<p style='color:red;'>$klaida</p>";
		}
		?>

		<form method="POST">
			<div class="login">
				<label>Vardas</label>
				<input type="text" name="vardas" required>

				<label>Slaptažodis</label>
				<input type="password" name="slaptazodis" required>

				<button type="submit" class="login-button">Prisijungti</button>
			</div>
		</form>

	</div>

</main>

</body>
</html>