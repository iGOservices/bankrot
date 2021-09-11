
<div class="directory-view">

    <h3>Справочник полей ввода:</h3>
    <ul>
    <?foreach ($directory as $item):?>
        <?if($item->id == 1):?>
            <li><a href="/admin/directory/view?id=<?=$item->id?>">Заполнение и формирование документов для обращения в суд</li>
        <?elseif($item->id == 2):?>
            <li><a href="/admin/directory/view?id=<?=$item->id?>">Банкротство под ключ</li>
        <?else:?>
            <li><a href="/admin/directory/view?id=<?=$item->id?>">Услуги арбитражных управляющих</li>
        <?endif;?>
    <?endforeach;?>
    </ul>
</div>
