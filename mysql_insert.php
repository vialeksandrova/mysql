<html>
<head></head>
<body>
<form method="POST">
<textarea name="txt"></textarea>
<input type="submit" value="Insert"/>
</form>
<?php
$connection = mysqli_connect('localhost','root','','telerik');
if(!$connection){
echo 'no database';
exit;
}
mysqli_query($connection,'SET NAMES utf8');//същото е като mysqli_set_charset($connection,'utf8');
if($_POST){
$msg=trim($_POST['txt']);
$msg= msqli_real_escape_string($connection,$msg);
$sql='INSERT INTO msg([msg_data]) VALUES ("'.$msg.'")';
if(mysqli_query($connection,$sql)){
echo 'OK';
}
else{
echo 'Error';
echo mysqli_error($connection);
}
}
?>
</body>
</html>
