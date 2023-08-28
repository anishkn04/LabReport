<?php
include("../php/connection.php");
$id        = $_GET['report_id'];
$sel_sql   = "SELECT * FROM `patients`
JOIN biochem ON patient.report_id=biochem.report_id
JOIN urine_re ON patient.report_id=urine_re.report_id
JOIN stool_re ON patient.report_id=stool_re.report_id
WHERE `report_id`='$id'";
$sel_query = mysqli_query($conn, $sel_sql);
$row       = mysqli_fetch_assoc($sel_query);
if (isset($_POST['update'])) {
    $server   = "localhost";
    $user     = "root";
    $password = "";
    $database = "project";
    $conn     = mysqli_connect($server, $user, $password, $database);

    $name      = $_POST['name'];
    $age       = (int) $_POST['age'];
    $report_id = (int) $_POST['report_id'];
    $sex       = $_POST['sex'];
    $rec_on    = $_POST['rec_on'];
    $rep_on    = $_POST['rep_on'];
    $ref_by    = $_POST['ref_by'];

    $sugar_fasting = $_POST['sugar_fasting'];
    $sugar_pp      = $_POST['sugar_pp'];
    $sugar_random  = $_POST['sugar_random'];
    $uric_acid     = $_POST['uric_acid'];
    $serum_amylase = $_POST['serum_amylase'];
    $calcium       = $_POST['calcium'];
    $phosphorus    = $_POST['phosphorus'];
    $micro_albumin = $_POST['micro_albumin'];
    $hba1c         = $_POST['hba1c'];

    $stool_color         = $_POST['stool_color'];
    $consistency         = $_POST['consistency'];
    $helminthic_parasite = $_POST['helminthic_parasite'];
    $protozoa_parasite   = $_POST['protozoa_parasite'];
    $undigested_food     = $_POST['undigested_food'];
    $mucus               = $_POST['mucus'];
    $stool_pus_cell      = $_POST['stool_pus_cell'];
    $stool_rbc           = $_POST['stool_rbc'];

    $urine_color     = $_POST['urine_color'];
    $transparency    = $_POST['transparency'];
    $reaction        = $_POST['reaction'];
    $albumin         = $_POST['albumin'];
    $sugar           = $_POST['sugar'];
    $chyle           = $_POST['chyle'];
    $bile_pigment    = $_POST['bile_pigment'];
    $urobilinogen    = $_POST['urobilinogen'];
    $bile_salt       = $_POST['bile_salt'];
    $urine_rbc       = $_POST['urine_rbc'];
    $urine_pus_cell  = $_POST['urine_pus_cell'];
    $epithelial_cell = $_POST['epithelial_cell'];
    $ketone_body     = $_POST['ketone_body'];
    $casts           = $_POST['casts'];
    $ua_crystals     = $_POST['ua_crystals'];
    $urates          = $_POST['urates'];
    $t_vaginalis     = $_POST['t_vaginalis'];

    $insert_sql1   = "INSERT INTO `patient`( `report_id`, `name`,`age`,`sex`,`referred_by`,`received_on`,`report_on`)
    VALUES('$report_id', '$name','$age','$sex', '$ref_by', '$rec_on', '$rep_on')";
    $insert_query1 = mysqli_query($conn, $insert_sql1);
    if (!$insert_query1)
        echo ("<script>alert('Barbaad!');</script>");

    $insert_sql2   = "INSERT INTO biochem ( report_id, sugar_fasting, sugar_pp, sugar_random, uric_acid, serum_amylase, calcium, phosphorus, micro_albumin, hba1c)
    VALUES ('$report_id', '$sugar_fasting', '$sugar_pp', '$sugar_random', '$uric_acid', '$serum_amylase', '$calcium', '$phosphorus', '$micro_albumin', '$hba1c' );";
    $insert_query2 = mysqli_query($conn, $insert_sql2);
    if (!$insert_query2)
        echo ("<script>alert('Barbaad!');</script>");

    $insert_sql4   = "INSERT INTO stool_re (report_id, stool_color, consistency, helminthic_parasite, protozoa_parasite, undigested_food, mucus, stool_pus_cell, stool_rbc
    )
    VALUES ('$report_id', '$stool_color', '$consistency', '$helminthic_parasite', '$protozoa_parasite', '$undigested_food', '$mucus', '$stool_pus_cell', '$stool_rbc'
    );";
    $insert_query4 = mysqli_query($conn, $insert_sql4);
    if (!$insert_query4)
        echo ("<script>alert('Barbaad!');</script>");
    $insert_sql5 = "INSERT INTO urine_re ( report_id, urine_color, transparency, reaction, albumin, sugar, chyle, bile_pigment, urobilinogen, bile_salt, urine_rbc, urine_pus_cell, epithelial_cell, ketone_body, casts, ua_crystals, urates, t_vaginalis
    )
    VALUES ('$report_id', '$urine_color', '$transparency', '$reaction', '$albumin', '$sugar', '$chyle', '$bile_pigment', '$urobilinogen', '$bile_salt', '$urine_rbc', '$urine_pus_cell', '$epithelial_cell', '$ketone_body', '$casts', '$ua_crystals', '$urates', '$t_vaginalis'
    );";

    $insert_query5 = mysqli_query($conn, $insert_sql5);
    if (!$insert_query5)
        echo ("<script>alert('Barbaad!');</script>");

    echo ("<script>alert('Successfull!');</script>");

    header("Location: ../index.php");
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
    <script src="../scripts/newreport.js"></script>
    <script src='../scripts/null.js'></script>
    <title>Create New Report</title>
    <link rel="stylesheet" href="../css/newreport.css" />
</head>

<body>
    <?php include "../php/navbar.php" ?>
    <main>
        <div class="report">
            <form id="reportform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="demo">
                    <label for="name" class="d_label">Name: </label><input type="text" name="name" id="name"
                        value="<?php echo ($row['name']) ?>" />
                    <label for="report_id" class="d_label">Lab No.: </label><input type="text" name="report_id"
                        id="report_id" value="<?php echo ($row['report_id']) ?>" />
                    <label for="age" class="d_label">Age: </label><input type="text" name="age" id="age"
                        value="<?php echo ($row['age']) ?>" />
                    <label for="rec_on" class="d_label">Received on: </label><input type="date" name="rec_on"
                        id="rec_on" value="<?php echo ($row['received_on']) ?>" />
                    <label for="sex" class="d_label">Sex: </label>
                    <select name="sex" id="sex">
                        <option value="Male" <?php if ($row['sex'] == "Male") {
                            echo ("selected");
                        } ?>>
                            Male</option>
                        <option value="Female" <?php if ($row['sex'] == "Female") {
                            echo ("selected");
                        } ?>>Female
                        </option>
                        <option value="" <?php if ($row['sex'] == "") {
                            echo ("selected");
                        } ?>>None
                        </option>
                    </select>
                    <label for="rep_on" class="d_label">Report on: </label><input type="date" name="rep_on" id="rep_on"
                        value="<?php echo ($row['report_on']) ?>" />
                    <label for="ref_by" class="d_label">Referred By:
                    </label>
                    <select name="ref_by" id="ref_by">
                        <option value="Self" <?php if ($row['referred_by'] == "Self") {
                            echo ("selected");
                        } ?>>Self
                        </option>
                        <option value="PlaceHolder 1" <?php if ($row['referred_by'] == "PlaceHolder 1") {
                            echo ("selected");
                        } ?>>PH1</option>
                        <option value="PlaceHolder 2" <?php if ($row['referred_by'] == "PlaceHolder 2") {
                            echo ("selected");
                        } ?>>PH2</option>
                        <option value="PlaceHolder 3" <?php if ($row['referred_by'] == "PlaceHolder 3") {
                            echo ("selected");
                        } ?>>PH3</option>
                        <option value="PlaceHolder 4" <?php if ($row['referred_by'] == "PlaceHolder 4") {
                            echo ("selected");
                        } ?>>PH4</option>
                        <option value="PlaceHolder 5" <?php if ($row['referred_by'] == "PlaceHolder 5") {
                            echo ("selected");
                        } ?>>PH5</option>
                    </select>
                    <!-- <label for="specimen[]" class="d_label">Specimen: </label>
                    <div class="specimen-boxes">
                        <input type="checkbox" name="specimen[]" id="blood_s" value="blood" /><label
                            for="blood">Blood</label>
                        <input type="checkbox" name="specimen[]" id="urine_s" value="urine" /><label
                            for="urine">Urine</label>
                        <input type="checkbox" name="specimen[]" id="stool_s" value="stool" /><label
                            for="stool">Stool</label>
                    </div> -->
                </div>
                <div class="choices">
                    <label for="c_biochem">Biochemistry Test</label><input name="test_list" type="checkbox"
                        id="c_biochem" onclick="hide(id)" />
                    <label for="c_stool">Stool RE</label><input name="test_list" type="checkbox" id="c_stool"
                        onclick="hide(id)" />
                    <label for="c_urine">Urine RE</label><input name="test_list" type="checkbox" id="c_urine"
                        onclick="hide(id)" />
                </div>
                <div class="reports">
                    <div id="biochem">
                        <h2>Biochemistry Test:</h2>
                        <h2>Result:</h2>
                        <h2>Reference Value:</h2>
                        <label for="sugar_fasting">Blood Glucose(F)</label><span><input type="text" class="data_input"
                                name="sugar_fasting" value="<?php echo ($row['sugar_fasting']) ?>" />mg/dl</span>
                        <text class="ref_value">70-110 mg/dl</text>
                        <label for="sugar_pp">Blood Glucose(PP)</label><span><input type="text" class="data_input" value="<?php echo ($row['sugar_pp']) ?>"
                                name="sugar_pp" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="sugar_random">Blood Glucose(R)</label><span><input value="<?php echo ($row['sugar_random']) ?>" type="text" class="data_input"
                                name="sugar_random" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="uric_acid">Serum Uric Acid</label><span><input type="text" class="data_input"
                                name="uric_acid" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="serum_amylase">Serum Amylase</label><span><input type="text" class="data_input"
                                name="serum_amylase" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="" calcium>Serum Calcium</label><span><input type="text" class="data_input"
                                name="calcium" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="phosphorus">Serum Phosphorus</label><span><input type="text" class="data_input"
                                name="phosphorus" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="micro_albumin">Urine Micro-Albumin</label><span><input type="text"
                                class="data_input" name="micro_albumin" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="ba1c">Glycosylated Hb(HbA1C)</label><span><input type="text" class="data_input"
                                name="hba1c" />mg/dl</span>
                        <text class="ref_value"></text>
                    </div>
                    <div id="stool">
                        <h2>Stool Routine Examination : </h2>
                        <h2>Result: </h2>
                        <h2>Reference Value: </h2>
                        <label for="stool_color">Color :</label><span><input type="text" class="data_input"
                                name="stool_color">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="consistency">Consistency:</label><span><input type="text" class="data_input"
                                name="consistency">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="helminthic_parasite">Helminthic
                            Parasite:</label><span><input type="text" class="data_input"
                                name="helminthic_parasite">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="protozoa_parasite">Protozoa Parasite:</label><span><input type="text"
                                class="data_input" name="protozoa_parasite">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="undigested_food">Undigested Food
                            Particles:</label><span><input type="text" class="data_input"
                                name="undigested_food">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="mucus">Mucus: </label><span><input type="text" class="data_input"
                                name="mucus">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="stool_pus_cell">Pus Cell:</label><span><input type="text" class="data_input"
                                name="stool_pus_cell">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="stool_rbc">RBC:</label><span><input type="text" class="data_input"
                                name="stool_rbc">mg/dl</span>
                        <text class="ref_value"></text>

                    </div>
                    <div id="urine">
                        <h2>Urine Routine Examination: </h2>
                        <h2>Result: </h2>
                        <h2>Reference Value: </h2>
                        <label for="urine_color">Color: Light Yellow</label><span><input type="text" class="data_input"
                                name="urine_color">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="transparency">Transparency: Clear</label><span><input type="text" class="data_input"
                                name="transparency">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="reaction">Reaction: Acidic</label><span><input type="text" class="data_input"
                                name="reaction">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="albumin">Albumin: Nil</label><span><input type="text" class="data_input"
                                name="albumin">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="sugar">Sugar: Nil</label><span><input type="text" class="data_input"
                                name="sugar">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="chyle">Chyle:</label><span><input type="text" class="data_input"
                                name="chyle">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="bile_pigment">Bile Pigment:</label><span><input type="text" class="data_input"
                                name="bile_pigment">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="urobilinogen">Urobilinogen:</label><span><input type="text" class="data_input"
                                name="urobilinogen">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="bile_salt">Bile Salt:</label><span><input type="text" class="data_input"
                                name="bile_salt">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="urine_rbc">RBC:</label><span><input type="text" class="data_input"
                                name="urine_rbc">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="urine_pus_cell">Pus Cell:</label><span><input type="text" class="data_input"
                                name="urine_pus_cell">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="epithelial_cell">Epithelial Cell:</label><span><input type="text" class="data_input"
                                name="epithelial_cell">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="ketone_body">Ketone Body:</label><span><input type="text" class="data_input"
                                name="ketone_body">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="casts">Casts:</label><span><input type="text" class="data_input"
                                name="casts">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="ua_crystals">U/A Crystals:</label><span><input type="text" class="data_input"
                                name="ua_crystals">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="urates">Urates:</label><span><input type="text" class="data_input"
                                name="urates">mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="t_vaginalis">T. Vaginalis:</label><span><input type="text" class="data_input"
                                name="t_vaginalis">mg/dl</span>
                        <text class="ref_value"></text>
                    </div>
                </div>
                <input type="submit" name="update" value="Update" id="submit" onclick=nullCheck()>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>