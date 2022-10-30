// Security gaurde
// Check queue of people, if person is older than 18 and younger than 35, admit. Otherwise, appologize.

// write variables to contain the limitations of the age.

const MinAge = 18;
const MaxAge = 35;
let age;



function displayMsg(msg){
alert(msg);

}

do {
age= prompt("what is ur age ? ");
age= Number.parseInt(age);

if (age < MinAge){
    displayMsg("You are too young ");
}
else if (age >MaxAge){
    displayMsg("You are too old ");

}
else {
    displayMsg(prompt("What is your name ")+ "welcome to the party. ");
}
while ( confirm("is there any body else ? "));
