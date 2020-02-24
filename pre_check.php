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
    <meta property="og:image" content="/img/og_image.jpg" />
    <meta property="og:title" content="대한미용개원의사회" />
    <meta property="og:description" content="나는 개원의다." />
    <meta property="og:site_name" content="대한미용개원의사회" />
    <title>대한미용개원의사회</title>
    <link rel="stylesheet" href="css/hak2.css">
    <link rel="stylesheet" href="css/pre_check2.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/member.css">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Noto+Sans|Nanum+Brush+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .pre_check_bar.b3 {
            height: auto;
            overflow: hidden;
        }
    </style>
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
    <div id="kakao-link-btn" class = "ploting_banner" onclick="sendLink()">
        <img src="/img/kakao_banner.png"/>
    </div>
    <section id="pre">
        <div class="section_pre_title">
            <div class="section_pre_title_area">
                사전등록
            </div>
        </div>
        <div class="pre_check_area">
            <div class="pre_check_bar b1" style="border-top: solid 2px #707070;">
                <div class="center_title">
                    학회센터
                </div>
                <select class="center_select" id="center" aria-level="학회선택">

                </select>
            </div>
            <div class="pre_check_bar b2">
                <div class="center_title">
                    이름
                </div>
                <input type="text" id="name_kr" class="input_name">
            </div>
            <div class="pre_check_bar b3" style="border-bottom: solid 2px #707070;">
                <div class="center_title">
                    휴대폰번호
                </div>
                <div class="tel_area">
                    <input type="number" id="it1"  maxlength='3' class="input_tel">-
                    <input type="number" id="it2" maxlength='4' class="input_tel">-
                    <input type="number" id="it3" maxlength='4' class="input_tel">
                </div>
            </div>
          
            <div class="pre_check_btn" onclick="pre_check()">
                사전등록확인
            </div>
            
        </div>
        <div class="pre_check_area2" id="asdf">
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c3089a3225.js" crossorigin="anonymous"></script>
<script src="js/script2.js"></script>
<script src="js/pre.js"></script>
<script>
    $(document).ready(function() {
        bring_seminar()
        $('#it1').keyup(function(){
            var limit = $(this).attr('maxlength')
            if(this.value.length>=limit){
                $('#it2').focus()
            }
        })
        $('#it2').keyup(function(){
            var limit = $(this).attr('maxlength')
            if(this.value.length>=limit){
                $('#it3').focus()
            }
        })
    })
</script>
<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<script>
function sendLink() {
  var id = getParameterByName('id')
  Kakao.init('6a9882b406c0a035378325a2105edf97');
  Kakao.Link.sendScrap({
    requestUrl: 'http://kmm.or.kr/pre_check'
  });
}
</script>

</html>