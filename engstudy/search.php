<?php
include "./include/dbConnect.php";

$searchWord = $_GET['searchWord'];

//PHP에서 유효성 재확인

//키워드 중복 검사
$sql = "SELECT * FROM search WHERE searchWord = '{$searchWord}'";
$res = $dbConnect->query($sql);
// 일치하는 단어를 찾았다.
if($res->num_rows >= 1){
    while( $row = mysqli_fetch_array($res) ){   //데이터가 존재할경우 반복 실행, 한줄 한줄 출력.
        $searchWord = $row[searchWord];
        $searchKor = $row[searchKor];

        echo "$searchWord ";
        echo "$searchKor ";
        echo "<br>";
    }
}
//
////비밀번호 일치하는지 확인
//if($memberPw !== $memberPw2){
//    echo '비밀번호가 일치하지 않습니다.';
//    exit;
//}else{
//    //비밀번호를 암호화 처리.
//    $memberPw = md5($memberPw);
//}
//
////닉네임, 생일 그리고 이름이 빈값이 아닌지
//if($memberNickName == '' || $memberBirthDay == '' || $memberName == ''){
//    echo '생일혹은 닉네임의 값이 없습니다.';
//}
//
////이메일 주소가 올바른지
//$checkEmailAddress = filter_var($memberEmailAddress, FILTER_VALIDATE_EMAIL);
//
//if($checkEmailAddress != true){
//    echo "올바른 이메일 주소가 아닙니다.";
//    exit;
//}
//
//이제부터 넣기 시작

?>