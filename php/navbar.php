<head>
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<nav>
    <div class="heading" onclick="window.location.href = '../index.php'"><img style="height: 3em;" src="../images/website-logo.png"></div>
    <div class="heading" onclick="window.location.href = '../index.php'">Lab Report Management System</div>
    <ul class="nav-items">
        <li class="nav-item" id="nav-item-1"><a href="../index.php" class="nav-anchor">Home</a></li>
        <li class="nav-item" id="nav-item-2"><a href="../php/newreport.php" class="nav-anchor">New Report</a></li>
        <li class="nav-item" id="nav-item-3"><a href="../php/viewreport.php" class="nav-anchor">View Reports</a></li>
        <li class="nav-item" id="nav-item-4"><a href="../php/aboutus.php" class="nav-anchor">About Us</a></li>
    </ul>
    <?php
    session_start();
    if(!isset($_SESSION['username'])){
        echo("<a id='button' href='../php/login.php'>Login</a>");
    }else{
        echo("<a id='button' href='../php/admin.php'>Admin</a>
        <a id='button' href='../php/logout.php'>Logout</a>");
    }?>
</nav>