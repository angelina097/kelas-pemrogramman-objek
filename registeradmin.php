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
  $insertSQL = sprintf("INSERT INTO `admin` (id_admin, nama_admin, password) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['id_admin'], "int"),
                       GetSQLValueString($_POST['nama_admin'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_pemesananhotel, $pemesananhotel);
  $Result1 = mysql_query($insertSQL, $pemesananhotel) or die(mysql_error());

  $insertGoTo = "loginadmin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_pemesananhotel, $pemesananhotel);
$query_registeradmin = "SELECT * FROM `admin`";
$registeradmin = mysql_query($query_registeradmin, $pemesananhotel) or die(mysql_error());
$row_registeradmin = mysql_fetch_assoc($registeradmin);
$totalRows_registeradmin = mysql_num_rows($registeradmin);
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
<table width="453" border="0" align="center">
  <tr>
    <td width="447">SELAMAT DATANG DI ONLINE RESERVATION LUXURY </td>
  </tr>
</table>
<table width="200" height="90" border="0" align="center">
  <tr>
    <td height="86"><p>SILAHKAN REGISTRASI</p>
      <p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_admin:</td>
      <td><input type="text" name="id_admin" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama_admin:</td>
      <td><input type="text" name="nama_admin" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td><input type="text" name="password" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($registeradmin);
?>
