<?php
echo "MySql 연결 테스트<br>";




$db = mysqli_connect("localhost", "root", "dbdb", "dbtest");

if($db){
    echo "connect : 성공<br>";
}
else{
    echo "disconnect : 실패<br>";
}

$result = mysqli_query($db, 'SELECT VERSION() as VERSION');

$sql = "create table php_tbl(num int, name varchar(10))";

mysqli_query($db, $sql);

$data = mysqli_fetch_assoc($result);
echo $data['VERSION'];
?>
