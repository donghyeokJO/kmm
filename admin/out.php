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
    $user_query = 'select * from user where u_type = "탈퇴"';
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
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Noto+Sans|Nanum+Brush+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        ul.member>li:last-child a {
            color: #1967d1;
        }
    </style>
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
                멤버관리
            </div>
            <div class="member_page_count">
                탈퇴회원(<span><?php echo $num ?></span>)
            </div>
            <div class="member_page_content">
                멤버 타입 및 ID변경이 가능하며, 내보내기(탈퇴) 처리를 할 수 있습니다.
            </div>
            <div class="member_list" id="member_list">
                <!-- <div class="member_list_tab">
                    <div class="member_name_tab">
                        이름
                    </div>
                    <div class="member_type_tab">
                        멤버타입
                    </div>
                    <div class="member_signup_tab">
                        가입일
                    </div>
                    <div class="member_recent_tab">
                        최근접속일
                    </div>
                    <div class="member_manege_tab">
                        관리
                    </div>
                </div> -->


            </div>
        </div>
        <ul class="pagination">
            <li class="on">1</li>&nbsp;
            <li>2</li>&nbsp;
            <li>3</li>&nbsp;
            <li>4</li>&nbsp;
            <li>5</li>&nbsp;
            <li>></li>&nbsp;
            <li>>></li>
        </ul>
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
        set_out()
    })
</script>

</html>