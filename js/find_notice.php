<?php
    header('Content-Type:application/json');
    function get_keywords($tag, $text)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
        $conn = dbconnect($host, $dbid, $dbpass, $dbname);
        if ($tag == '전체') {
            $query = "select * from notice natural join user where title like '%$text%' or u_name_kr like '%$text%' or content like '%$text$'";
        } else {
            $query = "select * from notice natural join user where $tag like '%$text%'";
        }
        if ($result = mysqli_query($conn, $query, MYSQLI_USE_RESULT)) {
            $tmpArr = [];
            while ($row = mysqli_fetch_object($result)) {
                $t = [];
                $t['id'] = $row->n_id;
                $t['title'] = $row->title;
                $t['date'] = $row->w_date;
                $tmpArr[] = $t;
                unset($t);
            }
        } else {
            $tmpArr = [0 => 'empty'];
        }
        echo json_encode($tmpArr);
    }

    get_keywords($_POST['tag'], $_POST['text']);
