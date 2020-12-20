<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Slider $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="slider-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'title') ?>
    <?php echo $form->field($model, 'type') ?>
    <?php echo $form->field($model, 'description') ?>
    <?php echo $form->field($model, 'image_name') ?>
    <?php // echo $form->field($model, 'image_base_url') ?>
    <?php // echo $form->field($model, 'image_path') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
