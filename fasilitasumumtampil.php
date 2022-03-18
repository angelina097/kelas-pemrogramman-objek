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
$query_fasilitasumumtampil = "SELECT * FROM fasilitasumum";
$fasilitasumumtampil = mysql_query($query_fasilitasumumtampil, $pemesananhotel) or die(mysql_error());
$row_fasilitasumumtampil = mysql_fetch_assoc($fasilitasumumtampil);
$totalRows_fasilitasumumtampil = mysql_num_rows($fasilitasumumtampil);
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
    <td width="1085" height="94"><p align="center">FASILITAS UMUM</p>
      <div align="center">
        <table border="1">
          <tr>
            <td bgcolor="#993399"><div align="center">kolam_renang</div></td>
            <td bgcolor="#0033FF"><div align="center">GYM</div></td>
            <td bgcolor="#99CC99"><div align="center">parking_area</div></td>
            <td bgcolor="#FF3399"><div align="center">BAR</div></td>
          </tr>
          <?php do { ?>
            <tr>
              <td height="23"><div align="center"><?php echo $row_fasilitasumumtampil['kolam_renang']; ?></div></td>
              <td><div align="center"><?php echo $row_fasilitasumumtampil['GYM']; ?></div></td>
              <td><div align="center"><?php echo $row_fasilitasumumtampil['parking_area']; ?></div></td>
              <td><div align="center"><?php echo $row_fasilitasumumtampil['BAR']; ?></div></td>
            </tr>
            <?php } while ($row_fasilitasumumtampil = mysql_fetch_assoc($fasilitasumumtampil)); ?>
        </table>
    </div></td>
  </tr>
</table>
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
mysql_free_result($fasilitasumumtampil);
?>
