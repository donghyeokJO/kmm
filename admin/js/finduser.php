<?php
    header('Content-Type:application/json');
    function get_keywords($table)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
        $conn = dbconnect($host, $dbid, $dbpass, $dbname);

        $query = "select * from $table where u_type != '탈퇴'";
        if ($result = mysqli_query($conn, $query, MYSQLI_USE_RESULT)) {
            $tmpArr = [];
            while ($row = mysqli_fetch_object($result)) {
                $t = [];
                $t['u_code'] = $row->u_code;
                $t['u_name_kr'] = $row->u_name_kr;
                $t['u_type'] = $row->u_type;
                $t['u_regi'] = $row->u_regi;
                $tmpArr[] = $t;
                unset($t);
            }
        } else {
            $tmpArr = [0 => 'empty'];
        }
        echo json_encode($tmpArr);
    }

    get_keywords($_POST['table']);
