<?php
include("../php/connection.php");
if (isset($_POST['submit'])) {
    $server   = "localhost";
    $user     = "root";
    $password = "";
    $database = "project";
    $conn     = mysqli_connect($server, $user, $password, $database);

    $admin_sql = "INSERT INTO `admin` (`username`, `email`, `password`)
    VALUES ('$_POST[username]', '$_POST[email]', '$_POST[password]')";
    $admin_query = mysqli_query($conn, $admin_sql);
    if ($admin_query) {
        echo ("<script>alert('User Created!')</script>");
        header("Location: ../php/login.php");
    } else {
        echo ("<script>alert('User Creation Failed!')</script>");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="../icons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../icons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../icons/favicon-16x16.png" />
    <link rel="manifest" href="../icons/site.webmanifest" />
    <link rel="stylesheet" href="../css/user.css">
    <title>Signup</title>
</head>
<body>
    <div class="main">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="username">Username: </label><input type="text" name="username">
        <label for="email">Email: </label><input type="email" name="email">
        <label for="password">Password: </label><input type="password" name="password">
        <input type="submit" name="submit" id="submit">
    </form>
    <span title="Sign Up!"><a href="../php/signup.php"  id="signup">New User?</a></span>
    </div>
</body>
</html>