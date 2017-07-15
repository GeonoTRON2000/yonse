<?php
if (empty($_GET["action"]))
  die();
switch (strtolower($_GET["action"])) {
  case "shorten":
    if (empty($_GET["url"]))
      die();
    include "sfs.php";
    if (stopforumspam_check(null, null, $_SERVER["REMOTE_ADDR"]))
      die();
    if (filter_var($_GET["url"], FILTER_VALIDATE_URL) !== false) {
      $url = $_GET["url"];
    } else if (filter_var("http://".$_GET["url"], FILTER_VALIDATE_URL) !== false) {
      $url = "http://".$_GET["url"];
    } else {
      die();
    }
    include "genslug.php";
    if (!empty($_GET["slug"]) && preg_match('/[0-9A-Za-z\-]{1,255}/', $_GET["slug"]))
      $slug = $_GET["slug"];
    else
      $slug = genslug(6);
    $db = new mysqli("localhost", "thegtorg_yonse", "yonse_misc", "thegtorg_yonse");
    $db->query("INSERT INTO urls (slug, url) VALUES ('".$db->escape_string($slug)."', '".$db->escape_string($url)."')") or die();
    $db->close();
    die("http://yon.se/".$slug);
    break;
  default:
    die();
}
die();
?>