<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

//use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Category $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'title',
                    'description',
                    [
                        'attribute'=>'image',
                        'format'=>'html',
                        'label'=>'Image',
                      'value'=>Html::img(Url::to('@storageUrl/source/' . $model->image_path),['width'=>'60px']),
                    ],
                    
                ],
            ]) ?>
        </div>
    </div>
</div>
