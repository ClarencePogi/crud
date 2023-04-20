<?php 
require "../process/connection.php";
$sql = $conn->prepare("DELETE FROM student WHERE id = ?");
$sql->execute([$_GET['id']]);
die(header('location: ../student.php'));
?>