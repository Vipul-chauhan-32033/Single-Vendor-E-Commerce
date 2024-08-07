let title = document.getElementById("title");
let inputGroup = document.getElementById("inputGroup");
let submitBtn = document.getElementById("submitBtn");
let nameField = document.getElementById("nameField");
let phoneField = document.getElementById("phoneField");
let cPassField = document.getElementById("cPassField");
let signIn = document.getElementById("signIn");
let signUp = document.getElementById("signUp");
let name = document.myform.name.value;
let cpass = document.myform.cpass.value;
let phone = document.myform.phone.value;

signIn.onclick = function () {
  // nameField.style.maxHeight = "0";
  // cPassField.style.maxHeight = "0";
  // phoneField.style.maxHeight = "0";
  nameField.style.display = "none";
  cPassField.style.display = "none";
  phoneField.style.display = "none";
  submitBtn.innerHTML = "Login";
  title.innerHTML = "Sign In";
  signUp.classList.add("disable");
  signIn.classList.remove("disable");
  inputGroup.style.height = "150px";
};
signUp.onclick = function () {
  // nameField.style.maxHeight = "45px";
  // cPassField.style.maxHeight = "45px";
  // phoneField.style.maxHeight = "45px";
  nameField.style.display = "flex";
  cPassField.style.display = "flex";
  phoneField.style.display = "flex";

  submitBtn.innerHTML = "Register";
  title.innerHTML = "Sign Up";
  signIn.classList.add("disable");
  signUp.classList.remove("disable");
  inputGroup.style.height = "310px";
};
