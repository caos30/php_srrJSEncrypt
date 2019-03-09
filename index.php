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

$version = '1.2';

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

	<link href="images/estilos.css" rel="stylesheet" type="text/css" />

	<style>
		.file_list{text-align:center;margin:2rem;}
		.file_list a{display:block;padding:1rem 2rem;margin:2rem auto;max-width:400px; text-decoration:none;background-color:#000;color:#eee;font-size:1.5rem;}
		.file_list a:hover{box-shadow:0px 0px 7px 1px #fff;}
	</style>

</head>
<body>

	<div class="file_list">
	<?php foreach ($files as $file){ ?>
		<a href="open.php?file=<?= urlencode($file) ?>"><?= str_replace(array('-','_'),' ',$file) ?></a>
	<?php } ?>
	</div>

	<p id="signature"><a href="https://github.com/caos30/php_srrJSEncrypt" target="_blank">php_srrJSEncrypt - v<?= $version ?></a> (C) 2015-2019 GPL v2 license</p>

</body>
</html>
