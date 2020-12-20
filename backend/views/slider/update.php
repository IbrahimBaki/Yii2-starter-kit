<?php

/**
 * @var yii\web\View $this
 * @var common\models\Slider $model
 */

$this->title = 'Update Slider: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slider-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
