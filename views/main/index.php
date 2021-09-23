
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientTicket */
/* @var $passport_model app\models\Passport */
/* @var $inter_passport_model app\models\Passport */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm app\models\UploadForm */
/* @var $directory app\models\Directory */

/* @var $family app\models\Family */
/* @var $creditor app\models\Creditor */
/* @var $debitor app\models\Debitor */
/* @var $property app\models\Property */
/* @var $bank app\models\Bank */
/* @var $shares app\models\Shares */
/* @var $other_shares app\models\OtherShares */
/* @var $valuable_property app\models\ValuableProperty */
/* @var $deal app\models\Deal */
/* @var $nalog app\models\Nalog */
/* @var $enforce_proc app\models\EnforceProc */
/* @var $other app\models\Other */

/* @var $brak app\models\Brak */
/* @var $razvod app\models\Razvod */

/* @var $proxy app\models\Proxy */

/* @var $ticket app\models\TicketStatus */
?>

<div class="dashboard-content-inner" >
	<!-- Dashboard Headline -->
	<div class="dashboard-headline">
		<h3>Заполнение новой услуги </h3>
<!--        <p>-->
<!--            --><?//= Html::a('export pdf', ['/pdf/creditor'], ['class' => 'btn btn-success']) ?>
<!--        </p>-->

		<!-- Breadcrumbs -->
		<nav id="breadcrumbs" class="dark">
			<ul>
				<li><a href="/main/tickets">Список моих услуг</a></li>
				<li>Заполнение новой услуги</li>
			</ul>
		</nav>
	</div>
	
	<!-- Row -->
	<div class="row">

		<!-- Dashboard Box -->
		<div class="col-xl-12">
			<div class="dashboard-box margin-top-0">

				<!-- Headline -->
				<div class="headline">
					<h3>
						<i class="icon-feather-folder-plus"></i>
						Заполнение формы
                        <input hidden id="ticket_id" value="<?=$model->id?>">
					</h3>
              		<!-- Circles which indicates the steps of the form: -->
              		<div style="text-align:center">
                        <span class="step"></span>
                    	<span class="step"></span>
                    	<span class="step"></span>
                    	<span class="step"></span>
                    	<span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>

                  	</div>
				</div>

				<div class="content with-padding padding-bottom-10">

                    <div class="tab">

                        <div class="checkbox">
                            <input type="checkbox" id="chekcbox1" checked="">
                            <label for="chekcbox1"><span class="checkbox-icon"></span>Согласие на использование и обработку персональных данных</label>
                        </div>
                        <br>
                        <div class="checkbox">
                            <input type="checkbox" id="chekcbox2" checked="">
                            <label for="chekcbox2"><span class="checkbox-icon"></span>Ответственность за непредставление или представление заведомо недостоверных и неполных сведений возлагается  на пользователя</label>
                        </div>
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="checkBoxes();" style="margin-right:5px;">Далее<span class="icon-material-outline-keyboard-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <?= $this->render('_client_main_info',[
                            'passport_model' => $passport_model,
                            'inter_passport_model' => $inter_passport_model,
                            'model' => $model,
                            'uploadForm' => $uploadForm,
                            'directory' => $directory,
                            //'form' => $form,
                        ]);?>
                     </div>

                    <div class="tab">

                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_family" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить Родственника
                        </a>

                        <?if(!$family):?>
                            <p>Если родственные отношения отстуствуют, то нажмите далее</p>
                        <?endif;?>

                        <?$form = ActiveForm::begin([
                            'id' => 'family',
                            'action' => '/family/save-model',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false,
                            'options' => ['enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'options' => [
                                    'class' => 'form-group row'
                                ]]]);?>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="family-accordion">
                            <?if($family):?>
                                <?foreach ($family as $key => $item):?>
                                    <?= $this->render('/family/_new_family',
                                        ['form' => $form,
                                            'family' => $item,
                                            'uploadForm' => $uploadForm,
                                            'increment' => $key,
                                            'directory' => $directory,
                                            'model' => $model,
                                        ]);?>
                                    <?$family_i = $key+1?>
                                <?endforeach;?>
                            <?endif;?>
                        </div>
                        <input id="family-point" hidden value="<?=isset($family_i) ? $family_i : 0?>">
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                                </div>
                            </div>
                        </div>

                        <?php ActiveForm::end(); ?>
                        <!-- Accordion / End -->

                    </div>

                    <div class="tab">
                        <input id="sp-point" hidden value="0">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_sp" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить Семейное положение
                        </a>

                        <?if(!$brak):?>
                            <p>Если семейное положение отсутствует, то нажмите далее</p>
                        <?endif;?>

                        <?$form = ActiveForm::begin([
                            'id' => 'sp',
                            'action' => '/family/save-model-sp',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false,
                            'options' => ['enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'options' => [
                                    'class' => 'form-group row'
                                ]]]);?>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="sp-accordion">
                            <?if($brak):?>
                                <?foreach ($brak as $key => $item):
                                    $razv2 = null;?>
                                    <?foreach ($razvod as $key2 => $razv){
                                        if($key2 == $key){
                                            $razv2 = $razv;
                                        }
                                    }?>
                                    <?= $this->render('/family/_new_sp',
                                        ['form' => $form,
                                            'brak' => $item,
                                            'razvod' => isset($razv2) ? $razv2 : null,
                                            'uploadForm' => $uploadForm,
                                            'increment' => $key,
                                            'directory' => $directory,
                                            'model' => $model,
                                        ]);?>
                                    <?$sp_i = $key+1?>
                                <?endforeach;?>
                            <?endif;?>
                        </div>
                        <input id="sp-point" hidden value="<?=isset($sp_i) ? $sp_i : 0?>">
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                                </div>
                            </div>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>

                <!-- One "tab" for each step in the form: -->
				<div class="tab">
                    <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                    <a href="#" id="add_creditor" class="button ripple-effect">
                        <i class="icon-material-outline-add-circle-outline"></i>Добавить кредитора
                    </a>

                    <?if(!$creditor):?>
                        <p>Если кредиторы отсутствуют, то нажмите далее</p>
                    <?endif;?>

                    <!-- Accordion -->
                    <?$form = ActiveForm::begin([
                        'id' => 'creditor',
                        'action' => '/creditor/save-model',
                        'enableClientValidation' => true,
                        'enableAjaxValidation' => false,
                        'options' => ['enctype' => 'multipart/form-data'],
                        'fieldConfig' => [
                            'options' => [
                                'class' => 'form-group row'
                            ]]]);?>
                    <!-- Accordion -->
                    <div class="accordion js-accordion" id="creditor-accordion">
                        <?if($creditor):?>
                            <?foreach ($creditor as $key => $item):?>
                                <?= $this->render('/creditor/_new_creditor',
                                    ['form' => $form,
                                        'creditor' => $item,
                                        'uploadForm' => $uploadForm,
                                        'increment' => $key,
                                        'directory' => $directory,
                                        'model' => $model,
                                    ]);?>
                                <?$creditor_i = $key+1?>
                            <?endforeach;?>
                        <?endif;?>
                    </div>
                    <input id="creditor-point" hidden value="<?=isset($creditor_i) ? $creditor_i : 0?>">
                    <div class="row" style="margin-top:30px;">
                        <div class="center-block">
                            <div class="row" >
                                <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>

				</div>



                  <div class="tab">
                      <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                      <a href="#" id="add_debitor" class="button ripple-effect">
                          <i class="icon-material-outline-add-circle-outline"></i>Добавить дебитора
                      </a>

                      <?if(!$debitor):?>
                          <p>Если дебиторы отсутсвуют, то нажмите далее</p>
                      <?endif;?>


                      <!-- Accordion -->
                      <?$form = ActiveForm::begin([
                          'id' => 'debitor',
                          'action' => '/debitor/save-model',
                          'enableClientValidation' => true,
                          'enableAjaxValidation' => false,
                          'options' => ['enctype' => 'multipart/form-data'],
                          'fieldConfig' => [
                              'options' => [
                                  'class' => 'form-group row'
                              ]]]);?>
                      <!-- Accordion -->
                      <div class="accordion js-accordion" id="debitor-accordion">
                          <?if($debitor):?>
                              <?foreach ($debitor as $key => $item):?>
                                  <?= $this->render('/debitor/_new_debitor',
                                      ['form' => $form,
                                          'debitor' => $item,
                                          'uploadForm' => $uploadForm,
                                          'increment' => $key,
                                          'directory' => $directory,
                                          'model' => $model,
                                      ]);?>
                                  <?$debitor_i = $key+1?>
                              <?endforeach;?>
                          <?endif;?>
                      </div>
                      <input id="debitor-point" hidden value="<?=isset($debitor_i) ? $debitor_i : 0?>">
                      <!-- Accordion / End -->
                      <div class="row" style="margin-top:30px;">
                          <div class="center-block">
                              <div class="row" >
                                  <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                  <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                              </div>
                          </div>
                      </div>
                      <?php ActiveForm::end(); ?>
                  </div>

                    <div class="tab">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_property" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить имущество
                        </a>

                        <?if(!$property):?>
                            <p>Если имущество отстуствует, то нажмите далее</p>
                        <?endif;?>
                        <!-- Accordion -->
                            <?$form = ActiveForm::begin([
                                'id' => 'property',
                                'action' => '/property/save-model',
                                'enableClientValidation' => true,
                                'enableAjaxValidation' => true,
                                'options' => ['enctype' => 'multipart/form-data'],
                                'fieldConfig' => [
                                    'options' => [
                                        'class' => 'form-group row'
                                    ]]]);?>
                            <!-- Accordion -->
                            <div class="accordion js-accordion" id="property-accordion">
                                <?if($property):?>
                                    <?foreach ($property as $key => $item):?>
                                        <?= $this->render('/property/_new_property',
                                            ['form' => $form,
                                                'property' => $item,
                                                'uploadForm' => $uploadForm,
                                                'increment' => $key,
                                                'directory' => $directory,
                                                'model' => $model,
                                            ]);?>
                                        <?$property_i = $key+1?>
                                    <?endforeach;?>
                                <?endif;?>
                            </div>

                            <input id="property-point" hidden value="<?=isset($property_i) ? $property_i : 0?>">
                            <div class="row" style="margin-top:30px;">
                                <div class="center-block">
                                    <div class="row" >
                                        <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                        <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                                    </div>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>


                    </div>

                    <div class="tab">
                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_bank" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить банк
                        </a>

                        <?if(!$bank):?>
                            <p>Если сведения о счетах в банках или иных кредитных организациях отсутсвуют, то нажмите далее</p>
                        <?endif;?>

                        <?$form = ActiveForm::begin([
                            'id' => 'bank',
                            'action' => '/bank/save-model',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false,
                            'options' => ['enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'options' => [
                                    'class' => 'form-group row'
                                ]]]);?>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="bank-accordion">
                            <?if($bank):?>
                                <?foreach ($bank as $key => $item):?>
                                    <?= $this->render('/bank/_new_bank',
                                        ['form' => $form,
                                            'bank' => $item,
                                            'uploadForm' => $uploadForm,
                                            'increment' => $key,
                                            'directory' => $directory,
                                            'model' => $model,
                                        ]);?>
                                    <?$bank_i = $key+1?>
                                <?endforeach;?>
                            <?endif;?>
                        </div>
                        <input id="bank-point" hidden value="<?=isset($bank_i) ? $bank_i : 0?>">
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div>

                    <div class="tab">

                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_shares" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить выписку по ценным бумагам
                        </a>

                        <?if(!$shares):?>
                            <p>Если информация по акциям или ценным бумагам отсутствует, то нажмите далее</p>
                        <?endif;?>

                        <?$form = ActiveForm::begin([
                            'id' => 'shares',
                            'action' => '/shares/save-model',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false,
                            'options' => ['enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'options' => [
                                    'class' => 'form-group row'
                                ]]]);?>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="shares-accordion">
                            <?if($shares):?>
                                <?foreach ($shares as $key => $item):?>
                                    <?= $this->render('/shares/_new_shares',
                                        ['form' => $form,
                                            'shares' => $item,
                                            'uploadForm' => $uploadForm,
                                            'increment' => $key,
                                            'directory' => $directory,
                                            'model' => $model,
                                        ]);?>
                                    <?$shares_i = $key+1?>

                                <?endforeach;?>
                            <?endif;?>

                        </div>
                        <input id="shares-point" hidden value="<?=isset($shares_i) ? $shares_i : 0?>">
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>



                    <div class="tab">

                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_other_shares" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить иные ценные бумаги
                        </a>

                        <?if(!$other_shares):?>
                            <p>Если информация по иным ценным бумагам отсутствует, то нажмите далее</p>
                        <?endif;?>


                        <?$form = ActiveForm::begin([
                            'id' => 'other_shares',
                            'action' => '/other-shares/save-model',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false,
                            'options' => ['enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'options' => [
                                    'class' => 'form-group row'
                                ]]]);?>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="other_shares-accordion">
                            <?if($other_shares):?>
                                <?foreach ($other_shares as $key => $item):?>
                                    <?= $this->render('/other-shares/_new_other_shares',
                                        ['form' => $form,
                                            'other_shares' => $item,
                                            'uploadForm' => $uploadForm,
                                            'increment' => $key,
                                            'directory' => $directory,
                                            'model' => $model,
                                        ]);?>
                                    <?$other_shares_i = $key+1?>
                                <?endforeach;?>
                            <?endif;?>
                        </div>
                        <input id="other_shares-point" hidden value="<?=isset($other_shares_i) ? $other_shares_i : 0?>">
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>

                    <div class="tab">

                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_valuable-property" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить наличные денежные средства и иное ценное имущество
                        </a>

                        <?if(!$valuable_property):?>
                            <p>Если информация по наличным денежным средствам и ценному имуществу отсутствует, то нажмите далее</p>
                        <?endif;?>

                        <?$form = ActiveForm::begin([
                            'id' => 'valuable_property',
                            'action' => '/valuable-property/save-model',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false,
                            'options' => ['enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'options' => [
                                    'class' => 'form-group row'
                                ]]]);?>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="valuable-property-accordion">
                            <?if($valuable_property):?>
                                <?foreach ($valuable_property as $key => $item):?>
                                    <?= $this->render('/valuable-property/_new_valuable_property',
                                        ['form' => $form,
                                            'valuable_property' => $item,
                                            'uploadForm' => $uploadForm,
                                            'increment' => $key,
                                            'directory' => $directory,
                                            'model' => $model,
                                        ]);?>
                                    <?$valuable_property_i = $key+1?>
                                <?endforeach;?>
                            <?endif;?>
                        </div>
                        <input id="valuable-property-point" hidden value="<?=isset($valuable_property_i) ? $valuable_property_i : 0?>">
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>

                    <div class="tab">

                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_deal" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить «Совершенные сделки за последние 3 года»
                        </a>

                        <?if(!$deal):?>
                            <p>Если Совершенные сделки за последние 3 года отсутсвуют, то нажмите далее</p>
                        <?endif;?>

                        <?$form = ActiveForm::begin([
                            'id' => 'deal',
                            'action' => '/deal/save-model',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false,
                            'options' => ['enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'options' => [
                                    'class' => 'form-group row'
                                ]]]);?>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="deal-accordion">
                            <?if($deal):?>
                                <?foreach ($deal as $key => $item):?>
                                    <?= $this->render('/deal/_new_deal',
                                        ['form' => $form,
                                            'deal' => $item,
                                            'uploadForm' => $uploadForm,
                                            'increment' => $key,
                                            'directory' => $directory,
                                            'model' => $model,
                                        ]);?>
                                    <?$deal_i = $key+1?>
                                <?endforeach;?>
                            <?endif;?>
                        </div>
                        <input id="deal-point" hidden value="<?=isset($deal_i) ? $deal_i : 0?>">
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div>

                    <div class="tab">

                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_nalog" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить Доходы и Налоги
                        </a>

                        <?if(!$nalog):?>
                            <p>Если информация по доходам и налогам отсутствует, то нажмите далее</p>
                        <?endif;?>


                        <?$form = ActiveForm::begin([
                            'id' => 'nalog',
                            'action' => '/nalog/save-model',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false,
                            'options' => ['enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'options' => [
                                    'class' => 'form-group row'
                                ]]]);?>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="nalog-accordion">
                            <?if($nalog):?>
                                <?foreach ($nalog as $key => $item):?>
                                    <?= $this->render('/nalog/_new_nalog',
                                        ['form' => $form,
                                            'nalog' => $item,
                                            'uploadForm' => $uploadForm,
                                            'increment' => $key,
                                            'directory' => $directory,
                                            'model' => $model,
                                        ]);?>
                                    <?$nalog_i = $key+1?>
                                <?endforeach;?>
                            <?endif;?>
                        </div>
                        <input id="nalog-point" hidden value="<?=isset($nalog_i) ? $nalog_i : 0?>">
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>

                    <div class="tab">

                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_enforce-proc" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить Исполнительные производства
                        </a>
                        <?if(!$nalog):?>
                            <p>Если информация по исполнительным производствам отсутствует, то нажмите далее</p>
                        <?endif;?>

                        <?$form = ActiveForm::begin([
                            'id' => 'enforce_proc',
                            'action' => '/enforce-proc/save-model',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false,
                            'options' => ['enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'options' => [
                                    'class' => 'form-group row'
                                ]]]);?>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="enforce-proc-accordion">
                            <?if($enforce_proc):?>
                                <?foreach ($enforce_proc as $key => $item):?>
                                    <?= $this->render('/enforce-proc/_new_enforce',
                                        ['form' => $form,
                                            'enforce' => $item,
                                            'uploadForm' => $uploadForm,
                                            'increment' => $key,
                                            'directory' => $directory,
                                            'model' => $model,
                                        ]);?>
                                    <?$enforce_proc_i = $key+1?>
                                <?endforeach;?>
                            <?endif;?>
                        </div>
                        <input id="enforce-proc-point" hidden value="<?=isset($enforce_proc_i) ? $enforce_proc_i : 0?>">
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>

                    <div class="tab">

                        <!--<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect" id="add_creditor"><i class="icon-feather-edit"></i>Добавить</a>-->

                        <a href="#" id="add_other" class="button ripple-effect">
                            <i class="icon-material-outline-add-circle-outline"></i>Добавить Иные документы
                        </a>

                        <?if(!$nalog):?>
                            <p>Если иные документы отсутсвуют, то нажмите далее</p>
                        <?endif;?>

                        <?$form = ActiveForm::begin([
                            'id' => 'other',
                            'action' => '/other/save-model',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false,
                            'options' => ['enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'options' => [
                                    'class' => 'form-group row'
                                ]]]);?>
                        <!-- Accordion -->
                        <div class="accordion js-accordion" id="other-accordion">
                            <?if($other):?>
                                <?foreach ($other as $key => $item):?>
                                    <?= $this->render('/other/_new_other',
                                        ['form' => $form,
                                            'other' => $item,
                                            'uploadForm' => $uploadForm,
                                            'increment' => $key,
                                            'directory' => $directory,
                                            'model' => $model,
                                        ]);?>
                                    <?$other_i = $key+1?>
                                <?endforeach;?>
                            <?endif;?>
                        </div>
                        <input id="other-point" hidden value="<?=isset($other_i) ? $other_i : 0?>">
                        <!-- Accordion / End -->
                        <div class="row" style="margin-top:30px;">
                            <div class="center-block">
                                <div class="row" >
                                    <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    <?= Html::submitButton("Далее<span class=\"icon-material-outline-keyboard-arrow-right\"></span>", ['class' => 'button ripple-effect']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>

                    <div class="tab">


                                    <!-- Accordion Content -->

                                        <?= $this->render('/proxy/_proxy_tab',[
                                            'proxy' => $proxy,
                                            'model' => $model,
                                            'uploadForm' => $uploadForm,
                                            'directory' => $directory,
                                            //'form' => $form,
                                        ]);?>





                        </div>

                    </div>
                    <div class="tab">
                        <?if($ticket):?>
                        <?$service = $ticket->getService()->one()?>
                        <div class="pricing-plans-container"  style="width: 50%;margin: 0 auto" >
                        <div class="pricing-plan">
                            <h3><?=$service->title?></h3>
                            <p class="margin-top-10"><?=$service->description?></p>
                            <div class="pricing-plan-label billed-monthly-label" id="cost"><strong><?=$service->price?></strong>рублей</div>
                            <div class="pricing-plan-label billed-yearly-label"><strong>$205</strong>/ yearly</div>
                            <div class="pricing-plan-features">
<!--                                <strong>Features of Basic Plan</strong>-->
                                <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="section-headline margin-bottom-12">
                                                    <h5>Промокод</h5>
                                                </div>
                                                <input class="with-border" placeholder="" id="promocode">
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="margin-top: 42px">
                                                <a href="#"  onclick="activatePromocode(<?=$service->id?>,<?=$service->price?>);" class=" button full-width button-sliding-icon">Применить <i class="icon-material-outline-arrow-right-alt"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li id="promocode_message"></li>
<!--                                    <li>Highlighted in Search Results</li>-->
                                </ul>
                            </div>
                            <form method="post" action="https://pay.modulbank.ru/pay">

                                <input type="hidden" name="testing" value="1">

                                <input type="hidden" name="salt" value="dPUTLtbMfcTGzkaBnGtseKlcQymCLrYI">

                                <input type="hidden" name="order_id" value="14425840">

                                <input type="hidden" name="amount" value="<?=$service->price?>">

                                <input type="hidden" name="merchant" value="ad25ef06-1824-413f-8ef1-c08115b9b979">

                                <input type="hidden" name="signature" value="9b28fa592922dc8a0c1ba2e40f2c0432aa617afd">

                                <input type="hidden" name="description" value="Заказ №14425840">

                                <input type="hidden" name="client_phone" value="+7 912 9876543">

                                <input type="hidden" name="client_email" value="test@test.ru">

                                <input type="hidden" name="success_url" value="http://myawesomesite.com/payment_success">

                                <input type="hidden" name="receipt_contact" value="test@mail.com">

                                <input type="hidden" name="unix_timestamp" value="1573451160">

                                <input type="hidden" name="receipt_items"
                                       value="[{&quot;discount_sum&quot;: 40, &quot;name&quot;: &quot;Товар 1&quot;, &quot;payment_method&quot;: &quot;full_prepayment&quot;,
 &quot;payment_object&quot;: &quot;commodity&quot;, &quot;price&quot;: 48, &quot;quantity&quot;: 10, &quot;sno&quot;: &quot;osn&quot;, &quot;vat&quot;: &quot;vat10&quot;},
 {&quot;name&quot;: &quot;Товар 2&quot;, &quot;payment_method&quot;: &quot;full_prepayment&quot;,
 &quot;payment_object&quot;: &quot;commodity&quot;, &quot;price&quot;: 533, &quot;quantity&quot;: 1, &quot;sno&quot;: &quot;osn&quot;, &quot;vat&quot;: &quot;vat10&quot;}]">

<!--                                <input type="submit" value="Оплатить услугу" class="button full-width margin-top-20">-->
                                <a href="/main/save-payment?ticket_id=<?=$model->id?>" onclick="setCookie('tab', 0);" class="button full-width margin-top-20">Оплатить услугу</a>

                            </form>

                        </div>
                        </div>
                            <div class="row" style="margin-top:30px;">
                                <div class="center-block">
                                    <div class="row" >
                                        <a href="#" class="button ripple-effect" id="prevBtn" onclick="nextPrev(-1)" style="margin-right:5px;"><span class="icon-material-outline-keyboard-arrow-left"></span>Назад</a>
                                    </div>
                                </div>
                            </div>
                        <br>
                        <?endif;?>
                    </div>

                    <div class="tab">
                        конец
                    </div>


		


<!--				  <div class="form-group">-->
<!--                      <a onclick="bindInputValue();">Заполнить</a>-->
<!--					</div>-->

						</div>
					</div>
				</div>

			</div>
			<!-- Row / End -->


