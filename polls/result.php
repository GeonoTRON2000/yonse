<?php
include "db.php";
$id = strval(intval($_GET["id"]));
$poll = mysql_query("SELECT * FROM `polls` WHERE `id` = $id") or die(mysql_error());
$poll_data = mysql_fetch_assoc($poll);
$results = explode(";", $poll_data["responses"]);
$options = explode(";", $poll_data["answers"]);
$responses = 0;
$counter = array();
foreach ($results as $result) {
  $responses += 1;
  if (!$counter[intval($result)]) {
    $counter[intval($result)] = 1;
  }
  else {
    $counter[intval($result)] += 1;
  }
}
?>
<html>
<head>
<title><?=htmlentities($poll_data["title"]);?> - Results</title>
<style type="text/css">
.counter {
  height: 16px;
  background-color: #0000FF;
}
.counter_bg {
  width: 200px;
  height: 16px;
  background-color: #FFFFFF;
  border-style: solid;
  border-width: 1px;
  border-color: #000000;
}
#poll_result {
  width: 400px;
  margin-left: auto;
  margin-right: auto;
  border-style: solid;
  border-width: 1px;
  border-color: #000000;
  font-family: Arial;
  font-size: 14px;
}
</style>
</head>
<body>
<div id="poll_result">
<h1><?=htmlentities($poll_data["question"]);?></h1>
<div id="results">
<?php
foreach ($options as $oid => $option) {
  $int = intval(($counter[$oid]/$responses) * 200);
  $count = strval(($counter[$oid]/$responses)*100);
  if (strlen($count) == 0) {
    $count = "0";
  }
  $count .= "%";
  $num = strval($counter[$oid]);
  if (!$num) {
    $num = "0";
  }
  echo "<p>".htmlentities($option)." - {$count} ({$num})<div class=\"counter_bg\"><div class=\"counter\" style=\"width: {$int}px\"></div></div></p>\r\n";
}
?>
</div>
</div>
</body>
</html>