<?php
$slug = $_GET["slug"];
$db = new mysqli("localhost", "thegtorg_yonse", "yonse_misc", "thegtorg_yonse");
$result = $db->query("SELECT url FROM urls WHERE slug = '". $db->escape_string(trim($slug)) ."'") or die($db->error);
if($row = $result->fetch_row()) {
  $result->free();
  $db->close();
  $link = $row[0];
  header("HTTP/1.1 302 Found");
  header("Location: ".$link);
  die("<a href=\"".htmlentities($link)."\">".htmlentities($link)."</a>");
}
else {
  $result->free();
  $db->close();
  header("HTTP/1.1 404 Not Found");
  readfile("404.php");
  die();
}
?>