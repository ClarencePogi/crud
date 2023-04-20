<?php 
require "../process/connection.php";

$sql = $conn->prepare("INSERT INTO `subject` (`subjectCode`, `subjectdescription`, `recommendedYear`, `recommendedCourse`) VALUES (?, ?, ?, ?)");
$sql->execute([$_POST['subjectCode'], $_POST['subjectdescription'], $_POST['recommendedYear'], $_POST['recommendedCourse']]);
die(header('location: ../index.php'));
?>