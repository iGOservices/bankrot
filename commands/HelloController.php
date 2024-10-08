<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Bank;
use app\models\ClientTicket;
use app\models\CpoDirectory;
use app\models\Creditor;
use app\models\Debitor;
use app\models\Directory;
use app\models\Docx;
use app\models\OtherShares;
use app\models\Pdf;
use app\models\Property;
use app\models\Upload;
use app\models\User;
use app\models\ValuableProperty;
use Codeception\Lib\Di;
use Mpdf\Mpdf;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\Writer\HTML;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;


/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    public function actionAddAdmin() {
        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'admin';
            $user->phone = '79999999999';
            $user->email = 'admin@mail.ru';
            $user->setPassword('1111');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }else{
                print_r($user->errors);
            }
        }
    }

    public function actionParseDirectory(){
        $arr = [
            ['name','Имя'],
            ['surname' , 'Фамилия'],
            ['patronymic' , 'Отчество'],
            ['gender' , 'Пол'],
            ['birthday' , 'Дата рождения'],
            ['birth_place' , 'Место рождения'],
            ['inn' , 'ИНН'],
            ['snils' , 'Снилс'],
            ['region' , 'Регион'],
            ['district' , 'Район'],
            ['city' , 'Город'],
            ['street' , 'Улица'],
            ['selo' , 'Поселок'],
            ['house' , 'Дом'],
            ['corpus' , 'Корпус'],
            ['flat' , 'Квартира'],
            ['index' , 'Почтовый индекс'],
            ['fact_address' , 'Фактический адресс'],
            ['passport_id' , 'Пасспорт'],
            ['inter_passsport_id' , 'Загран пасспорт'],
            ['mail' , 'Mail'],
            ['phone' , 'Телефон'],
            ['is_ip' , 'ИП'],
            ['is_work' , 'Статус безработного'],
            ['changed_fio' , 'Смена ФИО'],
            ['facsimile' , 'Факсимиле'],
            ['family_type' , 'Тип родства'],
            ['family_name' , 'Имя'],
            ['family_surname' , 'Фамилия'],
            ['family_patronymic' , 'Отчество'],
            ['family_birthday' , 'Дата рождения'],
            ['family_inn' , 'ИНН'],
            ['family_birth_country' , 'Страна рождения'],
            ['family_birth_series' , 'Серия'],
            ['family_birth_number' , 'Номер'],
            ['family_birth_date' , 'Дата рождения'],
            ['family_birth_number_act' , 'Номер акта'],
            ['family_birth_number_act_date' , 'Дата акта'],
            ['family_given' , 'Кем выдан'],
            ['brak' , 'Брачный договор'],
            ['razvod' , 'Договор о разводе'],
            ['bank_name' , 'Наименование кредитной организации'],
            ['bank_post_address' , 'Потовый адресс'],
            ['bank_number' , 'Номер счета'],
            ['bank_bic' , 'БИК'],
            ['bank_type' , 'Вид счета'],
            ['bank_currency' , 'Валюта счета'],
            ['bank_date_open' , 'Дата открытия счета'],
            ['bank_balance' , 'Исходящий остаток в рублях'],
            ['bank_other' , 'Примечание(Сведения о счетах в банках)'],
            ['creditor_group' , 'Группа(Кредиторы)'],
            ['creditor_commitment' , 'Содержание обязательства(Кредиторы)'],
            ['creditor_is_predprin' , 'Обязательство возникло в результате предпринимательской деятельности(Кредиторы)'],
            ['creditor_statment' , 'Физ.лицо/Организация(Кредиторы)'],
            ['creditor_name' , 'Наименование кредитора'],
            ['creditor_inn' , 'ИНН кредитора'],
            ['creditor_coutry' , 'Страна(Кредиторы)'],
            ['creditor_region' , 'Регион(Кредиторы)'],
            ['creditor_district' , 'Район(Кредиторы)'],
            ['creditor_city' , 'Город(Кредиторы)'],
            ['creditor_street' , 'Улица(Кредиторы)'],
            ['creditor_house' , 'Дом(Кредиторы)'],
            ['creditor_corpus' , 'Корпус(Кредиторы)'],
            ['creditor_flat' , 'Квартира(Кредиторы)'],
            ['creditor_post_index' , 'Почтовый индекс(Кредиторы)'],
            ['creditor_sum_statment' , 'Сумма обязательства всего(Кредиторы)'],
            ['creditor_sum_dolg' , 'Сумма обязательства задолженность(Кредиторы)'],
            ['creditor_forfeit' , 'Штрафы, пени, иные санкции(Кредиторы)'],
            ['creditor_base' , 'Основание возникновения задолженности(Кредиторы)'],
            ['creditor_base_date' , 'Дата документа(Кредиторы)'],
            ['creditor_base_num' , 'Номер документа(Кредиторы)'],
            ['creditor_other' , 'Примечание(Кредиторы)'],
            ['debitor_group' , 'Группа(Дебиторы)'],
            ['debitor_commitment' , 'Содержание обзательства(Дебиторы)'],
            ['debitor_is_predprin' , 'Обязательство возникло в результате предпринимательской деятельности(Дебиторы)'],
            ['debitor_statment' , 'Физ.лицо/Организация(Дебиторы)'],
            ['debitor_name' , 'Наименование дебитора'],
            ['debitor_inn' , 'ИНН дебитора'],
            ['debitor_coutry' , 'Страна(Дебиторы)'],
            ['debitor_region' , 'Регион(Дебиторы)'],
            ['debitor_district' , 'Район(Дебиторы)'],
            ['debitor_city' , 'Город(Дебиторы)'],
            ['debitor_street' , 'Улица(Дебиторы)'],
            ['debitor_house' , 'Дом(Дебиторы)'],
            ['debitor_corpus' , 'Корпус(Дебиторы)'],
            ['debitor_flat' , 'Квартира(Дебиторы)'],
            ['debitor_post_index' , 'Почтовый индекс(Дебиторы)'],
            ['debitor_sum_statment' , 'Сумма обязательства всего(Дебиторы)'],
            ['debitor_sum_dolg' , 'Сумма обязательства задолженность(Дебиторы)'],
            ['debitor_forfeit' , 'Штрафы, пени, иные санкции(Дебиторы)'],
            ['debitor_base' , 'Тип подтверждающего документа(Дебиторы)'],
            ['debitor_base_date' , 'Дата документа(Дебиторы)'],
            ['debitor_base_num' , 'Номер документа(Дебиторы)'],
            ['debitor_other' , 'Примечание(Дебиторы)'],
            ['deal_type' , 'Предмет сделки'],
            ['deal_description' , 'Описание сделки'],
            ['deal_date' , 'Дата сделки'],
            ['deal_name' , 'Имя контрагента'],
            ['deal_inn' , 'ИНН контрагента'],
            ['enforce_number' , 'Номер исполнительного производства'],
            ['enforce_date' , 'Дата исполнительного производства'],
            ['enforce_sum' , 'Сумма непогашенной задолженности'],
            ['nalog_work' , 'Наименование налогового агента'],
            ['nalog_year' , 'Год отчетного периода'],
            ['nalog_income' , 'Сумма дохода'],
            ['nalog_nalog' , 'Сумма налога'],
            ['other_text' , 'Примечание'],
            ['other_shares_creater' , 'Лицо выпустившее ценную бумагу'],
            ['other_shares_type' , 'Вид ценной бумаги'],
            ['other_shares_total_count' , 'Общее количество'],
            ['other_shares_nominal_cost' , 'Номинальная величина обязательства'],
            ['other_shares_other' , 'Примечание(иные ценные бумаги)'],
            ['property_group' , 'Группа(Имущество)'],
            ['property_property_type' , 'Вид имущества'],
            ['property_property_view' , 'Вид собственности'],
            ['property_share' , 'Доля владения'],
            ['property_other_owners' , 'Иные собственники'],
            ['property_active_name' , 'Наименование актива'],
            ['property_square' , 'Площадь'],
            ['property_reg_number' , 'Регистрационный номер актива'],
            ['property_vin_number' , 'VIN номер'],
            ['property_date_sved' , 'Дата свидетельства о регистрации'],
            ['property_num_sved' , 'Номер свидетельства о регистрации'],
            ['property_coutry' , 'Property Coutry'],
            ['property_region' , 'Property Region'],
            ['property_district' , 'Страна(Имущество)'],
            ['property_city' , 'Город(Имущество)'],
            ['property_street' , 'Улица(Имущество)'],
            ['property_house' , 'Дом(Имущество)'],
            ['property_corpus' , 'Корпус(Имущество)'],
            ['property_office' , 'Оффис(Имущество)'],
            ['property_post_index' , 'Почтовый индекс(Имущество)'],
            ['property_cost' , 'Стоимость'],
            ['property_active_status' , 'Статус актива(Имущество)'],
            ['property_zalog_name' , 'Имя залогодержателя(Имущество)'],
            ['property_zalog_post_index' , 'Почтовый адресс залогодержателя(Имущество)'],
            ['property_zalog_dogovor' , 'Договор залога или иная сделка(Имущество)'],
            ['property_other' , 'Примечание(Имущество)'],
            //'property_own_dogovor' , 'Договор залога или иная сделка(Имущество)'],
            ['property_zalog_inn' , 'ИНН залогодержателя(Имущество)'],
            ['property_zalog' , 'Залогодержатель(Имущество)'],
            ['share_name' , 'Наименование организации(Акции)'],
            ['share_location' , 'Местонахождение организации(Акции)'],
            ['share_inn' , 'ИНН общества(Акции)'],
            ['share_company_capital' , 'Уставной капитал общества(Акции)'],
            ['share_share' , 'Доля участия(Акции)'],
            ['share_nominal_cost' , 'Номинальная стоимость акции(Акции)'],
            ['share_shares_count' , 'Количество акций'],
            ['share_total_cost' , 'Общая сумма акция'],
            ['share_dogovor_number' , 'Номер договора участия(Акции)'],
            ['share_date' , 'Дата договора(Акции)'],
            ['share_other' , 'Примечание(Акции)'],
            ['valuable_property_property_type' , 'Вид имущества'],
            ['valuable_property_name' , 'Наименование(Имущество)'],
            ['valuable_property_cost' , 'Сумма(Имущество)'],
            ['valuable_property_location' , 'Место нахождения или хранения(Имущество)'],
            ['valuable_property_coutry' , 'Страна(Имущество)'],
            ['valuable_property_region' , 'Регион(Имущество)'],
            ['valuable_property_district' , 'Район(Имущество)'],
            ['valuable_property_city' , 'Город(Имущество)'],
            ['valuable_property_street' , 'Улица(Имущество)'],
            ['valuable_property_house' , 'Дом(Имущество)'],
            ['valuable_property_corpus' , 'Корпус(Имущество)'],
            ['valuable_property_office' , 'Оффис(Имущество)'],
            ['valuable_property_post_index' , 'Почтовый индекс(Имущество)'],
            ['valuable_property_org_name' , 'Наименование кредитной организации(Имущество)'],
            ['valuable_property_dogovor_number' , 'Номер договора(Имущество)'],
            ['valuable_property_dogovor_date' , 'Дата догвоора(Имущество)'],
            ['valuable_property_active_status' , 'Статус актива(Имущество)'],
            ['valuable_property_zalog_name' , 'Имя залогодержателя(Имущество)'],
            ['valuable_property_zalog_type' , 'Залогодержатель(Имущество)'],
            ['valuable_property_zalog_inn' , 'ИНН залогодержателя(Имущество)'],
            ['valuable_property_zalog_address' , 'Почтовый адресс залогодержателя(Имущество)'],
            ['valuable_property_zalog_dogovor' , 'Договор залога(Имущество)'],
            ['valuable_property_other' , 'Примечание(Имущество)'],
        ];
        $i = 1;
        $count = 0;
        while($i <= 3){
            foreach ($arr as $item){
                $directory = new Directory();
                $directory->type = $i;
                $directory->name = $item[0];
                $directory->title = $item[1];
                $directory->active = 1;
                $directory->prompt = "";
                $directory->prompt_active = 1;
                if($directory->save()){
                    $count++;
                    print($count."\n");
                }
            }
            $i++;
        }

        print("Занесено {$count} строк");
    }

    public function actionDocx(){

        $client_ticket = ClientTicket::findOne(80);
        $passport = $client_ticket->passportByTicket;
        $creditor = $client_ticket->creditorByTicket;
        $debitor = $client_ticket->debitorByTicket;

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(12);


        $sectionStyle = array(
            'orientation' => 'landscape',
            'marginTop' => Converter::pixelToTwip(60),
            'marginLeft' => Converter::pixelToTwip(70),
            'marginRight' => Converter::pixelToTwip(30),
            'colsNum' => 1,
            'pageNumberingStart' => 1,
            'borderBottomSize'=>100,
        );

        $section = $phpWord->addSection($sectionStyle);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align'=>'right','spaceBefore'=>10);
        $section->addText(
            'Приложение № 1'
            , $fontStyle,$parStyle
        );
        $section->addText(
            'к приказу Минэкономразвития России'
            , $fontStyle,$parStyle
        );
        $section->addText(
            'от 5 августа 2015 г. № 530'
            , $fontStyle,$parStyle
        );

        $section->addTextBreak(3); // перенос строки
        $fontStyle = array('name'=>'Times New Roman', 'size'=>14, 'bold'=>TRUE);
        $parStyle = array('align'=>'center','spaceBefore'=>10);
        $section->addText(
            'Список кредиторов и должников гражданина'
            , $fontStyle,$parStyle
        );

        $section->addTextBreak(3); // перенос строки

        /**
         *  НАЧАЛО ОТРИСОВКИ ПЕРВОЙ ТАБЛИЦЫ ИНФОРМАЦИЯ О ГРАЖДАНИНИЕ
         */
        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
        $cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');
        $cellColSpan4 = array('gridSpan' => 4, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(720), $cellColSpan3)->addText('Информация о гражданине', $fontStyle, $cellHCentered);

        $column_1 = 250;
        $column_2 = 150;
        $column_3 = 320;

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('фамилия', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->surname, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('имя', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->name, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('отчество', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->patronymic, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('в случае изменения фамилии, имени, отчества указать прежние фамилии, имена, отчества', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->changed_fio, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('дата рождения', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->birthday, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('место рождения', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->birth_place, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('СНИЛС', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->snils, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('ИНН', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->inn, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(720), $cellColSpan3)->addText('документ, удостоверяющий личность', null, $cellVLeft);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('вид документа', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText('паспорт', null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('серия (при наличии) и номер', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($passport->series." ".$passport->number, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(720), $cellColSpan3)->addText('адрес регистрации по месту жительства в Российской Федерации', null, $cellVLeft);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('субъект Российской Федерации', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->region, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('район', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->district, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('город', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->city, null, $cellHCentered);
        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('населенный пункт (село, поселок и так далее)', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->selo, null, $cellHCentered);
        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('улица (проспект, переулок и так далее)', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->street, null, $cellHCentered);
        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('номер дома (владения)', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->house, null, $cellHCentered);
        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('номер корпуса (строения)', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->corpuse, null, $cellHCentered);
        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('номер квартиры (офиса)', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->house, null, $cellHCentered);


        /**
         *  КОНЕЦ ОТРИСОВКИ ПЕРВОЙ ТАБЛИЦЫ ИНФОРМАЦИЯ О ГРАЖДАНИНИЕ
         */

        $section->addPageBreak();

        /**
         *  НАЧАЛО ОТРИСОВКИ ВТОРОЙ ТАБЛИЦЫ Сведения о кредиторах гражданина
         */
        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
        $cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');
        $cellColSpan8 = array('gridSpan' => 8, 'valign' => 'center');
        $cellColSpan7 = array('gridSpan' => 7, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(700), $cellColSpan8)->addText('I. Сведения о кредиторах гражданина (по денежным обязательствам и (или) обязанности по уплате обязательных платежей, за исключением возникших в результате осуществления гражданином предпринимательской деятельности)', $fontStyle, $cellHCentered);


        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('1', $fontStyle, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(665), $cellColSpan7)->addText('Денежные обязательства', $fontStyle, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('Содержание обязательства', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('Кредитор', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('Место нахождения (место жительства) кредитора', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(120), $cellVCentered)->addText('Основание возникновения', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(145), $cellColSpan2)->addText('Сумма обязательства', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('Штрафы, пени и иные санкции', null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(120), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(70), $cellVCentered)->addText('всего', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText('в том числе задолженность', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('', null, $cellHCentered);

        $i = 1;
        foreach ($creditor as $key => $let){
            /* @var $let app\models\Creditor*/

            if($let->is_predprin == 1 && $let->group == 1){
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText("1.".$i, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText(Creditor::$commitment[$let->commitment], null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText(Creditor::$statment[$let->statment].": ".$let->name, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText($let->coutry.",".$let->region." ".$let->district." район, г.".$let->city."  ул.".$let->street." ".$let->house.",".$let->corpus." ".$let->flat.", индекс: ".$let->post_index, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(120), $cellVCentered)->addText("Основание: " .Creditor::$base[$let->base].", номер договора:".$let->base_num." , дата договора:".$let->base_date, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(70), $cellVCentered)->addText($let->sum_statment, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText($let->sum_dolg, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText($let->forfeit, null, $cellHCentered);
                $i++;
            }
        }

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('2', $fontStyle, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(660), $cellColSpan7)->addText('Обязательные платежи', $fontStyle, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(330), $cellColSpan3)->addText('Наименование налога, сбора или иного обязательного платежа', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(190), $cellColSpan2)->addText('Недоимка', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(155), $cellColSpan2)->addText('Штрафы, пени и иные санкции', null, $cellHCentered);

        $i = 1;
        foreach ($creditor as $key => $let){
            /* @var $let app\models\Creditor*/

            if($let->is_predprin == 0 && $let->group == 2){
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText("2.".$i, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(330), $cellColSpan3)->addText(Creditor::$commitment_ob[$let->commitment].": ".$let->name, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(190), $cellColSpan2)->addText($let->sum_statment, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(150), $cellColSpan2)->addText($let->forfeit, null, $cellHCentered);
                $i++;
            }
        }
        $section->addTextBreak(2);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12);
        $parStyle = array('align' => 'both','spaceBefore'=>10,'indentation' => array ('firstLine' => Converter::cmToTwip(1)));
        $section->addText(
            'Сведения о неденежных обязательствах гражданина, за исключением возникших в результате осуществления гражданином предпринимательской деятельности (в том числе о передаче имущества в собственность, выполнении работ и оказании услуг и так далее):'
            , $fontStyle,$parStyle
        );
        $section->addTextBreak(1);

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');

        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $cnt = 0;
        foreach ($creditor as $key => $let){
            /* @var $let app\models\Creditor*/
            if($let->is_predprin == 0 && $let->group == 3){
                $cnt++;
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(720), $cellVCentered)->addText($let->commitment, $fontStyle, $cellVLeft);
            }
        }
        if($cnt == 0){
            $table->addRow();
            $table->addCell(Converter::pixelToTwip(720), $cellVCentered)->addText('', $fontStyle, $cellVLeft);
        }


        /**
         *  КОНЕЦ ОТРИСОВКИ ВТОРОЙ ТАБЛИЦЫ Сведения о кредиторах гражданина
         */

        $section->addPageBreak();


        /**
         *  НАЧАЛО ОТРИСОВКИ ТРЕТЬЕЙ ТАБЛИЦЫ Сведения о кредиторах гражданина
         */
        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
        $cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');
        $cellColSpan8 = array('gridSpan' => 8, 'valign' => 'center');
        $cellColSpan7 = array('gridSpan' => 7, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(700), $cellColSpan8)->addText('II. Сведения о кредиторах гражданина (по денежным обязательствам и (или) обязанности по уплате обязательных платежей, которые возникли в результате осуществления гражданином предпринимательской деятельности)', $fontStyle, $cellHCentered);


        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('1', $fontStyle, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(665), $cellColSpan7)->addText('Денежные обязательства', $fontStyle, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('Содержание обязательства', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('Кредитор', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('Место нахождения (место жительства) кредитора', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(120), $cellVCentered)->addText('Основание возникновения', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(145), $cellColSpan2)->addText('Сумма обязательства', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('Штрафы, пени и иные санкции', null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(120), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(70), $cellVCentered)->addText('всего', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText('в том числе задолженность', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('', null, $cellHCentered);

        $i = 1;
        foreach ($creditor as $key => $let){
            /* @var $let app\models\Creditor*/

            if($let->is_predprin == 1 && $let->group == 1){
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText("1.".$i, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText(Creditor::$commitment[$let->commitment], null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText(Creditor::$statment[$let->statment].": ".$let->name, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText($let->coutry.",".$let->region." ".$let->district." район, г.".$let->city."  ул.".$let->street." ".$let->house.",".$let->corpus." ".$let->flat.", индекс: ".$let->post_index, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(120), $cellVCentered)->addText("Основание: " .Creditor::$base[$let->base].", номер договора:".$let->base_num." , дата договора:".$let->base_date, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(70), $cellVCentered)->addText($let->sum_statment, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText($let->sum_dolg, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText($let->forfeit, null, $cellHCentered);
                $i++;
            }
        }

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('2', $fontStyle, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(660), $cellColSpan7)->addText('Обязательные платежи', $fontStyle, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(330), $cellColSpan3)->addText('Наименование налога, сбора или иного обязательного платежа', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(190), $cellColSpan2)->addText('Недоимка', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(155), $cellColSpan2)->addText('Штрафы, пени и иные санкции', null, $cellHCentered);

        $i = 1;
        foreach ($creditor as $key => $let){
            /* @var $let app\models\Creditor*/

            if($let->is_predprin == 1 && $let->group == 2){
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText("2.".$i, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(330), $cellColSpan3)->addText(Creditor::$commitment_ob[$let->commitment].": ".$let->name, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(190), $cellColSpan2)->addText($let->sum_statment, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(150), $cellColSpan2)->addText($let->forfeit, null, $cellHCentered);
                $i++;
            }
        }
        $section->addTextBreak(2);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12);
        $parStyle = array('align' => 'both','spaceBefore'=>10,'indentation' => array ('firstLine' => Converter::cmToTwip(1)));
        $section->addText(
            'Сведения о неденежных обязательствах гражданина, которые возникли в результате осуществления гражданином предпринимательской деятельности (в том числе о передаче имущества в собственность, выполнении работ и оказании услуг и так далее):'
            , $fontStyle,$parStyle
        );
        $section->addTextBreak(1);

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');

        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $cnt = 0;
        foreach ($creditor as $key => $let){
            /* @var $let app\models\Creditor*/
            if($let->is_predprin == 1 && $let->group == 3){
                $cnt++;
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(720), $cellVCentered)->addText($let->commitment, $fontStyle, $cellVLeft);
            }
        }
        if($cnt == 0){
            $table->addRow();
            $table->addCell(Converter::pixelToTwip(720), $cellVCentered)->addText('', $fontStyle, $cellVLeft);
        }


        /**
         *  КОНЕЦ ОТРИСОВКИ ТРЕТЬЕЙ ТАБЛИЦЫ Сведения о кредиторах гражданина
         */

        $section->addPageBreak();


        /**
         *  НАЧАЛО ОТРИСОВКИ ЧЕТВЕРТОЙ ТАБЛИЦЫ Сведения о должниках гражданина
         */
        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
        $cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');
        $cellColSpan8 = array('gridSpan' => 8, 'valign' => 'center');
        $cellColSpan7 = array('gridSpan' => 7, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(700), $cellColSpan8)->addText('III. Сведения о должниках гражданина (по денежным обязательствам и (или) обязанности по уплате обязательных платежей, за исключением возникших в результате осуществления гражданином предпринимательской деятельности)', $fontStyle, $cellHCentered);

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('1', $fontStyle, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(665), $cellColSpan7)->addText('Денежные обязательства', $fontStyle, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('Содержание обязательства', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('Должник', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('Место нахождения (место жительства) должника', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(120), $cellVCentered)->addText('Основание возникновения', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(145), $cellColSpan2)->addText('Сумма обязательства', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('Штрафы, пени и иные санкции', null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(120), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(70), $cellVCentered)->addText('всего', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText('в том числе задолженность', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('', null, $cellHCentered);

        $i = 1;
        foreach ($debitor as $key => $let){
            /* @var $let app\models\Debitor*/

            if($let->is_predprin == 0 && $let->group == 1){
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText("1.".$i, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText(Debitor::$commitment[$let->commitment], null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText(Debitor::$statment[$let->statment].": ".$let->name, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText($let->coutry.",".$let->region." ".$let->district." район, г.".$let->city."  ул.".$let->street." ".$let->house.",".$let->corpus." ".$let->flat.", индекс: ".$let->post_index, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(120), $cellVCentered)->addText("Основание: " .Debitor::$base[$let->base].", номер договора:".$let->base_num." , дата договора:".$let->base_date, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(70), $cellVCentered)->addText($let->sum_statment, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText($let->sum_dolg, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText($let->forfeit, null, $cellHCentered);
                $i++;
            }
        }

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('2', $fontStyle, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(660), $cellColSpan7)->addText('Обязательные платежи', $fontStyle, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(330), $cellColSpan3)->addText('Наименование налога, сбора или иного обязательного платежа', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(345), $cellColSpan4)->addText('Сумма к зачету или возврату', null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(330), $cellColSpan3)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(190), $cellColSpan2)->addText('всего', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(155), $cellColSpan2)->addText('проценты', null, $cellHCentered);

        $i = 1;
        foreach ($debitor as $key => $let){
            /* @var $let app\models\Debitor*/

            if($let->is_predprin == 0 && $let->group == 2){
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText("2.".$i, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(330), $cellColSpan3)->addText($let->commitment.": ".$let->name, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(190), $cellColSpan2)->addText($let->sum_statment, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(150), $cellColSpan2)->addText($let->forfeit, null, $cellHCentered);
                $i++;
            }
        }
        $section->addTextBreak(2);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12);
        $parStyle = array('align' => 'both','spaceBefore'=>10,'indentation' => array ('firstLine' => Converter::cmToTwip(1)));
        $section->addText(
            'Сведения о неденежных обязательствах перед гражданином, за исключением возникших в результате осуществления гражданином предпринимательской деятельности (в том числе о передаче имущества в собственность, выполнении работ и оказании услуг и так далее):'
            , $fontStyle,$parStyle
        );
        $section->addTextBreak(1);

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');

        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $cnt = 0;
        foreach ($debitor as $key => $let){
            /* @var $let app\models\Debitor*/
            if($let->is_predprin == 0 && $let->group == 3){
                $cnt++;
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(720), $cellVCentered)->addText($let->commitment, $fontStyle, $cellVLeft);
            }
        }
        if($cnt == 0){
            $table->addRow();
            $table->addCell(Converter::pixelToTwip(720), $cellVCentered)->addText('', $fontStyle, $cellVLeft);
        }


        /**
         *  КОНЕЦ ОТРИСОВКИ ЧЕТВЕРТОЙ ТАБЛИЦЫ Сведения о должниках гражданина
         */


        $section->addPageBreak();


        /**
         *  НАЧАЛО ОТРИСОВКИ ПЯТОЙ ТАБЛИЦЫ Сведения о должниках гражданина
         */
        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
        $cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');
        $cellColSpan8 = array('gridSpan' => 8, 'valign' => 'center');
        $cellColSpan7 = array('gridSpan' => 7, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(700), $cellColSpan8)->addText('IV. Сведения о должниках гражданина (по денежным обязательствам и (или) обязанности по уплате обязательных платежей, которые возникли в результате осуществления гражданином предпринимательской деятельности)', $fontStyle, $cellHCentered);

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('1', $fontStyle, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(665), $cellColSpan7)->addText('Денежные обязательства', $fontStyle, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('Содержание обязательства', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('Должник', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('Место нахождения (место жительства) должника', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(120), $cellVCentered)->addText('Основание возникновения', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(145), $cellColSpan2)->addText('Сумма обязательства', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('Штрафы, пени и иные санкции', null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(120), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(70), $cellVCentered)->addText('всего', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText('в том числе задолженность', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('', null, $cellHCentered);

        $i = 1;
        foreach ($debitor as $key => $let){
            /* @var $let app\models\Debitor*/

            if($let->is_predprin == 1 && $let->group == 1){
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText("1.".$i, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText(Debitor::$commitment[$let->commitment], null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText(Debitor::$statment[$let->statment].": ".$let->name, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(110), $cellVCentered)->addText($let->coutry.",".$let->region." ".$let->district." район, г.".$let->city."  ул.".$let->street." ".$let->house.",".$let->corpus." ".$let->flat.", индекс: ".$let->post_index, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(120), $cellVCentered)->addText("Основание: " .Debitor::$base[$let->base].", номер договора:".$let->base_num." , дата договора:".$let->base_date, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(70), $cellVCentered)->addText($let->sum_statment, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText($let->sum_dolg, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText($let->forfeit, null, $cellHCentered);
                $i++;
            }
        }

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('2', $fontStyle, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(660), $cellColSpan7)->addText('Обязательные платежи', $fontStyle, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(330), $cellColSpan3)->addText('Наименование налога, сбора или иного обязательного платежа', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(345), $cellColSpan4)->addText('Сумма к зачету или возврату', null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(330), $cellColSpan3)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(190), $cellColSpan2)->addText('всего', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(155), $cellColSpan2)->addText('проценты', null, $cellHCentered);

        $i = 1;
        foreach ($debitor as $key => $let){
            /* @var $let app\models\Debitor*/

            if($let->is_predprin == 1 && $let->group == 2){
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText("2.".$i, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(330), $cellColSpan3)->addText($let->commitment.": ".$let->name, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(190), $cellColSpan2)->addText($let->sum_statment, null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(150), $cellColSpan2)->addText($let->forfeit, null, $cellHCentered);
                $i++;
            }
        }
        $section->addTextBreak(2);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12);
        $parStyle = array('align' => 'both','spaceBefore'=>10,'indentation' => array ('firstLine' => Converter::cmToTwip(1)));
        $section->addText(
            'Сведения о неденежных обязательствах перед гражданином, которые возникли в результате осуществления гражданином предпринимательской деятельности (в том числе о передаче имущества в собственность, выполнении работ и оказании услуг и так далее):'
            , $fontStyle,$parStyle
        );
        $section->addTextBreak(1);

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');

        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $cnt = 0;
        foreach ($debitor as $key => $let){
            /* @var $let app\models\Debitor*/
            if($let->is_predprin == 1 && $let->group == 3){
                $cnt++;
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(720), $cellVCentered)->addText($let->commitment, $fontStyle, $cellVLeft);
            }
        }
        if($cnt == 0){
            $table->addRow();
            $table->addCell(Converter::pixelToTwip(720), $cellVCentered)->addText('', $fontStyle, $cellVLeft);
        }


        /**
         *  КОНЕЦ ОТРИСОВКИ ПЯТОЙ ТАБЛИЦЫ Сведения о должниках гражданина
         */


        $section->addTextBreak(4);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12);
        $parStyle = array('align' => 'both','spaceBefore'=>10,'indentation' => array ('firstLine' => Converter::cmToTwip(1)));
        $section->addText(
            'Достоверность и полноту настоящих сведений подтверждаю.'
            , $fontStyle,$parStyle
        );
        $section->addTextBreak(1);

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');
        $table->addRow();
        $table->addCell(Converter::pixelToTwip(20), $cellVCentered)->addText('«', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(20), $cellVCentered)->addText('»', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(40), $cellVCentered)->addText('20', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(30), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('г.', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(140), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(10), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(210), $cellVCentered)->addText('', null, $cellHCentered);

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>7,'italic'=> TRUE);
        $table->addCell(Converter::pixelToTwip(20), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(20), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(40), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(30), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(140), $cellVCentered)->addText('(подпись гражданина)', $fontStyle, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(10), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(210), $cellVCentered)->addText('(расшифровка подписи)', $fontStyle, $cellHCentered);



        $file = Docx::createEmptyDocxFile(80, 'creditor_docx');
       // print_r($file);die();
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('web/upload/80/user_docs/creditor_docx.docx');

        Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
// Any writable directory here. It will be ignored.
        Settings::setPdfRendererPath('.');

        $phpWord = IOFactory::load($file, 'Word2007');
        $file = Pdf::createEmptyPdfFile(80, 'creditor_pdf');
        $phpWord->save($file, 'PDF');

    }

    public function actionPropertyDocx($id = 80){
        $client_ticket = ClientTicket::findOne($id);
        $passport = $client_ticket->passportByTicket;
        $property = $client_ticket->propertyByTicket;
        $bank = $client_ticket->bankByTicket;
        $shares = $client_ticket->sharesByTicket;
        $other_shares = $client_ticket->otherSharesByTicket;
        $valuable_property = $client_ticket->valuablePropertyByTicket;


        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(12);


        $sectionStyle = array(
            'orientation' => 'landscape',
            'marginTop' => Converter::pixelToTwip(60),
            'marginLeft' => Converter::pixelToTwip(70),
            'marginRight' => Converter::pixelToTwip(30),
            'colsNum' => 1,
            'pageNumberingStart' => 1,
            'borderBottomSize'=>100,
        );

        $section = $phpWord->addSection($sectionStyle);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align'=>'right','spaceBefore'=>10);
        $section->addText(
            'Приложение № 2'
            , $fontStyle,$parStyle
        );
        $section->addText(
            'к приказу Минэкономразвития России'
            , $fontStyle,$parStyle
        );
        $section->addText(
            'от 5 августа 2015 г. № 530'
            , $fontStyle,$parStyle
        );

        $section->addTextBreak(3); // перенос строки
        $fontStyle = array('name'=>'Times New Roman', 'size'=>14, 'bold'=>TRUE);
        $parStyle = array('align'=>'center','spaceBefore'=>10);
        $section->addText(
            'Опись имущества гражданина'
            , $fontStyle,$parStyle
        );

        $section->addTextBreak(3); // перенос строки

        /**
         *  НАЧАЛО ОТРИСОВКИ ПЕРВОЙ ТАБЛИЦЫ ИНФОРМАЦИЯ О ГРАЖДАНИНИЕ
         */
        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
        $cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');
        $cellColSpan4 = array('gridSpan' => 4, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(720), $cellColSpan3)->addText('Информация о гражданине', $fontStyle, $cellHCentered);

        $column_1 = 250;
        $column_2 = 150;
        $column_3 = 320;

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('фамилия', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->surname, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('имя', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->name, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('отчество', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->patronymic, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('в случае изменения фамилии, имени, отчества указать прежние фамилии, имена, отчества', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->changed_fio, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('дата рождения', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->birthday, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('место рождения', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->birth_place, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('СНИЛС', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->snils, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('ИНН', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->inn, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(720), $cellColSpan3)->addText('документ, удостоверяющий личность', null, $cellVLeft);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('вид документа', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText('паспорт', null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('серия (при наличии) и номер', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($passport->series." ".$passport->number, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip(720), $cellColSpan3)->addText('адрес регистрации по месту жительства в Российской Федерации', null, $cellVLeft);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('субъект Российской Федерации', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->region, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('район', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->district, null, $cellHCentered);

        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('город', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->city, null, $cellHCentered);
        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('населенный пункт (село, поселок и так далее)', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->selo, null, $cellHCentered);
        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('улица (проспект, переулок и так далее)', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->street, null, $cellHCentered);
        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('номер дома (владения)', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->house, null, $cellHCentered);
        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('номер корпуса (строения)', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->corpuse, null, $cellHCentered);
        $table->addRow();
        $table->addCell(Converter::pixelToTwip($column_1), $cellVCentered)->addText('номер квартиры (офиса)', null, $cellVLeft);
        $table->addCell(Converter::pixelToTwip($column_2), $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip($column_3), $cellVCentered)->addText($client_ticket->house, null, $cellHCentered);


        /**
         *  КОНЕЦ ОТРИСОВКИ ПЕРВОЙ ТАБЛИЦЫ ИНФОРМАЦИЯ О ГРАЖДАНИНИЕ
         */

        $section->addPageBreak();

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
        $cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');
        $cellColSpan8 = array('gridSpan' => 8, 'valign' => 'center');
        $cellColSpan7 = array('gridSpan' => 7, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(700), $cellColSpan8)->addText('I. Недвижимое имущество', $fontStyle, $cellHCentered);


        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(180), $cellColSpan2)->addText('Вид и наименование имущества', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(60), $cellVCentered)->addText('Вид собственности', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText('Местонахождение (адрес)', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText('Площадь (кв. м)', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('Основание приобретения и стоимость', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('Сведения о залоге и залогодержателе', null, $cellHCentered);

        $k = 1;
        while($k < 6){
            $i = 1;
            $table->addRow();
            $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('1.'.$k, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(180), $cellColSpan2)->addText(Property::$property_type[$k], null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(60), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);

            foreach($property as $prop){
                if($prop->property_type == $k && $prop->group == 1){
                    $table->addRow();
                    $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('', null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(30), $cellVCentered)->addText($i.')', null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(150), $cellVCentered)->addText($prop->active_name, null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(60), $cellVCentered)->addText(Property::$property_view[$prop->property_view], null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText($prop->coutry.",".$prop->region." ".$prop->district." район, г.".$prop->city."  ул.".$prop->street." ".$prop->house.",".$prop->corpus." ".$prop->office, null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText($prop->square, null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText("Основание:".$prop->own_dogovor." , стоимость-".$prop->cost, null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText("Договор №".$prop->zalog_dogovor.", Залогодержатель:".Property::$zalog[$prop->zalog].", Имя залогодержателя:".$prop->zalog_name.", ИНН залогодержателя:".$prop->zalog_inn, null, $cellHCentered);
                    $i++;
                }
            }
            if($i == 1){
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(30), $cellVCentered)->addText($i.')', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(150), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(60), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
            }
            $k++;
        }

        $section->addTextBreak(2); // перенос строки

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan8 = array('gridSpan' => 8, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(700), $cellColSpan8)->addText('II. Движимое имущество', $fontStyle, $cellHCentered);


        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(180), $cellColSpan2)->addText('Вид, марка, модель транспортного средства, год изготовления', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(60), $cellVCentered)->addText('Идентификационный номер', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('Вид собственности', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('Место нахождения/место хранения (адрес)', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('Стоимость', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(135), $cellVCentered)->addText('Сведения о залоге и залогодержателе', null, $cellHCentered);



        $k = 1;
        while($k < 8){
            $i = 1;
            $table->addRow();
            $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('2.'.$k, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(180), $cellColSpan2)->addText(Property::$property_type_dvizh[$k], null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(60), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(135), $cellVCentered)->addText('', null, $cellHCentered);

            foreach($property as $prop){
                if($prop->property_type == $k && $prop->group == 2){
                    $table->addRow();
                    $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('', null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(30), $cellVCentered)->addText($i.')', null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(150), $cellVCentered)->addText($prop->active_name, null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(60), $cellVCentered)->addText($prop->vin_number, null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText(Property::$property_view[$prop->property_view], null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText($prop->coutry.",".$prop->region." ".$prop->district." район, г.".$prop->city."  ул.".$prop->street." ".$prop->house.",".$prop->corpus." ".$prop->office, null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText($prop->cost, null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(135), $cellVCentered)->addText("Договор №".$prop->zalog_dogovor.", Залогодержатель:".Property::$zalog[$prop->zalog].", Имя залогодержателя:".$prop->zalog_name.", ИНН залогодержателя:".$prop->zalog_inn, null, $cellHCentered);
                    $i++;
                }
            }
            if($i == 1){
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(30), $cellVCentered)->addText($i.')', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(150), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(60), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(135), $cellVCentered)->addText('', null, $cellHCentered);
            }
            $k++;
        }


        $section->addTextBreak(2); // перенос строки

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan5 = array('gridSpan' => 5, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(700), $cellColSpan5)->addText('III. Сведения о счетах в банках и иных кредитных организациях', $fontStyle, $cellHCentered);


        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(300), $cellVCentered)->addText('Наименование и адрес банка или иной кредитной организации', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(155), $cellVCentered)->addText('Вид и валюта счета', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('Дата открытия счета', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('Остаток на счете (руб.)', null, $cellHCentered);

        $i = 1;
        foreach($bank as $let){
            $table->addRow();
            $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('3.'.$i, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(300), $cellVCentered)->addText($let->name.", ".$let->post_address, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(155), $cellVCentered)->addText("Вид счета: ".Bank::$type[$let->type].", валюта счета:".Bank::$currency[$let->currency]." ,номер счета:".$let->number, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText($let->date_open, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText($let->balance, null, $cellHCentered);
            $i++;
        }
        if($i == 1){
            $table->addRow();
            $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('3.'.$i, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(300), $cellVCentered)->addText(''.$let->name.", ".$let->post_address, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(155), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
        }

        $section->addTextBreak(2); // перенос строки


        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan6 = array('gridSpan' => 6, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(700), $cellColSpan6)->addText('IV. Акции и иное участие в коммерческих организациях', $fontStyle, $cellHCentered);


        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(200), $cellVCentered)->addText('Наименование и организационно-правовая форма организации', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(200), $cellVCentered)->addText('Местонахождение организации (адрес)', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('Уставный, складочный капитал, паевый фонд (руб.)', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText('Доля участия', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('Основание участия', null, $cellHCentered);

        $i = 1;
        foreach($shares as $let){
            $table->addRow();
            $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('4.'.$i, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(200), $cellVCentered)->addText("Наименование:".$let->name.", ИНН общества:".$let->inn, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(200), $cellVCentered)->addText($let->location, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText($let->company_capital, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText($let->share, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText("Номер договора участия:".$let->dogovor_number." , дата договора:".$let->date, null, $cellHCentered);
            $i++;
        }
        if($i == 1){
            $table->addRow();
            $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('4.'.$i, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(200), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(200), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);

        }

        $section->addTextBreak(2); // перенос строки


        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan6 = array('gridSpan' => 6, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(700), $cellColSpan6)->addText('V. Иные ценные бумаги', $fontStyle, $cellHCentered);


        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(200), $cellVCentered)->addText('Вид ценной бумаги', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(200), $cellVCentered)->addText('Лицо, выпустившее ценную бумагу', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('Номинальная величина обязательства (руб.)', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText('Общее количество', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('Общая стоимость (руб.)', null, $cellHCentered);

        $i = 1;
        foreach($other_shares as $let){

            $table->addRow();
            $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('5.'.$i, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(200), $cellVCentered)->addText(OtherShares::$type[$let->type], null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(200), $cellVCentered)->addText($let->creater, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText($let->nominal_cost, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText($let->total_count, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText($let->total_count*$let->nominal_cost, null, $cellHCentered);
            $i++;
        }
        if($i == 1){
            $table->addRow();
            $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('5.'.$i, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(200), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(200), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(80), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(75), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);

        }


        $section->addTextBreak(2); // перенос строки

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan6 = array('gridSpan' => 6, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        $table->addCell(Converter::pixelToTwip(700), $cellColSpan6)->addText('VI. Сведения о наличных денежных средствах и ином ценном имуществе', $fontStyle, $cellHCentered);


        $table->addRow();
        $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('№ п/п', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(175), $cellColSpan2)->addText('Вид и наименование имущества', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText('Стоимость (сумма и валюта)', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText('Место нахождения/место хранения (адрес)', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText('Сведения о залоге и залогодержателе', null, $cellHCentered);


        $k = 1;
        while($k < 6){
            $i = 1;
            $table->addRow();
            $table->addCell(Converter::pixelToTwip(35), $cellVCentered)->addText('6.'.$k, null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(140), $cellColSpan2)->addText(ValuableProperty::$property_type[$k], null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText('', null, $cellHCentered);
            $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText('', null, $cellHCentered);

            foreach($valuable_property as $prop){
                if($prop->property_type == $i){
                    $table->addRow();
                    $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('', null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(35), $cellVCentered)->addText($i.")", null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(140), $cellVCentered)->addText($prop->name, null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText($prop->cost, null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText($prop->location == 1 ? "Место хранения: ".ValuableProperty::$location[$prop->location].", адресс:".$prop->coutry.",".$prop->region." ".$prop->district." район, г.".$prop->city."  ул.".$prop->street." ".$prop->house.",".$prop->corpus." ".$prop->office : "Место хранения: Банковская ячейка. Кредитная организация:".$prop->org_name." , номер договора:".$prop->dogovor_number." ,дата договора:".$prop->dogovor_date, null, $cellHCentered);
                    $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText("Договор №".$prop->zalog_dogovor.", Залогодержатель:".ValuableProperty::$zalog_type[$prop->zalog_type].", Имя залогодержателя:".$prop->zalog_name.", ИНН залогодержателя:".$prop->zalog_inn, null, $cellHCentered);
                    $i++;
                }
            }
            if($i == 1){
                $table->addRow();
                $table->addCell(Converter::pixelToTwip(45), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(35), $cellVCentered)->addText($i.")", null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(140), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText('', null, $cellHCentered);
                $table->addCell(Converter::pixelToTwip(160), $cellVCentered)->addText('', null, $cellHCentered);
            }
            $k++;
        }

        $section->addTextBreak(4);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>12);
        $parStyle = array('align' => 'both','spaceBefore'=>10,'indentation' => array ('firstLine' => Converter::cmToTwip(1)));
        $section->addText(
            'Достоверность и полноту настоящих сведений подтверждаю.'
            , $fontStyle,$parStyle
        );
        $section->addTextBreak(1);

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');
        $table->addRow();
        $table->addCell(Converter::pixelToTwip(20), $cellVCentered)->addText('«', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(20), $cellVCentered)->addText('»', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(40), $cellVCentered)->addText('20', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(30), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('г.', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(140), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(10), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(210), $cellVCentered)->addText('', null, $cellHCentered);

        $table->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>7,'italic'=> TRUE);
        $table->addCell(Converter::pixelToTwip(20), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(50), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(20), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(40), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(30), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(100), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(140), $cellVCentered)->addText('(подпись гражданина)', $fontStyle, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(10), $cellVCentered)->addText('', null, $cellHCentered);
        $table->addCell(Converter::pixelToTwip(210), $cellVCentered)->addText('(расшифровка подписи)', $fontStyle, $cellHCentered);







        $file = Docx::createEmptyDocxFile(80, 'property_docx');
        // print_r($file);die();
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save("property.docx");


    }

    public function actionTest(){
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(12);


        $sectionStyle = array(
            'orientation' => 'landscape',
            'marginTop' => Converter::pixelToTwip(60),
            'marginLeft' => Converter::pixelToTwip(70),
            'marginRight' => Converter::pixelToTwip(30),
            'colsNum' => 1,
            'pageNumberingStart' => 1,
            'borderBottomSize'=>100,
        );

        $section = $phpWord->addSection($sectionStyle);

        $styleTable = array('borderSize' => 8, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $cellVTop = array('valign' => 'top');
        $cellVLeft = array('align' => 'left');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');
        $table->addRow();
        $table->addCell(Converter::pixelToTwip(190), $cellVCentered)->addText('Извещение', null, $cellHCentered);
        $right = $table->addCell(Converter::pixelToTwip(510), $cellVCentered);

        $right->addTextBreak(0.5);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'both','spaceBefore'=>10,'borderBottomSize' => 10);
        $right->addText(
            'УФК по Магаданской области г. Магадан (Управление Федеральной налоговой службы по Магаданской области, л/с 04471240580)'
            , $fontStyle,$parStyle
        );
        $right->addTextBreak(0.5);
        $right->addTextBreak(0.5);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'center','spaceBefore'=>10);
        $right->addText(
            '(наименование получателя платежа)'
            , $fontStyle,$parStyle
        );
        $right->addTextBreak(0.5);
        $table2 = $right->addTable('Colspan Rowspan');

        $cellColSpan3 = array('gridSpan' => 3, 'valign' => 'top','spaceAfter' => 0,'spaceBefore' => 0);
        $table2->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'left','borderSize' => 10,'spaceAfter' => Converter::pixelToTwip(10),'spaceBefore' => Converter::pixelToTwip(20));
        $table2->addCell(Converter::pixelToTwip(155), $cellVCentered)->addText('4909007152', $fontStyle, $parStyle);
        $table2->addCell(Converter::pixelToTwip(155), $cellVCentered)->addText('490901001 ', $fontStyle, $parStyle);
        $table2->addCell(Converter::pixelToTwip(180), $cellVCentered)->addText('03100643000000014700', $fontStyle, $parStyle);

        $table2->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'center');
        $table2->addCell(Converter::pixelToTwip(155), $cellVCentered)->addText('(ИНН получателя платежа) ', $fontStyle, $parStyle);
        $table2->addCell(Converter::pixelToTwip(155), $cellVCentered)->addText('(КПП получателя платежа) ', $fontStyle, $parStyle);
        $table2->addCell(Converter::pixelToTwip(180), $cellVCentered)->addText('(номер счета получателя платежа)', $fontStyle, $parStyle);

        $table2->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'center');
        $test = $table2->addCell(Converter::pixelToTwip(500), $cellColSpan3);
        $table3 = $test->addTable('Colspan Rowspan');

//        $table3 = $right->addTable();
//
        $table3->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'left');
        $table3->addCell(Converter::pixelToTwip(20), $cellVCentered)->addText(' В ', $fontStyle, $parStyle);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>7);
        $parStyle = array('align' => 'left','borderBottomSize' => 10);
        $table3->addCell(Converter::pixelToTwip(240), $cellVCentered)->addText('ОТДЕЛЕНИЕ МАГАДАН БАНКА РОССИИ//УФК по Магаданской области г. Магадан ', $fontStyle, $parStyle);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'left');
        $table3->addCell(Converter::pixelToTwip(40), $cellVCentered)->addText('БИК', $fontStyle, $parStyle);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'left','borderSize' => 10);
        $table3->addCell(Converter::pixelToTwip(180), $cellVCentered)->addText('014442501', $fontStyle, $parStyle);

        $table3->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'center','valign' => 'top');
        $table3->addCell(Converter::pixelToTwip(20), $cellVCentered)->addText('', $fontStyle, $parStyle);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>7);
        $parStyle = array('align' => 'center','spaceBefore'=>10);
        $table3->addCell(Converter::pixelToTwip(240), $cellVCentered)->addText('(наименование банка получателя платежа)', $fontStyle, $parStyle);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'left','valign' => 'top');
        $table3->addCell(Converter::pixelToTwip(40), $cellVCentered)->addText('', $fontStyle, $parStyle);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'left');
        $table3->addCell(Converter::pixelToTwip(180), $cellVCentered)->addText('', $fontStyle, $parStyle);


        $table2->addRow();
        $test = $table2->addCell(Converter::pixelToTwip(500), $cellColSpan3);
        $table4 = $test->addTable('Colspan Rowspan');

        $table4->addRow();
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'center','spaceAfter' => 0);
        $table4->addCell(Converter::pixelToTwip(60), $cellVTop)->addText('Кор./сч.', $fontStyle, $parStyle);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'left','borderSize' => 10,'spaceAfter' => 0);
        $table4->addCell(Converter::pixelToTwip(160), $cellVTop)->addText('40102810945370000040', $fontStyle, $parStyle);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'left','spaceAfter' => 0);
        $table4->addCell(Converter::pixelToTwip(80), $cellVTop)->addText('Код ОКТМО', $fontStyle, $parStyle);
        $fontStyle = array('name'=>'Times New Roman', 'size'=>8);
        $parStyle = array('align' => 'left','borderSize' => 10,'spaceAfter' => 0);
        $table4->addCell(Converter::pixelToTwip(180), $cellVTop)->addText('44701000', $fontStyle, $parStyle);






        //$file = Docx::createEmptyDocxFile(80, 'test.docx');
        // print_r($file);die();
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save("test.docx");

    }

    public function actionTest2($id = 80){
        setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
        $client_ticket = ClientTicket::findOne($id);
        if(!$client_ticket){
            return false;
        }
        $region = $client_ticket->region;

        $result = CpoDirectory::find()->where(['region' => $region])->one();

        if(!$result){
            return false;
        }

        $PHPWord = new PHPWord();

        $document = $PHPWord->loadTemplate('web/sample/sample.docx'); //шаблон

        $document->setValue('recipient', $result->recipient); //номер договора

        $document->setValue('recipient_inn', $result->recipient_inn); //дата договора

        $document->setValue('recipient_kpp', $result->recipient_kpp); //фамилия

        $document->setValue('checking_account', $result->checking_account);// имя

        $document->setValue('bank', $result->bank);// отчество

        $document->setValue('bik', $result->bik); //дата договора

        $document->setValue('correspondent_account', $result->correspondent_account); //фамилия

        $document->setValue('oktmo', $result->oktmo);// имя

        $document->setValue('payment_name', $result->payment_name);// отчество

        $document->setValue('kbk', $result->kbk); //фамилия

        $document->setValue('fio', $client_ticket->surname." ".$client_ticket->name." ".$client_ticket->patronymic);// имя

        $document->setValue('address', "г. ".$client_ticket->city.", ул.".$client_ticket->street.", д.".$client_ticket->house." ".($client_ticket->corpuse ? "корп.".$client_ticket->surname : "")." кв.".$client_ticket->flat);// отчество

        $document->setValue('date', "«".date("d")."» ".strftime("%B")." ".date("Y"));// отчество



//        $upload = Upload::find()->where(['model_id' => $id])->andWhere(['model' => 'user_docs'])->andWhere(['name' => 'sample_docx'])->one();
//        if(!$upload)
//            $upload = new Upload();
//        $upload->model = "user_docs";
//        $upload->model_id = $id;
//        $upload->origin = "Квитанция на оплату";
//        $upload->name = "sample_docx";
//        $upload->folder = "user_docs";
//        $upload->ext = "docx";
//        $upload->user_id = Yii::$app->user->id;
//        $upload->created_at = time();
//        $upload->save();

        $file = Docx::createEmptyDocxFile($id, 'sample_docx');
        $document->saveAs($file); //имя заполненного

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
//
//        $rendererName = Settings::PDF_RENDERER_DOMPDF;
//        $rendererLibraryPath = realpath('/../vendor/dompdf/dompdf');
//        Settings::setPdfRenderer($rendererName, $rendererLibraryPath);
//
//        \PhpOffice\PhpWord\Settings::setPdfRendererPath('path/to/tcpdf');
//        \PhpOffice\PhpWord\Settings::setPdfRendererName('TCPDF');
//
//        //Load temp file
//        $phpWord = \PhpOffice\PhpWord\IOFactory::load($file);
//
////Save it
//        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
//        $xmlWriter->save('result.pdf');


        define('PHPWORD_BASE_DIR', realpath(__DIR__));

        $domPdfPath = realpath(PHPWORD_BASE_DIR . '/../vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

//Load temp file
        $phpWord = \PhpOffice\PhpWord\IOFactory::load("web/upload/80/user_docs/sample_docx.docx");

//Save it
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'HTML');
        $xmlWriter->save('result.HTML');
    }


}
