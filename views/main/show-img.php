<? 
//echo"<pre>";print_r($result);die();
use yii\helpers\Url;

if($result): ?>
        <ul>
        <? foreach ($result as $file): ?>
            <li style="margin-bottom: 10px">
                <a href="<?= $file->link ?>" target="_blank">
                    <p><?= $file->model ?></p>
                    <a href='<?= Url::toRoute(['main/delete-img', 'id' => $file->id,'model_id' => $file->model_id]); ?>'  ><span class="glyphicon glyphicon-remove" style="color: red"></span></a>
                </a>
                </li>
        <? endforeach; ?>
        </ul>
    <? endif; ?>