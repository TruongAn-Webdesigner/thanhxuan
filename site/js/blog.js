linkCssBlog();

function linkCssBlog() {
  var linkElement = document.createElement("link");

  linkElement.rel = "stylesheet";
  linkElement.href = "css/blogindex/blogindex.css"; //Replace here

  document.head.appendChild(linkElement);
}
