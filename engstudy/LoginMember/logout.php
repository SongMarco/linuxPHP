<?php
include "../include/session.php";
include "../index.php";
include "../freeboard2/index.php";

echo $_SESSION['ses_userName'].'님 로그아웃 하겠습니다.';

unset($_SESSION['ses_userName']);
unset($_SESSION['ses_userEmail']);
unset($_SESSION['log_status']);


session_unset();     // 현재 연결된 세션에 등록되어 있는 모든 변수의 값을 삭제한다


if(session_destroy()){
    echo '로그아웃 완료 ';




//
//    header("location:".$prevPage);
    // prevpage는 이전 페이지! index.php or freeboard -> index.php에서 가져온다
    echo "<script>history.go(-1);</script>";
}
?>