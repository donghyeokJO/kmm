<?php
    header('Content-Type:application/json');
    function get_keywords($u_name_kr, $u_license)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
        $conn = dbconnect($host, $dbid, $dbpass, $dbname);
        $tmpArr = [];
        $query = "select * from user where u_name_kr = '$u_name_kr' and u_license = '$u_license'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 0) {
            $tmpArr['u_id'] = '가입된 아이디가 없습니다.';
        } else {
            $user = mysqli_fetch_array($result);
            $tmpArr['u_id'] = $user['u_id'];
        }
        echo json_encode($tmpArr);
    }

    get_keywords($_POST['u_name_kr'], $_POST['u_license']);
