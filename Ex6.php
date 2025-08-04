<!DOCTYPE html>
<html>
<head>
    <title>PHP Arrays with User Input</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2, h3 {
            color: #333;
        }

        .form-section, .result-section {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        input[type="text"], input[type="number"] {
            padding: 8px;
            margin: 5px 0;
            width: 90%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .output {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            margin-top: 5px;
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>
<body>

<h2>PHP Arrays with User Input</h2>

<div class="form-section">
    <form method="POST">
        <h3>Enter 3 Colors (Indexed Array)</h3>
        <input type="text" name="color1" placeholder="Color 1" required><br>
        <input type="text" name="color2" placeholder="Color 2" required><br>
        <input type="text" name="color3" placeholder="Color 3" required><br>

        <h3>Student Details (Associative Array)</h3>
        <input type="text" name="sname" placeholder="Name" required><br>
        <input type="number" name="sage" placeholder="Age" required><br>
        <input type="text" name="sdept" placeholder="Department" required><br>

        <h3>Marks for 2 Students (Multidimensional Array)</h3>
        <strong>Student 1</strong><br>
        <input type="text" name="name1" placeholder="Name" required><br>
        <input type="number" name="math1" placeholder="Math Mark" required><br>
        <input type="number" name="sci1" placeholder="Science Mark" required><br>

        <strong>Student 2</strong><br>
        <input type="text" name="name2" placeholder="Name" required><br>
        <input type="number" name="math2" placeholder="Math Mark" required><br>
        <input type="number" name="sci2" placeholder="Science Mark" required><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    echo '<div class="result-section">';

    // a. Indexed Array
    echo "<h3>a. Indexed Array</h3>";
    $colors = [$_POST['color1'], $_POST['color2'], $_POST['color3']];
    echo "<div class='output'>Colors: ";
    print_r($colors);
    echo "</div>";

    // b. Associative Array
    echo "<h3>b. Associative Array</h3>";
    $student = [
        "name" => $_POST['sname'],
        "age" => $_POST['sage'],
        "department" => $_POST['sdept']
    ];
    echo "<div class='output'>";
    foreach ($student as $key => $value) {
        echo ucfirst($key) . ": " . htmlspecialchars($value) . "<br>";
    }
    echo "</div>";

    // c. Multidimensional Array
    echo "<h3>c. Multidimensional Array</h3>";
    $marks = [
        ["Name" => $_POST['name1'], "Math" => $_POST['math1'], "Science" => $_POST['sci1']],
        ["Name" => $_POST['name2'], "Math" => $_POST['math2'], "Science" => $_POST['sci2']]
    ];

    echo "<div class='output'>";
    foreach ($marks as $student) {
        echo "Student: " . htmlspecialchars($student["Name"]) . "<br>";
        echo "Math: " . $student["Math"] . ", Science: " . $student["Science"] . "<br><br>";
    }
    echo "</div>";

    echo '</div>';
}
?>

</body>
</html>
