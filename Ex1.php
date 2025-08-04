<!DOCTYPE html>
<html>
<head>
    <title>PHP Operator Evaluation</title>
</head>
<body>

<h2>Operator Evaluation in PHP</h2>

<form method="post">
    Enter First Number: <input type="number" name="num1" required><br><br>
    Enter Second Number: <input type="number" name="num2" required><br><br>
    <input type="submit" value="Evaluate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST['num1'];
    $b = $_POST['num2'];

    echo "<h3>Results:</h3>";

    echo "<strong>Arithmetic Operators:</strong><br>";
    echo "$a + $b = " . ($a + $b) . "<br>";
    echo "$a - $b = " . ($a - $b) . "<br>";
    echo "$a * $b = " . ($a * $b) . "<br>";
    echo "$a / $b = " . ($b != 0 ? $a / $b : "undefined (division by zero)") . "<br>";
    echo "$a % $b = " . ($b != 0 ? $a % $b : "undefined (mod by zero)") . "<br><br>";

    echo "<strong>Relational Operators:</strong><br>";
    echo "$a == $b : " . ($a == $b ? "True" : "False") . "<br>";
    echo "$a != $b : " . ($a != $b ? "True" : "False") . "<br>";
    echo "$a > $b : " . ($a > $b ? "True" : "False") . "<br>";
    echo "$a < $b : " . ($a < $b ? "True" : "False") . "<br>";
    echo "$a >= $b : " . ($a >= $b ? "True" : "False") . "<br>";
    echo "$a <= $b : " . ($a <= $b ? "True" : "False") . "<br><br>";

    echo "<strong>Assignment Operators:</strong><br>";
    $x = $a;
    $x += $b;
    echo "x = $a; x += $b → $x<br>";
    $x = $a;
    $x -= $b;
    echo "x = $a; x -= $b → $x<br>";
    $x = $a;
    $x *= $b;
    echo "x = $a; x *= $b → $x<br>";
    $x = $a;
    if ($b != 0) {
        $x /= $b;
        echo "x = $a; x /= $b → $x<br>";
    } else {
        echo "x = $23a; x /= $b → undefined (division by zero)<br>";
    }
    echo "<br>";

    echo "<strong>Unary Operators:</strong><br>";
    echo "+a = " . (+$a) . "<br>";
    echo "-a = " . (-$a) . "<br>";
    echo "++a = " . (++$a) . "<br>";
    echo "--b = " . (--$b) . "<br><br>";

    echo "<strong>Logical Operators:</strong><br>";
    echo "($a > 0 && $b > 0) = " . (($a > 0 && $b > 0) ? "True" : "False") . "<br>";
    echo "($a > 0 || $b > 0) = " . (($a > 0 || $b > 0) ? "True" : "False") . "<br>";
    echo "!($a > 0) = " . (!($a > 0) ? "True" : "False") . "<br><br>";

    echo "<strong>Shift Operators:</strong><br>";
    echo "$a << 1 = " . ($a << 1) . "<br>";
    echo "$a >> 1 = " . ($a >> 1) . "<br>";
}
?>

</body>
</html>