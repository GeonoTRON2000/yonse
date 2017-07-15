window.longs = new Array();
var links = document.getElementsByTagName('a');
for (var i = 0; i < links.length; i++) {
  var link = links[i];
  if(window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","http://yon.se/js/geturls.php?short="+link.href);
    xmlhttp.send();
  } 
  else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.status == 200 && xmlhttp.readyState == 4) {
      if(!xmlhttp.responseText == "NOT SUPPORTED")
        link.onMouseOver = 'window.alert("Long link: '+xmlhttp.responseText+');';
        window.alert(link.href+" goes to "+xmlhttp.responseText);
    }
  }
    
}