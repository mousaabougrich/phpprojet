let weight=document.getElementById("kg");
let height=document.getElementById("cm");
function bmi(){
    let bmi = weight.value / Math.pow(height.value / 100, 2);
if (weight=== "" || height === "") {
    alert("Please fill in the fields");
    return;
}else{
//document.getElementById("result").innerHTML=bmi;
if (bmi<18.5){
    document.getElementById("result").innerHTML="Underweight";
}else if(bmi>=18.5 && bmi<=24.9){
    document.getElementById("result").innerHTML="Normal weight";
}
else if(bmi>=25 && bmi<=29.9){
    document.getElementById("result").innerHTML="Overweight";


}
else if(bmi>=30){
    document.getElementById("result").innerHTML="Obesity";
}
else{
    document.getElementById("result").innerHTML="Please enter a valid number";
}
}}