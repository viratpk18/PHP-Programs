<!DOCTYPE html>
<html>
<head>
    <title>PHP Looping Structures</title>
</head>
<body>

<h2>PHP Looping Structures Demo</h2>

<?php
echo "<h3>a. While Loop (Print 1 to 5)</h3>";
$i = 1;
while ($i <= 5) {
    echo "Number: $i <br>";
    $i++;
}

echo "<h3>b. Do-While Loop (Print 6 to 10)</h3>";
$j = 6;
do {
    echo "Number: $j <br>";
    $j++;
} while ($j <= 10);

echo "<h3>c. For Loop (Print 11 to 15)</h3>";
for ($k = 11; $k <= 15; $k++) {
    echo "Number: $k <br>";
}

echo "<h3>d. Foreach Loop (Display items in an array)</h3>";
$fruits = array("Apple", "Banana", "Orange", "Mango");
foreach ($fruits as $fruit) {
    echo "Fruit: $fruit <br>";
}
?>

</body>
</html>
