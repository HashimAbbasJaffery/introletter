<?php

$sname= 'localhost';
$unmae= 'gwadtiil_intro_letter';
$password = 'HXiDzGF4xulB';
$db_name = 'gwadtiil_intro';

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}