function set_list() {
    $.ajax({
        url: 'js/findseminar.php',
        data: {
            table: 'seminar'
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        make_slist(json)
    })
}

function make_slist(seminars) {
    var html = ''
    var list = $('#seminar_select')
    $.each(seminars, function (idx, seminar) {
        if (idx == 0) {
            html += '<option value="' + seminar['s_id'] + '" selected>' + seminar['s_name'] + '</option>'
        } else {

            html += '<option value="' + seminar['s_id'] + '" >' + seminar['s_name'] + '</option>'
        }
    })
    list.html(html)
}

function set_menu() {
    $('#admin_tab').load("menubar.html")
}

function set_member() {
    $.ajax({
        url: 'js/finduser.php',
        data: {
            table: 'user',

        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        set_user(json)
    })
}

function set_out() {
    $.ajax({
        url: 'js/finduserout.php',
        data: {
            table: 'user',

        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        set_user(json)
    })
}

function set_user(users) {

    var html = ''
    html += '<div class="member_list_tab">'
    html += '<div class="member_name_tab">'
    html += '이름'
    html += '</div>'
    html += '<div class="member_type_tab">'
    html += '멤버타입'
    html += ' </div>'
    html += '<div class="member_signup_tab">'
    html += '가입일'
    html += '</div>'
    // html += '<div class="member_recent_tab">'
    // html += '최근접속일'
    // html += '</div>'
    html += ' <div class="member_manege_tab">'
    html += ' <div class="member_manege_tab">'
    html += '관리'
    html += '</div>'
    html += '</div>'
    $.each(users, function (idx, user) {
        html += '<div class="member_item">'
        html += '<div class="member_name">'
        html += user['u_name_kr']
        html += '</div>'
        html += '<div class="member_type">'
        html += user['u_type']
        html += '</div>'
        html += '<div class="member_signup">'
        html += user['u_regi']
        html += '</div>'
        html += '<div class="member_manege" onclick="location.href =\'admin_member_detail?u_code=' + user['u_code'] + '\'">'
        html += '<div class="member_manege_btn">'
        html += '상세정보'
        html += ' </div>'
        html += '</div>'
        html += '</div>'
    })
    $('#member_list').html(html)
}

function set_seminar() {
    $.ajax({
        url: 'js/findseminar.php',
        data: {
            table: 'seminar'
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        seminar(json)
    })
}

function seminar(seminars) {
    var html = ''
    html += '<div class="semina_list_tab">'
    html += '<div class="semina_name_tab">'
    html += '세미나명'
    html += '</div>'
    html += '<div class="semina_date_tab">'
    html += '날짜'
    html += '</div>'
    html += '<div class="semina_date_tab">'
    html += '접수기간'
    html += '</div>'
    html += '<div class="semina_manage_tab">'
    html += '관리'
    html += '</div>'
    html += '</div>'
    $.each(seminars, function (idx, seminar) {
        html += '<div class="semina_item">'
        html += '<div class="semina_name">'
        html += seminar['s_name']
        html += '</div>'
        html += '<div class="semina_date">'
        html += seminar['s_date']
        html += '</div>'
        html += '<div class="semina_date">'
        html += seminar['period']
        html += '</div>'
        html += '<div class="semina_manage">'
        html += '<div class="semina_manage_btn" onclick="location.href=\'admin_seminar_info2?s_id=' + seminar['s_id'] + '\'">'
        html += '상세정보'
        html += '</div>'
        html += '</div>'
        html += '</div>'
    })
    $('#seminar_list').html(html)
}

function member(s_id) {
    $.ajax({
        url: 'js/findmem.php',
        data: {

            s_id: s_id
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        set_mem(json)
    })
}

function set_mem(members) {
    var html = ''
    html += '<div class="semina_list_tab">'
    html += '<div class="semina_cb_tab">'
    // html += '<input type="checkbox">'
    html += '</div>'
    html += '<div class="member_name_tab">'
    html += '이름'
    html += '</div>'
    html += '<div class="member_pay_tab">'
    html += '참가비구분'
    html += '</div>'
    html += '<div class="member_medical_tab">'
    html += '진료과'
    html += '</div>'
    html += '<div class="member_tel_tab">'
    html += '연락처'
    html += '</div>'
    html += '<div class="semina_date_tab">'
    html += '등록날짜'
    html += '</div>'
    html += '<div class="semina_manage_tab">'
    html += '관리'
    html += '</div>'
    html += '<div class="semina_ok_tab">'
    html += '승인'
    html += '</div>'
    html += '</div>'
    $.each(members, function (idx, member) {
        html += '<div class="semina_item">'
        if (member['accept'] == '승인') {
            html += '<div class="semina_cb">'

            html += '</div>'
        } else {
            html += '<div class="semina_cb">'
            html += '<input type="checkbox" name = "id[]" value = "' + member['p_id'] + '">'

            html += '</div>'
        }
        html += '<div class="member_name">'
        html += member['name']
        html += '</div>'
        html += '<div class="member_pay">'
        html += member['pay']
        html += '</div>'
        html += '<div class="member_medical">'
        html += member['subject']
        html += '</div>'
        html += '<div class="member_tel">'
        html += member['phone']
        html += '</div>'
        html += '<div class="semina_date">'
        html += member['ondate']
        html += '</div>'
        html += '<div class="semina_manage">'
        html += '<div class="semina_manage_btn" onclick = "location.href = \'admin_seminar_member?id=' + member['p_id'] + '\'">'
        html += '상세정보'
        html += '</div>'
        html += '</div>'
        if (member['accept'] == '승인') {
            html += '<div class="semina_ok">'
            html += '<div class="semina_ok on_btn">'
            html += '승인완료'
            html += '</div>'
            html += '</div>'
            html += '</div>'
        } else {
            html += '<div class="semina_ok">'
            html += ' <div class="semina_ok_btn" onclick = "location.href = \'js/pre_accept?p_id=' + member['p_id'] + '\'">'
            html += '승인'
            html += '</div>'
            html += '</div>'
            html += '</div>'
        }

    })
    $('#seminar_mem').html(html)
}

function set_banner_list(number) {
    $.ajax({
        url: 'js/findbanner.php',
        data: {
            table: 'banner'
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        get_banner(json, number)
    })
}

function get_banner(banners, number) {
    var html = ''
    var banner_list_ul = $('#banner_list_ul')
    $.each(banners, function (idx, banner) {
        if (banner['number'] == number) {
            html += '<li class="on"><img class= "view" src="' + banner['img_src'] + '"alt="배너 이미지" width="137" height="66" onclick="seton(' + banner['number'] + ')">'
        } else {
            html += '<li ><img class="view" src="' + banner['img_src'] + '"alt="배너 이미지" width="137" height="66" onclick="seton(' + banner['number'] + ')">'
        }
        html += '<div class="delete_btn" onclick="del_banner(' + banner['number'] + ')">'
        html += '<div class="n1"></div>'
        html += '<div class="n2"></div>'
        html += '</div>'
        html += '</li>'
    })
    banner_list_ul.html(html)
}

function seton(number) {
    var big_banner = $('#big_banner')
    var html = ''
    var banner_option = $('#banner_option')
    var html2 = ''
    $.ajax({
        url: 'js/findbanner2.php',
        data: {
            number: number
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        html += ' <img id = "ban_img" src = "' + json['img_src'] + '" alt = "배너 이미지" width = "761" height = "293" onclick = "" >'
        big_banner.html(html)
        html2 += '<div class="upload_btn" style="position: relative;" onclick="">'
        html2 += '이미지업로드'
        html2 += '<input class="upload_btn_file" name ="Files[]" type="file" id ="modi_img" onchange = "readURL(this);set_img(this.value.split(\'\\\\\')[this.value.split(\'\\\\\').length - 1])">'
        html2 += '<input type = "hidden" name = "number" value="' + json['number'] + '">'
        html2 += '<input type = "hidden" name = "img_src" id="img_src">'
        html2 += '</div>'
        html2 += '<div class="delete_btn" onclick="del_banner(' + json['number'] + ')">'
        html2 += '삭제'
        html2 += '    </div>'
        html2 += '<div class="delete_btn" style = "background-color:#1967d1; color:#FFFFFF" onclick="save_banner(' + json['number'] + ')">'
        html2 += '저장하기'
        html2 += '</div>'
        banner_option.html(html2)
        set_banner_list(number)
    })

}

function del_banner(number) {
    if (number >= 1 && number <= 3) {
        alert('1~3번 배너는 이미지 수정만 가능합니다.');
    } else if (confirm("배너를 삭제하시겠습니까?")) {
        $.ajax({
            url: "js/del_banner.php",
            data: {
                number: number
            },
            method: "POST",
            dataType: "json"
        }).done(function () {
            alert('삭제 완료되었습니다.')
            location.reload()

        })
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#ban_img').attr('src', e.target.result);
            $('.on').find('img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function set_img(input) {

    $('#img_src').val(input)
}

function save_banner() {
    if (confirm("이 배너를 저장하시겠습니까?")) {
        $('#form1').submit()
    }
}

function add_banner() {
    var count = $('.view').length
    if (count >= 5) {
        alert('배너는 최대 5개까지만 설정할 수 있습니다.')
        return false
    } else return true

}

function add_ban_change(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        var list = $('#banner_list_ul')
        $('.on').removeClass("on")
        var html = ''
        html += '<li class="on"><img class="view" src="' + '"alt="배너 이미지" width="137" height="66" onclick="">'
        html += '<div class="delete_btn" onclick="">'
        html += '<div class="n1"></div>'
        html += '<div class="n2"></div>'
        html += '</div>'
        html += '</li>'
        list.append(html)

        reader.onload = function (e) {
            $('#ban_img').attr('src', e.target.result);
            $('.on').find('img').attr('src', e.target.result);
        }

        var html2 = ''
        html2 += '<div class="delete_btn" style = "background-color:#1967d1; color:#FFFFFF" onclick="save_banner2()">'
        html2 += '저장하기'
        html2 += '</div>'
        $('#banner_option').html(html2)
        reader.readAsDataURL(input.files[0]);
    }

}

function save_banner2() {
    if (confirm("이 배너를 저장하시겠습니까?")) {
        $('#form2').submit()
    }
}