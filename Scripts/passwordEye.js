// Script for toggling visibility of passwords during registration (for now)

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#floatingPassword");
const togglePasswordCheck = document.querySelector("#togglePasswordCheck");
const passwordCheck = document.querySelector("#floatingPasswordCheck");

togglePassword.addEventListener("click", function () {
  // toggle the type attribute
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);

  // toggle the eye icon
  this.classList.toggle("fa-eye");
});

togglePasswordCheck.addEventListener("click", function () {
  // toggle the type attribute
  const type =
    passwordCheck.getAttribute("type") === "password" ? "text" : "password";
  passwordCheck.setAttribute("type", type);

  // toggle the eye icon
  this.classList.toggle("fa-eye");
});
