<?php
include "db.php";
$id = strval(intval($_GET["id"]));
$q = mysql_query("SELECT * FROM `polls` WHERE `id` = $id") or die(mysql_error());
if (mysql_numrows($q) > 0) {
$arr = mysql_fetch_assoc($q);
?>
<html>
<head>
<title><?=htmlentities($arr["title"]);?></title>
<script type="text/javascript">
function select (o) {
  document.getElementsByName("answer")[o].click();
}
</script>
</head>
<body bgcolor="#000000" text="#FFFFFF" onload="select(0);">
<div id="poll" style="width: 400px; text-align: left; margin-left: auto; margin-right: auto; border-style: solid; border-width: 1px; border-color: #00FFFF;">
<h1 style="color: #FFFF00;"><?=htmlentities($arr["question"]);?></h1>
<form action="submit/<?=$id;?>" method="post">
<?php
$anses = explode(";", $arr["answers"]);
foreach ($anses as $ans_id => $ans) {
  $ans = htmlentities(trim($ans));
  echo "<div style=\"cursor: pointer;\" id=\"answer_{$ans_id}\" onclick=\"this.getElementsByTagName('input')[0].click();\"><input type=\"radio\" name=\"answer\" value=\"{$ans_id}\" />{$ans}</div>\r\n";
}
?>
<div id="submit"><input type="submit" value="<?=htmlentities($arr["submittext"]);?>" /></div>
</form>
<a href="/result/<?=$id;?>" style="color: #00FF00;">See Results</a>
</div>
</body>
</html>
<?php
}
else {
?>
<html>
<head>
<title>Poll not found</title>
</head>
<body>
<h1>Poll Not Found</h1>
<p>Poll number <?=strval(intval($_GET["id"])); ?> does not exist.<br />Please check to ensure you have the correct link and try again.</p>
</body>
</html>
<?php
}
?>