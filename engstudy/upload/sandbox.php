<?php

$arr = array();
$arr[0] = 'abc';
$arr[1] = '看護員';
$arr[2] = '으아앙';

$content = $arr[1];

print_r($arr);

echo"</br>";

for($i = 0; $arr[$i]; $i ++){
    preg_match_all('!['
        .'\x{2E80}-\x{2EFF}'// 한,중,일 부수 보충
        .'\x{31C0}-\x{31EF}\x{3200}-\x{32FF}'
        .'\x{3400}-\x{4DBF}\x{4E00}-\x{9FBF}\x{F900}-\x{FAFF}'
        .'\x{20000}-\x{2A6DF}\x{2F800}-\x{2FA1F}'// 한,중,일 호환한자
        .']+!u', $arr[$i], $match);

    echo "$arr[$i] = ".$match[0][0]."</br>";
    if($match[0][0]){
        $arr[$i]= '';
    }
}
echo"</br>";
print_r($arr);




?>