<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Directory;
use app\models\User;
use Codeception\Lib\Di;
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

        print("Заненсено {$count} строк");
    }

}
