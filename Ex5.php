<!DOCTYPE html>
<html>
<head>
    <title>PHP String Handling Operations</title>
</head>
<body>

<h2>PHP String Handling (With & Without Built-in Functions)</h2>

<form method="post">
    Enter a string: <input type="text" name="inputStr" required><br><br>
    <input type="submit" value="Process">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $str = $_POST['inputStr'];

    echo "<h3>Using Built-in Functions:</h3>";

    // 1. Length
    echo "Length: " . strlen($str) . "<br>";

    // 2. Reverse
    echo "Reverse: " . strrev($str) . "<br>";

    // 3. Count vowels
    $vowels = ['a','e','i','o','u','A','E','I','O','U'];
    $count = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $vowels)) {
            $count++;
        }
    }
    echo "Vowel Count: $count<br>";

    // 4. Palindrome
    $reversed = strrev($str);
    if ($str == $reversed) {
        echo "Palindrome: Yes<br>";
    } else {
        echo "Palindrome: No<br>";
    }

    echo "<h3>Without Using Built-in Functions:</h3>";

    // 1. Length
    function getLength($s) {
        $len = 0;
        while (isset($s[$len])) {
            $len++;
        }
        return $len;
    }

    echo "Length: " . getLength($str) . "<br>";

    // 2. Reverse
    function reverseString($s) {
        $rev = "";
        for ($i = getLength($s) - 1; $i >= 0; $i--) {
            $rev .= $s[$i];
        }
        return $rev;
    }

    $revStr = reverseString($str);
    echo "Reverse: " . $revStr . "<br>";

    // 3. Vowel Count
    function countVowels($s) {
        $vowels = "aeiouAEIOU";
        $count = 0;
        for ($i = 0; isset($s[$i]); $i++) {
            if (strpos($vowels, $s[$i]) !== false) {
                $count++;
            }
        }
        return $count;
    }

    echo "Vowel Count: " . countVowels($str) . "<br>";

    // 4. Palindrome
    if ($str == $revStr) {
        echo "Palindrome: Yes<br>";
    } else {
        echo "Palindrome: No<br>";
    }
}
?>

</body>
</html>
