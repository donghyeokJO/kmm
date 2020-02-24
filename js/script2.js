function m_menu_open() {
  $(".m_menu_page").animate({
      left: "0"
    },
    500
  )
}

function m_menu_close() {
  $(".m_menu_page").animate({
      left: "-100vw"
    },
    500
  )
}

function positionToBottom() {
  $("html, body").animate({
      scrollTop: "13000px"
    },
    1000
  )
}

function positionToBottom_m() {
  $("html, body").animate({
      scrollTop: "4630px"
    },
    1000
  )
}

function positionToTop() {
  $("html, body").animate({
      scrollTop: "0"
    },
    1000
  )
}

function user_click() {
  $(".user_info")
    .stop()
    .slideDown("fast")
}

function user_close() {
  $(".user_info")
    .stop()
    .slideUp("fast")
}

function set_sec2() {
  var s1 = $("#sec2-1")
  var s2 = $("#sec2-2")
  var s3 = $("#sec2-3")
  $.ajax({
    url: "/js/sec2.php",
    data: {
      key: "section2"
    },
    method: "POST",
    dataType: "json"
  }).done(function (json) {
    var h1 = json["s1"]
    var h2 = json["s2"]
    var h3 = json["s3"]
    s1.html(h1)
    s2.html(h2)
    s3.html(h3)
  })
}

function set_notice() {
  $.ajax({
    url: "/js/notice.php",
    data: {
      key: "notice"
    },
    method: "POST",
    dataType: "json"
  }).done(function (json) {
    write_notice(json)
  })
}

function write_notice(json) {
  var html = ""
  $.each(json, function (idx, noti) {
    var id = noti["id"]
    html += "<li onclick = \"location.href ='notice_detail?id=" + id + "'\">"
    html += "<div>" + noti["title"] + "</div>"
    html += "<div>" + noti["w_date"] + "</div>"
    html += "</li>"
  })
  $("#notice_list").html(html)
}

function set_board() {
  $.ajax({
    url: "/js/board.php",
    data: {
      key: "board"
    },
    method: "POST",
    dataType: "json"
  }).done(function (json) {
    write_board(json)
  })
}

function write_board(json) {
  var html = ""
  $.each(json, function (idx, noti) {
    var id = noti["id"]
    html += "<li onclick = \"location.href ='board_detail?id=" + id + "'\">"
    html += "<div>" + noti["title"] + "</div>"
    html += "<div>" + noti["date"] + "</div>"
    html += "</li>"
  })
  $("#board_list").html(html)
}

function set_survey() {
  $.ajax({
    url: "/js/survey.php",
    data: {
      key: "survey"
    },
    method: "POST",
    dataType: "json"
  }).done(function (json) {
    write_survey(json)
  })
}

function write_survey(surveys) {
  var html = []
  $.each(surveys, function (idx, survey) {
    html.push(survey["item"])
  })
  $("#sv1").html(html.shift())
  $("#sv2").html(html.shift())
  $("#sv3").html(html.shift())
  $("#sv4").html(html.shift())
  $("#sv5").html(html.shift())
  $("#sv6").html(html.shift())
}

function set_banner() {
  $.ajax({
    url: "/js/banner.php",
    data: {
      key: "banner"
    },
    method: "POST",
    dataType: "json"
  }).done(function (json) {
    write_banner(json)
  })
}

function write_banner(banners) {
  var html = ""
  var html2 = ""
  var carousel = $("#main-carousel")
  var indicator = $("#carousel-indicatiors")
  $.each(banners, function (idx, banner) {
    if (idx == 0) {
      html += '<div class="carousel-item active">'
      html += '<img src="' + banner["img_src"] + '" class="d-block w-100" alt="...">'
      html += '<div class="filter"></div>'
      html += "</div>"
      html2 +=
        '<li data-target="#carouselExampleIndicators" data-slide-to="' +
        idx +
        '" class="active"></li>'
    } else {
      html += '<div class="carousel-item">'
      html += '<img src="' + banner["img_src"] + '" class="d-block w-100" alt="...">'
      html += '<div class="filter"></div>'
      html += "</div>"
      html2 += '<li data-target="#carouselExampleIndicators" data-slide-to="' + idx + '"></li>'
    }
  })
  carousel.html(html)
  indicator.html(html2)
}

function getParameterByName(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]")
  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search)
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "))
}

function modal(title, html) {
  $("#modal_title").html(title)
  $("#modal_body").html(html)
  var modal = $("#modal")

  modal.modal()
}

function modalPW() {
  var html = ""
  html += '<form id = "pwchange" method="POST" action = "/form/change_pw.php">'
  html += '<div class="container">'
  html += '  <div class="row">'
  html += '    <div class="col-12">'
  html += "     현재비밀번호"
  html += "    </div>"
  html += '    <div class="col-12 margin_top_s position_relative">'
  html +=
    '      <input id="new_email" type="password" name="cur_pw" placeholder="현재 비밀번호" style="width: 100% !important;" />'
  html += "    </div>"
  html += "  </div>"
  html += '  <div class="row">'
  html += '    <div class="col-12 margin_top_s position_relative">'
  html += "     변경할 비밀번호"
  html += "    </div>"
  html += '    <div class="col-12 margin_top_s position_relative">'
  html +=
    '      <input id="new_email" type="password" name="new_pw" placeholder="새로운 비밀번호" style="width: 100% !important;" />'
  html += "    </div>"
  html += "  </div>"
  html += '  <div class="row">'
  html += '    <div class="col-12 margin_top_s position_relative">'
  html += "     변경할 비밀번호"
  html += "    </div>"
  html += '    <div class="col-12 margin_top_s position_relative">'
  html +=
    '      <input id="new_email" type="password" name="new_pwc" placeholder="새로운 비밀번호 확인" style="width: 100% !important;" />'
  html += "    </div>"
  html += '  <div class="row">'
  html += '       <div class="col-12 margin_top_s position_relative">'
  html +=
    '           <button type="button" class="btn btn-primary mypage_button" onclick ="$(\'#pwchange\').submit()">저장</button>'
  html += "       </div>"
  html += "   </div>"
  html += "</div>"

  html += "</form>"
  modal("비밀번호 변경", html)
}

$(".footer_link>li:nth-child(1)").click(function () {
  location.href = "rule";
});

$(".footer_link>li:nth-child(2)").click(function () {
  location.href = "info2";
});

$(document).ready(function () {
  var html = ''

  html += 'Tel : 02-000-0000 | Email : email@naver.com <br><br>'
  html += '© 2020 대한미용개원의사회. All Rights Reserved'
  $('.footer_text').html(html)

  // var useragent = navigator.userAgent.toLowerCase()
  // var shortcut = $('#shortcut')
  // if (useragent.match('iphone') || useragent.match('ipad') || useragent.match('android')) {

  //   shortcut.css("display", "")
  //   if (userAgent.match('iphone')) {
  //     document.write('<link rel="apple-touch-icon" href="/img/kakao_banner.png" />')
  //   } else if (userAgent.match('ipad')) {
  //     document.write('<link rel="apple-touch-icon" sizes="72*72" href="/img/kakao_banner.png" />')
  //   } else if (userAgent.match('android')) {
  //     document.write('<link rel="shortcut icon" href="/img/kakao_banner.png" />')
  //   }
  // }
})