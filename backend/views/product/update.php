<?php

/**
 * @var yii\web\View $this
 * @var common\models\Product $model
 * @var common\models\Category $catList
 */

$this->title = 'Update Product: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'catList' => $catList,
    ]) ?>

</div>
