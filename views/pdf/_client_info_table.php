<?php

/* @var $passport app\models\Passport */
/* @var $client_ticket app\models\ClientTicket*/

?>

<style>
    td {
        border: 1px solid black;
        height: 35px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    .first_td {
        width: 230px;
    }
    .sec_td {
        width: 100px;
    }
</style>

<div>
    <table>
        <tr>
            <td colspan="3" align="center" style="font-weight: bold">Информация о гражданине</td>
        </tr>
        <tr >
            <td class="first_td">Фамилия</td><td class="sec_td">обязательно</td><td><?=$client_ticket->surname?></td>
        </tr>
        <tr>
            <td>Имя</td><td>обязательно</td><td><?=$client_ticket->name?></td>
        </tr>
        <tr>
            <td>Отчество</td><td>при наличии</td><td><?=$client_ticket->patronymic?></td>
        </tr>
        <tr>
            <td >в случае изменения фамилии, имени, отчества указать прежние фамилии, имена, отчества</td><td>обязательно</td><td><?=$client_ticket->changed_fio?></td>
        </tr>
        <tr>
            <td>дата рождения</td><td>обязательно</td><td><?=$client_ticket->birthday?></td>
        </tr>
        <tr>
            <td>место рождения</td><td>обязательно</td><td><?=$client_ticket->birth_place?></td>
        </tr>
        <tr>
            <td>СНИЛС</td><td>обязательно</td><td><?=$client_ticket->snils?></td>
        </tr>
        <tr>
            <td>ИНН</td><td>при наличии</td><td><?=$client_ticket->inn?></td>
        </tr>
        <tr>
            <td colspan="3">документ, удостоверяющий личность</td>
        </tr>
        <tr>
            <td>вид документа</td><td>обязательно</td><td>пасспорт</td>
        </tr>
        <tr>
            <td>серия (при наличии) и номер</td><td>обязательно</td><td><?=$passport->series?> <?=$passport->number?></td>
        </tr>
        <tr>
            <td colspan="3">адрес регистрации по месту жительства в Российской Федерации*</td>
        </tr>
        <tr>
            <td>субъект Российской Федерации</td><td>обязательно</td><td><?=$client_ticket->region?></td>
        </tr>
        <tr>
            <td>район</td><td>при наличии</td><td><?=$client_ticket->district?></td>
        </tr>
        <tr>
            <td>город</td><td>при наличии</td><td><?=$client_ticket->city?></td>
        </tr>
        <tr>
            <td>населенный пункт (село, поселок и так далее)</td><td>при наличии</td><td><?=$client_ticket->selo?></td>
        </tr>
        <tr>
            <td>улица (проспект, переулок и так далее)</td><td>при наличии</td><td><?=$client_ticket->street?></td>
        </tr>
        <tr>
            <td>номер дома (владения)</td><td>при наличии</td><td><?=$client_ticket->house?></td>
        </tr>
        <tr>
            <td>номер корпуса (строения)</td><td>при наличии</td><td><?=$client_ticket->corpuse?></td>
        </tr>
        <tr>
            <td>номер квартиры (офиса)</td><td>при наличии</td><td><?=$client_ticket->flat?></td>
        </tr>
    </table>

</div>
<br><br><br>
