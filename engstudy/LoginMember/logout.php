<?php
include "../include/session.php";
include "../index.php";
include "../freeboard2/index.php";

echo $_SESSION['ses_userName'].'님 로그아웃 하겠습니다.';

unset($_SESSION['ses_userName']);
unset($_SESSION['ses_userEmail']);
unset($_SESSION['log_status']);


if($_SESSION['ses_userid'] == null){
    echo '로그아웃 완료 ';


//
//    header("location:".$prevPage);
    // prevpage는 이전 페이지! index.php or freeboard -> index.php에서 가져온다
    echo "<script>history.go(-1);</script>";
}
?>