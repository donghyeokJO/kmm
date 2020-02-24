<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';

    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    if (isset($_GET['u_code']) && isset($_GET['hash'])) {
        $u_code = $_GET['u_code'];
        $query = "select * from user where u_code = '$u_code'";
        $ret = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($ret);

        $hash = $_GET['hash'];

        if (headers_sent($file, $line)) {
            msg('Cannot create cookie');
        } else {
            setcookie('u_code_cookie', $u_code, time() + 3600 * 24 * 10, '/', 'kmm.or.kr');
            setcookie('u_pw_cookie', $hash, time() + 3600 * 24 * 10, '/', 'kmm.or.kr');

            echo '<script>location.href="/index";</script>';
        }
    } else {
        echo '<script>alert("Unknown error. Login failed");location.href="/signin"</script>';
    }
