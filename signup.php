<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>대한미용개원의사회</title>
    <link rel="stylesheet" href="css/hak2.css">
    <link rel="stylesheet" href="css/signup2.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/member.css">
    <link rel="stylesheet" href="css/index.css">
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
    <section id="login">
        <div class="login_left">
            <div class="text_align_center font_weight_n" style="font-size: 24px; color: #747474;">JOIN US</div>
            <form id="signup_form_01" method="POST" action="/member/signup.php" style="margin: 0 auto;">
                <div class="row">
                    <div class="col-12 margin_top_l font_weight_b">아이디</div>
                    <div class="col-12 margin_top_s">
                        <input type="text" id="u_id" name="u_id" placeholder="아이디를 입력해주세요." style=" height: 50px;" />
                        <input type="hidden" id="id_val" />
                        <input type="hidden" id="pw_val" />
                        <input type="hidden" id="em_val" />
                        <div class="id_check" onclick="validate_id()">ID Check</div>
                    </div>
                    <div id="id-validation" class="col-12 margin_top_l color_red" style="margin-top: 4px;">아이디 입력후 ‘ID Check’를 해주세요</div>
                    <div id="id-notice" class="col-12 margin_top_l color_red" style="margin-top: 4px;">아이디가 고정 필명으로 사용됩니다.</div>
                    <div id="id-validation2" class="col-12 margin_top_l color_green" style="margin-top: 4px;"></div>
                    <div class="col-12 margin_top_l font_weight_b">비밀번호</div>
                    <div class="col-12 margin_top_s">
                        <input type="password" id="u_pw" name="u_pw" placeholder="비밀번호" style="height: 50px;" onkeyup="validate_pw()" />
                    </div>
                    <div class="col-12 margin_top_s">
                        <input type="password" id="u_pwc" name="u_pwc" placeholder="비밀번호 확인" style="height: 50px;" onkeyup="pw_check()" />
                    </div>
                    <div id="pw-validation" class="col-12 margin_top_l color_red" style="margin-top: 4px;">영문 대소문자, 숫자, 특수문자 중 2가지를 포함해 8자리 이상으로 작성해주세요.</div>
                    <div id="pw-validation2" class="col-12 margin_top_l color_red" style="margin-top: 4px;"></div>
                    <div class="col-12 margin_top_l font_weight_b">이름</div>
                    <div class="col-12 margin_top_s">
                        <input type="text" id="u_name_kr" name="u_name_kr" placeholder="국문 이름을 적어주세요." style=" height: 50px;" />
                    </div>
                    <div class="col-12 margin_top_s">
                        <input type="text" id="u_name_en" name="u_name_en" placeholder="영문 이름을 적어주세요." style=" height: 50px;" />
                    </div>
                    <div class="col-12 margin_top_l font_weight_b">이메일</div>
                    <div class="col-12 margin_top_s">
                        <input type="text" id="u_email" name="u_email" placeholder="이메일을 입력해주세요." style=" height: 50px;" onkeyup = "validate_email()"/>
                    </div>
                    <div id="em-validation" class="col-12 margin_top_l color_red" style="margin-top: 4px;"></div>
                    <div class="col-12 margin_top_l font_weight_b">전화번호</div>
                    <div class="col-4 margin_top_s">
                        <input type="text" name="ph1" id = "ph1" class= 'in_num' maxlength='3' style=" height: 50px;" />
                    </div>
                    <div class="col-4 margin_top_s">
                        <input type="text" name="ph2" id = "ph2" class= 'in_num' maxlength='4' style=" height: 50px;" />
                    </div>
                    <div class="col-4 margin_top_s">
                        <input type="text" name="ph3" id = "ph3" class= 'in_num' maxlength='4' style=" height: 50px;" />
                    </div>
                    <div class="col-12 margin_top_l font_weight_b">의사면허</div>
                    <div class="col-12 margin_top_s">
                        <input type="text" id="u_license" name="u_license" placeholder="의사면허번호" style=" height: 50px;" />
                    </div>
                    <div class="col-12 margin_top_s">
                        <input type="text" id="u_year" name="u_year" placeholder="생년월일(YYMMDD)" style=" height: 50px;" />
                    </div>
                    <div class="col-12 margin_top_l color_red" style="margin-top: 4px;">
                    </div>
                    <!-- <div class="col-12 margin_top_l font_weight_b">의사면허증 사본</div>
                    <div class="col-12 margin_top_s">
                        <input type="text" name="u_file" id="u_file" placeholder="" style=" height: 50px;"
                            readonly />
                        <div class="id_check">파일</div>
                        <input type="file" name="file_1" class="input_file"
                            onchange="document.getElementById('u_file').value = this.value.split('\\')[this.value.split('\\').length-1]" />
                    </div>
                    <div class="col-12 margin_top_l color_red" style="margin-top: 4px;">대미개는 의사분들만 들을 수 있는 공간입니다. <br>
                        원활한 신분확인을 위해 의사면허증 사본을 첨부해주세요.</div> -->
                    <div class="col-12 margin_top_l font_weight_b">전공과목</div>
                    <div class="col-12 margin_top_s">
                        <input type="text" id="u_major" name="u_major" placeholder="전공과목을 입력해주세요." style=" height: 50px;" />
                    </div>
                    <div class="col-12 margin_top_l font_weight_b">출신의과대학</div>
                    <div class="col-12 margin_top_s">
                        <input type="text" id="u_from" name="u_from" placeholder="출신의과대학을 입력해주세요." style=" height: 50px;" />
                    </div>
                    <div class="col-12" style="margin-top: 40px;padding: 0">
                        <div class="button" style="margin: 0 auto; background-color: #2b2b2b; color:#fff" onclick="submit()">
                            가입하기
                        </div>
                    </div>
                    <div class="col-12" style="margin-top: 40px;">
                        계속 진행함으로써 본인은 대한미용개원학회 또는 대한미용개원학회 직원이 마케팅 목적 등을 이유로 본인이 제공한 이메일 주소나 전화번호로 이메일, 전화, SMS(자동 전화
                        접속시스템 포함) 등의 방법을 통해 본인에게 연락할 수 있다는 데 동의합니다. 대한미용개원학회 <span class="underline"><a href="" style="color:#2B2B2B">개인정보
                                취급방침</a></span>과
                        <span class="underline"><a href="" style="color:#2B2B2B">서비스
                                이용약관</a></span>에 관련된 내용을 모두
                        읽고 이해했습니다.
                    </div>
                    <div class="line col-12 margin_v_l"></div>
                    <div class="col-12 text_align_center font_size_m font_weight_b">이미 계정이 있으신가요? <span class="color_b"><a href="signin">로그인하기</a></span></div>
                </div>
            </form>
        </div>
        <div class="login_bar"></div>
        <div class="login_right" style="position: fixed; left: 45%;">
            <div class="big_logo">
                <p>대한미용개원의사회</p> <span>korean medical mentoring organization</span>
            </div>
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
<script src="js/member.js"></script>
<script>
    $(document).ready(function(){
        $('#ph1').keyup(function(){
            var limit = $(this).attr('maxlength')
            if(this.value.length>=limit){
                $('#ph2').focus()
            }
        })
        $('#ph2').keyup(function(){
            var limit = $(this).attr('maxlength')
            if(this.value.length>=limit){
                $('#ph3').focus()
            }
        })
    })

</script>
</html>