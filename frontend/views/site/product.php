<?php

/* @var $this yii\web\View */
/* @var $products common\models\Product */

use yii\helpers\Html;

$this->title = 'Product';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="brand_color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>our product</h2>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">

                    <span>We package the products with best services to make you a happy customer.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-bg">
    <div class="product-bg-white">
        <div class="container">
            <div class="row">
                <?php foreach ($products as $product): ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="product-box" style="width: 240px;height: 301px">
                        <i><?php
                            foreach ($product->productAttachments as $productAttachment) {
                                echo Html::img(Yii::getAlias('@storageUrl/source/').$productAttachment->path,['style'=>'width:180px;height:200px']);
                                break;
                            }
                            ?></i>
                        <h3><?= $product->title ?></h3>
                        <?php
                        foreach ($product->productOptions as $option){
                            if($option->product_id == $product->id){
                                $price = $option->price;
                                echo "<span>".$option->price . " $</span>";
                            }
                            else echo "<span>** $</span>";
                            break;
                        }
                        ?>
                        <div>
                            <?= Html::a('Add to Cart',['product-details','id'=>$product->id],['class'=>'btn btn-success']) ?>
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

</div>