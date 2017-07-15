<?php
function stopforumspam_check($username, $email, $ip) {
  $response = @simplexml_load_file('http://www.stopforumspam.com/api?'.http_build_query(array('username' => $username, 'email' => $email, 'ip' => $ip)));
  if ($response === false)
    return false;
  foreach($response->appears as $appears) {
    if ($appears == 'yes')
      return true;
  }
  return false;
}
?>