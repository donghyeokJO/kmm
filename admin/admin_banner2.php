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
<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>대미개 관리자</title>
    <link rel="stylesheet" href="/css/admin_banner2.css">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Noto+Sans|Nanum+Brush+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .upload_btn_file {
            position: absolute;
            top: 0;
            left: 0;
            width: 91px;
            height: 33px;
            border-radius: 50px;
            border: solid 1px #707070;
            font-family: 'Noto Sans', sans-serif;
            font-size: 12px;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: 33px;
            letter-spacing: -0.96px;
            text-align: center;
            color: #2b2b2b;
            cursor: pointer;
            opacity: 0
        }
        ul.banner>li:first-child a {
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
        <div class="banner_page">
            <div class="banner_page_title">
                메인페이지관리
            </div>
            <div class="banner_page_count">
                배너 설정
            </div>
            <div class="banner_list">
                <ul class="banner_list_ul" id = "banner_list_ul">
                    <!-- <li class="on"><img src="../img/main_hak.png" alt="배너 이미지" width="137" height="66" onclick="">
                        <div class="delete_btn">
                            <div class="n1"></div>
                            <div class="n2"></div>
                        </div>
                    </li>
                    <li><img src="../img/main_hak.png" alt="배너 이미지" width="137" height="66" onclick="">
                        <div class="delete_btn">
                            <div class="n1"></div>
                            <div class="n2"></div>
                        </div>
                    </li>
                    <li><img src="../img/main_hak.png" alt="배너 이미지" width="137" height="66" onclick="">
                        <div class="delete_btn">
                            <div class="n1"></div>
                            <div class="n2"></div>
                        </div>
                    </li> -->
                </ul>
                <div class="input_file">
                    <div class="insert_banner" >
                        + 새 배너 추가
                    </div>
                    <form id = "form2" action = "js/add_banner" method ="POST"  enctype="multipart/form-data">
                    <input name = "file2[]" onclick ="return add_banner()" type="file" onchange = "add_ban_change(this);document.getElementById('f_name').value=this.value.split('\\')[this.value.split('\\').length-1]">
                    <input type = "hidden" id = "f_name" name = "f_name">
                  
                    </form>
                </div>
            </div>
            <div class="big_banner" id ="big_banner">
                <!-- <img src="../img/main_hak.png" alt="배너 이미지" width="761" height="293" onclick=""> -->
            </div>
            <div class="banner_option" >
                <div class="img_option">
                    <div class="option_title">
                        사진설정
                    </div>

                    <form id ="form1" method = "POST" action = "js/change_banner" enctype="multipart/form-data">
                    <div class="option_content" id ="banner_option">
                        <!-- <div class="upload_btn" style="position: relative;" onclick="">
                            이미지업로드
                            <input class="upload_btn_file" type="file">
                        </div>
                        <div class="delete_btn" onclick="">
                            삭제
                        </div>
                        <div class="delete_btn" style = "background-color:#1967d1; color:#FFFFFF" onclick="">
                            저장하기
                        </div> -->
                    </div>
                    </form>
                    <div class="option_txt">
                        이미지 사이즈는 1000x511 px 입니다. <br>
                        세로폭 511px 이상의 이미지를 업로드해주셔야하며, 가로 1000px로 자동변환됩니다.
                    </div>
                </div>
           
            </div>
        </div>
        </form>
        <ul class="pagination">
            <!-- <li class="on">1</li>&nbsp;
            <li>2</li>&nbsp;
            <li>3</li>&nbsp;
            <li>4</li>&nbsp;
            <li>5</li>&nbsp;
            <li>></li>&nbsp;
            <li>>></li> -->
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
        set_member()
        set_banner_list(1)
        seton(1)
      
    })
  
</script>
<script>
  
    // $("#modi_img").change(function(){
    //     readURL(this);
    // });
      
</script>


</html>