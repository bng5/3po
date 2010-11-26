<?php

$txt = "áéíóú";

echo $txt;

echo "\n\n";

$json = json_encode($txt);
// "\u00e1\u00e9\u00ed\u00f3\u00fa"

echo $json;

echo "\n\n";

echo json_decode('"\U00e1\U00e9\U00ed\U00f3\U00fa"');
echo "\n";

$txt = json_decode($json);

echo $txt;

?>

