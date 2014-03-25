<?php
$connection = mysqli_connect('localhost','root','','telerik');
if(!$connection){
echo 'no database';
exit;
}
mysqli_query($connection,'SET NAMES utf8');//същото е като mysqli_set_charset($connection,'utf8');
$q=mysqli_query($connection,'SELECT * FROM users');//заявката
if (!$q){
echo 'error in database';
echo mysqli_error($connection);//показва грешките в заявката или връзката
}
while($row=$q->fetch_assoc()){//показва инфото от заявката
echo $row;
}
?>
