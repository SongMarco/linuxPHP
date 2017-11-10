<?php

$searchWord = 'sword';
    $searchKor='kal';

//쿠키값이 없을 경우 즉 처음 저장하는 경우
if($_COOKIE['recent_search']==""){
    setcookie('recent_search', $searchWord. " : ". $searchKor, time() + 86400, "/");
}
//저장된 쿠키값이 존재하고, 중복된 값이 아닌 경우
else if($_COOKIE['recent_search'] != "" ){
    setcookie('recent_search' , $_COOKIE['recent_search']. "," . $searchWord. " : ". $searchKor
        , time() + 86400, "/");
}



?>