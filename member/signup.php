<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $u_id = $_POST['u_id'];
    $u_pw = $_POST['u_pw'];
    $u_name_kr = $_POST['u_name_kr'];
    $u_name_en = $_POST['u_name_en'];
    $u_email = $_POST['u_email'];
    $u_license = $_POST['u_license'];
    $u_year = $_POST['u_year'];
    // $u_file = $_POST['u_file'];
    $u_major = $_POST['u_major'];
    $u_from = $_POST['u_from'];
    $u_code = GenerateString(10);
    $u_regi = date('Y-m-d', time());
    $ph1 = $_POST['ph1'];
    $ph2 = $_POST['ph2'];
    $ph3 = $_POST['ph3'];
    $u_phone = $ph1 . $ph2 . $ph3;
    // echo $u_phone;
    $u_pw = password_hash($u_pw, PASSWORD_DEFAULT);
    $query = "insert into user values('$u_code','$u_id','$u_pw','$u_name_kr','$u_name_en','$u_email','$u_license','$u_year','$u_major','$u_from','$u_regi','미인증','$u_phone')";
    $ret = mysqli_query($conn, $query);
    if ($ret) {
        s_msg('성공적으로 회원가입되었습니다.');
        echo "<script>location.href='/index'</script>";
    } else {
        msg('중복된 의사면허번호 입니다. 탈퇴 회원의 경우 관리자에게 문의해주시기 바랍니다.');
    }
