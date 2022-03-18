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
  $insertSQL = sprintf("INSERT INTO fasilitashotel (WiFi, kamar_mandi, TV, kopi, AC, Telepon, Oven, `Kitchen Set`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['WiFi'], "text"),
                       GetSQLValueString($_POST['kamar_mandi'], "text"),
                       GetSQLValueString($_POST['TV'], "text"),
                       GetSQLValueString($_POST['kopi'], "text"),
                       GetSQLValueString($_POST['AC'], "text"),
                       GetSQLValueString($_POST['Telepon'], "text"),
                       GetSQLValueString($_POST['Oven'], "text"),
                       GetSQLValueString($_POST['Kitchen_Set'], "text"));

  mysql_select_db($database_pemesananhotel, $pemesananhotel);
  $Result1 = mysql_query($insertSQL, $pemesananhotel) or die(mysql_error());

  $insertGoTo = "fasilitashoteltampil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_pemesananhotel, $pemesananhotel);
$query_fasilitashoteltambah = "SELECT * FROM fasilitashotel";
$fasilitashoteltambah = mysql_query($query_fasilitashoteltambah, $pemesananhotel) or die(mysql_error());
$row_fasilitashoteltambah = mysql_fetch_assoc($fasilitashoteltambah);
$totalRows_fasilitashoteltambah = mysql_num_rows($fasilitashoteltambah);
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
<p>FASILITAS HOTEL</p>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">WiFi:</td>
      <td><input type="text" name="WiFi" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kamar_mandi:</td>
      <td><input type="text" name="kamar_mandi" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">TV:</td>
      <td><input type="text" name="TV" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kopi:</td>
      <td><input type="text" name="kopi" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">AC:</td>
      <td><input type="text" name="AC" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Telepon:</td>
      <td><input type="text" name="Telepon" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Oven:</td>
      <td><input type="text" name="Oven" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kitchen Set:</td>
      <td><input type="text" name="Kitchen_Set" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<table width="306" border="0">
  <tr>
    <td width="1419"><p>BAR</p>
    <p><img src="gambar/bar.jpg" width="300" height="200" /></p></td>
  </tr>
</table>
<table width="200" border="0">
  <tr>
    <td><p>GYM</p>
    <p><img src="gambar/hotelimage.jpg" width="300" height="200" /></p></td>
  </tr>
</table>
<table width="200" border="0">
  <tr>
    <td><p>PARKING AREA</p>
    <p><img src="gambar/GettyImages-967770724_0.jpg" width="300" height="200" /></p></td>
  </tr>
</table>
<table width="200" border="0">
  <tr>
    <td><p>KOLAM RENANG</p>
    <p><img src="gambar/158069890-4ddb150d-eb6a-4160-b12b-f4617087999c.jpg" width="300" height="200" /></p></td>
  </tr>
</table>
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
mysql_free_result($fasilitashoteltambah);
?>
