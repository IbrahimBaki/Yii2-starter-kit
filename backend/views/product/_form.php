<?php

use kartik\select2\Select2;
use trntv\filekit\widget\Upload;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\web\JsExpression;

/**
 * @var yii\web\View $this
 * @var common\models\Product $model
 * @var yii\bootstrap4\ActiveForm $form
 * @var common\models\Category $catList
 */
?>

<div class="product-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form -> field($model, 'category_id') -> widget(Select2 ::className(), [
                    'data' => $catList,
                    'hideSearch' => true,
                    'theme' => Select2::THEME_KRAJEE,
                    'size' => Select2::LARGE,
                    'options' => [
                        'placeholder' => 'Select a Category ...',
                        'options' => [
//                3 => ['disabled' => true]
                        ]
                    ],
                    'pluginOptions' => [
                        'alowClear' => true
                    ],
                ]) ?>
                <?php echo $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                <?= $form -> field($model, 'options') -> widget(MultipleInput ::className(), [
                    'max' => 6,
                    'columns' => [
                        [
                            'name' => 'color',
                            'type' => 'dropDownList',
                            'title' => 'color',
                            'items' => [
                                'gold' => 'gold',
                                'silver' => 'silver',
                                'black' => 'black',
                                'white' => 'white',
                                'red' => 'red',
                                'blue' => 'blue',
                            ],
                        ],
                        [
                            'name'=>'price',
                            'title'=>'price',
                        ],
                    ],
                    'allowEmptyList'=>false,
                    'enableGuessTitle'=>true,
                    'addButtonPosition'=>MultipleInput::POS_HEADER,
                ])->label(false) ?>
                <?php echo $form->field($model, 'attachments')->widget(Upload::class,[
                    'url'=>['/file/storage/upload'],
                    'maxFileSize'=>5000000,
                    'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                ])?>

                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
