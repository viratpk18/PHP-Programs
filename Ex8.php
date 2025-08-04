<!DOCTYPE html>
<html>
<head>
    <title>PHP Form with Regex Validation</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background: #f4f4f4;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 10px;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }

        .error {
            color: red;
            font-size: 0.9em;
        }

        .success {
            color: green;
            font-size: 1em;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2 align="center">User Registration Form (RegEx Validation)</h2>

<?php
$name = $email = $phone = $password = "";
$nameErr = $emailErr = $phoneErr = $passErr = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty($_POST["name"]) || !preg_match("/^[a-zA-Z ]+$/", $_POST["name"])) {
        $nameErr = "Name must contain only letters and spaces.";
    } else {
        $name = htmlspecialchars($_POST["name"]);
    }

    // Validate Email
    if (empty($_POST["email"]) || !preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,6}$/", $_POST["email"])) {
        $emailErr = "Invalid email format.";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    // Validate Phone
    if (empty($_POST["phone"]) || !preg_match("/^[0-9]{10}$/", $_POST["phone"])) {
        $phoneErr = "Phone must be 10 digits.";
    } else {
        $phone = $_POST["phone"];
    }

    // Validate Password
    $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/";
    if (empty($_POST["password"]) || !preg_match($passwordPattern, $_POST["password"])) {
        $passErr = "Password must include uppercase, lowercase, number, special character (min 6 chars).";
    } else {
        $password = $_POST["password"];
    }

    // All Valid
    if ($nameErr == "" && $emailErr == "" && $phoneErr == "" && $passErr == "") {
        $success = true;
    }
}
?>

<form method="post">
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error"><?php echo $nameErr; ?></span><br>

    Email: <input type="email" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span><br>

    Phone: <input type="tel" name="phone" value="<?php echo $phone; ?>">
    <span class="error"><?php echo $phoneErr; ?></span><br>

    Password: <input type="password" name="password">
    <span class="error"><?php echo $passErr; ?></span><br>

    <input type="submit" value="Register">
</form>

<?php
if ($success) {
    echo "<p class='success'>Form submitted successfully! ✅</p>";
    echo "<p><strong>Details:</strong><br>Name: $name<br>Email: $email<br>Phone: $phone</p>";
}
?>

</body>
</html>
