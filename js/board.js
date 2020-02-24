function boardall(under, limit) {
    $.ajax({
        url: '/js/board_all.php',
        data: {
            key: "board",
            under: under,
            limit: limit,

        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        write_board_all(json)
    })
}

function write_board_all(boards) {
    var html = ''
    $.each(boards, function (idx, board) {
        var id = idx + 1
        html += '<div class="board_item" onclick="location.href=\'board_detail?id=' + board['id'] + '\'">'
        html += '<div class="board_item_num">' + id + '</div>'
        html += '<div class="board_item_title" style = "text-align:center">' + board['title'] + '</div>'
        html += '<div class="board_item_date">' + board['writer'] + '</div>'
        html += '<div class="board_item_date">' + board['date'] + '</div>'
        html += '</div>'
    })
    $('#board_table').html(html)
}

function find_reply() {
    var bid = $('#b_id').val()
    $.ajax({
        url: '/js/find_breply.php',
        data: {
            b_id: bid
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

function find_board() {
    var tag = $('#search_tag').val()
    var text = $('#search_text').val()
    $.ajax({
        url: '/js/find_board.php',
        data: {
            tag: tag,
            text: text
        },
        method: "POST",
        dataType: "json"
    }).done(function (json) {
        write_board_all(json)
        $('#page_list').html('')
    })

}