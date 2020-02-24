<?php
// include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
// include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
include $_SERVER['DOCUMENT_ROOT'] . '/config/header.php';
$conn = dbconnect($host, $dbid, $dbpass, $dbname);
session_start();
$login = false;
if (isset($_SESSION['u_code'])) {
    $login = true;
    $u_code = $_SESSION['u_code'];
    $query = "select * from user where u_code = '$u_code'";
    $ret = mysqli_query($conn, $query);
    $user = mysqli_fetch_array($ret);
    $user_query = 'select * from user';
    $num = mysqli_num_rows(mysqli_query($conn, $user_query));
    $query = 'select * from seminar order by s_id';
    $s_id = mysqli_fetch_array(mysqli_query($conn, $query))['s_id'];
} else {
    s_msg('관리자 메뉴입니다.');
    echo '<script>location.href="/index"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>대미개 관리자
    </title>
    <link rel="stylesheet" href="/css/admin_semina_detail2.css">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Noto+Sans|Nanum+Brush+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
    ul.pre>li:last-child a {
        color: #1967d1;
    }
</style>
</head>

<body>
    <header>
        <div class="logo">
            <span>대한미용개원의사회</span>
            <p>The Korean Aesthetic Association</p>
        </div>
        <div class="adminpage">
            관리자페이지
        </div>
    </header>
    <section id="admin">
        <div class="admin_tab" id="admin_tab">

        </div>
        <div class="semina_page">
            <div class="semina_page_title">
                세미나 관리
            </div>
            <div class="semina_page_count">
                세미나 접수관리
            </div>
            <div class="semina_page_content">
                <select name="" id="seminar_select" onchange = "member(this.value)">
                    <!-- <option value="2019 나는 개원의의다">2019 나는 개원의의다</option>
                    <option value="2019 나는 개원의의다">2019 나는 개원의의다</option>
                    <option value="2019 나는 개원의의다">2019 나는 개원의의다</option> -->
                </select>
            </div>
            <div class="semina_name_area">
                세미나명 : 2019 대한미용개원의사회 “나는 개원의이다”
            </div>
            <div class="semina_list" id="seminar_mem">
                <!--                 
                    <div class="semina_list_tab">
                        <div class="semina_cb_tab">
                           
                        </div>
                        <div class="member_name_tab">
                            이름
                        </div>
                        <div class="member_pay_tab">
                            참가비구분
                        </div>
                        <div class="member_medical_tab">
                            진료과
                        </div>
                        <div class="member_tel_tab">
                            연락처
                        </div>
                        <div class="semina_date_tab">
                            등록날짜
                        </div>
                        <div class="semina_manage_tab">
                            관리
                        </div>
                        <div class="semina_ok_tab">
                            승인
                        </div>
                    </div>
                    <div class="semina_item">
                        <div class="semina_cb">
                            <input type="checkbox">
                        </div>
                        <div class="member_name">
                            김김김
                        </div>
                        <div class="member_pay">
                            정회원
                        </div>
                        <div class="member_medical">
                            내과
                        </div>
                        <div class="member_tel">
                            010-0000-0000
                        </div>
                        <div class="semina_date">
                            19/01/24
                        </div>
                        <div class="semina_manage">
                            <div class="semina_manage_btn">
                                상세정보
                            </div>
                        </div>
                        <div class="semina_ok">
                            <div class="semina_ok_btn">
                                승인
                            </div>
                        </div>
                    </div>
                   
                    <div class="semina_item">
                        <div class="semina_cb">
                            <input type="checkbox">
                        </div>
                        <div class="member_name">
                            김김김
                        </div>
                        <div class="member_pay">
                            실장 및 코디네이터
                        </div>
                        <div class="member_medical">
                            피부과
                        </div>
                        <div class="member_tel">
                            010-0000-0000
                        </div>
                        <div class="semina_date">
                            19/01/24
                        </div>
                        <div class="semina_manage">
                            <div class="semina_manage_btn">
                                상세정보
                            </div>
                        </div>
                        <div class="semina_ok">
                            <div class="semina_ok on_btn">
                                승인완료
                            </div>
                        </div>
                    </div> -->

            </div>
            <div class="btn_list">
                <div class="select_delete" onclick="finddeleting()">선택 삭제</div>
                <div class="select_ok" onclick="findselected()">선택 승인</div>
            </div>
            <ul class="pagination">

            </ul>
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c3089a3225.js" crossorigin="anonymous"></script>
<script src="/js/script2.js"></script>
<script src="js/admin.js"></script>
<script>
    
    $(document).ready(function() {
        set_menu()
        set_list()
        var id ='<?php echo $s_id?>'
  
        member(id)
    })
</script>
<script>
       function findselected(){
        var list =[];
        var arr_Season = document.getElementsByName("id[]");
        for(var i=0;i<arr_Season.length;i++){
            if(arr_Season[i].checked == true) {
               list.push(arr_Season[i].value)
            }
        }
        console.log(list)
        $.ajax({
            url: "js/pre_accept_multi.php",
            type: "POST",
            data: {
                array : list
            },
            cache: false,
            success: function () {
                str = "승인 완료되었습니다."
                alert(str);
                location.reload()
            }
        })
    }
    function finddeleting(){
        var list =[];
        var arr_Season = document.getElementsByName("id[]");
        for(var i=0;i<arr_Season.length;i++){
            if(arr_Season[i].checked == true) {
               list.push(arr_Season[i].value)
            }
        }
        console.log(list)
        $.ajax({
            url: "js/pre_delete_multi.php",
            type: "POST",
            data: {
                array : list
            },
            cache: false,
            success: function () {
                str = "삭제 완료되었습니다."
                alert(str);
                location.reload()
            }
        })
    }
</script>

</html>