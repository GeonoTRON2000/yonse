<?php
if (isset($_POST["shorten"])) {
  include "sfs.php";
  if (stopforumspam_check(null, null, $_SERVER["REMOTE_ADDR"]))
    die();
  $shorturl = file_get_contents("http://yon.se/api.php?action=shorten&url=".urlencode($_POST["url"])."&slug=".urlencode($_POST["slug"]));
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="description" content="Yonse: A simple but effective URL shortener featuring free custom short links." />
<meta name="robots" content="index,follow" />
<title>YonSe</title>
<link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/yonse-url-shortener/fmgfcehmliegnadigkbplocnganinaeb" />
<style type="text/css">
.required { color: #FF0000; }
.nomargin { margin: 0px; }
.halfmargin { margin: 0.67em; }
.margin { margin: 1em; }
</style>
</head>
<body bgcolor="#000000" text="#FFFFFF" onload="load(event);">
<center>
<p><a href="http://yon.se/"><img src="img/yonse.png" alt="YonSe" /></a></p>
<?php
if (empty($shorturl)) {
?>
<div id="shorten">
<form action="<?=$_SERVER["REQUEST_URI"]; ?>" method="post">
<p class="nomargin">Long URL<span class="required" title="Required">*</span>:&nbsp;<input type="text" name="url" size="50" placeholder="http://my.longlink.com/pageblahblah?query=blahblah" required="required" /></p>
<p class="halfmargin">Custom slug:&nbsp;<input type="text" name="slug" size="10" maxlength="10" /></p>
<p class="nomargin"><input type="submit" name="shorten" value="Shorten" /></p>
</form>
</div>
<?php
} else {
?>
<div id="shortened">
<textarea style="width: 340px; height: 120px; font-size: x-large;" onclick="this.focus();this.select();"><?=htmlentities($shorturl); ?></textarea>
</div>
<?php
}
?>
<div id="+1">
<!-- Place this tag where you want the +1 button to render -->
<g:plusone annotation="inline"></g:plusone>

<!-- Place this render call where appropriate -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</div>
</center>
</body>
</html>