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

if ((isset($_GET['kolam_renang'])) && ($_GET['kolam_renang'] != "")) {
  $deleteSQL = sprintf("DELETE FROM fasilitasumum WHERE kolam_renang=%s",
                       GetSQLValueString($_GET['kolam_renang'], "text"));

  mysql_select_db($database_pemesananhotel, $pemesananhotel);
  $Result1 = mysql_query($deleteSQL, $pemesananhotel) or die(mysql_error());

  $deleteGoTo = "fasilitasumumtampiladmin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_fasilitasumumadminhapus = "-1";
if (isset($_GET['kolam_renang'])) {
  $colname_fasilitasumumadminhapus = $_GET['kolam_renang'];
}
mysql_select_db($database_pemesananhotel, $pemesananhotel);
$query_fasilitasumumadminhapus = sprintf("SELECT * FROM fasilitasumum WHERE kolam_renang = %s", GetSQLValueString($colname_fasilitasumumadminhapus, "text"));
$fasilitasumumadminhapus = mysql_query($query_fasilitasumumadminhapus, $pemesananhotel) or die(mysql_error());
$row_fasilitasumumadminhapus = mysql_fetch_assoc($fasilitasumumadminhapus);
$totalRows_fasilitasumumadminhapus = mysql_num_rows($fasilitasumumadminhapus);
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($fasilitasumumadminhapus);
?>
