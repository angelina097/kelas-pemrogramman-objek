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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE kamar SET lantai=%s, tipe_kamar=%s, status=%s, id_admin=%s, nmr_fasilitas=%s, harga=%s WHERE nmr_kamar=%s",
                       GetSQLValueString($_POST['lantai'], "int"),
                       GetSQLValueString($_POST['tipe_kamar'], "int"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['id_admin'], "int"),
                       GetSQLValueString($_POST['nmr_fasilitas'], "int"),
                       GetSQLValueString($_POST['harga'], "text"),
                       GetSQLValueString($_POST['nmr_kamar'], "int"));

  mysql_select_db($database_pemesananhotel, $pemesananhotel);
  $Result1 = mysql_query($updateSQL, $pemesananhotel) or die(mysql_error());

  $updateGoTo = "kamartampiladmin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_kamareditadmin = "-1";
if (isset($_GET['nmr_kamar'])) {
  $colname_kamareditadmin = $_GET['nmr_kamar'];
}
mysql_select_db($database_pemesananhotel, $pemesananhotel);
$query_kamareditadmin = sprintf("SELECT * FROM kamar WHERE nmr_kamar = %s", GetSQLValueString($colname_kamareditadmin, "int"));
$kamareditadmin = mysql_query($query_kamareditadmin, $pemesananhotel) or die(mysql_error());
$row_kamareditadmin = mysql_fetch_assoc($kamareditadmin);
$totalRows_kamareditadmin = mysql_num_rows($kamareditadmin);
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
      <td><?php echo $row_kamareditadmin['nmr_kamar']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lantai:</td>
      <td><input type="text" name="lantai" value="<?php echo htmlentities($row_kamareditadmin['lantai'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipe_kamar:</td>
      <td><input type="text" name="tipe_kamar" value="<?php echo htmlentities($row_kamareditadmin['tipe_kamar'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Status:</td>
      <td><input type="text" name="status" value="<?php echo htmlentities($row_kamareditadmin['status'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_admin:</td>
      <td><input type="text" name="id_admin" value="<?php echo htmlentities($row_kamareditadmin['id_admin'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nmr_fasilitas:</td>
      <td><input type="text" name="nmr_fasilitas" value="<?php echo htmlentities($row_kamareditadmin['nmr_fasilitas'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Harga:</td>
      <td><input type="text" name="harga" value="<?php echo htmlentities($row_kamareditadmin['harga'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="nmr_kamar" value="<?php echo $row_kamareditadmin['nmr_kamar']; ?>" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($kamareditadmin);
?>
