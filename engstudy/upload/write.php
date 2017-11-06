<?php
$id = $_POST['id'];
$content = $_POST['content'];
ini_set("display_errors", 1);




include "../dbconfig.php";
$sql = "insert into test_bbs (id ,content) values( '$id', '$content')";
$result = $db->query($sql);


if($result){
    echo "test bbs insert succeedded";
}
else{
    echo "test bbs insert failed";
}

$bbsid = $db->insert_id;

$path = './testBBS';


//$path = "/testBBS";
$filename =  date("YmdHis").".jpg";
move_uploaded_file($_FILES['imageform']['tmp_name'],"$path/$filename");

$query = "insert into test_image (bbsNo,path,filename) values ('$bbsid', '$path','$filename')";

$result = $db->query($query);

if($result){
    echo "insert image success";
}

?>


<!DOCTYPE html>
<html>
<head lang="ko">
    <meta charset=utf-8">
    <title>게시물 작성 예제 폼</title>
</head>
<body>
<table>
    <tr>
        <td>전송아이디:</td>
        <td><?php echo $id;?></td>
    </tr>
    <tr>
        <td>전송내용:</td>
        <td><?php echo $content;?></td>
    </tr>
    <tr>
        <td>전송이미지</td>
        <?php echo $id;?>
        <td><img src="<?=$path."/".$filename;?>" /></td>
    </tr>
</table>
<p><b>전송완료</b></p>
<p><a href='index.php'>목록가기</a></p>
</body>
</html>
