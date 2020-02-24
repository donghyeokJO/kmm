function noticeall(under, limit) {
    $.ajax({
        url: '/js/notice_all.php',
        data: {
            key: "notice",
            under: under,
            limit: limit,

        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        write_notice_all(json)
    })
}

function write_notice_all(notices) {
    var html = ''
    $.each(notices, function (idx, noti) {
        var id = idx + 1
        html += '<div class="board_item" onclick="location.href=\'notice_detail?id=' + noti['id'] + '\'">'
        html += '<div class="board_item_num">' + id + '</div>'
        html += '<div class="board_item_title">' + noti['title'] + '</div>'
        html += '<div class="board_item_date">' + noti['date'] + '</div>'
        html += '</div>'
    })
    $('#notice_table').html(html)
}

function find_reply() {
    var nid = $('#n_id').val()
    $.ajax({
        url: '/js/find_reply.php',
        data: {
            n_id: nid
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        set_reply(json)
    })
}

function set_reply(replies) {
    var html = ''
    $.each(replies, function (idx, reply) {
        html += '<div class="notice_detail_comment_item">'
        html += '<div class="notice_detail_comment_writer">'
        html += reply['writer']
        html += '</div>'
        html += '<div class="notice_detail_comment_content">'
        html += reply['content']
        html += '</div>'
        html += '<div class="notice_detail_comment_date">'
        html += reply['ondate']
        html += '</div>'
        html += '</div>'
    })
    $('#notice_comment').html(html)
}

function find_notice() {
    var tag = $('#search_tag').val()
    var text = $('#search_text').val()
    $.ajax({
        url: '/js/find_notice.php',
        data: {
            tag: tag,
            text: text
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        write_notice_all(json)
        $('#page_list').html('')
    })

}

// function prenext() {
//     var n_id = $('#n_id').val()
//     $.ajax({
//         url: '/js/prenext_notice.php',
//         data: {
//             n_id: n_id
//         },
//         method: "POST",
//         dataType: "json"
//     }) / done(function (json) {
//         set_pre_next(json)
//     })
// }

// function set_pre_next(pres) {
//     var html = ''
//     $.each(pre, function (idx, pres) {
//         var id = pre['id']
//         html += '<div class="notice_detail_prev" onclick = "location.href=notice_ >'
//         html += '<div class="notice_detail_list_title">'
//         html+= ' 이전글'
//         html += '</div>'
//         html += '<div class="notice_detail_list_content">'
//         html +=  pre['title']
//         html += ' </div>'
//         html += '</div>'
//     <div class="notice_detail_next">
//         <div class="notice_detail_list_title">
//             다음글
//         </div>
//         <div class="notice_detail_list_content">
//             다음글이 없습니다.
//         </div>
//     </div>
//     })
// }