
<form action="./process/update-student.php" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
    Name:
    <input type="text" name="name" value="<?php echo $_GET['studentName']?>">
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
    <select name="year" value="<?php echo $_GET['year']?>">
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
<a href="./student.php">Back</a>