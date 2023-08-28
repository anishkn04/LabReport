<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="widh5=device-widh5, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="../icons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../icons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../icons/favicon-16x16.png" />
    <link rel="manifest" href="../icons/site.webmanifest" />
    <title>View All Reports</title>
    <link rel="stylesheet" href="../css/viewreport.css" />
</head>

<body>
    <?php include "../php/navbar.php";
    include("../php/connection.php");
    $server   = "localhost";
    $user     = "root";
    $password = "";
    $database = "project";
    $conn = mysqli_connect( $server, $user, $password, $database );
    $read_sql = "SELECT * FROM patient";
    $read_query = mysqli_query($conn, $read_sql);
    ?>
    <main>
        <div class="row">
            <h5>Patient ID</h5>
            <h5>Patient Name</h5>
            <h5>Patient Age</h5>
            <h5>Patient Sex</h5>
            <h5>Referred By</h5>
            <h5>Received Date</h5>
            <h5>Report Date</h5>
            <h5>Action</h5>
        <?php 
        if(mysqli_num_rows($read_query)>0){
            while($row = mysqli_fetch_assoc($read_query)){
        ?>
            <span><?php echo($row['report_id']); ?></span>
            <span><?php echo($row['name']); ?></span>
            <span><?php echo($row['age']); ?></span>
            <span><?php echo($row['sex']); ?></span>
            <span><?php echo($row['referred_by']); ?></span>
            <span><?php echo($row['received_on']); ?></span>
            <span><?php echo($row['report_on']); ?></span>
            <span>
                <a class="table_link" href="#">View Report</a>
                <a class="table_link" href="#">Delete</a>
            </span>
        <?php }
        }else{
            echo("No Data added yet!");
        } ?>
    </div>
    </main>
</body>
</html>