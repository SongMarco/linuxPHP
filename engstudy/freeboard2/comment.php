<?php
$sql = 'select * from comment_free where co_no=co_order and b_no=' . $bNo;
$result = $db->query($sql);
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>

<div id="commentView">
    <form action="comment_update.php" method="post">
        <input type="hidden" name="bno" value="<?php echo $bNo?>">
        <?php
        while($row = $result->fetch_assoc()) {
            ?>
            <ul class="oneDepth">
                <li>
                    <div id="co_<?php echo $row['co_no']?>" class="commentSet">
                        <div class="commentInfo">
                            <div class="commentId">작성자: <span class="coId"><?php echo $row['co_id']?></span></div>
                            <div class="commentBtn">
                                <?php

                                // 세션의 닉네임과 글쓴이 이름이 같으면 수정 삭제 가능.
                                if( $_SESSION['ses_userName'] == $row['co_id']){

                                    echo "<a href=\"#\" class=\"comt write\">댓글</a>
                            <a id = \"editComment\" href=\"#\" class=\"comt modify\">수정</a>
                            <a id =\"deleteComment\" href=\"#\" class=\"comt delete\">삭제</a> ";

                                }

                                else{
                                    echo "<a href=\"#\" class=\"comt write\">댓글</a>";
                                }

                                ?>

                            </div>
                        </div>
                        <div class="commentContent"><?php echo $row['co_content']?></div>
                    </div>
                    <?php
                    $sql2 = 'select * from comment_free where co_no!=co_order and co_order=' . $row['co_no'];
                    $result2 = $db->query($sql2);

                    while($row2 = $result2->fetch_assoc()) {
                        ?>
                        <ul class="twoDepth">
                            <li>
                                <div id="co_<?php echo $row2['co_no']?>" class="commentSet">
                                    <div class="commentInfo">
                                        <div class="commentId">작성자:  <span class="coId"><?php echo $row2['co_id']?></span></div>
                                        <div class="commentBtn">


                                                <?php

                                                // 세션의 닉네임과 글쓴이 이름이 같으면 수정 삭제 가능.
                                                // php 안에 html 넣으려면 에코를 쓰면 된다 @@@
                                                if( $_SESSION['ses_userName'] == $row2['co_id']){

                                                    echo "
                                                    <a id=\"editComment2\" href=\"#\" class=\"comt modify\">수정</a>
									                <a id=\"deleteComment2\" href=\"#\" class=\"comt delete\">삭제</a>";

                                                }
                                                ?>


                                        </div>
                                    </div>
                                    <div class="commentContent"><?php echo $row2['co_content'] ?></div>
                                </div>
                            </li>
                        </ul>
                        <?php
                    }
                    ?>
                </li>
            </ul>
        <?php } ?>
    </form>
</div>
<form action="comment_update.php" method="post">
    <input type="hidden" name="bno" value="<?php echo $bNo?>">
    <table>
        <tbody>
        <tr>
            <th scope="row"><label for="coId">아이디</label></th>
            <td><input type="text" name="coId" id="coId"></td>
        </tr>
        <tr>
            <th scope="row">
                <label for="coPassword">비밀번호</label></th>
            <td><input type="password" name="coPassword" id="coPassword"></td>
        </tr>
        <tr>
            <th scope="row"><label for="coContent">내용</label></th>
            <td><textarea name="coContent" id="coContent"></textarea></td>
        </tr>
        </tbody>
    </table>
    <div class="btnSet">
        <input type="submit" value="댓글 쓰기">
    </div>
</form>

<script>
    $(document).ready(function () {
        var commentSet = '';
        var action = '';
        $('#commentView').delegate('.comt', 'click', function () {
            //현재 작성 내용을 변수에 넣고, active 클래스 추가.
            commentSet = $(this).parents('.commentSet').html();
            $(this).parents('.commentSet').addClass('active');

            //취소 버튼
            var commentBtn = '<a href="#" class="addComt cancel">취소</a>';

            //버튼 삭제 & 추가
            $('.comt').hide();
            $(this).parents('.commentBtn').append(commentBtn);


            //commentInfo의 ID를 가져온다.
            var co_no = $(this).parents('.commentSet').attr('id');

            //전체 길이에서 3("co_")를 뺀 나머지가 co_no
            co_no = co_no.substr(3, co_no.length);

            var addOption = '<input type="hidden" name="co_no" value="' + co_no + '">';

            //변수 초기화
            var comment = '';
            var coId = '';
            var coContent = '';

            if($(this).hasClass('write')) {
                //댓글 쓰기
                action = 'w';
                //ID 영역 출력
                coId = '<input type="text" name="coId" id="coId">';

            } else if($(this).hasClass('modify')) {
                //댓글 수정
                action = 'u';
                $(this).parents('.commentBtn');

                var modifyParent = $(this).parents('.commentSet');
                var coId = modifyParent.find('.coId').text();
                var coContent = modifyParent.find('.commentContent').text();

            } else if($(this).hasClass('delete')) {
                //댓글 삭제
                action = 'd';

            }

            comment += '<div class="writeComment">';
            comment += '	<input type="hidden" name="w" value="' + action + '">';
            comment += addOption;
            comment += '	<table>';
            comment += '		<tbody>';
            if(action !== 'd') {
                comment += '			<tr>';
                comment += '				<th scope="row"><label for="coId">아이디</label></th>';
                comment += '				<td>' + coId + '</td>';
                comment += '			</tr>';
            }
            comment += '			<tr>';
            comment += '				<th scope="row">';
            comment += '			<label for="coPassword">비밀번호</label></th>';
            comment += '				<td><input type="password" name="coPassword" id="coPassword"></td>';
            comment += '			</tr>';
            if(action !== 'd') {
                comment += '			<tr>';
                comment += '				<th scope="row"><label for="coContent">내용</label></th>';
                comment += '				<td><textarea name="coContent" id="coContent">' + coContent + '</textarea></td>';
                comment += '			</tr>';
            }
            comment += '		</tbody>';
            comment += '	</table>';
            comment += '	<div class="btnSet">';
            comment += '		<input type="submit" value="확인">';
            comment += '	</div>';
            comment += '</div>';

            $(this).parents('.commentSet').after(comment);
            return false;
        });

        $('#commentView').delegate(".cancel", "click", function () {
            if(action == 'w') {
                $('.writeComment').remove();
            } else if(action == 'u') {
                $('.writeComment').remove();
            }
            $('.commentSet.active').removeClass('active');
            $('.addComt').remove();
            $('.comt').show();
            return false;
        });
    });
</script>