<?php
session_start();

// Handle login
if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';

    // Save to session
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    // Save to cookie (expires in 1 hour)
    setcookie('username', $username, time() + 3600);
    setcookie('email', $email, time() + 3600);

    header("Location: Ex9.php");
    exit();
}

// Handle logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    // Clear cookies
    setcookie('username', '', time() - 3600);
    setcookie('email', '', time() - 3600);

    header("Location: Ex9.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Session and Cookie Management</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .box {
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0px 0px 5px #aaa;
        }

        input[type="text"], input[type="email"] {
            padding: 10px;
            width: 95%;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        a.logout {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="box">
    <?php if (isset($_SESSION['username'])): ?>
        <h3>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h3>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>

        <p><strong>Stored in Cookies:</strong><br>
            Username: <?php echo $_COOKIE['username'] ?? 'Not Set'; ?><br>
            Email: <?php echo $_COOKIE['email'] ?? 'Not Set'; ?>
        </p>

        <a href="?logout=true" class="logout">Logout</a>
    <?php else: ?>
        <h3>Login Form</h3>
        <form method="POST">
            <input type="text" name="username" placeholder="Enter Username" required><br>
            <input type="email" name="email" placeholder="Enter Email" required><br>
            <input type="submit" name="login" value="Login">
        </form>
    <?php endif; ?>
</div>

</body>
</html>
