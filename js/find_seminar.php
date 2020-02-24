<?php
    header('Content-Type:application/json');
    function get_keywords($table)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
        $conn = dbconnect($host, $dbid, $dbpass, $dbname);

        $query = "select * from $table order by s_id desc";
        if ($result = mysqli_query($conn, $query, MYSQLI_USE_RESULT)) {
            $tmpArr = [];
            while ($row = mysqli_fetch_object($result)) {
                $t = [];
                $t['s_id'] = $row->s_id;
                $t['s_name'] = $row->s_name;
                $t['s_date'] = $row->s_date;
                $t['s_banner'] = $row->s_banner;
                $t['from_end'] = $row->from_end;
                $t['ondate'] = $row->ondate;

                $tmpArr[] = $t;
                unset($t);
            }
        } else {
            $tmpArr = [0 => 'empty'];
        }
        echo json_encode($tmpArr);
    }

    get_keywords($_POST['table']);
