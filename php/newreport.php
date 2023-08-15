<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../icons/favicon-16x16.png">
    <link rel="manifest" href="../icons/site.webmanifest">
    <title>Create New Report</title>
    <link rel="stylesheet" href="../css/newreport.css">
</head>

<body>
    <?php include "../php/navbar.php" ?>
    <main>
    <div class="report">
        <form id="reportform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="demo">
                <label for="name" class="d_label">Name: </label><input type="text" name="name" id="name">
                <label for="age" class="d_label">Age: </label><input type="text" name="age" id="age">
                <label for="sex" class="d_label">Sex: </label>
                <select name="sex" id="sex">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="">None</option>
                </select>
                <label for="ref_by class="d_label">Referred By: </label>
                <select name="ref_by" id="ref_by">
                    <option value="Self">Self</option>
                    <option value="Chandra Brother's Medical Hall">CB</option>
                    <option value="Sayapatri Pharmacy">Sayapatri</option>
                    <option value="Bisso Santi Pharmacy">Bisso Santi</option>
                    <option value="Pratisma Pharmacy">Pratisma</option>
                    <option value="Panitanki">Panitanki</option>
                </select>
                <label for="lab_no" class="d_label">Lab Number: </label><input type="number" name="lab_no" id="lab_no">
                <label for="rec_on" class="d_label">Received on: </label><input type="date" name="rec_on" id="rec_on">
                <label for="rep_on" class="d_label">Report on: </label><input type="date" name="rep_on" id="rep_on">
                <label for="specimen" class="d_label">Specimen: </label>
                <div class="specimen-boxes">
                <input type="checkbox" name="specimen" id="blood" value="blood"><label for="blood">Blood</label>
                <input type="checkbox" name="specimen" id="urine" value="urine"><label for="urine">Urine</label>
                <input type="checkbox" name="specimen" id="stool" value="stool"><label for="stool">Sugar</label>
                </div>
            </div>
            <div class="choices">
                <label for="c_biochem">Biochemistry Test</label><input type="checkbox" id="c_biochem">
                <label for="c_rft">Renal Function Test</label><input type="checkbox" id="c_rft">
                <label for="c_lipid">Lipid Profile Test</label><input type="checkbox" id="c_lipid">
                <label for="c_lft">Liver Function Test</label><input type="checkbox" id="c_lft">
                <label for="c_cardiac">Cardiac Profile Test</label><input type="checkbox" id="c_cardiac">
                <label for="c_serology">Serology Test</label><input type="checkbox" id="c_serology">
                <label for="c_widal">Widal Test</label><input type="checkbox" id="c_widal">
                <label for="c_stool">Stool RE</label><input type="checkbox" id="c_stool">
                <label for="c_urine">Urine RE</label><input type="checkbox" id="c_urine">
                <label for="c_hematology">Hematology Test</label><input type="checkbox" id="c_hematology">
            </div>
            <div class="reports">
                <div id="biochem">
                    <h2>Biochemistry Test: </h2><h2>Result: </h2><h2>Reference Value: </h2>
                    <label for="">Blood Glucose(F)</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Blood Glucose(PP)</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Blood Glucose(R)</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Serum Uric Acid</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Serum Amylase</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Serum Calcium</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Serum Phosphorus</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Urine Micro-Albumin</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Glycosylated Hb(HbA1C)</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                </div>
                <div id="rft">
                    <h2>Biochemistry Test: </h2><h2>Result: </h2><h2>Reference Value: </h2>
                    <label for="">Blood Glucose(F)</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Blood Glucose(PP)</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Blood Glucose(R)</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Serum Uric Acid</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Serum Amylase</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Serum Calcium</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Serum Phosphorus</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Urine Micro-Albumin</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                    <label for="">Glycosylated Hb(HbA1C)</label><input type="text" name="" id="">
                    <text class="ref_value"></text>
                </div>
                <div id="id"></div>
                <div id="id"></div>
                <div id="id"></div>
                <div id="id"></div>
                <div id="id"></div>
                <div id="id"></div>
                <div id="id"></div>
                <div id="id"></div>
            </div>
        </form>
    </div>
    </main>
    <footer></footer>
</body>

</html>