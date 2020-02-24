function validate_id() {
    var u_id2 = $('#u_id').val()
    if (u_id2 == '') {
        alert('아이디를 입력해주세요')
        return false
    }
    $.ajax({
        url: "../js/validateid.php",
        data: {
            u_id: u_id2
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        set_validation(json)
    })
}

function set_validation(json) {
    var html = ""
    var html2 = ""
    html += json['fail']
    html2 += json['success']
    $('#id-validation').html(html)
    $('#id-validation2').html(html2)
    $('#id_val').val("true")
}

function validate_pw() {
    var u_pw = $('#u_pw').val()
    var num = u_pw.search(/[0-9]/g);

    var eng = u_pw.search(/[a-z]/ig);

    var spe = u_pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
    if ((eng >= 0) && (num >= 0 || spe >= 0)) {
        if (u_pw.length >= 8) {
            var html = ""
            $('#pw-validation').html(html)
            $('#pw_val').val("true")
        } else {
            var html = "영문 대소문자, 숫자, 특수문자 중 2가지를 포함해 8자리 이상으로 작성해주세요."
            $('#pw-validation').html(html)
        }
    } else {
        var html = "영문 대소문자, 숫자, 특수문자 중 2가지를 포함해 8자리 이상으로 작성해주세요."
        $('#pw-validation').html(html)
    }

}

function pw_check() {
    var u_pw = $('#u_pw').val()
    var u_pwc = $('#u_pwc').val()
    if (u_pw != u_pwc) {
        var html = "비밀번호와 비밀번호 확인이 일치하지 않습니다."
        $('#pw-validation2').html(html)
    } else {
        var html = ""
        $('#pw-validation2').html(html)
    }
}

function submit() {
    var u_id = $('#u_id').val()
    var u_pw = $('#u_pw').val()
    var u_pwc = $('#u_pwc').val()
    var u_name_kr = $('#u_name_kr').val()
    var u_name_en = $('#u_name_en').val()
    var u_email = $('#u_email').val()
    var u_license = $('#u_license').val()
    var u_year = $('#u_year').val()

    var u_major = $('#u_major').val()
    var u_from = $('#u_from').val()
    var id = $('#id_val').val()
    var pw = $('#pw_val').val()
    var email = $('#em_val').val()
    if (!u_id || !u_pw || !u_pwc || !u_name_kr || !u_name_en || !u_email || !u_license || !u_year || !u_major || !u_from) {
        alert('모든 항목을 입력하여 주세요.')
    } else {
        if (u_pw != u_pwc) {
            alert("비밀번호와 비밀번호 확인이 일치하지 않습니다.")
        } else if (id != "true" || pw != "true") {
            alert("아이디 혹은 비밀번호가 올바르지 않습니다.")
        } else if (email != 'true') {
            alert('이메일 형식이 올바르지 않습니다')
        } else $('#signup_form_01').submit()
    }
}

function findid() {
    var u_name = $('#u_name_kr').val()
    var u_license = $('#u_license').val()
    $.ajax({
        url: "../js/findid.php",
        data: {
            u_name_kr: u_name,
            u_license: u_license
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        setidrow(json)
    })
}

function setidrow(user) {
    var id_row = $('#id_row')
    var user_id = $('#user_id')
    var u_id = user['u_id']
    var asd = $('#u_id')
    asd.val(u_id)
    id_row.show()
    user_id.show()
}

function findpw() {
    var u_id = $('#u_id').val()
    var u_license = $('#u_license').val()
    $.ajax({
        url: "../js/findpw.php",
        data: {
            u_id: u_id,
            u_license: u_license
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        setpwrow(json)
    })
}

function setpwrow(user) {
    var id_row = $('#id_row')
    var user_id = $('#user_id')
    var u_pw = user['u_pw']
    var asd = $('#u_pw')
    asd.val(u_pw)
    id_row.show()
    user_id.show()
}

function validate_email() {
    var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
    var u_email = $('#u_email').val()
    if (!regExp.test(u_email)) {
        var html = '올바른 이메일 형식이 아닙니다.'
        $('#em-validation').html(html)
    } else {
        var html = ''
        $('#em-validation').html(html)
        $('#em_val').val('true')
    }
}