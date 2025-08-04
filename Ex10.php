<?php
// Database Connection
$conn = mysqli_connect("localhost", "root", "", "student_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle Create
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    mysqli_query($conn, "INSERT INTO students (name, email, course) VALUES ('$name', '$email', '$course')");
    header("Location: " . $_SERVER['PHP_SELF']);
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM students WHERE id=$id");
    header("Location: " . $_SERVER['PHP_SELF']);
}

// Handle Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    mysqli_query($conn, "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id");
    header("Location: " . $_SERVER['PHP_SELF']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Single PHP CRUD App</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
        input[type="text"], input[type="email"] { width: 200px; }
    </style>
</head>
<body>

<h2>Student CRUD Application</h2>

<?php
// If editing
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    ?>
    <h3>Edit Student</h3>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        Name: <input type="text" name="name" value="<?= $row['name'] ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $row['email'] ?>" required><br><br>
        Course: <input type="text" name="course" value="<?= $row['course'] ?>" required><br><br>
        <input type="submit" name="update" value="Update Student">
    </form>
    <hr>
<?php } else { ?>
    <h3>Add New Student</h3>
    <form method="POST">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Course: <input type="text" name="course" required><br><br>
        <input type="submit" name="add" value="Add Student">
    </form>
    <hr>
<?php } ?>

<h3>Student List</h3>
<table>
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Actions</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM students");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['course']}</td>
                <td>
                    <a href='?edit={$row['id']}'>Edit</a> |
                    <a href='?delete={$row['id']}' onclick=\"return confirm('Delete this student?');\">Delete</a>
                </td>
            </tr>";
    }
    ?>
</table>

</body>
</html>
