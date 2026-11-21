<?php
session_start();

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
    exit;
}

require 'config.php';

$limit = 12;

$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$start = ($page - 1) * $limit;

?>

<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<title>Registracijos</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="dizainas2.css">
</head>

<body>

	<header class="topbar">
		<a href="pagrindinis.php">
			<img src="images/logo2.png" class="logo">
		</a>

		<nav class="menu">
			<a href="pagrindinis.php">Pagrindinis</a>
			<a href="logout.php">Atsijungti</a>
		</nav>
	</header>


<main class="puslapis">

	<div class="filtras">

		<div class="blokas-header">Filtras</div>

			<div class="turinys">

				<form method="GET">

					<label>Meistras</label>
						<select name="meistras">
							<option value="">Visi</option>

							<?php
							$q = mysqli_query($conn,"SELECT * FROM meistrai");
							while($m = mysqli_fetch_assoc($q)){
								echo "<option value='".$m['id']."' ".
								((isset($_GET['meistras']) && $_GET['meistras']==$m['id']) ? "selected" : "").
								">".$m['vardas']."</option>";
							}
							?>

						</select>


					<label>Paslauga</label>
						<select name="paslauga">
							<option value="">Visi</option>

							<?php
							$q = mysqli_query($conn,"SELECT * FROM paslaugos");
							while($p = mysqli_fetch_assoc($q)){
								echo "<option value='".$p['id']."' ".
								((isset($_GET['paslauga']) && $_GET['paslauga']==$p['id']) ? "selected" : "").
								">".$p['pavadinimas']."</option>";
							}
							?>

						</select>

					<label>Data: nuo - iki</label>
						<div class="eilute">
							<input type="date" name="data_nuo" value="<?php echo htmlspecialchars($_GET['data_nuo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
							<input type="date" name="data_iki" value="<?php echo htmlspecialchars($_GET['data_iki'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

					<label>Kliento Vardas, pavarde</label>
						<input type="text" name="klientas">
						<button type="submit">Filtruoti</button>
						<a href="admin.php" class="btn-clear">Išvalyti</a>

				</form>

			</div>

	</div>

	<div class="duomenys">

		<div class="blokas-header">Registracijos</div>

			<div class="turinys">

			<?php

			$sql = "SELECT 
			registracijos.id,
			registracijos.data,
			laikai.laikas,
			klientai.vardas AS klientas,
			paslaugos.pavadinimas AS paslauga,
			meistrai.vardas AS meistras,
			paslaugos.kaina

			FROM registracijos 

			INNER JOIN laikai ON registracijos.laikas_id = laikai.id
			INNER JOIN klientai ON registracijos.klientas_id = klientai.id
			INNER JOIN paslaugos ON registracijos.paslauga_id = paslaugos.id
			INNER JOIN meistrai ON registracijos.meistras_id = meistrai.id";


			$where = array();
			$params = array();
			$types = "";

			if(!empty($_GET['meistras'])){
				$where[] = "registracijos.meistras_id = ?";
				$params[] = (int)$_GET['meistras'];
				$types .= "i";
			}

			if(!empty($_GET['paslauga'])){
				$where[] = "registracijos.paslauga_id = ?";
				$params[] = (int)$_GET['paslauga'];
				$types .= "i";
			}

			if(!empty($_GET['data_nuo'])){
				$where[] = "registracijos.data >= ?";
				$params[] = $_GET['data_nuo'];
				$types .= "s";
			}

			if(!empty($_GET['data_iki'])){
				$where[] = "registracijos.data <= ?";
				$params[] = $_GET['data_iki'];
				$types .= "s";
			}

			if(!empty($_GET['klientas'])){
				$where[] = "klientai.vardas LIKE ?";
				$params[] = "%" . $_GET['klientas'] . "%";
				$types .= "s";
			}

			if(count($where) > 0){
				$sql .= " WHERE " . implode(" AND ", $where);
			}

			$sql .= " ORDER BY registracijos.id DESC LIMIT ?, ?";

			$stmt = $conn->prepare($sql);
			$paramsPage = array_merge($params, array($start, $limit));
			$stmt->bind_param($types . "ii", ...$paramsPage);
			$stmt->execute();
			$result = $stmt->get_result();

			echo "<table>";

				echo "<tr>
					<th>Data</th>
					<th>Laikas</th>
					<th>Klientas</th>
					<th>Paslauga</th>
					<th>Meistras</th>
					<th>Kaina</th>
					<th></th>
					</tr>";

				while($row = mysqli_fetch_assoc($result)){

					echo "<tr>";
					echo "<td>".htmlspecialchars($row['data'], ENT_QUOTES, 'UTF-8')."</td>";
					echo "<td>".htmlspecialchars($row['laikas'], ENT_QUOTES, 'UTF-8')."</td>";
					echo "<td>".htmlspecialchars($row['klientas'], ENT_QUOTES, 'UTF-8')."</td>";
					echo "<td>".htmlspecialchars($row['paslauga'], ENT_QUOTES, 'UTF-8')."</td>";
					echo "<td>".htmlspecialchars($row['meistras'], ENT_QUOTES, 'UTF-8')."</td>";
					echo "<td>".htmlspecialchars($row['kaina'], ENT_QUOTES, 'UTF-8')." €</td>";
					echo "<td>
						<a href='edit.php?id=".(int)$row['id']."' class='btn-action'>Edit</a>
						<a href='delete.php?id=".(int)$row['id']."' class='btn-action'>Delete</a>
						</td>";
					echo "</tr>";

				}

			echo "</table>";

			$stmt->close();

			$total_sql = "SELECT COUNT(*) as total
			FROM registracijos
			LEFT JOIN klientai ON registracijos.klientas_id = klientai.id";

			if(count($where) > 0){
				$total_sql .= " WHERE " . implode(" AND ", $where);
			}

			$stmt = $conn->prepare($total_sql);
			if($types !== ""){
				$stmt->bind_param($types, ...$params);
			}
			$stmt->execute();
			$total_result = $stmt->get_result();
			$total_row = mysqli_fetch_assoc($total_result);
			$total = $total_row['total'];
			$stmt->close();

			$pages = ceil($total / $limit);

			echo "<div class='pagination'>";

			for($i = 1; $i <= $pages; $i++){

				$query = $_GET;
				$query['page'] = $i;
				$url = http_build_query($query);

				$active = ($i == $page) ? "active" : "";

				echo "<a href='?$url' class='pages $active'>$i</a>";
			}

			echo "</div>";

			?>

			</div>

	</div>

</main>

</body>
</html>
