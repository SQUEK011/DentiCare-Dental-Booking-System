/**
 * HOW TO USE JS SCRIPT:
 *  1. Add in /* 'Page/Class Name' */
 /* 2. Write JS SCRIPT 
 *  3. Close with /*---------*/
 /**/

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
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});
/*----------*/

/*validation*/
var emailStauts = false;
function validateEmail(input) {

  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (input.value.match(validRegex)) {
    alert("Valid email address!");
    emailStauts = true;
    return true;

  } else {
    alert("Invalid email address!");
    emailStauts = false;
    return false;
  }
}

/*Modal & Loader*/

/*Forget Password*/
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
  if (captchaStauts == false || emailStauts == false){
    event.preventDefault();
  }
}

