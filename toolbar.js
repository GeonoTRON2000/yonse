var toolbar;
var body;
function mouseMove(e) {
  if (!e) {
    var e = window.event;
  }
  if (e.clientY < 34) {
    toolbar.show();
  }
  else {
    toolbar.hide();
  }
}

function load(e) {
  if (!e) {
    var e = window.event;
  }
  body = document.getElementsByTagName("body")[0];
  body.onmousemove = mouseMove;
  toolbar = document.createElement("div");
  toolbar.style.position = "fixed";
  toolbar.style.top = "0px";
  toolbar.style.left = "0px";
  toolbar.style.zIndex = "300";
  toolbar.style.width = "100%";
  toolbar.style.height = "0px";
  toolbar.style.backgroundColor = "#333333";
  toolbar.style.color = "#FFFFFF";
  toolbar.style.borderTopStyle = "solid";
  toolbar.style.borderTopWidth = "1px";
  toolbar.style.borderTopColor = "orange";
  toolbar.style.borderBottomStyle = "solid";
  toolbar.style.borderBottomWidth = "1px";
  toolbar.style.borderBottomColor = "orange";
  toolbar.style.fontSize = "x-large";
  toolbar.style.textAlign = "center";
  toolbar.style.cursor = "default";
  toolbar.style.overflow = "hidden";
  body.appendChild(toolbar);
  toolbar.show = function () {
    toolbar.style.height = "32px";
  };
  toolbar.hide = function () {
    toolbar.style.height = "0px";
  };
  toolbar.innerHTML = "Hello! Welcome to YonSe!";
  if (e.clientY > 33) {
    toolbar.hide();
  }
  else {
    toolbar.show();
  }
}