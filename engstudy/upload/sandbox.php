
<?php
$recent = explode(",", $_COOKIE['recent_search']);



//    $recent2 = explode( "::", $recent);

$recent = array_reverse($recent);


$eng_arr = array();
$kor_arr = array();

echo $_COOKIE['recent_search'];
echo "</br>";
echo "</br>";

for($i=0; $recent[$i]; $i++) {

    $split = explode("::", $recent[$i]);

    array_push($eng_arr, $split[0]);
    array_push($kor_arr, $split[1]);
}

print_r($eng_arr);
echo "</br>";
print_r($kor_arr);


?>