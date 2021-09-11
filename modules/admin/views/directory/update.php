<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Directory */


if($model->id == 1){
    $this->title = 'Раздел: Заполнение и формирование документов для обращения в суд ';
}elseif($model->id == 2){
    $this->title = 'Банкротство под ключ ';
}else{
    $this->title = 'Услуги арбитражных управляющих';
}
$this->params['breadcrumbs'][] = ['label' => 'Справочник полей ввода', 'url' => ['directory-list']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view' , 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="directory-update">

    <h3>Редактирование</h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
