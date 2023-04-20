<?php
require "../process/connection.php";

$sql = $conn->prepare("UPDATE student SET studentName = ?, gender = ?, year = ?, course = ?, semester = ? WHERE id = ?");
$sql->execute([$_POST['name'], $_POST['gender'], $_POST['year'], $_POST['course'], $_POST['semester'], $_POST['id']]);
header('location: ../student.php');
?>  