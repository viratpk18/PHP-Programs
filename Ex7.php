<!DOCTYPE html>
<html>
<head>
    <title>PHP Inheritance with User Input</title>
</head>
<body>

<h2>Enter Student Details</h2>

<form method="post" action="">
    Name: <input type="text" name="name" required><br><br>
    Age: <input type="number" name="age" required><br><br>
    Department: <input type="text" name="department" required><br><br>
    <input type="submit" value="Submit">
</form>

<hr>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $department = $_POST['department'];

    // a. Superclass
    class Person {
        public $name;
        public $age;

        public function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }

        public function showDetails() {
            echo "Name: " . htmlspecialchars($this->name) . "<br>";
            echo "Age: " . htmlspecialchars($this->age) . "<br>";
        }
    }

    // b. Subclass
    class Student extends Person {
        public $department;

        public function __construct($name, $age, $department) {
            parent::__construct($name, $age);
            $this->department = $department;
        }

        public function showStudent() {
            $this->showDetails();
            echo "Department: " . htmlspecialchars($this->department) . "<br>";
        }
    }

    // Create object and display
    $student = new Student($name, $age, $department);
    echo "<h3>Student Information:</h3>";
    $student->showStudent();
}
?>

</body>
</html>
