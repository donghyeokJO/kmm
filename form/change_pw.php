<?php
    // include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    // include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/header.php';
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);

    session_start();
    $u_code = $_SESSION['u_code'];
    $query = "select * from user where u_code='$u_code'";
    $temp = mysqli_query($conn, $query);
    $user = mysqli_fetch_array($temp);
    $u_id = $user['u_id'];
    $cur_pw = $_POST['cur_pw'];
    $new_pw = $_POST['new_pw'];
    $new_pwc = $_POST['new_pwc'];
    if (!password_verify($cur_pw, $user['u_pw'])) {
        msg('현재 비밀번호가 일치하지 않습니다.');
    } else {
        if ($cur_pw == $new_pw) {
            msg('현재 비밀번호와 새로운 비밀번호가 일치합니다.');
        } else {
            if ($new_pw != $new_pwc) {
                msg('새로운 비밀번호화 비밀번호 확인이 일치하지 않습니다.');
            } else {
                $pattern = '/^.*(?=^.{8,}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';
                $pattern2 = '/^(?=.*[a-zA-Z])(?=.*[0-9]).{8,}$/';

                if (!preg_match($pattern, $new_pw) && !preg_match($pattern2, $new_pw)) {
                    msg('비밀번호는 알파벳 대소문자, 숫자, 특수문자 중 2가지 이상의 조합으로 8자이상만 가능합니다.');
                } else {
                    $u_pw = password_hash($new_pw, PASSWORD_DEFAULT);
                    $query = "update user set u_pw = '$u_pw' where u_code ='$u_code'";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        msg('변경되었습니다.');
                        echo '<script>location.href="/mypage"</script>';
                    } else {
                        msg('잘못된 요청입니다. ');
                    }
                }
            }
        }
    }
