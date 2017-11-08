


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>findex</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=News+Cycle:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
</head>

<body>
<div>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php" style="font-family:ABeeZee, sans-serif;">TYPOTIONARY </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="active" role="presentation"><a href="index.php">홈 </a></li>
                    <li role="presentation"><a href="./guide.php">활용 가이드 </a></li>
                    <li role="presentation"><a href="#">자유게시판 </a></li>
                    <li role="presentation"><a href="contact.php">문의하기 </a></li>
                </ul>
                <form action = "./search.php" class="navbar-form navbar-left" target="_self" method="get">
                    <div class="form-group">
                        <label class="control-label" for="search-field">Typo 검색</label>
                        <input class="form-control search-field" type="search" name="searchWord" id="search-field">
                    </div>
                    <button class="btn btn-primary" type="submit" style="background-color:rgb(75,84,75);"> <i class="glyphicon glyphicon-search"></i></button>
                </form>
                <a class="btn btn-primary navbar-btn navbar-right" role="button" href="./member/signUpForm.php" style="background-color:rgb(51,181,40);"><strong>회원가입</strong> </a>
                <a class="btn btn-primary navbar-btn navbar-right" role="button" href="./member"style="background-color:rgb(100,138,235);"><strong>로그인</strong> </a></div>
        </div>
    </nav>
</div>

<div class="container" style="padding:134px;">
    <div class="row product" style="width:910px;">
        <div class="col-md-7" ">

            <?php
            include "./include/dbConnect.php";
            ini_set("display_errors", 1);
            $searchWord = $_GET['searchWord'];

            $filepath = "/app/apache/htdocs/project/engstudy/assets/img";

            $filename = $filepath."/".$searchWord."*";

            $cnt = 0;

            $arr = array();

            foreach (glob($filename) as $filefound) {
                $cnt++;
                $arr[] = $filefound;
            }


//            $cutPath = 'project';
//            $bre = strstr($arr[0] , $cutPath);
//            echo $bre;
            $cutPath = 'assets';

            for($i = 0; isset( $arr[$i] ); $i++ ){


                $tmp = strstr($arr[$i] , $cutPath);
//                echo $tmp."</br>";

                $arr[$i] = $tmp;
//                echo  $arr[$i];


            }

//            echo $cnt;
//
//            echo '<br>';
//
//            echo print_r($arr);

            for($i = 0; isset( $arr[$i] ); $i++ ){

                ?>

                <img src='<?php echo $arr[$i] ?>' style="max-width: 400px; height: auto;" />

                <?php
            }



            //PHP에서 유효성 재확인

            //키워드 중복 검사
            $sql = "SELECT * FROM search WHERE searchWord = '{$searchWord}'";
            $res = $dbConnect->query($sql);
            // 일치하는 단어를 찾았다. -- 아이디 중복체크 로직을 그대로 사용함
            if($res->num_rows >= 1){
                while( $row = mysqli_fetch_array($res) ){   //데이터가 존재할경우 반복 실행, 한줄 한줄 출력.
                    $searchWord = $row['searchWord'];
                    $searchKor = $row['searchKor'];

                    echo "$searchWord ";
                    echo "$searchKor ";










                echo "<br>";

            include "./include/dbConnect.php";

            $searchWord = $_GET['searchWord'];

            //쿠키값이 없을 경우 즉 처음 저장하는 경우
            if($_COOKIE['recent_search']==""){
                setcookie('recent_search', $searchWord. " : ". $searchKor, time() + 86400, "/");
            }
            //저장된 쿠키값이 존재하고, 중복된 값이 아닌 경우
            else if($_COOKIE['recent_search'] != "" ){
                setcookie('recent_search' , $_COOKIE['recent_search']. "," . $searchWord. " : ". $searchKor
                    , time() + 86400, "/");
            }

//            $recent_arr = explode(",",$_COOKIE['recent_search']);
//            print_r($recent_arr);
            ?>
<!--        <script>-->
<!--            alert(document.cookie);-->
<!---->
<!--        </script>-->
                    <?php

                }
            }
            ?>

        </div>
        <div class="col-md-12"></div>
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <h5>Typotianary © 2017</h5></div>
            <div class="col-sm-6 social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
        </div>
    </div>
</footer>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
