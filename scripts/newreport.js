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
        } else {
            if (
                !document.getElementById("c_biochem").checked &&
                !document.getElementById("c_hematology").checked
            ) {
                document.getElementById("blood_s").checked = false;
            }
        }
    }
}

function changeAbout(id) {
    button = document.getElementById(id);
    phoneNum = document.getElementById("number");
    facebook = document.getElementById("facebook");
    if (id == "anish") {
        phoneNum.innerText = "9869377340";
        phoneNum.href = "https://wa.me/9779869377340";
        facebook.innerText = "Anish Neupane";
        facebook.href = "https://www.facebook.com/anish.neupane.04/";
        button.style = "background: #758fec; color: #fff;";
        document.getElementById("prayojan").style =
            "background: #fff; color: #000;";
    } else {
        phoneNum.innerText = "9805120678";
        phoneNum.href = "https://wa.me/9779805120678";
        facebook.innerText = "Prayojan Puri";
        facebook.href =
            "https://www.facebook.com/profile.php?id=100022565495098";
        button.style = "background: #758fec; color: #fff;";
        document.getElementById("anish").style =
            "background: #fff; color: #000;";
    }
}

function nullCheck() {
    inputs = document.getElementsByClassName("data_input");
    range = inputs.length;
    console.log(range);
    for (i = 0; i < range; i++) {
        if (inputs[i].value == "") {
            inputs[i].value = "--";
        }
    }
}

window.onload = function (){
    let recDate = document.getElementById("rec_on");
    let repDate = document.getElementById("rep_on");
    const now = new Date();
    const year = now.getFullYear();
    if (now.getMonth().toString().length != 2) {
        var month = "0" + now.getMonth().toString();
    } else {
        var month = now.getMonth();
    }
    if (now.getDate().toString().length != 2) {
        var day = "0" + now.getDate().toString();
    } else {
        var day = now.getDate();
    }
    const fullDate = `${year}-${month}-${day}`;
    recDate.value = fullDate;
    repDate.min = fullDate;
};

function changeMin() {
    let repDate = document.getElementById("rep_on");
    let recDate = document.getElementById("rec_on");
    repDate.min = recDate.value;
    if (recDate.value != "") {
        repDate.value = recDate.value;
    }
}