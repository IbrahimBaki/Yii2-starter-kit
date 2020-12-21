<?php

use common\models\ProductAttachment;
use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var backend\models\search\ProductSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title',
                    'category_id',
                    'description',
                    [
                        'attribute'=>'image',
                        'format'=>'html',
                        'label'=>'Image',
                        'value'=>function($data){
                            $data->attachments = ProductAttachment::find()->where('product_id=:id',['id'=>$data->id])->all();
                            foreach ($data->attachments as $attachment){
                                $image = $attachment;
                                break;
                            }
                            return Html::img(Yii::getAlias('@storageUrl/source/'). $image->path ,['width'=>'60px','height'=>'60px']);
                        }
                    ],
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
