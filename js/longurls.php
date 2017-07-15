<?php
$short = $_REQUEST["short"];
$short = stripslashes($short);
$short = trim($short);
$arr = array (
"<?xml version=\"1.0\"?>" => "",
"<response>" => "",
"<long-url>" => "",
"<![CDATA[" => "",
"]]>" => "",
"</long-url>" => "",
"</response>" => "",
" " => "",
"\n" => "",
"<messages>" => "",
"</messages>" => "",
"<error>" => "",
"</error>" => ""
);
ob_clean();
ob_start();
readfile("http://api.longurl.org/v2/expand?url=$short");
$response = ob_get_clean();
ob_flush();
$long = strtr($response, $arr);
die($long);
?>