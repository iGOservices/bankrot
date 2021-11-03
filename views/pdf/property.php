<?php

/* @var $passport app\models\Passport */
/* @var $client_ticket app\models\ClientTicket*/
/* @var $property app\models\Property*/
/* @var $bank app\models\Bank*/
/* @var $shares app\models\Shares*/
/* @var $other_shares app\models\OtherShares*/
/* @var $valuable_property app\models\ValuableProperty*/

use app\models\Bank;
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
    <h3>Опись имущества гражданина</h3>
</div>

<?= $this->render('_client_info_table', [
    'client_ticket' => $client_ticket,
    'passport' => $passport
]) ?>

<div>
    <table>
        <tr>
            <td colspan="7">I. Недвижимое имущество</td>
        </tr>
        <tr>
            <td>N п/п</td>
            <td>Вид и наименование имущества</td>
            <td>Вид собственности</td>
            <td>Местонахождение (адрес)</td>
            <td>Площадь (кв. м)</td>
            <td>Основание приобретения и стоимость</td>
            <td>Сведения о залоге и залогодержателе</td>
        </tr>
        <?php $i = 1;?>
        <?php while($i<6):?>
            <tr>
                <td style="border-bottom: none;">1.<?=$i?></td><td colspan="7"><?=Property::$property_type[$i]?></td>
            </tr>
            <?php $k = 1;?>
            <?php foreach($property as $prop):?>
                <?php if($prop->property_type == $i && $prop->group == 1):?>
                    <tr>
                        <td style="border-bottom: none;border-top: none;"></td>
                        <td><?=$k?>)</td>
                        <td><?=Property::$property_view[$prop->property_view]?></td>
                        <td><?php echo $prop->coutry.",".$prop->region." ".$prop->district." район, г.".$prop->city."  ул.".$prop->street." ".$prop->house.",".$prop->corpus." ".$prop->office?></td>
                        <td><?=$prop->square?></td>
                        <td><?php echo "Основание:".$prop->own_dogovor." , стоимость-".$prop->cost?></td>
                        <td><?php echo "Договор №".$prop->zalog_dogovor.",<br> Залогодержатель:".Property::$zalog[$prop->zalog].",<br> Имя залогодержателя:".$prop->zalog_name.",<br> ИНН залогодержателя:".$prop->zalog_inn?></td>
                    </tr>
                    <?php $k++;?>
                <?php endif;?>
            <?php endforeach;?>
            <?php $i++;?>
        <?php endwhile;?>

    </table>

</div>
<br><br>
<div>
    <table>
        <tr>
            <td colspan="7">II. Движимое имущество</td>
        </tr>
        <tr>
            <td>N п/п</td>
            <td>Вид, марка, модель транспортного средства, год изготовления</td>
            <td>Идентификационный номер</td>
            <td>Вид собственности</td>
            <td>Место нахождения/место хранения (адрес)</td>
            <td>Стоимость</td>
            <td>Сведения о залоге и залогодержателе</td>
        </tr>
        <?$i = 1;?>
        <?while($i<8):?>
            <tr>
                <td style="border-bottom: none;">2.<?=$i?></td><td colspan="7"><?=Property::$property_type_dvizh[$i]?></td>
            </tr>
            <?$k = 1;?>
            <?foreach($property as $prop):?>
                <?if($prop->property_type == $i && $prop->group == 2):?>
                    <tr>
                        <td style="border-bottom: none;border-top: none;"></td>
                        <td><?=$k?>)</td>
                        <td><?=$prop->vin_number?></td>
                        <td><?=Property::$property_view[$prop->property_view]?></td>
                        <td><? echo $prop->coutry.",".$prop->region." ".$prop->district." район, г.".$prop->city."  ул.".$prop->street." ".$prop->house.",".$prop->corpus." ".$prop->office?></td>
                        <td><? echo "стоимость-".$prop->cost?></td>
                        <td><? echo "Договор №".$prop->zalog_dogovor.",<br> Залогодержатель:".Property::$zalog[$prop->zalog].",<br> Имя залогодержателя:".$prop->zalog_name.",<br> ИНН залогодержателя:".$prop->zalog_inn?></td>
                    </tr>
                    <?$k++;?>
                <?endif;?>
            <?endforeach;?>
            <?$i++;?>
        <?endwhile;?>

    </table>

</div>

<br><br>
<div>
    <table>
        <tr>
            <td colspan="7">III. Сведения о счетах в банках и иных кредитных организациях</td>
        </tr>
        <tr>
            <td>N п/п</td>
            <td>Наименование и адрес банка или иной кредитной организации</td>
            <td>Вид и валюта счета</td>
            <td>Дата открытия счета</td>
            <td>Остаток на счете (руб.)</td>
        </tr>
        <?if(isset($bank)):?>
            <?$k = 1;?>
            <?foreach($bank as $let):?>
                    <tr>
                        <td><?="3.".$k?></td>
                        <td><? echo "Наименвоание:".$let->name.", ".$let->post_address?></td>
                        <td><? echo "Вид счета: ".Bank::$type[$let->type].", валюта счета:".Bank::$currency[$let->currency]." ,номер счета:".$let->number?></td>
                        <td><? echo $let->date_open?></td>
                        <td><? echo $let->balance?></td>
                    </tr>
                    <?$k++;?>
            <?endforeach;?>
        <?endif;?>

    </table>

</div>

<br><br>
<div>
    <table>
        <tr>
            <td colspan="7">IV. Акции и иное участие в коммерческих организациях</td>
        </tr>
        <tr>
            <td>N п/п</td>
            <td>Наименование и организационно-правовая форма организации</td>
            <td>Местонахождение организации (адрес)</td>
            <td>Уставный, складочный капитал, паевый фонд (руб.)</td>
            <td>Доля участия</td>
            <td>Основание участия</td>
        </tr>

        <?if(isset($shares)):?>
            <?$k = 1;?>
            <?foreach($shares as $let):?>
                <tr>
                    <td><?="4.".$k?></td>
                    <td><? echo "Наименвоание:".$let->name.", ИНН общества:".$let->inn?></td>
                    <td><? echo $let->location?></td>
                    <td><? echo $let->company_capital?></td>
                    <td><? echo $let->share?></td>
                    <td><? echo "Номер договора участия:".$let->dogovor_number." , дата договора:".$let->date?></td>
                </tr>
                <?$k++;?>
            <?endforeach;?>
        <?endif;?>

    </table>

</div>



<br><br>
<div>
    <table>
        <tr>
            <td colspan="7">V. Иные ценные бумаги</td>
        </tr>
        <tr>
            <td>N п/п</td>
            <td>Вид ценной бумаги</td>
            <td>Лицо, выпустившее ценную бумагу</td>
            <td>Номинальная величина обязательства (руб.)</td>
            <td>Общее количество</td>
            <td>Общая стоимость (руб.)</td>
        </tr>
        <?php if(isset($other_shares)):?>
            <?php $k = 1;?>
            <?php foreach($other_shares as $let):?>
                <tr>
                    <td><?="5.".$k?></td>
                    <td><?=OtherShares::$type[$let->type]?></td>
                    <td><?=$let->creater?></td>
                    <td><?=$let->nominal_cost?></td>
                    <td><?=$let->total_count?></td>
                    <td><?=$let->total_count*$let->nominal_cost?></td>
                </tr>
                <?php $k++;?>
            <?php endforeach;?>
        <?php endif;?>

    </table>

</div>

<br><br>
<div>
    <table>
        <tr>
            <td colspan="7">VI. Сведения о наличных денежных средствах и ином ценном имуществе</td>
        </tr>
        <tr>
            <td>N п/п</td>
            <td>Вид и наименование имущества</td>
            <td>Стоимость (сумма и валюта)</td>
            <td>Место нахождения/место хранения (адрес)</td>
            <td>Сведения о залоге и залогодержателе</td>
        </tr>
        <?php if(isset($valuable_property)):?>
            <?php $i = 1;?>
            <?php while($i<6):?>
                <tr>
                    <td style="border-bottom: none;">6.<?=$i?></td><td colspan="7"><?=ValuableProperty::$property_type[$i]?></td>
                </tr>
                <?php $k = 1;?>
                <?php foreach($valuable_property as $prop):?>
                    <?php if($prop->property_type == $i):?>
                        <tr>
                            <td style="border-bottom: none;border-top: none;"></td>
                            <td><?=$k?>)<?=$prop->name?></td>
                            <td><?=$prop->cost?></td>
                            <td><?php  echo $prop->location == 1 ? "Место хранения: ".ValuableProperty::$location[$prop->location].", адресс:".$prop->coutry.",".$prop->region." ".$prop->district." район, г.".$prop->city."  ул.".$prop->street." ".$prop->house.",".$prop->corpus." ".$prop->office : "Место хранения: Банковская ячейка. Кредитная организация:".$prop->org_name." , номер договора:".$prop->dogovor_number." ,дата договора:".$prop->dogovor_date?></td>
                            <td><?php  echo "Договор №".$prop->zalog_dogovor.",<br> Залогодержатель:".ValuableProperty::$zalog_type[$prop->zalog_type].",<br> Имя залогодержателя:".$prop->zalog_name.",<br> ИНН залогодержателя:".$prop->zalog_inn?></td>
                        </tr>
                        <?php $k++;?>
                    <?php endif;?>
                <?php endforeach;?>
                <?php $i++;?>
            <?php endwhile;?>
        <?php endif;?>

    </table>

</div>
<br><br>

Достоверность и полноту настоящих сведений подтверждаю.
"   " ____________ 21    г. ____________________ ________________________
(подпись гражданина)   (расшифровка подписи)


_____________________________


