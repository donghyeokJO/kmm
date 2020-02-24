<?php
    // include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    // include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/header.php';
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    session_start();
    $login = false;
    if (isset($_SESSION['u_code'])) {
        $login = true;
        $u_code = $_SESSION['u_code'];
        $query = "select * from user where u_code = '$u_code'";
        $ret = mysqli_query($conn, $query);
        $user = mysqli_fetch_array($ret);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>대한미용개원의사회</title>
    <link rel="stylesheet" href="css/hak2.css">
    <link rel="stylesheet" href="css/insert_board2.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/member.css">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Noto+Sans|Nanum+Brush+Script&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<header class="pc_header">
        <div class="header">
            <div class="logo" onclick="location.href='index'">
                <p>대한미용개원의사회</p> <span>korean medical mentoring organization</span>
            </div>
            <ul class="menu">
                <li><a href="academy_intro">학회소개</a></li>
                <li><a href="seminar_intro">세미나</a></li>
                <li><a href="notice">공지사항</a></li>
                <li><a href="board">자유게시판</a></li>
            </ul>
            <ul class="pre">
                <li><a href="pre">사전등록</a></li>
                <li><a href="pre_check">사전등록확인</a></li>
            </ul>
            <?php
            if (!$login) {
                echo '
                <div class="login" onclick="location.href=\'signin\'">
                    로그인
                </div>';
            } elseif ($login) {
                echo "
                <div class=\"user\" onclick=\"user_click();\">
                    <i class=\"far fa-user\"></i>
                </div>
                <div class=\"user_info\">
                    <div class=\"user_container\">
                        <div class=\"user_name\"><span>$user[u_name_kr]</span> 님</div>
                        <div class=\"user_close\" onclick=\"user_close();\">
                            <i class=\"fas fa-times\"></i>
                        </div>
                    </div>
                    <div class=\"user_mypage\">
                        <a href=\"mypage\">마이페이지</a>
                    </div>
                    <div class=\"user_logout\">
                        <a href=\"member/logout\">로그아웃</a>
                    </div>
                </div>";
            }
            ?>
        </div>
    </header>
    <header class="mobile_header">
        <div class="menu_m_btn" onclick="m_menu_open();">
            <i class="fas fa-bars"></i>
        </div>
        <div class="logo_m" onclick="location.href='index'">
            <p>대한미용개원의사회</p> <span>korean medical mentoring organization</span>
        </div>
        <?php
        if (!$login) {
            echo '
                <div class="login" onclick="location.href=\'signin\'">
                    로그인
                </div>';
        } elseif ($login) {
            echo "
                <div class=\"user\" onclick=\"user_click();\">
                    <i class=\"far fa-user\"></i>
                </div>
                <div class=\"user_info\">
                    <div class=\"user_container\">
                        <div class=\"user_name\"><span>$user[u_name_kr]</span> 님</div>
                        <div class=\"user_close\" onclick=\"user_close();\">
                            <i class=\"fas fa-times\"></i>
                        </div>
                    </div>
                    <div class=\"user_mypage\">
                        <a href=\"mypage\">마이페이지</a>
                    </div>
                    <div class=\"user_logout\">
                        <a href=\"member/logout\">로그아웃</a>
                    </div>
                </div>";
        }
        ?>
        <div class="m_menu_page">
            <?php
            if (!$login) {
                echo '
                    <div class="m_menu_title">
                        <span class="span_bold">로그인</span><span>을 해주세요</span>
                    </div>
                    <div class="m_menu_link" onclick="location.href=\'signin\'">
                        로그인하러가기 >
                    </div>';
            } else {
                echo "
                    <div class=\"m_menu_title\">
                        <span class=\"span_bold\">$user[u_name_kr]</span><span>님 반갑습니다.</span>
                    </div>
                    <div class=\"m_menu_link\" onclick=\"location.href='mypage'\" style =\"cursor:pointer\">
                        마이페이지 >
                    </div>";
            }
            ?>
            <div class="m_menu_bar1"></div>
            <ul class="m_menu">
                <li><a href="academy_intro">학회소개</a></li>
                <li><a href="seminar_intro">세미나</a></li>
                <li><a href="notice">공지사항</a></li>
                <li><a href="board">자유게시판</a></li>
            </ul>
            <div class="m_menu_bar2"></div>
            <div class="m_menu_pre1">
                <a href="pre">사전등록</a>
            </div>
            <div class="m_menu_pre2">
                <a href="pre_check">사전등록 확인</a>
            </div>
            <div class="m_menu_close" onclick="m_menu_close();">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </header>
    <section id="pre">
        <div class="section_pre_title">
            <div class="section_pre_title_area">
                자유게시판 > 글쓰기
            </div>
        </div>
        <div class="board_area">
            <form id ="board_form" action="/form/board_insert" method = "POST">
                <div class="board_title_area">
                    <div class="insert_board_title">
                        제목
                    </div>
                    <input type="text" name = "title" class="input_board_title">
                </div>
                <div class="board_name_area">
                    <div class="board_name">
                        익명여부
                    </div>
                    <input type="radio" name="anonymous" id="anonymous">
                    <input type="hidden" name = "writer" value="<?=$user['u_name_kr']?>">
                    <input type="hidden" name = "u_code" value="<?=$user['u_code']?>">
                    <label for="anonymous">완전익명(필명노출없음)</label>
                    <input type="radio" name="anonymous" id="fixed">
                    <label for="fixed">고정필명</label>
                    <!--<div class="name_setting">설정하기</div> -->
                </div>
                <div class="board_content_area">
                    <div class="board_content">
                        내용
                    </div>
                    <textarea name="board_content" id="board_content" cols="30" rows="10"
                        class="input_board_content"></textarea>
                </div>
                <!-- <div class="board_topic_area">
                    <div class="board_topic">
                        토픽선택
                    </div>
                    <div class="topic">
                        <div class="topic1">
                            <input type="radio" name="topic_radio" id="topic_radion1">
                            <select aria-level="토픽1">
                                <option value="토픽1">토픽1</option>
                                <option value="토픽2">토픽2</option>
                                <option value="토픽3">토픽3</option>
                            </select>
                            <select aria-level="토픽1">
                                <option value="토픽1">토픽1</option>
                                <option value="토픽2">토픽2</option>
                                <option value="토픽3">토픽3</option>
                            </select>
                            <select aria-level="토픽1">
                                <option value="토픽1">토픽1</option>
                                <option value="토픽2">토픽2</option>
                                <option value="토픽3">토픽3</option>
                            </select>
                        </div>
                        <div class="topic2">
                            <input type="radio" name="topic_radio" id="topic_radion2">
                            <label for="topic_radion2">선택할 주제가 없습니다.</label>
                        </div>
                    </div>
                </div>
                <div class="board_keyword_area">
                    <div class="board_keyword">
                        키워드
                    </div>
                    <div class="keyword">
                        <div class="keyword1">
                            <label for="keyword1">질환명</label>
                            <input type="text" id="keyword1" placeholder="상병 관련 키워드(한/영)나 상병코드를 입력해 자동완성에서 선택하세요.">
                        </div>
                        <div class="keyword2">
                            <label for="keyword2">약물명</label>
                            <input type="text" id="keyword2" placeholder="약물 성분명(한/영)을 입력해 자동완성에서 선택하세요.">
                        </div>
                        <div class="keyword3">
                            <label for="keyword3">일반</label>
                            <input type="text" id="keyword3" placeholder="원하는 키워드를 자유롭게 입력하고, 콤마(,)로 구분하세요.">
                        </div>
                    </div>
                </div>
                <div class="board_survey_area">
                    <div class="board_survey">
                        설문삽입
                    </div>
                    <div class="input_survey">
                        <div class="survey_text">게시물 내에 설문을 삽입할 수 있습니다.</div>
                        <div class="file_btn">설문삽입</div>
                        <input type="file" name="file_1" class="input_file"
                            onchange="javascript: document.getElementById('fileName').value = this.value" />
                    </div>
                </div> -->
                <div class="button_area">
                    <div class="cancel_btn" onclick="location.href='board'">
                        취소
                    </div>
                    <input type="submit" class="insert_btn" value="등록하기">
                </div>
            </form>
        </div>
    </section>
    <footer>
        <div class="footer">
            <div class="footer_title">
                대한미용개원의사회
            </div>
            <ul class="footer_link">
                <li><a href="#">이용약관</a></li>
                <li><a href="#">개인정보처리방침</a></li>
            </ul>
            <div class="footer_text">
                사업자등록번호 : 0000000000 | 대표자 : 땡떙떙 | (우 02856) 서울시 강남구 강남대로 364 501호 <br>
                Tel : 02-000-0000 | Fax : 02-000-0000 | Email : email@naver.com <br><br>

                © 2020 대한미용개원의사회. All Rights Reserved
            </div>
            <div class="footer_btn" onclick="positionToTop();">^</div>
        </div>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c3089a3225.js" crossorigin="anonymous"></script>
<script src="js/script2.js"></script>

</html>