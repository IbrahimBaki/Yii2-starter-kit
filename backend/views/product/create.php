<?php

/**
 * @var yii\web\View $this
 * @var common\models\Product $model
 *  @var common\models\Category $catList
 */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'catList' => $catList,
    ]) ?>

</div>
