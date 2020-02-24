<?php
    session_start();

    setcookie('u_code_cookie', '', time() - 3600 * 24 * 10, '/', 'kmm.or.kr');
    setcookie('u_pw_cookie', '', time() - 3600 * 24 * 10, '/', 'kmm.or.kr');
    $res = session_destroy();

    if ($res) {
        echo '<script>location.href="/index"</script>';
    }
