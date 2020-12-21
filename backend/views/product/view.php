<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Product $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">
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
                    'category_id',
                    'description',
                    [
                        'attribute' => 'image',
                        'format'=>'html',
                        'label'=>'Image',
//                        'value'=>Html::img(Yii::getAlias('@storageUrl/source/').$image->path,['width'=>'60px']),
                         'value'=>function($data){
                              foreach($data->productAttachments as $image){
                                  return Html::img(Yii::getAlias('@storageUrl/source/').$image->path,['width'=>'60px']);
                             }
                          }
                    ],
                    [
                        'attribute'=>'created_at',
                        'value'=>date('Y-m-d',$model->created_at),
                    ],
                    [
                        'attribute'=>'updated_at',
                        'value'=>date('Y-m-d',$model->updated_at),
                    ],
                    
                ],
            ]) ?>
        </div>
    </div>
</div>
