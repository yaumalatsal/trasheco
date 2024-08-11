const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");

registerButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
  history.pushState(null, null, '#register');
});

loginButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
  history.pushState(null, null, window.location.pathname);
});

document.addEventListener("DOMContentLoaded", function () {
  if (window.location.hash === '#register') {
    container.classList.add("right-panel-active");
  } else {
    container.classList.remove("right-panel-active");
  }
});
