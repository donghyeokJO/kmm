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
    $user_query = 'select * from user';
    $num = mysqli_num_rows(mysqli_query($conn, $user_query));
    $p_id = $_GET['id'];
    $query = "select * from pre where p_id = '$p_id'";
    $member = mysqli_fetch_array(mysqli_query($conn, $query));
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
    <link rel="stylesheet" href="/css/admin_semina2.css">
    <link rel="stylesheet" href="/css/mypage2.css">
    <link rel="stylesheet" href="/css/pre_detail2.css">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Noto+Sans|Nanum+Brush+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .input_radio {
            width: 16px !important;
            margin-right: 8px !important;
            box-shadow: none !important;
        }

        .detail_contents {
            width: 840px;
        }

        .admin_tab {
            height: 130vh;
        }

        .ok_btn {
            width: 159px !important;
            height: 37px;
            border: solid 1px #707070 !important;
            background-color: #ffffff;
            font-family: 'Noto Sans', sans-serif !important;
            font-size: 14px !important;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: 37px;
            letter-spacing: -1.12px;
            text-align: center;
            color: #181b2c;
            padding: 0 !important;
            margin-top: 51px;
            margin-left: 50%;
            transform: translateX(-50%);
        }

        ul.pre>li:last-child a {
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


        </div>
        <div class="semina_page">
            <div class="semina_page_title">
                세미나관리
            </div>
            <div class="semina_page_count" style="cursor: pointer;" onclick="location.href='index'">
                세미나 접수관리
            </div>
            <div class="semina_page_content">
                <select name="" id="">
                    <option value="2019 나는 개원의의다">2019 나는 개원의의다</option>
                    <option value="2019 나는 개원의의다">2019 나는 개원의의다</option>
                    <option value="2019 나는 개원의의다">2019 나는 개원의의다</option>
                </select>
            </div>
            <div class="member_page_content" style="font-weight: bold; font-size: 14px; margin-top: 28px;">
                세미나명 : 2019 대한미용개원의사회 “나는 개원의이다”
            </div>
            <div class="mypage_info_area" style="border-top: none;">
                <div class="semina_page_title" style="margin-top: 28px; margin-bottom: 20px;">
                    <span><?php echo $member['name_kr'] ?></span>님
                </div>

                <div class="detail_item di2 m_di2">
                    <div class="detail_title">
                        참가비구분
                    </div>
                    <div class="detail_contents">
                        <div class="detail_pay">
                            <input type="text" class="input_name" readonly value="<?php echo $member['pay'] ?>">
                        </div>
                    </div>
                </div>
                <div class="detail_item di3 m_di3">
                    <div class="detail_title">
                        이름
                    </div>
                    <div class="detail_contents">
                        <label for="name_ko">국문:</label>
                        <input type="text" id="name_ko" class="input_name" readonly value="<?php echo $member['name_kr'] ?>">
                        <br>
                        <label for="name_en" class="name2">영문:</label>
                        <input type="text" id="name_en" class="input_name" readonly value="<?php echo $member['name_en'] ?>">
                    </div>
                </div>
                <div class="detail_item di3 m_di4">
                    <div class="detail_title">
                        주민번호(앞자리)
                    </div>
                    <div class="detail_contents">
                        <input type="number" id="idn" class="input_name" readonly value="<?php echo $member['regi_num'] ?>">
                    </div>
                </div>
                <div class="detail_item di3 m_di5">
                    <div class="detail_title">
                        휴대폰번호
                    </div>
                    <div class="detail_contents">
                        <input type="text" id="idn" class="input_name" readonly value="<?php echo $member['phone'] ?>">

                    </div>
                </div>
                <div class="detail_item di3 m_di6">
                    <div class="detail_title">
                        면허번호
                    </div>
                    <div class="detail_contents">
                        <input type="text" id="idn" class="input_name" readonly value="<?php echo $member['license'] ?>">
                    </div>
                </div>
                <div class="detail_item di3 m_di7">
                    <div class="detail_title">
                        병원명
                    </div>
                    <div class="detail_contents">
                        <input type="text" id="idn" class="input_name" readonly value="<?php echo $member['hos_name'] ?>">
                    </div>
                </div>
                <div class="detail_item di4 m_di8">
                    <div class="detail_title">
                        진료과구분
                    </div>
                    <div class="detail_contents">
                        <input type="text" id="idn" class="input_name" readonly value="<?php echo $member['subject'] ?>">
                    </div>

                </div>
                <div class="detail_item di3 m_di9">
                    <div class="detail_title">
                        이메일
                    </div>
                    <div class="detail_contents">
                        <input type="text" id="idn" class="input_name" readonly value="<?php echo $member['email'] ?>">
                    </div>
                </div>

                <div class="detail_item di3 m_di11">
                    <div class="detail_title">
                        입금자명
                    </div>
                    <div class="detail_contents">
                        <input type="text" id="idn" class="input_name" readonly value="<?php echo $member['money_name'] ?>">
                    </div>
                </div>
                <?php
                if ($member['accept'] == '미승인') {
                    echo "<button  class=\"ok_btn\" onclick = 'location.href=\"js/pre_accept?p_id=$member[p_id]\"'>승인</button>";
                } else {
                    echo '<button  class="ok_btn">승인완료</button>';
                }
                ?>

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