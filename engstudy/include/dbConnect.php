<?php
$host = 'localhost';
$user = 'root';
$passWord = 'dbdb';
$dbName = 'dbMember';

$dbConnect = new mysqli($host,$user,$passWord,$dbName);
$query = mysqli_query($dbConnect, 'set names utf8');





?>