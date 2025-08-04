<!DOCTYPE html>
<html>
<head>
    <title>PHP User-Defined Functions Demo</title>
</head>
<body>

<h2>Perform Tasks Using PHP User-Defined Functions</h2>

<form method="post">
    Enter a number: <input type="number" name="num" required><br><br>
    Enter a string: <input type="text" name="text" required><br><br>
    <input type="submit" value="Perform Tasks">
</form>

<?php
// User-defined function to check prime
function isPrime($n) {
    if ($n <= 1) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

// User-defined function to find factorial
function factorial($n) {
    if ($n == 0 || $n == 1) return 1;
    return $n * factorial($n - 1);
}

// User-defined function to reverse a string
function reverseString($str) {
    return strrev($str);
}

// User-defined function to calculate sum of digits
function sumOfDigits($n) {
    $sum = 0;
    while ($n > 0) {
        $sum += $n % 10;
        $n = (int)($n / 10);
    }
    return $sum;
}

// Handle form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['num'];
    $string = $_POST['text'];

    echo "<h3>Results:</h3>";

    echo "<strong>1. Prime Check:</strong> ";
    echo isPrime($number) ? "$number is a Prime Number<br>" : "$number is Not a Prime Number<br>";

    echo "<strong>2. Factorial:</strong> ";
    echo "Factorial of $number is " . factorial($number) . "<br>";

    echo "<strong>3. String Reversal:</strong> ";
    echo "Reverse of '$string' is '" . reverseString($string) . "'<br>";

    echo "<strong>4. Sum of Digits:</strong> ";
    echo "Sum of digits in $number is " . sumOfDigits($number) . "<br>";
}
?>

</body>
</html>
