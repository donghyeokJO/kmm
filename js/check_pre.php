<?php
    header('Content-Type:application/json');
    function get_keywords($s_id, $name_kr, $phone)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
        $conn = dbconnect($host, $dbid, $dbpass, $dbname);

        $query = "select * from pre natural join seminar where s_id ='$s_id' and name_kr = '$name_kr' and phone = '$phone' order by ondate desc limit 1";

        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $num = mysqli_num_rows($result);
        $tmpArr = [];
        if ($num == 0) {
            $tmpArr['did'] = 'no';
        } else {
            $tmpArr['did'] = 'yes';
            $tmpArr['paid'] = $row['paid'];
            $tmpArr['s_name'] = $row['s_name'];
            $tmpArr['name_kr'] = $row['name_kr'];
            $tmpArr['name_en'] = $row['name_en'];
            $tmpArr['phone'] = $row['phone'];
            $tmpArr['ondate'] = $row['ondate'];
        }
        echo json_encode($tmpArr);
    }

    get_keywords($_POST['s_id'], $_POST['name_kr'], $_POST['phone']);
