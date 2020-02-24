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
        $u_type = $user['u_type'];
        if ($u_type == '관리자') {
            echo '<script>location.href="/admin"</script>';
        }
    }
    if (!$login) {
        msg('로그인 후 사용해주세요!');
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
    <link rel="stylesheet" href="css/mypage2.css">
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
                회원정보
            </div>
        </div>
        <div class="mypage_area">
        <form id = "change_info" method ="POST" action="/form/change_info.php">
            <div class="mypage_info_area">
                <div class="mypage_info" style="border: none;">
                    <div class="mypage_info_title">
                        아이디
                    </div>
                    <input type = "hidden" name = "u_code" value = "<?php echo $u_code?>">
                    <input type="text" class="mypage_input" readonly style="background-color: #ededed;" value="<?php echo $user['u_id']?>">
                </div>
                <!-- <div class="mypage_info">
                    <div class="mypage_info_title">
                        비밀번호
                    </div>
                    <input type="password" class="mypage_input" readonly style="background-color: #ededed;"
                        value="비밀번호">
                    <input type="password" class="mypage_input" readonly style="background-color: #ededed;"
                        value="비밀번호 확인">
                </div> -->
                <div class="mypage_info">
                    <div class="mypage_info_title">
                        이름
                    </div>
                    <input type="text" class="mypage_input" name = "u_name_kr"value="<?php echo $user['u_name_kr']?>">
                    <input type="text" class="mypage_input" name = "u_name_en" value="<?php echo $user['u_name_en']?>">
                </div>
                <div class="mypage_info">
                    <div class="mypage_info_title">
                        이메일
                    </div>
                    <input type="email" class="mypage_input" name = "u_email"
                        value="<?php echo $user['u_email']?>">
                </div>
                <div class="mypage_info">
                    <div class="mypage_info_title">
                        전화번호(-제외)
                    </div>
                    <input type="text" class="mypage_input" name = "u_phone"
                        value="<?php echo $user['u_phone']?>">
                </div>
                <div class="mypage_info">
                    <div class="mypage_info_title">
                        의사면허 / 생년월일
                    </div>
                    <input type="number" class="mypage_input" readonly style="background-color: #ededed;" value="<?php echo $user['u_license']?>">
                    <input type="number" class="mypage_input" name = "u_year" value="<?php echo $user['u_year']?>">
                </div>
                <div class="mypage_info">
                    <div class="mypage_info_title">
                        전공과목
                    </div>
                    <input type="text" class="mypage_input" name = "u_major" value="<?php echo $user['u_major']?>">
                </div>
                <div class="mypage_info">
                    <div class="mypage_info_title">
                        출신대학
                    </div>
                    <input type="text" class="mypage_input" name = "u_from" value="<?php echo $user['u_from']?>">
                </div>
            </div>
            </form>
            <div class="btn_list">
                <div class="password_mod_btn" onclick = "modalPW()">
                    비밀번호변경
                </div>
                <div class="account_delete_btn" onclick ="alert('회원 탈퇴는 관리자에게 문의주시기 바랍니다')">
                    회원탈퇴
                </div>
                <div class="save_btn" onclick = "$('#change_info').submit()">
                    변동사항 저장
                </div>
            </div>
        </div>
    </section>
    <div id="modal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div id="modal_title" class="modal-title font_size_l font_weight_b"></div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div id="modal_body" class="modal-body">

          </div>
      
        </div>
      </div>
    </div>
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