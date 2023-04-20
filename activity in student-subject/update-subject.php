<?php
    include "./index.php";
?>

<form action="./process/update-subject.php" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
    Subject Code:
    <input type="text" name="subjectCode" value="<?php echo $_GET['subjectCode']?>"> <br>
    Subject Description: <br>
    <input type="text" name="subjectdescription" value="<?php echo $_GET['subjectdescription']?>"><br> <br>
    Recommended Year:
    <select name="recommendedYear">
        <option value="1st">1st</option>
        <option value="2nd">2nd</option>
        <option value="3rd">3rd</option>
        <option value="4th">4th</option>
    </select> <br><br>

    Recommended Course:
    <select name="recommendedCourse">
        <option value="BSIT">BSIT</option>
        <option value="BEED">BEED</option>
        <option value="BSBA">BSBA</option>
        <option value="CRIM">CRIM</option>
    </select>
    <input type="submit" name="" id="">
</form>

<table border="1">
    <tr>
        <th>Subject Code</th>
        <th>Description</th>
        <th>Recommended Year</th>
        <th>Recommended Course</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
        require_once "./process/connection.php";
        $sql = $conn->prepare("SELECT * FROM `subject`");
        $sql->execute();
        while($student = $sql->fetch(pdo:: FETCH_ASSOC)){ ?>
        <tr>
            <td><?php echo $student['subjectCode']?></td>
            <td><?php echo $student['subjectdescription']?></td>
            <td><?php echo $student['recommendedYear']?></td>
            <td><?php echo $student['recommendedCourse']?></td>
            <td>
                <a href='./update-subject.php?id=<?php echo $student['id'] ?>&subjectCode=<?php echo $student['subjectCode'] ?>&subjectdescription=<?php echo $student['subjectdescription'] ?>&recommendedYear=<?php echo $student['recommendedYear'] ?>&recommendedCourse=<?php echo $student['recommendedCourse'] ?>'><button>Update</button></a>
            </td>
            <td>
                <a href='./process/delete-student.php?id=<?php echo $student['id'] ?>'><button>Delete</button></a>
            </td>

        </tr>
    <?php
        }
    ?>
</table>