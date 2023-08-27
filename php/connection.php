<?php

$server   = "localhost";
$user     = "root";
$password = "";
$database = "project";

$conn_nodb = mysqli_connect(
    $server,
    $user,
    $password
);
if (!$conn_nodb)
    echo ("<script>alert('Server Connection Error!')</script>");
$createdb_sql   = "CREATE DATABASE IF NOT EXISTS project";
$createdb_query = mysqli_query(
    $conn_nodb,
    $createdb_sql
);

$conn = mysqli_connect(
    $server,
    $user,
    $password,
    $database
);
if (!$conn)
    echo ("<script>alert('Database Connection Error!')</script>");

$create_table_sql   = "
CREATE TABLE IF NOT EXISTS `patient`( 
    report_id integer auto_increment primary key not null,
    name varchar(50),
    age integer,
    sex varchar(6),
    referred_by varchar(50),
    recieved_on date,
    report_on date,
    specimen varchar(50)
);

CREATE TABLE IF NOT EXISTS `biochem`(
    biochem_id integer auto_increment primary key,
    report_id integer ,
    sugar_fasting varchar(20),
    sugar_pp varchar(20),
    sugar_random varchar(20),
    uric_acid varchar(20),
    serum_amylase varchar(20),
    calcium varchar(20),
    phosphorus varchar(20),
    micro_albumin varchar(20),
    hba1c varchar(20),
    foreign key (report_id) REFERENCES patient(report_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `stool_re`(
    stool_id integer primary key auto_increment,
    report_id integer,
    color varchar(20),
    consistency varchar(20),
    helmintegerhic_parasite varchar(20),
    protozoa_parasite varchar(20),
    undigested_food varchar(10),
    mucus varchar(20),
    pus_cell varchar(20),
    rbc varchar(20),
    foreign key (report_id) REFERENCES patient(report_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `urine_re`(
    urine_id integer primary key auto_increment,
    report_id integer,
    color varchar(20),
    transparency varchar(20),
    reaction varchar(20),
    albumin varchar(20),
    sugar varchar(20),
    chile varchar(20),
    bile_pigment varchar(20),
    urobilinogen varchar(20),
    bile_salt varchar(20),
    rbc varchar(20),
    pus_cell varchar(20),
    epithelial_cell varchar(20),
    ketone_body varchar(20),
    casts varchar(20),
    ua_crystals varchar(20),
    urates varchar(20),
    t_vaginalis varchar(20),
    foreign key (report_id) REFERENCES patient(report_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `hematology`(
    hematology_id integer auto_increment primary key,
    report_id integer,
    wbc varchar(20),
    neutrophil varchar(20),
    lymphocyte varchar(20),
    monocyte varchar(20),
    eosinophil varchar(20),
    basophil varchar(20),
    esr varchar(20),
    hemoglobin varchar(20),
    platelets varchar(30),
    bt varchar(20),
    ct varchar(20),
    pcv varchar(20),
    malaria_parasite varchar(20),
    pt varchar(20),
    control varchar(20),
    inr varchar(20),
    aptt varchar(20),
    blood_group varchar(20),
    rbc varchar(20),
    mcv varchar(20),
    mchc varchar(20),
    mch varchar(20),
    reticulocyte varchar(20),
    foreign key(report_id) REFERENCES patient(report_id) ON DELETE CASCADE
);";
$create_table_query = mysqli_multi_query($conn, $create_table_sql);
if (!$create_table_query)
    echo ("<script>alert('Table Creation Error!')</script>");

?>