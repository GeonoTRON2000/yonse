<?php
include "db.php";
$id = strval(intval($_GET["id"]));
$ans = strval(intval($_POST["answer"]));
$poll = mysql_query("SELECT * FROM `polls` WHERE `id` = $id") or die(mysql_error());
$res = mysql_result($poll, 0, "responses");
$contrib = mysql_result($poll, 0, "contributors");
$contrib .= $_SERVER["REMOTE_ADDR"].";";
if ($res == "") {
  mysql_query("UPDATE `polls`
  SET `responses` = '{$ans}', `contributors` = '{$contrib}'
  WHERE `id` = $id AND NOT `contributors` LIKE '%{$_SERVER["REMOTE_ADDR"]}%'") or die(mysql_error());
}
else {
  $res .= ";{$ans}";
  mysql_query("UPDATE `polls`
  SET `responses` = '{$res}', `contributors` = '{$contrib}'
  WHERE `id` = $id AND NOT `contributors` LIKE '%{$_SERVER["REMOTE_ADDR"]}%'") or die(mysql_error());
}
die("Thanks for submitting your opinion.<br />Go <a href=\"/result/{$id}\">here</a> to see the results.");
?>