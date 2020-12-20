<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

use frontend\assets\FrontendAsset;
use yii\helpers\Html;


FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <!-- basic -->
    <meta charset="<?php echo Yii::$app->charset ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo Html::encode($this->title) ?></title>

    <link rel="icon" href="/icon/service6.png" type="image/gif" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <?php $this->head() ?>
    <?php echo Html::csrfMetaTags() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
    <?php echo $content ?>
<?php $this->endBody() ?>

<script>
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });

        $(".zoom").hover(function(){

            $(this).addClass('transition');
        }, function(){

            $(this).removeClass('transition');
        });
    });


</script>

</body>
</html>
<?php $this->endPage() ?>
