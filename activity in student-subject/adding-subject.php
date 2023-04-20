<label for="">
    Student Name: <span><?php echo $_GET["studentName"] ?></span>
</label> <br>
<label for="">
    Course: <span><?php echo $_GET["course"] ?></span>
</label><br>
<label for="">
    Year: <span><?php echo $_GET["year"] ?></span>
</label><br>
<label for="">
    Semester: <span><?php echo $_GET["semester"] ?></span>
</label><br>
<label for="">
    Current Subjects: <br>
    <table border="1">
        <tr>
            <th>Subject Code</th>
            <th>Subject Description</th>
            <th>Action</th>
        </tr>
        <?php
        require "./process/connection.php";
        $sql = $conn->prepare("SELECT 
        student_subjects.id,
        student.studentName,
        subject.subjectCode, 
        subject.subjectdescription
        FROM student
        LEFT JOIN student_subjects ON student.id = student_subjects.studentId
        LEFT JOIN subject ON subject.id = student_subjects.subjectId
        WHERE student.id = ?");
        $sql->execute([$_GET['studentId']]);
        while ($data = $sql->fetch(pdo::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $data['subjectCode'] ?></td>
                <td><?php echo $data['subjectdescription'] ?></td>
                <td>
                    <a href='./process/remove-subject.php?id=<?php echo $data['id']?>'><button>Remove</button></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</label>

<hr>

<form action="./process/adding-student-subject.php" method="post">
    <input type="hidden" name="studentId" value="<?php echo $_GET['studentId'] ?>">
    <?php
    require "./process/connection.php";
    $sql = $conn->prepare("SELECT * FROM subject
    WHERE subject.id NOT IN(SELECT subjectId FROM student_subjects WHERE studentId = ?) 
    AND recommendedYear = ? AND recommendedCourse = ?");
    $sql->execute([$_GET['studentId'], $_GET["year"], $_GET["course"]]);

    while ($sub = $sql->fetch(pdo::FETCH_ASSOC)) { ?>
        <input type="checkbox" name="subjects[]" value="<?php echo $sub['id'] ?>">
        <label><?php echo $sub['subjectCode'] . " " . $sub['subjectdescription'] ?></label> <br>
    <?php
    }
    ?>
    <input type="submit">
</form>

<a href="./student.php">Back</a>