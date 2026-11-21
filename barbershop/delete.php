<?php
session_start();
if(!isset($_SESSION['loggedin'])){
	header("Location: login.php");
	exit;
}

require 'config.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = $conn->prepare("DELETE FROM registracijos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: admin.php");
exit;
?>