Rodicevitani OK :)

<?php
$link = mysql_connect('localhost', 'c1rodice', '9XnriVJ9l7ql');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Mysql Test OK';
mysql_close($link);
?>

