<?php
session_start();
include("../php/connection.php");
if (isset($_POST['submit'])) {
    $server   = "localhost";
    $user     = "root";
    $password = "";
    $database = "project";
    $conn     = mysqli_connect($server, $user, $password, $database);

    $login_sql = "SELECT * FROM `admin` WHERE `username` = '$_POST[username]' AND `password` = '$_POST[password]'";
    $login_query = mysqli_query($conn, $login_sql);
    $login_row = mysqli_num_rows($login_query);#
    if ($login_row == 1) {
        echo ("<script>alert('Login Successful!')</script>");
        $_SESSION['username'] = $_POST['username'];
        echo($_SESSION['username']);
        header("Location: ../index.php");
    } else {
        echo ("<script>alert('Incorrect Username or Password!')</script>");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="../icons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../icons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../icons/favicon-16x16.png" />
    <link rel="manifest" href="../icons/site.webmanifest" />
    <link rel="stylesheet" href="../css/user.css">
    <title>Login</title>
</head>
<body>
    <div class="main">
    <form action="<?php echo($_SERVER['PHP_SELF']) ?>" method="POST">
        <label for="username">Username: </label><input type="text" name="username">
        <label for="password">Password: </label><input type="password" name="password">
        <input type="submit" name="submit" id="submit">
    </form>
    <span title="Sign Up!"><a href="../php/signup.php"  id="signup">New User?</a></span>
    </div>
</body>
</html>