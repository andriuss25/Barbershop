
<?php
require 'config.php';

$id = (int)$_GET['id'];

$stmt = $conn->prepare("DELETE FROM registracijos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: admin.php");
exit;
?>
