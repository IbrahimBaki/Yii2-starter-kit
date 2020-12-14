<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $image
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    public $categoryImage;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::class,
                'attribute'=>'image',
//                'pathAttribute' => 'path',
//                'baseUrlAttribute' => 'base_url',
//                'orderAttribute' => 'order',
//                'typeAttribute' => 'type',
//                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',

            ]
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['title', 'filter', 'filter' => 'trim'],
            ['title', 'required'],
//            ['title', 'unique', 'targetClass' => Category::class, 'filter' => function ($query) {
//                if (!$this->getModel()->isNewRecord) {
//                    $query->andWhere(['not', ['id' => $this->getModel()->id]]);
//                }
//            }],
            ['title', 'string', 'min' => 2, 'max' => 255],

            ['description', 'filter', 'filter' => 'trim'],
            ['description', 'required'],

            [['image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'description' => Yii::t('common', 'Description'),
            'title' => Yii::t('common', 'Title'),
            'image' => Yii::t('common', 'Image'),


        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}
