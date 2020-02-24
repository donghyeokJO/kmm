<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
    session_start();
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);

    $user = mysqli_query($conn, 'select * from user');

    $u_id = $_POST['u_id'];
    $u_pw = $_POST['u_pw'];
    $admin = '관리자asd';

    $query = "select * from user where u_id = '$u_id'";
    $ans = mysqli_query($conn, $query);

    if ($ans->num_rows == 1) {
        $row = $ans->fetch_array(MYSQLI_ASSOC);
        if ($row['u_type'] == '탈퇴') {
            msg('탈퇴한 회원입니다');
        }
        if (password_verify($u_pw, $row['u_pw'])) {
            $_SESSION['u_code'] = $row['u_code'];
            $u_code = $row['u_code'];
            if (isset($_SESSION['u_code'])) {
                if (isset($_POST['auto_login'])) {
                    $pass = $u_pw;
                    $key = 'medi180615';

                    $hash = Encrypt($pass, $secret_key, $secret_iv);
                    echo "<script>location.href='set_cookie.php?u_code=$u_code&hash=$hash';</script>";
                }
                // } elseif ($row['u_type'] == '관리자') {
                //     echo "<meta http-equiv = 'refresh' content = '0;url=/admin/index'>";
                // }
                else {
                    echo "<meta http-equiv='refresh' content='0;url=/index'>";
                }
            }
        } else {
            msg('비밀번호가 잘못 되었습니다.');
        }
    } else {
        msg('가입되지 않은 이메일입니다. 다시 확인해주세요');
    }
