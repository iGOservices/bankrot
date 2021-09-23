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

//setCookie('tab',0);
var currentTab = 0; // Current tab is set to be the first tab (0)
if(getCookie('tab') && getCookie('tab') >= 0){
    showTab(getCookie('tab'));
    //showTab(currentTab);
    currentTab = parseInt(getCookie('tab'));
}else{
    showTab(currentTab);
}

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  if(x.length != 0){
      x[n].style.display = "block";
      //console.log(x.length - 1);
      // ... and fix the Previous/Next buttons:
      if (n == 0) {
          document.getElementById("prevBtn").style.display = "none";
      } else {
          document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
          document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
          //document.getElementById("nextBtn").innerHTML = 'Далее<span class="icon-material-outline-keyboard-arrow-right"></span>';
      }
      // ... and run a function that displays the correct step indicator:
      fixStepIndicator(n)
  }
}

function nextPrev(n) {

  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  //if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
    //console.log(x);
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  setCookie('tab', currentTab);
  //console.log(currentTab);
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    
    return false;
  }
  // Otherwise, display the correct tab:
  
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, pay_block, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");

  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "" && (y[i].type != "hidden")) {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

/**
 * Блок кода Creditor
 */

$(document).on('click','#add_creditor',function(){
  const csrfToken = $('meta[name="csrf-token"]').attr("content");
  let num = document.getElementById('creditor-point').value;
  $.ajax({
      url: '/creditor/add-new-creditor',
      type: 'POST',
      data: {
          num : num,
          _csrf : csrfToken,
      },
      success: function(res){

              $('#creditor-accordion').append(res);
              num = Number(num)+1;
              $("#creditor-point").val(num);      
      },
      error: function(XMLHttpRequest){
        console.log(XMLHttpRequest.responseText);
      }
  }); 
});

/**
 * Меняем statment в зависимости от group в creditor
 * @param i
 */
function changeCreditorStatment(i){
    let id = document.getElementById('creditor-'+i+'-group').value;
    let str = "";

    switch (id){
        case '1':
            str =
                "<div className=\"form-group row field-creditor-"+i+"-commitment\">" +
                "<select id=\"creditor-"+i+"-commitment\" class=\"with-border select_list\" name=\"Creditor["+i+"][commitment]\">" +
                "<option value=\"1\">Заем</option>" +
                "<option value=\"2\">Аренда</option>" +
                "<option value=\"3\">Кредит</option>" +
                "<option value=\"4\">Алименты</option>" +
                "<option value=\"5\">Коммунальные платежи</option>" +
                "</select>" +
                "</div>";
                toggleByClass('pay_block', 'block');
                document.getElementById("creditor-"+i+"-sum_statment").hidden = false;
                document.getElementById("creditor-"+i+"-sum_dolg").hidden = false;
                document.getElementById("creditor-"+i+"-forfeit").hidden = false;
            break;
        case '2':
            str =
                "<div className=\"form-group row field-creditor-"+i+"-commitment\">" +
                "<select id=\"creditor-"+i+"-commitment\" class=\"with-border select_list\" name=\"Creditor["+i+"][commitment]\">" +
                "<option value=\"1\">Налог на имущество физических лиц</option>" +
                "<option value=\"2\">Земельный налог</option>" +
                "<option value=\"3\">Транспортный налог</option>" +
                "<option value=\"4\">Налог на доходы физических лиц</option>" +
                "</select>"+
                "</div>";
                toggleByClass('pay_block', 'block');
                document.getElementById("creditor-"+i+"-sum_statment").hidden = false;
                document.getElementById("creditor-"+i+"-sum_dolg").hidden = false;
                document.getElementById("creditor-"+i+"-forfeit").hidden = false;

            break;
        case '3':
            str =
                "<div className=\"form-group row field-creditor-"+i+"-commitment\">" +
                "<input type=\"text\" id=\"creditor-"+i+"-commitment\" class=\"with-border\" name=\"Creditor["+i+"][commitment]\" maxlength=\"255\">" +
                "<div class=\"help-block\"></div>\n" +
                "</div>";
                toggleByClass('pay_block', 'none');
                document.getElementById("creditor-"+i+"-sum_statment").hidden = true;
                document.getElementById("creditor-"+i+"-sum_dolg").hidden = true;
                document.getElementById("creditor-"+i+"-forfeit").hidden = true;
            break;

    }
    $('#creditor'+i).html(str);

}

/**
 * Меняем statment в зависимости от group в debitor
 * @param i
 */
function changeDebitorStatment(i){
    let id = document.getElementById('debitor-'+i+'-group').value;
    let str = "";

    switch (id){
        case '1':
            str =
                "<div className=\"form-group row field-debitor-"+i+"-commitment\">" +
                "<select id=\"debitor-"+i+"-commitment\" class=\"with-border select_list\" name=\"Debitor["+i+"][commitment]\">" +
                "<option value=\"1\">Заем</option>" +
                "<option value=\"2\">Аренда</option>" +
                "<option value=\"3\">Алименты</option>" +
                "</select>" +
                "</div>";
            break;
        case '2':
            str =
                "<div className=\"form-group row field-debitor-"+i+"-commitment\">" +
                "<input type=\"text\" id=\"debitor-"+i+"-commitment\" class=\"with-border\" name=\"Debitor["+i+"][commitment]\" maxlength=\"255\">" +
                "<div class=\"help-block\"></div>\n" +
                "</div>";
            break;
        case '3':
            str =
                "<div className=\"form-group row field-debitor-"+i+"-commitment\">" +
                "<input type=\"text\" id=\"debitor-"+i+"-commitment\" class=\"with-border\" name=\"Debitor["+i+"][commitment]\" maxlength=\"255\">" +
                "<div class=\"help-block\"></div>\n" +
                "</div>";
            break;

    }
    $('#debitor'+i).html(str);

}

/**
 * Меняем property_type в зависимости от group в property
 * @param i
 */
function changePropertyStatment(i){
    let id = document.getElementById('property-'+i+'-group').value;
    let str = "";

    switch (id){
        case '1':
            str =
                "<div className=\"form-group row field-property-"+i+"-property_type\">" +
                "<select id=\"property-"+i+"-property_type\" class=\"with-border select_list\" name=\"Property["+i+"][property_type]\">" +
                "<option value=\"1\">Земельный участок</option>" +
                "<option value=\"2\">Жилой дом,дача</option>" +
                "<option value=\"3\">Квартира</option>" +
                "<option value=\"4\">Гараж</option>" +
                "<option value=\"5\">Иное недвижемое имущество</option>" +
                "</select>" +
                "</div>";
                toggleByClass('dvizh_block', 'none');
                toggleByClass('no_dvizh_block', 'block');
                document.getElementById("property-"+i+"-vin_number").hidden = true;
                document.getElementById("property-"+i+"-reg_number").hidden = true;
                document.getElementById("property-"+i+"-square").hidden = false;
            break;
        case '2':
            str =
                "<div className=\"form-group row field-property-"+i+"-property_type\">" +
                "<select id=\"property-"+i+"-property_type\" class=\"with-border select_list\" name=\"Property["+i+"][property_type]\">" +
                "<option value=\"1\">Легковой автомобиль</option>" +
                "<option value=\"2\">Грузовой автомобиль</option>" +
                "<option value=\"3\">Мототранспортное средство</option>" +
                "<option value=\"4\">Сельскохозяйственная техника</option>" +
                "<option value=\"5\">Водный транспорт</option>" +
                "<option value=\"6\">Воздушный транспорт</option>" +
                "<option value=\"7\">Иные транспортные средства</option>" +
                "</select>" +
                "</div>";
                toggleByClass('dvizh_block', 'block');
                toggleByClass('no_dvizh_block', 'none');
                document.getElementById("property-"+i+"-vin_number").hidden = false;
                document.getElementById("property-"+i+"-reg_number").hidden = false;
                document.getElementById("property-"+i+"-square").hidden = true;
            break;

    }
    $('#property'+i).html(str);

}

/**
 * Меняем other_owners в зависимости от property_view в property
 * @param i
 */
function changePropertyView(i){
    let id = document.getElementById('property-'+i+'-property_view').value;
    let str = "";

    switch (id){
        case '1':
            toggleByClass('other_owners', 'none');
            break;
        case '2':
            toggleByClass('other_owners', 'none');
            break;
        case '3':
            toggleByClass('other_owners', 'block');
            break;

    }

}

/**
 * Скрываем блоки в зависимости от valuableproperty-location в valuableproperty
 * @param i
 */
function changeSocketView(i){
    let id = document.getElementById('valuableproperty-'+i+'-location').value;

    switch (id){
        case '1':
            toggleByClass('socket', 'none');
            break;
        case '2':
            toggleByClass('socket', 'block');
            break;

    }

}

function toggleByClass(className, displayState){
    let elements = document.getElementsByClassName(className);

    for (let i = 0; i < elements.length; i++){
        elements[i].style.display = displayState;
    }
}

function checkSum(){
    /*let count = document.getElementById("creditor-point").value;
    let sum = 0;
    for (let i = 0; i < count; i++){
        sum = sum + parseInt(document.getElementById("creditor-"+i+"-sum_statment").value);
    }
     // if(sum < 500000 ){
     //    alert("Невозможно списать задолженность, т.к сумма меньше чем 500000руб.Дальнейшее заполнение невозможно.");
     //     return false;
     // }*/
    nextPrev(1);
    return true;
}

/**
 * Конец блока кода Creditor!
 */

function saveSession(){
    let inputs = new Array();
    inputs = $('#client_main_info :text').map(function(){
        console.log(this.id+"-"+this.value);
    }).get(0);
}



$(document).on('click','#add_debitor',function(){
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let num = document.getElementById('debitor-point').value;
    $.ajax({
        url: '/debitor/add-new-debitor',
        type: 'POST',
        data: {
            num : num,
            _csrf : csrfToken,
        },
        success: function(res){
            $('#debitor-accordion').append(res);
            num = Number(num)+1;
            $("#debitor-point").val(num);
        },
        error: function(XMLHttpRequest){
            console.log(XMLHttpRequest.responseText);
        }
    });
});

$(document).on('click','#add_property',function(){
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let num = document.getElementById('property-point').value;
    $.ajax({
        url: '/property/add-new-property',
        type: 'POST',
        data: {
            num : num,
            _csrf : csrfToken,
        },
        success: function(res){
            $('#property-accordion').append(res);
            num = Number(num)+1;
            $("#property-point").val(num);
        },
        error: function(XMLHttpRequest){
            console.log(XMLHttpRequest.responseText);
        }
    });
});

$(document).on('click','#add_bank',function(){
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let num = document.getElementById('bank-point').value;
    $.ajax({
        url: '/bank/add-new-bank',
        type: 'POST',
        data: {
            num : num,
            _csrf : csrfToken,
        },
        success: function(res){
            $('#bank-accordion').append(res);
            num = Number(num)+1;
            $("#bank-point").val(num);
        },
        error: function(XMLHttpRequest){
            console.log(XMLHttpRequest.responseText);
        }
    });
});

$(document).on('click','#add_shares',function(){
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let num = document.getElementById('shares-point').value;
    //console.log(num);
    $.ajax({
        url: '/shares/add-new-shares',
        type: 'POST',
        data: {
            num : num,
            _csrf : csrfToken,
        },
        success: function(res){
            $('#shares-accordion').append(res);
            num = Number(num)+1;
            $("#shares-point").val(num);
        },
        error: function(XMLHttpRequest){
            console.log(XMLHttpRequest.responseText);
        }
    });
});

$(document).on('click','#add_other_shares',function(){
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let num = document.getElementById('other_shares-point').value;
    $.ajax({
        url: '/other-shares/add-new-other-shares',
        type: 'POST',
        data: {
            num : num,
            _csrf : csrfToken,
        },
        success: function(res){
            $('#other_shares-accordion').append(res);
            num = Number(num)+1;
            $("#other_shares-point").val(num);
        },
        error: function(XMLHttpRequest){
            console.log(XMLHttpRequest.responseText);
        }
    });
});


$(document).on('click','#add_valuable-property',function(){
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let num = document.getElementById('valuable-property-point').value;
    $.ajax({
        url: '/valuable-property/add-new-valuable-property',
        type: 'POST',
        data: {
            num : num,
            _csrf : csrfToken,
        },
        success: function(res){
            $('#valuable-property-accordion').append(res);
            num = Number(num)+1;
            $("#valuable-property-point").val(num);
        },
        error: function(XMLHttpRequest){
            console.log(XMLHttpRequest.responseText);
        }
    });
});

$(document).on('click','#add_deal',function(){
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let num = document.getElementById('deal-point').value;
    $.ajax({
        url: '/deal/add-new-deal',
        type: 'POST',
        data: {
            num : num,
            _csrf : csrfToken,
        },
        success: function(res){
            $('#deal-accordion').append(res);
            num = Number(num)+1;
            $("#deal-point").val(num);
        },
        error: function(XMLHttpRequest){
            console.log(XMLHttpRequest.responseText);
        }
    });
});

$(document).on('click','#add_nalog',function(){
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let num = document.getElementById('nalog-point').value;
    $.ajax({
        url: '/nalog/add-new-nalog',
        type: 'POST',
        data: {
            num : num,
            _csrf : csrfToken,
        },
        success: function(res){
            $('#nalog-accordion').append(res);
            num = Number(num)+1;
            $("#nalog-point").val(num);
        },
        error: function(XMLHttpRequest){
            console.log(XMLHttpRequest.responseText);
        }
    });
});

$(document).on('click','#add_sp',function(){
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let num = document.getElementById('sp-point').value;
    $.ajax({
        url: '/family/add-new-sp',
        type: 'POST',
        data: {
            num : num,
            _csrf : csrfToken,
        },
        success: function(res){
            $('#sp-accordion').append(res);
            num = Number(num)+1;
            $("#sp-point").val(num);
        },
        error: function(XMLHttpRequest){
            console.log(XMLHttpRequest.responseText);
        }
    });
});

$(document).on('click','#add_family',function() {
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let num = document.getElementById('family-point').value;
    $.ajax({
        url: '/family/add-new-family',
        type: 'POST',
        data: {
            num: num,
            _csrf: csrfToken,
        },
        success: function (res) {
            $('#family-accordion').append(res);
            num = Number(num) + 1;
            $("#family-point").val(num);
        },
        error: function (XMLHttpRequest) {
            console.log(XMLHttpRequest.responseText);
        }
    });
});

$(document).on('click','#add_enforce-proc',function() {
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let num = document.getElementById('enforce-proc-point').value;
    $.ajax({
        url: '/enforce-proc/add-new-enforce-proc',
        type: 'POST',
        data: {
            num: num,
            _csrf: csrfToken,
        },
        success: function (res) {
            $('#enforce-proc-accordion').append(res);
            num = Number(num) + 1;
            $("#enforce-proc-point").val(num);
        },
        error: function (XMLHttpRequest) {
            console.log(XMLHttpRequest.responseText);
        }
    });
});

$(document).on('click','#add_other',function() {
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let num = document.getElementById('other-point').value;
    $.ajax({
        url: '/other/add-new-other',
        type: 'POST',
        data: {
            num: num,
            _csrf: csrfToken,
        },
        success: function (res) {
            $('#other-accordion').append(res);
            num = Number(num) + 1;
            $("#other-point").val(num);
        },
        error: function (XMLHttpRequest) {
            console.log(XMLHttpRequest.responseText);
        }
    });
});

function deleteItem(i,statment,id,id2 = null){
    if(confirm("Вы уверены что хотите удалить выбранную запись?")){

        if(id){
            $.ajax({
                url: '/main/delete-item',
                type: 'POST',
                data: {
                    id : id,
                    id2 : id2,
                    statment : statment
                },
                success: function(res){
                    console.log("success");
                },
                error: function(res){
                    console.log("error");
                }
            });
        }

        let str = statment+"-"+i;
        let elem = document.getElementById(str);
        elem.remove();

        str = statment+'-point';
        let count = document.getElementById(str).value;
        $("#"+str).val(parseInt(count));
    }
}

function bindInputValue(){
    let x, y, i, pay_block, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");

    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        //console.log(y[i].id);
        if(y[i].type != "file") {
            console.log(y[i].className);
            if(y[i].className == "form-control krajee-datepicker"){
                y[i].value = "2021-07-23";
            }else{
                y[i].value = "33";
            }

        }

    }
}

/**
 * ********************************************************************************************************************************************************************************
 */



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

$('#main').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    console.log(formData);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            if(res.success == true)
                nextPrev(1);
            else
                alert(res.message);
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$('#family').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    //console.log(formData);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");

            //e.preventDefault();
        },
        error: function (data) {
            console.log(data);
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
    console.log('submit');

});

$('#creditor').on('beforeSubmit', function(e) {
    let sum = 0;
    let x = document.getElementsByClassName("check_sum");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < x.length; i++) {
        if(x[i].value)
            sum += parseInt(x[i].value);
    }
    if(!sum)
        sum = 0;
    console.log(sum);
    if(sum < 500000 ){
        alert("Невозможно списать задолженность, так как сумма меньше чем 500000руб.\nДальнейшее заполнение невозможно!");
        return false;
    }

    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    console.log(formData);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$('#debitor').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    console.log(formData);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            console.log(res);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$('#property').on('beforeSubmit', function(e) {
    var form = $(this);
    var data = form.serializeArray();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    console.log(data);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            console.log(res);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$('#bank').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            console.log(res);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$('#shares').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            console.log(res);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});


$('#other_shares').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            console.log(res);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$('#valuable_property').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            console.log(res);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});



$('#deal').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            console.log(res);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});


$('#nalog').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            console.log(res);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});


$('#enforce_proc').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            console.log(res);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$('#other').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            console.log(res);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$('#sp').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            console.log(res);
            if(res.success == true)
                nextPrev(1);
            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$('#proxy').on('beforeSubmit', function(e) {
    var form = $(this);
    //var data = form.serialize();
    var formData = new FormData(this);
    //var formData = new FormData(form[0].value);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        //datatype:'json',
        processData: false,
        contentType: false,
        success: function (data) {
            let res = JSON.parse(data);
            console.log(res);
            if(res.success == true){
                //nextPrev(1);
                document.location.href = "/main/payment-page";
            }

            else
                alert("Не  удалось проверить введенные данные!");
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});


function activatePromocode(service_id,price){
    const csrfToken = $('meta[name="csrf-token"]').attr("content");
    let promocode = document.getElementById('promocode').value;
    if (!promocode)
        return false;
    $.ajax({
        url: '/admin/promocode/activate-promocode',
        type: "POST",
        data: {
            service_id : service_id,
            promocode : promocode,
            _csrf : csrfToken,
        },
        success: function(res){
            var data = JSON.parse(res);
            //console.log(data.message);
            if(data.success == true){
                $('#discount').html("Скидка по промокоду: <span>"+data.discount+" % </span>");
                $('#total').html("Всего к оплате <span>"+(price*data.discount)/100+" рублей</span>");
            }
            $('#promocode_message').html(data.message);
        },
        error: function(XMLHttpRequest){
            console.log(XMLHttpRequest.responseText);
        }
    });
}

function checkBoxes(){
    if($('#chekcbox1').is(':checked') && $('#chekcbox2').is(':checked') )
        nextPrev(1);
}



// $('#send-mail').on('beforeSubmit', function(e) {
//     var form = $(this);
//     var data = form.serialize();
//     console.log(form);
//     console.log(data);
//     var formData = new FormData(this);
//     $.ajax({
//         url: form.attr("action"),
//         type: "POST",
//         data: formData,
//         //datatype:'json',
//         processData: false,
//         contentType: false,
//         success: function (data) {
//             let res = JSON.parse(data);
//             console.log(res);
//             if(res.success == true){
//                 //nextPrev(1);
//                 document.location.href = "/main/payment-page";
//             }
//
//             else
//                 alert("Не  удалось проверить введенные данные!");
//         },
//         error: function () {
//             alert("Something went wrong");
//         }
//     });
// }).on('submit', function(e){
//     e.preventDefault();
// });



$(document).on('change','#clientticket-is_work',function(){
    let num = document.getElementById('clientticket-is_work').value;
    if(num == 0){
        $('#is_work_file').html("Скан выписки о состоянии индивидуального лицевого счета ПФР");
    }else{
        $('#is_work_file').html("Решение о признание безработным");
    }
});



