<?php
    header('Content-Type:application/json');

    function get_keywords($u_id, $u_license)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
        $conn = dbconnect($host, $dbid, $dbpass, $dbname);
        $tmpArr = [];
        $query = "select * from user where u_id = '$u_id' and u_license = '$u_license'";
        $result = mysqli_query($conn, $query);
        $temp_pw = GenerateString(8);
        $u_pw = password_hash($temp_pw, PASSWORD_DEFAULT);
        if (mysqli_num_rows($result) == 0) {
            $tmpArr['u_pw'] = '가입된 아이디가 없습니다.';
        } else {
            $ret = mysqli_query($conn, "update user set u_pw ='$u_pw' where u_id='$u_id' and u_license = '$u_license'");
            if ($ret) {
                $tmpArr['u_pw'] = $temp_pw;
            } else {
                $tmpArr['u_pw'] = '오류가 발생했습니다. 잠시후 다시 시도해주세요.';
            }
        }
        echo json_encode($tmpArr);
    }

    get_keywords($_POST['u_id'], $_POST['u_license']);
