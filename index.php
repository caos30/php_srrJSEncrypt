<?php /*
 *
 *  php_srrJSEncrypt :: an easy not-database depending system for store encrypted data using only javascript on client side
    Copyright (C) 2015-2019  caos30

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along
    with this program; if not, write to the Free Software Foundation, Inc.,
    51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 */ ?>
<?php

if (session_status() == PHP_SESSION_NONE) session_start();
if (empty($_SESSION['LOGGED'])) echo "<script>document.location='login.php';</script>";

$version = '2020.06.15';

// = get list of data files
	$scan = scandir(dirname(__FILE__).'/data/');
	$files = array();
	if (is_array($scan) && count($scan)>0){
		foreach ($scan as $name){
			if ($name!='.' && $name!='..') $files[] = $name;
		}
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns='http://www.w3.org/1999/xhtml'><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> JS-ENCRYPT </title>
<meta name="title" content="JS-ENCRYPT" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta http-equiv="pragma" content="no-cache" />
<meta name="revisit-after" content="7 days" />
<meta name="robots" content="nofollow" />

<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- favicons generated at https://realfavicongenerator.net -->

    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="images/favicon/manifest.json">
    <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="images/favicon/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="JSEncrypt">
    <meta name="application-name" content="JSEncrypt">
    <meta name="msapplication-config" content="images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

	<link href="images/estilos_2020-06-15.css" rel="stylesheet" type="text/css" />

</head>
<body>

	<div class="file_list">
	<?php 	$ii=0; 
			foreach ($files as $file){ 
				if ($file=='.htaccess') continue;
				$ii++; ?>
				<a href="open.php?file=<?= urlencode($file) ?>" id="shrtct_<?= $ii ?>" target="_blank"><span><?= $ii ?></span><?= str_replace(array('-','_'),' ',$file) ?></a>
	<?php 	} ?>
	</div>

	<p id="signature"><a href="https://github.com/caos30/php_srrJSEncrypt" target="_blank">php_srrJSEncrypt - <?= $version ?></a> (C) 2015-2020 GPL v2 license</p>
	
	<script>
		// == detect if the a numeric (1-9) keyboard is pressed (normal or numeric keyboard)
		// == to trigger the opening of the corresponding file
		var shrtct_ii = 0;
		document.onkeyup = function(e) {
			var key = e.which || e.keyCode;
			
			if (key==9){
				shrtct_ii++;
				if (shrtct_ii==1){
					document.getElementById('shrtct_'+shrtct_ii).focus();
				}else if (shrtct_ii > <?= $ii ?>){
					shrtct_ii = 1;
					document.getElementById('shrtct_'+shrtct_ii).focus();
				}else{
					// it's not necessary to change focus because the web browser do it by us
				}
			}
			
			//alert(key);
			return;
			/*
			var number = '';
			if (key == 49 || key == 97  ) { number = '1'; }else 
			if (key == 50 || key == 98  ) { number = '2'; }else 
			if (key == 51 || key == 99  ) { number = '3'; }else 
			if (key == 52 || key == 100 ) { number = '4'; }else 
			if (key == 53 || key == 101 ) { number = '5'; }else 
			if (key == 54 || key == 102 ) { number = '6'; }else 
			if (key == 55 || key == 103 ) { number = '7'; }else 
			if (key == 56 || key == 104 ) { number = '8'; }else 
			if (key == 57 || key == 105 ) { number = '9'; }
			if (number!='') document.getElementById('shrtct_'+number).focus();
			/*
				keyboard special keys: e.ctrlKey , e.altKey , e.shiftKey
				example: if (e.ctrlKey && key == 66) {}
			*/
		};
	</script>

</body>
</html>
