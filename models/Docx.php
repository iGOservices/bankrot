<?php

namespace app\models;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use Yii;
use yii\helpers\ArrayHelper;


class Docx extends \yii\db\ActiveRecord
{
    /**
     * Создаем пустой файл, чтоб записать в него в будущем содержимое
     * @param $id
     * @param $file
     * @return string
     *
     */
    public static function createEmptyDocxFile($id, $file){
        $dir = 'upload/'. $id . '/user_docs/';
        if(!is_dir($dir))
            mkdir($dir, 0777, true);
        file_put_contents($dir. $file .'.docx', '');

        return $dir. $file .'.docx';
    }

    /**
     *  Создаем docx по кредиторам и должникам гражданина
     * @param $id
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public static function createCreditorDocx($id){
        $client_ticket = ClientTicket::findOne($id);
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


        $upload = Upload::find()->where(['model_id' => $id])->andWhere(['model' => 'user_docs'])->andWhere(['name' => 'creditor_docx'])->one();
        if(!$upload)
            $upload = new Upload();
        $upload->model = "user_docs";
        $upload->model_id = $id;
        $upload->origin = "Список кредиторов и должников гражданина(docx)";
        $upload->name = "creditor_docx";
        $upload->folder = "user_docs";
        $upload->ext = "docx";
        $upload->user_id = Yii::$app->user->id;
        $upload->created_at = time();
        $upload->save();

        $file = self::createEmptyDocxFile($id, 'creditor_docx');
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($file);



    }

    /**
     *  Создаем docx по имуществу гражданина
     * @param $id
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public static function createPropertyDocx($id){
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


        $upload = Upload::find()->where(['model_id' => $id])->andWhere(['model' => 'user_docs'])->andWhere(['name' => 'property_docx'])->one();
        if(!$upload)
            $upload = new Upload();
        $upload->model = "user_docs";
        $upload->model_id = $id;
        $upload->origin = "Опись имущества гражданина(docx)";
        $upload->name = "property_docx";
        $upload->folder = "user_docs";
        $upload->ext = "docx";
        $upload->user_id = Yii::$app->user->id;
        $upload->created_at = time();
        $upload->save();

        $file = self::createEmptyDocxFile($id, 'property_docx');
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($file);
    }


    public static function  createPaymentSample($id){
        //setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
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

        $document->setValue('date', "«".date("d")."»  ".date("Y"));// отчество



        $upload = Upload::find()->where(['model_id' => $id])->andWhere(['model' => 'user_docs'])->andWhere(['name' => 'sample_docx'])->one();
        if(!$upload)
            $upload = new Upload();
        $upload->model = "user_docs";
        $upload->model_id = $id;
        $upload->origin = "Квитанция на оплату(docx)";
        $upload->name = "sample_docx";
        $upload->folder = "user_docs";
        $upload->ext = "docx";
        $upload->user_id = Yii::$app->user->id;
        $upload->created_at = time();
        $upload->save();

        $file = self::createEmptyDocxFile($id, 'property_docx');
        $document->saveAs($file); //имя заполненного
    }
}
