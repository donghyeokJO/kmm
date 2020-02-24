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
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Noto+Sans|Nanum+Brush+Script&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                사전접수
            </div>
            <div class="semina_page_count">
                세미나 목록
            </div>
            <div class="semina_list" id ="seminar_list">
           
            </div>
            <ul class="pagination">
         
            </ul>
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c3089a3225.js" crossorigin="anonymous"></script>
<script src="js/script2.js"></script>
<script src="js/admin.js"></script>
<script>
    $(document).ready(function(){
        set_menu()
        set_seminar()
    })
</script>
</html>