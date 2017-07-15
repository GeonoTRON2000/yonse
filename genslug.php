<?php
function genslug ($length = int) {
  if ($length <= 0)
    return "";
  $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $slug = "";
  for ($i = 0; $i < $length; $i++)
    $slug .= $chars[mt_rand(0, 61)];
  return $slug;
}
?>