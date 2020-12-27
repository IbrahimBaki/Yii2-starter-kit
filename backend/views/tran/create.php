<?php

/**
 * @var yii\web\View $this
 * @var common\models\Tran $model
 */

$this->title = 'Create Translation';
$this->params['breadcrumbs'][] = ['label' => 'Translations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translation-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
