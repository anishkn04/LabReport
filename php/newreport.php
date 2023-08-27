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
    <title>Create New Report</title>
    <link rel="stylesheet" href="../css/newreport.css" />
</head>

<body>
    <?php include "../php/navbar.php" ?>
    <main>
        <div class="report">
            <form id="reportform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="demo">
                    <label for="name" class="d_label">Name: </label><input type="text" name="name" id="name" />
                    <label for="lab_no" class="d_label">Lab Number: </label><input type="number" name="lab_no"
                        id="lab_no" />
                    <label for="age" class="d_label">Age: </label><input type="text" name="age" id="age" />
                    <label for="rec_on" class="d_label">Received on: </label><input type="date" name="rec_on"
                        id="rec_on" />
                    <label for="sex" class="d_label">Sex: </label>
                    <select name="sex" id="sex">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="">None</option>
                    </select>
                    <label for="rep_on" class="d_label">Report on: </label><input type="date" name="rep_on"
                        id="rep_on" />
                    <label for="ref_by" class="d_label">Referred By:
                    </label>
                    <select name="ref_by" id="ref_by">
                        <option value="Self">Self</option>
                        <option value="PlaceHolder 1" Pathology Tests>PH1</option>
                        <option value="PlaceHolder 2">PH2</option>
                        <option value="PlaceHolder 3">PH3</option>
                        <option value="PlaceHolder 4">PH4</option>
                        <option value="PlaceHolder 5">PH5</option>
                    </select>
                    <label for="specimen" class="d_label">Specimen: </label>
                    <div class="specimen-boxes">
                        <input type="checkbox" name="specimen[]" id="blood_s" value="blood" /><label
                            for="blood">Blood</label>
                        <input type="checkbox" name="specimen[]" id="urine_s" value="urine" /><label
                            for="urine">Urine</label>
                        <input type="checkbox" name="specimen[]" id="stool_s" value="stool" /><label
                            for="stool">Stool</label>
                    </div>
                </div>
                <div class="choices">
                    <label for="c_biochem">Biochemistry Test</label><input name="test_list" type="checkbox" id="c_biochem"
                        onclick="hide(id)" />
                    <label for="c_stool">Stool RE</label><input name="test_list" type="checkbox" id="c_stool" onclick="hide(id)" />
                    <label for="c_urine">Urine RE</label><input name="test_list" type="checkbox" id="c_urine" onclick="hide(id)" />
                    <label for="c_hematology">Hematology Test</label><input name="test_list" type="checkbox" id="c_hematology"
                        onclick="hide(id)" />
                </div>
                <div class="reports">
                    <div id="biochem" hidden>
                        <h2>Biochemistry Test:</h2>
                        <h2>Result:</h2>
                        <h2>Reference Value:</h2>
                        <label for="">Blood Glucose(F)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value">70-110 mg/dl</text>
                        <label for="">Blood Glucose(PP)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Blood Glucose(R)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Uric Acid</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Amylase</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Calcium</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Phosphorus</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Urine Micro-Albumin</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Glycosylated Hb(HbA1C)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                    </div>
                    <div id="stool">
                        <h2>Biochemistry Test:</h2>
                        <h2>Result:</h2>
                        <h2>Reference Value:</h2>
                        <label for="">Blood Glucose(F)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Blood Glucose(PP)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Blood Glucose(R)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Uric Acid</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Amylase</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Calcium</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Phosphorus</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Urine Micro-Albumin</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Glycosylated Hb(HbA1C)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                    </div>
                    <div id="urine">
                        <h2>Biochemistry Test:</h2>
                        <h2>Result:</h2>
                        <h2>Reference Value:</h2>
                        <label for="">Blood Glucose(F)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Blood Glucose(PP)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Blood Glucose(R)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Uric Acid</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Amylase</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Calcium</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Phosphorus</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Urine Micro-Albumin</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Glycosylated Hb(HbA1C)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                    </div>
                    <div id="hematology">
                        <h2>Biochemistry Test:</h2>
                        <h2>Result:</h2>
                        <h2>Reference Value:</h2>
                        <label for="">Blood Glucose(F)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Blood Glucose(PP)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Blood Glucose(R)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Uric Acid</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Amylase</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Calcium</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Serum Phosphorus</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Urine Micro-Albumin</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                        <label for="">Glycosylated Hb(HbA1C)</label><span><input type="text" class="data_input" name=""
                                id="" />mg/dl</span>
                        <text class="ref_value"></text>
                    </div>
                </div>
                <input type="submit" name="submit" value="Submit" id="submit">
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>

<?php

include("../php/connection.php")

?>