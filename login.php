<?php

	if (session_status() == PHP_SESSION_NONE) session_start();

	$version = '2020.06.15';
	
// == validate password
	if (!empty($_POST['pwd']) && md5($_POST['pwd'])=="1d91331df1d29c73ddf48f3123418f46"){
		$_SESSION['LOGGED'] = '1';
		echo "<script>document.location='index.php';</script>";
		die();
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

	<link href="images/estilos_2020-01-25.css" rel="stylesheet" type="text/css" />

	<style>
		.file_list{text-align:center;margin:2rem;}
		.file_list a{display:block;padding:1rem 2rem;margin:2rem auto;max-width:400px; text-decoration:none;background-color:#000;color:#eee;font-size:1.5rem;}
		.file_list a:hover{box-shadow:0px 0px 7px 1px #fff;}
	</style>

</head>
<body>

	<?php if (!empty($_POST['pwd'])){ ?>
		<p style="color:yellow;text-align:center;">Contraseña errónea.</p>
	<?php } ?>

	<form method="post" id="login_form" style="margin-top:5rem;margin-bottom:7rem;">
		<p style="text-align:center;"><b>Contraseña</b><br /></p>
		<p style="text-align:center;">
			<input type="password" name="pwd" value=""
				style="line-height:3rem;font-size:1.5rem;padding:0 1rem;background-color:#333;color:yellow;border:1px #555 solid;"
				onkeypress="if(getKeyCode(event)==13){$('#login_form').submit();}"
            autocomplete="off" />
		</p>
	</form>

	<p id="signature"><a href="https://github.com/caos30/php_srrJSEncrypt" target="_blank">php_srrJSEncrypt - <?= $version ?></a> (C) 2015-2020 GPL v2 license</p>

</body>
</html>
