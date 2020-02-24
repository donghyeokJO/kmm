<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $u_code = $_POST['u_code'];

    $u_name_kr = $_POST['u_name_kr'];
    $u_name_en = $_POST['u_name_en'];

    $u_email = $_POST['u_email'];

    $u_year = $_POST['u_year'];

    $u_major = $_POST['u_major'];
    $u_from = $_POST['u_from'];
    $u_phone = $_POST['u_phone'];
    $u_pw = password_hash($u_pw, PASSWORD_DEFAULT);
    $query = "update user set u_name_kr = '$u_name_kr', u_email = '$u_email', u_name_en ='$u_name_en', u_year = '$u_year',u_major = '$u_major',u_from = '$u_from', u_phone = '$u_phone' where u_code ='$u_code'";
    $ret = mysqli_query($conn, $query);
    if ($ret) {
        s_msg('성공적으로 변경되었습니다.');
        echo "<script>location.href='/mypage'</script>";
    } else {
        msg('unknown error');
    }
