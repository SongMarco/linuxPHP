<?php
include "../include/session.php";
include "../include/dbConnect.php";

$memberEmail = $_POST['InputEmail'];
$memberPw = md5($memberPw = $_POST['memberPw']);

$sql = "SELECT * FROM member WHERE memberEmailAddress = '{$memberEmail}' AND memberPassword = '{$memberPw}'";
$res = $dbConnect->query($sql);


$row = $res->fetch_array(MYSQLI_ASSOC);


if ($row != null) {
    $_SESSION['ses_userEmail'] = $row['memberEmailAddress'];
    $_SESSION['ses_userName'] = $row['memberName'];

    echo $_SESSION['ses_userName'].'님 로그인되셨습니다.';

    sleep(1);
    echo "<script>location.href='../index.php';</script>";
}

if($row == null){
    echo "로그인 실패 아이디 또는 비밀번호가 일치하지 않습니다.";
}
?>