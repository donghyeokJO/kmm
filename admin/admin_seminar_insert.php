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
    $user_query = 'select * from user where u_type !="탈퇴"';
    $num = mysqli_num_rows(mysqli_query($conn, $user_query));
} else {
    s_msg('관리자 메뉴입니다.');
    echo '<script>location.href="/index"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>대미개 관리자</title>
    <link rel="stylesheet" href="/css/admin_main2.css">
    <link rel="stylesheet" href="/css/admin_seminar_info2.css">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Noto+Sans|Nanum+Brush+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="logo">
            <span>대한미용개원의사회</span>
            <p>The Korean Aesthetic Association</p>
        </div>
        <div class="adminpage">
            관리자페이지
        </div>
    </header>
    <section id="admin">
        <div class="admin_tab" id="admin_tab">
            <!-- <ul class="member">회원관리
                <li><a href="index">멤버관리</a></li>
                <li><a href="">탈퇴한 멤버</a></li>
            </ul>
            <ul class="pre" onclick="location.href='admin_seminar'">사전접수
            </ul> -->
        </div>
        <div class="member_page">
            <div class="member_page_title">
                세미나관리
            </div>
            <div class="member_page_count">
                세미나 목록관리 > 세미나 추가
            </div>
            <form action="seminar_insert" method="POST" enctype="multipart/form-data">
                <div class="seminar_info">
                    <div class="info_left">
                        <div class="semina_info_item">
                            <div class="seminar_info_title">
                                세미나 제목
                            </div>
                            <input type="text" name = "s_name" placeholder="세미나 제목을 입력해주세요.">
                        </div>
                        <div class="semina_info_item">
                            <div class="seminar_info_title">
                                내용이미지 추가하기
                            </div>
                            <div class="input_file">
                                이미지업로드
                            </div>
                            <input type="file" name ="File[]" onchange = "javascript: document.getElementById('s_post').value=this.value.split('\\')[this.value.split('\\').length-1]">
                            <div class="img_upload_txt">
                                이미지 가로폭 사이즈는 1000px 이상으로 맞춰주세요.
                            </div>
                            <input type = "hidden" id = "s_post" name = "s_post">
                        </div>
                        <div class="semina_info_item" style="margin-top: 70px; margin-bottom: 0;"> 
                            <div class="seminar_info_title">
                                포스터 추가하기
                            </div>
                            <div class="input_file">
                                이미지업로드
                            </div>
                            <input type="file" name ="File[]" onchange = "javascript: document.getElementById('s_banner').value=this.value.split('\\')[this.value.split('\\').length-1]">
                            <div class="img_upload_txt">
                                이미지 사이즈는 300x400 px 이상으로 맞춰주세요.
                            </div>
                            <input type = "hidden" id = "s_banner" name = "s_banner" >
                        </div>
                    </div>
                    <div class="info_right">
                        <div class="semina_info_item">
                            <div class="seminar_info_title">
                                세미나 날짜
                            </div>
                            <div class="select_bar">
                                <select name="s_year" id="s_year">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                                <span>년</span>
                                <select name="s_month" id="s_month">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>

                                </select>
                                <span>월</span>
                                <select name="s_day" id="s_day">
                                    <option value="30">30</option>
                                    <option value="29">29</option>
                                    <option value="28">28</option>
                                    <option value="27">27</option>
                                    <option value="26">26</option>
                                    <option value="25">25</option>
                                    <option value="24">24</option>
                                    <option value="23">23</option>
                                    <option value="22">22</option>
                                    <option value="21">21</option>
                                    <option value="20">20</option>
                                    <option value="19">19</option>
                                    <option value="18">18</option>
                                    <option value="17">17</option>
                                    <option value="16">16</option>
                                    <option value="15">15</option>
                                    <option value="14">14</option>
                                    <option value="13">13</option>
                                    <option value="12">12</option>
                                    <option value="11">11</option>
                                    <option value="10">10</option>
                                    <option value="9">9</option>
                                    <option value="8">8</option>
                                    <option value="7">7</option>
                                    <option value="6">6</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                                <span>일</span>
                            </div>
                        </div>
                        <div class="semina_info_item">
                            <div class="seminar_info_title">
                                세미나 사전접수 기간
                            </div>
                            <div class="select_bar">
                                <select name="p1_year" id="p1_year">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                                <span>년</span>
                                <select name="p1_month" id="p1_month">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>

                                </select>
                                <span>월</span>
                                <select name="p1_day" id="p1_day">
                                    <option value="30">30</option>
                                    <option value="29">29</option>
                                    <option value="28">28</option>
                                    <option value="27">27</option>
                                    <option value="26">26</option>
                                    <option value="25">25</option>
                                    <option value="24">24</option>
                                    <option value="23">23</option>
                                    <option value="22">22</option>
                                    <option value="21">21</option>
                                    <option value="20">20</option>
                                    <option value="19">19</option>
                                    <option value="18">18</option>
                                    <option value="17">17</option>
                                    <option value="16">16</option>
                                    <option value="15">15</option>
                                    <option value="14">14</option>
                                    <option value="13">13</option>
                                    <option value="12">12</option>
                                    <option value="11">11</option>
                                    <option value="10">10</option>
                                    <option value="9">9</option>
                                    <option value="8">8</option>
                                    <option value="7">7</option>
                                    <option value="6">6</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                                <span>일&nbsp;&nbsp;&nbsp;부터</span>
                            </div>
                            <div class="select_bar">
                                <select name="p2_year" id="p2_year">
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                </select>
                                <span>년</span>
                                <select name="p2_month" id="p2_month">
                                    <option value="12">12</option>
                                    <option value="11">11</option>
                                    <option value="10">10</option>
                                    <option value="9">9</option>
                                    <option value="8">8</option>
                                    <option value="7">7</option>
                                    <option value="6">6</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>

                                </select>
                                <span>월</span>
                                <select name="p2_day" id="p2_day">
                                    <option value="30">30</option>
                                    <option value="29">29</option>
                                    <option value="28">28</option>
                                    <option value="27">27</option>
                                    <option value="26">26</option>
                                    <option value="25">25</option>
                                    <option value="24">24</option>
                                    <option value="23">23</option>
                                    <option value="22">22</option>
                                    <option value="21">21</option>
                                    <option value="20">20</option>
                                    <option value="19">19</option>
                                    <option value="18">18</option>
                                    <option value="17">17</option>
                                    <option value="16">16</option>
                                    <option value="15">15</option>
                                    <option value="14">14</option>
                                    <option value="13">13</option>
                                    <option value="12">12</option>
                                    <option value="11">11</option>
                                    <option value="10">10</option>
                                    <option value="9">9</option>
                                    <option value="8">8</option>
                                    <option value="7">7</option>
                                    <option value="6">6</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                                <span>일&nbsp;&nbsp;&nbsp;까지</span>
                            </div>
                        </div>
                        <div class="semina_info_item">
                            <!-- <div class="seminar_info_title">
                                메인 배너
                            </div>
                            <div class="input_banner_link" onclick="location.href='admin_banner2'">
                                배너 추가 하러 가기 >
                            </div> -->
                        </div>
                    </div>
                </div>
                <input type="submit" value="저장하기">
            </form>
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c3089a3225.js" crossorigin="anonymous"></script>
<script src="/js/script2.js"></script>
<script src="js/admin.js"></script>
<script>
    $(document).ready(function() {
        set_menu()
        set_member()
    })
</script>

</html>