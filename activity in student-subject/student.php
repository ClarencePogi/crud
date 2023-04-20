<?php
include "./index.php";
?>
<br>
<form action="./process/add-student.php" method="post">
    Name:
    <input type="text" name="name">
    <br>
    <br>
    Gender: <br>
    Male
    <input type="radio" name="gender" value="Male"><br>
    Female
    <input type="radio" name="gender" value="Female">
    <br>
    <br>
    Year Level:
    <select name="year">
        <option value="1st">1st</option>
        <option value="2nd">2nd</option>
        <option value="3rd">3rd</option>
        <option value="4th">4th</option>
    </select>
    <br>
    <br>
    Course:
    <select name="course">
        <option value="BSIT">BSIT</option>
        <option value="BEED">BEED</option>
        <option value="BSBA">BSBA</option>
        <option value="CRIM">CRIM</option>
    </select> <br>
    <br>
    <br>
    Semester:
    <select name="semester">
        <option value="1st">1st</option>
        <option value="2nd">2nd</option>
    </select> <br>

    <input type="submit">
</form>

<table border="1">
    <tr>
        <th>Student name</th>
        <th>Gender</th>
        <th>Course</th>
        <th>Year</th>
        <th>Semester</th>

        <th colspan="4">Actions</th>
    </tr>
    <?php
    require_once "./process/connection.php";
    $sql = $conn->prepare("SELECT * FROM student");
    $sql->execute();
    while ($student = $sql->fetch(pdo::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $student['studentName'] ?></td>
            <td><?php echo $student['gender'] ?></td>
            <td><?php echo $student['course'] ?></td>
            <td><?php echo $student['year'] ?></td>
            <td><?php echo $student['semester'] ?></td>
            <td>
                <a href='./update-student.php?id=<?php echo $student['id'] ?>&studentName=<?php echo $student['studentName'] ?>&course=<?php echo $student['course'] ?>&year=<?php echo $student['year'] ?>&semester=<?php echo $student['semester'] ?>'><button>Update</button></a>
            </td>
            <td>
                <a href='./process/delete-student.php?id=<?php echo $student['id'] ?>'><button>Delete</button></a>
            </td>
            <td>
                <a href='./adding-subject.php?studentId=<?php echo $student['id'] ?>&studentName=<?php echo $student['studentName'] ?>&course=<?php echo $student['course'] ?>&year=<?php echo $student['year'] ?>&semester=<?php echo $student['semester'] ?>'><button>Add Subject</button></a>
            </td>

        </tr>
    <?php
    }
    ?>
</table>