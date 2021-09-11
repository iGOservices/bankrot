/**
 * Функции описанные ниже отвечают за cookie (по сути просто менят стили и внешний вид админки)
 */

/**
 * Получаем cookie
 * @param name
 * @returns {string}
 */
function getCookie(name) {
    const value = "; " + document.cookie;
    const parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}

/**
 * Удаляем cookie
 * @param name
 */
function deleteCookie(name) {
    setCookie(name, "", {
        'max-age': -1
    })
}

/**
 * Задает Cookie
 * @param name
 * @param value
 * @param options
 */
function setCookie(name, value, options = {}) {

    options = {
        path: '/',
        // при необходимости добавьте другие значения по умолчанию
        ...options
    };


    let now = new Date();
    now.setTime(now.getTime() + 1 * 3600 * 1000);
    options.expires = now.toUTCString();


    let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

    for (let optionKey in options) {
        updatedCookie += "; " + optionKey;
        let optionValue = options[optionKey];
        if (optionValue !== true) {
            updatedCookie += "=" + optionValue;
        }
    }

    document.cookie = updatedCookie;
}

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

$(document).on('click','.edit_button',function(){
    posY = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
    setCookie("posY",posY);
});

$(document).ready(function() {
    window.scrollTo(0, getCookie("posY"));
})




function toggleByClass(className, displayState){
    let elements = document.getElementsByClassName(className);

    for (let i = 0; i < elements.length; i++){
        elements[i].style.display = displayState;
    }
}

function changeAdminCreditorStatment(){
    let id = document.getElementById('creditor-group').value;
    let str = "";

    switch (id){
        case '1':
            str = "<div class=\"form-group field-creditor-commitment\">\n" +
                "<label class=\"control-label\" for=\"creditor-commitment\">Содержание обязательства</label>\n" +
                "<select id=\"creditor-commitment\" class=\"form-control\" name=\"Creditor[commitment]\">\n" +
                "<option value=\"1\">Заем</option>\n" +
                "<option value=\"2\" selected=\"\">Аренда</option>\n" +
                "<option value=\"3\">Кредит</option>\n" +
                "<option value=\"4\">Алименты</option>\n" +
                "<option value=\"5\">Коммунальные платежи</option>\n" +
                "</select>\n" +
                "\n" +
                "<div class=\"help-block\"></div>\n" +
                "</div>";
            toggleByClass('pay_block', 'block');
            document.getElementById("creditor-sum_statment").hidden = false;
            document.getElementById("creditor-sum_dolg").hidden = false;
            document.getElementById("creditor-forfeit").hidden = false;
            break;
        case '2':
            str = "<div class=\"form-group field-creditor-commitment\">\n" +
                "<label class=\"control-label\" for=\"creditor-commitment\">Содержание обязательства</label>\n" +
                "<select id=\"creditor-commitment\" class=\"form-control\" name=\"Creditor[commitment]\">\n" +
                "<option value=\"1\">Налог на имущество физических лиц</option>\n" +
                "<option value=\"2\" selected=\"\">Земельный налог</option>\n" +
                "<option value=\"3\">Транспортный налог</option>\n" +
                "<option value=\"4\">Налог на доходы физических лиц</option>\n" +
                "</select>\n" +
                "\n" +
                "<div class=\"help-block\"></div>\n" +
                "</div>";
            toggleByClass('pay_block', 'block');
            document.getElementById("creditor-sum_statment").hidden = false;
            document.getElementById("creditor-sum_dolg").hidden = false;
            document.getElementById("creditor-forfeit").hidden = false;

            break;
        case '3':
            str = "<div class=\"form-group field-creditor-commitment\">\n" +
                "<label class=\"control-label\" for=\"creditor-commitment\">Содержание обязательства</label>\n" +
                "<input type=\"text\" id=\"creditor-commitment\" class=\"form-control\" name=\"Creditor[commitment]\" value=\"\">\n" +
                "\n" +
                "<div class=\"help-block\"></div>\n" +
                "</div>";
            toggleByClass('pay_block', 'none');
            document.getElementById("creditor-sum_statment").hidden = true;
            document.getElementById("creditor-sum_dolg").hidden = true;
            document.getElementById("creditor-forfeit").hidden = true;
            break;

    }
    $('#creditor_commitment').html(str);

}


function changeAdminDebitorStatment(){
    let id = document.getElementById('debitor-group').value;
    let str = "";

    switch (id){
        case '1':
            str = "<div class=\"form-group field-debitor-commitment\">\n" +
                "<label class=\"control-label\" for=\"debitor-commitment\">Содержание обязательства</label>\n" +
                "<select id=\"debitor-commitment\" class=\"form-control\" name=\"Debitor[commitment]\">\n" +
                "<option value=\"1\" selected=\"\">Заем</option>\n" +
                "<option value=\"2\">Аренда</option>\n" +
                "<option value=\"3\">Алименты</option>\n" +
                "</select>\n" +
                "\n" +
                "<div class=\"help-block\"></div>\n" +
                "</div>";
            toggleByClass('pay_block', 'block');
            document.getElementById("debitor-sum_statment").hidden = false;
            document.getElementById("debitor-sum_dolg").hidden = false;
            document.getElementById("debitor-forfeit").hidden = false;
            break;
        case '2':
            str = "<div class=\"form-group field-debitor-commitment\">\n" +
                "<label class=\"control-label\" for=\"debitor-commitment\">Содержание обязательства</label>\n" +
                "<input type=\"text\" id=\"debitor-commitment\" class=\"form-control\" name=\"Debitor[commitment]\" value=\"\">\n" +
                "\n" +
                "<div class=\"help-block\"></div>\n" +
                "</div>";
            toggleByClass('pay_block', 'block');
            document.getElementById("debitor-sum_statment").hidden = false;
            document.getElementById("debitor-sum_dolg").hidden = false;
            document.getElementById("debitor-forfeit").hidden = false;

            break;
        case '3':
            str = "<div class=\"form-group field-debitor-commitment\">\n" +
                "<label class=\"control-label\" for=\"debitor-commitment\">Содержание обязательства</label>\n" +
                "<input type=\"text\" id=\"debitor-commitment\" class=\"form-control\" name=\"Debitor[commitment]\" value=\"\">\n" +
                "\n" +
                "<div class=\"help-block\"></div>\n" +
                "</div>";
            toggleByClass('pay_block', 'none');
            document.getElementById("debitor-sum_statment").hidden = true;
            document.getElementById("debitor-sum_dolg").hidden = true;
            document.getElementById("debitor-forfeit").hidden = true;
            break;

    }
    $('#debitor_commitment').html(str);

}

function changeAdminPropertyGroup(){
    let id = document.getElementById('property-group').value;
    //alert(id);
    if(id == 1){
        str = "<div class=\"form-group field-property-property_type has-success\">\n" +
            "<label class=\"control-label\" for=\"property-property_type\">Вид имущества</label>\n" +
            "<select id=\"property-property_type\" class=\"form-control\" name=\"Property[property_type]\" maxlength=\"\" aria-invalid=\"false\">\n" +
            "<option value=\"1\" selected=\"\">Земельный участок</option>\n" +
            "<option value=\"2\">Жилой дом, дача</option>\n" +
            "<option value=\"3\">Квартира</option>\n" +
            "<option value=\"4\">Гараж</option>\n" +
            "<option value=\"5\">Иное недвижимое имущество</option>\n" +
            "</select>\n" +
            "\n" +
            "<div class=\"help-block\"></div>\n" +
            "</div>";
        toggleByClass('dvizh_block', 'none');
        toggleByClass('no_dvizh_block', 'block');
        document.getElementById("property-square").hidden = false
        document.getElementById("property-reg_number").hidden = true;
        document.getElementById("property-vin_number").hidden = true;
    }else{
        str = "<div class=\"form-group field-property-property_type has-success\">\n" +
            "<label class=\"control-label\" for=\"property-property_type\">Вид имущества</label>\n" +
            "<select id=\"property-property_type\" class=\"form-control\" name=\"Property[property_type]\" maxlength=\"\" aria-invalid=\"false\">\n" +
            "<option value=\"1\" selected=\"\">Легковой автомобиль</option>\n" +
            "<option value=\"2\">Грузовой автомобиль</option>\n" +
            "<option value=\"3\">Мототранспортное средство</option>\n" +
            "<option value=\"4\">Сельскохозяйственная техника</option>\n" +
            "<option value=\"5\">Водный транспорт</option>\n" +
            "<option value=\"6\">Воздушный транспорт</option>\n" +
            "<option value=\"7\">Иные транспортные средства</option>\n" +
            "</select>\n" +
            "\n" +
            "<div class=\"help-block\"></div>\n" +
            "</div>";
        toggleByClass('dvizh_block', 'block');
        toggleByClass('no_dvizh_block', 'none');
        document.getElementById("property-square").hidden = true
        document.getElementById("property-reg_number").hidden = false;
        document.getElementById("property-vin_number").hidden = false;
    }
    $('#property_type_id').html(str);
}

function changeAdminPropertyView() {
    let id = document.getElementById('valuableproperty-location').value;
    if(id == 1){
        toggleByClass('other_owners', 'none');
    }else{
        toggleByClass('other_owners', 'block');
    }
}

function changeAdminValuablePropertyLocation(){
    let id = document.getElementById('valuableproperty-location').value;

    if(id == 1){
        toggleByClass('location_block', 'none');
    }else{
        toggleByClass('location_block', 'block');
    }
}