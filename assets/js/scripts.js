/*-----Header Properties-----*/
'use strict';

/**
 * addEvent on element
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}

/**
 * navbar toggle
 */

const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const navbarToggler = document.querySelector("[data-nav-toggler]");

const toggleNav = function () {
  navbar.classList.toggle("active");
  navbarToggler.classList.toggle("active");
}

addEventOnElem(navbarToggler, "click", toggleNav);

const closeNav = function () {
  navbar.classList.remove("active");
  navbarToggler.classList.remove("active");
}

addEventOnElem(navbarLinks, "click", closeNav);



/**
 * header active
 */

const header = document.querySelector("[data-header]");
//const backTopBtn = document.querySelector("[data-back-top-btn]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 100) {
    header.classList.add("active");
    
  } else {
    header.classList.remove("active");
    
  }
});
/*----------*/

/*-------Validation--------*/
//Validation Variables
var nameStatus = false;
var dobStatus = false;
var nricStatus = false;
var mobileNumber = false;
var emailStauts = false;
var postalCodeStauts = false;
var emergencyContactStatus = false;
var emergencyNoStatus = false;
var emergencyRelation = false;
var passwordValid = false;
var confirmPassword = false;

//Get Element by Id
var realName = document.getElementById("name");
var dob = document.getElementById("dob");
var nric = document.getElementById("nric");
var mobile = document.getElementById("mobile");
var email = document.getElementById("email");
var postal = document.getElementById("postalCode");
var emergencyName = document.getElementById("emergencyName");
var emergencyNumber = document.getElementById("emergencyNumber");
var emergencyRelation = document.getElementById("emergencyRelation");
var password = document.getElementById("passwordInput");
var passwordConfirmInput = document.getElementById("confirmPasswordInput");


//Functions
function chkName(event) {
  var input = event.currentTarget;
  var validRegex = /^[A-Za-z\s]*$/;

  if (!input.value.match(validRegex)) {
    alert("The name field must contains alphabet characters and spaces only.");
    nameStatus = false;
    return false;
  } else {
    nameStatus = true;
    return true;
  }
}

function nricVal(event){
  var nricInput = event.currentTarget;

  var validRegex = /^[STFG]\d{7}[A-Z]$/;
  if(!nricInput.value.match(validRegex)){
     alert("Invalid NRIC. Please enter a valid NRIC");
    nricStatus = false;
     return false;
  }  
  else {
    nricStatus = true;
    return true;
  }
}

function checkDate(event){
  var input = event.currentTarget;
  var selectDate = new Date(input.value);
  const today = new Date();

  if (selectDate > today){
    alert("Select a current or past date");
    dobStatus = false;
    return false;
  }else {
    dobStatus = true;
    return true;
  }
}

function checkNumber(event){
  var input = event.currentTarget;
  var validRegex = /\[6|8|9]\d{7}/;

  if (input.value.match(validRegex)) {
    mobileNumber = true;
    return true;

  } else {
    alert("Not a valid SG Number. Please enter a valid SG number.");
    mobileNumber = false;
    return false;
  }
}

function validateEmail(event) {
  var input = event.currentTarget;
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (input.value.match(validRegex)) {
    emailStauts = true;
    return true;

  } else {
    alert("The email field contains a user name part follows by “@” and a " +
    "domain name part. The user name contains word characters " +
    "including hyphen (“-”) and period (“.”). The domain name contains " +
    "two to four address extensions. Each extension is string of word " +
    "characters and separated from the others by a period (“.”). The last " +
    "extension must have two to three characters.");
    emailStauts = false;
    return false;
  }
}

function chkPostalCode(event){
  var input = event.currentTarget;
  var validRegex = /\d{6}/

  if (input.value.match(validRegex)) {
    postalCodeStauts = true;
    return true;

  } else {
    alert("Please enter a proper SG postal code");
    postalCodeStauts = false;
    return false;
  }
}

function emergencyContactChk(event){
  var input = event.currentTarget;
  var validRegex = /^[A-Za-z\s]*$/;

  if (!input.value.match(validRegex)) {
    alert("The name field must contains alphabet characters and spaces only.");
    emergencyContactStatus = false;
    return false;
  } else {
    emergencyContactStatus = true;
    return true;
  }
}

function emergencyNoChk(event){
  var input = event.currentTarget;
  var validRegex = /\[6|8|9]\d{7}/;

  if (input.value.match(validRegex)) {
    emergencyNoStatus = true;
    return true;
  } else {
    alert("Not a valid SG Number. Please enter a valid SG number.");
    emergencyNoStatus = false;
    return false;
  }
}

function emergencyRelationChk(event){
  var input = event.currentTarget;
  var validRegex = /^[A-Za-z\s]*$/;

  if (!input.value.match(validRegex)) {
    
    alert("The name field must contains alphabet characters and spaces only.");
    emergencyRelation = false;
    return false;
  } else {
    emergencyRelation = true;
    return true;
  }
}

function checkPasswordStrength(event){
  var input = event.currentTarget;
  var validRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

  if (!input.value.match(validRegex)) {
    alert("Password should contain between 8 to 15 characters, which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character");
    passwordValid = false;
    return false;
  } else {
    passwordValid = true;
    return true;
  }
}

function confirmPasswordChk(event){
  var input = event.currentTarget;
  var confirmPasswordStatus = password.value;
  if (input.value == confirmPasswordStatus){
    confirmPassword = true;
    return true;
  }
  else {
    confirmPassword = false;
    alert("Confirm Password and Password Input not the same. Please try again");
    return false;
  }
}

function allClear(event){
  var button = document.getElementById("register-input");
  
  if (!nameStatus ||
    !dobStatus ||
    !nricStatus ||
    !mobileNumber ||
    !emailStauts ||
    !postalCodeStauts ||
    !emergencyContactStatus ||
    !emergencyNoStatus ||
    !emergencyRelation ||
    !passwordValid ||
    !confirmPassword ){
      alert("Please fill in all the fields properly!");
      event.preventDefault();
      return false;
    }else {
      return true;
    }
}

//Event Listeners
realName.addEventListener("change", chkName, false);
dob.addEventListener("change", checkDate, false);
nric.addEventListener("change", nricVal, false);
mobile.addEventListener("change", checkNumber, false);
email.addEventListener("change", validateEmail, false);
postal.addEventListener("change", chkPostalCode, false);
emergencyName.addEventListener("change", emergencyContactChk, false);
emergencyNumber.addEventListener("change", emergencyNoChk, false);
emergencyRelation.addEventListener("change", emergencyRelationChk, false);
password.addEventListener("change", checkPasswordStrength, false);
passwordConfirmInput.addEventListener("change", confirmPasswordChk, false);

/*--------------------------*/

/*Forget Password Flow*/
const captcha = document.querySelector(".captcha"),
reloadBtn = document.querySelector(".reload-btn"),
inputField = document.querySelector(".input-captcha"),
checkBtn = document.querySelector(".check-btn"),
statusTxt = document.querySelector(".status-text");
var captchaStauts = false;


//storing all captcha characters in array
let allCharacters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
                     'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd',
                     'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',
                     't', 'u', 'v', 'w', 'x', 'y', 'z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
function getCaptcha(){
  for (let i = 0; i < 6; i++) { //getting 6 random characters from the array
    let randomCharacter = allCharacters[Math.floor(Math.random() * allCharacters.length)];
    captcha.innerText += ` ${randomCharacter}`; //passing 6 random characters inside captcha innerText
  }
}
getCaptcha(); //calling getCaptcha when the page open
//calling getCaptcha & removeContent on the reload btn click
reloadBtn.addEventListener("click", ()=>{
  removeContent();
  getCaptcha();
});

checkBtn.addEventListener("click", e =>{
  e.preventDefault(); //preventing button from it's default behaviour
  statusTxt.style.display = "block";
  //adding space after each character of user entered values because I've added spaces while generating captcha
  let inputVal = inputField.value.split('').join(' ');
  if(inputVal == captcha.innerText){ //if captcha matched
    statusTxt.style.color = "#4db2ec";
    statusTxt.innerText = "Nice! You don't appear to be a robot.";
    captchaStauts = true;
  }else{
    statusTxt.style.color = "#ff0000";
    statusTxt.innerText = "Captcha not matched. Please try again!";
    captchaStauts = false;
  }
});

function removeContent(){
 inputField.value = "";
 captcha.innerText = "";
 statusTxt.style.display = "none";
}

function checkAllFields(event){
  if (!captchaStauts || !emailStauts){
    event.preventDefault();
  }
}

/*--------------------------*/

