linkCssthucDon();

function linkCssthucDon() {
  var linkElement = document.createElement("link");

  linkElement.rel = "stylesheet";
  linkElement.href = "css/home/home.css"; //Replace here

  document.head.appendChild(linkElement);
}

