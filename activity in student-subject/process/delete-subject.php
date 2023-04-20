<?php 
require "../process/connection.php";
$sql = $conn->prepare("DELETE FROM subject WHERE id = ?");
$sql->execute([$_GET['id']]);
die(header('location: ../subject.php'));
?>