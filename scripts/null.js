function nullCheck(){
    inputs = document.getElementsByClassName("data_input");
    range = inputs.length;
    console.log(range);
    for(i=0;i<range;i++){
        if(inputs[i].value == ""){
            inputs[i].value = "NotA";
        }
    }
}