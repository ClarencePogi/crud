<?php 
require "../process/connection.php";

$sql = $conn->prepare("INSERT INTO student (`studentName`, `gender`, `year`, `course`, `semester`) VALUES (?, ?, ?, ?, ?)");
$sql->execute([$_POST['name'], $_POST['gender'], $_POST['year'], $_POST['course'], $_POST['semester']]);
die(header('location: ../index.php'));
?>