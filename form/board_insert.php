<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';

    $conn = dbconnect($host, $dbid, $dbpass, $dbname);

    $title = $_POST['title'];
    $writer = $_POST['writer'];
    $content = $_POST['board_content'];
    if (isset($_POST['anonymous'])) {
        $writer = '익명';
    }
    $u_code = $_POST['u_code'];
    // echo $u_code;
    $wdate = date('Y-m-d H:i:s', time());
    $content = str_replace("'", "\'", $content);
    $query = "insert into board(title,writer,content,date,u_code) values('$title','$writer','$content','$wdate','$u_code')";
    if ($ret = mysqli_query($conn, $query)) {
        s_msg('성공적으로 입력되었습니다.');
        echo '<script>location.href="/board"</script>';
    } else {
        msg('입력에 실패하였습니다. 내용을 확인해주세요');
    }
