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
$query_fasilitashoteltampil = "SELECT * FROM fasilitashotel";
$fasilitashoteltampil = mysql_query($query_fasilitashoteltampil, $pemesananhotel) or die(mysql_error());
$row_fasilitashoteltampil = mysql_fetch_assoc($fasilitashoteltampil);
$totalRows_fasilitashoteltampil = mysql_num_rows($fasilitashoteltampil);
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
<table border="1">
  <tr>
    <td>WiFi</td>
    <td>kamar_mandi</td>
    <td>TV</td>
    <td>kopi</td>
    <td>AC</td>
    <td>Telepon</td>
    <td>Oven</td>
    <td>Kitchen Set</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_fasilitashoteltampil['WiFi']; ?></td>
      <td><?php echo $row_fasilitashoteltampil['kamar_mandi']; ?></td>
      <td><?php echo $row_fasilitashoteltampil['TV']; ?></td>
      <td><?php echo $row_fasilitashoteltampil['kopi']; ?></td>
      <td><?php echo $row_fasilitashoteltampil['AC']; ?></td>
      <td><?php echo $row_fasilitashoteltampil['Telepon']; ?></td>
      <td><?php echo $row_fasilitashoteltampil['Oven']; ?></td>
      <td><?php echo $row_fasilitashoteltampil['Kitchen Set']; ?></td>
      <td><a href="fasilitashoteltambah.php">add</a></td>
      <td><a href="fasilitashoteledit.php?WiFi=<?php echo $row_fasilitashoteltampil['WiFi']; ?>">edit</a></td>
      <td><a href="fasilitashotelhapus.php?WiFi=<?php echo $row_fasilitashoteltampil['WiFi']; ?>">hapus</a></td>
    </tr>
    <?php } while ($row_fasilitashoteltampil = mysql_fetch_assoc($fasilitashoteltampil)); ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($fasilitashoteltampil);
?>
