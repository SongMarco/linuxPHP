<h1 class="title"><a href="../index.php">홈으로</a></h1>
<?php
include "../include/dbConnect.php";

$memberEmailAddress = $_POST['InputEmail'];
$memberName = $_POST['username'];
$memberPw = $_POST['InputPassword1'];
$memberPw2 = $_POST['InputPassword2'];

//PHP에서 유효성 재확인

//아이디 중복검사.
$sql = "SELECT * FROM member WHERE memberEmailAddress = '{$memberEmailAddress}'";
$res = $dbConnect->query($sql);
if($res->num_rows >= 1){
    echo '이미 존재하는 이메일이 있습니다.';
    exit;
}

//비밀번호 일치하는지 확인
if($memberPw !== $memberPw2){
    echo '비밀번호가 일치하지 않습니다.';
    exit;
}else{
    //비밀번호를 암호화 처리.
    $memberPw = md5($memberPw);
}

//이메일 주소가 올바른지
$checkEmailAddress = filter_var($memberEmailAddress, FILTER_VALIDATE_EMAIL);

if($checkEmailAddress != true){
    echo "올바른 이메일 주소가 아닙니다.";
    exit;
}

//이제부터 넣기 시작
$sql = "INSERT INTO member (memberEmailAddress, memberName, memberPassword) 
             VALUES('{$memberEmailAddress}','{$memberName}','{$memberPw}');";
if($dbConnect->query($sql)){
    echo "$memberName 님, 축하드립니다! 이메일 계정 $memberEmailAddress 주소로 회원가입이 완료되었습니다.";

}

?>





