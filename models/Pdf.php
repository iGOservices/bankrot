<?php

namespace app\models;

use Yii;


class Pdf extends \yii\db\ActiveRecord
{
    /**
     * Формируем пустой исходный файл
     * @param $id
     * @param $file
     * @throws \Mpdf\MpdfException
     */
    public static function createEmptyPdfFile($id, $file){
        $dir = 'upload/'. $id . '/pdf/';
        if(!is_dir($dir))
            mkdir($dir, 0777, true);
        file_put_contents($dir. $file .'.pdf', '');

        return $dir. $file .'.pdf';
    }


}
