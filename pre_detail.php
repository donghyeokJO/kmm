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
    $u_phone = $user['u_phone'];
    $ph1 = substr($u_phone, 0, 3);
    $ph2 = substr($u_phone, 3, 4);
    $ph3 = substr($u_phone, 7, 4);
}
$s_id = $_GET['id'];
$query = "select * from seminar where s_id = '$s_id'";
$seminar = mysqli_fetch_array(mysqli_query($conn, $query));
$img_src = $seminar['s_post'];
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
    <link rel="stylesheet" href="css/pre_detail2.css">
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
    <div id="kakao-link-btn" class = "ploting_banner" onclick="sendLink()">
        <img src="/img/kakao_banner.png"/>
    </div>s
    <section id="pre">
        <div class="section_pre_title">
            <div class="section_pre_title_area">
                사전등록
            </div>
        </div>
        <div class="detail">
            <form id="regi_form" action="/form/pre_regi.php" method="POST">
                <div class="detail_banner">
                    <img src='<?php echo $img_src?>' width="698" height="9140">
                </div>
                <div class="detail_item di1 m_di1">
                    <div class="detail_title">
                        개인정보수집
                    </div>
                    <div class="detail_contents">
                        <div class="detail_text">
                            한국미용개원학회는 평점 부여, 본인확인과 개인식별등 각종 안내의 원활한 제공을 위하여 아래와 같은 최소한의 개인정보를 필수항목으로 수집하고 있습니다. <br>
                            모든 내용을 확인하신 후에 동의하여 주시기 바랍니다. 개인정보수집 제공에 동의하십니까?
                        </div>
                        <div class="radio">
                            <div class="radio_bar">
                                <input class="input_radio ir1" type="radio" id="info_radio1" name="info_radio" value="예">
                                <label for="info_radio1">예</label>
                                <input class="input_radio ir2" type="radio" id="info_radio2" name="info_radio" value="아니요">
                                <label for="info_radio2">아니요</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail_item di2 m_di2">
                    <div class="detail_title">
                        참가비구분
                    </div>
                    <div class="detail_contents">
                        <div class="detail_pay">
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio1" name="pay_radio" value="정회원 30,000원">
                                <label for="pay_radio1">정회원 30,000원</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2" name="pay_radio" value="비회원 60,000원">
                                <label for="pay_radio2">비회원 60,000원</label>
                            </div>
                            <!-- <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio3" name="pay_radio1"
                                    value="실장 및 코디네이터 80,000원">
                                <label for="pay_radio1_3">실장 및 코디네이터 80,000원</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio4" name="pay_radio1"
                                    value="실장 및 코디네이터 (원장 동반 등록) 50,000원">
                                <label for="pay_radio1_4">실장 및 코디네이터 (원장 동반 등록) 50,000원</label>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="detail_item di3 m_di3">
                    <div class="detail_title">
                        이름
                    </div>
                    <div class="detail_contents">
                        <label for="name_ko">국문:</label>
                        <input type="text" id ="name_kr" name="name_kr" class="input_name">
                        <input type="hidden" name="s_id" value="<?php echo $s_id ?>">
                        <br>
                        <label for="name_en" class="name2">영문:</label>
                        <input type="text" id ="name_en" name="name_en" class="input_name">
                    </div>
                </div>
                <div class="detail_item di3 m_di4">
                    <div class="detail_title">
                        주민번호(앞자리)
                    </div>
                    <div class="detail_contents">
                        <input type="number" id ="u_year" name="regi_num" class="input_name">
                    </div>
                </div>
                <div class="detail_item di3 m_di5">
                    <div class="detail_title">
                        휴대폰번호
                    </div>
                    <div class="detail_contents">
                        <input type="text" id ="ph1" name="ph1" class="input_tel">-
                        <input type="text" id ="ph2" name="ph2" class="input_tel">-
                        <input type="text" id = "ph3" name="ph3" class="input_tel">
                    </div>
                </div>
                <div class="detail_item di3 m_di6">
                    <div class="detail_title">
                        면허번호
                    </div>
                    <div class="detail_contents">
                        <input type="number" id ="u_license" name="license" class="input_name">
                    </div>
                </div>
                <div class="detail_item di3 m_di7">
                    <div class="detail_title">
                        병원명
                    </div>
                    <div class="detail_contents">
                        <input type="text" name="hos_name" class="input_name">
                    </div>
                </div>
                <div class="detail_item di4 m_di8">
                    <div class="detail_title">
                        진료과구분
                    </div>
                    <div class="detail_contents">
                        <div class="detail_pay">
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_1" name="pay_radio2" value="일반의">
                                <label for="pay_radio2_1">일반의</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_2" name="pay_radio2" value="가정의학과">
                                <label for="pay_radio2_2">가정의학과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_3" name="pay_radio2" value="결핵과">
                                <label for="pay_radio2_3">결핵과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_4" name="pay_radio2" value="내과">
                                <label for="pay_radio2_4">내과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_5" name="pay_radio2" value="마취통증의학과">
                                <label for="pay_radio2_5">마취통증의학과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_6" name="pay_radio2" value="방사선종양학과">
                                <label for="pay_radio2_6">방사선종양학과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_7" name="pay_radio2" value="병리과">
                                <label for="pay_radio2_7">병리과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_8" name="pay_radio2" value="비뇨기과">
                                <label for="pay_radio2_8">비뇨기과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_9" name="pay_radio2" value="산부인과">
                                <label for="pay_radio2_9">산부인과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_10" name="pay_radio2" value="성형외과">
                                <label for="pay_radio2_10">성형외과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_11" name="pay_radio2" value="소아청소년과">
                                <label for="pay_radio2_11">소아청소년과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_12" name="pay_radio2" value="신경과">
                                <label for="pay_radio2_12">신경과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_13" name="pay_radio2" value="신경외과">
                                <label for="pay_radio2_13">신경외과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_14" name="pay_radio2" value="안과">
                                <label for="pay_radio2_14">안과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_15" name="pay_radio2" value="영상의학과">
                                <label for="pay_radio2_15">영상의학과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_16" name="pay_radio2" value="예방의학과">
                                <label for="pay_radio2_16">예방의학과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_17" name="pay_radio2" value="외과">
                                <label for="pay_radio2_17">외과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_18" name="pay_radio2" value="응급의학과">
                                <label for="pay_radio2_18">응급의학과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_19" name="pay_radio2" value="이비인후과">
                                <label for="pay_radio2_19">이비인후과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_20" name="pay_radio2" value="재활의학과">
                                <label for="pay_radio2_20">재활의학과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_21" name="pay_radio2" value="정신건강의학과">
                                <label for="pay_radio2_21">정신건강의학과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_22" name="pay_radio2" value="정형외과">
                                <label for="pay_radio2_22">정형외과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_23" name="pay_radio2" value="작업환경의학과">
                                <label for="pay_radio2_23">작업환경의학과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_24" name="pay_radio2" value="진단검사의학과">
                                <label for="pay_radio2_24">진단검사의학과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_25" name="pay_radio2" value="피부과">
                                <label for="pay_radio2_25">피부과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_26" name="pay_radio2" value="핵의학과">
                                <label for="pay_radio2_26">핵의학과</label>
                            </div>
                            <div class="radio_bar">
                                <input class="input_radio" type="radio" id="pay_radio2_27" name="pay_radio2" value="흉부외과">
                                <label for="pay_radio2_27">흉부외과</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail_item di3 m_di9">
                    <div class="detail_title">
                        이메일
                    </div>
                    <div class="detail_contents">
                        <input type="text" id ="u_email" name="email" class="input_name">
                    </div>
                </div>
                <!-- <div class="detail_item di5 m_di10">
                    <div class="detail_title">
                        병원주소
                    </div>
                    <div class="detail_contents">
                        <div class="ad_num"></div>
                        <div class="ad_search">
                            우편번호검색
                        </div>
                        <div class="ad"></div>
                        <input type="text" class="ad_detail" placeholder="상세주소를 입력해주세요.">
                    </div>
                </div> -->
                <div class="detail_item di3 m_di11">
                    <div class="detail_title">
                        입금자명
                    </div>
                    <div class="detail_contents">
                        <input type="text" name="money_name" class="input_name">
                    </div>
                </div>
            </form>
            <div class="m_bar"></div>
            <div class="list_btn" onclick="location.href='pre'">
                < 목록 </div> <div class="pre_button" onclick="regi_submit()">
                    사전등록
            </div>
        </div>
    </section>
    <div class="fixed_bar pc" onclick="positionToBottom();">
        사전등록 하러가기 >
    </div>
    <div class="fixed_bar mobile" onclick="positionToBottom_m();">
        사전등록 하러가기 >
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c3089a3225.js" crossorigin="anonymous"></script>
<script src="js/script2.js"></script>
<script>
    function regi_submit() {
        var info = $('input[name="info_radio"]:checked').val()
        var pay = $('input[name="pay_radio"]:checked').val()
        var login = '<?php echo $u_code ?>'
        // console.log(info)
        if (info == '아니요') {
            alert('개인정보 수집에 동의해야 사전접수를 신청할 수 있습니다.')
        } else if (pay == '정회원 30,000원' && !login) {
            alert('로그인한 회원만 이용할 수 있는 옵션입니다. 로그인해주세요.')
        } else {
            $('#regi_form').submit()
        }
    }
</script>
<script>
    $(document).ready(function(){
        var u_code = '<?php echo $login?>'
        if(u_code){
            var u_name_kr = '<?php echo $user['u_name_kr']?>'
            var u_name_en = '<?php echo $user['u_name_en']?>'
            var u_year = '<?php echo $user['u_year']?>'
            var ph1 = '<?php echo $ph1?>'
            var ph2 = '<?php echo $ph2?>'
            var ph3 = '<?php echo $ph3?>'
            var u_license = '<?php echo $user['u_license']?>'
            var u_major = '<?php echo $user['u_major']?>'
            var u_email = '<?php echo $user['u_email']?>'
            
            $('#pay_radio1').prop('checked', true);
            $('#name_kr').val(u_name_kr)
            $('#name_en').val(u_name_en)
            $('#u_year').val(u_year)
            $('#ph1').val(ph1)
            $('#ph2').val(ph2)
            $('#ph3').val(ph3)
            $('#u_license').val(u_license)
            $('#u_email').val(u_email)
            $("input:radio[name='pay_radio2']:radio[value=" + u_major + "]").prop('checked', true);
        }
    })
</script>
<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<script>
function sendLink() {
  Kakao.init('6a9882b406c0a035378325a2105edf97');
  Kakao.Link.sendScrap({
    requestUrl: 'http://kmm.or.kr/pre_detail?id='+'<?php echo $s_id?>'
  });
}
</script>

</html>