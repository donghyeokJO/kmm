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
    $code = $_GET['u_code'];
    $user_query = "select * from user where u_code ='$code'";
    $row = mysqli_fetch_array(mysqli_query($conn, $user_query));
    $link = "/js/delete_user?u_code=<?php echo $row[u_code]";
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
    <link rel="stylesheet" href="/css/mypage2.css">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Noto+Sans|Nanum+Brush+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        ul.member>li:first-child a {
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
        <div class="semina_page">
            <div class="semina_page_title">
                멤버관리
            </div>
            <div class="semina_page_count" style="cursor: pointer;" onclick="location.href='index'">
                &lt; 돌아가기
            </div>
            <div class="mypage_info_area" style="border-top: solid 2px #707070; margin-top: 22px;">
                <div class="semina_page_title" style="margin-top: 28px; margin-bottom: 20px;">
                    <span><?php echo $row['u_name_kr'] ?></span>님
                </div>
                <div class="mypage_info" style="border: none;">
                    <div class="mypage_info_title">
                        아이디
                    </div>
                    <input type="text" class="mypage_input" value="<?php echo $row['u_id'] ?>">
                </div>
                <div class="mypage_info">
                    <div class="mypage_info_title">
                        이름
                    </div>
                    <input type="text" class="mypage_input" value="<?php echo $row['u_name_kr'] ?>">
                    <input type="text" class="mypage_input" value="<?php echo $row['u_name_en'] ?>">
                </div>
                <div class="mypage_info">
                    <div class="mypage_info_title">
                        이메일
                    </div>
                    <input type="email" class="mypage_input" readonly style="background-color: #ededed;" value="<?php echo $row['u_email'] ?>">
                </div>
                <div class="mypage_info">
                    <div class="mypage_info_title">
                        의사면허 / 생년월일
                    </div>
                    <input type="text" class="mypage_input" value="<?php echo $row['u_license'] ?>">
                    <input type="number" class="mypage_input" value="<?php echo $row['u_year'] ?>">
                </div>
                <div class="mypage_info">
                    <div class="mypage_info_title">
                        전공과목
                    </div>
                    <input type="text" class="mypage_input" value="<?php echo $row['u_major'] ?>">
                </div>
                <!-- <div class="mypage_info">
                    <div class="mypage_info_title">
                        멤버타입
                    </div>
                    <input type="text" class="mypage_input" value="<?php echo $row['u_type'] ?>">
                </div> -->
                <div class="mypage_info">
                    <div class="mypage_info_title">
                        출신대학
                    </div>
                    <input type="text" class="mypage_input" value="<?php echo $row['u_from'] ?>">
                </div>
            </div>
            <div class="btn_list">
                <div class="account_delete_btn" onclick='location.href="js/delete_user?u_code=<?php echo $row['u_code'] ?>"'>
                    회원탈퇴
                </div>
                <div class="save_btn" style="margin-left: 750px; float: none !important;">
                    변동사항 저장
                </div>
            </div>
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
    })
</script>

</html>