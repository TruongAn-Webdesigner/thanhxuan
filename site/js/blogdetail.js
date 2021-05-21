linkCssBlogDetail();

function linkCssBlogDetail() {
  var linkElement = document.createElement("link");

  linkElement.rel = "stylesheet";
  linkElement.href = "css/blogchitiet/blogchitiet.css"; //Replace here

  document.head.appendChild(linkElement);
}
