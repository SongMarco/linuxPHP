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
    <nav class="navbar navbar-default">

        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.html" style="font-family:ABeeZee, sans-serif;">TYPOTIONARY </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="index.html">홈 </a></li>
                    <li role="presentation"><a href="guide.php">활용 가이드 </a></li>
                    <li role="presentation"><a href="./freeboard2">자유게시판 </a></li>
                    <li class="active" role="presentation"><a href="contact.php">문의하기 </a></li>
                </ul>
                <form class="navbar-form navbar-left" target="_self">
                    <div class="form-group">
                        <label class="control-label" for="search-field">Typo 검색</label>
                        <input class="form-control search-field" type="search" name="search" id="search-field">
                    </div>
                    <button class="btn btn-primary" type="button" style="background-color:rgb(75,84,75);"> <i class="glyphicon glyphicon-search"></i></button>
                </form>
                <a class="btn btn-primary navbar-btn navbar-right" role="button" href="./member/signUpForm.php" style="background-color:rgb(51,181,40);"><strong>회원가입</strong> </a><a class="btn btn-primary navbar-btn navbar-right" role="button" href="./member"
                style="background-color:rgb(100,138,235);"><strong>로그인</strong> </a></div>
        </div>
    </nav>


    <div class="contact-clean">
        <form name="contact" action="<?=$_SERVER['PHP_SELF']?>" method="post" >
            <!--       메일보내기 아직 예외처리가 안되었다. smtp -->
            <input type="hidden" name="action" value="form_submit" />

            <h2 class="text-center">문의사항을 전달해드립니다. </h2>
            <div class="form-group has-success">
                <input class="form-control" type="text" name="name" placeholder="이름">
            </div>
            <div class="form-group has-error">
                <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="14" name="message" placeholder="내용을 입력하세요..."></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" >보내기 </button>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>



    <?php
    $action = '';
    if(isset($_POST['action']))$action = $_POST['action'];

    //폼이 입력되었을 때 처리부분이다. 스스로 post받아서 디비에 저장시킨다.
    if($action == 'form_submit') {

        include "./include/dbConnect.php";

        $contactName = $_POST['name'];
        $contactEmail = $_POST['email'];
        $contactMessage = $_POST['message'];

        //echo "<script>alert(\"$contactEmail, $contactMessage, $contactName :: 운영자에게 메시지를 보냈습니다.\");</script>";
        $sql = "select * from contact;";

        $query = mysqli_query($dbConnect, $sql) or die("123123");

        $sql = "INSERT INTO contact(name, email, message) 
                VALUES('$contactName','$contactEmail','$contactMessage');";

        $query = mysqli_query($dbConnect, $sql);
        if($query){
            echo "<script>alert(\"운영자에게 메시지를 보냈습니다.\");</script>";
        }


        exit;
    }
    ?>
</body>

</html>