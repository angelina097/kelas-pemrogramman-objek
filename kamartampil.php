<?php require_once('Connections/pemesananhotel.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_pemesananhotel, $pemesananhotel);
$query_kamartampil = "SELECT * FROM kamar";
$kamartampil = mysql_query($query_kamartampil, $pemesananhotel) or die(mysql_error());
$row_kamartampil = mysql_fetch_assoc($kamartampil);
$totalRows_kamartampil = mysql_num_rows($kamartampil);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	background-image: url(gambar/158069878-215336fa-49fc-4ba0-9c3f-497045c87648.jpg);
	background-repeat: repeat;
}
</style>
</head>

<body>
<p>TIPE KAMAR </p>
<table width="200" border="0">
  <tr>
    <td><p>SINGLE BED</p>
    <p><img src="gambar/single-bed-cozy-and-clean.jpg" width="300" height="200" /></p></td>
  </tr>
</table> 
<table width="200" border="0">
  <tr>
    <td><p>TWIN BED</p>
    <p><img src="gambar/158069923-9fab2ff5-49b4-4182-a9c9-a5f91fc00b34.jpg" width="300" height="200" /></p></td>
  </tr>
</table>
<table width="200" border="0">
  <tr>
    <td><p>DOUBLE BED</p>
    <p><img src="gambar/photo-double-bed-view-the-journey-hotel-desain-arsitek-oleh-arsatama-architect.jpeg" width="300" height="200" /></p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p> <a href="daftar.php"><img src="gambar/5361032-removebg-preview.png" width="77" height="77" /></a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($kamartampil);
?>
