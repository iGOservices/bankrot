scrollToEnd('#scroll');


function reloadUserList() {
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        url: '/message/reload-user-list',
        type: 'POST',
        data: {
            _csrf : csrfToken,
        },
        success: function(res){
            if(res){
                $('#user_list').html(res);
            }
        },
        error: function(XMLHttpRequest){
            console.log(XMLHttpRequest.responseText);
        }
    });
}

setInterval('reloadUserList()', 10000);

function reloadDialogPage(flag = null) {
    let chat_id = document.getElementById('chat_id');
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    if(chat_id){
        $.ajax({
            url: '/message/reload-dialog-page',
            type: 'POST',
            data: {
                _csrf : csrfToken,
                chat_id : chat_id.value,
                flag : flag
            },
            success: function(res){
                if(res){
                    $('#dialog_page').html(res);
                    scrollToEnd("#scroll");
                }

            },
            error: function(XMLHttpRequest){
                console.log(XMLHttpRequest.responseText);
            }
        });
    }
}
setInterval('reloadDialogPage()', 10000);


function selectChat(chat_id){
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        url: '/message/select-dialog',
        type: 'POST',
        data: {
            _csrf : csrfToken,
            chat_id : chat_id,
        },
        success: function(res){
                $('#dialog_page').html(res);
                reloadUserList();
                scrollToEnd("#scroll");
        },
        error: function(XMLHttpRequest){
            console.log(XMLHttpRequest.responseText);
        }
    });
}

function sendMessage(chat_id){
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let text = document.getElementById('message_area').value;
    if(text){
        $.ajax({
            url: '/message/send-message',
            type: 'POST',
            data: {
                _csrf : csrfToken,
                chat_id : chat_id,
                text : text,
            },
            success: function(res){
                    reloadDialogPage(1);
            },
            error: function(XMLHttpRequest){
                console.log(XMLHttpRequest.responseText);
            }
        });
    }
}

//делаем скролл
function scrollToEnd(block, duration) {
    // if block not passed scroll to end of page
    block = block || $("html, body");
    duration = duration || 100;

    // you can pass also block's jQuery selector instead of jQuery object
    if(typeof block === 'string') {
        block = $(block);
    }

    // if exists at list one block
    if (block.length) {
        block.animate({
            scrollTop: block.get(0).scrollHeight
        }, duration);
    }
}
