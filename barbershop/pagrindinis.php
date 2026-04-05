<?php
require 'config.php';

$zinute = "";


if(isset($_POST['registruoti'])){

	$vardas = $_POST["vardas"];
	$telefonas = $_POST["numeris"];
	$email = $_POST["email"];
	$data = $_POST["data"];
	$laikas = $_POST["laikas"];
	$paslauga = $_POST["paslauga"];
	$meistras = $_POST["meistras"];

	$sql="SELECT * FROM registracijos
	WHERE data='$data' 
	AND laikas_id='$laikas'
	AND meistras_id='$meistras'";

	$result=mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)>0){
		echo "Šis laikas jau užimtas";
		exit;
	}

	$sql = "INSERT INTO klientai (vardas, telefonas, email)
	VALUES ('$vardas','$telefonas','$email')";

	mysqli_query($conn,$sql);

	$klientas_id = mysqli_insert_id($conn);

	$sql2 = "INSERT INTO registracijos
	(paslauga_id, meistras_id, klientas_id, data, laikas_id)
	VALUES ('$paslauga','$meistras','$klientas_id','$data','$laikas')";

	mysqli_query($conn,$sql2);

	$zinute = "Registracija sėkminga";
	
}

?>


<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hair Studio</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header class="topbar">
    <a href="pagrindinis.php">
		<img src="images/logo2.png" class="logo">
	</a>

    <nav class="menu">
        <a href="#home">Pradžia</a>
        <a href="#about">Apie mus</a>
        <a href="#services">Paslaugos</a>
		<a href="#prices">Kainos</a>
        <a href="#portfolio">Meistrai</a> 
        <a href="#contact">Kontaktai</a>
        <a href="#reg" class="btn">Registracija</a>
    </nav>
</header>

<section class="hero" id="home">
    <div class="hero-text">
        
        <h1>Sveiki atvykę į</h1>
		<h1>hair Studio</h1>
		<a href="#reg">Registracija vizitui</a>
    </div>
</section>

<section class="content-section" id="about">

    <div class="blocks-container">

        <div class="about-container">
		
			<div class="about-image">
				<img src="images/about.png" alt="Kirpimas">
			</div>
			
			<div class="about-text">
				<h2>Apie mus</h2>
				<p>
					Hair Studio grožio salonas Kaune - tai aukštos kokybės 
					plaukų kirpimo, dažymo, modeliavimo, puoselėjimo paslaugos.
					Salone jau 16 metų dirba kvalifikuoti, grožio paslaugas teikiantys, 
					meistrai. Kiekvieną klientą aptarnaujame maloniai, skirdami 
					ypatingą dėmesį ir laiką. Suteikiame informatyvią konsultaciją 
					ne tik apie paslaugą salone, bet ir kaip prižiūrėti plaukus namuose.
				</p>
			</div>
        </div>

        <div class="info-block" id="services">
			<h2 class="paslauga-label">Paslaugos</h2>
			
            <div class="paslaugos">
				<div class="kortele">
					<img src="images/11.png">
					<h3>Kirpimas</h3>
					<p>Vyriškas, moteriškas ir vaikų kirpimas.</p>
				</div>

				<div class="kortele">
					<img src="images/22.png">
					<h3>Dažymas</h3>
					<p>Profesionalus plaukų dažymas.</p>
				</div>

				<div class="kortele">
					<img src="images/33.png">
					<h3>Modeliavimas</h3>
					<p>Barzdos kirpimas ir formavimas.</p>
				</div>
			</div>
			
        </div>
		
		<div class="info-block" id="prices">
            <div class="kainos-blokas">
				<div class="kainos-img">
					<img src="images/prices.png">
				</div>
				<div class="kainos">
					<h2>Kainos</h2>

					<p class="kaina">
						<span>Vyriškas kirpimas</span>
						<span>25€</span>
					</p>
					
					<p class="kaina">
						<span>Plaukų kirpimas ir barzdos modeliavimas</span>
						<span>35€</span>
					</p>
					
					<p class="kaina">
						<span>Barzdos modeliavimas</span>
						<span>20€</span>
					</p>
					
					<p class="kaina">
						<span>Vaikų kirpimas</span>
						<span>15€</span>
					</p>
					
					<p class="kaina">
						<span>Moteriškas kirpimas</span>
						<span>25€</span>
					</p>
					
					<p class="kaina">
						<span>Plaukų dažymas</span>
						<span>40€</span>
					</p>

					<p class="kaina">
						<span>Plaukų tiesinimas</span>
						<span>20€</span>
					</p>

					<p class="kaina">
						<span>Proginis šukavimas</span>
						<span>30€</span>
					</p>
				</div>
			</div>
        </div>

        <div class="info-block" id="portfolio">
            <div class="meistrai">
				<h2>Meistrai</h2>
				
				<div class="meistru-blokas">

					<div class="meistras">
						<img src="images/barber1.png">
						<h3>Agnė</h3>
						<p>Kirpėja</p>
						<button>Plačiau</button>
					</div>

					<div class="meistras">
						<img src="images/barber2.png">
						<h3>Lukas</h3>
						<p>Kirpėjas</p>
						<button>Plačiau</button>
					</div>

					<div class="meistras">
						<img src="images/barber3.png">
						<h3>Inga</h3>
						<p>Kirpėja - koloristė</p>
						<button>Plačiau</button>
					</div>

					<div class="meistras">
						<img src="images/barber4.png">
						<h3>Tomas</h3>
						<p>Barberis</p>
						<button>Plačiau</button>
					</div>

				</div>
			</div>
        </div>


        <div class="info-block" id="contact">
			<div class="kontaktai">
				<h2>Kontaktai</h2>
				<p>Grožio salonas Hair Studio</p>
				<p>Pramonės pr. 20, Kaunas</p>
				<p>+37068340024</p>
				<p>hairstudio@gmail.com</p>
				<p>Darbo laikas I-V  08:00-17:00</p>
				
				<iframe class="map" src="https://www.google.com/maps?q=Kauno+kolegija+Pramonės+pr.+20+Kaunas&output=embed"></iframe>
			</div>
		</div>
    </div>

</section>




<!-- POPUP -->
<div id="reg" class="modal">

	<div class="box">

		<a href="#" class="close">X</a>

		<h2>Registracija</h2>

<?php
if($zinute!=""){
	echo "<p class='zinute'>$zinute</p>";
}
?>

		<form method="POST" action="#reg">

			<label>Paslauga</label>
			<select name="paslauga" onchange="this.form.submit()" required>
				<option value="">Pasirinkite paslaugą</option>
			
				    <?php
					
					$paslauga="";
					
					if(isset($_POST['paslauga'])){
						$paslauga=$_POST['paslauga'];
					}
					
					$sql="SELECT * FROM paslaugos";
					$result=mysqli_query($conn,$sql);

					while($row=mysqli_fetch_assoc($result)){
						$selected="";
						if($paslauga==$row['id']){
							$selected="selected";
						}
						echo "<option value='".$row['id']."' $selected>".$row['pavadinimas']."</option>";
					}
					
					?>
			</select>
			

			<label>Meistras</label>
			
			<?php

			$disabled = "disabled";

			if(isset($_POST['paslauga']) && $_POST['paslauga']!=""){
				$disabled="";
			}
			?>
			
			<select name="meistras" onchange="this.form.submit()" <?php echo $disabled; ?> required>
			
			<option value="">Pasirinkite meistrą</option>

				<?php
				$sql="SELECT meistrai.*
				FROM meistrai
				JOIN paslauga_meistras
				ON meistrai.id = paslauga_meistras.meistras_id
				WHERE paslauga_meistras.paslauga_id='$paslauga'";

				$result=mysqli_query($conn,$sql);
				
				$meistras="";

				if(isset($_POST['meistras'])){
					$meistras=$_POST['meistras'];
				}

				while($row=mysqli_fetch_assoc($result)){
					$selected="";
					if($meistras==$row['id']){
						$selected="selected";
					}
					echo "<option value='".$row['id']."' $selected>".$row['vardas']."</option>";

				}
				?>
			</select>

			<label>Data</label>
			<div class="data-laikas">
				<input type="date" name="data" value="<?php if(isset($_POST['data'])) echo $_POST['data']; ?>" onchange="this.form.submit()" required>
				<select name="laikas" required>
				<option value="">Pasirinkite laiką</option>
					<?php

					if(isset($_POST['meistras']) && isset($_POST['data'])){

						$meistras=$_POST['meistras'];
						$data=$_POST['data'];
						
						$diena = date('w', strtotime($data));
						if($diena != 0 && $diena != 6){
						
							$sql="SELECT *
							FROM laikai
							WHERE id NOT IN
							(
							SELECT laikas_id
							FROM registracijos
							WHERE meistras_id='$meistras'
							AND data='$data'
							)";

							$result=mysqli_query($conn,$sql);

							while($row=mysqli_fetch_assoc($result)){
								echo "<option value='".$row['id']."'>".$row['laikas']."</option>";
							}
						}
					}

					?>
				</select>
			</div>

			<label>Vardas pavardė</label>
			<input type="text" name="vardas" required>

			<label>Tel. nr.</label>
			<input type="text" name="numeris" required>

			<label>El. paštas</label>
			<input type="email" name="email" required>

			<button type="submit" name="registruoti">Registruotis</button>

		</form>

	</div>
</div>

<footer class="footer">
    <div class="footer-left">
        <img src="images/logo.png" class="footer-logo">
        <span>© 2026 Hair Studio</span>
    </div>

    <div class="footer-center">
		<a href="pagrindinis.php">Pradžia</a>
		<a href="#"><img src="images/fb-logo.png" class="social"></a>
		<a href="#"><img src="images/ig-logo.png" class="social"></a>
    </div>

    <div class="footer-right">
        <a href="login.php"><img src="images/admin-logo.png" class="social"></a>
    </div>
</footer>

</body>
</html>