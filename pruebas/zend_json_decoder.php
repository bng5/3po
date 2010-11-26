<?php

//include('zendframework/library/Zend/Json/Decoder.php');




//Zend_Json::$useBuiltinEncoderDecoder = true;
//new Zend_Json;
//$json = Zend_Json::decode('{"a":"b","0":1,"1":2,"txt":"\u0417\u0434\u0440\u0430\u0432\u0441\u0441\u0442\u0432\u0443\u0439\u0442\u0435 \u00e1\u00e9\u00ed\u00f3\u00faqwerty"}');





	function decodeUnicodeString($chrs) {
        $delim       = substr($chrs, 0, 1);
        $utf8        = '';
        $strlen_chrs = strlen($chrs);

echo "
chars: '{$chrs}'
delim: '{$delim}'
utf8: '{$utf8}'
strlen_chrs: '{$strlen_chrs}'

";
        for($i = 0; $i < $strlen_chrs; $i++) {

            $substr_chrs_c_2 = substr($chrs, $i, 2);
            $ord_chrs_c = ord($chrs[$i]);
echo "

i: {$i}
substr_chrs_c_2: {$substr_chrs_c_2}
ord_chrs_c: {$ord_chrs_c}

	entro en: ";
            switch (true) {
                case preg_match('/\\\u[0-9A-F]{4}/i', substr($chrs, $i, 6)):
echo "1_ case preg_match('/\\\u[0-9A-F]{4}/i', ".substr($chrs, $i, 6)."):
";
                    // single, escaped unicode character
                    $utf16 = chr(hexdec(substr($chrs, ($i + 2), 2)))
                           . chr(hexdec(substr($chrs, ($i + 4), 2)));
                    $utf8 .= mb_convert_encoding($utf16, 'UTF-8', 'UTF-16');//self::_utf162utf8($utf16);
echo "		utf8 .= '".mb_convert_encoding($utf16, 'UTF-8', 'UTF-16')."'
";
                    $i += 5;
                    break;
                case ($ord_chrs_c >= 0x20) && ($ord_chrs_c <= 0x7F):
echo "2_ (".dechex($ord_chrs_c)." >= 0x20) && (".dechex($ord_chrs_c)." <= 0x7F):
";
                    $utf8 .= $chrs{$i};
echo "		utf8 .= '".$chrs{$i}."'
";
                    break;
                case ($ord_chrs_c & 0xE0) == 0xC0:
echo "3_ (".dechex($ord_chrs_c)." & 0xE0) == 0xC0:
";
                    // characters U-00000080 - U-000007FF, mask 110XXXXX
                    //see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                    $utf8 .= substr($chrs, $i, 2);
echo "		utf8 .= '".substr($chrs, $i, 2)."'
";
                    ++$i;
                    break;
                case ($ord_chrs_c & 0xF0) == 0xE0:
echo "4_ (".dechex($ord_chrs_c)." & 0xF0) == 0xE0:
";
                    // characters U-00000800 - U-0000FFFF, mask 1110XXXX
                    // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                    $utf8 .= substr($chrs, $i, 3);
echo "		utf8 .= '".substr($chrs, $i, 3)."'
";
                    $i += 2;
                    break;
                case ($ord_chrs_c & 0xF8) == 0xF0:
echo "5_ (".dechex($ord_chrs_c)." & 0xF8) == 0xF0:
";
                    // characters U-00010000 - U-001FFFFF, mask 11110XXX
                    // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                    $utf8 .= substr($chrs, $i, 4);
echo "		utf8 .= '".substr($chrs, $i, 4)."'
";
                    $i += 3;
                    break;
                case ($ord_chrs_c & 0xFC) == 0xF8:
echo "6_ (".dechex($ord_chrs_c)." & 0xFC) == 0xF8:
";
                    // characters U-00200000 - U-03FFFFFF, mask 111110XX
                    // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                    $utf8 .= substr($chrs, $i, 5);
echo "		utf8 .= '".substr($chrs, $i, 6)."'
";
                    $i += 4;
                    break;
                case ($ord_chrs_c & 0xFE) == 0xFC:
echo "7_ (".dechex($ord_chrs_c)." & 0xFE) == 0xFC:
";
                    // characters U-04000000 - U-7FFFFFFF, mask 1111110X
                    // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                    $utf8 .= substr($chrs, $i, 6);
echo "		utf8 .= '".substr($chrs, $i, 6)."'
";
                    $i += 5;
                    break;
            }
        }
		return $utf8;
	}



function decodificarUnicodeString($chrs) {
	$utf8        = '';
	$strlen_chrs = strlen($chrs);

	for($i = 0; $i < $strlen_chrs; $i++) {
		$ord_chrs_c = ord($chrs[$i]);
		switch (true) {
			case ('\\\\' == substr($chrs, $i, 2)):
				$utf8 .= '\\';
				$i++;
				break;
			case preg_match('/\\\u[0-9A-F]{4}/i', substr($chrs, $i, 6)):
				$utf16 = chr(hexdec(substr($chrs, ($i + 2), 2)))
					   . chr(hexdec(substr($chrs, ($i + 4), 2)));
				$utf8 .= mb_convert_encoding($utf16, 'UTF-8', 'UTF-16');//self::_utf162utf8($utf16);
				$i += 5;
				break;
			case ($ord_chrs_c >= 0x20) && ($ord_chrs_c <= 0x7F):
				$utf8 .= $chrs{$i};
				break;
			case ($ord_chrs_c & 0xE0) == 0xC0:
				$utf8 .= substr($chrs, $i, 2);
				++$i;
				break;
			case ($ord_chrs_c & 0xF0) == 0xE0:
				$utf8 .= substr($chrs, $i, 3);
				$i += 2;
				break;
			case ($ord_chrs_c & 0xF8) == 0xF0:
				$utf8 .= substr($chrs, $i, 4);
				$i += 3;
				break;
			case ($ord_chrs_c & 0xFC) == 0xF8:
				$utf8 .= substr($chrs, $i, 5);
				$i += 4;
				break;
			case ($ord_chrs_c & 0xFE) == 0xFC:
				$utf8 .= substr($chrs, $i, 6);
				$i += 5;
				break;
		}
	}
	return $utf8;
}



$campos = array();
$lineas = file('../recursos/inmuebles.properties');
$nl = true;



foreach($lineas AS $l) {
	$l = rtrim(ltrim($l), "\r\n");
	if(substr($l, 0, 1) == '#') {
		continue;
	}
	$l = decodificarUnicodeString($l);
	if($nl) {
		list($clave, $valor) = explode("=", $l, 2);
		$clave = trim($clave);
		if(empty($clave))
			continue;
		$campos[$clave] = $valor;
	}
	else {
		$campos[$clave] .= $valor = $l;
	}

	$largo = strlen($valor);
//	do {
		$ultimo_caracter = ord(substr($valor, --$largo, 1));
		if($ultimo_caracter == 0x5C) {
			$nl = false;
			$campos[$clave] .= "\n";
		}
		else {
			$nl = true;
		}
//	} while($ultimo_caracter != 0x0A && $ultimo_caracter != 0x0D);
}

var_dump($campos);

//$json = decodeUnicodeString('\u0417 \\\u0434 \\u0440\u0430\u0432\u0441\u0441\u0442\u0432\u0443\u0439\u0442\u0435 \u00e1\u00e9\u00ed\u00f3\u00faqwerty');
//$json = Zend_Json_Decoder::decodeUnicodeString('\u0417\u0434\u0440\u0430\u0432\u0441\u0441\u0442\u0432\u0443\u0439\u0442\u0435 \u00e1\u00e9\u00ed\u00f3\u00faqwerty', 1);
//$json = Zend_Json_Decoder::decode('{"a":"b","0":1,"1":2,"txt":"\u0417\u0434\u0440\u0430\u0432\u0441\u0441\u0442\u0432\u0443\u0439\u0442\u0435 \u00e1\u00e9\u00ed\u00f3\u00faqwerty"}', 1);

echo "\n\n\n";
//var_dump($json);


//$json = Zend_Json::decode("\u0417\u0434\u0440\u0430\u0432\u0441\u0441\u0442\u0432\u0443\u0439\u0442\u0435 \u00e1\u00e9\u00ed\u00f3\u00faqwerty");
//var_dump($json);

//$decoder = new Zend_Json_Decoder('{"a":"b","0":1,"1":2,"txt":"\u0417\u0434\u0440\u0430\u0432\u0441\u0441\u0442\u0432\u0443\u0439\u0442\u0435 \u00e1\u00e9\u00ed\u00f3\u00faqwerty"}', Zend_Json::TYPE_ARRAY);
?>

