<?php


function utf8_to_unicode_code($utf8_string) {
	$expanded = iconv("UTF-8", "UTF-32", $utf8_string);
	return unpack("L*", $expanded);
}

function unicode_code_to_utf8($unicode_list) {
  $result = "";
  foreach($unicode_list as $key => $value) {
	  $one_character = pack("L", $value);
	  $result .= iconv("UTF-32", "UTF-8", $one_character);
  }
  return $result;
}

$q = "&#1047;&#1076;&#1088;&#1072;&#1074;&#1089;".
   "&#1089;&#1090;&#1074;&#1091;&#1081;".
   "&#1090;&#1077;";

$r = html_entity_decode($q, ENT_NOQUOTES, 'UTF-8');
$s = utf8_to_unicode_code($r);
$t = unicode_code_to_utf8($s);
print "$r\n";
print_r($s);
print "$t\n";


$caracteres_varios = "Здравсствуйте áéíóúqwerty";
echo "
--------------------------------------------------------------------------------
";
print_r(utf8_to_unicode_code($caracteres_varios));
echo "
--------------------------------------------------------------------------------
";

?>