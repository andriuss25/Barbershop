<?php
require 'config.php';

$id = (int)$_GET['id'];

mysqli_query($conn,"DELETE FROM registracijos WHERE id='$id'");

header("Location: admin.php");
exit;
?>