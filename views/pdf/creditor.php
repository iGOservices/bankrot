<?php

/* @var $passport app\models\Passport */
/* @var $client_ticket app\models\ClientTicket*/
/* @var $creditor app\models\Creditor*/
/* @var $debitor app\models\Debitor*/

use app\models\Bank;
use app\models\Creditor;
use app\models\OtherShares;
use app\models\Property;
use app\models\ValuableProperty;


?>
<div style="text-align: right">
    Приложение N 2<br>
    к приказу Министерства<br>
    экономического развития РФ<br>
    от 5 августа 2015 г. N 530<br>
</div>
<div style="text-align: center">
    <h3>Список кредиторов и должников гражданина</h3>
</div>

<?= $this->render('_client_info_table', [
    'client_ticket' => $client_ticket,
    'passport' => $passport
]) ?>

<div>
    <table>
        <tr>
            <td colspan="8" align="center">
                I. Сведения о кредиторах гражданина
                (по денежным обязательствам и (или) обязанности по уплате обязательных платежей, за исключением возникших в результате осуществления гражданином предпринимательской деятельности)</td>
        </tr>
        <tr>
            <td>1</td>
            <td colspan="7">Денежные обязательства</td>
        </tr>
        <tr>
            <td rowspan="2">N п/п</td>
            <td rowspan="2">Содержание обязательства</td>
            <td rowspan="2">Кредитор</td>
            <td rowspan="2">Место нахождения (место жительства) кредитора</td>
            <td rowspan="2">Основание возникновения</td>
            <td rowspan="1" colspan="2">Сумма обязательства

            </td>
            <td rowspan="2" >Штрафы, пени и иные санкции</td>
        </tr>
        <tr>
            <td rowspan="1">всего</td>
            <td rowspan="1">в том числе задолженность</td>
        </tr>

        <? foreach ($creditor as $key => $let){
            /* @var $let app\models\Creditor*/
            if($let->is_predprin == 0 && $let->group == 1){
                echo "<tr><td>1.".($key+1)."</td>".
                "<td>".Creditor::$commitment[$let->commitment]."</td>".
                "<td>".Creditor::$statment[$let->statment].": ".$let->name."</td>".
                "<td>".$let->coutry.",".$let->region." ".$let->district." район, г.".$let->city."  ул.".$let->street." ".$let->house.",".$let->corpus." ".$let->flat.", индекс: ".$let->post_index."</td>".
                    "<td>Основание: " .Creditor::$base[$let->base].", номер договора:".$let->base_num." , дата договора:".$let->base_date."</td>".
                "<td>".$let->sum_statment."</td>".
                    "<td>".$let->sum_dolg."</td>".
                "<td>".$let->forfeit."</td></tr>";
            }
        }?>

        <tr>
            <td>2</td>
            <td colspan="7">Обязательные платежи</td>
        </tr>
        <tr>
            <td colspan="1">N п/п</td>
            <td colspan="3">Наименование налога, сбора или иного обязательного платежа</td>
            <td colspan="2">Недоимка</td>
            <td colspan="2">Штрафы, пени и иные санкции</td>
        </tr>

        <? foreach ($creditor as $key => $let){
            /* @var $let app\models\Creditor*/
            if($let->is_predprin == 0 && $let->group == 2){
                echo "<tr><td>2.".($key+1)."</td>".
                    "<td colspan='3'>".Creditor::$commitment_ob[$let->commitment].": ".$let->name."</td>".
                    "<td colspan='2'>Тут что то будет когда я узнаю что такое недоимка</td>".
                    "<td colspan='2'>".$let->forfeit."</td></tr>";
            }
        }?>

        </tbody>
    </table>
    <br>
    Сведения о неденежных обязательствах гражданина, за исключением возникших в результате осуществления гражданином предпринимательской деятельности (в том числе о передаче имущества в собственность, выполнении работ и оказании услуг и так далее):

</div>

<br><br>

<div>
    <table>
        <tr>
            <td colspan="8" align="center">
                II. Сведения о кредиторах гражданина

                (по денежным обязательствам и (или) обязанности по уплате обязательных платежей,

                которые возникли в результате осуществления гражданином

                предпринимательской деятельности)</tr>
        <tr>
            <td>1</td>
            <td colspan="7">Денежные обязательства</td>
        </tr>
        <tr>
            <td rowspan="2">N п/п</td>
            <td rowspan="2">Содержание обязательства</td>
            <td rowspan="2">Кредитор</td>
            <td rowspan="2">Место нахождения (место жительства) кредитора</td>
            <td rowspan="2">Основание возникновения</td>
            <td rowspan="1" colspan="2">Сумма обязательства

            </td>
            <td rowspan="2" >Штрафы, пени и иные санкции</td>
        </tr>
        <tr>
            <td rowspan="1">всего</td>
            <td rowspan="1">в том числе задолженность</td>
        </tr>

        <? foreach ($creditor as $key => $let){
            /* @var $let app\models\Creditor*/
            if($let->is_predprin == 1 && $let->group == 1){
                echo "<tr><td>1.".($key+1)."</td>".
                    "<td>".Creditor::$commitment[$let->commitment]."</td>".
                    "<td>".Creditor::$statment[$let->statment].": ".$let->name."</td>".
                    "<td>".$let->coutry.",".$let->region." ".$let->district." район, г.".$let->city."  ул.".$let->street." ".$let->house.",".$let->corpus." ".$let->flat.", индекс: ".$let->post_index."</td>".
                    "<td>Основание: " .Creditor::$base[$let->base].", номер договора:".$let->base_num." , дата договора:".$let->base_date."</td>".
                    "<td>".$let->sum_statment."</td>".
                    "<td>".$let->sum_dolg."</td>".
                    "<td>".$let->forfeit."</td></tr>";
            }
        }?>

        <tr>
            <td>2</td>
            <td colspan="7">Обязательные платежи</td>
        </tr>
        <tr>
            <td colspan="1">N п/п</td>
            <td colspan="3">Наименование налога, сбора или иного обязательного платежа</td>
            <td colspan="2">Недоимка</td>
            <td colspan="2">Штрафы, пени и иные санкции</td>
        </tr>

        <? foreach ($creditor as $key => $let){
            /* @var $let app\models\Creditor*/
            if($let->is_predprin == 1 && $let->group == 2){
                echo "<tr><td>2.".($key+1)."</td>".
                    "<td colspan='3'>".Creditor::$commitment_ob[$let->commitment].": ".$let->name."</td>".
                    "<td colspan='2'>Тут что то будет когда я узнаю что такое недоимка</td>".
                    "<td colspan='2'>".$let->forfeit."</td></tr>";
            }
        }?>

        </tbody>
    </table>
     <br>
    Сведения о неденежных обязательствах гражданина, которые возникли в результате осуществления гражданином предпринимательской деятельности (в том числе о передаче имущества в собственность, выполнении работ и оказании услуг и так далее):


</div>

<br><br>

<div>
    <table>
        <tr>
            <td colspan="8" align="center">
                III. Сведения о должниках гражданина

                (по денежным обязательствам и (или) обязанности по уплате обязательных платежей, за исключением возникших в результате осуществления гражданином предпринимательской деятельности)</tr>
        <tr>
            <td>1</td>
            <td colspan="7">Денежные обязательства</td>
        </tr>
        <tr>
            <td rowspan="2">N п/п</td>
            <td rowspan="2">Содержание обязательства</td>
            <td rowspan="2">Должник</td>
            <td rowspan="2">Место нахождения (место жительства) кредитора</td>
            <td rowspan="2">Основание возникновения</td>
            <td rowspan="1" colspan="2">Сумма обязательства

            </td>
            <td rowspan="2" >Штрафы, пени и иные санкции</td>
        </tr>
        <tr>
            <td rowspan="1">всего</td>
            <td rowspan="1">в том числе задолженность</td>
        </tr>

        <? foreach ($debitor as $key => $let){
            /* @var $let app\models\Debitor*/
            if($let->is_predprin == 0 && $let->group == 1){
                echo "<tr><td>1.".($key+1)."</td>".
                    "<td>".Creditor::$commitment[$let->commitment]."</td>".
                    "<td>".Creditor::$statment[$let->statment].": ".$let->name."</td>".
                    "<td>".$let->coutry.",".$let->region." ".$let->district." район, г.".$let->city."  ул.".$let->street." ".$let->house.",".$let->corpus." ".$let->flat.", индекс: ".$let->post_index."</td>".
                    "<td>Основание: " .Creditor::$base[$let->base].", номер договора:".$let->base_num." , дата договора:".$let->base_date."</td>".
                    "<td>".$let->sum_statment."</td>".
                    "<td>".$let->sum_dolg."</td>".
                    "<td>".$let->forfeit."</td></tr>";
            }
        }?>

        <tr>
            <td>2</td>
            <td colspan="7">Обязательные платежи</td>
        </tr>
        <tr>
            <td colspan="1" rowspan="2">N п/п</td>
            <td colspan="3" rowspan="2">Наименование налога, сбора или иного обязательного платежа</td>
            <td colspan="4" rowspan="1">Сумма к зачету или возврату</td>
        </tr>
        <tr>
            <td colspan="2" rowspan="1">всего</td>
            <td colspan="2" rowspan="1">проценты</td>
        </tr>

        <? foreach ($debitor as $key => $let){
            /* @var $let app\models\Debitor*/
            if($let->is_predprin == 0 && $let->group == 2){
                echo "<tr><td>2.".($key+1)."</td>".
                    "<td colspan='3'>".Creditor::$commitment_ob[$let->commitment].": ".$let->name."</td>".
                    "<td colspan='2'>Тут что то будет когда я узнаю</td>".
                    "<td colspan='2'>Тут что то будет когда я узнаю</td></tr>";
            }
        }?>

        </tbody>
    </table>
    <br>

    Сведения о неденежных обязательствах перед гражданином, за исключением возникших в результате осуществления гражданином предпринимательской деятельности (в том числе о передаче имущества в собственность, выполнении работ и оказании услуг и так далее):
</div>

<br><br>


<div>
    <table>
        <tr>
            <td colspan="8" align="center">
                IV. Сведения о должниках гражданина

                (по денежным обязательствам и (или) обязанности по уплате обязательных платежей, которые возникли в результате осуществления гражданином предпринимательской деятельности)<tr>
            <td>1</td>
            <td colspan="7">Денежные обязательства</td>
        </tr>
        <tr>
            <td rowspan="2">N п/п</td>
            <td rowspan="2">Содержание обязательства</td>
            <td rowspan="2">Должник</td>
            <td rowspan="2">Место нахождения (место жительства) кредитора</td>
            <td rowspan="2">Основание возникновения</td>
            <td rowspan="1" colspan="2">Сумма обязательства

            </td>
            <td rowspan="2" >Штрафы, пени и иные санкции</td>
        </tr>
        <tr>
            <td rowspan="1">всего</td>
            <td rowspan="1">в том числе задолженность</td>
        </tr>

        <? foreach ($debitor as $key => $let){
            /* @var $let app\models\Debitor*/
            if($let->is_predprin == 1 && $let->group == 1){
                echo "<tr><td>1.".($key+1)."</td>".
                    "<td>".Creditor::$commitment[$let->commitment]."</td>".
                    "<td>".Creditor::$statment[$let->statment].": ".$let->name."</td>".
                    "<td>".$let->coutry.",".$let->region." ".$let->district." район, г.".$let->city."  ул.".$let->street." ".$let->house.",".$let->corpus." ".$let->flat.", индекс: ".$let->post_index."</td>".
                    "<td>Основание: " .Creditor::$base[$let->base].", номер договора:".$let->base_num." , дата договора:".$let->base_date."</td>".
                    "<td>".$let->sum_statment."</td>".
                    "<td>".$let->sum_dolg."</td>".
                    "<td>".$let->forfeit."</td></tr>";
            }
        }?>

        <tr>
            <td>2</td>
            <td colspan="7">Обязательные платежи</td>
        </tr>
        <tr>
            <td colspan="1" rowspan="2">N п/п</td>
            <td colspan="3" rowspan="2">Наименование налога, сбора или иного обязательного платежа</td>
            <td colspan="4" rowspan="1">Сумма к зачету или возврату</td>
        </tr>
        <tr>
            <td colspan="2" rowspan="1">всего</td>
            <td colspan="2" rowspan="1">проценты</td>
        </tr>

        <? foreach ($debitor as $key => $let){
            /* @var $let app\models\Debitor*/
            if($let->is_predprin == 1 && $let->group == 2){
                echo "<tr><td>2.".($key+1)."</td>".
                    "<td colspan='3'>".Creditor::$commitment_ob[$let->commitment].": ".$let->name."</td>".
                    "<td colspan='2'>Тут что то будет когда я узнаю</td>".
                    "<td colspan='2'>Тут что то будет когда я узнаю</td></tr>";
            }
        }?>

        </tbody>
    </table>
    <br>

    Сведения о неденежных обязательствах перед гражданином, которые возникли в результате осуществления гражданином предпринимательской деятельности (в том числе о передаче имущества в собственность, выполнении работ и оказании услуг и так далее):</div>
<br><br>
Достоверность и полноту настоящих сведений подтверждаю.
"   " ____________ 21    г. ____________________ ________________________
(подпись гражданина)   (расшифровка подписи)


_____________________________


