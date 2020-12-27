<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;


$this->beginContent('@frontend/views/layouts/_clear.php')
?>

    <!-- header -->
    <header>
        <?php NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => ['navbar-dark', 'bg-dark', 'navbar-expand-md'],
            ],
        ]); ?>
        <?php echo Nav::widget([
            'options' => ['class' => ['navbar-nav', 'justify-content-end', 'ml-auto']],
            'items' => [
                ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']],
                ['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
                ['label' => Yii::t('frontend', 'Articles'), 'url' => ['/article/index']],
                ['label' => Yii::t('frontend', 'Contact'), 'url' => ['/site/contact']],
                ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible'=>Yii::$app->user->isGuest],
                ['label' => Yii::t('frontend', 'Login'), 'url' => ['/user/sign-in/login'], 'visible'=>Yii::$app->user->isGuest],
                [
                    'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                    'visible'=>!Yii::$app->user->isGuest,
                    'items'=>[
                        [
                            'label' => Yii::t('frontend', 'Settings'),
                            'url' => ['/user/default/index']
                        ],
                        [
                            'label' => Yii::t('frontend', 'Backend'),
                            'url' => Yii::getAlias('@backendUrl'),
                            'visible'=>Yii::$app->user->can('manager')
                        ],
                        [
                            'label' => Yii::t('frontend', 'Logout'),
                            'url' => ['/user/sign-in/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ]
                    ]
                ],
                [
                    'label'=>Yii::t('frontend', 'Language'),
                    'items'=>array_map(function ($code) {
                        return [
                            'label' => Yii::$app->params['availableLocales'][$code],
                            'url' => ['/site/set-locale', 'locale'=>$code],
                            'active' => Yii::$app->language === $code
                        ];
                    }, array_keys(Yii::$app->params['availableLocales']))
                ]
            ]
        ]); ?>
        <?php NavBar::end(); ?>

        <!--   header inner

        <div class="header">
            <div class="head_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="top-box">
                                <ul class="sociel_link">
                                    <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="top-box">
                                <p>long established fact that a reader will be </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo"><?= Html::img('@web/images/logo.jpg') ?> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-7 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li> <?= Html::a('home', ['index']) ?> </li>
                                        <li> <?= Html::a('about', ['about']) ?> </li>
                                        <li> <?= Html::a('product', ['product']) ?> </li>
                                        <li> <?= Html::a('blog', ['blog']) ?> </li>
                                        <li> <?= Html::a('Contact', ['contact']) ?> </li>
                                        <?php if(Yii::$app->user->isGuest): ?>
                                            <li> <?= Html::a('Login', ['/user/sign-in/login']) ?> </li>
                                            <li class="mean-last"> <?= Html::a('signup', ['/user/sign-in/signup']) ?> </li>
                                        <?php else: ?>

                                            <li class="mt-3"> <?= Html::beginForm(['/user/sign-in/logout'], 'post')
                                                . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',['class'=>'buy']) . Html::endForm() ?> </li>



                                        <?php endif; ?>
                                        <?php

//                                        foreach (Yii::$app->params['availableLocales']as $key => $language){
//                                            echo "<span class='language' id='".$key . "'>" . $language ."|</span>";
//                                        }

                                        echo Nav::widget([
                                                'options' => ['class' => ['navbar-nav', 'justify-content-end', 'ml-auto']],
                                                'items' => [
                                                    [
                                                        'label'=>Yii::t('frontend', 'Language'),
                                                        'items'=>array_map(function ($code) {
                                                            return [
                                                                'label' => Yii::$app->params['availableLocales'][$code],
                                                                'url' => ['/site/set-locale', 'locale'=>$code],
                                                                'active' => Yii::$app->language === $code
                                                            ];
                                                        }, array_keys(Yii::$app->params['availableLocales']))
                                                    ]
                                                ]
                                            ]);

                                         ?>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end header inner -->
        </div>
        -->
    </header>
    <!-- end header -->

<main class="flex-shrink-0" role="main">
    <?php echo $content ?>
</main>

    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <ul class="sociel">
                            <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="contact">
                            <h3>conatct us</h3>
                            <span>123 Second Street Fifth Avenue,<br>
                       Manhattan, New York<br>
                        +987 654 3210</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="contact">
                            <h3>ADDITIONAL LINKS</h3>
                            <ul class="lik">
                                <li> <a href="#">About us</a></li>
                                <li> <a href="#">Terms and conditions</a></li>
                                <li> <a href="#">Privacy policy</a></li>
                                <li> <a href="#">News</a></li>
                                <li> <a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="contact">
                            <h3>service</h3>
                            <ul class="lik">
                                <li> <a href="#"> Data recovery</a></li>
                                <li> <a href="#">Computer repair</a></li>
                                <li> <a href="#">Mobile service</a></li>
                                <li> <a href="#">Network solutions</a></li>
                                <li> <a href="#">Technical support</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="contact">
                            <h3>About lighten</h3>
                            <span>Tincidunt elit magnis nulla facilisis. Dolor Sapien nunc amet ultrices, </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Free html Templates</a></p>
            </div>

        </div>
    </footer>
<?php $this->endContent() ?>