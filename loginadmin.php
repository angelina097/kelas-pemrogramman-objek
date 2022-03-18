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
$query_loginadmin = "SELECT * FROM `admin`";
$loginadmin = mysql_query($query_loginadmin, $pemesananhotel) or die(mysql_error());
$row_loginadmin = mysql_fetch_assoc($loginadmin);
$totalRows_loginadmin = mysql_num_rows($loginadmin);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "homeadmin.php";
  $MM_redirectLoginFailed = "logingagaladmin.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_pemesananhotel, $pemesananhotel);
  
  $LoginRS__query=sprintf("SELECT id_admin, nama_admin FROM `admin` WHERE id_admin=%s AND nama_admin=%s",
    GetSQLValueString($loginUsername, "int"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $pemesananhotel) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
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
<table width="417" border="0" align="center">
  <tr>
    <td width="411">SELAMAT DATANG DI ONLINE RESERVATION LUXURY </td>
  </tr>
</table>
<p align="center">LOGIN</p>
<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
  <table width="406" border="0" align="center">
    <tr>
      <td colspan="2" rowspan="3"><img src="gambar/158069842-10c8623e-68aa-4204-b0ec-bc7219702fdd.png" width="135" height="96" /></td>
      <td width="86">ID ADMIN</td>
      <td width="171"><label for="username"></label>
      <input type="text" name="username" id="username" /></td>
    </tr>
    <tr>
      <td height="36">PASSWORD</td>
      <td><label for="password"></label>
      <input type="text" name="password" id="password" /></td>
    </tr>
    <tr>
      <td height="74"><input type="submit" name="button" id="button" value="Submit" /></td>
      <td><input type="submit" name="button2" id="button2" value="Submit" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($loginadmin);
?>
