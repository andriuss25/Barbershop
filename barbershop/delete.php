<?php
session_start();
if(!isset($_SESSION['loggedin'])){
	header("Location: login.php");
	exit;
}

require 'config.php';

$id = (int)($_GET['id'] ?? 0);

mysqli_query($conn, "DELETE FROM registracijos WHERE id = '" . $_GET['id'] . "'");

header("Location: admin.php");
exit;
?>
