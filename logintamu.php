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
  $password=$_POST['password2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "home.php";
  $MM_redirectLoginFailed = "logingagaltamu.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_pemesananhotel, $pemesananhotel);
  
  $LoginRS__query=sprintf("SELECT id_tamu, nmr_ktp FROM tamu WHERE id_tamu=%s AND nmr_ktp=%s",
    GetSQLValueString($loginUsername, "int"), GetSQLValueString($password, "int")); 
   
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
<table width="453" border="0" align="center">
  <tr>
    <td width="447">SELAMAT DATANG DI ONLINE RESERVATION LUXURY </td>
  </tr>
</table>
<p align="center">LOGIN</p>
<p>&nbsp;</p>
<form id="form4" name="form4" method="POST" action="<?php echo $loginFormAction; ?>">
  <div align="center">
    <table width="200" border="0">
      <tr>
        <td rowspan="3"><img src="gambar/158069842-10c8623e-68aa-4204-b0ec-bc7219702fdd.png" width="168" height="120" /></td>
        <td>ID TAMU</td>
        <td><label for="username"></label>
        <input type="text" name="username" id="username" /></td>
      </tr>
      <tr>
        <td>PASSWORD</td>
        <td><label for="password2"></label>
        <input type="text" name="password2" id="password2" /></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="button2" id="button2" value="LOGIN" /></td>
      </tr>
    </table>
  </div>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>