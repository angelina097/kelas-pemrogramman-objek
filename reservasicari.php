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

$colname_reservasicari = "-1";
if (isset($_GET['search'])) {
  $colname_reservasicari = $_GET['search'];
}
mysql_select_db($database_pemesananhotel, $pemesananhotel);
$query_reservasicari = sprintf("SELECT * FROM reservasi WHERE nama_tamu = %s", GetSQLValueString($colname_reservasicari, "text"));
$reservasicari = mysql_query($query_reservasicari, $pemesananhotel) or die(mysql_error());
$row_reservasicari = mysql_fetch_assoc($reservasicari);
$totalRows_reservasicari = mysql_num_rows($reservasicari);

$colname_reservasicari = "-1";
if (isset($_POST['search'])) {
  $colname_reservasicari = $_POST['search'];
}
mysql_select_db($database_pemesananhotel, $pemesananhotel);
$query_reservasicari = sprintf("SELECT * FROM reservasi WHERE id_reservasi = %s", GetSQLValueString($colname_reservasicari, "int"));
$reservasicari = mysql_query($query_reservasicari, $pemesananhotel) or die(mysql_error());
$row_reservasicari = mysql_fetch_assoc($reservasicari);
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
<p align="center">DATA RESERVASI</p>
<form id="form1" name="form1" method="get" action="">
  <label for="search"></label>
  <input type="text" name="search" id="search" />
  <input type="submit" name="search2" id="search2" value="SEARCH" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="1">
  <tr>
    <td>id_reservasi</td>
    <td>nama_tamu</td>
    <td>jmlh_tamu</td>
    <td>jmlh_hari</td>
    <td>tipe_kmr</td>
    <td>tgl_reservasi</td>
    <td>tgl_checkin</td>
    <td>tgl_checkout</td>
    <td>id_resepsionis</td>
    <td>nmr_kamar</td>
    <td>id_tamu</td>
  </tr>
  <tr>
    <td><?php echo $row_reservasi['id_reservasi']; ?></td>
    <td><?php echo $row_reservasi['nama_tamu']; ?></td>
    <td><?php echo $row_reservasi['jmlh_tamu']; ?></td>
    <td><?php echo $row_reservasi['jmlh_hari']; ?></td>
    <td><?php echo $row_reservasi['tipe_kmr']; ?></td>
    <td><?php echo $row_reservasi['tgl_reservasi']; ?></td>
    <td><?php echo $row_reservasi['tgl_checkin']; ?></td>
    <td><?php echo $row_reservasi['tgl_checkout']; ?></td>
    <td><?php echo $row_reservasi['id_resepsionis']; ?></td>
    <td><?php echo $row_reservasi['nmr_kamar']; ?></td>
    <td><?php echo $row_reservasi['id_tamu']; ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($reservasicari);
?>
