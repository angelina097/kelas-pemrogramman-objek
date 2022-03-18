<?php require_once('Connections/pemesananhotel.php'); ?>
<?php require_once('Connections/pemesananhotel.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO kamar (nmr_kamar, lantai, tipe_kamar, status, id_admin, nmr_fasilitas, harga) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nmr_kamar'], "int"),
                       GetSQLValueString($_POST['lantai'], "int"),
                       GetSQLValueString($_POST['tipe_kamar'], "int"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['id_admin'], "int"),
                       GetSQLValueString($_POST['nmr_fasilitas'], "int"),
                       GetSQLValueString($_POST['harga'], "text"));

  mysql_select_db($database_pemesananhotel, $pemesananhotel);
  $Result1 = mysql_query($insertSQL, $pemesananhotel) or die(mysql_error());

  $insertGoTo = "kamartampiladmin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

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
$query_homeadmin = "SELECT * FROM `admin`";
$homeadmin = mysql_query($query_homeadmin, $pemesananhotel) or die(mysql_error());
$row_homeadmin = mysql_fetch_assoc($homeadmin);
$totalRows_homeadmin = mysql_num_rows($homeadmin);

mysql_select_db($database_pemesananhotel, $pemesananhotel);
$query_kamartampiladmin = "SELECT * FROM kamar";
$kamartampiladmin = mysql_query($query_kamartampiladmin, $pemesananhotel) or die(mysql_error());
$row_kamartampiladmin = mysql_fetch_assoc($kamartampiladmin);
$totalRows_kamartampiladmin = mysql_num_rows($kamartampiladmin);

mysql_select_db($database_pemesananhotel, $pemesananhotel);
$query_kamartambahadmin = "SELECT * FROM kamar";
$kamartambahadmin = mysql_query($query_kamartambahadmin, $pemesananhotel) or die(mysql_error());
$row_kamartambahadmin = mysql_fetch_assoc($kamartambahadmin);
$totalRows_kamartambahadmin = mysql_num_rows($kamartambahadmin);
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
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nmr_kamar:</td>
      <td><input type="text" name="nmr_kamar" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lantai:</td>
      <td><input type="text" name="lantai" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipe_kamar:</td>
      <td><input type="text" name="tipe_kamar" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Status:</td>
      <td><input type="text" name="status" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_admin:</td>
      <td><input type="text" name="id_admin" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nmr_fasilitas:</td>
      <td><input type="text" name="nmr_fasilitas" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Harga:</td>
      <td><input type="text" name="harga" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p><a href="kamartampiladmin.php"><img src="gambar/207-2070585_back-png-image-background-transparent-background-back-icon-removebg-preview.png" width="30" height="30" />BACK</a></p>
</body>
</html>
<?php
mysql_free_result($homeadmin);

mysql_free_result($kamartampiladmin);

mysql_free_result($kamartambahadmin);
?>
