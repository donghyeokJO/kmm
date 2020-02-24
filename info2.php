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
    <title>학회</title>
    <link rel="stylesheet" href="css/hak2.css">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Noto+Sans|Nanum+Brush+Script&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        section#info {
            margin: 0 auto;
            width: 1024px;
            padding: 117px 18px 71px 18px;
        }

        .info_title {
            font-family: 'Noto Sans', sans-serif;
            font-size: 24px;
            font-weight: bold;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.5;
            letter-spacing: normal;
            text-align: left;
            color: #707070;
        }

        .info_detail {
            margin-top: 22px;
            box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.16);
            border: solid 1px #c9c9c9;
            background-color: #ffffff;
            padding: 30px 26px 120px 26px;
            font-family: 'Noto Sans', sans-serif;
            font-size: 12px;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.5;
            letter-spacing: normal;
            text-align: left;
            color: #707070;
        }

        @media(max-width: 800px) {
            #info {
                width: 100% !important;
            }
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
    <section id="info">
        <div class="info_title">
            개인정보처리방침
        </div>
        <div class="info_detail">
            1. 홈페이지 회원 가입 및 관리 <br> <br>

            회원 가입의사 확인, 회원제 서비스 제공에 따른 본인 식별 · 인증, 회원자격 유지 · 관리, 제한적 본인 확인제 시행에 따른 본인확인, 서비스 부정이용 방지 <br>
            2. 수집하는 개인정보의 항목 <br> <br>

            1) 홈페이지 회원 가입 및 관리 <br>
            ① 필수항목 : 이름. 생년월일, 휴대폰번호, 주소, e-mail <br>
            2) 인터넷 서비스 이용과정에서 아래 개인정보 항목이 자동으로 생성되어 수집됩니다. <br>
            ① 접속 로그, 쿠키, 접속 IP 정보 <br>
            3. 개인정보의 보유 및 이용 기간 <br> <br>

            1) 회원 가입 시부터 회원 탈퇴 시까지 이용하며 회원 탈퇴 시 즉시 파기됩니다. <br> <br>

            4. 수집동의 거부 권리 및 서비스 제한 <br> <br>

            1) 회원 가입을 하려는 정보주체는 개인정보의 수집·이용에 대한 동의를 거부할 수 있으며, 동의 거부 시 홈페이지에 회원가입이 되지 않으며, 한국피부비만성형학회이 제공하는 회원제 서비스 이용이
            제한됩니다.
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
                Tel : 02-000-0000 | Email : email@naver.com <br><br>

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