<?php
if($_POST["pin"] == "7011") {
  $crl = curl_init("https://schoology.pausd.org/Schoology_Remote_Auth.php");
  $fields = array(
    "username" => "95017853",
    "password" => "Chromium246",
  "form" => null
  );
  $fields_string = "";
  foreach($fields as $key=>$value) { 
    $fields_string .= $key.'='.$value.'&';
  }
  rtrim($fields_string,'&');

  curl_setopt($crl, CURLOPT_REFERER, "https://schoology.pausd.org");
  curl_setopt($crl, CURLOPT_POST, count($fields));
  curl_setopt($crl, CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
  @curl_setopt($crl, CURLOPT_FOLLOWLOCATION, true);
  @curl_setopt($crl, CURLOPT_HEADER, true);
  $data = curl_exec($crl);
  $headers = explode("\n\n", $data);
  $headers = $headers[0];
  $headers = explode("\n", $headers);
  $data = substr($data, strlen($headers));
  curl_close($crl);
  foreach($headers as $header) {
    header($header);
  }
  die($data);
}
else if (!empty($_POST["pin"])) {
die("Incorrect Pin.");
} else {
?>
<!DOCTYPE html>
<html>
<head>
<title>Enter Pin</title>
</head>
<body>
<form action="slogin.php" method="post">
<p>Pin: <input type="password" name="pin" size="4" /></p>
<p><input type="submit" value="OK" /></p>
</form>
</body>
</html>
<?php
}
?>