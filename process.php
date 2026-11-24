<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect student information
    $student_name = trim($_POST["student_name"]);
    $index_number = trim($_POST["index_number"]);

    // Collect subject marks
    $mathematics = $_POST["mathematics"];
    $english = $_POST["english"];
    $science = $_POST["science"];
    $social_studies = $_POST["social_studies"];


    // Store marks in an array
    $marks = [
        "Mathematics" => $mathematics,
        "English Language" => $english,
        "Science" => $science,
        "Social Studies" => $social_studies,
    ];

    // Validate marks
    foreach ($marks as $subject => $mark) {
        if (!is_numeric($mark) || $mark < 0 || $mark > 100) {
            die("Invalid mark entered for " . $subject);
        }
    }

    // Calculate total
    $total = array_sum($marks);

    // Calculate average
    $average = $total / count($marks);

    // Determine grade
    if ($average >= 80) {
        $grade = "A";
        $remark = "Excellent";
    }
    elseif ($average >= 70) {
        $grade = "B";
        $remark = "Very Good";
    }
    elseif ($average >= 60) {
        $grade = "C";
        $remark = "Good";
    }
    elseif ($average >= 50) {
        $grade = "D";
        $remark = "Pass";
    }
    else {
        $grade = "F";
        $remark = "Fail";
    }

    // Determine final status
    $status = ($average >= 50) ? "PASS" : "FAIL";

} else {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Results</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h2>Student Examination Results</h2>

    <p><strong>Student Name:</strong>
        <?= htmlspecialchars($student_name) ?>
    </p>

    <p><strong>Index Number:</strong>
        <?= htmlspecialchars($index_number) ?>
    </p>

    <h3>Subject Results</h3>

    <table>
        <tr>
            <th>Subject</th>
            <th>Marks</th>
        </tr>

        <?php foreach ($marks as $subject => $mark): ?>
        <tr>
            <td><?= htmlspecialchars($subject) ?></td>
            <td><?= htmlspecialchars((string)$mark) ?></td>
        </tr>
        <?php endforeach; ?>

    </table>

    <h3>Performance Summary</h3>

    <p><strong>Total Marks:</strong> <?= $total ?>/500</p>

    <p><strong>Average:</strong>
        <?= number_format($average, 2) ?>%
    </p>

    <p><strong>Grade:</strong> <?= $grade ?></p>

    <p><strong>Remark:</strong> <?= $remark ?></p>

    <p><strong>Status:</strong> <?= $status ?></p>

    <a href="index.php">Enter Another Student</a>

</div>

</body>
</html>