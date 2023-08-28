<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:../php/login.php");
}
?>

<?php
$server   = "localhost";
$user     = "root";
$password = "";
$database = "project";
$conn = mysqli_connect( $server, $user, $password, $database );
$read_sql = "SELECT * FROM patient";
$read_query = mysqli_query($conn, $read_sql);
if(isset($_GET['report_id'])){
    $id = $_GET['report_id'];
    $del_sql = "
        DELETE FROM `patient` WHERE `report_id` = '$id'
    ";

    $del_query = mysqli_query($conn, $del_sql);
    if(!$del_query){
        die("Unable to delete data!");
    }else{
        echo("Deleted Succesfully!");
        header("Location: ../index.php");
    }
}else{echo("Something went wrong!");}

?>