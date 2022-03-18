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

mysql_select_db($database_pemesananhotel, $pemesananhotel);
$query_kamartampiladmin = "SELECT * FROM kamar";
$kamartampiladmin = mysql_query($query_kamartampiladmin, $pemesananhotel) or die(mysql_error());
$row_kamartampiladmin = mysql_fetch_assoc($kamartampiladmin);
$totalRows_kamartampiladmin = mysql_num_rows($kamartampiladmin);
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
<p>TAMPIL DATA KAMAR ADMIN</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="1">
  <tr>
    <td>nmr_kamar</td>
    <td>lantai</td>
    <td>tipe_kamar</td>
    <td>status</td>
    <td>id_admin</td>
    <td>nmr_fasilitas</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_kamartampiladmin['nmr_kamar']; ?></td>
      <td><?php echo $row_kamartampiladmin['lantai']; ?></td>
      <td><?php echo $row_kamartampiladmin['tipe_kamar']; ?></td>
      <td><?php echo $row_kamartampiladmin['status']; ?></td>
      <td><?php echo $row_kamartampiladmin['id_admin']; ?></td>
      <td><?php echo $row_kamartampiladmin['nmr_fasilitas']; ?></td>
    </tr>
    <?php } while ($row_kamartampiladmin = mysql_fetch_assoc($kamartampiladmin)); ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($kamartampiladmin);
?>
