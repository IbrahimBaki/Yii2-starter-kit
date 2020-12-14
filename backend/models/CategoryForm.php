<?php

namespace backend\models;

use common\models\Category;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Create user form
 */
class CategoryForm extends Model
{
    public $title;
    public $description;
    public $image;
    public $products;

    private $model;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['title', 'filter', 'filter' => 'trim'],
            ['title', 'required'],
            ['title', 'unique', 'targetClass' => Category::class, 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id' => $this->getModel()->id]]);
                }
            }],
            ['title', 'string', 'min' => 2, 'max' => 255],

            ['description', 'filter', 'filter' => 'trim'],
            ['description', 'required'],

            [['image'], 'file', 'extensions' => 'jpg,jpeg,png'],
            ['image', 'required'],

        ];
    }

    /**
     * @return Category
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new Category();
        }
        return $this->model;
    }

    /**
     * @param Category $model
     * @return mixed
     */
    public function setModel($model)
    {
        $this->title = $model->title;
        $this->description = $model->description;
        $this->image = $model->image;
        $this->model = $model;
        return $this->model;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('common', 'Category Title'),
            'description' => Yii::t('common', 'Description'),
            'image' => Yii::t('common', 'Image')
        ];
    }

    /**
     * Signs user up.
     * @return Category|null the saved model or null if saving fails
     * @throws Exception
     */
    public function save()
    {
        if ($this->validate()) {
            $model = $this->getModel();
            $isNewRecord = $model->getIsNewRecord();
            $model->title = $this->title;
            $model->description = $this->description;
            $model->image = $this->image;
            if (!$model->save()) {
                throw new Exception('Model not saved');
            }
            return !$model->hasErrors();
        }
        return null;
    }
}
