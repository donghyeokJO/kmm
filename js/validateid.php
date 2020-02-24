<?php
    header('Content-Type:application/json');
    function get_keywords($u_id)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
        $conn = dbconnect($host, $dbid, $dbpass, $dbname);
        $tmpArr = [];
        $query = "select * from user where u_id = '$u_id'";
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $tmpArr['fail'] = '이미 사용중인 아이디 입니다.';
            $tmpArr['success'] = '';
        } else {
            $tmpArr['fail'] = '';
            $tmpArr['success'] = '사용가능한 아이디 입니다.';
        }
        echo json_encode($tmpArr);
    }

    get_keywords($_POST['u_id']);
