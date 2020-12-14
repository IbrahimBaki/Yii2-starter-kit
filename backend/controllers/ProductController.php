<?php

namespace backend\controllers;

use common\models\Category;
use common\models\ProductOptions;
use Yii;
use common\models\Product;
use backend\models\search\ProductSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $categories = Category::find()->all();
        $model = new Product();
        $model->options = [];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->options){
                foreach ($model->options as $option){
                    $prdOptions = new ProductOptions();
                    $prdOptions->product_id = $model->id;
                    $prdOptions->color = $option['color'];
                    $prdOptions->price = $option['price'];
                    $prdOptions->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'catList' => ArrayHelper::map($categories,'id','title'),
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $categories = Category::find()->all();
        $model = $this->findModel($id);
        $model->options = ProductOptions::find()->where('product_id=:id',['id'=>$id])->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->options){
                foreach($model->options as $option){
                    $prdOptions = new ProductOptions();
                    $prdOptions->product_id = $model->id;
                    $prdOptions->color = $option['color'];
                    $prdOptions->price = $option['price'];
                    $prdOptions->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'catList' => ArrayHelper::map($categories,'id','title'),
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}