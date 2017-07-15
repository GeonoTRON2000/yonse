<html>
<head>
<title>404 Not Found</title>
<script type="text/javascript">
var exp = true;
function expand() {
  document.getElementById('details').innerHTML = 'The requested URL cannot be found.'+"\n<br />\n"+'Check the URL and try again, or try again later.';
}
function colapse() {
  document.getElementById('details').innerHTML = '';
}
function toggleDetails() {
  if(exp) {
    expand();
  }
  else {
    colapse();
  }
  exp = !exp;
}
</script>
</head>
<body>
<h1>Error 404: File Not Found</h1>
<a href="#" onclick="toggleDetails()">(+/-) More Information</a>
<div id="details">
</div>
</body>
</html>