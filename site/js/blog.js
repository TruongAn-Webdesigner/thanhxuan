linkCssBlog();

function linkCssBlog() {
  var linkElement = document.createElement("link");

  linkElement.rel = "stylesheet";
  linkElement.href = "css/blog/blog.css"; //Replace here

  document.head.appendChild(linkElement);
}
