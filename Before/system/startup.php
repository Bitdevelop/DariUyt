<?php
// Error Reporting
//error_reporting(E_ALL);
error_reporting(E_ALL ^ E_NOTICE);

// Check Version
if (version_compare(phpversion(), '5.2.0', '<') == true) {
	exit('PHP5.2+ Required');
}

// Register Globals
if (ini_get('register_globals')) {
	ini_set('session.use_cookies', 'On');
	ini_set('session.use_trans_sid', 'Off');

	session_set_cookie_params(0, '/');
	session_start();

	$globals = array($_REQUEST, $_SESSION, $_SERVER, $_FILES);

	foreach ($globals as $global) {
		foreach(array_keys($global) as $key) {
			unset(${$key});
		}
	}
}

// Magic Quotes Fix
if (ini_get('magic_quotes_gpc')) {
	function clean($data) {
   		if (is_array($data)) {
  			foreach ($data as $key => $value) {
    			$data[clean($key)] = clean($value);
  			}
		} else {
  			$data = stripslashes($data);
		}

		return $data;
	}

	$_GET = clean($_GET);
	$_POST = clean($_POST);
	$_REQUEST = clean($_REQUEST);
	$_COOKIE = clean($_COOKIE);
}

if (!ini_get('date.timezone')) {
	date_default_timezone_set('UTC');
}

// Windows IIS Compatibility
if (!isset($_SERVER['DOCUMENT_ROOT'])) {
	if (isset($_SERVER['SCRIPT_FILENAME'])) {
		$_SERVER['DOCUMENT_ROOT'] = str_replace('\\', '/', substr($_SERVER['SCRIPT_FILENAME'], 0, 0 - strlen($_SERVER['PHP_SELF'])));
	}
}

if (!isset($_SERVER['DOCUMENT_ROOT'])) {
	if (isset($_SERVER['PATH_TRANSLATED'])) {
		$_SERVER['DOCUMENT_ROOT'] = str_replace('\\', '/', substr(str_replace('\\\\', '\\', $_SERVER['PATH_TRANSLATED']), 0, 0 - strlen($_SERVER['PHP_SELF'])));
	}
}

if (!isset($_SERVER['REQUEST_URI'])) {
	$_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'], 1);

	if (isset($_SERVER['QUERY_STRING'])) {
		$_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
	}
}

// Helper
require_once(DIR_SYSTEM . 'helper/json.php');
require_once(DIR_SYSTEM . 'helper/utf8.php');

// Engine
require_once(DIR_SYSTEM . 'engine/action.php');
require_once(DIR_SYSTEM . 'engine/controller.php');
require_once(DIR_SYSTEM . 'engine/front.php');
require_once(DIR_SYSTEM . 'engine/loader.php');
require_once(DIR_SYSTEM . 'engine/model.php');
require_once(DIR_SYSTEM . 'engine/registry.php');

// Common
require_once(DIR_SYSTEM . 'library/cache.php');
require_once(DIR_SYSTEM . 'library/url.php');
require_once(DIR_SYSTEM . 'library/config.php');
require_once(DIR_SYSTEM . 'library/db.php');
require_once(DIR_SYSTEM . 'library/document.php');
require_once(DIR_SYSTEM . 'library/encryption.php');
require_once(DIR_SYSTEM . 'library/image.php');
require_once(DIR_SYSTEM . 'library/language.php');
require_once(DIR_SYSTEM . 'library/log.php');
require_once(DIR_SYSTEM . 'library/mail.php');
require_once(DIR_SYSTEM . 'library/pagination.php');
require_once(DIR_SYSTEM . 'library/request.php');
require_once(DIR_SYSTEM . 'library/response.php');
require_once(DIR_SYSTEM . 'library/session.php');
require_once(DIR_SYSTEM . 'library/template.php');









	function translit ( $string ) {
		$converter = array(
			"�"=>"a",	"�"=>"a",
			"�"=>"b",	"�"=>"b",
			"�"=>"v",	"�"=>"v",
			"�"=>"g",	"�"=>"g",
			"�"=>"d",	"�"=>"d",
			"�"=>"e",	"�"=>"e",
			"�"=>"e",	"�"=>"e",
			"�"=>"e",	"�"=>"e",
			"�"=>"zh",	"�"=>"zh",
			"�"=>"z",	"�"=>"z",
			"�"=>"i",	"�"=>"i",
			"�"=>"i",	"�"=>"i",
			"�"=>"ji",	"�"=>"ji",
			"�"=>"j",	"�"=>"j",
			"�"=>"k",	"�"=>"k",
			"�"=>"l",	"�"=>"l",
			"�"=>"m",	"�"=>"m",
			"�"=>"n",	"�"=>"n",
			"�"=>"o",	"�"=>"o",
			"�"=>"p",	"�"=>"p",
			"�"=>"r",	"�"=>"r",
			"�"=>"s",	"�"=>"s",
			"�"=>"t",	"�"=>"t",
			"�"=>"u",	"�"=>"u",
			"�"=>"f",	"�"=>"f",
			"�"=>"h",	"�"=>"h",
			"�"=>"c",	"�"=>"c",
			"�"=>"ch",	"�"=>"ch",
			"�"=>"sh",	"�"=>"sh",
			"�"=>"shh",	"�"=>"shh",
			"�"=>"",	"�"=>"",
			"�"=>"",	"�"=>"",
			"�"=>"y",	"�"=>"y",
			"�"=>"e",	"�"=>"e",
			"�"=>"yu",	"�"=>"yu",
			"�"=>"ya",	"�"=>"ya",

			"а"=>"a",	"А"=>"a",
			"б"=>"b",	"Б"=>"b",
			"в"=>"v",	"В"=>"v",
			"г"=>"g",	"Г"=>"g",
			"д"=>"d",	"Д"=>"d",
			"е"=>"e",	"Е"=>"e",
			"є"=>"e",	"Є"=>"e",
			"ё"=>"e",	"Ё"=>"e",
			"ж"=>"zh",	"Ж"=>"zh",
			"з"=>"z",	"З"=>"z",
			"и"=>"i",	"И"=>"i",
			"і"=>"i",	"І"=>"i",
			"ї"=>"ji",	"Ї"=>"ji",
			"й"=>"j",	"Й"=>"j",
			"к"=>"k",	"К"=>"k",
			"л"=>"l",	"Л"=>"l",
			"м"=>"m",	"М"=>"m",
			"н"=>"n",	"Н"=>"n",
			"о"=>"o",	"О"=>"o",
			"п"=>"p",	"П"=>"p",
			"р"=>"r",	"Р"=>"r",
			"с"=>"s",	"С"=>"s",
			"т"=>"t",	"Т"=>"t",
			"у"=>"u",	"У"=>"u",
			"ф"=>"f",	"Ф"=>"f",
			"х"=>"h",	"Х"=>"h",
			"ц"=>"c",	"Ц"=>"c",
			"ч"=>"ch",	"Ч"=>"ch",
			"ш"=>"sh",	"Ш"=>"sh",
			"щ"=>"shh",	"Щ"=>"shh",
			"ь"=>"",	"Ь"=>"",
			"ъ"=>"",	"Ъ"=>"",
			"ы"=>"y",	"Ы"=>"y",
			"э"=>"e",	"Э"=>"e",
			"ю"=>"yu",	"Ю"=>"yu",
			"я"=>"ya",	"Я"=>"ya",

			" "=>"-"
		);
		$result = strtolower( strtr( $string, $converter ) );
		//[^-0-9a-z\.\/_]
		$result = preg_replace("/[^-0-9a-z]/","-",$result);
		do {
			$result = str_replace( "--", "-", $result, $count );
		} while( $count );
		return trim( $result, "-" );
	}

	function trim_spaces($str) {
		do {
			$str = str_replace("  ", " ", $str, $count);
		} while( $count );
		return trim($str);
	}

class File_FGetCSV {

	static public function fgetcsv($f, $d=";", $q='"') {
		$list = array();
		$st = fgets($f);
		if ($st === false || $st === null) return $st;
		while ($st !== "" && $st !== false) {
			if ($st[0] !== $q) {
				# Non-quoted.
				list ($field) = explode($d, $st, 2);
				$st = substr($st, strlen($field)+strlen($d));
			} else {
				# Quoted field.
				$st = substr($st, 1);
				$field = "";
				while (1) {
					# Find until finishing quote (EXCLUDING) or eol (including)
					preg_match("/^((?:[^$q]+|$q$q)*)/sx", $st, $p);
					$part = $p[1];
					$partlen = strlen($part);
					$st = substr($st, strlen($p[0]));
					$field .= str_replace($q.$q, $q, $part);
					if (strlen($st) && $st[0] === $q) {
						# Found finishing quote.
						list ($dummy) = explode($d, $st, 2);
						$st = substr($st, strlen($dummy)+strlen($d));
						break;
					} else {
						# No finishing quote - newline.
						$st = fgets($f);
					}
				}

			}
			$list[] = $field;
		}
		return $list;
	}

	static public function fputcsv($f, $list, $d=";", $q='"') {
		$line = "";
		foreach ($list as $field) {
			# remove any windows new lines,
			# as they interfere with the parsing at the other end
			$field = str_replace("\r\n", "\n", $field);
			# if a deliminator char, a double quote char or a newline
			# are in the field, add quotes
			if(ereg("[$d$q\n\r]", $field)) {
				$field = $q.str_replace($q, $q.$q, $field).$q;
			}
			$line .= $field.$d;
		}
		# strip the last deliminator
		$line = substr($line, 0, -1);
		# add the newline
		$line .= "\n";
		# we don't care if the file pointer is invalid,
		# let fputs take care of it
		return fputs($f, $line);
	}
}

?>