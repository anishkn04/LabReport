<?php
include("../php/connection.php");
if (isset($_POST['submit'])) {
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
	foreach ($_POST['specimen'] as $specimen) {
		$specimen = $specimen . "-";
	}

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

	$insert_sql1   = "INSERT INTO `patient`( `report_id`, `name`,`age`,`sex`,`referred_by`,`received_on`,`report_on`, `specimen`)
	VALUES('$report_id', '$name','$age','$sex', '$ref_by', '$rec_on', '$rep_on', '$specimen')";
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
	<title>Create New Report</title>
	<link rel="stylesheet" href="../css/newreport.css" />
</head>

<body>
	<?php include "../php/navbar.php";
	if (!isset($_SESSION['username'])) {
		header("Location:../php/login.php");
	}
	?>
	<main>
		<div class="report">
			<form id="reportform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="demo">
					<label for="name" class="d_label">Name: </label><input type="text" name="name" id="name" />
					<label for="report_id" class="d_label">Lab No.: </label><input type="text" name="report_id"
						id="report_id" />
					<label for="age" class="d_label">Age: </label><input type="text" name="age" id="age" />
					<label for="rec_on" class="d_label">Received on: </label><input type="date" name="rec_on" value=""
						id="rec_on" onchange="changeMin()" />
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
					<label for="specimen[]" class="d_label">Specimen: </label>
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
					<label for="c_biochem">Biochemistry Test</label><input name="test_list" type="checkbox"
						id="c_biochem" onclick="hide(id)" />
					<label for="c_rft">RFT</label><input name="test_list" type="checkbox" id="c_rft"
						onclick="hide(id)" />
					<label for="c_lipid">Lipid Profile Test</label><input name="test_list" type="checkbox" id="c_lipid"
						onclick="hide(id)" />
					<label for="c_lft">LFT</label><input name="test_list" type="checkbox" id="c_lft"
						onclick="hide(id)" />
					<label for="c_cardiac">Cardiac Profile Test</label><input name="test_list" type="checkbox"
						id="c_cardiac" onclick="hide(id)" />
					<label for="c_serology">Serology Test</label><input name="test_list" type="checkbox" id="c_serology"
						onclick="hide(id)" />
					<label for="c_widal">Widal Test</label><input name="test_list" type="checkbox" id="c_widal"
						onclick="hide(id)" />
					<label for="c_urine">Urine RE</label><input name="test_list" type="checkbox" id="c_urine"
						onclick="hide(id)" />
					<label for="c_stool">Stool RE</label><input name="test_list" type="checkbox" id="c_stool"
						onclick="hide(id)" />
					<label for="c_hematology">Hematology</label><input name="test_list" type="checkbox"
						id="c_hematology" onclick="hide(id)" />
				</div>
				<div class="reports">
					<div id="biochem" hidden>
						<h2>Biochemistry Test:</h2>
						<h2>Result:</h2>
						<h2>Reference Value:</h2>
						<label for="sugar_fasting">Blood Glucose(F)</label>
						<span><input type="text" class="data_input" name="sugar_fasting" />mg/dl</span>
						<text class="ref_value">(70-110 mg/dl)</text>

						<label for="sugar_pp">Blood Glucose(PP)</label>
						<span><input type="text" class="data_input" name="sugar_pp" />mg/dl</span>
						<text class="ref_value">(70-140 mg/dl)</text>

						<label for="sugar_random">Blood Glucose(R)</label>
						<span><input type="text" class="data_input" name="sugar_random" />mg/dl</span>
						<text class="ref_value">(70-140 mg/dl)</text>

						<label for="uric_acid">Serum Uric Acid</label>
						<span><input type="text" class="data_input" name="uric_acid" />mg/dl</span>
						<text class="ref_value">(3-7 mg/dl)</text>

						<label for="serum_amylase">Serum Amylase</label>
						<span><input type="text" class="data_input" name="serum_amylase" />mg/dl</span>
						<text class="ref_value">(<100 U/l)</text>

								<label for="" calcium>Serum Calcium</label>
								<span><input type="text" class="data_input" name="calcium" />mg/dl</span>
								<text class="ref_value">(8-11 mg/dl)</text>

								<label for="phosphorus">Serum Phosphorus</label>
								<span><input type="text" class="data_input" name="phosphorus" />mg/dl</span>
								<text class="ref_value">(2.5-5.0 mg/dl)</text>

								<label for="micro_albumin">Urine Micro-Albumin</label>
								<span><input type="text" class="data_input" name="micro_albumin" />mg/dl</span>
								<text class="ref_value">(0-25 mg/dl)</text>

								<label for="ba1c">Glycosylated Hb(HbA1C)</label>
								<span><input type="text" class="data_input" name="hba1c" />mg/dl</span>
								<text class="ref_value"> (&lt;8%)</text>
					</div>
					<div id="rft" hidden>
						<h2>Renal Function Test</h2>
						<h2>Result</h2>
						<h2>Reference Value</h2>
						<label for="blood_urea">Blood Urea</label>
						<span><input type="text" class="data_input" name="blood_urea" />mg/dl</span>
						<text class="ref_value">(13-43 mg/dl)</text>

						<label for="serum_creatinine">Serum Creatinine</label>
						<span><input type="text" class="data_input" name="serum_creatinine" />mg/dl</span>
						<text class="ref_value">(0.4-1.5 mg/dl)</text>

						<label for="bun">BUN(Blood Urea Nitrogen)</label>
						<span><input type="text" class="data_input" name="bun" />mg/dl</span>
						<text class="ref_value">(8-24mg/dl)</text>

						<label for="sodium">Sodium(Na+)</label>
						<span><input type="text" class="data_input" name="sodium" />mmol/l</span>
						<text class="ref_value">(135-145mmol/l)</text>

						<label for="potassium">Potassium(K+)</label>
						<span><input type="text" class="data_input" name="potassium" />mmol/l</span>
						<text class="ref_value">(3.5-5.0mmol/l)</text>
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
					<div id="lipid" hidden>
						<h2>Lipid Profile Test</h2>
						<h2>Result</h2>
						<h2>Reference Value</h2>
						<label for="serum_cholesterol">Serum Cholesterol</label>
						<span><input type="text" class="data_input" name="serum_cholesterol" />mg/dl</span>
						<text class="ref_value">(100-200mg/dl)</text>

						<label for="serum_triglyceride">Serum Triglyceride</label>
						<span><input type="text" class="data_input" name="serum_triglyceride" />mg/dl</span>
						<text class="ref_value">(60-160mg/dl)</text>

						<label for="hdl_cholesterol">HDL-Cholesterol</label>
						<span><input type="text" class="data_input" name="hdl_cholesterol" />mg/dl</span>
						<text class="ref_value">(35-65mg/dl)</text>

						<label for="ldl_cholesterol">LDL-Cholesterol</label>
						<span><input type="text" class="data_input" name="ldl_cholesterol" />mg/dl</span>
						<text class="ref_value">(<150mg /dl)</text>

								<label for="vldl_cholesterol">VLDL-Cholesterol</label>
								<span><input type="text" class="data_input" name="vldl_cholesterol" />mg/dl</span>
								<text class="ref_value">(<50mg /dl)</text>
					</div>
					<div id="lft" hidden>
						<h2>Liver Function Test</h2>
						<h2>Result</h2>
						<h2>Reference Value</h2>
						<label for="total_protein">Total Protein</label>
						<span><input type="text" class="data_input" name="total_protein" />g/dl</span>
						<text class="ref_value">(6.0-7.8g/dl)</text>

						<label for="albumin">Albumin</label>
						<span><input type="text" class="data_input" name="albumin" />g/dl</span>
						<text class="ref_value">(3.4-4.8g/dl)</text>

						<label for="globulin">Globulin</label>
						<span><input type="text" class="data_input" name="globulin" />g/dl</span>
						<text class="ref_value">(3-5g/dl)</text>

						<label for="ag_ratio">AG Ratio</label>
						<span><input type="text" class="data_input" name="ag_ratio" />(0.8-2.0)</span>

						<label for="serum_bilirubin_total">Serum Bilirubin (Total)</label>
						<span><input type="text" class="data_input" name="serum_bilirubin_total" />mg/dl</span>
						<text class="ref_value">(0.4-1.2mg/dl)</text>

						<label for="serum_bilirubin_direct">Serum Bilirubin (Direct)</label>
						<span><input type="text" class="data_input" name="serum_bilirubin_direct" />mg/dl</span>
						<text class="ref_value">(0.1-0.5mg/dl)</text>

						<label for="alk_phosphatase">Alk. Phosphatase</label>
						<span><input type="text" class="data_input" name="alk_phosphatase" />U/l</span>
						<text class="ref_value">(60-306U/l)</text>

						<label for="sgpt">SGPT(ALT)</label>
						<span><input type="text" class="data_input" name="sgpt" />U/l</span>
						<text class="ref_value">(5-40U/l)</text>

						<label for="sgot">SGOT(AST)</label>
						<span><input type="text" class="data_input" name="sgot" />U/l</span>
						<text class="ref_value">(5-40U/l)</text>

						<label for="gamma_gt">Gamma -GT</label>
						<span><input type="text" class="data_input" name="gamma_gt" />U/l</span>
						<text class="ref_value">(5-40U/l)</text>
					</div>
					<div id="cardiac" hidden>
						<h2>Cardiac Profile Test</h2>
						<h2>Result</h2>
						<h2>Reference Value</h2>
						<label for="cpk">CPK</label>
						<span><input type="text" class="data_input" name="cpk" />U/l</span>
						<text class="ref_value">F(<145)M(<171)U /l</text>

								<label for="ldh">LDH</label>
								<span><input type="text" class="data_input" name="ldh" />U/l</span>
								<text class="ref_value">(225-450U/l)</text>

								<label for="sgot">SGOT(AST)</label>
								<span><input type="text" class="data_input" name="sgot" />U/l</span>
								<text class="ref_value">(5-40U/l)</text>

								<label for="cpk_mb">CPK-MB</label>
								<span><input type="text" class="data_input" name="cpk_mb" />U/l</span>
								<text class="ref_value">(<25U /l)</text>

										<label for="serum_amylase">Serum Amylase</label>
										<span><input type="text" class="data_input" name="serum_amylase" />U/l</span>
										<text class="ref_value">(28-100U/l)</text>
					</div>
					<div id="serology" hidden>
						<h2>Serology Test</h2>
						<h2>Result</h2>
						<h2>Reference Value</h2>

						<label for="hav_igm">HAV IgM</label>
						<span><input type="text" class="data_input" name="hav_igm" /></span>
						<text class="ref_value"></text>

						<label for="hev_igm">HEV IgM</label>
						<span><input type="text" class="data_input" name="hev_igm" /></span>
						<text class="ref_value"></text>

						<label for="hcv">HCV(Rapid Spot Test)</label>
						<span><input type="text" class="data_input" name="hcv" value="Non-Reactive" /></span>
						<text class="ref_value"></text>

						<label for="hiv">HIV 1&2 (Rapid Spot Test )</label>
						<span><input type="text" class="data_input" name="hiv" value="Non-Reactive" /></span>
						<text class="ref_value"></text>

						<label for="hbsag">HBsAg (Rapid Spot Test)</label>
						<span><input type="text" class="data_input" name="hbsag" value="Non-Reactive" /></span>
						<text class="ref_value"></text>

						<label for="vdrl">VDRL</label>
						<span><input type="text" class="data_input" name="vdrl" value="Non-Reactive" /></span>
						<text class="ref_value"></text>

						<label for="crp">C-Reactive Protein(Latex)</label>
						<span><input type="text" class="data_input" name="crp" /></span>
						<text class="ref_value"></text>

						<label for="rheumatoid_factor">Rheumatoid Factor (Latex)</label>
						<span><input type="text" class="data_input" name="rheumatoid_factor" value="Negative" /></span>
						<text class="ref_value"></text>

						<label for="aso_titre">A.S.O. Titre</label>
						<span><input type="text" class="data_input" name="aso_titre" /></span>
						<text class="ref_value">(0-200 IU/L)</text>

						<label for="ana">Anti-Nuclear Antibody</label>
						<span><input type="text" class="data_input" name="ana" value="Negative" /></span>
						<text class="ref_value"></text>
					</div>
					<div id="widal" hidden>
						<h2>Widal Test</h2>
						<h2>Result</h2>
						<h2>Reference Value</h2>

						<label for="typhi_o">Salmonella Typhi (O)</label>
						<span><input type="text" class="data_input" name="typhi_o" value="<1:80" /></span>
						<text class="ref_value">(>1:80)</text>

						<label for="typhi_h">Salmonella Typhi (H)</label>
						<span><input type="text" class="data_input" name="typhi_h" value="<1:80" /></span>
						<text class="ref_value">(>1:80)</text>

						<label for="paratyphi_ah">Salmonella Paratyphi (AH)</label>
						<span><input type="text" class="data_input" name="paratyphi_ah" value="<1:80" /></span>
						<text class="ref_value">(>1:80)</text>

						<label for="paratyphi_bh">Salmonella Paratyphi (BH)</label>
						<span><input type="text" class="data_input" name="paratyphi_bh" value="<1:80" /></span>
						<text class="ref_value">(>1:80)</text>

						<label for="falcivax_pv_ag">FalciVax (Rapid Test For Malaria PV Ag)</label>
						<span><input type="text" class="data_input" name="falcivax_pv_ag" value="Negative" /></span>
						<text class="ref_value"></text>

						<label for="falcivax_pf_ag">FalciVax(Rapid Test For Malaria PF Ag)</label>
						<span><input type="text" class="data_input" name="falcivax_pf_ag" value="Negative" /></span>
						<text class="ref_value"></text>

						<label for="anti_tb_igm">Anti TB IgMImmunochromatographic</label>
						<span><input type="text" class="data_input" name="anti_tb_igm" value="Negative" /></span>
						<text class="ref_value"></text>

						<label for="anti_tb_igg">Anti TB IgGImmunochromatographic</label>
						<span><input type="text" class="data_input" name="anti_tb_igg" value="Negative" /></span>
						<text class="ref_value"></text>

						<label for="aldehyde_test">Aldehyde Test</label>
						<span><input type="text" class="data_input" name="aldehyde_test" value="Negative" /></span>
						<text class="ref_value"></text>

						<label for="h_pylori_antibody">H.Pylori Antibody</label>
						<span><input type="text" class="data_input" name="h_pylori_antibody" /></span>
						<text class="ref_value"></text>

						<label for="psa">Prostatic Specific Antigen (PSA)</label>
						<span><input type="text" class="data_input" name="psa" value="Negative" /></span>
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
					<div id="hematology" hidden>
						<h2>Hematology Tests</h2>
						<h2>Result</h2>
						<h2>Reference Value</h2>

						<label for="total_cell_count"></label>
						<span></span>
						<text></text>

						<label for="wbc">WBC :</label>
						<span><input type="text" class="data_input" name="wbc" /> /cumm</span>
						<text class="ref_value">(4000-11000 /cumm)</text>

						<label for="diff_leukocyte_count">Diff. Leucocyte Count :</label>
						<span></span>
						<text class="ref_value"></text>

						<label for="neutrophil">Neutrophil :</label>
						<span><input type="text" class="data_input" name="neutrophil" /> /cumm</span>
						<text class="ref_value">45-75%</text>

						<label for="lymphocyte">Lymphocyte :</label>
						<span><input type="text" class="data_input" name="lymphocyte" /> /cumm</span>
						<text class="ref_value">20-45%</text>

						<label for="monocyte">Monocyte :</label>
						<span><input type="text" class="data_input" name="monocyte" /> /cumm</span>
						<text class="ref_value">2-8%</text>

						<label for="eosinophil">Eosinophil :</label>
						<span><input type="text" class="data_input" name="eosinophil" /> /cumm</span>
						<text class="ref_value">1-6%</text>

						<label for="basophil">Basophil :</label>
						<span><input type="text" class="data_input" name="basophil" /> /cumm</span>
						<text class="ref_value">0-1%</text>

						<label for="esr_wintrobe">ESR (Wintrobe) :</label>
						<span><input type="text" class="data_input" name="esr_wintrobe" />mm/1st hour</span>
						<text class="ref_value">M(0-9),F(0-20)mm/1st hour</text>

						<label for="hemoglobin">Hemoglobin :</label>
						<span><input type="text" class="data_input" name="hemoglobin" />gm/dl</span>
						<text class="ref_value">M(11-18),F(11-15)gm/dl</text>

						<label for="platelets_thrombocyte">Platelets (Thrombocyte):</label>
						<span><input type="text" class="data_input" name="platelets_thrombocyte" />Million /cumm</span>
						<text class="ref_value">(1,50,000-4,00,000 /cumm)</text>

						<label for="bt">BT :</label>
						<span><input type="text" class="data_input" name="bt" />Secs</span>
						<text class="ref_value">(2.0-6.0 Mins.)</text>

						<label for="ct">CT :</label>
						<span><input type="text" class="data_input" name="ct" />Secs</span>
						<text class="ref_value">(5-11 Mins.)</text>

						<label for="pcv_hct">PCV/HCT :</label>
						<span><input type="text" class="data_input" name="pcv_hct" />%</span>
						<text class="ref_value">(M(33-49%),F(33-43%))</text>

						<label for="malaria_parasite">Malaria Parasite :</label>
						<span><input type="text" class="data_input" name="malaria_parasite" value="Negative" /> </span>
						<text class="ref_value"></text>

						<label for="pt">PT:</label>
						<span><input type="text" class="data_input" name="pt" />Secs</span>
						<text class="ref_value">(10-15 Secs.)</text>

						<label for="inr">INR :</label>
						<span><input type="text" class="data_input" name="inr" /> </span>
						<text class="ref_value"></text>

						<label for="aptt">APTT :</label>
						<span><input type="text" class="data_input" name="aptt" />Secs</span>
						<text class="ref_value">(28-38 Secs.)</text>

						<label for="blood_group_rh_type">Blood Group & Rh Type :</label>
						<span><input type="text" class="data_input" name="blood_group_rh_type" value="“” Positive" />
						</span>
						<text class="ref_value"></text>

						<label for="rbc_erythrocyte">RBC (Erythrocyte):</label>
						<span><input type="text" class="data_input" name="rbc_erythrocyte" />Million/ml</span>
						<text class="ref_value">(4.5-6.5 milion/ml)</text>

						<label for="mcv">MCV :</label>
						<span><input type="text" class="data_input" name="mcv" />µm3</span>
						<text class="ref_value">(76-100µm3)</text>

						<label for="mchc">MCHC :</label>
						<span><input type="text" class="data_input" name="mchc" />gm/dl</span>
						<text class="ref_value"></text>
						<label for="reticulocyte">Reticulocyte :</label>
						<span><input type="text" class="data_input" name="reticulocyte" />Percentage</span>
						<text class="ref_value">Ad.(0.2-2%)Chi.(0.2-6%)</text>
					</div>
				</div>
				<input type="submit" name="submit" value="Submit" id="submit" onclick=nullCheck()>
			</form>
		</div>
	</main>
	<footer></footer>
</body>

</html>