function hide(id) {
    let check = document.getElementById(id);
    let trigger = document.getElementById(id.substring(2));
    if (check.checked) {
        trigger.style.display = "grid";
        if (id === "c_urine" || id === "c_stool") {
            if (id == "c_urine") {
                document.getElementById("urine_s").checked = true;
            } else if (id == "c_stool") {
                document.getElementById("stool_s").checked = true;
            }
        } else {
            document.getElementById("blood_s").checked = true;
        }
    } else {
        trigger.style.display = "none";
        if (id === "c_urine" || id === "c_stool") {
            if (id == "c_urine") {
                document.getElementById("urine_s").checked = false;
            } else if (id == "c_stool") {
                document.getElementById("stool_s").checked = false;
            }
        }else{
            if(!document.getElementById("c_biochem").checked && !document.getElementById("c_hematology").checked){
                document.getElementById("blood_s").checked = false;
            }
        }
    }
}