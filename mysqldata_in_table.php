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

for($i=1;$i<=500;i++){  //бърз начин за създаване на голям брой записи в таблица чрез while
$sql='INSERT INTO users(user_name, password, age, is_active) VALUES("test'.$i.'","qwerty",'.rand(3,65)','.rand(0,1).')';//за всяко поле - user_name, password, age, is_active въвеждаме стойност
mysqli_query($connection, '$sql')
}
if($_POST){
$msg=trim($_POST['txt']);
$msg=msqli_real_escape_string($connection,$msg);
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
