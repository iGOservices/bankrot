function deleteImg(id,model){
    $.ajax({
        url: '/main/delete-img',
        type: 'POST',
        data: {
            id: id,
            model: model,
        },
        success: function (res) {
            $('#'+id).html("");
        },
        error: function (XMLHttpRequest) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}