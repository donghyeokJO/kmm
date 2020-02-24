<?php
    header('Content-Type:application/json');
    function get_keywords($sid)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
        $conn = dbconnect($host, $dbid, $dbpass, $dbname);

        $query = "select * from pre where s_id = '$sid'";
        if ($result = mysqli_query($conn, $query, MYSQLI_USE_RESULT)) {
            $tmpArr = [];
            while ($row = mysqli_fetch_object($result)) {
                $t = [];
                $t['p_id'] = $row->p_id;
                $t['name'] = $row->name_kr;
                $t['subject'] = $row->subject;
                $t['pay'] = $row->pay;
                $t['phone'] = $row->phone;
                $t['ondate'] = substr($row->ondate, 0, 10);
                $t['accept'] = $row->accept;
                $tmpArr[] = $t;
                unset($t);
            }
        } else {
            $tmpArr = [0 => 'empty'];
        }
        echo json_encode($tmpArr);
    }

    get_keywords($_POST['s_id']);
