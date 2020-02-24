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
    <!-- <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff"> -->
    <link rel="stylesheet" href="css/hak2.css">
    <link rel="stylesheet" href="css/common.css">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Noto+Sans|Nanum+Brush+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <div id="kakao-link-btn" class="ploting_banner" onclick="sendLink()">
        <img src="/img/kakao_banner.png" />
    </div>
    <div id="shortcut" class="ploting_banner2" style ="display:none">
        <img  src="/img/kakao_banner.png" />
    </div>
    <section id="section1">
        <div class="section1">
            <div class="gallery">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators" id='carousel-indicatiors'>
                        <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li> -->
                    </ol>
                    <div class="carousel-inner" id="main-carousel">
                        <!-- <div class="carousel-item active">
                            <img src="img/main_hak.png" class="d-block w-100" alt="...">
                            <div class="filter"></div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/main_hak.png" class="d-block w-100" alt="...">
                            <div class="filter"></div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/main_hak.png" class="d-block w-100" alt="...">
                            <div class="filter"></div>
                        </div> -->
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <div class="prev"><i class="fas fa-angle-left"></i></div>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <div class="next"><i class="fas fa-angle-right"></i></div>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!-- <div class="btn">
                <div class="main_btn1" onclick="location.href='pre'">
                    사전등록(~3/2)
                </div>
                <div class="main_btn2" onclick="location.href='pre_check'">
                    사전등록확인
                </div>
            </div> -->
            <!-- <div class="main_bar1"></div>
            <div class="main_bar2"></div>
            <div class="main_bar3"></div> -->
        </div>
    </section>
    <section id="section2">
        <div class="filter"></div>
        <div class="section2">
            <div class="main_title" id="sec2-1">

            </div>
            <div class="main_sub_title" id="sec2-2">

            </div>
            <div class="main_bar"></div>
            <div class="main_text" id="sec2-3">

            </div>
        </div>
    </section>
    <section id="section3">
        <div class="section3">
            <div class="notice">
                <div class="board_title">
                    공지사항
                </div>
                <div class="board_btn" onclick="location.href='notice'">></div>
                <div class="board_bar"></div>
                <ul id="notice_list">
                    <!-- <li>
                        <div>대한미용개원의사회 2019 나는 개원…</div>
                        <div>19.11.15</div>
                    </li>
                    <li>
                        <div>대한미용개원의사회 2019 나는 개원…</div>
                        <div>19.11.15</div>
                    </li>
                    <li>
                        <div>대한미용개원의사회 2019 나는 개원…</div>
                        <div>19.11.15</div>
                    </li>
                    <li>
                        <div>대한미용개원의사회 2019 나는 개원…</div>
                        <div>19.11.15</div>
                    </li>
                    <li>
                        <div>대한미용개원의사회 2019 나는 개원…</div>
                        <div>19.11.15</div>
                    </li> -->
                </ul>
            </div>
            <div class="board">
                <div class="board_title">
                    자유게시판
                </div>
                <div class="board_btn" onclick="location.href='board'">></div>
                <div class="board_bar"></div>
                <ul id="board_list">

                </ul>
            </div>
            <div class="pre_page">
                <div class="pre_bar"></div>
                <div class="pre_title">
                    사전등록
                </div>
                <div class="pre_text">
                    본 홈페이지에서 회원가입을 하시고 <br>
                    가입비를 할인 받으세요.
                </div>
                <div class="pre_btn" onclick="location.href='pre'">></div>
            </div>
            <div class="pre_cf_page">
                <div class="pre_bar"></div>
                <div class="pre_title">
                    사전등록확인
                </div>
                <div class="pre_text">
                    사전등록을 하신 회원님께서는 <br>
                    회원관리에서 확인하실 수 있습니다.
                </div>
                <div class="pre_btn" onclick="location.href='pre_check'">></div>
            </div>
        </div>
    </section>
    <section id="section4">
        <div class="filter"></div>
        <div class="section4">
            <div class="memo_title">
                SURVEY RESULT
            </div>
            <div class="memo_bar"></div>

            <div class="memo_item">
                <div class="memo_item_bar"></div>
                <div class="memo_item_text" id="sv1">

                </div>
            </div>
            <div class="memo_item">
                <div class="memo_item_bar"></div>
                <div class="memo_item_text" id="sv2">

                </div>
            </div>
            <div class="memo_item">
                <div class="memo_item_bar"></div>
                <div class="memo_item_text" id="sv3">

                </div>
            </div>
            <div class="memo_item">
                <div class="memo_item_bar"></div>
                <div class="memo_item_text" id="sv4">

                </div>
            </div>
            <div class="memo_item">
                <div class="memo_item_bar"></div>
                <div class="memo_item_text" id="sv5">

                </div>
            </div>
            <div class="memo_item">
                <div class="memo_item_bar"></div>
                <div class="memo_item_text" id="sv6">

                </div>
            </div>

        </div>
    </section>
    <section id="section5">
        <div class="filter"></div>
        <div class="section5">
            <div class="signup_title">
                회원가입하시고 등록비를 할인 받으세요!
            </div>
            <div class="signup_go" onclick="location.href='signup'">
                회원가입 바로가기 >
            </div>
        </div>
    </section>
    <footer>
        <div class="footer" id="footer">
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c3089a3225.js" crossorigin="anonymous"></script>
<script src="js/script2.js"></script>
<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<script>
    $(document).ready(function() {
        set_sec2();
        set_notice();
        set_survey();
        set_board();
        set_banner();
    })
</script>
<script>
    function sendLink() {
        Kakao.init('6a9882b406c0a035378325a2105edf97');
        Kakao.Link.sendScrap({
            requestUrl: 'http://kmm.or.kr'
        });
    }
</script>

</html>