<!DOCTYPE html>
<html>
<head>
    <title>PHP Decision-Making Structures</title>
</head>
<body>

<h2>PHP Decision-Making Control Structures</h2>

<form method="post">
    Enter a number (1 to 100): <input type="number" name="num" required>
    <input type="submit" value="Check">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = $_POST['num'];

    echo "<h3>Results:</h3>";

    // a. if statement
    echo "<strong>Using if statement:</strong><br>";
    if ($num > 0) {
        echo "$num is a positive number.<br>";
    }

    // b. if-else statement
    echo"<br><strong>Using if-else statement:</strong><br>";
    if ($num % 2 == 0) {
        echo "$num is even.<br>";
    } else {
        echo "$num is odd.<br>";
    }

    // c. switch statement
    echo "<br><strong>Using switch statement:</strong><br>";
    switch (true) {
        case ($num >= 90 && $num <= 100):
            echo "Grade: A<br>";
            break;
        case ($num >= 75 && $num < 90):
            echo "Grade: B<br>";
            break;
        case ($num >= 50 && $num < 75):
            echo "Grade: C<br>";
            break;
        case ($num >= 35 && $num < 50):
            echo "Grade: D<br>";
            break;
        default:
            echo "Grade: F (Fail or Invalid)<br>";
    }
}
?>

</body>
</html>