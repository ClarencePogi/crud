<?php
require "../process/connection.php";

$sql = $conn->prepare("UPDATE `subject` SET subjectCode	 = ?, subjectdescription = ?, recommendedYear = ?, recommendedCourse = ? WHERE id = ?");
$sql->execute([$_POST['subjectCode'], $_POST['subjectdescription'], $_POST['recommendedYear'], $_POST['recommendedCourse'], $_POST['id']]);
header('location: ../subject.php');
?>  