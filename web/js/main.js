
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = 'Далее<span class="icon-material-outline-keyboard-arrow-right"></span>';
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {

  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  //if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
    console.log(x);
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
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
function changeStatment(i){
    let id = document.getElementById('creditor-'+i+'-group').value;
    let str = "";

    switch (id){
        case '1':
            str =
                "<div className=\"form-group row field-creditor-"+i+"-commitment\">" +
                "<select id=\"creditor-"+i+"-commitment\" className=\"with-border\" name=\"Creditor["+i+"][commitment]\">" +
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
                "<select id=\"creditor-"+i+"-commitment\" className=\"with-border\" name=\"Creditor["+i+"][commitment]\">" +
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

function deleteItem(i,statment){
    if(confirm("Вы уверены что хотите удалить выбранную запись?")){
        let str = statment+"-"+i;
        let elem = document.getElementById(str);
        elem.remove();

        str = statment+'-point';
        let count = document.getElementById(str).value;
        $("#"+str).val(count-1);
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

