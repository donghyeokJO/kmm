function set_pre() {
    $.ajax({
        url: '../js/find_seminar.php',
        data: {
            table: 'seminar'
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        set_seminar(json)
    })
}

function set_seminar(seminars) {
    var html = '';
    $.each(seminars, function (idx, seminar) {
        html += '<div class="pre_item">'
        html += '<a href="pre_detail?id=' + seminar['s_id'] + '">'
        html += '<div class="pre_item_term">'
        html += seminar['s_date'] + ' ' + seminar['from_end']
        html += '</div>'
        html += '<div class="pre_item_title">'
        html += seminar['s_name']
        html += '</div>'
        html += '<div class="pre_item_tel">'
        html += '사무국 02-3443-1232'
        html += '</div>'
        html += '</a>'
        html += '</div>'
    })
    $('#pre_item_area').html(html)
}



function set_semi() {
    $.ajax({
        url: '../js/find_seminar.php',
        data: {
            table: 'seminar'
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        get_seminar(json)
    })
}

function get_seminar(seminars) {
    var html = '';
    $.each(seminars, function (idx, seminar) {
        html += '<div class="semina_item" onclick ="location.href=\'pre_detail?id=' + seminar['s_id'] + '\'">'
        html += '<div class="semina_date">'
        html += seminar['s_date'] + ' ' + seminar['from_end']
        html += '</div>'
        html += '<div class="semina_img">'
        html += '<img src = "' + seminar['s_banner'] + '" alt = "...">'
        html += '</div>'
        html += '<div class="semina_title">'
        html += seminar['s_name']
        html += '</div>'
        html += '<div class="semina_tel">'
        html += '    사무국 02-3443-1232'
        html += '</div>'
        html += '</div>'


    })
    $('#intro').html(html)
}



function bring_seminar() {
    $.ajax({
        url: '../js/find_seminar.php',
        data: {
            table: 'seminar'
        },
        method: 'POST',
        dataType: 'json'
    }).done(function (json) {
        setoption(json)
    })
}

function setoption(options) {
    var html = ''
    html += '<option value="">학회선택</option>'
    $.each(options, function (idx, option) {
        html += '<option value="' + option['s_id'] + '">' + option['s_name'] + '</option>'
    })
    $('#center').html(html)
}

function pre_check() {
    var s_id = $('#center option:selected').val()
    var name = $('#name_kr').val()
    var phone = $('#it1').val() + '-' + $('#it2').val() + '-' + $('#it3').val()
    // console.log(s_id)
    // console.log(name)
    // console.log(phone)
    $.ajax({
        url: '../js/check_pre.php',
        data: {
            s_id: s_id,
            name_kr: name,
            phone: phone
        },
        method: "POST",
        dataType: 'json'
    }).done(function (json) {
        setdiv(json)
    })
}

function setdiv(json) {
    var html = ''
    if (json['did'] == 'no') {
        html += '<br>'
        html += '<div class="pre_check_bar b1" style="border-top: solid 2px #707070;">'
        html += '<div class="center_title">'
        html += '세미나 명'
        html += '</div>'
        html += '조회 결과가 없습니다. 정보를 정확히 다시 입력해주세요.'
        html += '</div>'
        html += '<div class="m_bar"></div>'
    } else {
        html += '<br>'
        html += '<div class="pre_check_bar b1" style="border-top: solid 2px #707070;">'
        html += '<div class="center_title">'
        html += '세미나 명'
        html += '</div>'
        html += json['s_name']
        html += '</div>'
        html += '<div class="pre_check_bar b2">'
        html += '<div class="center_title">'
        html += '이름'
        html += '</div>'
        html += json['name_kr'] + ' | ' + json['name_en']
        html += '</div>'
        html += '<div class="pre_check_bar b3" style="border-bottom: solid 2px #707070;">'
        html += '<div class="center_title">'
        html += '휴대폰번호'
        html += '</div>'
        html += '<div class="tel_area">'
        html += json['phone']
        html += '</div>'
        html += '</div>'
        html += '<div class="pre_check_bar b3" style="border-bottom: solid 2px #707070;">'
        html += '<div class="center_title">'
        html += '최종 신청일시'
        html += '</div>'
        html += '<div class="tel_area">'
        html += json['ondate']
        html += '</div>'
        html += '</div>'
        html += '<div class="pre_check_bar b3" style="border-bottom: solid 2px #707070;">'
        html += '<div class="center_title">'
        html += '결제 여부'
        html += '</div>'
        html += '<div class="tel_area">'
        html += json['paid']
        html += '</div>'
        html += '</div>'
        html += '<div class="m_bar"></div>'
    }
    $('#asdf').html(html)
}