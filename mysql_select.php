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
$q=mysqli_query($connection,'SELECT * FROM users');//така се ползват и останали заявки - DELETE, UPDATE, SELECT, INSERT
if(!$q){
echo 'error';
}
if($q->num_rows>0){//ако няма информация, която да покажем в табл., се изкарва No results
echo '<table><tr><td>Username</td></tr>';
while($row=$q->fetch_assoc()){//изкарва всички данни от колоната в таблица
echo '<tr><td>'.$row['user_name'].'</td></tr>';
}}
else{
echo 'No results';
}

/* друго ползване на select, можем да задаваме наши имена на полетата от табл. след as
$q=mysqli_query($connection,'SELECT user_name as user,age FROM users WHERE age>=18 ORDER BY age DESC LIMIT 0,10');//DESC - низходящ;ASC- възходящ; LIMIT- от кой до кой запис да покаже
if(!$q){
echo 'error';
}
if($q->num_rows>0){//ако няма информация, която да покажем в табл., се изкарва No results
echo '<table><tr><td>Username</td><td>Age</td></tr>';
while($row=$q->fetch_assoc()){//изкарва всички данни от колоната в таблица
echo '<tr><td>'.$row['user'].'</td><td>'.$row['age'].'</td></tr>';
}}
else{
echo 'No results';
}
*/
?>
</body>
</html>
