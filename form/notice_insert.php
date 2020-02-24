<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';

    $conn = dbconnect($host, $dbid, $dbpass, $dbname);

    $title = $_POST['title'];
    $u_code = $_POST['writer'];
    $content = $_POST['notice_content'];

    $wdate = date('Y-m-d', time());
    $content = str_replace("'", "\'", $content);
    $query = "insert into notice(title,u_code,content,w_date) values('$title','$u_code','$content','$wdate')";
    // echo $query;
    if ($ret = mysqli_query($conn, $query)) {
        s_msg('성공적으로 입력되었습니다.');
        echo '<script>location.href="/notice"</script>';
    } else {
        msg('입력에 실패하였습니다. 내용을 확인해주세요');
    }
