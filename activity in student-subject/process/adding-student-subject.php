<?php
require "../process/connection.php";


$subIdList = array();

foreach($_POST['subjects'] as $subject){
    $sub = intval($subject);
    array_push($subIdList, $sub);
}

$key = array_keys($subIdList);

$min = count($subIdList);

for($i = 0; $i < $min; $i++){
    $sql = $conn->prepare("INSERT INTO student_subjects (studentId, subjectId) VALUES (?, ?)");
    $sql->execute([$_POST['studentId'], $subIdList[$key[$i]]]);
}
die(header('location: ../student.php'));

?>

