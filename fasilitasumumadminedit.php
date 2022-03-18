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
  $updateSQL = sprintf("UPDATE fasilitasumum SET GYM=%s, parking_area=%s, BAR=%s WHERE kolam_renang=%s",
                       GetSQLValueString($_POST['GYM'], "text"),
                       GetSQLValueString($_POST['parking_area'], "text"),
                       GetSQLValueString($_POST['BAR'], "text"),
                       GetSQLValueString($_POST['kolam_renang'], "text"));

  mysql_select_db($database_pemesananhotel, $pemesananhotel);
  $Result1 = mysql_query($updateSQL, $pemesananhotel) or die(mysql_error());

  $updateGoTo = "fasilitasumumtampiladmin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_fasilitasumumadminedit = "-1";
if (isset($_GET['kolam_renang'])) {
  $colname_fasilitasumumadminedit = $_GET['kolam_renang'];
}
mysql_select_db($database_pemesananhotel, $pemesananhotel);
$query_fasilitasumumadminedit = sprintf("SELECT * FROM fasilitasumum WHERE kolam_renang = %s", GetSQLValueString($colname_fasilitasumumadminedit, "text"));
$fasilitasumumadminedit = mysql_query($query_fasilitasumumadminedit, $pemesananhotel) or die(mysql_error());
$row_fasilitasumumadminedit = mysql_fetch_assoc($fasilitasumumadminedit);
$totalRows_fasilitasumumadminedit = mysql_num_rows($fasilitasumumadminedit);
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
	background-color: #00C;
}
</style>
</head>

<body>
<table width="1091" border="0">
  <tr>
    <td width="1085" height="94"><p align="center">EDIT FASILITAS UMUM</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kolam_renang:</td>
      <td><?php echo $row_fasilitasumumadminedit['kolam_renang']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">GYM:</td>
      <td><input type="text" name="GYM" value="<?php echo htmlentities($row_fasilitasumumadminedit['GYM'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Parking_area:</td>
      <td><input type="text" name="parking_area" value="<?php echo htmlentities($row_fasilitasumumadminedit['parking_area'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">BAR:</td>
      <td><input type="text" name="BAR" value="<?php echo htmlentities($row_fasilitasumumadminedit['BAR'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="kolam_renang" value="<?php echo $row_fasilitasumumadminedit['kolam_renang']; ?>" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a href="home.php"><img src="gambar/207-2070585_back-png-image-background-transparent-background-back-icon-removebg-preview.png" width="50" height="49" />BACK</a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($fasilitasumumadminedit);
?>
