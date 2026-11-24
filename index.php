<!DOCTYPE html>
<html>
    <head>
        <title>Students Grading System</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <div class= "container">
        <h1>Learners Exams Grading System</h1>
        <p>Enter student information and examination marks</p>

        <form action="process.php" method="POST">
            <label>Full Name: </label>
            <input type="text" name="student_name" required>

            <label>Index Number: </label>
            <input type="text" name="index_number" required>

            <h3>Enter Subject Marks</h3>

            <label>Mathematics: </label>
            <input type="number" name="mathematics" min="0" max="100" required>

            <label>English: </label>
            <input type="number" name="english" min="0" max="100" required>

            <label>Social Studies: </label>
            <input type="number" name="social_studies" min="0" max="100" required>

            <label>Science: </label>
            <input type="number" name="science" min="0" max="100" required>

            <button type="submit" name="submit">Calculate Results</button>
        </form>
    </div>
</html>