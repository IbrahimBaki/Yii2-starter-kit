<?php

/**
 * @var yii\web\View $this
 * @var common\models\Tran $model
 */

$this->title = 'Update Translation: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Translations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="translation-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
