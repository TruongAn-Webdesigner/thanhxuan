linkCssLogin();

function linkCssLogin() {
  var linkElement = document.createElement("link");

  linkElement.rel = "stylesheet";
  linkElement.href = "css/login/login.css"; //Replace here

  document.head.appendChild(linkElement);
}

const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});